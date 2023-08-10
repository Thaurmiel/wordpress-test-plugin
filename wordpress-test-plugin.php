<?php

/** 
 * @package testPlugin
*/

/*
Plugin Name: Test Plugin
Description: Exploring plugin features
Version: 0.1.0
Author: Thaurmiel
*/

defined('ABSPATH') or die();


// composer
if(file_exists(dirname(__FILE__).'/vendor/autoload.php'))
{
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

define ('PLUGIN_PATH', plugin_dir_path(__FILE__));


require_once plugin_dir_path(__FILE__).'include/init.php';
