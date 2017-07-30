<?php
$theme_options_blog = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_blog'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_blog_single_post" => __("Blog Single Post", "mk_framework"),
            "mk_options_archive_posts" => __("Archive", "mk_framework"),
            "mk_options_search_posts" => __("Search", "mk_framework"),
            "mk_options_news_single" => __("News", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_blog_single_post'
    ),
    array(
        "name" => __("Blog & News / Single Post", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Single Layout", "mk_framework"),
        "desc" => __("This option allows you to define the page layout of Blog Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "single_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);
