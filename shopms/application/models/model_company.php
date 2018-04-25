<?php
class Model_Company extends Model{
     function is_duplicate_name($name){
        $is_duplicate = false;
        $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from companies where name='$name';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $is_duplicate = true;
        }
        return $is_duplicate;
    }
    
    function new_company($name,$phone1,$phone2,$user){
        $conn = new mysqli(self::servername,self::username,self::password,self::database);
        $id = uniqid();
        $sql = "insert into companies(id,name,owner,phone1,phone2) values('$id','$name','$user','$phone1','$phone2');";
        $result = $conn->query($sql);
        if($conn->error){
            return false;
        }
        $sql = "update users set company='$id' where login='$user';";
        $result = $conn->query($sql);
        return true;
    }
}
?>