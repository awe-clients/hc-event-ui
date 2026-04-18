<?php

/**
 * Template Name: Erro 404 (Página Não Encontrada)
 */
get_header(); ?>

<main class="antialiased text-zinc-900 bg-zinc-50 min-h-[80vh] pt-32 pb-24 flex items-center justify-center relative overflow-hidden">

    <div class="absolute inset-0 color-5km-bg opacity-5 pattern-vava-vazado"></div>

    <article class="container mx-auto px-6 relative z-10 text-center max-w-3xl">
        <span class="color-10km-text font-black text-sm uppercase tracking-[0.4em] mb-4 block">
            Erro 404
        </span>

        <h1 class="text-7xl md:text-9xl font-black italic uppercase tracking-tighter leading-none color-5km-text mb-6">
            Fora de <br><span class="text-zinc-300">Rota</span>
        </h1>

        <div class="h-2 w-24 coopanest-gradient mx-auto mb-8"></div>

        <p class="text-zinc-600 text-lg leading-relaxed font-medium mb-12">
            O recurso solicitado não foi localizado neste servidor. É possível que o endereço tenha sido digitado incorretamente, ou que o conteúdo tenha sido movido ou removido permanentemente.
        </p>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-yellow-brand color-5km-text px-10 py-5 text-lg font-black uppercase italic skew-element hover:bg-zinc-200 transition-colors shadow-xl">
            <span class="unskew">Retornar à Largada <i class="fas fa-undo ml-2"></i></span>
        </a>
    </article>

</main>

<?php get_footer(); ?>