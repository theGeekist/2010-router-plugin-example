<?php

require_once plugin_dir_path(__FILE__) . '/../BaseController.php';

class Opportunities extends BaseController
{

    public function index($args = null)
    {
        $this->render_opportunities_dashboard();
    }

    public function edit($args = null)
    {
        $this->render_edit_opportunity_form($args);
    }

    private function render_opportunities_dashboard()
    {
        echo '<div class="wrap">';
        echo '<h1>Opportunities Dashboard</h1>';
        echo '<a href="' . esc_url(admin_url('admin.php?page=Opportunities&action=edit')) . '" class="button">Add New Opportunity</a>';
        echo '<hr>';
        echo '<p>Manage your opportunities here.</p>';
        $this->render_info();
        echo '</div>';
    }

    private function render_edit_opportunity_form($args)
    {
        $id = $args['id'] ?? 'N/A';

        echo '<div class="wrap">';
        echo '<h1>Edit Opportunity</h1>';
        echo '<form method="post" action="">';
        echo '<p><label>Name: <input type="text" name="name" value="Opportunity ' . esc_attr($id) . '"></label></p>';
        echo '<p><label>Status: ';
        echo '<select name="status">';
        echo '<option value="open">Open</option>';
        echo '<option value="closed">Closed</option>';
        echo '</select></label></p>';
        echo '<p><input type="submit" class="button-primary" value="Save Changes"></p>';
        echo '</form>';
        $this->render_info();
        echo '</div>';
    }
}

