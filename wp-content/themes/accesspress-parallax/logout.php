<?php

/**
 Template Name: LOGOUT Page
 
 */
get_header();
global $mk_options;
session_start();
unset($_SESSION);
session_destroy();

$url = esc_url( home_url( '/' ) );
wp_redirect($url);
?>