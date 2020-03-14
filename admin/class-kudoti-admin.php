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

    /**
     * Registers and Defines the necessary fields we need.
     *
     */
    public function kudoti_admin_settings_save()
    {

        register_setting($this->plugin_name, $this->plugin_name, array($this, 'plugin_options_validate'));

        add_settings_section('kudoti_main', 'Main Settings', array($this, 'kudoti_section_text'), 'kudoti-settings-page');

        add_settings_field('api_sid', 'API SID', array($this, 'kudoti_setting_sid'), 'kudoti-settings-page', 'kudoti_main');

        add_settings_field('api_auth_token', 'API AUTH TOKEN', array($this, 'kudoti_setting_token'), 'kudoti-settings-page', 'kudoti_main');
    }

/**
 * Displays the settings sub header
 *
 */
    public function kudoti_section_text()
    {
        echo '<h3>Edit api details</h3>';
    }

/**
 * Renders the sid input field
 *
 */
    public function kudoti_setting_sid()
    {

        $options = get_option($this->plugin_name);
        echo "<input id='plugin_text_string' name='$this->plugin_name[api_sid]' size='40' type='text' value='{$options['api_sid']}' />";
    }

/**
 * Renders the auth_token input field
 *
 */
    public function kudoti_setting_token()
    {
        $options = get_option($this->plugin_name);
        echo "<input id='plugin_text_string' name='$this->plugin_name[api_auth_token]' size='40' type='text' value='{$options['api_auth_token']}' />";
    }

/**
 * Sanitises all input fields.
 *
 */
    public function plugin_options_validate($input)
    {
        $newinput['api_sid'] = trim($input['api_sid']);
        $newinput['api_auth_token'] = trim($input['api_auth_token']);

        return $newinput;
    }

    /**
     * Register the sms page for the admin area.
     *
     * @since    1.0.0
     */
    public function register_kudoti_sms_page()
    {
        // Create our settings page as a submenu page.
        add_submenu_page(
            'tools.php', // parent slug
            __('KUDOTI SMS PAGE', $this->plugin_name . '-sms'), // page title
            __('KUDOTI', $this->plugin_name . '-sms'), // menu title
            'manage_options', // capability
            $this->plugin_name . '-sms', // menu_slug
            array($this, 'display_kudoti_sms_page') // callable function
        );
    }

    /**
     * Display the sms page - The page we are going to be sending message from.
     *
     * @since    1.0.0
     */

    public function display_kudoti_sms_page()
    {
        include_once 'partials/kudoti-admin-sms.php';
    }

}
