<?php

include_once('config/config.php');

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

    public function hasPost($id_user) {

        $sql = 'SELECT * FROM posts WHERE id_user = ?';

        try {

            $hasPost = Connection::prepare($sql);
            $hasPost->bindParam(1, $id_user);
            $hasPost->execute();
            $result = !$hasPost->fetchColumn() ? false : true;
            
            return $result;

        } catch (Exception $error_has) {
            $data = array(
                'msg' => 'Erro ao selecionar dados '.$error_has->getMessage()
            );

            return $data;
        }
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

    public function updatePost($id) {
        $sql = 'UPDATE posts SET title = :title, content = :content WHERE  id = :id';
        try {

                $update_post = Connection::prepare($sql);
                $update_post->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
                $update_post->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
                $update_post->bindParam(':id', $id);
                $update_post->execute();

                $data = array(
                    'msg' => 'Post atualizado com sucesso',
                    'route' => 'post_edit.php?id=',
                    'error' => false
                );

                return $data;

        } catch (Exception $error_update) {
            $data = array(
                'msg' => 'Erro ao atualizar post '.$error_update->getMessage(),
                'error' => true
            );

            return $data;
        }
    }

    public function loadPost($id) {

        $sql = 'SELECT * FROM posts WHERE id = ?';

        try {

            $load_user = Connection::prepare($sql);
            $load_user->bindParam(1, $id);
            $load_user->execute();

            $result = $load_user->fetch(PDO::FETCH_OBJ);

            return $result;
            
        } catch (Exception $error_load) {
            $data = array(
                'msg' => 'Erro ao selecionar dados '.$error_load->getMessage()
            );

            return $data;
        }
    }

    public function listPostsByUser($id_user) {

        $sql = 'SELECT * FROM posts WHERE id_user = :id_user';
        
        try {
            $list_posts_user = Connection::prepare($sql);
            $list_posts_user->bindParam(':id_user', $id_user);
            $list_posts_user->execute();
            
            $result = $list_posts_user->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
            
        } catch (Exception $error_list) {
            return array('msg' => 'Erro ao selecionar dados '.$error_list->getMessage());
        }

    }

    public function listAllPosts() {

        $sql = 'SELECT * FROM posts';
        
        try {
            $list_posts = Connection::prepare($sql);
            $list_posts->execute();
            
            $result = $list_posts->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
            
        } catch (Exception $error_list) {
            return array('msg' => 'Erro ao selecionar dados '.$error_list->getMessage());
        }

    }

}