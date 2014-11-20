<?php

include('config/config.php');

/**
* 
*/
class Post extends Connection
{
    private $id;
    private $id_user;
    private $title;
    private $content;

    // Getteres and Setters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUser() {
        return $this->id_user;
    }
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }

    public function insertPost() {

        $sql = 'INSERT INTO posts (id_user, title, content) ';
        $sql.= 'VALUES (:id_user,:title,:content)';

        try {
            $insert_post = Connection::prepare($sql);
            $insert_post->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_STR);
            $insert_post->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
            $insert_post->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
            $insert_post->execute();
        
        } catch (PDOException $error_insert) {
            echo 'Erro ao cadastrar um novo post ' . $error_insert->getMessage();
        }
    }

}