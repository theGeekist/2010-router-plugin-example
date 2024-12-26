<?php
/**
 * Plugin Name: 2010 Router Plugin Example
 * Description: Demonstrating the original 2010 router in a WordPress plugin.
 * Version: 1.0
 * Author: Jason Joseph Nathan
 */

// Include the Router class
require_once plugin_dir_path(__FILE__) . 'router.php';

// Dynamically include all controllers
add_action('init', function () {
    foreach (glob(plugin_dir_path(__FILE__) . 'controllers/*.php') as $file) {
        require_once $file;
    }
});

// Register admin menus and submenus dynamically
add_action('admin_menu', function () {
    // Add the top-level CRM menu
    add_menu_page(
        'CRM Plugin',               // Page title
        'CRM',                      // Menu title
        'manage_options',           // Capability
        'CRM',                      // Menu slug
        'handle_crm_route',                         // No callback for the parent menu
        'dashicons-admin-generic',  // Icon URL
        2                           // Position
    );

    // Dynamically register controllers as submenu items
    foreach (glob(plugin_dir_path(__FILE__) . 'controllers/*.php') as $file) {
        $controller_name = pathinfo($file, PATHINFO_FILENAME);

        // Add each controller as a submenu under the CRM menu
        add_submenu_page(
            'CRM',                  // Parent slug
            "$controller_name Dashboard", // Page title
            $controller_name,       // Menu title
            'manage_options',       // Capability
            $controller_name,       // Menu slug
            'handle_crm_route'      // Callback function
        );
    }
    // Remove the redundant default submenu added by WordPress
    remove_submenu_page('CRM', 'CRM');
});

// Route handler function
function handle_crm_route()
{
    // Define the routing logic
    $route = [
        $_GET['page'] ?? 'Contacts', // Default to Contacts controller
        $_GET['action'] ?? 'index',  // Default to index method
        $_GET                        // Additional parameters
    ];

    // Load the appropriate controller
    $router = new Router(
        $route,
        'Contacts',                 // Default controller
        'index'                     // Default method
    );
}

