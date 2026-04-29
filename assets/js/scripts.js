document.addEventListener('DOMContentLoaded', function() {

    // 1. Lógica do Menu Responsivo
    const menuBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Previne comportamento padrão do botão
            
            // Alterna visibilidade
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
            
            // Bloqueia/Desbloqueia rolagem do eixo Y
            document.body.classList.toggle('overflow-hidden');
        });
    }


    const wrapper = document.getElementById('countdown-wrapper');
    if (!wrapper) return;

    const targetDate = new Date(wrapper.dataset.date).getTime();
    const label = document.getElementById('countdown-label');
    const timerDisplay = document.getElementById('timer');

    const updateTimer = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            clearInterval(updateTimer);
            label.innerText = "O GRANDE DIA CHEGOU!";
            timerDisplay.innerHTML = '<div class="w-full text-center py-2">LARGADA AUTORIZADA</div>';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').innerText = String(days).padStart(2, '0');
        document.getElementById('hours').innerText = String(hours).padStart(2, '0');
        document.getElementById('mins').innerText = String(minutes).padStart(2, '0');
        document.getElementById('secs').innerText = String(seconds).padStart(2, '0');
    }, 1000);

    
});


// Função para abrir os Modais (Kit e Percursos)
function openModal(type) {
    const modal = document.getElementById('site-modal');
    const content = document.getElementById('modal-content');
    
    // Mostra o Modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Evita que o fundo role

    if (type === 'kit') {
        content.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <img src="${modalData.kitImg}" class="w-full object-contain" alt="Kit Atleta Completo">
                <div>
                    <h2 class="text-4xl font-black italic uppercase mb-6 color-5km-text">Kit Oficial</h2>
                    <p class="text-gray-600 mb-8 font-medium">Modelos baseados nas cores Azul (5km), Verde (10km) e Roxo (15km), incorporando a padronagem VAVA com foco em performance.</p>
                    <ul class="space-y-4 font-bold uppercase text-sm text-zinc-700">
                        <li><i class="fas fa-check color-10km-text mr-2"></i> Camiseta com Tecnologia Dry</li>
                        <li><i class="fas fa-check color-10km-text mr-2"></i> Medalha Exclusiva em Metal</li>
                        <li><i class="fas fa-check color-10km-text mr-2"></i> Número de Peito & Chip</li>
                        <li><i class="fas fa-check color-10km-text mr-2"></i> Sacochila Institucional</li>
                    </ul>
                </div>
            </div>
        `;
    } else if (type === 'percursos') {
        content.innerHTML = `
            <h2 class="text-4xl font-black italic uppercase mb-6 text-center color-5km-text">Percursos Técnicos</h2>
            <img src="${modalData.mapaImg}" class="w-full border-4 border-gray-100 mb-8" alt="Mapa do Percurso">
            <div class="grid grid-cols-3 gap-4 text-center color-5km-text">
                <div class="p-4 bg-gray-50 rounded"><p class="text-[10px] uppercase font-bold text-zinc-500">Hidratação</p><p class="font-black">A cada 2km</p></div>
                <div class="p-4 bg-gray-50 rounded"><p class="text-[10px] uppercase font-bold text-zinc-500">Ambulância</p><p class="font-black">Pontos Fixos</p></div>
                <div class="p-4 bg-gray-50 rounded"><p class="text-[10px] uppercase font-bold text-zinc-500">Piso</p><p class="font-black">Asfalto</p></div>
            </div>
        `;
    }
}

// Função para fechar o Modal
function closeModal() {
    document.getElementById('site-modal').classList.add('hidden');
    document.body.style.overflow = 'auto'; // Restaura a rolagem do site
}

// Fechar modal clicando fora da caixa branca
document.getElementById('site-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});