<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VipRomance') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <div class="min-h-screen grid lg:grid-cols-2">
        {{-- LADO ESQUERDO (branding) --}}
        <div class="relative hidden lg:flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-500 via-pink-500 to-orange-400"></div>
            <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-white/15 blur-2xl"></div>
            <div class="absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-white/15 blur-2xl"></div>

            <div class="relative z-10 max-w-md px-10">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <span class="text-2xl">💘</span>
                    </div>
                    <div>
                        <div class="text-white text-3xl font-extrabold tracking-tight">
                            VipRomance
                        </div>
                        <div class="text-white/80 text-sm">
                            Um MVP simples, bonito e direto ao ponto.
                        </div>
                    </div>
                </div>

                <h1 class="mt-10 text-white text-4xl font-extrabold leading-tight">
                    Conecte com quem procura você.<br>
                    Sem complicar.
                </h1>

                <p class="mt-4 text-white/85 text-base leading-relaxed">
                    Crie seu perfil em minutos, encontre sugestões compatíveis e converse com privacidade.
                    (E sem aquela bagunça de “mil opções” agora — aqui é MVP raiz 😄)
                </p>

                <div class="mt-8 flex items-center gap-3 text-white/80 text-sm">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1">
                        ✅ Match recíproco
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1">
                        ✅ Login rápido
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1">
                        ✅ Responsivo
                    </span>
                </div>
            </div>
        </div>

        {{-- LADO DIREITO (form) --}}
        <div class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                {{-- Logo mobile --}}
                <div class="lg:hidden mb-8 text-center">
                    <div class="inline-flex items-center justify-center h-12 w-12 rounded-2xl bg-gradient-to-br from-rose-500 via-pink-500 to-orange-400 text-white">
                        💘
                    </div>
                    <div class="mt-2 text-2xl font-extrabold tracking-tight">VipRomance</div>
                    <div class="text-slate-500 text-sm">Entre e comece a conversar.</div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-100 p-8">
                    {{ $slot }}
                </div>

                <p class="mt-6 text-center text-xs text-slate-400">
                    © {{ date('Y') }} VipRomance. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
