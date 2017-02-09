<?php
    class Post {
        public $id;
        public $user_id;
        public $content;
        public $timestamp;

        public function __construct($id, $user_id, $content, $timestamp) {
            $this->id = $id;
            $this->user_id = $user_id;
            $this->content = $content;
            $this->timestamp = $timestamp;
        }

        public static function all() {
            $list = [];
            $db = Db::getInstance();
            $req = $db->query('SELECT * FROM posts');

            foreach($req->fetchAll() as $post) {
                $list[] = new Post($post['id'], $post['user_id'], $post['content'], $post['timestamp']);
            }

            return $list;
        }

        public static function find($id) {
            $db = Db::getInstance();

            $id = intval($id);
            $req = $db->prepare('SELECT * FROM posts WHERE id = :id');

            $req->execute(array('id' => $id));
            $post = $req->fetch();

            return new Post($post['id'], $post['user_id'], $post['content'], $post['timestamp']);
        }
    }
?>