<section class="bg-blue-900 pb-20">
    <div class="container mx-auto px-4">
        <div id="quick-links-scroll" class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide gap-6 cursor-grab active:cursor-grabbing select-none py-4">

            <?php
            for ($i = 1; $i <= 4; $i++) :
                $icon  = get_theme_mod("hb_quick_icon_$i");
                $title = get_theme_mod("hb_quick_title_$i");
                $desc  = get_theme_mod("hb_quick_desc_$i");
                $link  = get_theme_mod("hb_quick_link_$i", '#');

                if (!empty($title)) :
            ?>
                    <a href="<?php echo esc_url($link); ?>" class="min-w-[280px] md:min-w-[calc(25%-1.5rem)] snap-center group bg-white hover:bg-blue-700 p-8 rounded-xl shadow-lg transition-all duration-300 flex flex-col items-center text-center">

                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <?php if ($icon) : ?>
                                <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" class="w-8 h-8 object-contain">
                            <?php else : ?>
                                <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            <?php endif; ?>
                        </div>

                        <h3 class="text-xl font-extrabold text-blue-900 group-hover:text-white uppercase mb-4 transition-colors">
                            <?php echo esc_html($title); ?>
                        </h3>
                        <p class="text-gray-600 group-hover:text-blue-100 text-sm transition-colors leading-relaxed">
                            <?php echo esc_html($desc); ?>
                        </p>
                    </a>
            <?php
                endif;
            endfor;
            ?>

        </div>
    </div>
</section>