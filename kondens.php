<?php
/**
 * Plugin Name:       Kondens
 * Plugin URI:        https://github.com/kenh-zealand/kondens
 * Description:       Tankekondensatoren: en kodebeskyttet side (/kondens/), hvor deltagere skriver indlæg, og Claude (Anthropic) samler dem i temaer. Med ordsky og PDF-eksport.
 * Version:           2.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Kenneth Hansen
 * Text Domain:       kondens
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hvis Kondens allerede er indlæst andetsteds (fx fra et tema), stopper pluginet for at undgå dobbelt kode.
if ( function_exists( 'dcol_kode' ) ) {
	add_action( 'admin_notices', function () {
		echo '<div class="notice notice-warning"><p><strong>Kondens:</strong> Kondens er allerede indlæst et andet sted (fx fra en anden kopi af pluginet eller fra temaet). Fjern den ene for at undgå dobbelt kode.</p></div>';
	} );
	return;
}

define( 'DCOL_PLUGIN_FIL', __FILE__ );

require_once __DIR__ . '/inc/kondens.php';

/* Siden /kondens/ vises med pluginets egen skabelon – uanset tema. */
add_filter( 'template_include', function ( $skabelon ) {
	if ( is_page( 'kondens' ) ) {
		return __DIR__ . '/templates/page-kondens.php';
	}
	return $skabelon;
}, 99 );

/* Ved aktivering: opret siden /kondens/, hvis den ikke findes. */
register_activation_hook( __FILE__, function () {
	if ( get_page_by_path( 'kondens' ) ) {
		return;
	}
	wp_insert_post( array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => 'Kondens',
		'post_name'    => 'kondens',
		'post_content' => 'Skriv dit bidrag nedenfor. Underviseren samler indlæggene i en opsamling.',
	) );
} );

/* Genvej til indstillingerne fra plugin-listen. */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function ( $links ) {
	array_unshift( $links, '<a href="' . esc_url( admin_url( 'options-general.php?page=kondens' ) ) . '">Indstillinger</a>' );
	return $links;
} );
