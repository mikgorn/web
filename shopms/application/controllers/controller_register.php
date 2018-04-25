<?php

class Controller_Register extends Controller
{
    
    function __construct(){
        $this->view = new View();
        $this->model = new Model_Register();
    }
	function action_index()
	{	
		$filled = true;
        $r_pass = true;
        $login="";
        $password = "";
        $is_duplicate = false;
        $registered = false;
        
        if (isset($_POST["register"])){
            
            
            
            if(isset($_POST["login"])){
            $login = $_POST["login"];
            }else{$filled= false;}
            
            if(isset($_POST["password"])){
            $password = $_POST["password"];
            }else{$filled= false;}
            
            if(isset($_POST["re_password"])){
                if($_POST["re_password"]!=$_POST["password"]){
                    $r_pass = false;
                }
            }else{$filled= false;}
            
            
            $is_duplicate = $this->model->is_duplicate_login($login);
            
            if($filled && $r_pass && !$is_duplicate){
                $registered = $this->model->new_user($login,$password);
                $role = "3";
                $this->model->set_user($login);
                $this->model->set_role($role);
            }
            
        }
        
        
        $data = array();
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
        
        $data["filled"] = $filled;
        $data["r_pass"] = $r_pass;
        $data["is_duplicate"] = $is_duplicate;
        $data["registered"] = $registered;
        
        
        $this->view->generate('register_view.php', 'template_view.php',$data);
	}
    

}
?>