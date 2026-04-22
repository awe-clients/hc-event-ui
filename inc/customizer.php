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

        $wp_customize->add_setting('hero_title', array('default' => '3 Corrida Coopanest'));
        $wp_customize->add_control('hero_title', array('label' => 'Texto do Título principal', 'section' => 'coopanest_hero_section', 'type' => 'text'));

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
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_image', array('label' => 'Imagem Lateral (620x745px)', 'section' => 'coopanest_sobre_section')));


        // ==========================================
        // 4. INDICADORES DA PROVA
        // ==========================================
        /*** DESCONTINUADO
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

         *****/

        // ==========================================
        // 5. CONFIGURAÇÕES DOS CARDS (LINKS DE PÁGINAS)
        // ==========================================
        $wp_customize->add_section('coopanest_cards_section', array(
            'title'    => 'Cards e Links do Evento',
            'priority' => 34,
        ));

        // Card 1: Percursos
        $wp_customize->add_setting('card_percurso_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_percurso_url', array(
            'label'   => 'Link da Página de Percursos',
            'section' => 'coopanest_cards_section',
            'type'    => 'url',
        ));

        // Card 2: Kit Atleta
        $wp_customize->add_setting('card_kit_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_kit_url', array(
            'label'   => 'Link da Página do Kit',
            'section' => 'coopanest_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_kit_img'); // Mantém a imagem de capa do card
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_kit_img', array(
            'label'   => 'Imagem de Capa (Card Kit)',
            'section' => 'coopanest_cards_section',
        )));

        // Card 3: Regulamento (Página ou PDF)
        $wp_customize->add_setting('card_regulamento_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_regulamento_url', array(
            'label'   => 'Link da Página ou PDF do Regulamento',
            'section' => 'coopanest_cards_section',
            'type'    => 'url',
        ));


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

        $wp_customize->add_setting('footer_text', array('default' => 'Integração esportiva fundamentada no desenvolvimento da padronagem visual VAVA e na saúde médica potiguar.'));
        $wp_customize->add_control('footer_text', array('label' => 'Texto', 'section' => 'coopanest_footer_section', 'type' => 'textarea'));

        $wp_customize->add_setting('footer_logo'); // Mantém a imagem de capa do card
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label'   => 'Logo para ser incluida no footer',
            'section' => 'coopanest_footer_section',
        )));

        $redes = array('instagram', 'facebook', 'youtube');
        foreach ($redes as $rede) {
            $wp_customize->add_setting("footer_$rede", array('default' => ''));
            $wp_customize->add_control("footer_$rede", array('label' => "URL do " . ucfirst($rede), 'section' => 'coopanest_footer_section', 'type' => 'url'));
        }


        // Adicione isto dentro da função coopanest_customize_register($wp_customize)

        $wp_customize->add_section('coopanest_colors_section', array(
            'title'    => 'Cores do Sistema',
            'priority' => 20,
        ));

        $cores_custom = array(
            'brand_cta'    => array('label' => 'Cor Amarela (CTA)', 'default' => '#FFD100'),
            'color_5km'    => array('label' => 'Cor 5km (Azul)', 'default' => '#2e1065'),
            'color_10km'   => array('label' => 'Cor 10km (Verde)', 'default' => '#22c55e'),
            'color_15km'   => array('label' => 'Cor 15km (Roxo)', 'default' => '#7e22ce'),
            'text_main'    => array('label' => 'Texto Principal', 'default' => '#18181b'),
        );

        foreach ($cores_custom as $id => $data) {
            $wp_customize->add_setting($id, array(
                'default'           => $data['default'],
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
                'label'    => $data['label'],
                'section'  => 'coopanest_colors_section',
            )));
        }
    } // FIM DA FUNÇÃO PRINCIPAL
}

// O Hook SEMPRE fora da função
add_action('customize_register', 'coopanest_customize_register');
