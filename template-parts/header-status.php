<?php

/**
 * Template part para exibir a barra de status e modalidades na Home
 */
$status_evento   = get_theme_mod('hb_status_evento', 'inscricao');
$label_principal = get_theme_mod('hb_cta_label', 'Resultados');
$link_principal  = get_theme_mod('hb_cta_link', '#');

// Classe de visibilidade condicional para o mobile
$cta_visibility = ($status_evento === 'inscricao') ? 'hidden md:block' : 'block';
?>

<div class="w-full bg-transparent pb-4 border-b border-white/10 mb-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6">

        <div id="main-cta-container" class="w-full md:w-auto">
            <a href="<?php echo esc_url($link_principal); ?>"
                class="<?php echo $cta_visibility; ?> text-center bg-[#FFD100] hover:bg-[#E6BC00] text-blue-900 font-black uppercase tracking-tighter px-10 py-4 rounded-lg shadow-xl transition-all transform hover:scale-105 active:scale-95 text-lg">
                <?php echo esc_html($label_principal); ?>
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-3">
            <?php
            $distancias = array('21km', '10km', '5km');
            foreach ($distancias as $dist) :
                if (get_theme_mod("hb_show_$dist", true)) :
                    $link_dist = get_theme_mod("hb_link_$dist", '#');
            ?>
                    <a href="<?php echo esc_url($link_dist); ?>"
                        class="min-w-[80px] text-center px-4 py-2 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-900 transition-colors text-sm uppercase">
                        <?php echo esc_html($dist); ?>
                    </a>
            <?php
                endif;
            endforeach;
            ?>
        </div>

    </div>
</div>