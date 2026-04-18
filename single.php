<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('bg-white min-h-screen'); ?>>
            <header class="container mx-auto px-4 pt-10 pb-8 max-w-3xl">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-blue-700 font-extrabold uppercase text-xs tracking-wider">
                        <?php the_category(', '); ?>
                    </span>
                    <span class="text-gray-300">|</span>
                    <time datetime="<?php echo get_the_date('c'); ?>" class="text-gray-500 text-xs font-medium">
                        <?php echo get_the_date('d/m/Y'); ?> <?php the_time('H\hi'); ?>
                    </time>
                </div>

                <h1 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight mb-6 tracking-tight">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_excerpt()) : ?>
                    <h2 class="text-lg md:text-xl text-gray-600 leading-relaxed mb-8 font-normal">
                        <?php echo get_the_excerpt(); ?>
                    </h2>
                <?php endif; ?>

                <div class="flex flex-col md:flex-row md:items-center justify-between py-6 border-t border-b border-gray-100 gap-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center font-bold text-slate-500 uppercase">
                            <?php echo substr(get_the_author(), 0, 2); ?>
                        </div>
                        <div class="text-sm">
                            <p class="font-bold text-slate-900">Por <?php the_author(); ?></p>
                            <p class="text-gray-500">Natal, RN</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#1877F2] text-white hover:opacity-90 transition-opacity">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://api.whatsapp.com/send?text=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#25D366] text-white hover:opacity-90 transition-opacity">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.54 4.187 1.566 6.02L0 24l6.132-1.608a11.845 11.845 0 005.918 1.57h.005c6.637 0 12.032-5.391 12.036-12.027a11.791 11.791 0 00-3.486-8.452z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <main class="container mx-auto px-4 max-w-3xl pb-24">
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="mb-10">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg']); ?>
                        <?php if (get_the_post_thumbnail_caption()) : ?>
                            <figcaption class="mt-3 text-sm text-gray-500 font-medium">
                                <?php the_post_thumbnail_caption(); ?>
                            </figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>

                <div class="cms-content prose prose-lg prose-slate max-w-none">
                    <?php the_content(); ?>
                </div>
            </main>
        </article>
<?php endwhile;
endif; ?>

<style>
    /* RESET E SOBREPOSIÇÃO CMS */
    .cms-content {
        font-family: 'Inter', sans-serif !important;
        color: #334155 !important;
        /* Slate 700 */
        line-height: 1.8 !important;
    }

    .cms-content p {
        margin-bottom: 1.75rem !important;
        color: #334155 !important;
    }

    .cms-content h2,
    .cms-content h3,
    .cms-content h4 {
        color: #0f172a !important;
        /* Slate 900 */
        font-weight: 800 !important;
        margin-top: 2.5rem !important;
        margin-bottom: 1.25rem !important;
        letter-spacing: -0.025em !important;
        text-transform: none !important;
        /* Evita que o CMS force caps */
    }

    .cms-content ul,
    .cms-content ol {
        margin-bottom: 1.75rem !important;
        padding-left: 1.5rem !important;
    }

    .cms-content li {
        margin-bottom: 0.5rem !important;
    }

    .cms-content strong {
        color: #0f172a !important;
        font-weight: 700 !important;
    }

    /* Imagens dentro do conteúdo */
    .cms-content img {
        border-radius: 0.5rem !important;
        margin: 2rem auto !important;
    }

    @media (max-width: 640px) {
        .cms-content {
            font-size: 1.125rem !important;
            /* 18px */
            line-height: 1.7 !important;
        }
    }

    /* Remove sombras e animações de qualquer elemento injetado */
    .cms-content *,
    article * {
        box-shadow: none !important;
        animation: none !important;
        text-shadow: none !important;
    }
</style>

<?php get_footer(); ?>