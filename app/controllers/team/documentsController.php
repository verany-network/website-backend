<?php

class documentsController
{
    private $route;
    private $viewPath;
    private $className;
    private $db;

    private $adddoc;

    private $perm_docadd;


    //Immer Ausgeführt
    private function enable()
    {
        $db = new database();
        $this->perm_docadd = $db->hasPermission($_SESSION['profile']['uuid'], "web.tcp.doc.add");

        if(isset($_POST['doc_name'], $_POST['doc_ersteller'], $_FILES['doc_file'])) {
            if($db->hasPermission($_SESSION['profile']['uuid'], "web.tcp.doc.add")) {
                $filename = $_FILES['doc_file']['name'];
                $destination = ROOT_PATH . '/uploads/' . $filename;
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $file = $_FILES['doc_file']['tmp_name'];
                $size = $_FILES['doc_file']['size'];
                if(!$db->documentexistcheck($filename, $size, trim($_POST['doc_name']))) {
                    if (!in_array($extension, ['pdf', 'docx', 'png', 'jpg', 'zip'])) {
                        $this->adddoc = true;
                    } else {
                        if (move_uploaded_file($file, $destination)) {
                            $db->adddocument($filename, $size, trim($_POST['doc_name']), trim($_POST['doc_ersteller']), $_SESSION['profile']['uuid']);
                            header("Location: " . $_SERVER['REQUEST_URI']);
                        } else { $this->adddoc = true; }
                    }
                } else { $this->adddoc = true; }
            }
        }
        if(isset($_POST['doc_download'])) {
            if($db->hasPermission($_SESSION['profile']['uuid'], "web.tcp.doc.download")) {

                $id = $_POST['doc_download'];
                $file = $db->getDicumentbyid($id);

                $filepath = ROOT_PATH.'/uploads/' . $file['filename'];
                if (file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize(ROOT_PATH.'/uploads/' . $file['filename']));
                    readfile(ROOT_PATH.'/uploads/' . $file['filename']);
                }
            }
        }

    }

    public function __construct($route)
    {
        $this->route = $route;
        $this->viewPath = ROOT_PATH . "/app/views/" . $this->route . ".phtml";
        $tmp = explode("/", $this->route);
        $this->className = end($tmp) . "Controller";
        $this->render();
        $this->db = new database();
    }

    private function render()
    {
        ob_start();
        $this->enable();
        require_once($this->viewPath);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }

}