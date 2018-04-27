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
    
    function is_duplicate_shop_name($name,$company){
        $is_duplicate = false;
        $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from shops where name='$name' and company='$company';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $is_duplicate = true;
        }
        return $is_duplicate;
    }
    
    function new_shop($name,$address,$phone1,$phone2,$company){
        $conn = new mysqli(self::servername,self::username,self::password,self::database);
        $id = uniqid();
        $sql = "insert into shops(id,name,address,phone1,phone2,company) values('$id','$name','$address','$phone1','$phone2','$company');";
        $result = $conn->query($sql);
        if($conn->error){
            return false;
        }
        return true;
    }
    
    function is_duplicate_item($brand,$code,$company){
        $is_duplicate = false;
        $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from items where brand='$brand' and code='$code' and company='$company';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $is_duplicate = true;
        }
        return $is_duplicate;
    }
    
    public function new_item($brand, $code, $season, $price_low, $price_high,$company){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);
        $id = uniqid();
        $sql = "insert into items(id,brand,code,season,price_low,price_high,company) values('$id','$brand', '$code', '$season', $price_low, $price_high,'$company');";
        $result = $conn->query($sql);
        if($conn->error){
            return false;
        }
        return true;
    }
    
}
?>