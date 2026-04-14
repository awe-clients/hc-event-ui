<?php get_header();
$home_id = get_home_id();
$theme_uri = get_template_directory_uri();
?>

<main>
    <section class="w-full bg-brand-1-950 bg-cover bg-center relative h-[800px] xl:h-[900px]"
        style="background-image: url('<?= $theme_uri ?>/dist/img/bg-img.png');">
        <div class="container pt-[200px]">
            <h1 class="text-brand-1-50 text-[36px] font-semibold mb-4">
                <?= safe_get_field('hero_title', $home_id) ?>
            </h1>
            <p class="text-neutral-0 text-[22px]">
                <?= safe_get_field('hero_description', $home_id) ?>
            </p>

            <hr class="w-[32px] bg-white my-10">

            <div class="grid grid-cols-3 gap-2">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div>
                        <h3 class="text-brand-1-50 text-[40px] font-semibold">
                            <?= safe_get_field("hero_att_{$i}_title", $home_id) ?>
                        </h3>
                        <p class="text-neutral-0">
                            <?= safe_get_field("hero_att_{$i}_description", $home_id) ?>
                        </p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <section class="container py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
        <?php
        $query = new WP_Query(['post_type' => 'atributos', 'posts_per_page' => -1]);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div>
                    <img src="<?= safe_get_field('attribute_icon'); ?>" alt="" class="w-12 mb-4">
                    <h5 class="font-bold"><?php the_title(); ?></h5>
                    <p><?= safe_get_field('attribute_description'); ?></p>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>