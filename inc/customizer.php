<?php

/**
 * Customizer do Tema 1ª Corrida do Empreendedor - SEBRAE RN
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

        // Rótulos atualizados para a nova identidade visual. As IDs originais foram mantidas para estabilidade do código.
        $cores_custom = array(
            'brand_cta'    => array('label' => 'Cor de Destaque (Magenta)', 'default' => '#e81c62'),
            'color_5km'    => array('label' => 'Cor Primária (Azul Institucional)', 'default' => '#123774'),
            'color_10km'   => array('label' => 'Cor de Apoio 1 (Amarelo)', 'default' => '#f9db3d'),
            'color_15km'   => array('label' => 'Cor de Apoio 2 (Ciano)', 'default' => '#3b93a5'),
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

        $wp_customize->add_setting('seo_meta_description', array('default' => 'Toda grande conquista é uma soma de pequenas vitórias. Participe da Corrida do Empreendedor em Natal/RN.'));
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

        $wp_customize->add_setting('hero_subtitle', array('default' => '1ª EDIÇÃO'));
        $wp_customize->add_control('hero_subtitle', array('label' => 'Texto Menor (Acima do Título)', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_bg_desktop');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_desktop', array('label' => 'Fundo (Desktop 1920x1080px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_bg_tablet');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_tablet', array('label' => 'Fundo (Tablet 1024x1366px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_bg_mobile');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_mobile', array('label' => 'Fundo (Mobile 1080x1920px)', 'section' => 'bom_vizinho_hero_section')));

        $wp_customize->add_setting('hero_date_text', array('default' => '24 DE OUTUBRO'));
        $wp_customize->add_control('hero_date_text', array('label' => 'Data de Exibição', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));

        $wp_customize->add_setting('hero_countdown_date', array('default' => '2026-10-24 06:00:00'));
        $wp_customize->add_control('hero_countdown_date', array('label' => 'Data/Hora Alvo (AAAA-MM-DD HH:MM:SS)', 'section' => 'bom_vizinho_hero_section', 'type' => 'text'));


        // ==========================================
        // 3. SEÇÃO SOBRE
        // ==========================================
        $wp_customize->add_section('bom_vizinho_sobre_section', array(
            'title'    => 'Sobre o Evento',
            'priority' => 32,
        ));

        $wp_customize->add_setting('sobre_subtitle', array('default' => 'Networking & Esporte'));
        $wp_customize->add_control('sobre_subtitle', array('label' => 'Subtítulo', 'section' => 'bom_vizinho_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_title', array('default' => 'A Corrida do Empreendedor'));
        $wp_customize->add_control('sobre_title', array('label' => 'Título Principal', 'section' => 'bom_vizinho_sobre_section', 'type' => 'text'));

        $wp_customize->add_setting('sobre_text', array('default' => 'Sua empresa não precisa correr sozinha. Olhe ao redor. Participe da 1ª Corrida do Empreendedor e expanda a sua rede de contatos em movimento.'));
        $wp_customize->add_control('sobre_text', array('label' => 'Texto Descritivo', 'section' => 'bom_vizinho_sobre_section', 'type' => 'textarea'));

        $wp_customize->add_setting('sobre_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_image', array('label' => 'Imagem Lateral (620x745px)', 'section' => 'bom_vizinho_sobre_section')));

        // Controles de Imagem para os Mapas de Percurso (Modal)
        $wp_customize->add_setting('sobre_mapa_5km');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_mapa_5km', array('label' => 'Imagem do Kit (5 KM) - Imagem do Modal', 'section' => 'bom_vizinho_sobre_section')));

        $wp_customize->add_setting('sobre_mapa_10km');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_mapa_10km', array('label' => 'Imagem do Kit (10 KM) - Imagem do Modal', 'section' => 'bom_vizinho_sobre_section')));

        $wp_customize->add_setting('sobre_mapa_15km');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sobre_mapa_15km', array('label' => 'Imagem do Kit (15 KM) - Imagem do Modal', 'section' => 'bom_vizinho_sobre_section')));


        // ==========================================
        // 5. CONFIGURAÇÕES DOS CARDS (LINKS DE PÁGINAS)
        // ==========================================
        $wp_customize->add_section('bom_vizinho_cards_section', array(
            'title'    => 'Cards e Links do Evento',
            'priority' => 34,
        ));

        // --- CARD 1: Percursos ---
        $wp_customize->add_setting('card_percurso_text', array('default' => 'Conheça os trajetos desenhados para conectar o ecossistema empresarial.'));
        $wp_customize->add_control('card_percurso_text', array(
            'label'   => 'Texto Descritivo (Percursos)',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'textarea',
        ));

        // Controles de Hiperligação para os Percursos (Strava/GPS)
        $wp_customize->add_setting('card_percurso_link_5km', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_percurso_link_5km', array(
            'label'   => 'Link Strava/Rota (5 KM)',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_percurso_link_10km', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_percurso_link_10km', array(
            'label'   => 'Link Strava/Rota (10 KM)',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_percurso_link_15km', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_percurso_link_15km', array(
            'label'   => 'Link Strava/Rota (15 KM)',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_percurso_link_hide', array('default' => false));
        $wp_customize->add_control('card_percurso_link_hide', array(
            'label'   => 'Ocultar botão/link "Ver detalhes"?',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'checkbox',
        ));

        // --- CARD 2: Kit Atleta ---
        $wp_customize->add_setting('card_kit_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_kit_url', array(
            'label'   => 'Link da Página do Kit',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_kit_img');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'card_kit_img', array(
            'label'   => 'Imagem de Capa (Card Kit)',
            'section' => 'bom_vizinho_cards_section',
        )));

        $wp_customize->add_setting('card_kit_link_hide', array('default' => false));
        $wp_customize->add_control('card_kit_link_hide', array(
            'label'   => 'Ocultar botão/link "Conhecer o Kit"?',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'checkbox',
        ));

        // --- CARD 3: Regulamento (Página ou PDF) ---
        $wp_customize->add_setting('card_regulamento_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('card_regulamento_url', array(
            'label'   => 'Link da Página ou PDF do Regulamento',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'url',
        ));

        $wp_customize->add_setting('card_regulamento_link_hide', array('default' => false));
        $wp_customize->add_control('card_regulamento_link_hide', array(
            'label'   => 'Ocultar botão/link "Acessar documento"?',
            'section' => 'bom_vizinho_cards_section',
            'type'    => 'checkbox',
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

        $wp_customize->add_setting('footer_copyright', array('default' => '1ª Corrida do Empreendedor SEBRAE RN. Todos os direitos reservados.'));
        $wp_customize->add_control('footer_copyright', array('label' => 'Copyright', 'section' => 'bom_vizinho_footer_section', 'type' => 'text'));

        $redes = array('instagram', 'facebook', 'youtube');
        foreach ($redes as $rede) {
            $wp_customize->add_setting("footer_$rede", array('default' => ''));
            $wp_customize->add_control("footer_$rede", array('label' => "URL do " . ucfirst($rede), 'section' => 'bom_vizinho_footer_section', 'type' => 'url'));
        }

        // Logo do Rodapé
        $wp_customize->add_setting('footer_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label'   => 'Logotipo do Rodapé',
            'section' => 'bom_vizinho_footer_section',
        )));

        // Texto de Apoio do Rodapé
        $wp_customize->add_setting('footer_text', array(
            'default' => 'Toda grande conquista é uma soma de pequenas vitórias. Arena das Dunas, Natal/RN.'
        ));
        $wp_customize->add_control('footer_text', array(
            'label'   => 'Texto de Apoio',
            'section' => 'bom_vizinho_footer_section',
            'type'    => 'textarea',
        ));
    }
}

add_action('customize_register', 'bom_vizinho_customize_register');
