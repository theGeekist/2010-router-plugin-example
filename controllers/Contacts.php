<?php

require_once plugin_dir_path(__FILE__) . '/../BaseController.php';

class Contacts extends BaseController
{

    public function index($args = null)
    {
        $this->render_contacts_dashboard();
    }

    public function add($args = null)
    {
        $this->render_add_contact_form();
    }

    private function render_contacts_dashboard()
    {
        echo '<div class="wrap">';
        echo '<h1>Contacts Dashboard</h1>';
        echo '<a href="' . esc_url(admin_url('admin.php?page=Contacts&action=add')) . '" class="button">Add New Contact</a>';
        echo '<hr>';
        echo '<p>Manage your contacts here.</p>';
        $this->render_info();
        echo '</div>';
    }

    private function render_add_contact_form()
    {
        echo '<div class="wrap">';
        echo '<h1>Add Contact</h1>';
        echo '<form method="post" action="">';
        echo '<p><label>Name: <input type="text" name="name"></label></p>';
        echo '<p><label>Email: <input type="email" name="email"></label></p>';
        echo '<p><input type="submit" class="button-primary" value="Save Contact"></p>';
        echo '</form>';
        $this->render_info();
        echo '</div>';
    }
}

