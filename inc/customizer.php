<?php

/**
 * Customizer do Tema 1ª Corrida do Bom Vizinho - Rede MAIS
 * Todas as seções devem estar obrigatoriamente dentro desta função.
 */
if (! function_exists('bom_vizinho_customize_register')) {
    function bom_vizinho_customize_register($wp_customize)
    {

        // ==========================================
        // 0. CORES DO SISTEMA (DESIGN TOKENS)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_colors_section', array(
            'title'    => 'Cores do Sistema',
            'priority' => 20,
        ));

        $cores_custom = array(
            'brand_cta'    => array('label' => 'Cor Amarela (CTA)', 'default' => '#facc15'),
            'color_5km'    => array('label' => 'Cor 5km (Vermelho Escuro)', 'default' => '#7f1d1d'),
            'color_10km'   => array('label' => 'Cor 10km (Vermelho Médio)', 'default' => '#b91c1c'),
            'color_15km'   => array('label' => 'Cor 15km (Vermelho Vibrante)', 'default' => '#ef4444'),
            'text_main'    => array('label' => 'Texto Principal', 'default' => '#18181b'),
            'bg_light'     => array('label' => 'Fundo do Site', 'default' => '#fafafa'),
        );

        foreach ($cores_custom as $id => $data) {
            $wp_customize->add_setting($id, array(
                'default'           => $data['default'],
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'refresh',
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
                'label'    => $data['label'],
                'section'  => 'bom_vizinho_colors_section',
            )));
        }

        // ==========================================
        // 0.1 CONFIGURAÇÕES DE SEO E PERFORMANCE
        // ==========================================
        $wp_customize->add_section('base_theme_seo_section', array(
            'title'    => 'Configurações de SEO e Performance',
            'priority' => 25,
        ));

        $wp_customize->add_setting('seo_meta_description', array('default' => 'O evento que conecta saúde, comunidade e energia. Natal/RN.'));
        $wp_customize->add_control('seo_meta_description', array(
            'label'   => 'Meta Descrição Global',
            'section' => 'base_theme_seo_section',
            'type'    => 'textarea',
        ));

        $wp_customize->add_setting('coopanest_status_evento', array('default' => 'offline'));
        $wp_customize->add_control('coopanest_status_evento', array(
            'label'   => 'Status do Evento (online/offline)',
            'section' => 'base_theme_seo_section',
            'type'    => 'select',
            'choices' => array(
                'online'  => 'Publicado (Online)',
                'offline' => 'Espera (Offline)'
            )
        ));

        // ==========================================
        // 1. CABEÇALHO (HEADER)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_header_section', array(
            'title'    => 'Cabeçalho e Menu',
            'priority' => 30,
        ));

        $wp_customize->add_setting('header_cta_text', array('default' => 'Inscreva-se'));
        $wp_customize->add_control('header_cta_text', array('label' => 'Texto do Botão Principal', 'section' => 'bom_vizinho_header_section', 'type' => 'text'));

        $wp_customize->add_setting('header_cta_link', array('default' => '#'));
        $wp_customize->add_control('header_cta_link', array('label' => 'Link do Botão', 'section' => 'bom_vizinho_header_section', 'type' => 'url'));

        $wp_customize->add_setting('header_cta_hide', array('default' => false));
        $wp_customize->add_control('header_cta_hide', array('label' => 'Ocultar Botão Principal?', 'section' => 'bom_vizinho_header_section', 'type' => 'checkbox'));


        // ==========================================
        // 2. BANNER PRINCIPAL (HERO)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_hero_section', array(
            'title'    => 'Banner Principal (Hero)',
            'priority' => 31,
        ));

        $wp_customize->add_setting('hero_subtitle', array('default' => 'O evento que conecta saúde, comunidade e energia.'));
        $wp_customize->add_control('hero_subtitle', array('label' => 'Texto Menor (Acima do Título)', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_bg_desktop');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_desktop', array('label' => 'Fundo (Desktop 1920x1080px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_bg_tablet');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_tablet', array('label' => 'Fundo (Tablet 1024x1366px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_bg_mobile');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_mobile', array('label' => 'Fundo (Mobile 1080x1920px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_date_text', array('default' => '02 DE AGOSTO'));
        $wp_customize->add_control('hero_date_text', array('label' => 'Data de Exibição', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_countdown_date', array('default' => '2026-08-02 06:00:00'));
        $wp_customize->add_control('hero_countdown_date', array('label' => 'Data/Hora Alvo (AAAA-MM-DD HH:MM:SS)', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));


        // ==========================================
        // 3. SEÇÃO SOBRE
        // ==========================================
        $wp_customize->add_section('bom_vizinho_sobre_section', array(
            'title'    => 'Sobre o Evento',
            'priority' => 32,
        ));

        $wp_customize->add_setting('sobre_subtitle', array('default' => 'Saúde & Comunidade'));
        $wp_customize->add_control('sobre_subtitle', array('label' => 'Subtítulo', 'section' => 'bom_vizinho_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_title', array('default' => 'A Corrida da Rede MAIS'));
        $wp_customize->add_control('sobre_title', array('label' => 'Título Principal', 'section' => 'bom_vizinho_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_text', array('default' => 'Participe da 1ª Corrida do Bom Vizinho e conecte-se com a energia da nossa comunidade.'));
        $wp_customize->add_control('sobre_text', array('label' => 'Texto Descritivo', 'section' => 'bom_vizinho_sobre_section', 'type' => 'textarea'));

        $wp_customize->add_setting('sobre_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_image', array('label' => 'Imagem Lateral (620x745px)', 'section' => 'bom_vizinho_sobre_section')));

        // ==========================================
        // 5. CONFIGURAÇÕES DOS CARDS (LINKS DE PÁGINAS)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_cards_section', array(
            'title'    => 'Cards e Links do Evento',
            'priority' => 34,
        ));

        // Card 1: Percursos
        $wp_customize->add_setting('card_percurso_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_percurso_url', array(
            'label'   => 'Link da Página de Percursos',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        // Card 2: Kit Atleta
        $wp_customize->add_setting('card_kit_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_kit_url', array(
            'label'   => 'Link da Página do Kit',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_kit_img'); // Mantém a imagem de capa do card
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_kit_img', array(
            'label'   => 'Imagem de Capa (Card Kit)',
            'section' => 'bom_vizinho_cards_section',
        )));

        // Card 3: Regulamento (Página ou PDF)
        $wp_customize->add_setting('card_regulamento_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_regulamento_url', array(
            'label'   => 'Link da Página ou PDF do Regulamento',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));


        // ==========================================
        // 6. NOTÍCIAS E MARCAS
        // ==========================================
        $wp_customize->add_section('bom_vizinho_dinamicos_section', array(
            'title'    => 'Notícias e Marcas',
            'priority' => 35,
        ));

        $wp_customize->add_setting('noticias_title', array('default' => 'Últimas Atualizações'));
        $wp_customize->add_control('noticias_title', array('label' => 'Título da Seção de Notícias', 'section' => 'bom_vizinho_dinamicos_section', 'type' => 'text'));

        $wp_customize->add_setting('noticias_link_text', array('default' => 'Ler todas as postagens'));
        $wp_customize->add_control('noticias_link_text', array('label' => 'Texto do link para o Blog', 'section' => 'bom_vizinho_dinamicos_section', 'type' => 'text'));


        // ==========================================
        // 7. RODAPÉ (FOOTER)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_footer_section', array(
            'title'    => 'Rodapé e Redes Sociais',
            'priority' => 36,
        ));

        $wp_customize->add_setting('footer_copyright', array('default' => '1ª Corrida do Bom Vizinho Rede MAIS. Todos os direitos reservados.'));
        $wp_customize->add_control('footer_copyright', array('label' => 'Copyright', 'section' => 'bom_vizinho_footer_section', 'type' => 'text'));

        $redes = array('instagram', 'facebook', 'youtube');
        foreach ($redes as $rede) {
            $wp_customize->add_setting("footer_$rede", array('default' => ''));
            $wp_customize->add_control("footer_$rede", array('label' => "URL do " . ucfirst($rede), 'section' => 'bom_vizinho_footer_section', 'type' => 'url'));
        }
    } // FIM DA FUNÇÃO PRINCIPAL
}

// O Hook SEMPRE fora da função
add_action('customize_register', 'bom_vizinho_customize_register');