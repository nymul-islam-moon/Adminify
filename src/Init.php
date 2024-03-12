<?php

namespace Adminify;

class Init {

    public function __construct() {
        add_action('admin_menu', [$this, 'registerAdminMenu']);
    }

    public function registerAdminMenu() {
        add_menu_page(
            __('Adminify Settings', 'adminify'),
            'Adminify',
            'manage_options',
            'adminify-settings',
            [$this, 'adminifySettingsPage'],
            'dashicons-admin-users',
            100
        );
    }

    public function adminifySettingsPage() {
        // Content for the settings page
        echo '<h1>' . esc_html__('Adminify Settings', 'adminify') . '</h1>';
    }

}