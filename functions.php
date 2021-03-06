<?php

// This adds dynamic title tag support
function follow_andrew_theme_support()
{
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

function register_menus()
{
  $locations = array(
    'primary' => 'Desktop Primary Left Sidebar',
    'footer' => 'Footer Menu Items'
  );

  register_nav_menus($locations);
}

add_action('init', 'register_menus');

add_action('after_setup_theme', 'follow_andrew_theme_support');

function register_styles()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('followandrew-style', get_template_directory_uri() . "/style.css", array('followandrew-bootstrap'), $version, 'all');
  wp_enqueue_style('followandrew-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
  wp_enqueue_style('followandrew-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts()
{
  wp_enqueue_script('followandrew-bootstrap', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
  wp_enqueue_script('followandrew-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
  wp_enqueue_script('followandrew-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('followandrew-js', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'register_scripts');

function register_widgets()
{
  register_sidebar(
    array(
      'name' => 'Sidebar Area',
      'id' => 'sidebar',
      'description' => 'Sidebar Widget Area',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>'
    )
  );

  register_sidebar(
    array(
      'name' => 'Footer Area',
      'id' => 'footer-sidebar',
      'description' => 'Footer Widget Area',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>'
    )
  );
}

add_action('widgets_init', 'register_widgets');
