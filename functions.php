<?php

/**
 * Redireciona usuários não logados para a página de espera
 */
function coopanest_maintenance_mode()
{
    // Verifica se o usuário não está logado e se não está na tela de login
    if (!is_user_logged_in() && !is_login()) {
        // Busca o arquivo template-espera.php na raiz do tema
        include(get_template_directory() . '/template-espera.php');
        exit;
    }
}
add_action('template_redirect', 'coopanest_maintenance_mode');



/**
 * Enfileiramento de scripts e estilos com correção de dependências
 */
function coopanest_scripts_enqueue()
{
    // 1. Registra o Tailwind como SCRIPT (pois é um .js que compila as classes)
    // Usamos o hook 'wp_head' para injetá-lo o quanto antes, mas via enqueue padrão
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false);

    // 2. Enfileira o estilo principal do tema
    // REMOVEMOS 'tailwind-cdn' do array de dependências para eliminar o Notice
    wp_enqueue_style('coopanest-main-style', get_stylesheet_uri(), array(), '1.0.0');

    // 3. Enfileira o JS principal do framework
    wp_enqueue_script('coopanest-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'coopanest_scripts_enqueue');




function coopanest_enqueue_tailwind()
{
    // O Tailwind Play CDN é um script que processa as classes em tempo real
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false);
}
add_action('wp_enqueue_scripts', 'coopanest_enqueue_tailwind');


/**
 * Segurança e Hardening do Tema 3ª Corrida COOPANEST-RN
 */

// 1. Remover a versão do WordPress do cabeçalho (evita detecção de versões vulneráveis)
remove_action('wp_head', 'wp_generator');

// 2. Bloquear tentativas de descobrir nomes de usuários via API REST
add_filter('rest_endpoints', function ($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

// 3. Desativar XML-RPC (Alvo comum para ataques de força bruta e DDoS)
add_filter('xmlrpc_enabled', '__return_false');

// 4. Bloquear e desativar todos os comentários do site
add_action('admin_init', function () {
    // Redireciona qualquer usuário tentando acessar a página de comentários no admin
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
    // Remove suporte a comentários nos tipos de post
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// 5. Fechar comentários no front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// 6. Ocultar erros de login (Impede que o hacker saiba se errou o usuário ou a senha)
add_filter('login_errors', function () {
    return 'Erro: Credenciais inválidas.';
});


/**
 * Hardening e Configurações do Tema
 */

function coopanest_scripts_setup()
{
    // Correção do erro de dependência: Tailwind é script, não style
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_enqueue_style('coopanest-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('coopanest-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'coopanest_scripts_setup');

/**
 * Registro de Meta Boxes Manuais (Substituindo ACF)
 */
function coopanest_add_custom_meta_boxes()
{
    add_meta_box(
        'coopanest_status_meta',
        'Configurações da Corrida',
        'coopanest_status_callback',
        'page', // Aplicado em páginas
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'coopanest_add_custom_meta_boxes');

function coopanest_status_callback($post)
{
    // Fallback de segurança (Nonce)
    wp_nonce_field('coopanest_save_meta', 'coopanest_meta_nonce');

    $status = get_post_meta($post->ID, '_status_evento', true) ?: 'inscricao';
    $link   = get_post_meta($post->ID, '_link_status', true);
    $label  = get_post_meta($post->ID, '_label_status', true);
?>
    <p>
        <label>Status do Evento:</label><br>
        <select name="status_evento" style="width:100%">
            <option value="inscricao" <?php selected($status, 'inscricao'); ?>>Inscrições Abertas</option>
            <option value="kits" <?php selected($status, 'kits'); ?>>Retirada de Kits</option>
            <option value="resultados" <?php selected($status, 'resultados'); ?>>Resultados</option>
        </select>
    </p>
    <p>
        <label>Texto do Botão:</label>
        <input type="text" name="label_status" value="<?php echo esc_attr($label); ?>" style="width:100%">
    </p>
    <p>
        <label>Link do Botão:</label>
        <input type="url" name="link_status" value="<?php echo esc_url($link); ?>" style="width:100%">
    </p>
<?php
}

// Salvar os dados manuais
function coopanest_save_meta_boxes($post_id)
{
    if (!isset($_POST['coopanest_meta_nonce']) || !wp_verify_nonce($_POST['coopanest_meta_nonce'], 'coopanest_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['status_evento'])) update_post_meta($post_id, '_status_evento', sanitize_text_field($_POST['status_evento']));
    if (isset($_POST['label_status']))  update_post_meta($post_id, '_label_status', sanitize_text_field($_POST['label_status']));
    if (isset($_POST['link_status']))   update_post_meta($post_id, '_link_status', esc_url_raw($_POST['link_status']));
}
add_action('save_post', 'coopanest_save_meta_boxes');





/**
 * Registro de Meta Boxes para a Front Page
 */
function hb_register_home_metaboxes()
{
    add_meta_box(
        'hb_home_details',
        'Configurações da Corrida (Status e Hero)',
        'hb_home_details_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'hb_register_home_metaboxes');

function hb_home_details_callback($post)
{
    // Segurança
    wp_nonce_field('hb_save_home_data', 'hb_home_nonce');

    // Recuperação de valores com Fallbacks
    $status = get_post_meta($post->ID, '_status_evento', true) ?: 'inscricao';
    $label  = get_post_meta($post->ID, '_label_cta', true) ?: 'Inscreva-se';
    $link   = get_post_meta($post->ID, '_link_cta', true) ?: '#';

?>
    <div class="hb-admin-box">
        <p>
            <label><strong>Status Atual:</strong></label><br>
            <select name="hb_status_evento" style="width:100%;">
                <option value="inscricao" <?php selected($status, 'inscricao'); ?>>Inscrições Abertas</option>
                <option value="kits" <?php selected($status, 'kits'); ?>>Retirada de Kits</option>
                <option value="resultados" <?php selected($status, 'resultados'); ?>>Resultados Disponíveis</option>
            </select>
        </p>
        <p>
            <label><strong>Texto do Botão CTA:</strong></label>
            <input type="text" name="hb_label_cta" value="<?php echo esc_attr($label); ?>" style="width:100%;">
        </p>
        <p>
            <label><strong>URL do Botão CTA:</strong></label>
            <input type="url" name="hb_link_cta" value="<?php echo esc_url($link); ?>" style="width:100%;">
        </p>
    </div>
<?php
}

// Salvar os dados
add_action('save_post', function ($post_id) {
    if (!isset($_POST['hb_home_nonce']) || !wp_verify_nonce($_POST['hb_home_nonce'], 'hb_save_home_data')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['hb_status_evento'])) update_post_meta($post_id, '_status_evento', sanitize_text_field($_POST['hb_status_evento']));
    if (isset($_POST['hb_label_cta']))    update_post_meta($post_id, '_label_cta', sanitize_text_field($_POST['hb_label_cta']));
    if (isset($_POST['hb_link_cta']))     update_post_meta($post_id, '_link_cta', esc_url_raw($_POST['hb_link_cta']));
});




/**
 * Configurações Dinâmicas do Painel (Customizer)
 */
function hb_customize_register($wp_customize)
{

    // SEÇÃO: Informações da Corrida
    $wp_customize->add_section('hb_corrida_settings', array(
        'title'    => 'Configurações da Corrida',
        'priority' => 30,
    ));

    // Campo: Status do Evento
    $wp_customize->add_setting('hb_status_evento', array('default' => 'inscricao'));
    $wp_customize->add_control('hb_status_evento', array(
        'label'    => 'Status Atual do Evento',
        'section'  => 'hb_corrida_settings',
        'type'     => 'select',
        'choices'  => array(
            'inscricao'  => 'Inscrições Abertas',
            'kits'       => 'Entrega de Kits',
            'resultados' => 'Resultados Disponíveis',
        ),
    ));

    // Campo: Texto do Botão (CTA)
    $wp_customize->add_setting('hb_cta_label', array('default' => 'Inscreva-se Agora'));
    $wp_customize->add_control('hb_cta_label', array(
        'label'   => 'Texto do Botão Principal',
        'section' => 'hb_corrida_settings',
        'type'    => 'text',
    ));

    // Campo: Link do Botão (CTA)
    $wp_customize->add_setting('hb_cta_link', array('default' => '#'));
    $wp_customize->add_control('hb_cta_link', array(
        'label'   => 'Link do Botão Principal',
        'section' => 'hb_corrida_settings',
        'type'    => 'url',
    ));

    // SEÇÃO: Identidade Visual (Imagens)
    $wp_customize->add_section('hb_visual_settings', array(
        'title'    => 'Identidade e Imagens',
        'priority' => 31,
    ));

    // Upload: Banner Principal
    $wp_customize->add_setting('hb_hero_banner');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hb_hero_banner', array(
        'label'    => 'Banner Principal (Hero)',
        'section'  => 'hb_visual_settings',
    )));

    // SEÇÃO: Carrossel de Banners
    $wp_customize->add_section('hb_carousel_settings', array(
        'title'    => 'Carrossel de Banners (Hero)',
        'priority' => 32,
    ));

    for ($i = 1; $i <= 3; $i++) {
        // Configuração da Imagem
        $wp_customize->add_setting("hb_banner_img_$i");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hb_banner_img_$i", array(
            'label'    => "Banner $i",
            'section'  => 'hb_carousel_settings',
        )));

        // Configuração do Link
        $wp_customize->add_setting("hb_banner_link_$i", array('default' => '#'));
        $wp_customize->add_control("hb_banner_link_$i", array(
            'label'   => "Link do Banner $i",
            'section' => 'hb_carousel_settings',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'hb_customize_register');


/**
 * Registro de Localizações de Menus
 */
function hb_register_nav_menus()
{
    register_nav_menus(array(
        'header-menu' => 'Menu Superior (Header)',
        'footer-menu' => 'Menu Inferior (Footer)',
    ));
}
add_action('after_setup_theme', 'hb_register_nav_menus');


function hb_menu_classes($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'hb_menu_classes', 1, 3);
