/**
* Template principal do tema Crion Eventos.
*
* A abertura do documento, os metadados e wp_head() pertencem ao header.php.
* O fechamento do documento e wp_footer() pertencem ao footer.php.
* Os arquivos CSS devem ser registrados e carregados pelo functions.php.
*
* @package Crion_Eventos
*/

defined( 'ABSPATH' ) || exit;

get_header();

$whatsapp = 'https://wa.me/5584991102514';
$whatsapp_message = add_query_arg(
'text',
'Olá, Crion! Quero conversar sobre um evento.',
$whatsapp
);
$email = 'contato@crioneventos.com.br';
$instagram = 'https://www.instagram.com/crion_eventos/';
?>

<a href="#contato" class="skip-link">
  <?php esc_html_e('Ir para o contato', 'crion-eventos'); ?>
</a>

<main id="conteudo" class="min-h-screen overflow-hidden bg-[#fafaf8] text-[#171717]">
  <section class="bg-brand-gradient relative isolate min-h-[100svh] text-white" aria-labelledby="titulo-principal">
    <div class="grain absolute inset-0 opacity-[0.055]" aria-hidden="true"></div>
    <div class="orb orb-one" aria-hidden="true"></div>
    <div class="orb orb-two" aria-hidden="true"></div>

    <header class="relative z-20 mx-auto flex w-full max-w-[90rem] items-center justify-between px-5 py-6 sm:px-8 lg:px-12 lg:py-8">
      <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Crion Promoções e Eventos — início', 'crion-eventos'); ?>" class="focus-ring rounded-md">
        <img
          src="<?php echo esc_url(get_theme_file_uri('assets/media/crion-logo.png')); ?>"
          width="640"
          height="272"
          alt="<?php esc_attr_e('Crion Promoções e Eventos', 'crion-eventos'); ?>"
          class="h-auto w-[154px] sm:w-[176px]"
          fetchpriority="high">
      </a>

      <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="focus-ring group inline-flex min-h-11 items-center gap-2 rounded-full border border-white/35 bg-white/10 px-4 text-sm font-semibold backdrop-blur-sm transition hover:border-white/70 hover:bg-white/18" aria-label="<?php esc_attr_e('Acompanhar a Crion no Instagram — abre em nova aba', 'crion-eventos'); ?>">
        <svg aria-hidden="true" viewBox="0 0 24 24" class="size-5 fill-none stroke-current stroke-[1.8]" focusable="false">
          <rect x="3" y="3" width="18" height="18" rx="5"></rect>
          <circle cx="12" cy="12" r="4"></circle>
          <path stroke-linecap="round" d="M17.5 6.5h.01"></path>
        </svg>
        <span class="hidden sm:inline">@crion_eventos</span>
      </a>
    </header>

    <div class="relative z-10 mx-auto grid w-full max-w-[90rem] items-center gap-12 px-5 pb-12 pt-8 sm:px-8 md:pt-12 lg:min-h-[calc(100svh-120px)] lg:grid-cols-[minmax(0,1.02fr)_minmax(420px,.98fr)] lg:gap-8 lg:px-12 lg:pb-16 lg:pt-0">
      <div class="relative max-w-3xl">
        <p class="reveal reveal-1 mb-6 flex items-center gap-3 text-xs font-bold uppercase tracking-[0.2em] text-white/82 sm:text-sm">
          <span class="h-px w-8 bg-[#ffbd2e]" aria-hidden="true"></span>
          <?php esc_html_e('Uma nova experiência está sendo produzida', 'crion-eventos'); ?>
        </p>

        <h1 id="titulo-principal" class="reveal reveal-2 max-w-[12ch] text-[clamp(3.2rem,8.3vw,7.75rem)] font-bold leading-[.88] tracking-[-.055em]">
          <?php esc_html_e('Tudo começa antes de', 'crion-eventos'); ?>
          <span class="relative inline-block text-[#ffbd2e]">
            <?php esc_html_e('acontecer', 'crion-eventos'); ?><span class="title-stroke" aria-hidden="true"></span>
          </span>.
        </h1>

        <p class="reveal reveal-3 mt-8 max-w-[620px] text-[clamp(1.05rem,1.5vw,1.3rem)] leading-relaxed text-white/88">
          <?php esc_html_e('Estamos preparando o novo site da Crion com estratégia, criatividade e atenção a cada detalhe. Enquanto isso, nossa equipe continua pronta para realizar o seu próximo evento.', 'crion-eventos'); ?>
        </p>

        <div class="reveal reveal-4 mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
          <a href="<?php echo esc_url($whatsapp_message); ?>" target="_blank" rel="noopener noreferrer" class="focus-ring group inline-flex min-h-13 items-center justify-center gap-3 rounded-full bg-[#ff4e11] px-6 font-bold text-white shadow-[0_12px_35px_rgba(70,12,0,.25)] transition hover:-translate-y-0.5 hover:bg-[#e9430b] hover:shadow-[0_18px_42px_rgba(70,12,0,.32)]">
            <svg aria-hidden="true" viewBox="0 0 24 24" class="size-5 fill-current" focusable="false">
              <path d="M12 2a9.8 9.8 0 0 0-8.4 14.8L2.2 22l5.3-1.4A9.9 9.9 0 1 0 12 2Zm0 17.8c-1.5 0-3-.4-4.2-1.2l-.3-.2-3.1.8.8-3-.2-.3A7.8 7.8 0 1 1 12 19.8Zm4.3-5.8c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1l-.7.9c-.1.2-.3.2-.5.1a6.5 6.5 0 0 1-1.9-1.2 7.2 7.2 0 0 1-1.3-1.7c-.1-.2 0-.4.1-.5l.4-.5.2-.4c.1-.2 0-.4 0-.5l-.8-1.9c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.3.3-1 1-1 2.4s1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.4-.6 1.6-1.1.2-.6.2-1 .1-1.1-.1-.2-.3-.3-.6-.4Z"></path>
            </svg>
            <?php esc_html_e('Planeje seu evento com a gente', 'crion-eventos'); ?>
            <svg aria-hidden="true" viewBox="0 0 24 24" class="size-4 fill-none stroke-current stroke-2" focusable="false">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"></path>
            </svg>
          </a>

          <a href="<?php echo esc_url('mailto:' . antispambot($email)); ?>" class="focus-ring inline-flex min-h-13 items-center justify-center rounded-full px-5 font-semibold text-white underline decoration-white/35 underline-offset-8 transition hover:decoration-white">
            <?php esc_html_e('Enviar um e-mail', 'crion-eventos'); ?>
          </a>
        </div>
      </div>

      <div class="visual-stage reveal reveal-3 relative mx-auto w-full max-w-[650px] pb-10 pt-4 lg:justify-self-end lg:pb-0">
        <div class="brush-word brush-top" aria-hidden="true"><?php esc_html_e('planejamento', 'crion-eventos'); ?></div>
        <figure class="photo-card photo-main">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/media/eventos-corporativos.webp')); ?>" width="1218" height="670" alt="<?php esc_attr_e('Eventos corporativos produzidos pela Crion, com palcos, palestras e público', 'crion-eventos'); ?>" class="h-full w-full object-cover" fetchpriority="high">
        </figure>
        <figure class="photo-card photo-small">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/media/acoes-promocionais.webp')); ?>" width="1222" height="686" alt="<?php esc_attr_e('Equipe e público participando de ações promocionais produzidas pela Crion', 'crion-eventos'); ?>" class="h-full w-full object-cover" loading="lazy">
        </figure>
        <div class="brush-word brush-bottom" aria-hidden="true"><?php esc_html_e('produção', 'crion-eventos'); ?></div>
        <div class="doodle-arrow" aria-hidden="true">↗</div>
      </div>
    </div>

    <a href="#contato" aria-label="<?php esc_attr_e('Ver formas de contato', 'crion-eventos'); ?>" class="focus-ring absolute bottom-5 left-1/2 z-20 hidden -translate-x-1/2 rounded-full p-3 text-white/70 transition hover:text-white lg:block">
      <svg aria-hidden="true" viewBox="0 0 24 24" class="size-6 animate-bounce fill-none stroke-current stroke-2" focusable="false">
        <path stroke-linecap="round" stroke-linejoin="round" d="m7 10 5 5 5-5"></path>
      </svg>
    </a>
  </section>

  <section id="contato" aria-labelledby="contato-titulo" class="relative bg-[#fafaf8] px-5 py-20 sm:px-8 sm:py-28 lg:px-12">
    <div class="contact-arc" aria-hidden="true"></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1fr_.82fr] lg:items-end">
      <div>
        <p class="mb-5 text-sm font-bold uppercase tracking-[.18em] text-[#ff4e11]"><?php esc_html_e('Fale com a Crion', 'crion-eventos'); ?></p>
        <h2 id="contato-titulo" class="max-w-[12ch] text-[clamp(2.6rem,5.8vw,5.5rem)] font-bold leading-[.96] tracking-[-.045em] text-[#2c4899]"><?php esc_html_e('Seu próximo evento não precisa esperar.', 'crion-eventos'); ?></h2>
        <p class="mt-6 max-w-xl text-lg leading-relaxed text-[#4e4e4e]"><?php esc_html_e('Conte o que você está planejando. Nossa equipe está disponível para entender o desafio e construir os próximos passos com você.', 'crion-eventos'); ?></p>
      </div>

      <address class="not-italic">
        <ul class="divide-y divide-[#2c4899]/12 border-y border-[#2c4899]/12">
          <li>
            <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer" class="contact-link focus-ring group">
              <span><?php esc_html_e('WhatsApp', 'crion-eventos'); ?></span><strong>(84) 99110-2514</strong><svg aria-hidden="true" viewBox="0 0 24 24" class="size-4 fill-none stroke-current stroke-2" focusable="false">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"></path>
              </svg>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url('mailto:' . antispambot($email)); ?>" class="contact-link focus-ring group">
              <span><?php esc_html_e('E-mail', 'crion-eventos'); ?></span><strong><?php echo esc_html(antispambot($email)); ?></strong><svg aria-hidden="true" viewBox="0 0 24 24" class="size-4 fill-none stroke-current stroke-2" focusable="false">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"></path>
              </svg>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="contact-link focus-ring group">
              <span><?php esc_html_e('Instagram', 'crion-eventos'); ?></span><strong>@crion_eventos</strong><svg aria-hidden="true" viewBox="0 0 24 24" class="size-4 fill-none stroke-current stroke-2" focusable="false">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"></path>
              </svg>
            </a>
          </li>
        </ul>
      </address>
    </div>
  </section>

  <footer class="border-t border-[#2c4899]/10 bg-[#fafaf8] px-5 py-7 text-sm text-[#565656] sm:px-8 lg:px-12">
    <div class="mx-auto flex max-w-7xl flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
      <p><?php esc_html_e('Crion Promoções & Eventos · Natal, Rio Grande do Norte', 'crion-eventos'); ?></p>
      <p><?php esc_html_e('Estratégia, criatividade e execução.', 'crion-eventos'); ?></p>
    </div>
  </footer>
</main>

<?php
get_footer();
