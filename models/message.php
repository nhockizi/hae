<?php

class Message
{
    public $id;
    public $user_id;
    public $content;

    function __construct($id, $user_id, $content)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->content = $content;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM message');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item['id'], $item['user_id'], $item['content']);
        }

        return $list;
    }
}