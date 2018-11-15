<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>