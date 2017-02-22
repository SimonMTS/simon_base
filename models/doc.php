<?php
    class Doc {
        public $_id;
        public $user_id;
        public $path;
        public $name;
        public $class_code;

        public function __construct($_id, $user_id, $path, $name, $class_code) {
            $this->_id = $_id;
            $this->user_id = $user_id;
            $this->path = $path;
            $this->name = $name;
            $this->class_code = $class_code;
        }

        public static function all() {
            $list = [];
            $db = db::init();

            $col = $db->docs;
            $result = $col->find();

            return $result;
        }

        public static function find($_id) {
            $db = db::init();

            $col = $db->docs;
            $result = $col->findOne( [ '_id' => new MongoId($_id) ] );

            if (
                isset($result['_id']) &&
                isset($result['user_id']) &&
                isset($result['path']) &&
                isset($result['name']) &&
                isset($result['class_code'])
            ) {
                return new Doc(
                    $result['_id'],
                    $result['user_id'],
                    $result['path'],
                    $result['name'],
                    $result['class_code']
                );
            } else {
                return false;
            }
        }

        public static function findByUser($_id) {
            $db = db::init();

            $col = $db->docs;

            return $col->find( [ 'user_id' => new MongoId($_id) ] );
        }

        public static function findByClass($code) {
            $db = db::init();

            $col = $db->docs;

            return $col->find( [ 'class_code' => $code ] );
        }

        public function delete() {
            $db = db::init();

            $col = $db->docs;

            $result = $col->remove(["_id" => $this->_id]);

            return true;
        }

        public function save() {
            $db = db::init();

            $col = $db->docs;

            $doc = [
                "_id" => $this->_id,
                "user_id" => $this->user_id,
                "path" => $this->path,
                "name" => $this->name,
                "class_code" => $this->class_code
            ];

            $result = $col->insert($doc);

            return true;

        }
    }
?>
