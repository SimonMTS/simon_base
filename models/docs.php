<?php
    class Docs {
        public $_id;
        public $user_id;
        public $path;
        public $name;
        public $date;

        public function __construct($_id, $user_id, $path, $name, $date) {
            $this->_id = $_id;
            $this->user_id = $user_id;
            $this->path = $path;
            $this->name = $name;
            $this->date = $date;
        }

        public static function all() {
            $list = [];
            $db = db::init();

            $col = $db->docs;
            $result = $col->find();

            return $result;
        }

        public function delete() {
            $db = db::init();

            $col = $db->docs;

            $result = $col->remove(["_id" => $this->_id]);
        }
    }
?>
