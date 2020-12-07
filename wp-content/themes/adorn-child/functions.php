<?php

/*** Child Theme Function  ***/
if ( ! function_exists( 'adorn_edge_child_theme_enqueue_scripts' ) ) {
	function adorn_edge_child_theme_enqueue_scripts()
	{
		$parent_style = 'adorn-edge-default-style';

		wp_enqueue_style('adorn-edge-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}

	add_action('wp_enqueue_scripts', 'adorn_edge_child_theme_enqueue_scripts');
}
//traducir
add_filter('gettext',  'translate_text');
add_filter('ngettext',  'translate_text');

function translate_text($translated) {
     $translated = str_ireplace('Home',  'Inicio',  $translated);
     $translated = str_ireplace('Type here',  'Escribe aqui',  $translated);
     $translated = str_ireplace('SEARCH RESULTS FOR',  'BUSCAR RESULTADOS PARA',  $translated);
     $translated = str_ireplace('SEARCH RESULTS',  'BUSCAR RESULTADOS',  $translated);
     $translated = str_ireplace('If you are not happy with the results below please do another search',  'Si no está satisfecho con los resultados a continuación, realice otra búsqueda
',  $translated);
     $translated = str_ireplace('No posts were found.',  'No se encontraron publicaciones.',  $translated);
     $translated = str_ireplace('SEARCH RESULTS',  'Buscar resultados',  $translated);
     $translated = str_ireplace('SEARCH HERE',  'Buscar',  $translated);
     $translated = str_ireplace('HELLO',  '¡HOLA!',  $translated);
     $translated = str_ireplace('Back to top',  'Volver arriba',  $translated);
     $translated = str_ireplace('Cart',  'Carrito',  $translated);
     $translated = str_ireplace('Checkout',  'Pagar',  $translated);
     $translated = str_ireplace('VIEW CARRITO',  'Ver carrito',  $translated);
     $translated = str_ireplace('Quantity',  'Cantidad',  $translated);
     $translated = str_ireplace('No products in the ',  'No hay productos en el ',  $translated);
     $translated = str_ireplace('Why not return to our amazing shop and start filling it with products. Just click on the button below to instantly get back to the shop page. Oh, and while you are there, check out all of our mind-blowing discounts.',  '¿Por qué no volver a nuestra increíble tienda y empezar a llenarla de productos? Simplemente haga clic en el botón de abajo para volver instantáneamente a la página de la tienda. Ah, y mientras estás allí, echa un vistazo a todos nuestros increíbles descuentos.
',  $translated);
     $translated = str_ireplace('YOUR CARRITO IS CURRENTLY EMPTY.',  'TU CARRITO ESTÁ ACTUALMENTE VACÍO.',  $translated);
     $translated = str_ireplace('RETURN TO SHOP',  'VOLVER A LA TIENDA',  $translated);
     $translated = str_ireplace('ADDING TO CARRITO',  'Añadir al carrito',  $translated);
     $translated = str_ireplace('SOLD',  'Vendido',  $translated);
     $translated = str_ireplace('SHOPPING CARRITO',  'Carrito',  $translated);
     $translated = str_ireplace('CARRITO TOTALS',  'Total',  $translated);
     $translated = str_ireplace('APPLY COUPON',  'Aplicar cupón',  $translated);
     $translated = str_ireplace('Update carrito',  'Actualizar carrito',  $translated);
     $translated = str_ireplace('Coupon code',  'Código del cupón',  $translated);
     $translated = str_ireplace('Go Back Shopping',  'Volver a la tienda',  $translated);
     $translated = str_ireplace('PROCEED TO PAGAR',  'Finalizar compra',  $translated);
     $translated = str_ireplace('removed',  'Eliminado',  $translated);
	 $translated = str_ireplace('Page',  'Página',  $translated);
     $translated = str_ireplace('Categories',  'Categorías',  $translated);

     return $translated;
}