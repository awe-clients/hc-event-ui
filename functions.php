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
            background-image: none !important; /* Idealmente apontar para SVG da Rede Mais */
            width: 100% !important;
            height: 80px !important;
        }
        body.login { background-color: #7f1d1d; } /* Vermelho da Marca */
        .login form { border-radius: 12px; border: 2px solid #facc15; }
        .wp-core-ui .button-primary { background: #facc15 !important; border-color: #eab308 !important; color: #7f1d1d !important; font-weight: bold; text-transform: uppercase; }
    </style>';
}
add_action('login_enqueue_scripts', 'bom_vizinho_custom_login_logo');

function bom_vizinho_admin_styles()
{
    echo '<style>
        /* Top Bar e Sidebar */
        #wpadminbar, #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background-color: #7f1d1d !important; }
        
        /* Itens Ativos e Hover */
        #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.current a.menu-top, .wp-ui-primary { background: #facc15 !important; color: #7f1d1d !important; }
        #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus { background-color: #450a0a !important; color: #facc15 !important; }
        
        /* Botões Primários */
        .wp-core-ui .button-primary { background: #facc15 !important; border-color: #eab308 !important; color: #7f1d1d !important; font-weight: bold; text-shadow: none; box-shadow: none; }
        .wp-core-ui .button-primary:hover { background: #450a0a !important; color: #facc15 !important; border-color: #450a0a !important; }

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
    echo '<span id="footer-thankyou">Suporte Técnico: <a href="https://hcsports.com.br" target="_blank" style="color:#7f1d1d; font-weight:bold;">HC Sports</a> | 1ª Corrida do Bom Vizinho</span>';
}
add_filter('admin_footer_text', 'bom_vizinho_admin_footer_text');

// ==========================================
// 6.1 BYPASS DE VISIBILIDADE (FRONT-END SESSION & FALLBACK)
// ==========================================

function bom_vizinho_controle_visibilidade()
{
    // 0. Gatilho Temporal: Publicação automática às 00:00 de 05/05/2026 (GMT-3)
    $data_publicacao_automatica = strtotime('2026-05-05 00:00:00 -0300');
    if (time() >= $data_publicacao_automatica) {
        return; // Libera o acesso universal irrevogavelmente após a data
    }

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

        // Mitigação de Cache de Navegador
        echo "<script>
            if (document.cookie.indexOf('" . $cookie_name . "=concedido') !== -1) {
                window.location.replace(window.location.pathname + '?preview_token=acesso-revisao-2026');
            }
        </script>";

        $template_espera = get_template_directory() . '/template-espera.php';
        if (file_exists($template_espera)) {
            include($template_espera);
            exit;
        }
    }
}
add_action('template_redirect', 'bom_vizinho_controle_visibilidade', 1);

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
        </script>";
    }
}
add_action('wp_head', 'bom_vizinho_injetar_script_autorizacao', 1);

// ==========================================
// 6.1 BYPASS DE VISIBILIDADE (FRONT-END SESSION & FALLBACK)
// ==========================================

function bom_vizinho_controle_visibilidade()
{
    $status = get_option('coopanest_status_evento', 'offline');

    // 1. Regra Absoluta: Se publicado, suprime qualquer restrição
    if ($status === 'online') {
        return;
    }

    // 2. Liberação nativa para administradores
    if (current_user_can('manage_options')) {
        return;
    }

    // O prefixo 'wp-postpass_' é o padrão arquitetural do WordPress para forçar o bypass em servidores Nginx/Varnish
    $cookie_name = 'wp-postpass_stakeholder';
    $has_cookie = (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === 'concedido');
    $has_token  = (isset($_GET['preview_token']) && $_GET['preview_token'] === 'acesso-revisao-2026');

    // 3. Interceção de acesso inválido
    if (!$has_cookie && !$has_token) {
        nocache_headers();

        // Mitigação de Cache: Se o servidor entregar a página de espera indevidamente,
        // o navegador valida a sessão local e força o recarregamento autenticado.
        echo "<script>
            if (document.cookie.indexOf('" . $cookie_name . "=concedido') !== -1) {
                window.location.replace(window.location.pathname + '?preview_token=acesso-revisao-2026');
            }
        </script>";

        $template_espera = get_template_directory() . '/template-espera.php';
        if (file_exists($template_espera)) {
            include($template_espera);
            exit;
        }
    }
}
add_action('template_redirect', 'bom_vizinho_controle_visibilidade', 1);

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
        </script>";
    }
}
add_action('wp_head', 'bom_vizinho_injetar_script_autorizacao', 1);



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
