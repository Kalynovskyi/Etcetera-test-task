<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="wrapper">
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => 'ul'
            ));
            ?>
        </nav>
    </header>

    <div class="wrapper">

    