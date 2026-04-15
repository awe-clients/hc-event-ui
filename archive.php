<?php get_header(); ?>

<section class="relative bg-blue-900 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 250px; mix-blend-mode: overlay;">
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <nav class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-4" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:underline">Home</a> / <span>Notícias</span>
        </nav>
        <h1 class="text-4xl md:text-6xl font-black text-white uppercase italic tracking-tighter leading-none">
            <?php
            if (is_category()) :
                single_cat_title();
            elseif (is_tag()) :
                single_tag_title();
            else :
                echo 'Comunicados <span class="text-yellow-400">&</span> Notícias';
            endif;
            ?>
        </h1>
    </div>
</section>

<main class="bg-gray-50 py-20">
    <div class="container mx-auto px-4">

        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col'); ?>>

                        <div class="aspect-video overflow-hidden bg-gray-200">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-news.jpg" alt="<?php the_title(); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php endif; ?>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <div class="flex items-center gap-4 mb-4">
                                <time datetime="<?php echo get_the_date('c'); ?>"
                                    class="text-[10px] font-black uppercase tracking-widest bg-blue-100 text-blue-900 px-3 py-1 rounded-full">
                                    <?php echo get_the_date('d M Y'); ?>
                                </time>
                                <span class="text-[10px] font-bold text-gray-400 uppercase italic">
                                    <?php
                                    $categories = get_the_category();
                                    if (! empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                            </div>

                            <h2 class="text-xl font-extrabold text-blue-900 mb-4 group-hover:text-blue-700 transition-colors leading-tight">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="mt-auto">
                                <a href="<?php the_permalink(); ?>"
                                    class="inline-flex items-center font-black text-xs uppercase tracking-tighter text-blue-900 group-hover:text-yellow-600 transition-colors">
                                    Ler notícia completa
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

            </div>

            <nav class="mt-16 flex justify-center" aria-label="Paginação">
                <?php
                echo paginate_links(array(
                    'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format'       => '?paged=%#%',
                    'current'      => max(1, get_query_var('paged')),
                    'total'        => $wp_query->max_num_pages,
                    'type'         => 'list',
                    'prev_next'    => false,
                    'before_page_number' => '',
                    'after_page_number'  => '',
                ));
                ?>
            </nav>

        <?php else : ?>
            <div class="text-center py-20">
                <p class="text-gray-500 font-bold uppercase tracking-widest">Nenhuma notícia encontrada.</p>
            </div>
        <?php endif; ?>

    </div>
</main>

<style>
    /* Ajuste para a paginação nativa do WP herdar o estilo do template */
    ul.page-numbers {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    ul.page-numbers li a,
    ul.page-numbers li span {
        display: flex;
        width: 2.5rem;
        height: 2.5rem;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        background-color: white;
        border: 1px solid #e2e8f0;
        color: #1e3a8a;
        font-weight: 700;
        transition: all 0.3s;
    }

    ul.page-numbers li span.current {
        background-color: #1e3a8a;
        color: white;
        box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.2);
    }

    ul.page-numbers li a:hover {
        background-color: #1e3a8a;
        color: white;
    }
</style>

<?php get_footer(); ?>