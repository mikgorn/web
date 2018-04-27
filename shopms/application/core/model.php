<?php
class Model
{
    
    const servername="localhost";
    const username="root";
    const password="";
    const database="shopms"; 
    
    
    
    function __construct(){
    }
    public function get_id($login){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where login='$login';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row["id"];
        } else{
            return "";
        }
    }
    public function set_user($new_user){
        session_start();
        $_SESSION["user"]=$new_user;
        session_write_close();  
    }
    
    
    public function get_user(){
        session_start();
        $user="";
        if(isset($_SESSION["user"])){
            $user= $_SESSION["user"];
        }
        session_write_close();
        return $user;
    }
    
    public function get_role($id){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row["access"];
        } else{
            return "3";
        }
    }
    
     public function get_user_name($id){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row["name"];
        } else{
            return "";
        }
    }
    
    
    public function get_user_data($id){
        $empty_user=array();
        $empty_user["name"]="";
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            $row["password"] = "";
            return $row;
        } 
        return $empty_user;
    }
    
    public function get_shop_data($id){
        $empty_shop=array();
        $empty_shop["name"]="";
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from shops where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row;
        } 
        return $empty_shop;
    }
    
    public function get_company_data($id){
        $empty_company=array();
        $shops = array();
        $empty_company["shops"] = $shops;
        $empty_company["name"]="";
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from companies where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $company = $result->fetch_assoc();
            
            $sql1 = "select * from shops where company='$id';";
            $result1 = $conn->query($sql1);
            if(mysqli_num_rows($result1)>0){
                while($row = $result1->fetch_assoc()){
                    array_push($shops,$row);
                }
            }
            $company["shops"] = $shops;
            return $company;
        } 
        return $empty_company;
    }
	public function get_data()
	{
	}
}
?>