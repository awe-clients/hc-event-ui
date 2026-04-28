<?php

/**
 * Template Part: Seção de Marcas (Patrocínio, Apoio, etc.)
 * Adaptado para: Alta Performance Visual e Eliminação de srcset
 */

// Pega todas as categorias cadastradas em "Tipos de Marca" seguindo a ordem definida
$categorias_marca = get_terms(array(
    'taxonomy'   => 'tipo_marca',
    'hide_empty' => true,
    'meta_key'   => 'ordem_categoria',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
));

// Se não houver categorias, não exibe a seção
if (!empty($categorias_marca) && !is_wp_error($categorias_marca)) :
?>
    <section class="py-24 bg-white border-t border-zinc-100" id="parceiros">
        <div class="container mx-auto px-6">

            <?php foreach ($categorias_marca as $categoria) :
                // Query para buscar as marcas apenas desta categoria
                $marcas_query = new WP_Query(array(
                    'post_type'      => 'marcas',
                    'posts_per_page' => -1, // Traz todas
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'tipo_marca',
                            'field'    => 'slug',
                            'terms'    => $categoria->slug,
                        ),
                    ),
                ));

                if ($marcas_query->have_posts()) :
            ?>
                    <div class="mb-16">
                        <div class="flex items-center gap-6 mb-12">
                            <div class="h-px bg-zinc-200 flex-grow"></div>
                            <span class="color-5km-text font-bold text-sm tracking-[0.2em] uppercase">
                                <?php echo esc_html($categoria->name); ?>
                            </span>
                            <div class="h-px bg-zinc-200 flex-grow"></div>
                        </div>

                        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
                            <?php while ($marcas_query->have_posts()) : $marcas_query->the_post();
                                $alt_text   = get_the_title();
                                $marca_link = get_post_meta(get_the_ID(), '_coopanest_marca_url', true);
                            ?>
                                <div class="group relative flex justify-center items-center p-6 transition duration-500 border border-transparent hover:border-zinc-100">
                                    <?php
                                    if (!empty($marca_link)) echo '<a href="' . esc_url($marca_link) . '" target="_blank" rel="noopener noreferrer" class="block w-full h-full">';

                                    if (has_post_thumbnail()) {
                                        // Busca o tamanho 'marca-grid' que configuramos para não cortar
                                        $imagem_id = get_post_thumbnail_id();
                                        $imagem_data = wp_get_attachment_image_src($imagem_id, 'marca-grid');
                                        $url_otimizada = $imagem_data[0];

                                        // Renderização com container flexível (h-16 ou h-20) e normalização visual
                                        echo '<img src="' . esc_url($url_otimizada) . '" 
                                        alt="' . esc_attr($alt_text) . '" 
                                        class="h-10 md:h-12 w-full object-contain mx-auto" 
                                        style="image-rendering: -webkit-optimize-contrast; transform: translateZ(0);">';
                                    } else {
                                        echo '<span class="font-bold text-zinc-400">' . esc_html($alt_text) . '</span>';
                                    }

                                    if (!empty($marca_link)) echo '</a>';
                                    ?>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
            <?php
                endif;
            endforeach;
            ?>

        </div>
    </section>
<?php endif; ?>