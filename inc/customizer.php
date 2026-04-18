<?php

/**
 * Customizer do Tema COOPANEST-RN
 * Todas as seções devem estar obrigatoriamente dentro desta função.
 */
if (! function_exists('coopanest_customize_register')) {
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

        $wp_customize->add_setting('header_cta_hide', array('default' => false));
        $wp_customize->add_control('header_cta_hide', array('label' => 'Ocultar Botão Principal?', 'section' => 'coopanest_header_section', 'type' => 'checkbox'));


        // ==========================================
        // 2. BANNER PRINCIPAL (HERO)
        // ==========================================
        $wp_customize->add_section('coopanest_hero_section', array(
            'title'    => 'Banner Principal (Hero)',
            'priority' => 31,
        ));

        $wp_customize->add_setting('hero_subtitle', array('default' => 'Integração e Desempenho'));
        $wp_customize->add_control('hero_subtitle', array('label' => 'Texto Menor (Acima do Título)', 'section' => 'coopanest_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_bg_desktop');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_desktop', array('label' => 'Fundo (Desktop 1920x1080px)', 'section' => 'coopanest_hero_section')));

        $wp_customize->add_setting('hero_bg_tablet');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_tablet', array('label' => 'Fundo (Tablet 1024x1366px)', 'section' => 'coopanest_hero_section')));

        $wp_customize->add_setting('hero_bg_mobile');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_mobile', array('label' => 'Fundo (Mobile 1080x1920px)', 'section' => 'coopanest_hero_section')));

        $wp_customize->add_setting('hero_date_text', array('default' => '15 OUTUBRO'));
        $wp_customize->add_control('hero_date_text', array('label' => 'Data de Exibição', 'section' => 'coopanest_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_countdown_date', array('default' => ''));
        $wp_customize->add_control('hero_countdown_date', array('label' => 'Data/Hora Alvo (AAAA-MM-DD HH:MM:SS)', 'section' => 'coopanest_hero_section', 'type' => 'text'));


        // ==========================================
        // 3. SEÇÃO SOBRE
        // ==========================================
        $wp_customize->add_section('coopanest_sobre_section', array(
            'title'    => 'Sobre o Evento',
            'priority' => 32,
        ));

        $wp_customize->add_setting('sobre_subtitle', array('default' => 'Saúde & Integração'));
        $wp_customize->add_control('sobre_subtitle', array('label' => 'Subtítulo', 'section' => 'coopanest_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_title', array('default' => 'O Evento da Medicina Potiguar'));
        $wp_customize->add_control('sobre_title', array('label' => 'Título Principal', 'section' => 'coopanest_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_text', array('default' => 'A representação em movimento presente na padronagem VAVA reflete a dinâmica e a energia da nossa cooperativa.'));
        $wp_customize->add_control('sobre_text', array('label' => 'Texto Descritivo', 'section' => 'coopanest_sobre_section', 'type' => 'textarea'));

        $wp_customize->add_setting('sobre_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_image', array('label' => 'Imagem Lateral', 'section' => 'coopanest_sobre_section')));


        // ==========================================
        // 4. INDICADORES DA PROVA
        // ==========================================
        $wp_customize->add_section('coopanest_indicadores_section', array(
            'title'    => 'Indicadores da Prova',
            'priority' => 33,
        ));

        for ($i = 1; $i <= 4; $i++) {
            $wp_customize->add_setting("ind_icon_$i", array('default' => 'fas fa-check'));
            $wp_customize->add_control("ind_icon_$i", array('label' => "Ícone $i", 'section' => 'coopanest_indicadores_section', 'type' => 'text'));

            $wp_customize->add_setting("ind_label_$i", array('default' => 'Indicador'));
            $wp_customize->add_control("ind_label_$i", array('label' => "Rótulo $i", 'section' => 'coopanest_indicadores_section', 'type' => 'text'));

            $wp_customize->add_setting("ind_value_$i", array('default' => '00'));
            $wp_customize->add_control("ind_value_$i", array('label' => "Valor $i", 'section' => 'coopanest_indicadores_section', 'type' => 'text'));
        }


        // ==========================================
        // 5. CARDS E MODAIS
        // ==========================================
        $wp_customize->add_section('coopanest_cards_section', array(
            'title'    => 'Cards e Modais',
            'priority' => 34,
        ));

        $wp_customize->add_setting('modal_mapa_img');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_mapa_img', array('label' => 'Mapa (Modal)', 'section' => 'coopanest_cards_section')));

        $wp_customize->add_setting('card_kit_img');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_kit_img', array('label' => 'Camiseta (Capa do Card)', 'section' => 'coopanest_cards_section')));

        $wp_customize->add_setting('modal_kit_img');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'modal_kit_img', array('label' => 'Kit Completo (Modal)', 'section' => 'coopanest_cards_section')));

        $wp_customize->add_setting('card_regulamento_pdf', array('default' => '#'));
        $wp_customize->add_control('card_regulamento_pdf', array('label' => 'URL do PDF (Regulamento)', 'section' => 'coopanest_cards_section', 'type' => 'url'));


        // ==========================================
        // 6. NOTÍCIAS E MARCAS
        // ==========================================
        $wp_customize->add_section('coopanest_dinamicos_section', array(
            'title'    => 'Notícias e Marcas',
            'priority' => 35,
        ));

        $wp_customize->add_setting('noticias_title', array('default' => 'Últimas Notícias'));
        $wp_customize->add_control('noticias_title', array('label' => 'Título da Seção de Notícias', 'section' => 'coopanest_dinamicos_section', 'type' => 'text'));

        $wp_customize->add_setting('noticias_link_text', array('default' => 'Ler todas as postagens'));
        $wp_customize->add_control('noticias_link_text', array('label' => 'Texto do link para o Blog', 'section' => 'coopanest_dinamicos_section', 'type' => 'text'));


        // ==========================================
        // 7. RODAPÉ (FOOTER)
        // ==========================================
        $wp_customize->add_section('coopanest_footer_section', array(
            'title'    => 'Rodapé e Redes Sociais',
            'priority' => 36,
        ));

        $wp_customize->add_setting('footer_copyright', array('default' => '3ª Corrida COOPANEST-RN. Todos os direitos reservados.'));
        $wp_customize->add_control('footer_copyright', array('label' => 'Copyright', 'section' => 'coopanest_footer_section', 'type' => 'text'));

        $redes = array('instagram', 'facebook', 'youtube');
        foreach ($redes as $rede) {
            $wp_customize->add_setting("footer_$rede", array('default' => ''));
            $wp_customize->add_control("footer_$rede", array('label' => "URL do " . ucfirst($rede), 'section' => 'coopanest_footer_section', 'type' => 'url'));
        }
    } // FIM DA FUNÇÃO PRINCIPAL
}

// O Hook SEMPRE fora da função
add_action('customize_register', 'coopanest_customize_register');
