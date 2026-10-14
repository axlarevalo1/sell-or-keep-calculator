<?php
/**
 * Plugin Name: Sell or Keep Calculator (Preview)
 * Description: Standalone, client-facing Sell or Keep calculator for Sell With Ariell. Use [sell_keep_calculator].
 * Version: 0.1.0
 * Author: Sell With Ariell
 * License: Proprietary
 */
if (!defined('ABSPATH')) { exit; }
function swar_sell_keep_shortcode($atts = array()) {
    $src = plugins_url('assets/index.html', __FILE__);
    $id = 'swar-sellkeep-' . wp_rand(10000, 99999);
    $html = '<iframe id="' . esc_attr($id) . '" title="Sell or Keep My Home calculator" src="' . esc_url($src) . '" loading="lazy" style="display:block;width:100%;height:1400px;border:0;background:#08090a" referrerpolicy="strict-origin-when-cross-origin"></iframe>';
    $html .= '<script>(function(){var f=document.getElementById(' . wp_json_encode($id) . ');window.addEventListener("message",function(e){if(e.origin!==window.location.origin||e.source!==f.contentWindow||!e.data||e.data.type!=="sellkeep:height")return;var h=Number(e.data.height);if(Number.isFinite(h)&&h>=350&&h<=12000)f.style.height=h+"px";});})();</script>';
    return $html;
}
add_shortcode('sell_keep_calculator', 'swar_sell_keep_shortcode');
