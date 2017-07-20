<?php
class UserModel extends Model{

    public function login(){
        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        /*$password = md5($post['password']);*/
        $password = ($post['password']);

        if($post['submit']){
            // Compare login
            $this->query('SELECT * FROM uzytkownicy WHERE `user` = :user');
            $this->bind(':user', $post['flatNr']);


            $row = $this->single();

            if(password_verify($password, $row['pass'])) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"    => $row['id'],
                    "user"  => $row['user']
                );

                header('Location: '.ROOT_URL.'flats');

            } else {
                Messages::setMsg('Incorrect Login or Password', 'error');
            }
        }
        return;
    }

    public function loginAdmin(){

        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        /*$password = md5($post['password']);*/
        $password = ($post['password']);

        if($post['submit']) {
            // Compare login
            $this->query('SELECT * FROM admins WHERE `user` = :user');
            $this->bind(':user', $post['adminNr']);

            $row = $this->single();

            if(password_verify($password, $row['pass'])) {
                $_SESSION['is_logged_in_admin'] = true;
                $_SESSION['user_data'] = array(
                    "id"    => $row['id'],
                    "user"  => $row['user'],
                    "email" => $row['email']
                );

                header('Location: '.ROOT_URL.'admins');

            } else {
                Messages::setMsg('Incorrect Login or Password', 'error');
            }
        }

        return;
    }
}
