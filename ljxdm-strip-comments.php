<?php
/**
 * Plugin Name: LJXDM Strip HTML comments
 * Plugin URI: https://github.com/LJXDM/ljxdm-strip-comments
 * Description: Strip all html code comments from your Wordpress site
 * Version: 0.1
 * Author: ljxdm
 * Author URI: https://lojinx.digital
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


class ljxdmStripComments
{
	public function __construct() {
		add_action('get_header', array($this, 'start'), 999);
		add_action('wp_footer', array($this, 'end'), 999);
	}

	private static function strip($html) {
		return preg_replace('/<!--(.|\s)*?-->/','',$html);
	}

	public static function start() {
		ob_start(array($this, 'strip'));
	}

	public static function end() {
		ob_end_flush();
	}
}

// PHP 5.4 required
new ljxdmStripComments;

?>