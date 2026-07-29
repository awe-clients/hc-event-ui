<?php

/**
 * Template Part: Seção de Cards (Redirecionamento para Páginas)
 * Arquitetura: White Label Dinâmico via CMS
 */
$percurso_url       = get_theme_mod('card_percurso_url', '#');
$percurso_text      = get_theme_mod('card_percurso_text', 'Conheça os trajetos desenhados para conectar o ecossistema empresarial.');
$percurso_link_hide = get_theme_mod('card_percurso_link_hide', false);

// Extração das hiperligações dinâmicas dos percursos
$link_5km           = get_theme_mod('card_percurso_link_5km', '');
$link_10km          = get_theme_mod('card_percurso_link_10km', '');
$link_15km          = get_theme_mod('card_percurso_link_15km', '');

$kit_url            = get_theme_mod('card_kit_url', '#');
$kit_link_hide      = get_theme_mod('card_kit_link_hide', false);
$regulamento_url    = get_theme_mod('card_regulamento_url', '#');
$regulamento_link_hide = get_theme_mod('card_regulamento_link_hide', false);
$kit_cover          = get_theme_mod('card_kit_img', 'https://via.placeholder.com/400x400/123774/ffffff?text=KIT');
?>
<section class="py-20 bg-[var(--bg-light)] border-t border-zinc-200" id="infos">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CARD 1: Percursos -->
            <div class="group block relative overflow-hidden bg-white border border-zinc-200 transition-colors duration-300 hover:border-[var(--color-15km)]">
                <div class="p-10 relative z-10">
                    <span class="font-black text-[10px] tracking-[0.3em] uppercase text-[var(--brand-cta)]">Estratégia</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6 text-[var(--text-main)]">Percursos</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed mb-8">
                        <?php echo wp_kses_post($percurso_text); ?>
                    </p>

                    <?php if (!$percurso_link_hide) : ?>
                        <div class="grid grid-cols-3 gap-4 mt-16 pt-10 border-t border-zinc-100 text-center font-black italic uppercase">

                            <?php if (!empty($link_5km)) : ?>
                                <a href="<?php echo esc_url($link_5km); ?>" target="_percurso" class="bg-[#123774] text-[#fff] p-4 border border-zinc-200 transition-colors"><span class="unskew">5 KM</span></a>
                            <?php endif; ?>

                            <?php if (!empty($link_10km)) : ?>
                                <a href="<?php echo esc_url($link_10km); ?>" target="_percurso" class="bg-[var(--brand-cta)] text-[#fff] p-4 border border-zinc-200  transition-colors"><span class="unskew">10 KM</span></a>
                            <?php endif; ?>

                            <?php if (!empty($link_15km)) : ?>
                                <a href="<?php echo esc_url($link_15km); ?>" target="_percurso" class="color-5km-text hover:text-[var(--brand-cta)] p-4 border border-zinc-200 transition-colors"><span class="unskew">15 KM</span></a>
                            <?php endif; ?>

                        </div>

                        <a href="<?php echo esc_url($percurso_url); ?>" class="hidden flex items-center gap-4 text-xs font-black uppercase tracking-widest color-5km-text group-hover:gap-6 group-hover:text-[var(--brand-cta)] transition-all">
                            Ver detalhes <i class="fas fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- CARD 2: Kit Atleta -->
            <div class="relative block overflow-hidden color-10km-bg group border border-transparent transition-colors duration-300">
                <div class="bg-white h-full p-10 flex flex-col justify-between items-center text-center m-[2px]">
                    <div>
                        <span class="font-black text-[10px] tracking-[0.3em] uppercase color-5km-text">Desconto</span>
                        <h3 class="text-4xl font-black italic uppercase mt-2 mb-4 text-[var(--text-main)]">Empreendedor</h3>
                    </div>
                    <img src="<?php echo esc_url($kit_cover); ?>" class="h-48 object-contain my-4 transform group-hover:scale-110 transition duration-700" alt="Kit Atleta">

                    <?php if (!$kit_link_hide) : ?>
                        <div class="color-5km-bg text-white w-full py-4 skew-element font-black uppercase italic text-sm hover:brightness-110 transition-all">
                            <a href="<?php echo esc_url($kit_url); ?>" class="unskew w-full block" target="_blank">
                                Fale conosco
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- CARD 3: Regulamento -->
            <div class="group block relative overflow-hidden color-15km-bg border border-transparent hover:brightness-110 transition-all duration-300">
                <div class="p-10 relative z-10 text-white flex flex-col h-full">
                    <span class="text-white/70 font-black text-[10px] tracking-[0.3em] uppercase">Normas</span>
                    <h3 class="text-4xl font-black italic uppercase mt-2 mb-6">Regulamento</h3>
                    <p class="text-white/90 text-sm leading-relaxed mb-auto">Informações fundamentais sobre categorias e diretrizes técnicas da competição.</p>

                    <?php if (!$regulamento_link_hide) : ?>
                        <div>
                            <a href="<?php echo esc_url($regulamento_url); ?>" target="_blank" class="mt-8 inline-block bg-white text-[var(--color-5km)] px-8 py-3 skew-element font-black uppercase italic text-xs hover:bg-[var(--brand-cta)] hover:text-[#FFF] transition-colors text-center w-max shadow-md">
                                <span class="unskew">Acessar Documento</span>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>