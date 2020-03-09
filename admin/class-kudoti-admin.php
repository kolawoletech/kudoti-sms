<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.newbietech.com.ng/portfolio
 * @since      1.0.0
 *
 * @package    Kudoti
 * @subpackage Kudoti/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Kudoti
 * @subpackage Kudoti/admin
 * @author     Kolawole Olulana <dev@kudoti.com>
 */
class Kudoti_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Kudoti_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Kudoti_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/kudoti-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Kudoti_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Kudoti_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/kudoti-admin.js', array('jquery'), $this->version, false);

    }

    /**
     *  Register the administration menu for this plugin into the WordPress Dashboard
     * @since    1.0.0
     */

    public function add_kudoti_admin_setting()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page('KUDOTI SMS PAGE', 'KUDOTI', 'manage_options', $this->plugin_name, array($this, 'display_kudoti_settings_page')
        );
    }

/**
 * Render the settings page for this plugin.( The html file )
 *
 * @since    1.0.0
 */

    public function display_kudoti_settings_page()
    {
        include_once 'partials/kudoti-admin-display.php';
    }

}
