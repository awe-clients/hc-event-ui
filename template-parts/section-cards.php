<?php

/**
 * Template Part: Seção de Cards (Redirecionamento para Páginas)
 * Adaptado para: 1ª Corrida do Bom Vizinho
 */
$percurso_url       = get_theme_mod('card_percurso_url', '#');
$percurso_text      = get_theme_mod('card_percurso_text', 'Conheça os trajetos desenhados para conectar a comunidade.');
$percurso_link_hide = get_theme_mod('card_percurso_link_hide', false);
$kit_url            = get_theme_mod('card_kit_url', '#');
$kit_link_hide      = get_theme_mod('card_kit_link_hide', false);
$regulamento_url    = get_theme_mod('card_regulamento_url', '#');
$regulamento_link_hide      = get_theme_mod('card_regulamento_link_hide', false);
$kit_cover          = get_theme_mod('card_kit_img', 'https://via.placeholder.com/400x400/FFFFFF/dc2626?text=KIT');
?>
<section class="py-20 bg-zinc-50 border-t border-zinc-200" id="infos">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="group block relative overflow-hidden bg-white border border-zinc-200 hover:border-red-600 transition-colors duration-300">
                <div class="p-10 relative z-10">
                    <span class="color-5km-text font-black text-[10px] tracking-[0.3em] uppercase">Estratégia</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6 text-zinc-900">Percursos</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed mb-8">
                        <?php echo wp_kses_post($percurso_text); ?>
                    </p>

                    <?php if (!$percurso_link_hide) : ?>
                        <div class="grid grid-cols-3 gap-4 mt-16 pt-10 border-t border-zinc-100 text-white text-center font-black italic uppercase">
                            <a href="https://www.strava.com/routes/3486378123703328092" target="_percurso" class="color-5km-bg p-4 skew-element"><span class="unskew">5 KM</span></a>
                            <a href="https://www.strava.com/routes/3486380060480933338" target="_percurso" class="color-10km-bg p-4 skew-element"><span class="unskew">10 KM</span></a>
                            <a href="https://www.strava.com/routes/3486377308495654962" target="_percurso" class="color-15km-bg p-4 skew-element"><span class="unskew">15 KM</span></a>
                        </div>
                        <a href="<?php echo esc_url($percurso_url); ?>" class="hidden flex items-center gap-4 text-xs font-black uppercase tracking-widest color-5km-text group-hover:gap-6 group-hover:color-15km-text transition-all">
                            Ver detalhes <i class="fas fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative block overflow-hidden color-10km-bg group border border-transparent hover:border-red-700 transition-colors duration-300">
                <div class="bg-white h-full p-10 flex flex-col justify-between items-center text-center m-[2px]">
                    <div>
                        <span class="color-10km-text font-black text-[10px] tracking-[0.3em] uppercase">Material</span>
                        <h3 class="text-4xl font-black italic uppercase mt-2 mb-4 text-zinc-900">Kit Atleta</h3>
                    </div>
                    <img src="<?php echo esc_url($kit_cover); ?>" class="h-48 object-contain my-4 transform group-hover:scale-110 transition duration-700">

                    <?php if (!$kit_link_hide) : ?>
                        <div class="color-10km-bg text-white w-full py-4 skew-element font-black uppercase italic text-sm hover:brightness-110 transition-all">
                            <a href="<?php echo esc_url($kit_url); ?>" class="unskew w-full block">
                                Conhecer o Kit
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="group block relative overflow-hidden color-15km-bg border border-transparent hover:brightness-110 transition-all duration-300">
                <div class="p-10 relative z-10 text-white flex flex-col h-full">
                    <span class="text-white/70 font-black text-[10px] tracking-[0.3em] uppercase">Normas</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6">Regulamento</h3>
                    <p class="text-white/90 text-sm leading-relaxed mb-auto">Informações fundamentais sobre categorias e diretrizes técnicas da competição.</p>

                    <?php if (!$regulamento_link_hide) : ?>
                        <div class="color-10km-bg text-white w-full py-4 skew-element font-black uppercase italic text-sm hover:brightness-110 transition-all">
                            <a href="<?php echo esc_url($regulamento_url); ?>" class="mt-8 inline-block bg-white text-red-900 px-8 py-3 skew-element font-black uppercase italic text-xs group-hover:bg-yellow-brand transition-colors text-center w-max">
                                <span class="unskew">Acessar Documento</span>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>