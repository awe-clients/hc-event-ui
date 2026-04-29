<?php

/**
 * Footer do Tema
 */
$mapa_modal = get_theme_mod('modal_mapa_img', '');
$kit_modal  = get_theme_mod('modal_kit_img', '');
?>

<footer class="color-5km-bg pattern-vava-vazado text-white pt-24 pb-12 mt-auto">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            <div class="lg:col-span-6">
                <?php if (has_custom_logo()) : the_custom_logo();
                else : ?>
                    <div class="font-black italic text-3xl mb-8 tracking-tighter">3ª CORRIDA COOPANEST-RN</div>
                <?php endif; ?>
                <p class="text-white/70 text-lg leading-relaxed max-w-md font-normal">Integração esportiva fundamentada no desenvolvimento da padronagem visual VAVA e na saúde médica potiguar.</p>
            </div>

            <div class="lg:col-span-3">
                <h4 class="color-10km-text font-black uppercase text-xs tracking-widest mb-8">Navegação</h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container'      => false,
                    'menu_class'     => 'space-y-4 font-black uppercase text-[10px] tracking-widest text-white/80',
                    'fallback_cb'    => '__return_false',
                ));
                ?>
            </div>

            <div class="lg:col-span-3">
                <h4 class="color-10km-text font-black uppercase text-xs tracking-widest mb-8">Redes Sociais</h4>
                <div class="flex gap-6 text-2xl">
                    <?php
                    $redes = array('instagram', 'facebook', 'youtube');
                    foreach ($redes as $rede) :
                        $url = get_theme_mod("footer_$rede");
                        if (!empty($url)) :
                    ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" class="text-white/70 hover:text-white transition-colors" aria-label="<?php echo ucfirst($rede); ?>">
                                <i class="fab fa-<?php echo esc_attr($rede); ?>"></i>
                            </a>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-6 border-t-1 border-indigo-500">
            <div class="text-gray-500 text-sm">
                &copy; <?php echo date('Y'); ?> - <?php echo esc_html(get_theme_mod('footer_copyright', '3ª CORRIDA COOPANEST-RN. Todos os direitos reservados.')); ?>
            </div>
            <div class="flex items-center gap-1">
                <span class="text-red-200 text-[12px] uppercase">Produzido por:</span>
                <a href="https://horadecorrer.com.br" target="_blank" rel="noopener" class="flex items-center hover:opacity-80 transition-opacity"><span class="font-bold text-white text-[12px] uppercase">Hora de Correr</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<div id="site-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 md:p-10 bg-black/80 backdrop-blur-sm" aria-hidden="true">
    <div class="relative bg-white w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-lg shadow-2xl">
        <button type="button" onclick="closeModal()" class="absolute top-5 right-5 text-3xl font-bold color-5km-text hover:opacity-70 transition-colors focus:outline-none" aria-label="Fechar Modal">&times;</button>
        <div id="modal-content" class="p-8 md:p-12">
        </div>
    </div>
</div>

<script>
    const modalData = {
        mapaImg: "<?php echo esc_url($mapa_modal); ?>",
        kitImg: "<?php echo esc_url($kit_modal); ?>"
    };
</script>

<?php wp_footer(); ?>
</body>

</html>