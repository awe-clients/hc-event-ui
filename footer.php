<?php

/**
 * Footer do Tema - Estrutura White Label
 * Desenvolvido para a plataforma Hora de Correr
 */

// Extração de metadados customizáveis com fallbacks genéricos e agnósticos
$footer_text = get_theme_mod('footer_text', 'Conectando pessoas e expandindo horizontes através do esporte.');
$footer_logo = get_theme_mod('footer_logo', '');

?>

<!-- Utilização de classe de gradiente baseada nas variáveis dinâmicas do header -->
<footer class="text-zinc-50 pt-24 pb-12 mt-auto relative overflow-hidden" style="background: linear-gradient(135deg, var(--color-5km) 0%, var(--color-15km) 100%);">

    <!-- Textura de fundo convertida para branco com opacidade (neutra para qualquer cor principal) -->
    <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            <div class="lg:col-span-6">

                <?php
                // Renderização condicional da logo customizada ou fallback dinâmico (White Label)
                if (!empty($footer_logo)) : ?>
                    <img src="<?php echo esc_url($footer_logo); ?>" class="h-16 mb-8 object-contain" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <?php elseif (has_custom_logo()) :
                    the_custom_logo();
                else : ?>
                    <div class="font-black italic text-3xl mb-8 tracking-tighter uppercase">
                        <?php echo esc_html(get_bloginfo('name')); ?>
                    </div>
                <?php endif; ?>

                <p class="text-white/80 text-lg leading-relaxed max-w-md font-medium">
                    <?php echo wp_kses_post($footer_text); ?>
                </p>
            </div>

            <div class="lg:col-span-3 hidden">
                <h4 class="font-black uppercase text-xs tracking-widest mb-8" style="color: var(--color-10km);">Navegação</h4>
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
                <h4 class="font-black uppercase text-xs tracking-widest mb-8 text-[#FFF]">Redes Sociais</h4>
                <div class="flex gap-6 text-2xl">
                    <?php
                    $redes = array('instagram', 'facebook', 'youtube');
                    foreach ($redes as $rede) :
                        $url = get_theme_mod("footer_$rede");
                        if (!empty($url)) :
                    ?>
                            <!-- Transição de cor herdando a variável de apoio (ex: Amarelo do Sebrae) -->
                            <a href="<?php echo esc_url($url); ?>" target="_blank" class="text-white/60 transition-colors hover:text-[var(--brand-color)]" aria-label="<?php echo ucfirst($rede); ?>" onmouseover="this.style.color='var(--color-10km)'" onmouseout="this.style.color=''">
                                <i class="fab fa-<?php echo esc_attr($rede); ?>"></i>
                            </a>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-6 border-t border-white/20">
            <div class="text-white/60 text-sm font-medium tracking-wide">
                &copy; <?php echo date('Y'); ?> - <?php echo esc_html(get_theme_mod('footer_copyright', get_bloginfo('name') . '. Todos os direitos reservados.')); ?>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-white/50 text-[10px] uppercase font-bold tracking-widest">Tecnologia:</span>
                <a href="https://horadecorrer.com.br" target="_blank" rel="noopener" class="flex items-center hover:opacity-80 transition-opacity">
                    <span class="font-black text-white text-[12px] uppercase tracking-wider">Hora de Correr</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>