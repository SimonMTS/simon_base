<?php
    function call($controller, $action) {
        require_once('controllers/' . $controller . '_controller.php');

        // Links to the controllers
        switch($controller) {

            case 'pages':
                $controller = new PagesController();
            break;

            case 'users':
                require_once('models/user.php');
                $controller = new UsersController();
            break;

        }

        $controller->{$action}();
    }

    // All valid conntrollers and actions
    $controllers = [

        'pages' => [
            'home',
            'error'
        ],

        'users' => [
            'login',
            'logout',
            'overview',
            'view',
            'create',
            'edit',
            'delete'
        ]
    ];

    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            call('pages', 'error');
        }
    } else {
        call('pages', 'error');
    }
?>
