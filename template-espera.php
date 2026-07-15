<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1ª Corrida do Bom Vizinho Rede Mais | Em Breve</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tipografia de alto impacto e dinamismo similar à imagem de referência */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,900&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0c2b6b;
            /* Azul base do banner */
        }

        /* Padrão de ondas estilizado via CSS */
        .wave-bg {
            background: repeating-radial-gradient(circle at 50% 150%,
                    transparent,
                    transparent 40px,
                    rgba(255, 255, 255, 0.03) 41px,
                    rgba(255, 255, 255, 0.03) 80px);
        }

        .skew-element {
            transform: skewX(-10deg);
        }

        .unskew {
            transform: skewX(10deg);
            display: inline-block;
        }

        /* Elementos tipo "pílula" observados no banner */
        .badge-pill {
            border-radius: 9999px;
            padding: 0.25rem 1rem;
            font-size: 0.875rem;
            font-weight: 700;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden text-zinc-50">

    <div class="absolute inset-0 wave-bg pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 flex flex-col md:flex-row items-center justify-center gap-10">

        <div class="max-w-xl text-center md:text-left flex flex-col items-center md:items-start">

            <p class="text-yellow-400 font-black italic tracking-widest text-sm md:text-base mb-2">
                / / / / / 1ª EDIÇÃO
            </p>

            <h1 class="text-5xl md:text-7xl font-black text-white uppercase italic tracking-tighter leading-none mb-4">
                CORRIDA DO <br>
                <span class="text-[#e81c62]">BOM VIZINHO</span>
            </h1>

            <p class="text-yellow-400 font-black italic tracking-widest text-lg md:text-xl mb-4">
                / / / / 02 DE AGOSTO \ \ \ \
            </p>

            <div class="flex items-center gap-2 mb-6">
                <svg class="w-6 h-6 text-[#e81c62]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-white font-bold uppercase tracking-wider">Natal / RN</span>
            </div>

            <div class="flex flex-col gap-2 items-center md:items-start mb-8">
                <span class="badge-pill bg-[#4fa7d1] text-white">Esporte</span>
                <span class="badge-pill bg-yellow-400 text-blue-900">Comunidade Escolar</span>
                <span class="badge-pill bg-[#e81c62] text-white">Saúde e Energia</span>
            </div>
        </div>

        <div class="flex flex-col items-center text-center">
            <h2 class="text-2xl md:text-4xl font-black italic uppercase text-white mb-2">
                CORRA NO <br>RITMO DE SUAS
            </h2>
            <h3 class="text-3xl md:text-5xl font-black italic uppercase text-[#e81c62] mb-6">
                CONQUISTAS!
            </h3>

            <div class="flex items-center gap-4 border border-white/20 bg-white/10 backdrop-blur-sm p-4 skew-element">
                <div class="unskew text-left">
                    <p class="text-white font-black text-2xl italic uppercase">Aguarde</p>
                    <p class="text-yellow-400 font-black text-sm uppercase tracking-widest">Inscrições em Breve</p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full p-6 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 z-20">
        <p class="text-white/60 text-xs font-bold uppercase tracking-widest">© 2026 REDE MAIS</p>
        <div class="flex items-center gap-4">
            <span class="text-white/60 text-[10px] uppercase font-bold tracking-widest">Organização:</span>
            <span class="font-black text-sm tracking-widest text-white">HC SPORTS 15 ANOS</span>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>