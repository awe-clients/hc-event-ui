<?php

/**
 * Customizer da 3ª Corrida COOPANEST-RN
 * Fiel à identidade visual e padronagem VAVA[cite: 1, 8].
 */

function coopanest_customize_register($wp_customize)
{

    // ==========================================
    // 1. CABEÇALHO (HEADER)
    // ==========================================
    $wp_customize->add_section('coopanest_header_section', array(
        'title'    => 'Cabeçalho e Menu',
        'priority' => 30,
    ));

    $wp_customize->add_setting('header_cta_text', array('default' => 'Inscreva-se'));
    $wp_customize->add_control('header_cta_text', array('label' => 'Texto do Botão Principal', 'section' => 'coopanest_header_section', 'type' => 'text'));

    $wp_customize->add_setting('header_cta_link', array('default' => '#'));
    $wp_customize->add_control('header_cta_link', array('label' => 'Link do Botão', 'section' => 'coopanest_header_section', 'type' => 'url'));

    // ==========================================
    // 2. BANNER PRINCIPAL (HERO)
    // ==========================================
    $wp_customize->add_section('coopanest_hero_section', array(
        'title'    => 'Banner Principal (Hero)',
        'priority' => 31,
    ));

    $wp_customize->add_setting('hero_bg_desktop');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_desktop', array('label' => 'Fundo Desktop (1920x1080)', 'section' => 'coopanest_hero_section')));

    $wp_customize->add_setting('hero_bg_mobile');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_mobile', array('label' => 'Fundo Mobile (1080x1920)', 'section' => 'coopanest_hero_section')));

    $wp_customize->add_setting('hero_countdown_date', array('default' => ''));
    $wp_customize->add_control('hero_countdown_date', array('label' => 'Data do Evento (AAAA-MM-DD HH:MM:SS)', 'section' => 'coopanest_hero_section', 'type' => 'text'));

    // ==========================================
    // 3. SEÇÃO SOBRE (SAÚDE & INTEGRAÇÃO)
    // ==========================================
    $wp_customize->add_section('coopanest_sobre_section', array(
        'title'    => 'Sobre o Evento',
        'priority' => 32,
    ));

    $wp_customize->add_setting('sobre_title', array('default' => 'O Evento da Medicina Potiguar'));
    $wp_customize->add_control('sobre_title', array('label' => 'Título Principal', 'section' => 'coopanest_sobre_section', 'type' => 'text'));

    $wp_customize->add_setting('sobre_text', array('default' => 'Baseado no conceito de movimento da marca COOPANEST-RN[cite: 4].'));
    $wp_customize->add_control('sobre_text', array('label' => 'Texto Descritivo', 'section' => 'coopanest_sobre_section', 'type' => 'textarea'));

    // ==========================================
    // 4. INDICADORES E MODALIDADES
    // Cores: 5km (Azul), 10km (Verde), 15km (Roxo)[cite: 12, 22].
    // ==========================================
    $wp_customize->add_section('coopanest_indicadores_section', array(
        'title'    => 'Indicadores e Modalidades',
        'priority' => 33,
    ));

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("ind_label_$i", array('default' => 'Indicador'));
        $wp_customize->add_control("ind_label_$i", array('label' => "Rótulo $i", 'section' => 'coopanest_indicadores_section', 'type' => 'text'));

        $wp_customize->add_setting("ind_value_$i", array('default' => '00'));
        $wp_customize->add_control("ind_value_$i", array('label' => "Valor $i", 'section' => 'coopanest_indicadores_section', 'type' => 'text'));
    }

    // ==========================================
    // 5. CARDS, KIT E REGULAMENTO
    // Uso da Padronagem VAVA[cite: 8].
    // ==========================================
    $wp_customize->add_section('coopanest_cards_section', array(
        'title'    => 'Cards e Modais (Kit/Percurso)',
        'priority' => 34,
    ));

    $wp_customize->add_setting('modal_mapa_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_mapa_img', array('label' => 'Imagem do Percurso', 'section' => 'coopanest_cards_section')));

    $wp_customize->add_setting('modal_kit_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_kit_img', array('label' => 'Imagem do Kit Atleta', 'section' => 'coopanest_cards_section')));

    $wp_customize->add_setting('card_regulamento_pdf', array('default' => '#'));
    $wp_customize->add_control('card_regulamento_pdf', array('label' => 'Link do PDF (Regulamento)', 'section' => 'coopanest_cards_section', 'type' => 'url'));

    // ==========================================
    // 6. NOTÍCIAS E MARCAS
    // ==========================================
    $wp_customize->add_section('coopanest_dinamicos_section', array(
        'title'    => 'Notícias e Marcas',
        'priority' => 35,
    ));

    $wp_customize->add_setting('noticias_title', array('default' => 'Últimas Notícias'));
    $wp_customize->add_control('noticias_title', array('label' => 'Título da Seção', 'section' => 'coopanest_dinamicos_section', 'type' => 'text'));

    // ==========================================
    // 7. RODAPÉ (FOOTER)
    // ==========================================
    $wp_customize->add_section('coopanest_footer_section', array(
        'title'    => 'Rodapé e Redes Sociais',
        'priority' => 36,
    ));

    $wp_customize->add_setting('footer_copyright', array('default' => '3ª Corrida COOPANEST-RN. Todos os direitos reservados. [cite: 1]'));
    $wp_customize->add_control('footer_copyright', array('label' => 'Copyright', 'section' => 'coopanest_footer_section', 'type' => 'text'));

    $redes = array('instagram', 'facebook', 'youtube');
    foreach ($redes as $rede) {
        $wp_customize->add_setting("footer_$rede", array('default' => ''));
        $wp_customize->add_control("footer_$rede", array('label' => "URL do " . ucfirst($rede), 'section' => 'coopanest_footer_section', 'type' => 'url'));
    }
} // Fim da função principal

add_action('customize_register', 'coopanest_customize_register');
