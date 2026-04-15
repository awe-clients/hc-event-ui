<?php

/**
 * Template Name: Home Page
 * O arquivo principal da página inicial modular.
 */
get_header();

// Lógica de Status do Evento (Pode ser integrado via ACF)
$status_evento = get_field('status_evento') ?: 'resultados'; // inscricao, kits, resultados
$link_principal = get_field('link_status') ?: '#';
$label_principal = get_field('label_status') ?: 'Resultados';
?>

<main id="primary" class="site-main">

    <section class="bg-blue-900 md:py-12 overflow-hidden relative">
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 250px;">
        </div>

        <div class="container mx-auto px-4 relative z-10">

            <div class="w-full bg-transparent pb-4 border-b border-white/10 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                    <div id="main-cta-container" class="w-full md:w-auto">
                        <a href="<?php echo esc_url($link_principal); ?>"
                            class="<?php echo ($status_evento === 'inscricao') ? 'hidden md:block' : 'block'; ?> text-center bg-[#FFD100] hover:bg-[#E6BC00] text-blue-900 font-black uppercase tracking-tighter px-10 py-4 rounded-lg shadow-xl transition-all transform hover:scale-105 active:scale-95 text-lg">
                            <?php echo esc_html($label_principal); ?>
                        </a>
                    </div>

                    <div class="flex flex-wrap justify-center gap-3">
                        <?php
                        $modalidades = get_field('modalidades_links');
                        if ($modalidades):
                            foreach ($modalidades as $item): ?>
                                <a href="<?php echo esc_url($item['link']); ?>" class="min-w-[80px] text-center px-4 py-2 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-900 transition-colors text-sm">
                                    <?php echo esc_html($item['label']); ?>
                                </a>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white/10">
                <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out">
                    <?php
                    $galeria = get_field('galeria_hero');
                    if ($galeria):
                        foreach ($galeria as $img): ?>
                            <div class="min-w-full relative h-[300px] md:h-[500px]">
                                <img src="<?php echo esc_url($img['url']); ?>" class="w-full h-full object-cover" alt="<?php echo esc_attr($img['alt']); ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/40 to-transparent"></div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>

                <div class="absolute bottom-6 right-8 flex space-x-3 z-10">
                    <?php if ($galeria): count($galeria);
                        for ($i = 0; $i < count($galeria); $i++): ?>
                            <button onclick="moveHero(<?php echo $i; ?>)" class="hero-dot w-3 h-3 rounded-full <?php echo $i === 0 ? 'bg-yellow-400' : 'bg-white/50'; ?> transition-all hover:bg-white"></button>
                    <?php endfor;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-blue-900 pb-20">
        <div class="container mx-auto px-4">
            <div id="extra-info-scroll" class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide gap-6 cursor-grab active:cursor-grabbing select-none py-4">
                <?php
                $infos = get_field('informacoes_extra');
                if ($infos):
                    foreach ($infos as $card): ?>
                        <a href="<?php echo esc_url($card['link']); ?>" class="min-w-[280px] md:min-w-[calc(25%-1.5rem)] snap-center group bg-white hover:bg-blue-700 p-8 rounded-xl shadow-lg transition-all duration-300 flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <?php if ($card['icone_svg']): echo $card['icone_svg'];
                                endif; ?>
                            </div>
                            <h3 class="text-xl font-extrabold text-blue-900 group-hover:text-white uppercase mb-4"><?php echo esc_html($card['titulo']); ?></h3>
                            <p class="text-gray-600 group-hover:text-blue-100 text-sm"><?php echo esc_html($card['descricao']); ?></p>
                        </a>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>

    <section class="relative bg-slate-900 text-white overflow-hidden py-6">
        <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <?php $detalhes = get_field('detalhes_evento'); ?>
            <div>
                <span class="block text-xs uppercase opacity-80 font-bold">Data</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter"><?php echo esc_html($detalhes['data']); ?></span>
            </div>
            <div>
                <span class="block text-xs uppercase opacity-80 font-bold">Local</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter"><?php echo esc_html($detalhes['local']); ?></span>
            </div>
            <div>
                <span class="block text-xs uppercase opacity-80 font-bold">Largada</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter"><?php echo esc_html($detalhes['hora']); ?></span>
            </div>
            <div>
                <span class="block text-xs uppercase opacity-80 font-bold">Kits</span>
                <span class="text-xl font-extrabold uppercase leading-tight tracking-tighter"><?php echo esc_html($detalhes['kits']); ?></span>
            </div>
        </div>
    </section>

    <section id="evento" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icone-corredor.png" alt="Ícone Corredor" class="mx-auto mb-6 h-20">
                <h2 class="text-4xl font-extrabold text-blue-900 mb-6 uppercase"><?php the_title(); ?></h2>
                <div class="prose prose-lg mx-auto text-gray-600 mb-10">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/section', 'news'); ?>
    <?php get_template_part('template-parts/section', 'partners'); ?>

</main>

<?php get_footer(); ?>