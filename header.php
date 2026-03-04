<?php
    $theme = get_template_directory_uri();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equatorial Energia Solar</title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $theme ?>/dist/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $theme ?>/dist/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $theme ?>/dist/css/styles.css">
	<link rel="stylesheet" href="<?= $theme ?>/style.css">

    <?php wp_head(); ?>
</head>

<body class="">
