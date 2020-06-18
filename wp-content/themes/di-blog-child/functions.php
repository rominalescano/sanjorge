<?php

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


//----------------------------------------------------
function child_theme_assets() {
 
 wp_enqueue_style( 'estilos-padre', //handle para estilos de tema padre
                    get_template_directory_uri() . '/style.css' //get_template_directory_uri() retornara la ubicación del tema padre
                );

 wp_enqueue_style( 'estilos-hijos',
                    get_stylesheet_directory_uri() . '/style.css', //get_stylesheet_directory_uri() retornara la ubicación de la hoja de estilos del child-theme 
                    array('estilos-padre'), //usa como depencia la hoja de estilos del tema padre.
                    '1.0' //Versión de la hoja de estilos 
                    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_assets' );
//------------------------------------------------------

/**
 * Funciones y definiciones del theme. Customizacion de Woocommerce 
 */

//require get_stylesheet_directory_uri() . '/functions/single-product-description.php';

/* if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/functions/woocommerce.php';
	require get_template_directory() . '/includes/class-custom-wc-order.php';
	require get_template_directory() . '/functions/single-product-tabs.php';
	require get_template_directory() . '/functions/single-product-review.php';
} */


// quito el titulo de la pagina Tienda
add_filter( 'woocommerce_show_page_title', 'not_a_shop_page' );

function not_a_shop_page() {
    return boolval(!is_shop());
}
//------------------------------------------------------


add_action('woocommerce_single_product_summary', "acf_caracteristicas_producto", 8 );

function acf_caracteristicas_producto(){

if (function_exists('get_field')){

   // vidriada
   if(get_field('vidriada')!=null) {
        $vidriada= get_field('vidriada');
        if ($vidriada!='') {
            echo "<p><strong> Tipo de Puerta:</strong> ". $vidriada['label']."</p>";
        } 
    }
    
    // corrediza
    if(get_field('corrediza')!=null){
        $corrediza= get_field('  // vidriada');
        if ($corrediza!= '') {
            echo "<p><strong> Tipo de Ventana:</strong> ". $corrediza['label']."</p>";
        } 
    }

    // celosia
    if(get_field('celosia')!=null){
        $celosia= get_field('celosia');
        if ($celosia!= '') {
            echo "<p><strong>". $celosia['label']."</strong></p>";
        } 
    }

    // rajas
    if(get_field('rajas')!=null){
    $raja= get_field('rajas');
    if ($raja!='' and $raja['value']!= 'sin raja') {
        echo "<p><strong>" . $raja['label'] ."</strong></p>";
    }
   }
    
   // medidas
   if(get_field('medidas')!=null){
        $medidas= get_field('medidas');
        if ($medidas!='') {
            echo "<p><strong>Medidas:</strong> ". $medidas['label']."</p>";
        } 
    }
   
    //cantidad_panos
    if(get_field('cantidad_panos')!=null){
        $cantidad_paños= get_field('cantidad_panos');
        if ($cantidad_paños!= '' and $cantidad_paños['value']!= '1') {
            echo "<p><strong>Cantidad de Paños:</strong> ". $cantidad_paños['label']."</p>";
        } 
    }
    
    //paneles_torneados
    if(get_field('paneles_torneados')!=null){
        $paneles_torneados= get_field('paneles_torneados');
        if ($paneles_torneados) {
            echo "<p><strong>Paneles Torneados</strong></p>";
        } 
    }

    
    
  }

}