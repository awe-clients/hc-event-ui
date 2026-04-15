<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>

            <section class="relative bg-blue-900 pt-32 pb-16 overflow-hidden">
                <div class="absolute inset-0 opacity-10 pointer-events-none"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 200px; mix-blend-mode: overlay;">
                </div>

                <div class="container mx-auto px-4 relative z-10 max-w-4xl">
                    <h1 class="text-4xl md:text-6xl font-black text-white uppercase italic tracking-tighter text-center md:text-left leading-none">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </section>

            <main class="bg-white py-16 md:py-24">
                <div class="container mx-auto px-4 max-w-4xl">

                    <div class="cms-page-content prose prose-slate max-w-none">
                        <?php the_content(); ?>
                    </div>

                    <?php if (get_field('ativar_download_pdf')) : ?>
                        <div class="mt-16 p-8 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6 shadow-sm">
                            <div>
                                <p class="text-blue-900 font-bold uppercase text-sm tracking-tight">
                                    <?php the_field('titulo_arquivo'); ?>
                                </p>
                                <p class="text-gray-500 text-xs"><?php the_field('subtitulo_arquivo'); ?></p>
                            </div>
                            <a href="<?php the_field('arquivo_pdf'); ?>" target="_blank"
                                class="inline-flex items-center bg-blue-900 text-white px-8 py-3 rounded-lg font-bold text-sm uppercase tracking-tighter hover:bg-blue-800 transition-all active:scale-95">
                                Baixar Arquivo (PDF)
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </main>
        </article>
<?php endwhile;
endif; ?>

<style>
    /* RESET E FORMATAÇÃO RIGOROSA DO CONTEÚDO CMS */
    .cms-page-content {
        font-family: 'Inter', sans-serif !important;
        color: #334155 !important;
        /* Slate 700 */
        line-height: 1.8 !important;
    }

    /* Estilo de parágrafos e introdução */
    .cms-page-content p {
        margin-bottom: 1.75rem !important;
    }

    .cms-page-content>p:first-of-type {
        font-size: 1.25rem !important;
        /* Text-xl */
        color: #64748b !important;
        /* Slate 500 */
        font-weight: 500 !important;
        line-height: 1.625 !important;
        margin-bottom: 3rem !important;
    }

    /* Cabeçalhos internos (H2, H3) */
    .cms-page-content h2,
    .cms-page-content h3 {
        color: #1e3a8a !important;
        /* Blue 900 */
        font-weight: 800 !important;
        text-transform: uppercase !important;
        margin-top: 3rem !important;
        margin-bottom: 1.5rem !important;
        letter-spacing: -0.025em !important;
    }

    .cms-page-content h2 {
        font-size: 1.875rem !important;
    }

    /* 30px */

    /* Listas e Marcadores */
    .cms-page-content ul {
        list-style-type: disc !important;
        margin-bottom: 2rem !important;
        padding-left: 1.5rem !important;
    }

    .cms-page-content li {
        margin-bottom: 0.75rem !important;
    }

    .cms-page-content li::marker {
        color: #1d4ed8 !important;
        /* Blue 700 */
    }

    .cms-page-content strong {
        color: #1e3a8a !important;
        /* Blue 900 */
        font-weight: 700 !important;
    }

    /* Limpeza de estilos indesejados do editor */
    .cms-page-content * {
        box-shadow: none !important;
        animation: none !important;
        text-shadow: none !important;
    }
</style>

<?php get_footer(); ?>