<?php
    class UsersController {

        public function login() {

            if (isset($_POST['user'])) {
                $user = User::findByName($_POST['user']['name']);

                if ($user !== false) {
                    if ($user->password === $_POST['user']['password']) {

                        $_SESSION['user'] = [
                            '_id' => $user->_id,
                            'name' => $user->name,
                            'password' => $user->password,
                            'role' => $user->role,
                        ];

                        Redirect::to($GLOBALS['config']['base_url']);
                    } else {
                        require_once('views/users/login.php');
                    }
                } else {
                    require_once('views/users/login.php');
                }
            } else {
                require_once('views/users/login.php');
            }
        }

        public function logout() {
            $_SESSION['user'] = null;
            Redirect::to($GLOBALS['config']['base_url']);
        }

        public function create() {
            if (
                isset($_POST['user']) && isset($_POST['user']['name']) && isset($_POST['user']['password']) && isset($_POST['user']['role'])
                && !empty($_POST['user']['name']) && !empty($_POST['user']['password']) && !empty($_POST['user']['role'])
                && $_POST['user']['password'] == $_POST['user']['passwordrep']
            ) {
                if (!user::findByName($_POST['user']['name']) && user::role($_POST['user']['role']) != false) {
                    $user = new User(new MongoId(), $_POST['user']['name'], $_POST['user']['password'], user::role($_POST['user']['role']));

                    if ($user->save()) {
                        Redirect::to($GLOBALS['config']['base_url']);
                    } else {
                        require_once('views/users/create.php');
                    }
                } else {
                    require_once('views/users/create.php');
                }
            } else {
                require_once('views/users/create.php');
            }
        }

        public function edit() {
            $id = $_GET['var1'];
            $user = User::find(new MongoId($id));

            if ($user !== false && ($user->name == $_SESSION['user']['name'] && $user->password == $_SESSION['user']['password'])) {
                if (
                    isset($_POST['user']) && isset($_POST['user']['name']) && isset($_POST['user']['password']) && isset($_POST['user']['role'])
                    && $_POST['user']['name'] ==! '' && $_POST['user']['password'] ==! '' && $_POST['user']['role'] ==! ''
                    && user::role($_POST['user']['role']) != false
                ) {
                    $user->name = $_POST['user']['name'];
                    $user->password = $_POST['user']['password'];
                    $user->role = user::role($_POST['user']['role']);

                    if ($user->save()) {
                        Redirect::to($GLOBALS['config']['base_url'] . "users/edit/" . $user->_id);
                    } else {
                        require_once('views/users/edit.php');
                    }
                } else {
                    require_once('views/users/edit.php');
                }
            } else {
                return call('pages', 'error');
            }
        }

    }
?>
