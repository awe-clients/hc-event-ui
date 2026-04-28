<?php
/**
 * Footer do Tema - 1ª Corrida do Bom Vizinho
 */
?>

<footer class="bom-vizinho-gradient text-zinc-50 pt-24 pb-12 mt-auto relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#fca5a5 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            <div class="lg:col-span-6">
                <?php if (has_custom_logo()) : the_custom_logo();
                else : ?>
                    <div class="font-black italic text-3xl mb-8 tracking-tighter uppercase">1ª Corrida do Bom Vizinho</div>
                <?php endif; ?>
                <p class="text-red-100 text-lg leading-relaxed max-w-md font-medium">O evento que conecta saúde, comunidade e energia. Natal/RN.</p>
            </div>

            <div class="lg:col-span-3">
                <h4 class="text-yellow-400 font-black uppercase text-xs tracking-widest mb-8">Navegação</h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container'      => false,
                    'menu_class'     => 'space-y-4 font-black uppercase text-[10px] tracking-widest text-red-100',
                    'fallback_cb'    => '__return_false',
                ));
                ?>
            </div>

            <div class="lg:col-span-3">
                <h4 class="text-yellow-400 font-black uppercase text-xs tracking-widest mb-8">Redes Sociais</h4>
                <div class="flex gap-6 text-2xl">
                    <?php
                    $redes = array('instagram', 'facebook', 'youtube');
                    foreach ($redes as $rede) :
                        $url = get_theme_mod("footer_$rede");
                        if (!empty($url)) :
                    ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" class="text-red-200 hover:text-yellow-400 transition-colors" aria-label="<?php echo ucfirst($rede); ?>">
                                <i class="fab fa-<?php echo esc_attr($rede); ?>"></i>
                            </a>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-6 border-t border-red-500/30">
            <div class="text-red-200 text-sm">
                &copy; <?php echo date('Y'); ?> - <?php echo esc_html(get_theme_mod('footer_copyright', '1ª Corrida do Bom Vizinho Rede MAIS. Todos os direitos reservados.')); ?>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-red-200 text-[10px] uppercase font-bold tracking-widest">Organização Padrão:</span>
                <a href="https://hcsports.com.br" target="_blank" rel="noopener" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/hc-sports.png" alt="HC Sports 15 anos" class="h-6">
                    <span class="font-black text-white text-[10px] tracking-widest uppercase">HC Sports 15 Anos</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>