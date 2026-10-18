<?php
/**
 * Plugin recommendations: a dismissible admin notice.
 *
 * Winespring works without WooCommerce and Aludra, but the store templates and
 * the Store Home pattern need them. The notice appears only on the Dashboard
 * and Themes screens, only to users who can install plugins, only while one of
 * the two is missing, and never again once dismissed.
 *
 * @package Winespring
 * @since   1.7.0
 */

namespace Winespring;

/**
 * User meta key that records a dismissed notice.
 */
const PLUGIN_NOTICE_META = 'winespring_dismissed_plugin_notice';

/**
 * Find the recommended plugins that are not active.
 *
 * @return array[] Missing plugins keyed by slug, each with its `name` and, when
 *                 the plugin is installed but inactive, its `file`.
 */
function winespring_missing_recommended_plugins() {
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$installed   = array_keys( get_plugins() );
	$recommended = array(
		'woocommerce' => 'WooCommerce',
		'aludra'      => 'Aludra',
	);
	$missing     = array();

	foreach ( $recommended as $slug => $name ) {
		$file = '';

		foreach ( $installed as $candidate ) {
			if ( 0 === strpos( $candidate, $slug . '/' ) ) {
				$file = $candidate;
				break;
			}
		}

		if ( $file && ( is_plugin_active( $file ) || is_plugin_active_for_network( $file ) ) ) {
			continue;
		}

		$missing[ $slug ] = array(
			'name' => $name,
			'file' => $file,
		);
	}

	return $missing;
}

/**
 * Print the notice.
 */
function winespring_plugin_notice() {
	$screen = get_current_screen();

	if ( ! $screen || ! in_array( $screen->id, array( 'dashboard', 'themes' ), true ) ) {
		return;
	}

	if ( ! current_user_can( 'install_plugins' ) || get_user_meta( get_current_user_id(), PLUGIN_NOTICE_META, true ) ) {
		return;
	}

	$missing = winespring_missing_recommended_plugins();

	if ( ! $missing ) {
		return;
	}

	$links = array();

	foreach ( $missing as $slug => $plugin ) {
		if ( $plugin['file'] ) {
			$url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $plugin['file'] ) ), 'activate-plugin_' . $plugin['file'] );
			/* translators: %s: plugin name. */
			$label = sprintf( __( 'Activate %s', 'winespring' ), $plugin['name'] );
		} else {
			$url = self_admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $slug );
			/* translators: %s: plugin name. */
			$label = sprintf( __( 'Install %s', 'winespring' ), $plugin['name'] );
		}

		$links[] = '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
	}

	$dismiss = wp_nonce_url( add_query_arg( 'winespring-dismiss-plugins', '1' ), 'winespring_dismiss_plugins' );
	?>
	<div class="notice notice-info">
		<p>
			<strong><?php esc_html_e( 'Winespring', 'winespring' ); ?></strong>
			<?php esc_html_e( 'works on its own. For the full store experience, add the plugins below.', 'winespring' ); ?>
		</p>
		<p>
			<?php echo wp_kses( implode( ' &middot; ', $links ), array( 'a' => array( 'href' => array() ) ) ); ?>
			&mdash;
			<a href="<?php echo esc_url( $dismiss ); ?>"><?php esc_html_e( 'Dismiss', 'winespring' ); ?></a>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', __NAMESPACE__ . '\winespring_plugin_notice' );

/**
 * Remember that the current user dismissed the notice.
 */
function winespring_dismiss_plugin_notice() {
	if ( ! isset( $_GET['winespring-dismiss-plugins'] ) ) {
		return;
	}

	check_admin_referer( 'winespring_dismiss_plugins' );

	update_user_meta( get_current_user_id(), PLUGIN_NOTICE_META, 1 );

	wp_safe_redirect( remove_query_arg( array( 'winespring-dismiss-plugins', '_wpnonce' ) ) );
	exit;
}
add_action( 'admin_init', __NAMESPACE__ . '\winespring_dismiss_plugin_notice' );
