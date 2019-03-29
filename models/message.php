<?php

class Message
{
    public $id;
    public $fullname;
    public $content;
    public $created_at;

    function __construct($id, $fullname, $content, $created_at)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    static function pagination($start, $perpage)
    {
        $db = DB::getInstance();
        $sql_count = 'SELECT * FROM message';

        $sql_count = $db->prepare($sql_count);
        $sql_count->execute();
        $total = $sql_count->rowCount();

        $sql = 'SELECT * FROM message order by id desc LIMIT :start_from , :limit';
        $sql = $db->prepare($sql);

        $sql->bindParam(':start_from', $start, PDO::PARAM_INT);
        $sql->bindParam(':limit', $perpage, PDO::PARAM_INT);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        $result = [
            'total_of_results' => $total,
            'total_of_pages' => ceil($total/$perpage),
            'rows' => $data
        ];
        return $result;
    }

    static function save($data, $id = null)
    {
        $db = DB::getInstance();
        $db->beginTransaction();
        try {
            if ($id == null || $id == '') {
                $sql = 'INSERT INTO message (fullname, content) VALUES (?, ?)';
                $message = 'Post message successful';
            } else {
                $sql = 'UPDATE message SET fullname= ?, content = ? WHERE id= ?';
                $message = 'Update message successful';
            }
            $sql = $db->prepare($sql);
            $sql->bindParam(':fullname', $data['fullname']);
            $sql->bindParam(':content', $data['content']);
            if ($id == null || $id == '') {
                $sql->execute(array($data['fullname'], $data['content']));
            } else {
                $sql->execute(array($data['fullname'], $data['content'], $id));
            }
            $db->commit();
            $result = [
                'code' => 200,
                'message' => $message,
            ];
        } catch (PDOException $e) {
            $db->rollBack();
            $result = [
                'code' => 500,
                'message' => 'System error. Please try again!',
            ];
        }
        return $result;
    }
    static function find($id){
        $db = DB::getInstance();
        $sql = 'SELECT * FROM message where id = :id';
        $sql = $db->prepare($sql);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    static function delete($id){
        $db = DB::getInstance();
        $db->beginTransaction();
        try {
            $sql = 'DELETE from message where id = :id';
            $sql = $db->prepare($sql);
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
            $db->commit();
            $result = [
                'code' => 200,
                'message' => 'Delete message successful',
            ];
        } catch (PDOException $e) {
            $db->rollBack();
            $result = [
                'code' => 500,
                'message' => 'System error. Please try again!',
            ];
        }
        return $result;
    }
}