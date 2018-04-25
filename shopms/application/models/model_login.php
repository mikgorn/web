<?php
class Model_Login extends Model{
    
    function authentication($login, $password){
        $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where login='$login';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            if ($row["pass"]==$password){
                return true;
        } else{
            return false;
        }
        
        }
    }
    
    
}
?>