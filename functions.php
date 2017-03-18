<?php

add_action( 'wp_enqueue_scripts', 'ms_divi_enqueue_styles' );
function ms_divi_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


/*-----------------------------------------------------------------------------------*/
/*  MAKE SVGs ALLOWED
/*-----------------------------------------------------------------------------------*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*-----------------------------------------------------------------------------------*/
/*  Add floating contact button
/*-----------------------------------------------------------------------------------*/

function media_salad_add_floating_button() {
		echo "<a class='floating-contact-button' href='#main-footer'>CONTACT</a>";
}
add_filter('get_header', 'media_salad_add_floating_button');

/*-----------------------------------------------------------------------------------*/
/*  Extending selected divi modules
/*-----------------------------------------------------------------------------------*/

// TO DO: Make this a single function call

function DS_Custom_Modules(){
 if(class_exists("ET_Builder_Module")){
 	// This adds options for more contact types and, with some clever css, a more flexible usage.
	include("enhanced_divi_modules/extended_person_module.php");

	// This creates a hybrid blurb/cta. CTA's should have the option for images and more than one button. Sheesh!
	// include("enhanced_divi_modules/extended_cta.php");
 }
}

function Prep_DS_Custom_Modules(){
 global $pagenow;

$is_admin = is_admin();
 $action_hook = $is_admin ? 'wp_loaded' : 'wp';
 $required_admin_pages = array( 'edit.php', 'post.php', 'post-new.php', 'admin.php', 'customize.php', 'edit-tags.php', 'admin-ajax.php', 'export.php' ); // list of admin pages where we need to load builder files
 $specific_filter_pages = array( 'edit.php', 'admin.php', 'edit-tags.php' );
 $is_edit_library_page = 'edit.php' === $pagenow && isset( $_GET['post_type'] ) && 'et_pb_layout' === $_GET['post_type'];
 $is_role_editor_page = 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'et_divi_role_editor' === $_GET['page'];
 $is_import_page = 'admin.php' === $pagenow && isset( $_GET['import'] ) && 'wordpress' === $_GET['import']; 
 $is_edit_layout_category_page = 'edit-tags.php' === $pagenow && isset( $_GET['taxonomy'] ) && 'layout_category' === $_GET['taxonomy'];

if ( ! $is_admin || ( $is_admin && in_array( $pagenow, $required_admin_pages ) && ( ! in_array( $pagenow, $specific_filter_pages ) || $is_edit_library_page || $is_role_editor_page || $is_edit_layout_category_page || $is_import_page ) ) ) {
 add_action($action_hook, 'DS_Custom_Modules', 9789);
 }
}
Prep_DS_Custom_Modules();

//#############################
// Add dummy type where needed. It will show up red, which is an alarm color.
//#############################

function lorem_function($atts){
	extract(shortcode_atts(array(
		'num' => 4
		),$atts));
	$retval = "<p style='color:red;border:1px solid red'><strong>Dummy type needs replacing: </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud execcaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labor.</p>";
	$lorem = "<p style='color:red;border:1px solid red'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud execcaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>";
	
	for ($i = 0; $i < intval($atts['num']) - 1; $i++) {
    	$retval = $retval . $lorem;
	}

	return $retval;
}
add_shortcode('lorem','lorem_function');

/*-----------------------------------------------------------------------------------*/
/*  Add Google Analytics to the footer
/*-----------------------------------------------------------------------------------*/
/*
function add_google_analytics(){
	echo "<!-- BEGIN ANALYTICS -->";
	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71159106-1', 'auto');
  ga('send', 'pageview');

</script>";
	echo "<!-- END ANALYTICS -->";
}
add_action('wp_footer', 'add_google_analytics');
*/
?>