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
        $empty_user["id"]="";
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
        $items = array();
        $empty_shop["items"] = $items;
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from shops where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $shop = $result->fetch_assoc();
            
            //creating list of company items names
            $company_items = array();
            $company_id = $shop["company"];
            $sql1 = "select * from items where company='$company_id';";
            $result1 = $conn->query($sql1);
            if(mysqli_num_rows($result1)>0){
                while($row = $result1->fetch_assoc()){
                    $item_id = $row["id"];
                    $company_items[$item_id]=$row;
                }
            }
            
            
            
            $sql1 = "select * from storage_items where shop='$id' and amount>0;";
            $result1 = $conn->query($sql1);
            if(mysqli_num_rows($result1)>0){
                while($row = $result1->fetch_assoc()){
                    $item_id = $row["item"];
                    $item = $company_items[$item_id];
                    $row["brand"] =$item["brand"];
                    $row["code"] = $item["code"];
                    $row["season"] = $item["season"];
                    $row["price_high"] = $item["price_high"];
                    array_push($items,$row);
                }
            }
            $shop["items"] = $items;
            return $shop;
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
    public function get_items_data($id){
        $empty_items = array();
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from items where company='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $items = array();
                while($row = $result->fetch_assoc()){
                    array_push($items,$row);
                }
            
            return $items;
        } 
        return $empty_items;
    }
    
    public function get_item_data($id){
        $empty_item=array();
        $empty_item["id"]="";
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from items where id='$id';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            return $row;
        } 
        return $empty_item;
    }
    
    public function send_item($item,$source,$destination,$size,$amount,$user,$type="send",$customer="",$cash=0,$card=0,$debt=0,$memo=""){
        $conn = new mysqli(self::servername,self::username,self::password,self::database);
        
        //increase values
        if($destination!='outside' && $destination!='sell'){
        $sql = "select * from storage_items where item='$item' and size=$size and shop='$destination';";
            $result = $conn->query($sql);
            echo $conn->error;
            if(mysqli_num_rows($result)>0){
                $sql1 = "update storage_items set amount = amount+$amount where item='$item' and size=$size and shop='$destination';";
            } else{
                $sql1 = "insert into storage_items(item,size,amount,shop) values('$item',$size,$amount,'$destination');";
            }
            $result = $conn->query($sql1);
        }
        
        //decreasing values
        if($source!='outside'){
            $sql = "update storage_items set amount = amount-$amount where item='$item' and size=$size and shop='$source';";
            $result = $conn->query($sql);
        }
        $id = uniqid();
        $date = date("Y.m.d H:i");
        $sql = "insert into logs(id,item,type,source,destination,user,time,cash,card,debt,memo,customer,size,amount) values('$id','$item','$type','$source','$destination','$user','$date',$cash,$card,$debt,'$memo','$customer',$size,$amount);";
        $result = $conn->query($sql);
    }
    
    public function get_item_sizes($item, $shop){
         $conn = new mysqli(self::servername,self::username,self::password,self::database);

        $sql = "select * from storage_items where item='$item' and shop='$shop';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            $items = array();
                while($row = $result->fetch_assoc()){
                    $size = $row["size"];
                    $amount = $row["amount"];
                    $items[$size] = $amount;
                }
            
            return $items;
        } else return null;
    }
    public function get_all_sizes(){
        $sizes = array();
        for($i=19;$i<=40;$i++){
            $sizes[$i] = 999;
        }
        return $sizes;
    }
	public function get_data()
	{
	}
}
?>