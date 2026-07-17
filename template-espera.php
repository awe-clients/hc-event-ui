<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1ª Corrida do Empreendedor | SEBRAE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tipografia institucional e de impacto */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,800;1,900&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #123774;
            /* Azul predominante do material */
        }

        /* Padronização de texturas visuais */
        .wave-bg {
            background: repeating-radial-gradient(circle at 50% 150%,
                    transparent,
                    transparent 40px,
                    rgba(255, 255, 255, 0.03) 41px,
                    rgba(255, 255, 255, 0.03) 80px);
        }

        .skew-element {
            transform: skewX(-12deg);
        }

        .unskew {
            transform: skewX(12deg);
            display: inline-block;
        }

        /* Elementos taxonômicos (Pílulas de conteúdo) */
        .badge-pill {
            border-radius: 9999px;
            padding: 0.35rem 1.25rem;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body class="min-h-screen flex items-center justify-center relative text-zinc-50">

    <div class="absolute inset-0 wave-bg pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10 flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-20 py-12">

        <div class="max-w-2xl text-center lg:text-left flex flex-col items-center lg:items-start">

            <p class="text-yellow-400 font-black italic tracking-widest text-sm md:text-base mb-2">
                / / / / / 1ª EDIÇÃO
            </p>

            <h1 class="text-6xl md:text-8xl font-black text-white uppercase italic tracking-tighter leading-none mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                CORRIDA <br>
                <span class="text-white text-4xl md:text-6xl block mt-1">DO <span class="text-[#3b93a5]">EMPREENDEDOR</span></span>
            </h1>

            <p class="text-yellow-400 font-black italic tracking-widest text-xl md:text-2xl mb-6">
                / / / / 24 DE OUTUBRO \ \ \ \
            </p>

            <div class="flex items-center gap-3 mb-8">
                <svg class="w-7 h-7 text-[#e81c62]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-white font-bold uppercase tracking-widest text-lg">Arena das Dunas</span>
            </div>

            <div class="flex flex-wrap justify-center lg:justify-start gap-3 mb-8">
                <span class="badge-pill bg-[#8cb8d9] text-[#123774]">Exposições</span>
                <span class="badge-pill bg-[#f9db3d] text-[#123774]">Palestras sobre empreendedorismo</span>
                <span class="badge-pill bg-[#e81c62] text-white">Apresentações culturais</span>
            </div>
        </div>

        <div class="flex flex-col items-center lg:items-end text-center lg:text-right">

            <div class="mb-10">
                <h2 class="text-3xl md:text-5xl font-black italic uppercase text-white mb-1 leading-tight text-shadow">
                    CORRA NO <br>RITMO DE SUAS
                </h2>
                <h3 class="text-4xl md:text-6xl font-black italic uppercase text-[#e81c62] leading-tight">
                    CONQUISTAS!
                </h3>
            </div>

            <div class="border-2 border-yellow-400/50 bg-[#123774]/80 backdrop-blur-md p-6 skew-element w-full max-w-sm shadow-xl">
                <div class="unskew text-center">
                    <p class="text-white font-black text-xl italic uppercase mb-2">Preparação em Andamento</p>
                    <p class="text-yellow-400 font-bold text-sm uppercase tracking-widest mb-4">Inscrições abrem em breve</p>
                    <hr class="border-white/20 mb-4">
                    <p class="text-xs text-[#8cb8d9] font-medium leading-relaxed">
                        "Sua empresa não precisa correr sozinha. Olhe ao redor."
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full p-6 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 z-20 bg-[#123774]/90 backdrop-blur-sm">
        <div class="flex flex-col md:flex-row items-center gap-2 md:gap-6">
            <span class="text-white/80 text-[11px] font-bold uppercase tracking-widest">© 2026 SEBRAE RN</span>
            <span class="hidden md:inline text-white/30">|</span>
            <span class="text-white/60 text-[10px] font-semibold tracking-wider">TODA GRANDE CONQUISTA É UMA SOMA DE PEQUENAS VITÓRIAS.</span>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-white/80 text-[10px] uppercase font-bold tracking-widest">Realização:</span>
            <span class="font-black text-sm tracking-widest text-white">SEBRAE</span>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>