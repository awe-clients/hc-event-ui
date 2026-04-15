<?php
$news_title    = get_theme_mod('hb_news_title', 'Últimas Notícias');
$news_subtitle = get_theme_mod('hb_news_subtitle', 'Acompanhe as novidades e informativos da prova.');
?>

<section id="noticias" class="bg-gray-50 py-24">
    <div class="container mx-auto px-4">

        <div class="max-w-3xl mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-blue-900 uppercase italic tracking-tighter mb-4">
                <?php echo esc_html($news_title); ?>
            </h2>
            <p class="text-gray-500 text-lg font-medium">
                <?php echo esc_html($news_subtitle); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $news_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group">
                        <div class="aspect-video overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php endif; ?>
                        </div>

                        <div class="p-8">
                            <time class="text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-900 px-3 py-1 rounded-full mb-4 inline-block">
                                <?php echo get_the_date('d M Y'); ?>
                            </time>

                            <h3 class="text-xl font-extrabold text-blue-900 mb-4 leading-tight group-hover:text-blue-700 transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="text-gray-600 text-sm mb-6 line-clamp-2">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center font-black text-xs uppercase tracking-tighter text-blue-900 hover:text-yellow-600 transition-colors">
                                Ler notícia completa
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-gray-400 italic">Nenhum comunicado publicado no momento.</p>';
            endif;
            ?>
        </div>

        <div class="mt-16 text-center">
            <a href="<?php echo get_post_type_archive_link('post'); ?>" class="inline-block border-2 border-blue-900 text-blue-900 font-black uppercase px-10 py-4 rounded-lg hover:bg-blue-900 hover:text-white transition-all text-sm tracking-widest">
                Ver todas as notícias
            </a>
        </div>
        <div class="mt-16 text-center">
            <a href="<?php echo get_post_type_archive_link('post'); ?>"
                class="inline-block border-2 border-blue-900 text-blue-900 font-black uppercase px-10 py-4 rounded-lg hover:bg-blue-900 hover:text-white transition-all text-sm tracking-widest">
                Ver todas as notícias
            </a>
        </div>
    </div>
</section>