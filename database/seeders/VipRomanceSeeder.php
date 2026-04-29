<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class VipRomanceSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        /* ============================================
         | USERS INICIAIS (VOCÊ + AMIGAS)
         ============================================ */

        $users = [

            // 👉 VOCÊ
            [
                'username'   => 'vipdiego',
                'name'       => 'vipdiego',
                'email'      => 'diego@vipromance.local',
                'password'   => Hash::make('123456'),
                'sex'        => 'M',
                'seeking'    => 'F',
                'birth_date' => '1985-04-20',
                'city'       => 'Caxias do Sul',
                'state'      => 'RS',
                'bio'        => 'Criador do VipRomance 😄',
                'hair_color' => 'CASTANHO',
                'eye_color'  => 'CASTANHO',
                'body_type'  => 'NORMAL',
                'height_cm'  => 182,
                'weight_kg'  => 90,
                'is_active'  => true,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],

            // 👉 AMIGA 1
            [
                'username'   => 'ana_love',
                'name'       => 'vipdiego',
                'email'      => 'ana@vipromance.local',
                'password'   => Hash::make('123456'),
                'sex'        => 'F',
                'seeking'    => 'M',
                'birth_date' => '1992-08-12',
                'city'       => 'Porto Alegre',
                'state'      => 'RS',
                'bio'        => 'Romântica e aventureira 💕',
                'hair_color' => 'LOIRO',
                'eye_color'  => 'AZUL',
                'body_type'  => 'SENSUAL',
                'height_cm'  => 168,
                'weight_kg'  => 60,
                'is_active'  => true,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],

            // 👉 AMIGA 2
            [
                'username'   => 'bruna_rs',
                'name'       => 'vipdiego',
                'email'      => 'bruna@vipromance.local',
                'password'   => Hash::make('123456'),
                'sex'        => 'F',
                'seeking'    => 'M',
                'birth_date' => '1995-03-05',
                'city'       => 'Canoas',
                'state'      => 'RS',
                'bio'        => 'Curto boas conversas e viagens ✈️',
                'hair_color' => 'PRETO',
                'eye_color'  => 'MEL',
                'body_type'  => 'ELEGANTE',
                'height_cm'  => 172,
                'weight_kg'  => 65,
                'is_active'  => true,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],

            // 👉 AMIGA 3
            [
                'username'   => 'julie_sp',
                'name'       => 'vipdiego',
                'email'      => 'julie@vipromance.local',
                'password'   => Hash::make('123456'),
                'sex'        => 'F',
                'seeking'    => 'M',
                'birth_date' => '1990-11-22',
                'city'       => 'São Paulo',
                'state'      => 'SP',
                'bio'        => 'Apaixonada por música e café ☕🎵',
                'hair_color' => 'RUIVO',
                'eye_color'  => 'VERDE',
                'body_type'  => 'FOFINHO',
                'height_cm'  => 165,
                'weight_kg'  => 68,
                'is_active'  => true,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],

        ];

        DB::table('users')->insert($users);


        /* ============================================
         | PREFERENCE OPTIONS
         ============================================ */

        $options = [

            /* ---------- OPEN TO ---------- */
            ['open_to','bdsm','BDSM',1],
            ['open_to','exibicionismo','Exibicionismo',2],
            ['open_to','fantasias','Fantasias',3],
            ['open_to','troca_casais','Troca de Casais',4],
            ['open_to','massagens','Massagens',5],
            ['open_to','encontros','Encontros Presenciais',6],
            ['open_to','nudes','Nudes',7],

            /* ---------- PREFERENCES ---------- */
            ['preferences','amizade','Amizade',1],
            ['preferences','aventura','Aventura Amorosa',2],
            ['preferences','conversar','Conversar / Emails',3],
            ['preferences','viajar','Viajar',4],
            ['preferences','sair','Sair para Jantar',5],
            ['preferences','relacionamento','Relacionamento',6],
            ['preferences','sem_compromisso','Sem Compromisso',7],

            /* ---------- PERSONALITY ---------- */
            ['personality','romantico','Romântico',1],
            ['personality','carinhoso','Carinhoso',2],
            ['personality','extrovertido','Extrovertido',3],
            ['personality','timido','Tímido',4],
            ['personality','dominante','Dominante',5],
            ['personality','divertido','Senso de Humor',6],
            ['personality','fiel','Fiel',7],
            ['personality','curioso','Curioso',8],
            ['personality','confiante','Autoconfiante',9],

        ];

        foreach ($options as $opt) {

            DB::table('preference_options')->insert([
                'category'   => $opt[0],
                'key'        => $opt[1],
                'label'      => $opt[2],
                'sort_order' => $opt[3],
                'is_active'  => true,
                'created_at'=> $now,
                'updated_at'=> $now,
            ]);
        }


        /* ============================================
         | USER PREFERENCES (EXEMPLO)
         ============================================ */

        // pega IDs
        $diegoId = DB::table('users')->where('username','vipdiego')->value('id');
        $anaId   = DB::table('users')->where('username','ana_love')->value('id');


        $userPrefs = [

            // VOCÊ
            [$diegoId,'open_to','massagens'],
            [$diegoId,'open_to','encontros'],
            [$diegoId,'preferences','relacionamento'],
            [$diegoId,'preferences','viajar'],
            [$diegoId,'personality','romantico'],
            [$diegoId,'personality','confiante'],

            // ANA
            [$anaId,'open_to','fantasias'],
            [$anaId,'preferences','aventura'],
            [$anaId,'preferences','viajar'],
            [$anaId,'personality','carinhoso'],
            [$anaId,'personality','divertido'],

        ];

        foreach ($userPrefs as $pref) {

            DB::table('user_preferences')->insert([
                'user_id'   => $pref[0],
                'category'  => $pref[1],
                'key'       => $pref[2],
                'created_at'=> $now,
                'updated_at'=> $now,
            ]);
        }

    }
}
