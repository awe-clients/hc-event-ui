<?php

/**
 * Template part: Barra de Informações Cruciais
 */
$info_data    = get_theme_mod('hb_info_data', '15 Out 2026');
$info_local   = get_theme_mod('hb_info_local', 'Natal, RN');
$info_largada = get_theme_mod('hb_info_largada', '06:00h');
$info_kits    = get_theme_mod('hb_info_kits', 'Limitados');
?>

<section class="relative bg-slate-900 text-white overflow-hidden">
    <div class="w-full py-6 min-h-[90px] flex items-center">
        <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <div>
                <span class="block text-xs uppercase opacity-80 font-bold tracking-wider">Data</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter">
                    <?php echo esc_html($info_data); ?>
                </span>
            </div>
            <div class="border-l border-white/10 md:border-l-0">
                <span class="block text-xs uppercase opacity-80 font-bold tracking-wider">Local</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter">
                    <?php echo esc_html($info_local); ?>
                </span>
            </div>
            <div class="border-t border-white/10 pt-4 md:pt-0 md:border-t-0 md:border-l border-white/10">
                <span class="block text-xs uppercase opacity-80 font-bold tracking-wider">Largada</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter">
                    <?php echo esc_html($info_largada); ?>
                </span>
            </div>
            <div class="border-t border-white/10 pt-4 md:pt-0 md:border-t-0 md:border-l border-white/10">
                <span class="block text-xs uppercase opacity-80 font-bold tracking-wider">Kits</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter">
                    <?php echo esc_html($info_kits); ?>
                </span>
            </div>
        </div>
    </div>
</section>