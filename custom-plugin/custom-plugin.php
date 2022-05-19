<?php

/*
 
Plugin Name: bsdfooter_plugin
 
Plugin URI:
 
Description: we create a footer for our website
 
Version: 1.0
 
Author: Ayoub Basidi
 
Author URI: 
 
Text Domain: bsdfooter
 
*/

// require_once plugin_dir_path(__FILE__) . 'includes/mfp-functions.php';


defined( 'ABSPATH') or die( 'Hey, you can\t access this file, you silly human!' );




function custom_plugin_register_settings() {
 
register_setting('custom_plugin_options_group', 'email');
 
register_setting('custom_plugin_options_group', 'copyright');
 
register_setting('custom_plugin_options_group', 'facebook_url');

register_setting('custom_plugin_options_group', 'twitter_url');

register_setting('custom_plugin_options_group', 'linkedin_url');
 
}
add_action('admin_init', 'custom_plugin_register_settings');

function custom_plugin_setting_page() {
 
    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' , string $icon_url = '');

     
    add_menu_page('Custom Plugin', 'Bsd Footer Setting', 'manage_options', 'custom-plugin-setting-url', 'custom_page_html_form' , plugins_url('custom-plugin/img/icon.png'));
     
    // custom_page_html_form is the function in which I have written the HTML for my custom plugin form.
    }
    add_action('admin_menu', 'custom_plugin_setting_page');

    function custom_page_html_form() { ?>
        <div class="wrap">
            <h2>Bsd Footer Plugin Setting</h2>
            <p>Here you can edit the footer content</p>
            <form method="post" action="options.php">
                <?php settings_fields('custom_plugin_options_group'); ?>
     
            <table class="form-table">
     
                <tr>
                    <th><label for="first_field_id">Enter Your E-mail:</label></th>
     
                    <td>
    <input type = 'text' class="regular-text" id="first_field_id" name="email" value="<?php echo get_option('email'); ?>">
                    </td>
                </tr>
     
                <tr>
                    <th><label for="second_field_id">Enter Your Copyright:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="second_field_id" name="copyright" value="<?php echo get_option('copyright'); ?>">
                    </td>
                </tr>
     
                <tr>
                    <th><label for="third_field_id">Enter Your Facebook Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="third_field_id" name="facebook_url" value="<?php echo get_option('facebook_url'); ?>">
                    </td>
                    </tr>
                <tr>
                    <th><label for="fourth_field_id">Enter Your Twitter Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="fourth_field_id" name="twitter_url" value="<?php echo get_option('twitter_url'); ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="fifth_field_id">Enter Your Linkedin Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="fifth_field_id" name="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>">
                    </td>
                </tr>
            </table>
     
            <?php submit_button(); ?>
     
        </div>
    <?php } ?>

<?php
    function tryvary_include_inline_css()
{
    ?>
    <style>
        .footer{
        background-color:black;color:white;display:flex;justify-content: space-between;align-items: center;padding:10px;font-family: 'Itim', cursive;
        }
        .footer-right{
            display:flex;justify-content: space-between;align-items: center;
        }
        .wp-menu-image img{
         width:10px !important;
        }
    </style>
    <?php
}

add_action('wp_head', 'tryvary_include_inline_css', 100);



add_action( 'wp_footer', 'say_hello');


function say_hello(){

  echo ('<div class="footer">
  <div class="footer-left"><p>Contact : 
  ');

  echo get_option("email");

  echo ('</p></div>
  <div class="footer-center"><p>
  ');

  echo get_option("copyright");

  echo ('</p></div>
  <div class="footer-right"><a href=');

  echo get_option("facebook_url");

  echo ('><img src="https://img.icons8.com/ios-filled/344/ffffff/facebook-new.png" alt="facebook" width="30px"></a>
  <a href=');

  echo get_option("twitter_url");

  echo('><img src="https://img.icons8.com/ios-filled/344/ffffff/twitter-circled.png" alt="twitter" width="30px"></a>
  <a href=');

  echo get_option("linkedin_url");

  echo('><img src="https://img.icons8.com/ios-filled/344/ffffff/linkedin-circled.png" alt="linkedin" width="30px"></a></div>
  </div>
  ');



// add_menu_page( 
//     $page_title, 
//     $menu_title, 
//     $capability, 
//     $menu_slug, 
//     $function, 
//     $icon_url, 
//     $position 
// ); 

}
