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
