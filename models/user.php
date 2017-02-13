<?php
    class User {
        public $_id;
        public $name;
        public $password;
        public $role;

        public function __construct($_id, $name, $password, $role) {
            $this->_id = $_id;
            $this->name = $name;
            $this->password = $password;
            $this->role = $role;
        }

        public static function role($text) {
            switch ($text) {
                case 'parent':
                    return 1;
                    break;
                case 'student':
                    return 2;
                    break;
                case 'teacher':
                    return 3;
                    break;
                case 'admin':
                    return 777;
                    break;
                default:
                    return false;
                    break;
            }

            return false;
        }

        public static function all() {
            $list = [];
            $db = db::init();

            $col = $db->user;
            $result = $col->findOne();

            foreach($req->fetchAll() as $user) {
                $list[] = new User($user['_id'], $user['name'], $user['password'], $user['role']);
            }

            return $list;
        }

        public static function find($_id) {
            $db = db::init();

            $col = $db->user;
            $result = $col->findOne( [ '_id' => $_id ] );

            if (isset($result['_id']) && isset($result['name']) && isset($result['password']) && isset($result['role'])) {
                return new User($result['_id'], $result['name'], $result['password'], $result['role']);
            } else {
                return false;
            }

        }

        public static function findByName($name) {
            $db = db::init();

            $col = $db->user;
            $result = $col->findOne( [ 'name' => $name ] );

            if (isset($result['_id']) && isset($result['name']) && isset($result['password']) && isset($result['role'])) {
                return new User($result['_id'], $result['name'], $result['password'], $result['role']);
            } else {
                return false;
            }

        }

        public function save() {
            if (self::find($this->_id) == false) {
                $db = db::init();

                $col = $db->user;

                $doc = [
                    "_id" => $this->_id,
                    "name" => $this->name,
                    "password" => $this->password,
                    "role" => $this->role
                ];

                $result = $col->insert($doc);

                $_SESSION['user'] = $doc;

                return true;
            } else {
                $db = db::init();

                $col = $db->user;

                $doc = [
                    "_id" => $this->_id,
                    "name" => $this->name,
                    "password" => $this->password,
                    "role" => $this->role
                ];

                $result = $col->update(
                    ["_id" => $this->_id],
                    [
                        '$set' => $doc
                    ]
                );

                $_SESSION['user'] = $doc;

                return true;
            }
        }
    }
?>
