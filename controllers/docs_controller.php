<?php
    class DocsController {

        public function create() {
            if (isset($_POST['docs']['name']) && isset($_POST['docs']['path'])) {

            } else {
                require_once('views/docs/create.php');
            }
        }

        public function delete() {
            Redirect::to($GLOBALS['config']['base_url'] . 'users/view');
        }

        public function view() {
            require_once('views/docs/view.php');
        }
    }
?>
