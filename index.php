<?php get_header(); ?>

<main class="min-h-[70vh] flex items-center justify-center bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 pointer-events-none"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 200px;">
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl mx-auto text-center">

            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-blue-100 text-blue-900 mb-8">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>

            <h1 class="text-6xl md:text-8xl font-black text-blue-900 uppercase italic tracking-tighter mb-4">
                404
            </h1>
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 uppercase tracking-tight mb-6">
                Página não encontrada
            </h2>

            <p class="text-slate-600 text-lg mb-10 leading-relaxed">
                O conteúdo que você está procurando não existe ou foi movido. Tente realizar uma nova busca ou retorne para a página inicial da corrida.
            </p>

            <div class="mb-12">
                <form role="search" method="get" class="flex flex-col md:flex-row gap-3 shadow-sm" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search"
                        class="flex-grow px-6 py-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-900 focus:outline-none text-slate-700"
                        placeholder="O que você procura?"
                        value="<?php echo get_search_query(); ?>"
                        name="s">
                    <button type="submit" class="bg-blue-900 text-white font-black uppercase tracking-tighter px-8 py-4 rounded-xl hover:bg-blue-800 transition-all active:scale-95">
                        Pesquisar
                    </button>
                </form>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center text-blue-900 font-bold uppercase text-sm tracking-widest hover:text-yellow-600 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Voltar para a Home
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>