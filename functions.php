<?php

/**
 * Bom Vizinho Theme Functions - Rede MAIS
 * Foco: Alta Performance, Otimização de Assets, SEO e Craft Design
 */

// ==========================================
// 1. SUPORTE BÁSICO DO TEMA E OTIMIZAÇÃO
// ==========================================
function bom_vizinho_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    register_nav_menus(array(
        'header-menu' => 'Menu Principal (Topo)',
        'footer-menu' => 'Menu do Rodapé',
    ));
}
add_action('after_setup_theme', 'bom_vizinho_theme_setup');

/**
 * Define tamanho de imagem específico para marcas sem recorte (crop: false)
 * O valor 160px de altura é ideal para garantir nitidez em telas Retina (2x 80px).
 */
function bom_vizinho_setup_marcas_automaticas()
{
    add_image_size('marca-grid', 400, 160, false);

    // Garante que o suporte ao logo personalizado também não force o recorte
    add_theme_support('custom-logo', array(
        'height'      => 160,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'bom_vizinho_setup_marcas_automaticas');

/**
 * Ajuste de Redimensionamento para a Logo Principal
 */
function bom_vizinho_ajuste_logo_header()
{
    add_theme_support('custom-logo', array(
        'height'      => 100,  // Altura máxima sugerida
        'width'       => 300,  // Largura máxima sugerida
        'flex-height' => true, // Permite que o cliente não corte
        'flex-width'  => true, // Permite que o cliente não corte
    ));
}
add_action('after_setup_theme', 'bom_vizinho_ajuste_logo_header', 11);

/**
 * Filtro para garantir nitidez máxima na Logo (Remove o srcset blur)
 */
add_filter('get_custom_logo', function ($html) {
    // Remove o srcset para forçar o navegador a usar a imagem original de alta qualidade
    $html = preg_replace('/srcset="[^"]*" /', '', $html);
    $html = preg_replace('/sizes="[^"]*" /', '', $html);
    return $html;
});

/**
 * Habilitar suporte a envio de arquivos SVG (Craft Design / Logotipos)
 */
function bom_vizinho_permitir_svg($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'bom_vizinho_permitir_svg');

function bom_vizinho_corrigir_visualizacao_svg()
{
    echo '<style>.attachment-266x266, .thumbnail img { width: 100% !important; height: auto !important; }</style>';
}
add_action('admin_head', 'bom_vizinho_corrigir_visualizacao_svg');

// ==========================================
// 2. PERFORMANCE E LIMPEZA (PAGESPEED)
// ==========================================
function bom_vizinho_performance_cleanup()
{
    // Remove Emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove tags oEmbed, RSD e WLW
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');

    // Remove CSS global do Gutenberg (Tailwind assumirá)
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}
add_action('wp_enqueue_scripts', 'bom_vizinho_performance_cleanup', 100);

/**
 * Flash of Unstyled Content (FOUC). Trata-se de uma anomalia visual que ocorre quando o navegador renderiza o HTML nativo antes que as regras de estilo (CSS) sejam processadas.
 *
function bom_vizinho_defer_scripts($tag, $handle, $src)
{
    if (is_admin()) return $tag;
    return '<script src="' . esc_url($src) . '" defer="defer"></script>' . "\n";
}
 */
function bom_vizinho_defer_scripts($tag, $handle, $src)
{
    if (is_admin()) return $tag;

    // Exclui o Tailwind da política de deferimento para evitar Flash of Unstyled Content (FOUC)
    if ($handle === 'tailwind') {
        return $tag;
    }

    return '<script src="' . esc_url($src) . '" defer="defer"></script>' . "\n";
}
add_filter('script_loader_tag', 'bom_vizinho_defer_scripts', 10, 3);


// ==========================================
// 3. ENQUEUE SCRIPTS & STYLES
// ==========================================
function bom_vizinho_enqueue_scripts()
{
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap', false);
    wp_enqueue_style('bom_vizinho-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_script('bom_vizinho-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'bom_vizinho_enqueue_scripts');

function bom_vizinho_add_menu_li_class($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bom_vizinho_add_menu_li_class', 1, 3);


// ==========================================
// 4. CUSTOM POST TYPE: MARCAS
// ==========================================
function bom_vizinho_register_marcas_cpt()
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
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-building',
    );
    register_post_type('marcas', $args);

    register_taxonomy('tipo_marca', 'marcas', array(
        'labels' => array('name' => 'Categorias de Marca (Ex: Patrocínio, Apoio)'),
        'hierarchical' => true,
    ));
}
add_action('init', 'bom_vizinho_register_marcas_cpt');

/**
 * Adiciona o campo de ordem na criação da categoria de marca
 */
function bom_vizinho_adicionar_campo_ordem_categoria($taxonomy)
{
?>
    <div class="form-field term-group">
        <label for="ordem_categoria">Ordem de Exibição</label>
        <input type="number" name="ordem_categoria" id="ordem_categoria" value="0">
        <p>Números menores aparecem primeiro (ex: 1 = Realização, 2 = Patrocínio Master).</p>
    </div>
<?php
}
add_action('tipo_marca_add_form_fields', 'bom_vizinho_adicionar_campo_ordem_categoria', 10, 1);

function bom_vizinho_editar_campo_ordem_categoria($term, $taxonomy)
{
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
add_action('tipo_marca_edit_form_fields', 'bom_vizinho_editar_campo_ordem_categoria', 10, 2);

function bom_vizinho_salvar_ordem_categoria($term_id)
{
    if (isset($_POST['ordem_categoria'])) {
        update_term_meta($term_id, 'ordem_categoria', sanitize_text_field($_POST['ordem_categoria']));
    }
}
add_action('created_tipo_marca', 'bom_vizinho_salvar_ordem_categoria', 10, 1);
add_action('edited_tipo_marca', 'bom_vizinho_salvar_ordem_categoria', 10, 1);


// META BOX: LINK DA MARCA
function bom_vizinho_add_marcas_meta_box()
{
    add_meta_box('bom_vizinho_marca_link', 'URL do Patrocinador/Parceiro', 'bom_vizinho_marca_link_html', 'marcas', 'normal', 'high');
}
add_action('add_meta_boxes', 'bom_vizinho_add_marcas_meta_box');

function bom_vizinho_marca_link_html($post)
{
    $url = get_post_meta($post->ID, '_coopanest_marca_url', true); // Mantendo meta_key antiga para compatibilidade de dados
    echo '<input type="url" name="coopanest_marca_url" value="' . esc_attr($url) . '" style="width:100%;" placeholder="https://">';
}

function bom_vizinho_save_marcas_meta_box($post_id)
{
    if (array_key_exists('coopanest_marca_url', $_POST)) {
        update_post_meta($post_id, '_coopanest_marca_url', sanitize_url($_POST['coopanest_marca_url']));
    }
}
add_action('save_post', 'bom_vizinho_save_marcas_meta_box');


// ==========================================
// 5. BRANDING DO ADMIN E GESTÃO
// ==========================================
function bom_vizinho_custom_login_logo()
{
    echo '<style type="text/css">
        h1 a {
            background-image: none !important; 
            width: 100% !important;
            height: 80px !important;
        }
        body.login { background-color: #123774; } /* Azul Institucional */
        .login form { border-radius: 12px; border: 2px solid #f9db3d; } /* Amarelo */
        .wp-core-ui .button-primary { background: #e81c62 !important; border-color: #c21450 !important; color: #ffffff !important; font-weight: bold; text-transform: uppercase; }
    </style>';
}
add_action('login_enqueue_scripts', 'bom_vizinho_custom_login_logo');

function bom_vizinho_admin_styles()
{
    echo '<style>
        /* Top Bar e Sidebar */
        #wpadminbar, #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background-color: #123774 !important; }
        
        /* Itens Ativos e Hover */
        #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.current a.menu-top, .wp-ui-primary { background: #f9db3d !important; color: #123774 !important; }
        #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus { background-color: #0c2b6b !important; color: #f9db3d !important; }
        
        /* Botões Primários */
        .wp-core-ui .button-primary { background: #e81c62 !important; border-color: #c21450 !important; color: #ffffff !important; font-weight: bold; text-shadow: none; box-shadow: none; }
        .wp-core-ui .button-primary:hover { background: #c21450 !important; color: #ffffff !important; border-color: #c21450 !important; }

        #dashboard_quick_press, #dashboard_primary, #dashboard_activity, #dashboard_right_now { display: none; }
    </style>';
}
add_action('admin_head', 'bom_vizinho_admin_styles');

function bom_vizinho_remove_menus()
{
    remove_menu_page('edit-comments.php');
    if (!current_user_can('manage_options')) {
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
        remove_menu_page('plugins.php');
        remove_menu_page('themes.php');
    }
}
add_action('admin_menu', 'bom_vizinho_remove_menus');

function bom_vizinho_admin_footer_text()
{
    echo '<span id="footer-thankyou">Tecnologia: <a href="https://horadecorrer.com.br" target="_blank" style="color:#e81c62; font-weight:bold;">Hora de Correr</a> | Gestão de Eventos</span>';
}
add_filter('admin_footer_text', 'bom_vizinho_admin_footer_text');

// ==========================================
// 6. DASHBOARD WIDGETS & STATUS
// ==========================================
function bom_vizinho_add_dashboard_widgets()
{
    wp_add_dashboard_widget('bom_vizinho_welcome_widget', 'Painel de Gestão', 'bom_vizinho_dashboard_welcome_html');
    wp_add_dashboard_widget('bom_vizinho_event_status_widget', 'Controle de Visibilidade do Site', 'bom_vizinho_status_widget_render');
}
add_action('wp_dashboard_setup', 'bom_vizinho_add_dashboard_widgets');

function bom_vizinho_dashboard_welcome_html()
{
    echo '
    <div style="padding:10px; border-left: 4px solid #123774;">
        <h2 style="color:#123774; font-weight:900; text-transform:uppercase; font-style: italic;">Painel de Controle</h2>
        <p>Sistema otimizado para a gestão da <strong>Corrida do Empreendedor</strong>.</p>
        <hr style="border-top: 1px solid #e2e8f0; margin: 15px 0;">
        <h4 style="margin-bottom:5px;">Guia Rápido de Configuração:</h4>
        <ul style="list-style:disc; padding-left:20px;">
            <li><strong>Identidade e Textos:</strong> Acesse <a href="customize.php" style="color:#e81c62;">Aparência > Personalizar</a> para definir as cores globais e conteúdos estruturais.</li>
            <li><strong>Patrocinadores:</strong> Menu "Marcas & Patrocínios" (Suba os logos em formato PNG/SVG sem fundo).</li>
            <li><strong>Link Seguro para Stakeholders:</strong> <code>/?preview_token=acesso-revisao-2026</code></li>
        </ul>
    </div>';
}

function bom_vizinho_handle_status_toggle()
{
    if (isset($_POST['coopanest_toggle_action']) && check_admin_referer('coopanest_status_nonce', 'coopanest_nonce_field')) {
        $status_atual = get_option('coopanest_status_evento', 'offline');
        $novo_status = ($status_atual === 'online') ? 'offline' : 'online';
        update_option('coopanest_status_evento', $novo_status);
        wp_safe_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'bom_vizinho_handle_status_toggle');

function bom_vizinho_status_widget_render()
{
    $is_online = get_option('coopanest_status_evento', 'offline') === 'online';
    $cor_primaria = $is_online ? '#3b93a5' : '#e81c62'; // Ciano para Online, Magenta para Offline
    $label = $is_online ? 'SISTEMA ONLINE (PÚBLICO)' : 'MODO DE ESPERA ATIVO (PRIVADO)';

    echo '<div style="text-align:center; padding:15px;">';
    echo '<div style="font-weight:900; color:' . $cor_primaria . '; margin-bottom:15px; text-transform:uppercase;">' . $label . '</div>';
    echo '<form method="post" action="">';
    wp_nonce_field('coopanest_status_nonce', 'coopanest_nonce_field');
    echo '<input type="hidden" name="coopanest_toggle_action" value="1">';
    echo '<button type="submit" class="button" style="background:' . $cor_primaria . '; color:#fff; border:none; padding:10px 20px; font-weight:bold; cursor:pointer; border-radius:4px;">';
    echo $is_online ? 'OCULTAR SITE' : 'PUBLICAR EVENTO';
    echo '</button></form></div>';
}

// ==========================================
// 6.1 BYPASS DE VISIBILIDADE (FRONT-END SESSION)
// ==========================================

if (!function_exists('bom_vizinho_controle_visibilidade')) {
    function bom_vizinho_controle_visibilidade()
    {
        // 0. Gatilho Temporal: Publicação automática
        // Comentado temporariamente para reativar o modo de espera
        /*
        $data_publicacao_automatica = strtotime('2026-05-05 00:00:00 -0300');
        if (time() >= $data_publicacao_automatica) {
            return; // Libera o acesso universal irrevogavelmente
        }
        */

        $status = get_option('coopanest_status_evento', 'offline');

        // 1. Regra Manual: Se publicado via painel, suprime restrição
        if ($status === 'online') {
            return;
        }

        // 2. Liberação nativa para administradores logados
        if (current_user_can('manage_options')) {
            return;
        }

        // Nomenclatura arquitetural para mitigação de cache do servidor
        $cookie_name = 'wp-postpass_stakeholder';
        $has_cookie = (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === 'concedido');
        $has_token  = (isset($_GET['preview_token']) && $_GET['preview_token'] === 'acesso-revisao-2026');

        // 3. Interceção de acesso inválido
        if (!$has_cookie && !$has_token) {
            nocache_headers();

            $template_espera = get_template_directory() . '/template-espera.php';
            if (file_exists($template_espera)) {
                // Mitigação de Cache de Navegador injetada imediatamente antes do carregamento do documento
                echo "<script>if(document.cookie.indexOf('" . esc_js($cookie_name) . "=concedido') !== -1) { window.location.replace(window.location.pathname + '?preview_token=acesso-revisao-2026'); }</script>";
                include($template_espera);
                exit;
            }
        }
    }
    add_action('template_redirect', 'bom_vizinho_controle_visibilidade', 1);
}

if (!function_exists('bom_vizinho_injetar_script_autorizacao')) {
    function bom_vizinho_injetar_script_autorizacao()
    {
        // 4. Manutenção de Sessão
        if (isset($_GET['preview_token']) && $_GET['preview_token'] === 'acesso-revisao-2026') {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Estabelece ciclo de vida estrito de 24 horas (86400s)
                    document.cookie = 'wp-postpass_stakeholder=concedido; max-age=86400; path=/; samesite=Lax';
                    
                    // Mascara a URL apagando o token visualmente, mantendo a navegação limpa
                    window.history.replaceState({}, document.title, window.location.pathname);
                });
            </script>\n";
        }
    }
    add_action('wp_head', 'bom_vizinho_injetar_script_autorizacao', 1);
}

// ==========================================
// 7. OTIMIZAÇÃO DE IMAGENS (QUALIDADE MÁXIMA)
// ==========================================

// 1. Prioriza a biblioteca Imagick, que possui um algoritmo de amostragem superior ao GD
add_filter('wp_image_editors', function ($classes) {
    return array_merge(['WP_Image_Editor_Imagick'], $classes);
});

// 2. Bloqueia o motor do WordPress de converter formatos nativos (PNG/JPG) para WebP lossy
add_filter('image_editor_output_format', '__return_empty_array');

// 3. Força o compilador a preservar 100% da matriz de pixels originais no redimensionamento
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);
add_filter('webp_quality', function () {
    return 100;
}, 10, 2);

// 4. Desabilita o corte destrutivo de imagens superiores a 2560px (threshold)
add_filter('big_image_size_threshold', '__return_false');


// Importação do Customizer
require get_template_directory() . '/inc/customizer.php';
