/**
 * Scripts Principais - 3ª Corrida COOPANEST-RN
 * Foco: Performance, Acessibilidade e UX.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Controle do Menu Mobile
    const initMobileMenu = () => {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if (!menuButton || !mobileMenu) return;

        menuButton.addEventListener('click', () => {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            
            // Toggle de visibilidade
            mobileMenu.classList.toggle('hidden');
            
            // Atualização de Acessibilidade
            menuButton.setAttribute('aria-expanded', !isExpanded);

            // Alternância de ícone (Hambúrguer vs X)
            if (mobileMenu.classList.contains('hidden')) {
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
            } else {
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            }
        });

        // Fechar menu ao clicar em links (âncoras)
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
                menuButton.setAttribute('aria-expanded', 'false');
            });
        });
    };

    // 2. Scroll Suave para Âncoras
    const initSmoothScroll = () => {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Offset devido ao header sticky
                        behavior: 'smooth'
                    });
                }
            });
        });
    };

    // 3. Efeito Visual no Header ao Rolar
    const initHeaderScroll = () => {
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('shadow-md', 'py-1');
                header.classList.remove('shadow-sm', 'py-0');
            } else {
                header.classList.remove('shadow-md', 'py-1');
                header.classList.add('shadow-sm', 'py-0');
            }
        });
    };

    // Execução das funções
    initMobileMenu();
    initSmoothScroll();
    initHeaderScroll();
});

let currentIdx = 0;
const heroSlider = document.getElementById('hero-slider');
const dots = document.querySelectorAll('.hero-dot');

function moveHero(idx) {
    if (!heroSlider) return;
    currentIdx = idx;
    heroSlider.style.transform = `translateX(-${idx * 100}%)`;
    
    // Atualiza os dots
    dots.forEach((dot, i) => {
        dot.classList.toggle('bg-yellow-400', i === idx);
        dot.classList.toggle('bg-white/50', i !== idx);
    });
}

// Auto-play a cada 5 segundos
if (dots.length > 1) {
    setInterval(() => {
        currentIdx = (currentIdx + 1) % dots.length;
        moveHero(currentIdx);
    }, 5000);
}