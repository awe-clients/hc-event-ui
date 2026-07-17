<?php

/**
 * Template Part: Seção de Notícias (Últimos 3 Posts)
 */
$section_title = get_theme_mod('noticias_title', 'Últimas Notícias');
$link_text     = get_theme_mod('noticias_link_text', 'Ler todas as postagens');
?>
<section class="py-24 bg-white" id="noticias">
    <div class="container mx-auto px-6">

        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <span class="color-5km-text font-black text-xs uppercase tracking-[0.4em] mb-4 block">Fique por dentro</span>
                <h2 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none text-zinc-900">
                    <?php
                    // Separa a última palavra para estilizá-la com cor mais clara
                    $words = explode(' ', $section_title);
                    $last_word = array_pop($words);
                    echo esc_html(implode(' ', $words)) . ' <br><span class="text-zinc-400">' . esc_html($last_word) . '</span>';
                    ?>
                </h2>
            </div>
            <?php

            /**

            <a href="<?php echo get_post_type_archive_link('post'); ?>" class="hide group flex items-center gap-4 text-xs font-black uppercase tracking-widest color-5km-text border-b-2 border-zinc-200 pb-2 hover:border-yellow-400 transition-all">
                <?php echo esc_html($link_text); ?> <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
            </a>
             **/

            ?>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php
            $news_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                    <article class="group cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="relative overflow-hidden mb-6 aspect-[4/5] bg-zinc-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition duration-400 scale-100 group-hover:scale-110']); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/600x800/1e3a8a/FFFFFF?text=COOPANEST" class="w-full h-full object-cover transition duration-400 scale-100 group-hover:scale-110" alt="Placeholder">
                            <?php endif; ?>

                            <div class="absolute top-0 left-0 bg-yellow-brand p-6 skew-element -translate-x-2">
                                <div class="unskew text-center color-5km-text">
                                    <p class="text-2xl font-black leading-none"><?php echo get_the_date('d'); ?></p>
                                    <p class="text-[10px] font-bold uppercase"><?php echo get_the_date('M'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-black uppercase italic leading-tight color-5km-text group-hover:opacity-90 transition-colors mb-4">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-zinc-700 text-sm leading-relaxed line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                            </p>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-zinc-500 italic">Nenhuma notícia publicada ainda.</p>';
            endif;
            ?>
        </div>
    </div>
</section>