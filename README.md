# 2010 Router Plugin Example

This repository contains the **2010 Router Plugin Example**, created and modelled after the original post from 14 years ago. The **router logic** and **post** remain unchanged, demonstrating the simplicity of the approach. This plugin was originally built for **WordPress 3.0** in 2010 and has been verified to work in **WordPress 6.7.1** as of 2024.

---

## File Structure

Here’s an overview of the files included:

```
2010-router-plugin-example/
├── BaseController.php       # Base class for all controllers, providing shared utility methods
├── controllers/             # Directory containing individual controller classes
│   ├── Contacts.php         # Example controller for managing Contacts
│   └── Opportunities.php    # Example controller for managing Opportunities
├── plugin.php               # Main plugin file that registers the router and menus
└── router.php               # Core router logic, unchanged since its original implementation
```

---

## Getting Started

Follow these steps to use this project as a starting point for your own plugins:

1. **Clone the Repository**  
   Clone this repository into your WordPress `plugins` directory:
   ```bash
   git clone https://github.com/theGeekist/2010-router-plugin-example.git wp-content/plugins/2010-router-plugin-example
   ```

2. **Activate the Plugin**  
   Log in to your WordPress admin dashboard, navigate to **Plugins**, and activate the **2010 Router Plugin Example**.

3. **Explore the Example**  
   - The **Contacts** and **Opportunities** controllers demonstrate how to manage menus and routes.
   - The `BaseController.php` provides shared functionality that you can extend for new controllers.

4. **Extend the Plugin**  
   To add your own functionality:
   - Create a new PHP file in the `controllers` directory. For example: `MyController.php`.
   - Ensure your controller extends `BaseController` and follows the same pattern as the provided examples.
   - Add your routes and methods, and they will automatically integrate into the plugin.

---

## How It Works

- The `plugin.php` file dynamically registers each controller in the `controllers` directory as a menu under the CRM parent menu.
- The `router.php` file handles routing based on the `$_GET['page']` and `$_GET['action']` parameters, dynamically invoking the appropriate controller and method.
- Each controller is responsible for defining its own menu items and actions, ensuring modularity and flexibility.

---

## Historical Context

This router was originally built for WordPress 3.0, released in June 2010, which introduced custom post types and menus. It was designed to leverage the new menu APIs and provide a lightweight solution for structured plugin development.
