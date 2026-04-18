<?php

/**
 * Template Name: Página Estática (Ex: Regulamento)
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main class="antialiased text-zinc-900 bg-zinc-50 min-h-screen pt-32 pb-24">

            <article class="container mx-auto px-6 max-w-4xl bg-white p-10 md:p-16 border border-zinc-200 shadow-xl">

                <header class="mb-12 border-b border-zinc-100 pb-10">
                    <span class="color-10km-text font-black text-xs uppercase tracking-[0.4em] mb-4 block">Institucional</span>
                    <h1 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter leading-none color-5km-text">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="cms-content text-lg text-zinc-600 leading-relaxed font-medium">
                    <?php the_content(); ?>
                </div>

                <?php
                $download_url = get_post_meta(get_the_ID(), '_coopanest_download_url', true);
                if (!empty($download_url)) :
                ?>
                    <div class="mt-16 p-8 bg-zinc-50 border border-zinc-200 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div>
                            <h4 class="color-5km-text font-black uppercase italic text-xl mb-1 tracking-tighter">Documento Anexo</h4>
                            <p class="text-zinc-500 text-sm font-medium">Faça o download do arquivo oficial para leitura offline.</p>
                        </div>
                        <a href="<?php echo esc_url($download_url); ?>" target="_blank" class="color-15km-bg text-white px-8 py-4 skew-element font-black uppercase italic text-sm hover:opacity-80 transition-colors whitespace-nowrap">
                            <span class="unskew">Baixar Arquivo <i class="fas fa-file-download ml-2"></i></span>
                        </a>
                    </div>
                <?php endif; ?>

            </article>
        </main>

<?php endwhile;
endif; ?>

<style>
    .cms-content h2,
    .cms-content h3,
    .cms-content h4 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        font-style: italic;
        text-transform: uppercase;
        color: #1e3a8a;
        margin-top: 2em;
        margin-bottom: 0.5em;
        line-height: 1.1;
    }

    .cms-content h2 {
        font-size: 2rem;
    }

    .cms-content p {
        margin-bottom: 1.5em;
    }

    .cms-content ul {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 1.5em;
    }

    .cms-content ul li {
        position: relative;
        padding-left: 1.5em;
        margin-bottom: 0.5em;
    }

    .cms-content ul li::before {
        content: '\f054';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #FFD100;
        font-size: 0.8em;
    }

    .cms-content a {
        color: #2e1065;
        font-weight: 700;
        text-decoration: underline;
    }
</style>

<?php get_footer(); ?>