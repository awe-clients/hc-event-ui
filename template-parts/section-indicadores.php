<?php

/**
 * Template Part: Seção Indicadores
 */
?>
<section class="pb-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php for ($i = 1; $i <= 4; $i++) :
                $icon  = get_theme_mod("ind_icon_$i", 'fas fa-check');
                $label = get_theme_mod("ind_label_$i", 'Indicador');
                $value = get_theme_mod("ind_value_$i", '00');

                if ($i === 4) :
            ?>
                    <div class="p-8 bg-yellow-brand text-center flex flex-col justify-center skew-element">
                        <div class="unskew">
                            <p class="text-[10px] font-black uppercase tracking-widest opacity-80"><?php echo esc_html($label); ?></p>
                            <p class="text-3xl font-black italic"><?php echo esc_html($value); ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="p-8 bg-zinc-50 border border-zinc-100 text-center">
                        <i class="<?php echo esc_attr($icon); ?> text-blue-900 mb-4 block text-2xl"></i>
                        <p class="text-[10px] font-black uppercase tracking-widest text-zinc-400"><?php echo esc_html($label); ?></p>
                        <p class="text-3xl font-black italic color-5km-text"><?php echo esc_html($value); ?></p>
                    </div>
            <?php
                endif;
            endfor;
            ?>
        </div>
    </div>
</section>