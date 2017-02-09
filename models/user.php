<?php
    class User {
        public $id;
        public $name;
        public $password;
        public $role;

        public function __construct($id, $name, $password, $role) {
            $this->id = $id;
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
            $db = Db::getInstance();
            $req = $db->query('SELECT * FROM user');

            foreach($req->fetchAll() as $user) {
                $list[] = new User($user['id'], $user['name'], $user['password'], $user['role']);
            }
            
            return $list;
        }

        public static function find($id) {
            $db = Db::getInstance();

            $id = $id;
            $req = $db->prepare('SELECT * FROM user WHERE id = :id');

            $req->execute(array('id' => $id));
            $post = $req->fetch();
            
            if (isset($post['id']) && isset($post['name']) && isset($post['password']) && isset($post['role'])) {
                return new User($post['id'], $post['name'], $post['password'], $post['role']);
            } else {
                return false;
            }
            
        }
        
        public static function findByName($name) {
            $db = Db::getInstance();

            $req = $db->prepare('SELECT * FROM user WHERE name = :name');

            $req->execute(['name' => $name]);
            $post = $req->fetch();

            if (isset($post['id']) && isset($post['name']) && isset($post['password']) && isset($post['role'])) {
                return new User($post['id'], $post['name'], $post['password'], $post['role']);
            } else {
                return false;
            }
            
        }
        
        public function save() {
            if (self::find($this->id) == false) {
                $db = Db::getInstance();

                $req = $db->prepare('INSERT INTO user (id, name, password, role) VALUES (:id, :name, :password, :role)');

                $succes = $req->execute([
                    ':id' => $this->id,
                    ':name' => $this->name,
                    ':password' => $this->password,
                    ':role' => $this->role
                ]);
                
                $_SESSION['user'] = [
                    'id' => $this->id,
                    'name' => $this->name,
                    'password' => $this->password,
                    'role' => $this->role,
                ];
                
                return $succes;
            } else {
                $db = Db::getInstance();

                $req = $db->prepare('UPDATE user SET name=:name, password=:password, role=:role WHERE id = :id');

                $succes = $req->execute([
                    ':id' => $this->id,
                    ':name' => $this->name,
                    ':password' => $this->password,
                    ':role' => $this->role
                ]);
                
                $_SESSION['user'] = [
                    'id' => $this->id,
                    'name' => $this->name,
                    'password' => $this->password,
                    'role' => $this->role,
                ];
                
                return $succes;
            }
        }
    }
?>