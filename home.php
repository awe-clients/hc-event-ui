<?php

/**
 * Template Name: Arquivo de Notícias (Blog)
 */
get_header(); ?>

<main class="antialiased text-zinc-900 bg-zinc-50 min-h-screen pt-32 pb-24">

    <header class="container mx-auto px-6 mb-16 text-center">
        <span class="color-5km-text font-black text-xs uppercase tracking-[0.4em] mb-4 block">Informativos</span>
        <h1 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none text-zinc-900 mb-6">
            Mural de <br><span class="text-zinc-400">Notícias</span>
        </h1>
        <div class="h-2 w-24 coopanest-gradient mx-auto mb-6"></div>
        <p class="text-zinc-500 max-w-2xl mx-auto font-medium">Acompanhe as últimas novidades, dicas de preparação e comunicados oficiais da 3ª Corrida COOPANEST-RN.</p>
    </header>

    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article class="group cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="relative overflow-hidden mb-6 aspect-[4/5] bg-zinc-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition duration-400 scale-100 group-hover:scale-110', 'alt' => get_the_title()]); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/600x800/1e3a8a/FFFFFF?text=COOPANEST" class="w-full h-full object-cover transition duration-400 scale-100 group-hover:scale-110" alt="Sem imagem">
                            <?php endif; ?>

                            <div class="absolute top-0 left-0 bg-yellow-brand p-6 skew-element -translate-x-2 shadow-lg">
                                <div class="unskew text-center color-5km-text">
                                    <p class="text-2xl font-black leading-none"><?php echo get_the_date('d'); ?></p>
                                    <p class="text-[10px] font-bold uppercase"><?php echo get_the_date('M'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black uppercase italic leading-tight color-5km-text group-hover:opacity-70 transition-colors mb-4">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-zinc-500 text-sm leading-relaxed line-clamp-3 mb-6">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <span class="text-xs font-black uppercase tracking-widest color-10km-text">Ler mais <i class="fas fa-arrow-right ml-2"></i></span>
                        </div>
                    </article>

                <?php endwhile;
            else : ?>
                <div class="col-span-3 text-center py-20">
                    <p class="text-xl text-zinc-500 font-bold">Nenhum conteúdo encontrado no momento.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-16 flex justify-center gap-4 pagination-links font-black uppercase text-sm tracking-widest">
            <?php
            echo paginate_links(array(
                'prev_text' => '<i class="fas fa-chevron-left mr-2"></i> Anterior',
                'next_text' => 'Próxima <i class="fas fa-chevron-right ml-2"></i>',
            ));
            ?>
        </div>
    </div>
</main>

<style>
    /* Estilo rápido para a paginação nativa do WP */
    .pagination-links a,
    .pagination-links span {
        padding: 10px 20px;
        border: 2px solid #e5e7eb;
        color: #1e3a8a;
        transition: all 0.3s;
    }

    .pagination-links .current {
        background-color: #1e3a8a;
        color: white;
        border-color: #1e3a8a;
    }

    .pagination-links a:hover {
        border-color: #1e3a8a;
    }
</style>

<?php get_footer(); ?>