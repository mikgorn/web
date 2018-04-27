<?php

class Controller_Company extends Controller
{
    
    function __construct(){
        $this->view = new View();
        $this->model = new Model_Company();
    }
	function action_index()
	{	
        
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
		$this->view->generate('company_view.php', 'template_view.php',$data);
	}
    
    function action_create(){
        
        $filled = true;
        $is_duplicate = false;
        $registered = false;
        
        if (isset($_POST["create"])){
            
            $login="";
            $phone1="";
            $phone2="";
            
            if(isset($_POST["name"])){
            $name = $_POST["name"];
            }else{$filled= false;}
            
            if(isset($_POST["phone1"])){
            $phone1 = $_POST["phone1"];
            }
            if(isset($_POST["phone2"])){
            $phone2 = $_POST["phone2"];
            }
            
            
            $user=$this->model->get_user();
            $is_duplicate = $this->model->is_duplicate_name($name);
            
            if($filled  && !$is_duplicate && $user!=""){
                $registered = $this->model->new_company($name,$phone1,$phone2,$user);
            }
            
        }
        
        
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["filled"] = $filled;
        $data["is_duplicate"] = $is_duplicate;
        $data["registered"] = $registered;
        
        $this->view->generate('company_create_view.php', 'template_view.php',$data);
    }
    function action_create_shop(){
        
        $filled = true;
        $is_duplicate = false;
        $registered = false;
        
        if (isset($_POST["create"])){
            
            $login="";
            $phone1="";
            $phone2="";
            
            if(isset($_POST["name"])){
            $name = $_POST["name"];
            }else{$filled= false;}
            
            if(isset($_POST["address"])){
            $address = $_POST["address"];
            }
            
            if(isset($_POST["phone1"])){
            $phone1 = $_POST["phone1"];
            }
            if(isset($_POST["phone2"])){
            $phone2 = $_POST["phone2"];
            }
            
            
            $user=$this->model->get_user();
            $user_data = $this->model->get_user_data($user);
            $company = $user_data["company"];
            $is_duplicate = $this->model->is_duplicate_shop_name($name,$company);
            
            if($filled  && !$is_duplicate && $user!="" && $company!=""){
                $registered = $this->model->new_shop($name,$address,$phone1,$phone2,$company);
            }
            
        }
        
        
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["filled"] = $filled;
        $data["is_duplicate"] = $is_duplicate;
        $data["registered"] = $registered;
        
        $this->view->generate('shop_create_view.php', 'template_view.php',$data);
    }
    
    function action_create_item()
	{	
        
         $filled = true;
        $is_duplicate = false;
        $registered = false;
        
        if (isset($_POST["create"])){
            
            $brand = "";
            $code = "";
            $season = "";
            $price_low = "";
            $price_high = "";
            
            if(isset($_POST["brand"])){
            $brand = $_POST["brand"];
            }else{$filled= false;}
            
            if(isset($_POST["code"])){
            $code = $_POST["code"];
            }else{$filled= false;}
            
            if(isset($_POST["season"])){
            $season = $_POST["season"];
            }
            if(isset($_POST["price_low"])){
            $price_low = $_POST["price_low"];
            }
            
            if(isset($_POST["price_high"])){
            $price_high = $_POST["price_high"];
            }else{$filled= false;}
            
            
            $user=$this->model->get_user();
            $user_data = $this->model->get_user_data($user);
            $company = $user_data["company"];
            $is_duplicate = $this->model->is_duplicate_item($brand,$code,$company);
            
            if($filled  && !$is_duplicate && $user!="" && $company!=""){
                $registered = $this->model->new_item($brand, $code, $season, $price_low, $price_high, $company);
            }
            
        }
        
        
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["filled"] = $filled;
        $data["is_duplicate"] = $is_duplicate;
        $data["registered"] = $registered;
        
		$this->view->generate('item_create_view.php', 'template_view.php',$data);
	}
    
    
}
?>