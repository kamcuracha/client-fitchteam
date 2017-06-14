<?php
/**
 * "You know, everyone's a Democrat until they get a little money. Then they come to their senses."
 * ~ Harold Weir (Freaks and Geeks)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    SociallyAwkward
 * @subpackage Functions
 * @version    1.0.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013 - 2014, Justin Tadlock
 * @link       http://themehybrid.com/themes/socially-awkward
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/* Load the core theme framework. */
require_once( trailingslashit( get_template_directory() ) . 'library/hybrid.php' );
new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'socially_awkward_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */

function socially_awkward_theme_setup() {

	/* Load includes. */
	require_once( trailingslashit( get_template_directory() ) . 'inc/hybrid-core-x.php'    );
	require_once( trailingslashit( get_template_directory() ) . 'inc/socially-awkward.php' );

	/* Load scripts. */
	add_theme_support( 'hybrid-core-scripts', array( 'comment-reply', 'mobile-toggle' ) );

	/* Load styles. */
	add_theme_support(
		'hybrid-core-styles',
		array( 'font-main', 'map-api', 'isotope',  'modernizr', 'isotope', 'theme-mediaelement', 'owl-carousel', 'owl-carousel-theme' )
	);

	/* Load shortcodes. */
	add_theme_support( 'hybrid-core-shortcodes' );

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Allow per-post stylesheets. */
	add_theme_support( 'post-stylesheets' );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Nicer [gallery] shortcode implementation. */
	add_theme_support( 'cleaner-gallery' );

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/* Post formats. */
	add_theme_support(
		'post-formats',
		array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video' )
	);

	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 960 );
}

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}



//Include The Lib Files
//
//
include 'lib/post_type.php';

if (function_exists('register_sidebar')) {

	register_sidebar( array(
		'name' => 'Footer Sidebar',
		'id' => 'footer_sidebars',
		'before_title' => false,
		'after_title' => false,
		'before_widget' => '<div class="col-md-2">',
		'after_widget' => '</div>'
	));
}

add_action('init', 'add_my_options_pages');
function add_my_options_pages() {
    if( function_exists('acf_add_options_page') ) {


        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));

    }
}

add_action('admin_post_nopriv_get_finance', 'get_finance_function');
add_action('admin_post_get_finance', 'get_finance_function');
function get_finance_function() {
	$to = 'kanomi@lightmedia.com.au';
	$subject = 'Finance Enquiry - Heating and Cooling Services, Fyshwick';
	$body = get_finance_body_function($_POST);
	$headers[] = 'From: Heat Shop <info@hcscanberra.lmweb.com.au>';
	$headers[] = 'Cc: lily@lightmedia.com.au, james@lightmedia.com.au';
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	wp_mail( $to, $subject, $body, $headers );
	header('Location: /finance/thank-you');
}

function get_finance_body_function($data) {
	$ret = '<div style="font-size:16px">';
	$ret = 'Financing for: '.(isset($data['ptitle'])?$data['ptitle']:'').'<br>';
	$ret .= 'Price: $'.(isset($data['pprice'])?number_format($data['pprice'], 2, '.', ','):'0.00').'<br>';
	$ret .= 'Name: '.(isset($data['name'])?$data['name']:'').'<br>';
	$ret .= 'Phone: '.(isset($data['phone'])?$data['phone']:'').'<br>';
	$ret .= 'Email: '.(isset($data['email'])?$data['email']:'').'<br>';
	$ret .= 'Comment: '.(isset($data['comment'])?$data['comment']:'').'<br>';

	$ret .= '<table style="text-align:left;margin-top:12px;width:400px;">';
    $ret .= '<tr><th>Name</th><th>QTY</th><th class="text-right">Price</th></tr>';
    if(!empty($data['ppricing-title']))
    {
    	foreach($data['ppricing-title'] as $key => $title)
    		$ret .= '<tr><td>'.$title.'</td><td>'.$data['ppricing-quantity'][$key].'</td><td>$'.number_format($data['ppricing-price'][$key], 2, '.', ',').'</td></tr>';
    }
    else
    	$ret .= '<tr><td colspan="3">No Pricing</td></tr>';
    $ret .= '<tfoot><th colspan="2">Total:</th><th>$'. (isset($data['ptotal'])?number_format($data['ptotal'], 2, '.', ','):'0.00'). '</th></tfoot>';
    $ret .= '</table>';
	$ret .= '</div>';

	return $ret;
}



function wds_cpt_search( $query ) {

	if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){

		$query->set('post_type', array('projects'));
	}

	return $query;
};

add_filter('pre_get_posts', 'wds_cpt_search');


function get_youtube_id_from_url($url) {
	if (stristr($url,'youtu.be/'))
	{preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
	else
	{@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
}

function wpbeginner_numeric_posts_page() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="card-pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="pagi-nav">%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="pagi-nav">%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Projects', 'sm-textdomain' ), 'sm_meta_callback', 'projects' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    	<div class="sm-row-content">
        	<label for="meta-checkbox">
            	<input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        	</label>
        
    	</div>
	</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );

function limit_string($string, $charlimit) 
{ 
    if(substr($string,$charlimit-1,1) != ' ') 
    { 
        $string = substr($string,'0',$charlimit); 
        $array = explode(' ',$string); 
        array_pop($array); 
        $new_string = implode(' ',$array); 

        return $new_string.'...'; 
    } 
    else 
    {    
        return substr($string,'0',$charlimit-1).'...'; 
    } 
}

add_filter('newsletter_enqueue_style', '__return_false');

add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}