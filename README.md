//    public function __construct() {
//        add_action('init', [$this, 'registerAdminMenu']);
//    }
//
//    public function registerAdminMenu() {
//        add_menu_page(
//            __('Adminify Settings', 'adminify'),
//            'Adminify',
//            'manage_options',
//            'adminify-settings',
//            [$this, 'adminifySettingsPage'],
//            'dashicons-admin-users',
//            100
//        );
//    }
//
//    public function adminifySettingsPage() {
//        // Content for the settings page
//        echo '<h1>' . esc_html__('Adminify Settings', 'adminify') . '</h1>';
//
//
//
//        $client = new \Google\Client();
//        $client->setAuthConfig('/Users/webappick-acc-ass-2024-00030/Documents/sites/ctxfeed/wp-content/plugins/adminify/client_secret_171958695233-6c2g807t2dvk861ug22aq8kpb9aj42rj.apps.googleusercontent.com.json');
////        $client->addScope(\Google\Service\ShoppingContent);
//
//        // Your redirect URI can be any registered URI, but in this example
//// we redirect back to this same page
//        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//        $redirect_uri = 'http://ctxfeed.test:8888/wp-admin/admin.php?page=adminify-settings';
//        error_log(print_r($redirect_uri, true));
//        $client->setRedirectUri($redirect_uri);
//
//        $client->setAccessType('offline');        // offline access
//        $client->setIncludeGrantedScopes(true);   // incremental auth
//
//        if (isset($_GET['code'])) {
//            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//        }
//    }
