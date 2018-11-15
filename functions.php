<?php

add_theme_support('post-thumbnails');

if (!class_exists('WPLessPlugin')){
	require dirname(__FILE__) . '/app/wp-less/bootstrap-for-theme.php';
	$WPLessPlugin = WPLessPlugin::getInstance();
	$WPLessPlugin->dispatch();
}

function initTextDomain() {
    load_theme_textdomain('xxx', get_template_directory() . '/languages');
} add_action('after_setup_theme', 'initTextDomain');

function enqueueThemeAssets() {
    /* Bootstrap */
    wp_enqueue_style('bootstrap-less', get_template_directory_uri() .'/less/bootstrap/_bootstrap.less');
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), 1.1, true);

    wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    /* Fonts */
    //wp_enqueue_style('ubuntu-font', 'https://fonts.googleapis.com/css?family=Ubuntu');

    /* jQuery Plugins */
    wp_enqueue_script('slimmenu-js', get_template_directory_uri() .'/assets/js/jquery.slimmenu.js', array('jquery'), 1.1, true);
    wp_enqueue_style('slimmenu-css', get_template_directory_uri() .'/assets/css/slimmenu.min.css');

    wp_enqueue_script('lightslider-js', get_template_directory_uri() .'/assets/js/lightslider.min.js', array('jquery'), 1.1, true);
    wp_enqueue_style('lightslider-css', get_template_directory_uri() .'/assets/css/lightslider.min.css');

    wp_enqueue_script('matchheight-js', get_template_directory_uri() .'/assets/js/jquery.matchHeight.js', array('jquery'), 1.1, true);

    /* Theme Files */
    wp_enqueue_script('theme-js', get_template_directory_uri() .'/js/theme.js', array('jquery'), 1.1, true);

    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('style-less', get_template_directory_uri() .'/less/style.less');
    wp_enqueue_style('responsive-less', get_template_directory_uri() .'/less/responsive.less');
} add_action('wp_enqueue_scripts', 'enqueueThemeAssets');

function registerMenus() {
    //register_nav_menu('main-navigation','Hauptmenü');
} add_action('init', 'registerMenus');

function initWidgetAreas() {
    /*
    register_sidebar(array(
        'name'          => 'Startseite Services',
        'id'            => 'front-page-services',
        'description'   => 'Drei Teaser auf der Startseite',
        'before_widget' => '<aside id="%1$s" class="%2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    */
} add_action('widgets_init', 'initWidgetAreas');