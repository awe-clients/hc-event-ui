<?php

/**
 * Cabeçalho global do tema Crion Eventos.
 *
 * @package Crion_Eventos
 */

defined('ABSPATH') || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2c4899">
    <meta name="color-scheme" content="light">

    <?php wp_head(); ?>
</head>

<body <?php body_class('crion-site'); ?>>
    <?php wp_body_open(); ?>