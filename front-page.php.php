<?php get_header(); ?>

<main id="main-content">

    <section class="relative bg-blue-900 pt-32 pb-20 md:pt-48 md:pb-32 overflow-hidden text-white">
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 250px; mix-blend-mode: overlay;">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-8xl font-black uppercase italic tracking-tighter leading-none mb-6">
                    A maior corrida <br>
                    <span class="text-yellow-400 font-black">de Natal chegou</span>
                </h1>
                <p class="text-lg md:text-2xl text-blue-100 mb-10 max-w-2xl font-medium leading-relaxed">
                    Prepare-se para superar seus limites na 3ª Corrida COOPANEST-RN. Percursos técnicos e uma infraestrutura pensada para o seu melhor tempo.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#inscricoes" class="hidden md:block bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-black uppercase tracking-tighter px-12 py-5 rounded-xl shadow-2xl transition-all transform hover:scale-105 active:scale-95 text-lg">
                        Inscreva-se Agora
                    </a>

                    <a href="#sobre" class="border-2 border-white/30 hover:bg-white/10 text-white font-black uppercase tracking-tighter px-10 py-5 rounded-xl transition-all text-lg">
                        Saiba Mais
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre" class="py-20 md:py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/foto-atleta.jpg" alt="Atletas na corrida" class="rounded-3xl shadow-2xl border-4 border-gray-50">
                    <div class="absolute -bottom-6 -right-6 bg-blue-900 text-white p-8 rounded-2xl hidden md:block">
                        <span class="text-4xl font-black text-yellow-400">01 DE JUN</span>
                        <p class="font-bold uppercase tracking-widest text-xs opacity-70">Data do Evento</p>
                    </div>
                </div>
                <div>
                    <span class="text-blue-700 font-black uppercase tracking-widest text-sm mb-4 block italic">Tradição e Esporte</span>
                    <h2 class="text-3xl md:text-5xl font-black text-blue-900 uppercase italic tracking-tighter leading-tight mb-8">
                        Mais que uma prova, <br> uma experiência.
                    </h2>
                    <div class="prose prose-slate prose-lg">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl md:text-5xl font-black text-blue-900 uppercase italic tracking-tighter">Notícias</h2>
                    <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-2">Fique por dentro das novidades</p>
                </div>
                <a href="<?php echo get_post_type_archive_link('post'); ?>" class="text-blue-900 font-black uppercase tracking-tighter border-b-2 border-yellow-400 hover:text-yellow-600 transition-colors hidden md:block">
                    Ver todas as notícias
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $news_query = new WP_Query(array('posts_per_page' => 3));
                if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post();
                        // Reaproveitamos o layout de card criado anteriormente
                        get_template_part('template-parts/content', 'news-card');
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>