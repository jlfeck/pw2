<?php

include('config/config.php');

class User extends Connection
{
    private $id;
    private $user;
    private $pass;
    private $name;
    private $email;

    // Getteres and Setters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getUser() {
        return $this->user;
    }
    public function setUser($user) {
        $this->user = $user;
    }

    public function getPass() {
        return $this->pass;
    }
    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function checkUser($user, $pass) {

        $sql = 'SELECT * FROM users WHERE user = ? AND pass = ?';

        try {

            $load_user = Connection::prepare($sql);
            $load_user->bindParam(1, $user);
            $load_user->bindParam(2, $pass);
            $load_user->execute();
            
            $result = $load_user->fetch(PDO::FETCH_OBJ);

            return $result;


        } catch (Exception $error_load) {
            echo "Usuário não foi cadastrado ".$error_load->getMessage();
        }
    }

    public function harUser($user) {

        $sql = 'SELECT * FROM users WHERE user = ?';

        try {

            $has_user = Connection::prepare($sql);
            $has_user->bindParam(1, $user);
            $result = $has_user->execute();
            
            return $result;

        } catch (Exception $error_load) {
            echo "Erro ao selecionar dados ".$error_load->getMessage();
        }
    }

    public function insertUser() {

        $sql = 'INSERT INTO users (user, pass, name, email) ';
        $sql.= 'VALUES (:user,:pass,:name,:email)';

        try {

            if ($this->harUser($this->getName())) {
                
                $msg = 'Usuário já cadastrado';
                return $msg;

            } else {                
                $insert_user = Connection::prepare($sql);
                $insert_user->bindValue(':user', $this->getUser(), PDO::PARAM_STR);
                $insert_user->bindValue(':pass', $this->getPass(), PDO::PARAM_STR);
                $insert_user->bindValue(':name', $this->getName(), PDO::PARAM_STR);
                $insert_user->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
                $insert_user->execute();
                
                return true;
            }


        } catch (PDOException $error_insert) {
            echo 'Erro ao cadastrar um novo usuário ' . $error_insert->getMessage();
        }
    }

    public function loadUser($id) {

        $sql = 'SELECT * FROM users WHERE id = ?';

        try {

            $load_user = Connection::prepare($sql);
            $load_user->bindParam(1, $id);
            $load_user->execute();

            $result = $load_user->fetch(PDO::FETCH_OBJ);

            return $result;
            
        } catch (Exception $error_load) {
            echo "Erro ao selecionar dados ".$error_load->getMessage();
        }


    }

    public function updateUser($id) {
        $sql = 'UPDATE  users SET  user = :user, pass = :pass, name = :name, email = :email WHERE  id = :id';
        try {

            $update_user = Connection::prepare($sql);
            $update_user->bindValue(':user', $this->getUser());
            $update_user->bindValue(':pass', $this->getPass());
            $update_user->bindValue(':name', $this->getName());
            $update_user->bindValue(':email', $this->getEmail());
            $update_user->bindParam(':id', $id);
            $update_user->execute();

            // echo "Usuário atualizado com sucesso";
            return true;

        } catch (Exception $error_update) {
            echo "Erro ao atualizar usuário ".$error_update->getMessage();
        }
    }
    
}

// class User extends Connection 
// {
//     private $id;
//     private $name;
//     private $mail;
//     private $address;
//     private $state;
//     private $phone;

//     // Getteres and Setters
//     public function getId() {
//         return $this->id;
//     }
//     public function setId($id) {
//         $this->id = $id;
//     }

//     public function getName() {
//         return $this->name;
//     }
//     public function setName($name) {
//         $this->name = $name;
//     }

//     public function getMail() {
//         return $this->mail;
//     }
//     public function setMail($mail) {
//         $this->mail = $mail;
//     }

//     public function getAddress() {
//         return $this->address;
//     }
//     public function setAddress($address) {
//         $this->address = $address;
//     }

//     public function getState() {
//         return $this->state;
//     }
//     public function setState($state) {
//         $this->state = $state;
//     }

//     public function getPhone() {
//         return $this->phone;
//     }
//     public function setPhone($phone) {
//         $this->phone = $phone;
//     }

//     public function loadUser($id) {

//         $sql = 'SELECT * FROM user WHERE id = ?';

//         try {

//             $load_user = Connection::prepare($sql);
//             $load_user->bindParam(1, $id);
//             $load_user->execute();
            
//         } catch (Exception $error_load) {
//             echo "Erro ao selecionar dados ".$error_load->getMessage();
//         }

//         $result = $load_user->fetch(PDO::FETCH_OBJ);

//         $this->setId($id);
//         $this->setName($result->name);
//         $this->setMail($result->mail);
//         $this->setAddress($result->address);
//         $this->setState($result->state);
//         $this->setPhone($result->phone);

//     }

//     
//     public function listUser() {

//         $sql = 'SELECT * FROM user ';
        
//         try {
//             $list_user = Connection::prepare($sql);
//             $list_user->execute();
            
//             $result = $list_user->fetchAll(PDO::FETCH_OBJ);
            
            
//         } catch (Exception $error_list) {
//             echo "Erro ao selecionar dados ".$error_list->getMessage();
//         }

//         return $result;
//     }

//     public function updateUser() {
//         $sql = 'UPDATE  user SET  name = :name, mail = :mail, address = :address, state = :state, phone = :phone WHERE  id = :id';
//         try {

//             $update_user = Connection::prepare($sql);
//             $update_user->bindValue(":name", $this->getName());
//             $update_user->bindValue(":mail", $this->getMail());
//             $update_user->bindValue(":address", $this->getAddress());
//             $update_user->bindValue(":state", $this->getState());
//             $update_user->bindValue(":phone", $this->getPhone());
//             $update_user->bindValue(":id", $this->getId());
//             $update_user->execute();
            
//         } catch (Exception $error_update) {
//             echo "Erro ao atualizar usuário ".$error_update->getMessage();
//         }
//     }

//     public function deleteUser($id) {
//         $sql = 'DELETE FROM user WHERE id = :id';
//         try {
//             $delete_user = Connection::prepare($sql);
//             $delete_user->bindValue(":id", $id);
//             $delete_user->execute();

//         } catch (Exception $error_delete) {
//             echo "Erro ao atualizar usuário ".$error_delete->getMessage();            
//         }
//     }

//     /*
//     * methods bd
//     */

//     public function query($sql) {
        
//         try {
//             $list_user = Connection::prepare($sql);
//             $list_user->execute();
            
//             $result = $list_user->fetchAll(PDO::FETCH_OBJ);
            
            
//         } catch (Exception $error_view) {
//             echo "Erro ao selecionar dados ".$error_view->getMessage();
//         }

//         return $result;
//     }
// }