<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // username como login e apelido público
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username', 50)->unique()->after('id');
            }

            // sexo e buscando (1 tipo só)
            if (!Schema::hasColumn('users', 'sex')) {
                $table->char('sex', 1)->default('M')->after('password'); // M/F
            }
            if (!Schema::hasColumn('users', 'seeking')) {
                $table->char('seeking', 1)->default('F')->after('sex');  // M/F
            }

            // dados físicos (perfil)
            if (!Schema::hasColumn('users', 'hair_color')) {
                $table->string('hair_color', 20)->nullable()->after('seeking');
            }
            if (!Schema::hasColumn('users', 'eye_color')) {
                $table->string('eye_color', 20)->nullable()->after('hair_color');
            }
            if (!Schema::hasColumn('users', 'body_type')) {
                $table->string('body_type', 20)->nullable()->after('eye_color');
            }
            if (!Schema::hasColumn('users', 'height_cm')) {
                $table->unsignedSmallInteger('height_cm')->nullable()->after('body_type');
            }
            if (!Schema::hasColumn('users', 'weight_kg')) {
                $table->unsignedSmallInteger('weight_kg')->nullable()->after('height_cm');
            }

            // perfil básico
            if (!Schema::hasColumn('users', 'birth_date')) {
                $table->date('birth_date')->nullable()->after('weight_kg');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('birth_date');
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city', 80)->nullable()->after('bio');
            }
            if (!Schema::hasColumn('users', 'state')) {
                $table->string('state', 2)->nullable()->after('city');
            }

            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('state');
            }
            if (!Schema::hasColumn('users', 'last_seen_at')) {
                $table->timestamp('last_seen_at')->nullable()->after('is_active');
            }

            // (opcional) se você NÃO quiser login por email, dá pra tirar unique do email depois.
            // Por enquanto mantenho como está (seguro e útil pra recuperação).
        });

        // Remove o 'name' se você quiser limpar de vez (recomendo).
        // Como alguns scaffolds/depends usam "name", você pode deixar por enquanto sem usar.
        // Se quiser remover agora, me fala que eu te mando a migração separada e segura.
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach ([
                'last_seen_at','is_active','state','city','bio','birth_date',
                'weight_kg','height_cm','body_type','eye_color','hair_color',
                'seeking','sex','username'
            ] as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
