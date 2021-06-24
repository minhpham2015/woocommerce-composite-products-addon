<?php

// Css and JS
add_action( 'wp_enqueue_scripts', 'composite_addon_scripts');
if( ! function_exists( 'composite_addon_scripts' ) ) {
    function composite_addon_scripts() {

      wp_enqueue_style( 'composite-addon', PLG_URL . 'assets/css/composite-addon.css', false, PLG_VERSION );
      wp_enqueue_script( 'composite-addon', PLG_URL . 'assets/js/composite-addon.js', array( 'jquery' ) , PLG_VERSION, true );
      wp_localize_script( 'composite-addon', 'compositeAjax', apply_filters( 'compositeAjax', [
        'url' => admin_url( 'admin-ajax.php' )
        ] ) );

    }
}

// Front-end script (where the magic happens).
add_filter( 'woocommerce_composite_script_dependencies', 'frontend_script_addon'  );

function frontend_script_addon($dependencies){

  wp_register_script( 'add-to-cart-composite-addon', PLG_URL . 'assets/js/add-to-cart-composite-addon.js', array( 'jquery', 'underscore', 'backbone' ), PLG_VERSION );
  $dependencies[] = 'add-to-cart-composite-addon';

  return $dependencies;

}
