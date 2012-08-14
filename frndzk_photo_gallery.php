<?php   
    /* 
    Plugin Name: Frndzk Photo Lightbox Gallery
    Plugin URI: http://www.bitto.us
    Description: Plugin For Making photo gallery with lightbox to all posts and pages automatically. just install and see the magic. no setup or cofiguration needed.
    Author: Bitto Kazi
    Version: 1.0 
    Author URI: http://www.bitto.us
    */
function frndzk_photo_lightbox() {
wp_enqueue_script(
      'custom-script3-frndzk',
      '/wp-content/plugins/frndzk-photo-lightbox-gallery/js/lightbox.js',
      array('jquery')
   );
wp_register_style( 'frndzk-css', 
    '/wp-content/plugins/frndzk-photo-lightbox-gallery/css/lightbox.css', 
    array(), 
    '20120208', 
    'all' );
wp_enqueue_style( 'frndzk-css' );

wp_enqueue_script('scriptaculous');
}
add_action('wp_enqueue_scripts', 'frndzk_photo_lightbox');







add_filter( 'the_content', 'remove_br_gallery_fpg', 11, 2);

function remove_br_gallery_fpg($output) {

    return str_replace('><img', ' rel=lightbox[roadtrip]><img ',  $output);

}
function frndzk_admin() {  
echo 'if you have activated frndzk photo lightbox gallery plugin you will be able to see lightbox effect on every photo of every post and pages.<br>
This plugin is developed by bitto kazi'; 
}
function frndzk_admin_actions() {  
    add_options_page("Frndzk lightbox Photo Gallery", "Frndzk lightbox Photo Gallery", "manage_options","Frndzk-Photo-Gallery","frndzk_admin");  
}
add_action('admin_menu', 'frndzk_admin_actions');
?>