<?php
class Model
{
    
    const servername="localhost";
    const username="root";
    const password="";
    const database="shopms"; 
    
    
    
    function __construct(){
    }
    
    public function set_user($new_user){
        session_start();
        $_SESSION["user"]=$new_user;
        session_write_close();  
    }
    
    public function set_role($new_role){
        session_start();
        $_SESSION["role"]=$new_role;
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
    
    public function get_role(){
        session_start();
        $role="";
        if(isset($_SESSION["role"])){
            $role= $_SESSION["role"];
        }
        session_write_close();
        return $role;
    }
    public function get_role_from_db($login){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from users where login='$login';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row["access"];
        } else{
            return "3";
        }
    }
    
	public function get_data()
	{
	}
}
?>