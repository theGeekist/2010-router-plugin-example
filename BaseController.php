<?php

class BaseController
{
  public function __construct()
  {
    add_action('admin_menu', [$this, 'add_menu_items']);
  }

  /**
   * Add menu items (should be overridden by child classes).
   */
  public function add_menu_items()
  {
    // To be implemented in child classes.
  }

  /**
   * Render information about the current request.
   */
  protected function render_info()
  {
    echo '<div class="postbox">';
    echo '<h2>Request Info</h2>';
    echo '<div class="inside">';
    echo '<p><strong>Current Controller:</strong> ' . esc_html($_GET['page'] ?? 'N/A') . '</p>';
    echo '<p><strong>Current Action:</strong> ' . esc_html($_GET['action'] ?? 'index') . '</p>';
    echo '<p><strong>GET Parameters:</strong></p>';
    echo '<pre>' . esc_html(print_r($_GET, true)) . '</pre>';
    echo '</div>';
    echo '</div>';
  }

  /**
   * Utility method to render a standard WordPress-style table.
   *
   * @param array $columns Array of column headers.
   * @param array $rows Array of rows (each row is an array of values).
   */
  protected function create_table($columns, $rows)
  {
    echo '<table class="widefat fixed" cellspacing="0">';
    echo '<thead>';
    echo '<tr>';
    foreach ($columns as $column) {
      echo '<th class="manage-column">' . esc_html($column) . '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($rows as $row) {
      echo '<tr>';
      foreach ($row as $cell) {
        echo '<td>' . esc_html($cell) . '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  }
}

