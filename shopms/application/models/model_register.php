<?php
class Model_Register extends Model{
    function is_duplicate_login($login){
        $is_duplicate = false;
        $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where login='$login';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $is_duplicate = true;
        }
        return $is_duplicate;
    }
    
    function new_user($login,$password){
        $conn = new mysqli(self::servername,self::username,self::password,self::database);
        $id = uniqid();
        $sql = "insert into users(id,login,pass,access) values('$id','$login','$password','3');";
        $result = $conn->query($sql);
        if($conn->error){
            return false;
        }
        return true;
    }
}
?>