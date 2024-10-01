<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */

    // public function updateUser($input) {
    //     $sql = 'UPDATE users SET 
    //              name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
    //              password="'. md5($input['password']) .'"
    //             WHERE id = ' . $input['id'];

    //     $user = $this->update($sql);

    //     return $user;
    // }

    public function updateUser($input) {
        if (empty($input['name']) || !preg_match('/^[A-Za-z0-9]{5,15}$/', $input['name'])) {
            return 'Tên phải chứa ký tự hợp lệ như sau: A-Z, a-z, 0-9 và có chiều dài từ 5 đến 15 ký tự!!!';
        }
    
        if (empty($input['password']) || 
            !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()]).{5,10}$/', $input['password'])) {
            return 'Mật khẩu bao gồm: chữ viết thường a-z, chữ viết HOA A-Z, số từ 0-9 và các ký tự đặc biệt sau: ~!@#$%^&*()';
        }
        $name = mysqli_real_escape_string(self::$_connection, $input['name']);
        $password = password_hash($input['password'], PASSWORD_BCRYPT);
    
        $sql = 'UPDATE users SET 
                 name = "' . $name . '", 
                 password = "' . $password . '" 
                WHERE id = ' . (int)$input['id']; 
    
        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."')";

        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);

            //Get data
            $users = $this->query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}