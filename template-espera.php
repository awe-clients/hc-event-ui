<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1ª Corrida do Bom Vizinho Rede Mais | Em Breve</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #dc2626;
            /* Red-600 Tailwind */
        }

        /* Utilitários de inclinação estrutural */
        .skew-element {
            transform: skewX(-10deg);
        }

        .unskew {
            transform: skewX(10deg);
            display: inline-block;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden text-zinc-50">

    <div class="absolute inset-0 opacity-20 pointer-events-none"
        style="background-image: radial-gradient(#fca5a5 1px, transparent 1px); background-size: 32px 32px;">
    </div>

    <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-red-800 rounded-full mix-blend-multiply opacity-50"></div>
    <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-red-900 rounded-full mix-blend-multiply opacity-50"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="mb-12 flex justify-center">
            <div class="h-24 md:h-32 w-64 border-2 border-red-400 bg-red-700/50 flex items-center justify-center">
                <span class="font-black tracking-widest text-red-200 text-sm hidden">LOGOTIPO SVG</span>
            </div>
        </div>

        <div class="max-w-3xl mx-auto">
            <h1 class="text-5xl md:text-8xl font-black text-white uppercase italic tracking-tighter leading-none mb-6">
                1ª CORRIDA DO <br>
                <span class="text-yellow-400">BOM VIZINHO</span>
            </h1>

            <p class="text-red-100 text-lg md:text-2xl mb-10 leading-relaxed font-medium">
                O evento que conecta saúde, comunidade e energia. Natal/RN.
            </p>

            <div class="border border-red-500/30 bg-red-900/40 backdrop-blur-md p-8 inline-block w-full max-w-md">
                <p class="text-yellow-400 font-black uppercase tracking-widest text-sm mb-2">Data Oficial Confirmada</p>
                <p class="text-white font-black text-3xl italic">02 DE AGOSTO 2026</p>
            </div>
        </div>

        <div class="mt-24 pt-8 border-t border-red-500/30 flex flex-col md:flex-row justify-between items-center gap-6 opacity-80">
            <p class="text-red-200 text-xs font-bold uppercase tracking-widest">© 2026 REDE MAIS</p>
            <div class="flex items-center gap-4">
                <span class="text-red-200 text-[10px] uppercase font-bold tracking-widest">Organização:</span>
                <span class="font-black text-sm tracking-widest">HC SPORTS 15 ANOS</span>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>