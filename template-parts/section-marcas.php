<?php

/**
 * Template Part: Seção de Marcas (Patrocínio, Apoio, etc.)
 */

// Busca as categorias ordenadas pelo meta field 'ordem_categoria'
$categorias = get_terms(array(
    'taxonomy'   => 'tipo_marca',
    'hide_empty' => true,
    'meta_key'   => 'ordem_categoria',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
));

if (!empty($categorias) && !is_wp_error($categorias)) :
    foreach ($categorias as $cat) :
        $marcas = new WP_Query(array(
            'post_type'      => 'marcas',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'tipo_marca',
                    'field'    => 'term_id',
                    'terms'    => $cat->term_id,
                ),
            ),
        ));

        if ($marcas->have_posts()) : ?>
            <section class="section-categoria-marcas">
                <h2><?php echo esc_html($cat->name); ?></h2>
                <div class="grid-marcas">
                    <?php while ($marcas->have_posts()) : $marcas->the_post(); ?>
                        <div class="item-marca">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; 
        wp_reset_postdata();
    endforeach;
endif;
?>