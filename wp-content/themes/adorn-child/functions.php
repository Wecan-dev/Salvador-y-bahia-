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
	 $translated = str_ireplace('No products in the carrito',  'No hay productos en el carrito',  $translated);
     $translated = str_ireplace('Login',  'Ingresar',  $translated);
     $translated = str_ireplace('Register',  'Registar',  $translated);
     $translated = str_ireplace('Remember me',  'Recuerdame',  $translated);
     $translated = str_ireplace('Repeat password',  'Repetir contraseña',  $translated);
     $translated = str_ireplace('sign in',  'Registrarse',  $translated);
     $translated = str_ireplace('My account',  'Mi cuenta',  $translated);
     $translated = str_ireplace('Profile',  'Perfil',  $translated);
     $translated = str_ireplace('Edit Profile',  'Editar Perfil',  $translated);
     $translated = str_ireplace('Log out',  'Salir',  $translated);
     $translated = str_ireplace('Lost your password?',  '¿Olvido su contraseña?',  $translated);
     $translated = str_ireplace('User name',  'Usuario',  $translated);
     $translated = str_ireplace('Password',  'Contraseña',  $translated);
     $translated = str_ireplace('Type here',  'Escribe aqui',  $translated);
     $translated = str_ireplace('SEARCH RESULTS:',  'RESULTADOS DE LA BUSQUEDA:',  $translated);
     $translated = str_ireplace('Type here',  'Escribe aqui',  $translated);
     $translated = str_ireplace('If you are not happy with the results below please do another search',  'Pueba con otra busqueda',  $translated);
     $translated = str_ireplace('No posts were found.',  'No se han encontrado entradas',  $translated);
     $translated = str_ireplace('CART',  'CARRITO',  $translated);
     $translated = str_ireplace('HELLO',  '¡HOLA!',  $translated);
     $translated = str_ireplace('No products in the CARRITO.',  'NO HAY PRODUCTOS EN EL CARRITO',  $translated);
     $translated = str_ireplace('Why not return to our amazing shop and start filling it with products. Just click on the button below to instantly get back to the shop page. Oh, and while you are there, check out all of our mind-blowing discounts.',  'NO HAY PRODUCTOS EN EL CARRITO',  $translated);
     $translated = str_ireplace('Back to top',  'Volver',  $translated);

     return $translated;
}