<?php

/**
 * Template Name: Home Page
 * O arquivo principal da página inicial modular.
 */
get_header();

// Fallbacks Manuais
$post_id = get_the_ID();
$status_evento  = get_post_meta($post_id, '_status_evento', true) ?: 'inscricao';
$label_principal = get_post_meta($post_id, '_label_status', true) ?: 'Ver Informações';
$link_principal  = get_post_meta($post_id, '_link_status', true) ?: '#';
?>

<main id="primary" class="site-main">
    <section class="bg-blue-900 md:py-12 overflow-hidden relative">
        <div class="container mx-auto px-4 relative z-10">

            <div class="w-full bg-transparent pb-4 border-b border-white/10 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                    <div id="main-cta-container" class="w-full md:w-auto">
                        <a href="<?php echo esc_url($link_principal); ?>"
                            class="<?php echo ($status_evento === 'inscricao') ? 'hidden md:block' : 'block'; ?> text-center bg-[#FFD100] text-blue-900 font-black uppercase px-10 py-4 rounded-lg shadow-xl text-lg">
                            <?php echo esc_html($label_principal); ?>
                        </a>
                    </div>

                    <div class="flex flex-wrap justify-center gap-3">
                        <?php
                        // Exemplo de como tratar dados repetidores manuais (usando um array simples por agora)
                        $distancias = array('5Km', '10Km', '21Km');
                        foreach ($distancias as $dist): ?>
                            <a href="#" class="min-w-[80px] text-center px-4 py-2 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-900 transition-colors text-sm">
                                <?php echo $dist; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white/10">
                <div id="hero-slider" class="flex transition-transform duration-700">
                    <div class="min-w-full relative h-[300px] md:h-[500px]">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/banner-default.jpg" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>