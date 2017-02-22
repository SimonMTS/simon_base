<?php
    class DocsController {

        public function create() {
            if ( isset($_FILES['file']) ) {
                $file_id = new MongoId();
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));

                $expensions = [
                    "pdf",
                    "zip",
                    "xlsx",
                    "xml",
                    "txt",
                    "pptx",
                    "doc",
                    "docx",
                    "xls",
                    "ppt"
                ];

                if (!in_array($file_ext, $expensions)) {
                    return call('pages', 'error');
                }

                if ($file_size > 2097152) {
                    return call('pages', 'error');
                }

                move_uploaded_file($file_tmp, "files/" . $file_id .".". $file_ext);

                $doc = new doc(
                    $file_id,
                    $_SESSION['user']['_id'],
                    "files/".$file_id .".". $file_ext,
                    $file_name,
                    $_SESSION['user']['class_code']
                );

                if ($doc->save()) {
                    Redirect::to($GLOBALS['config']['base_url'] . 'users/view');
                } else {
                    return call('pages', 'error');
                }
            } else {
                require_once('views/docs/create.php');
            }
        }

        public function delete() {
            $id = $_GET['var1'];

            $doc = doc::find($id);

            if (unlink($doc->path)) {
                if ($doc && $doc->delete()) {
                    Redirect::to($GLOBALS['config']['base_url'] . 'users/view');
                } else {
                    return call('pages', 'error');
                }
            } else {
                return call('pages', 'error');
            }
        }
    }
?>
