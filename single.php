<?php

/**
 * Template Name: Post Único (Notícia)
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main class="antialiased text-zinc-900 bg-white min-h-screen pt-24 pb-24">

            <header class="relative w-full h-[50vh] min-h-[400px] bg-zinc-900 flex items-center justify-center overflow-hidden mb-16">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', ['class' => 'absolute inset-0 w-full h-full object-cover opacity-40']); ?>
                <?php else : ?>
                    <div class="absolute inset-0 coopanest-gradient opacity-80 pattern-vava-vazado"></div>
                <?php endif; ?>

                <div class="absolute inset-0 bg-blue-900/60 mix-blend-multiply"></div>

                <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl pt-10">
                    <div class="inline-block bg-yellow-brand text-blue-900 px-4 py-2 font-black text-xs uppercase tracking-widest skew-element mb-6">
                        <span class="unskew"><?php echo get_the_date('d \d\e F \d\e Y'); ?></span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter leading-none text-white shadow-sm">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </header>

            <article class="container mx-auto px-6 max-w-3xl">
                <div class="cms-content text-lg text-zinc-600 leading-relaxed font-medium">
                    <?php the_content(); ?>
                </div>

                <div class="mt-16 pt-8 border-t border-zinc-200 flex justify-between items-center">
                    <a href="<?php echo get_post_type_archive_link('post'); ?>" class="color-5km-text font-black uppercase text-xs tracking-widest hover:text-yellow-500 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar para Notícias
                    </a>

                    <div class="flex gap-4">
                        <span class="text-xs font-black uppercase tracking-widest text-zinc-400">Compartilhar:</span>
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="color-10km-text hover:opacity-70"><i class="fab fa-whatsapp text-lg"></i></a>
                    </div>
                </div>
            </article>

        </main>

<?php endwhile;
endif; ?>

<style>
    /* Reset Tipográfico rigoroso para o conteúdo do CMS (Gutenberg/Classic) */
    .cms-content h2,
    .cms-content h3,
    .cms-content h4 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        font-style: italic;
        text-transform: uppercase;
        color: #1e3a8a;
        margin-top: 2.5em;
        margin-bottom: 1em;
        line-height: 1.1;
    }

    .cms-content h2 {
        font-size: 2.5rem;
    }

    .cms-content p {
        margin-bottom: 1.5em;
    }

    .cms-content ul {
        list-style-type: disc;
        padding-left: 1.5em;
        margin-bottom: 1.5em;
    }

    .cms-content a {
        color: #22c55e;
        font-weight: 700;
        text-decoration: underline;
    }

    .cms-content img {
        border-radius: 8px;
        margin: 2em 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
</style>

<?php get_footer(); ?>