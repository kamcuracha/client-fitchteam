<?php

/*
Shortcodes For Stream Wordpress Theme.
*/

function startdiv_func(  $atts, $content = null  ){
		extract( shortcode_atts( array(
			'class' => 'half-column'
		), $atts ) );
 
	  return '<div class="'. esc_attr($class) .'">' . do_shortcode($content) . '</div>';
	
}

add_shortcode( 'div', 'startdiv_func' );




function stream_greyline_shortcode( $atts ){
	return '<div class="shortcodeDevider"></div>';
}
add_shortcode( 'greyline' , 'stream_greyline_shortcode' );

function stream_testimonal_shortcode(  $atts, $content = null  ){
		extract( shortcode_atts( array(
	     'text' => 'testimonial',
       'author' => 'stream team'
		), $atts ) );
	return '<div class="testimonialPanel">'. esc_attr($text) . '</div><div class="authorDetails">'. $author . '</div>';
}
add_shortcode( 'testimonialRight' , 'stream_testimonal_shortcode' );


function stream_testimonalfull_shortcode(  $atts, $content = null  ){
		extract( shortcode_atts( array(
	     'text' => 'testimonial',
       'size' => '15px',
       'author' => 'stream team'
		), $atts ) );
	return '<div class="testimonialFullPanel" style="font-size: '. $size . ';">'. $text . '</div><div class="authorFullDetails">'. $author . '</div>';
}
add_shortcode( 'testimonialFull' , 'stream_testimonalfull_shortcode' );


function stream_clear_shortcode( $atts ){
	return '<div class="clear"></div>';
}
add_shortcode( 'clear' , 'stream_clear_shortcode' );

?>