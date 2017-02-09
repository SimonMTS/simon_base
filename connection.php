<?php
    class Db {
        private static $instance = NULL;
        
        public static function getInstance() {
            if (!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO('mysql:host='. $GLOBALS['config']['sql']['host'] .';dbname='. $GLOBALS['config']['sql']['dbname'], $GLOBALS['config']['sql']['name'], $GLOBALS['config']['sql']['password'], $pdo_options);
            }
            return self::$instance;
        }
    }

    class Redirect {
        public static function to($url) {
            if (headers_sent()) {
                echo '<meta http-equiv="Location" content="' . $url . '">';
                echo '<script> location.replace("' . $url . '"); </script>';
                echo '<a href="' . $url . '">' . $url . '</a>';
                exit;
            } else {
                header('location: ' . $url);exit;
            }
        }
    }
?>