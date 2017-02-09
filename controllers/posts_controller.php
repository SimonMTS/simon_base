<?php
    class PostsController {
        
        public function index() {
            $posts = Post::all();
            require_once('views/posts/index.php');
        }

        public function show() {
            $id = $_GET['var1'];
            
            if (!isset($id)) {
                return call('pages', 'error');
            }
        
            $post = Post::find($id);
            require_once('views/posts/show.php');
        }
        
        public function create() {
            if (false) {
                
            } else {
                require_once('views/posts/create.php');
            }
        }
        
    }
?>