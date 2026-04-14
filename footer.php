<footer class="bg-slate-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pb-12 border-b border-white/10">

            <div class="flex flex-col items-center md:items-start">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-coopanest-white.png" alt="3ª Corrida COOPANEST-RN" class="h-16 mb-6">
                <p class="text-gray-400 text-sm text-center md:text-left leading-relaxed">
                    A maior celebração do esporte e integração da COOPANEST-RN.
                </p>
            </div>

            <nav class="flex flex-col items-center md:items-start" aria-label="Navegação Secundária">
                <h2 class="text-yellow-400 font-black uppercase tracking-widest text-sm mb-6">Links Úteis</h2>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'space-y-4 text-center md:text-left text-gray-300 text-sm',
                ));
                ?>
            </nav>

            <div class="flex flex-col items-center md:items-end">
                <h2 class="text-yellow-400 font-black uppercase tracking-widest text-sm mb-6">Siga-nos</h2>
                <div class="flex space-x-4">
                    <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-blue-600 transition-all">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-gray-500 text-xs">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos os direitos reservados.
            </div>
            <div class="flex items-center gap-3">
                <span class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Produzido por:</span>
                <a href="https://hcsports.com.br" target="_blank" rel="noopener">
                    <img src="https://www.hcsports.com.br/lovable-uploads/a0c35a1e-3016-496d-9041-44bbdaf85f79.png" alt="HC Sports" class="h-6">
                </a>
            </div>
        </div>
    </div>
</footer>

<?php if (!is_page('inscricoes')) : ?>
    <div class="md:hidden fixed bottom-0 left-0 w-full p-4 bg-white/80 backdrop-blur-md border-t border-gray-200 z-[100]">
        <a href="#" class="block w-full text-center bg-[#FFD100] text-blue-900 font-black uppercase py-4 rounded-xl shadow-lg">
            Inscreva-se Agora
        </a>
    </div>
<?php endif; ?>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        const isHidden = menu.classList.toggle('hidden');
        icon.setAttribute('d', isHidden ? 'M4 6h16M4 12h16m-7 6h7' : 'M6 18L18 6M6 6l12 12');
    }
</script>

<?php wp_footer(); ?>
</body>

</html>