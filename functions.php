<?php



/**
 * COOPANEST-RN Theme Functions
 * Foco: Alta Performance, Zero Plugins, Máxima Usabilidade
 */

// 1. SUPORTE BÁSICO DO TEMA
function coopanest_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'flex-width'  => true,
        'flex-height' => false,
    ));

    register_nav_menus(array(
        'header-menu' => 'Menu Principal (Topo)',
        'footer-menu' => 'Menu do Rodapé',
    ));
}
add_action('after_setup_theme', 'coopanest_theme_setup');

// 2. ENQUEUE SCRIPTS & STYLES
function coopanest_enqueue_scripts()
{
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Inter:wght@400;600&display=swap', false);
    wp_enqueue_style('coopanest-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_script('coopanest-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'coopanest_enqueue_scripts');

// 3. BRANDING DO ADMIN (Login Customizado)
function coopanest_custom_login_logo()
{
    echo '<style type="text/css">
        h1 a {
            background-image: url(' . get_template_directory_uri() . '/assets/img/logo-coopanest-rn.png) !important;
            background-size: contain !important;
            width: 100% !important;
            height: 80px !important;
        }
        body.login { background-color: #1e3a8a; } /* Azul da Marca */
        .login form { border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border: 2px solid #FFD100; }
        .wp-core-ui .button-primary { background: #FFD100 !important; border-color: #e6bc00 !important; color: #1e3a8a !important; font-weight: bold; text-transform: uppercase; }
    </style>';
}
add_action('login_enqueue_scripts', 'coopanest_custom_login_logo');

// 4. LIMPEZA DO PAINEL PARA USUÁRIOS LEIGOS
function coopanest_remove_menus()
{
    remove_menu_page('edit-comments.php'); // Remove Comentários

    // Se não for administrador, esconde configurações avançadas
    if (!current_user_can('manage_options')) {
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
        remove_menu_page('plugins.php');
        remove_menu_page('themes.php');
    }
}
add_action('admin_menu', 'coopanest_remove_menus');

// 5. CUSTOM POST TYPE: MARCAS (Patrocinadores, Apoio, Realização)
function coopanest_register_marcas_cpt()
{
    $args = array(
        'labels' => array(
            'name' => 'Marcas & Patrocínios',
            'singular_name' => 'Marca',
            'add_new_item' => 'Adicionar Nova Marca',
            'edit_item' => 'Editar Marca',
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'), // Thumbnail é a logo da marca
        'menu_icon' => 'dashicons-building',
    );
    register_post_type('marcas', $args);

    // Taxonomia (Categoria da Marca)
    register_taxonomy('tipo_marca', 'marcas', array(
        'labels' => array('name' => 'Categorias de Marca (Ex: Patrocínio, Apoio)'),
        'hierarchical' => true,
    ));
}
add_action('init', 'coopanest_register_marcas_cpt');


// Adicione isto no final do functions.php
require get_template_directory() . '/inc/customizer.php';


// addd li class no hader
function coopanest_add_menu_li_class($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'coopanest_add_menu_li_class', 1, 3);



// ==========================================
// META BOX NATIVO: ARQUIVO PARA DOWNLOAD (PÁGINAS)
// ==========================================
function coopanest_add_download_meta_box()
{
    add_meta_box('coopanest_page_download', 'Arquivo para Download (Ex: PDF do Regulamento)', 'coopanest_download_meta_box_html', 'page', 'side', 'high');
}
add_action('add_meta_boxes', 'coopanest_add_download_meta_box');

function coopanest_download_meta_box_html($post)
{
    $value = get_post_meta($post->ID, '_coopanest_download_url', true);
    // Campo de texto simples onde o usuário cola a URL do PDF (da biblioteca de mídia)
    echo '<label for="coopanest_download_url">URL do Arquivo:</label>';
    echo '<input type="url" id="coopanest_download_url" name="coopanest_download_url" value="' . esc_attr($value) . '" style="width:100%; margin-top:5px;" placeholder="https://...">';
    echo '<p class="description">Faça o upload do arquivo em "Mídia", copie a URL e cole aqui para exibir o botão de download no final da página.</p>';
}

function coopanest_save_download_meta_box($post_id)
{
    if (array_key_exists('coopanest_download_url', $_POST)) {
        update_post_meta($post_id, '_coopanest_download_url', sanitize_text_field($_POST['coopanest_download_url']));
    }
}
add_action('save_post', 'coopanest_save_download_meta_box');



// META BOX: LINK DA MARCA
function coopanest_add_marcas_meta_box()
{
    add_meta_box('coopanest_marca_link', 'URL do Patrocinador/Parceiro', 'coopanest_marca_link_html', 'marcas', 'normal', 'high');
}
add_action('add_meta_boxes', 'coopanest_add_marcas_meta_box');

function coopanest_marca_link_html($post)
{
    $url = get_post_meta($post->ID, '_coopanest_marca_url', true);
    echo '<input type="url" name="coopanest_marca_url" value="' . esc_attr($url) . '" style="width:100%;" placeholder="https://">';
}

function coopanest_save_marcas_meta_box($post_id)
{
    if (array_key_exists('coopanest_marca_url', $_POST)) {
        update_post_meta($post_id, '_coopanest_marca_url', sanitize_url($_POST['coopanest_marca_url']));
    }
}
add_action('save_post', 'coopanest_save_marcas_meta_box');



/**
 * Customização Visual do Painel Administrativo (Branding Interno)
 */
function coopanest_admin_styles()
{
    echo '<style>
        /* Top Bar e Sidebar */
        #wpadminbar, #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background-color: #1e3a8a !important; }
        
        /* Itens Ativos e Hover */
        #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.current a.menu-top, .wp-ui-primary { background: #FFD100 !important; color: #1e3a8a !important; }
        #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus { background-color: #172554 !important; color: #FFD100 !important; }
        
        /* Botões Primários */
        .wp-core-ui .button-primary { background: #FFD100 !important; border-color: #e6bc00 !important; color: #1e3a8a !important; font-weight: bold; text-shadow: none; box-shadow: none; }
        .wp-core-ui .button-primary:hover { background: #1e3a8a !important; color: #FFD100 !important; border-color: #1e3a8a !important; }

        /* Esconder Widgets Inúteis do Dashboard */
        #dashboard_quick_press, #dashboard_primary, #dashboard_activity, #dashboard_right_now { display: none; }
    </style>';
}
add_action('admin_head', 'coopanest_admin_styles');


/**
 * Widget de Boas-vindas e Instruções no Dashboard
 */
function coopanest_add_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'coopanest_welcome_widget',
        'Painel de Controle - 3ª Corrida COOPANEST-RN',
        'coopanest_dashboard_welcome_html'
    );
}
add_action('wp_dashboard_setup', 'coopanest_add_dashboard_widgets');

function coopanest_dashboard_welcome_html()
{
    echo '
    <div style="padding:10px; border-left: 4px solid #1e3a8a;">
        <h2 style="color:#1e3a8a; font-weight:900; text-transform:uppercase; italic">Bem-vindo, Organizador!</h2>
        <p>Este sistema foi otimizado para a gestão da <strong>3ª Corrida COOPANEST-RN</strong>.</p>
        <hr>
        <h4 style="margin-bottom:5px;">Guia Rápido:</h4>
        <ul style="list-style:disc; padding-left:20px;">
            <li><strong>Editar Banner, Textos e Datas:</strong> Vá em <a href="customize.php">Aparência > Personalizar</a>.</li>
            <li><strong>Cadastrar Patrocinadores:</strong> Use o menu "Marcas & Patrocínios".</li>
            <li><strong>Publicar Comunicados:</strong> Use o menu "Posts".</li>
            <li><strong>Regulamento:</strong> Edite a página correspondente e anexe o PDF no campo lateral.</li>
        </ul>
        <p style="background:#fff9c4; padding:10px; border-radius:5px; font-size:11px;">
            <strong>Dica de Performance:</strong> Sempre utilize imagens otimizadas (WEBP ou JPG) conforme as dimensões indicadas nos campos de edição.
        </p>
    </div>';
}


/**
 * Customização do Rodapé do Admin
 */
function coopanest_admin_footer_text()
{
    echo '<span id="footer-thankyou">Suporte Técnico: <a href="mailto:contato@exemplo.com.br" style="color:#1e3a8a; font-weight:bold;">Clique aqui para ajuda</a> | 3ª Corrida COOPANEST-RN</span>';
}
add_filter('admin_footer_text', 'coopanest_admin_footer_text');


/**
 * Registro do Widget de Status no Dashboard para a 3ª Corrida COOPANEST-RN
 */
function coopanest_register_status_widget()
{
    wp_add_dashboard_widget(
        'coopanest_event_status_widget',
        'Gerenciamento de Visibilidade: 3ª Corrida COOPANEST-RN',
        'coopanest_status_widget_render'
    );
}
add_action('wp_dashboard_setup', 'coopanest_register_status_widget');

/**
 * Processamento da Transição de Estado Administrativo
 */
function coopanest_handle_status_toggle()
{
    if (isset($_POST['coopanest_toggle_action']) && check_admin_referer('coopanest_status_nonce', 'coopanest_nonce_field')) {
        $status_atual = get_option('coopanest_status_evento', 'offline');
        $novo_status = ($status_atual === 'online') ? 'offline' : 'online';
        update_option('coopanest_status_evento', $novo_status);
        wp_safe_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'coopanest_handle_status_toggle');

/**
 * Renderização da Interface de Controle no Admin
 */
function coopanest_status_widget_render()
{
    $is_online = get_option('coopanest_status_evento', 'offline') === 'online';

    // Cores baseadas nas modalidades de 10km (Verde) e 15km (Roxo)
    $cor_primaria = $is_online ? '#22c55e' : '#7e22ce';
    $label = $is_online ? 'EVENTO PUBLICADO' : 'MODO DE ESPERA ATIVO';

    echo '<div style="text-align:center; padding:15px;">';
    echo '<div style="font-weight:900; color:' . $cor_primaria . '; margin-bottom:15px; text-transform:uppercase;">' . $label . '</div>';
    echo '<form method="post" action="">';
    wp_nonce_field('coopanest_status_nonce', 'coopanest_nonce_field');
    echo '<input type="hidden" name="coopanest_toggle_action" value="1">';
    echo '<button type="submit" class="button" style="background:' . $cor_primaria . '; color:#fff; border:none; padding:10px 20px; font-weight:bold; cursor:pointer; border-radius:4px;">';
    echo $is_online ? 'DESATIVAR SITE' : 'PUBLICAR EVENTO';
    echo '</button></form></div>';
}


/**
 * Lógica de Visibilidade: Site Real vs. Página de Espera
 * Referência: Identidade Visual COOPANEST-RN [cite: 2, 4]
 */
function coopanest_controle_visibilidade()
{
    // Recupera o status salvo no Dashboard
    $status = get_option('coopanest_status_evento', 'offline');

    // Se o evento estiver OFFLINE e o usuário NÃO for administrador/editor
    if ('online' !== $status && !current_user_can('manage_options')) {

        // Caminho absoluto para o arquivo na raiz do tema
        $template_espera = get_template_directory() . '/template-espera.php';

        if (file_exists($template_espera)) {
            include($template_espera);
            exit; // Interrompe o carregamento do restante do WordPress
        }
    }
}
// Hook de prioridade alta para interceptar antes de qualquer renderização
add_action('template_redirect', 'coopanest_controle_visibilidade', 1);


add_filter('jpeg_quality', function($quality) {
    return 100;
});

add_filter('big_image_size_threshold', '__return_false');




/**
 * Adiciona o campo de ordem na criação da categoria
 */
function adicionar_campo_ordem_categoria($taxonomy) {
    ?>
    <div class="form-field term-group">
        <label for="ordem_categoria">Ordem de Exibição</label>
        <input type="number" name="ordem_categoria" id="ordem_categoria" value="0">
        <p>Números menores aparecem primeiro (ex: 1, 2, 3).</p>
    </div>
    <?php
}
add_action('tipo_marca_add_form_fields', 'adicionar_campo_ordem_categoria', 10, 1);

/**
 * Adiciona o campo de ordem na edição da categoria
 */
function editar_campo_ordem_categoria($term, $taxonomy) {
    $ordem = get_term_meta($term->term_id, 'ordem_categoria', true);
    ?>
    <tr class="form-field term-group">
        <th scope="row"><label for="ordem_categoria">Ordem de Exibição</label></th>
        <td>
            <input type="number" name="ordem_categoria" id="ordem_categoria" value="<?php echo esc_attr($ordem ? $ordem : '0'); ?>">
            <p class="description">Defina a prioridade de exibição desta categoria.</p>
        </td>
    </tr>
    <?php
}
add_action('tipo_marca_edit_form_fields', 'editar_campo_ordem_categoria', 10, 2);

/**
 * Salva o valor do campo de ordem
 */
function salvar_ordem_categoria($term_id) {
    if (isset($_POST['ordem_categoria'])) {
        update_term_meta($term_id, 'ordem_categoria', sanitize_text_field($_POST['ordem_categoria']));
    }
}
add_action('created_tipo_marca', 'salvar_ordem_categoria', 10, 1);
add_action('edited_tipo_marca', 'salvar_ordem_categoria', 10, 1);