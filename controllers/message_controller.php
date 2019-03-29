<?php
require_once('controllers/base_controller.php');
require_once('models/message.php');
require_once("helper/pagination.php");

class MessageController extends BaseController
{
    function __construct()
    {
        $this->folder = 'message';
    }

    public function index()
    {
        $perPage = new PerPage();
        $page = 1;
        if (!empty($_GET["page"])) {
            $page = $_GET["page"];
        }

        $start = ($page - 1) * $perPage->perpage;
        if ($start < 0) {
            $start = 0;
        }
        $result = Message::pagination($start, $perPage->perpage);
        $result['page'] = $page;
        $result['perpageresult'] = $perPage->getAllPageLinks($result['total_of_results'], '','');
        $this->renderPartial('index', $result);
    }

    public function create()
    {
        $this->renderPartial('form');
    }

    public function view()
    {
        if (isset($_GET['id'])) {
            $result = Message::find($_GET['id']);
            $this->renderPartial('form',$result);
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $result = Message::delete($_GET['id']);
            echo json_encode($result);
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }

    public function save()
    {
        if (isset($_POST['fullname']) && isset($_POST['content'])) {
            $data = [
                'fullname' => addslashes($_POST['fullname']) ?? null,
                'content' => addslashes($_POST['content']) ?? null,
            ];
            $id = $_POST['id'] ?? null;
            $result = Message::save($data, $id);
            echo json_encode($result);
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
}