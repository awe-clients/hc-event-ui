<?php

/**
 * Customizer do Tema COOPANEST-RN
 * Aqui definimos todos os campos editáveis para o usuário.
 */

function coopanest_customize_register($wp_customize)
{

    // ==========================================
    // 1. CONFIGURAÇÕES DO CABEÇALHO (HEADER)
    // ==========================================
    $wp_customize->add_section('coopanest_header_section', array(
        'title'    => 'Cabeçalho e Menu',
        'priority' => 30,
    ));

    // Texto do Botão (CTA)
    $wp_customize->add_setting('header_cta_text', array('default' => 'Inscreva-se'));
    $wp_customize->add_control('header_cta_text', array(
        'label'   => 'Texto do Botão Principal',
        'section' => 'coopanest_header_section',
        'type'    => 'text',
    ));

    // Link do Botão (CTA)
    $wp_customize->add_setting('header_cta_link', array('default' => '#'));
    $wp_customize->add_control('header_cta_link', array(
        'label'   => 'Link do Botão',
        'section' => 'coopanest_header_section',
        'type'    => 'url',
    ));

    // Opção para Ocultar o Botão (ex: quando encerrarem as inscrições)
    $wp_customize->add_setting('header_cta_hide', array('default' => false));
    $wp_customize->add_control('header_cta_hide', array(
        'label'   => 'Ocultar Botão Principal?',
        'section' => 'coopanest_header_section',
        'type'    => 'checkbox',
    ));


    // ==========================================
    // 2. CONFIGURAÇÕES DO HERO (BANNER PRINCIPAL)
    // ==========================================
    $wp_customize->add_section('coopanest_hero_section', array(
        'title'    => 'Banner Principal (Hero)',
        'priority' => 31,
    ));

    // Subtítulo (Texto Pequeno)
    $wp_customize->add_setting('hero_subtitle', array('default' => 'Integração e Desempenho'));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => 'Texto Menor (Acima do Título)',
        'section' => 'coopanest_hero_section',
        'type'    => 'text',
    ));

    // Imagem do Hero (Desktop)
    $wp_customize->add_setting('hero_bg_desktop');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_desktop', array(
        'label'       => 'Imagem de Fundo (Desktop)',
        'description' => 'Tamanho ideal: 1920x1080px (Horizontal). Formato WEBP ou JPG otimizado.',
        'section'     => 'coopanest_hero_section',
    )));

    // Imagem do Hero (Mobile)
    $wp_customize->add_setting('hero_bg_mobile');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_mobile', array(
        'label'       => 'Imagem de Fundo (Mobile/Celular)',
        'description' => 'Tamanho ideal: 1080x1920px (Vertical). Evite arquivos pesados.',
        'section'     => 'coopanest_hero_section',
    )));

    // Configurações de Data e Cronômetro
    $wp_customize->add_setting('hero_date_text', array('default' => '15 OUTUBRO'));
    $wp_customize->add_control('hero_date_text', array(
        'label'   => 'Data de Exibição (Ex: 15 OUTUBRO)',
        'section' => 'coopanest_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_countdown_date', array('default' => ''));
    $wp_customize->add_control('hero_countdown_date', array(
        'label'       => 'Data/Hora Alvo do Cronômetro',
        'description' => 'Formato: AAAA-MM-DD HH:MM:SS (Ex: 2026-10-15 06:00:00). Deixe em branco para ocultar.',
        'section'     => 'coopanest_hero_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'coopanest_customize_register');


// ==========================================
// 3. CONFIGURAÇÕES DA SEÇÃO "SOBRE"
// ==========================================
$wp_customize->add_section('coopanest_sobre_section', array(
    'title'    => 'Sobre o Evento',
    'priority' => 32,
));

$wp_customize->add_setting('sobre_subtitle', array('default' => 'Saúde & Integração'));
$wp_customize->add_control('sobre_subtitle', array(
    'label'   => 'Subtítulo',
    'section' => 'coopanest_sobre_section',
    'type'    => 'text',
));

$wp_customize->add_setting('sobre_title', array('default' => 'O Evento da Medicina Potiguar'));
$wp_customize->add_control('sobre_title', array(
    'label'   => 'Título Principal',
    'section' => 'coopanest_sobre_section',
    'type'    => 'text',
));

$wp_customize->add_setting('sobre_text', array('default' => 'A representação em movimento presente na padronagem VAVA reflete a dinâmica e a energia da nossa cooperativa.'));
$wp_customize->add_control('sobre_text', array(
    'label'   => 'Texto Descritivo',
    'section' => 'coopanest_sobre_section',
    'type'    => 'textarea',
));

$wp_customize->add_setting('sobre_image');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_image', array(
    'label'       => 'Imagem Lateral',
    'description' => 'Formato vertical recomendado (ex: 800x1200px).',
    'section'     => 'coopanest_sobre_section',
)));

// ==========================================
// 4. CONFIGURAÇÕES DE INDICADORES
// ==========================================
$wp_customize->add_section('coopanest_indicadores_section', array(
    'title'    => 'Indicadores da Prova',
    'priority' => 33,
));

for ($i = 1; $i <= 4; $i++) {
    $wp_customize->add_setting("ind_icon_$i", array('default' => 'fas fa-check'));
    $wp_customize->add_control("ind_icon_$i", array(
        'label'       => "Ícone $i (Classe FontAwesome)",
        'description' => 'Ex: fas fa-sun, fas fa-mountain, fas fa-heartbeat',
        'section'     => 'coopanest_indicadores_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting("ind_label_$i", array('default' => 'Indicador'));
    $wp_customize->add_control("ind_label_$i", array(
        'label'   => "Rótulo $i",
        'section' => 'coopanest_indicadores_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting("ind_value_$i", array('default' => '00'));
    $wp_customize->add_control("ind_value_$i", array(
        'label'   => "Valor $i",
        'section' => 'coopanest_indicadores_section',
        'type'    => 'text',
    ));
}



// ==========================================
// 5. CONFIGURAÇÕES DOS CARDS E MODAIS
// ==========================================
$wp_customize->add_section('coopanest_cards_section', array(
    'title'    => 'Cards e Modais (Kit/Percurso)',
    'priority' => 34,
));

// Card 1: Mapa do Percurso (Modal)
$wp_customize->add_setting('modal_mapa_img');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_mapa_img', array(
    'label'       => 'Imagem do Mapa (Modal Percursos)',
    'section'     => 'coopanest_cards_section',
    'description' => 'Mapa com os trajetos detalhados.',
)));

// Card 2: Imagem do Kit
$wp_customize->add_setting('card_kit_img');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_kit_img', array(
    'label'       => 'Imagem da Camiseta (Capa do Card)',
    'section'     => 'coopanest_cards_section',
)));

$wp_customize->add_setting('modal_kit_img');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_kit_img', array(
    'label'       => 'Imagem Completa do Kit (Modal Kit)',
    'section'     => 'coopanest_cards_section',
    'description' => 'Imagem mostrando todos os itens do kit.',
)));

// Card 3: Regulamento (PDF)
$wp_customize->add_setting('card_regulamento_pdf', array('default' => '#'));
$wp_customize->add_control('card_regulamento_pdf', array(
    'label'       => 'Link do Regulamento (PDF)',
    'section'     => 'coopanest_cards_section',
    'type'        => 'url',
    'description' => 'Faça o upload do PDF em "Mídia" e cole a URL aqui.',
));

// ==========================================
// 6. CONFIGURAÇÕES DE NOTÍCIAS E MARCAS
// ==========================================
$wp_customize->add_section('coopanest_dinamicos_section', array(
    'title'    => 'Notícias e Marcas',
    'priority' => 35,
));

// Título das Notícias
$wp_customize->add_setting('noticias_title', array('default' => 'Últimas Notícias'));
$wp_customize->add_control('noticias_title', array(
    'label'   => 'Título da Seção de Notícias',
    'section' => 'coopanest_dinamicos_section',
    'type'    => 'text',
));

// Texto do link "Ver todas"
$wp_customize->add_setting('noticias_link_text', array('default' => 'Ler todas as postagens'));
$wp_customize->add_control('noticias_link_text', array(
    'label'   => 'Texto do link para o Blog',
    'section' => 'coopanest_dinamicos_section',
    'type'    => 'text',
));



$wp_customize->add_setting('hero_bg_tablet');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_tablet', array(
    'label'       => 'Imagem de Fundo (Tablet)',
    'description' => 'Tamanho ideal: 1024x1366px.',
    'section'     => 'coopanest_hero_section',
)));


// ==========================================
// 7. CONFIGURAÇÕES DO RODAPÉ (FOOTER)
// ==========================================
$wp_customize->add_section('coopanest_footer_section', array(
    'title'    => 'Rodapé e Redes Sociais',
    'priority' => 36,
));

$wp_customize->add_setting('footer_copyright', array('default' => '3ª Corrida COOPANEST-RN. Todos os direitos reservados.'));
$wp_customize->add_control('footer_copyright', array(
    'label'   => 'Texto de Copyright',
    'section' => 'coopanest_footer_section',
    'type'    => 'text',
));

$redes = array('instagram', 'facebook', 'youtube');
foreach ($redes as $rede) {
    $wp_customize->add_setting("footer_$rede", array('default' => ''));
    $wp_customize->add_control("footer_$rede", array(
        'label'   => "URL do " . ucfirst($rede),
        'section' => 'coopanest_footer_section',
        'type'    => 'url',
    ));
}
