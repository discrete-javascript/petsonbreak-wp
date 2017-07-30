<?php
include THEME_ADMIN . '/admin-panel/masterkey-includes.php';
include THEME_ADMIN . '/admin-panel/general.php';
//include THEME_ADMIN . '/admin-panel/styling.php';
//include THEME_ADMIN . '/admin-panel/typography.php';
//include THEME_ADMIN . '/admin-panel/portfolio.php';
//include THEME_ADMIN . '/admin-panel/blog.php';
//include THEME_ADMIN . '/admin-panel/woocommerce.php';
//include THEME_ADMIN . '/admin-panel/advanced.php';
include THEME_ADMIN . '/admin-panel/expedia.php';
include THEME_ADMIN . '/admin-panel/pagecontent.php';



$options = array_merge(
              $theme_options_general,
			  $theme_options_expedia, 
             // $theme_options_styling, 
              //$theme_options_typography, 
              //$theme_options_portfolio, 
              //$theme_options_blog, 
              //$theme_options_woocommerce, 
              //$theme_options_advanced,
			  $theme_options_pagecontent
          );


return array(
  'name' => THEME_OPTIONS,
  'options' => $options
);
