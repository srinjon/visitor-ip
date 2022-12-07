<?php
/**
 * Plugin Name:Visitor Ip
 * Description: This is a test plugin.
 * Version: 1.0
 * Author: Srinjon
 * Author URI:https://visitorip.com/plugin
 */
if(!defined('ABSPATH')){
    header("Location: /firstproject/wordpress/");
    die();
}

$path=preg_replace('/wp-content.*$/','',__DIR__);
require_once($path.'/wp-load.php');
// include_once ('dbConfig.php');
function my_plugin(){
include_once('BrowserDetection.php');
$browser=new Wolfcast\BrowserDetection;
$ipaddress = $_SERVER['REMOTE_ADDR'] ; 
$browser_name=$browser->getName();
    global $wpdb;
    $q=$wpdb->prepare("INSERT INTO `wp_visitor` (user_ip_address, user_agent) VALUES (%s, %s)" ,$ipaddress, $browser_name);
    $wpdb->query($q);
    ?>
    <div>
        <h1>Store visitor Log in the database with PHP & MYSQL</h1>
        <!-- <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

      <script>

    /* Add "https://api.ipify.org?format=json" statement
               this will communicate with the ipify servers in
               order to retrieve the IP address $.getJSON will
               load JSON-encoded data from the server using a
               GET HTTP request */

    $.getJSON("https://api.ipify.org?format=json", function(data) {

        // Setting text of element P with id gfg
        $("#gfg").html(data.ip);
    })
    </script>

       <p name="ip" id="gfg"></p>
    </div> -->
    
    <?php
}
add_shortcode('vistorip','my_plugin');

?>
