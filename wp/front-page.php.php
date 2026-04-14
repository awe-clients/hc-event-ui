<?php

/**
 * Template Name: Home Page
 */
get_header();

// Pega o ID da home centralizado
$home_id = get_home_id();
$theme_uri = get_template_directory_uri();
?>

<main>
    <section class="w-full bg-brand-1-950 bg-cover bg-center relative h-[800px] xl:h-[900px]"
        style="background-image: url('<?= $theme_uri ?>/dist/img/bg-img.png');">

        <div class="container pt-[200px]">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-8">
                    <div class="w-full md:w-[70%]">
                        <h1 class="text-brand-1-50 text-[36px] font-semibold mb-4">
                            <?= get_field('hero_title', $home_id) ?>
                        </h1>
                        <p class="text-neutral-0 text-[22px]">
                            <?= get_field('hero_description', $home_id) ?>
                        </p>
                    </div>

                    <hr class="w-[32px] bg-white my-10">

                    <div class="w-full grid grid-cols-3 gap-2">
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <div>
                                <h3 class="text-brand-1-50 text-[40px] font-semibold">
                                    <?= get_field("hero_att_{$i}_title", $home_id) ?>
                                </h3>
                                <p class="text-neutral-0">
                                    <?= get_field("hero_att_{$i}_description", $home_id) ?>
                                </p>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-8">
        <div class="container py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
                <?php
                $atributos = new WP_Query(['post_type' => 'atributos', 'posts_per_page' => -1, 'order' => 'ASC']);
                if ($atributos->have_posts()) :
                    while ($atributos->have_posts()) : $atributos->the_post(); ?>
                        <div class="flex flex-col">
                            <div class="icon-bg mb-4">
                                <img src="<?= get_field('attribute_icon'); ?>" alt="<?php the_title(); ?>" class="w-12 h-12">
                            </div>
                            <h5 class="text-neutral-950 font-semibold text-xl mb-2"><?php the_title(); ?></h5>
                            <p class="text-neutral-500"><?= get_field('attribute_description'); ?></p>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <hr class="w-full h-[4px] bg-[#CBD6E2] opacity-35">
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'section-intro', ['home_id' => $home_id]); ?>

    <section id="Servicos" class="my-8 bg-[#F6F6F8]">
        <div class="container py-16">
            <h2 class="font-semibold text-[40px] mb-8 text-[#0D05D2]">Veja como funciona as nossas soluções</h2>
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <?php
                $solucoes = new WP_Query(['post_type' => 'post', 'posts_per_page' => 4]);
                if ($solucoes->have_posts()) :
                    while ($solucoes->have_posts()) : $solucoes->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="block group">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('medium_large'); ?>"
                                    class="mb-4 w-full h-[300px] object-cover rounded-md transition-transform group-hover:scale-105" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <h5 class="font-semibold text-xl text-[#0D05D2] mb-2"><?php the_title(); ?></h5>
                            <div class="text-neutral-500 text-sm line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F6F6F8] py-24">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <p class="text-neutral-500 text-sm uppercase mb-2">Tire suas dúvidas</p>
                    <h2 class="text-neutral-950 font-semibold text-[40px] leading-tight mb-4">Trabalhamos com o que há de mais moderno no mercado</h2>
                    <p class="text-xl text-neutral-500 mb-10">Separamos algumas perguntas e respostas que podem te ajudar.</p>

                    <div class="flex flex-col gap-6">
                        <a href="mailto:<?= get_field('email', $home_id) ?>" class="flex items-center gap-4 hover:underline">
                            <img src="<?= $theme_uri ?>/dist/svg/doubts-outline.svg" alt="Email">
                            <div>
                                <p class="font-semibold">Dúvidas?</p>
                                <p class="text-sm">Envie uma mensagem para nosso time</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="faq-container">
                    <?php get_template_part('template-parts/content', 'faq-loop'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>