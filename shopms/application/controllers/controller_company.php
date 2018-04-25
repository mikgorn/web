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
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
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
    
}
?>