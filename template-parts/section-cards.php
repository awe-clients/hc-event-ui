<?php

/**
 * Template Part: Seção de Cards (Redirecionamento para Páginas)
 */
$percurso_url    = get_theme_mod('card_percurso_url', '#');
$kit_url         = get_theme_mod('card_kit_url', '#');
$regulamento_url = get_theme_mod('card_regulamento_url', '#');
$kit_cover       = get_theme_mod('card_kit_img', 'https://via.placeholder.com/400x400/FFFFFF/22c55e?text=KIT');
?>
<section class="py-20 bg-zinc-100" id="infos">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="<?php echo esc_url($percurso_url); ?>" class="group block relative overflow-hidden bg-white border border-zinc-200 shadow-sm hover:shadow-2xl transition-all duration-500">
                <div class="p-10 relative z-10">
                    <span class="color-5km-text font-black text-[10px] tracking-[0.3em] uppercase">Estratégia</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6 color-5km-text">Percursos</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed mb-8">Consulte os trajetos técnicos e pontos de hidratação definidos para a prova.</p>
                    <span class="flex items-center gap-4 text-xs font-black uppercase tracking-widest color-5km-text group-hover:gap-6 transition-all">
                        Ver detalhes <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </a>

            <a href="<?php echo esc_url($kit_url); ?>" class="relative block overflow-hidden color-10km-bg shadow-xl group">
                <div class="bg-white h-full p-10 flex flex-col justify-between items-center text-center m-[2px]">
                    <div>
                        <span class="color-10km-text font-black text-[10px] tracking-[0.3em] uppercase">Material</span>
                        <h3 class="text-4xl font-black italic uppercase mt-2 mb-4 color-5km-text">Kit Atleta</h3>
                    </div>
                    <img src="<?php echo esc_url($kit_cover); ?>" class="h-48 object-contain my-4 transform group-hover:scale-110 transition duration-700" alt="Camisa Oficial">
                    <div class="color-10km-bg text-white w-full py-4 skew-element font-black uppercase italic text-xs">
                        <span class="unskew">Conhecer o Kit</span>
                    </div>
                </div>
            </a>

            <a href="<?php echo esc_url($regulamento_url); ?>" class="group block relative overflow-hidden color-15km-bg shadow-sm hover:shadow-2xl transition-all duration-500 pattern-vava-vazado">
                <div class="p-10 relative z-10 text-white">
                    <span class="text-white/60 font-black text-[10px] tracking-[0.3em] uppercase">Normas</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6">Regulamento</h3>
                    <p class="text-white/80 text-sm leading-relaxed mb-8">Informações fundamentais sobre categorias e diretrizes técnicas da competição.</p>
                    <div class="inline-block bg-white color-15km-text px-8 py-3 skew-element font-black uppercase italic text-xs group-hover:bg-yellow-brand transition-colors">
                        <span class="unskew">Acessar Documento</span>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>