<?php
/**
 * Plugin Name: ML Parallax
 * Plugin URI: http://www.mlipinski.pl/plugins/ml-paralax
 * Description: Simple and easy scrolling parallax plugin.
 * Version: 0.2
 * Author: Michal Lipinski
 * Author URI: http://www.mlipinski.pl
 * License: GPL2
 */

 
//------------------------Add needed CSS and JS files------------------------------
add_action( 'template_redirect' , 'ml_add_stuff' );

function ml_add_stuff(){
	$plugin_path=plugin_dir_url(__FILE__);	
	wp_enqueue_script('ml_parallax', $plugin_path.'js/ml-parallax.js',array('jquery'),'1.0',true);
	wp_enqueue_style( 'animate', $plugin_path. 'css/animate.css' );
	wp_enqueue_style( 'ml-parallax', $plugin_path. 'css/ml-parallax.css' );
}


//------------------------Add shortcode for anmiate.css effects------------------------------
add_shortcode ("mlprx", "ml_animate");
add_shortcode ("mlanimate", "ml_animate");
function ml_animate($atts, $content){
    extract(shortcode_atts(array(
        'effect' => 'fadeIn',
		'delay' => '1000',
		'class' => '',
		'style' => ''
                    ), $atts));
	return '<div class="mlprx '.$class.'" style="'.$style.'" data-effect="animated '.$effect.'" data-delay="'.$delay.'">'.do_shortcode($content).'</div>';
}


//------------------------Add shortcode for scorlling parallax effect------------------------------
add_shortcode ('mlprxbg', 'mlprxbg');

function mlprxbg($atts,$content){
    extract(shortcode_atts(array(
        'style' => '',
		'class' => '',
		'id' => '',
		'url' => ''
                    ), $atts));
		if(!empty($id)) $id='id='.$id;
	return '<div class="ml-parallax-bg '.$class.'" '.$id.' style="background:url('.$url.');'.$style.'">'.do_shortcode($content).'</div>';
}

