<?php

/**
 * Template part: Barra de Status e Modalidades
 */
$status_logic = get_theme_mod('hb_cta_status', 'inscricao');
$cta_text     = get_theme_mod('hb_cta_text', 'Resultados');
$cta_url      = get_theme_mod('hb_cta_url', '#');

// Lógica de visibilidade: Se for inscrição, esconde no mobile (hidden md:block)
$cta_class = ($status_logic === 'inscricao') ? 'hidden md:block' : 'block';
?>

<div class="w-full bg-transparent pb-4 border-b border-white/10 mb-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6">

        <div id="main-cta-container" class="w-full md:w-auto">
            <a href="<?php echo esc_url($cta_url); ?>"
                class="<?php echo $cta_class; ?> text-center bg-[#FFD100] hover:bg-[#E6BC00] text-blue-900 font-black uppercase tracking-tighter px-10 py-4 rounded-lg shadow-xl transition-all transform hover:scale-105 active:scale-95 text-lg">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-3">
            <?php
            $distancias = array('21km', '10km', '5km');
            foreach ($distancias as $slug) :
                if (get_theme_mod("hb_show_$slug", true)) :
                    $link = get_theme_mod("hb_link_$slug", '#');
            ?>
                    <a href="<?php echo esc_url($link); ?>"
                        class="min-w-[80px] text-center px-4 py-2 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-900 transition-colors text-sm uppercase">
                        <?php echo esc_html($slug); ?>
                    </a>
            <?php
                endif;
            endforeach;
            ?>
        </div>

    </div>
</div>