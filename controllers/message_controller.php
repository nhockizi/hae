<?php
require_once('controllers/base_controller.php');
require_once('models/message.php');

class MessageController extends BaseController
{
    function __construct()
    {
        $this->folder = 'message';
    }

    public function index()
    {
        $message = Message::all();
        $data = array('message' => $message);
        $this->render('index', $data);
    }

    public function create()
    {
        $this->renderPartial('create');
    }
}