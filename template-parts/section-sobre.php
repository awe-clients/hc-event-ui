<?php

/**
 * Template Part: Seção Sobre com Modal de Percursos Condicional
 * Arquitetura: White Label Dinâmico via CMS
 */
$subtitle  = get_theme_mod('sobre_subtitle', 'Networking & Esporte');
$title     = get_theme_mod('sobre_title', 'A Corrida');
$text      = get_theme_mod('sobre_text', 'Sua empresa não precisa correr sozinha.');
$image     = get_theme_mod('sobre_image', '');

// Obtenção dos URLs das imagens de mapa configuradas no Customizer
$mapa_5km  = get_theme_mod('sobre_mapa_5km', '');
$mapa_10km = get_theme_mod('sobre_mapa_10km', '');
$mapa_15km = get_theme_mod('sobre_mapa_15km', '');
?>
<section class="py-24 bg-[var(--bg-light)]" id="prova">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-zinc-200 overflow-hidden shadow-2xl">
            <div class="lg:col-span-7 p-10 md:p-20 flex flex-col justify-center bg-white">
                <div class="mb-10">
                    <span class="color-15km-text font-black text-xs uppercase tracking-[0.4em] mb-4 block">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                    <h2 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none mb-8 color-5km-text">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                    <div class="h-2 w-24 bom-vizinho-gradient mb-10"></div>
                </div>

                <div class="space-y-6 text-zinc-600 leading-relaxed text-lg font-medium">
                    <p><?php echo nl2br(esc_html($text)); ?></p>
                </div>

                <!-- Botões de acionamento do Modal (Renderização Condicional) -->
                <div class="grid grid-cols-3 gap-4 mt-16 pt-10 border-t border-zinc-100 text-white text-center font-black italic uppercase">

                    <?php if (!empty($mapa_5km)) : ?>
                        <a href="<?php echo esc_url($mapa_5km); ?>" class="modal-trigger color-5km-bg p-4 skew-element cursor-pointer hover:brightness-110 transition-all">
                            <span class="unskew">Kit 5Km</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($mapa_10km)) : ?>
                        <a href="<?php echo esc_url($mapa_10km); ?>" class="modal-trigger color-10km-bg p-4 skew-element cursor-pointer hover:brightness-110 transition-all text-[var(--color-5km)]">
                            <span class="unskew">Kit 10Km</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($mapa_15km)) : ?>
                        <a href="<?php echo esc_url($mapa_15km); ?>" class="modal-trigger color-15km-bg p-4 skew-element cursor-pointer hover:brightness-110 transition-all">
                            <span class="unskew">Kit 15Km</span>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

            <div class="lg:col-span-5 relative min-h-[400px] color-5km-bg overflow-hidden">
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" class="absolute inset-0 w-full h-full object-cover" alt="Sobre o Evento">
                <?php endif; ?>
                <div class="absolute inset-0 pointer-events-none" style="background: repeating-radial-gradient(circle at 50% 50%, transparent, transparent 40px, rgba(255, 255, 255, 0.05) 41px, rgba(255, 255, 255, 0.05) 80px);"></div>
            </div>
        </div>
    </div>
</section>

<!-- Estrutura do Modal -->
<div id="imageModal" class="fixed inset-0 z-[100] hidden bg-black/90 flex items-center justify-center opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <button id="closeModal" class="absolute top-6 right-6 text-white hover:text-[var(--brand-cta)] text-5xl font-black transition-colors" aria-label="Fechar">&times;</button>
    <div class="relative w-full max-w-5xl px-4 flex justify-center">
        <img id="modalImage" src="" alt="Mapa do Percurso" class="max-h-[85vh] object-contain shadow-2xl border-4 border-white/10">
    </div>
</div>

<!-- Lógica de Interceção e Renderização -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.modal-trigger');
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementById('closeModal');

        function openModal(event) {
            event.preventDefault();
            const imgSrc = this.getAttribute('href');

            if (imgSrc) {
                modalImg.src = imgSrc;
                modal.classList.remove('hidden');
                setTimeout(() => modal.classList.remove('opacity-0'), 10);
            }
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modalImg.src = '';
            }, 300);
        }

        triggers.forEach(trigger => {
            trigger.addEventListener('click', openModal);
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>