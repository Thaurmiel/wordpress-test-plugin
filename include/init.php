<?php

/** 
 * @package testPlugin
 */

namespace Inc;

use Inc\Base;

class Admin
{
    function __construct()
    {
        $this->register();
    }
    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages()
    {
        add_menu_page('Test plugin', 'Test', 'manage_options', 'test_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}

class TestPlugin
{
    public $plugin_name;
    public $plugin_button;
    function __construct()
    {
        $this->plugin_name = plugin_basename(__FILE__);
        $this->create_post_type();
        $this->plugin_button = new Admin();
        

    }

    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_filter("plugin_action_links_$this->plugin_name",array($this,'settings_link'));
    }

    public function settings_link( $links){
        $settings_link = '<a href="admin.php?page=test_plugin">Settings</a>';
        array_push($links,$settings_link);
        return $links;
    }

    protected function create_post_type()
    {
        add_action('init', array($this, 'custom_post_type'));
    }


    function custom_post_type()
    {
        register_post_type('test_book', ['public' => true, 'label' => 'test_books']);
    }

    function enqueue()
    {
    }

    function activate()
    {
        Base\Activate::activate();
    }

    function deactivate()
    {
        Base\Deactivate::deactivate();
    }

    // methods

}


    $testPlugin = new TestPlugin();
    $testPlugin->register();






// activation
register_activation_hook(__FILE__, array($testPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($testPlugin, 'deactivate'));

// unninstall => unninstall.php
