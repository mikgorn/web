<?php
class Model_Profile extends Model{
    
    public function get_user_data($login){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where login='$login';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            $row["password"] = "";
            return $row;
        }
        return null;
    }
}
?>