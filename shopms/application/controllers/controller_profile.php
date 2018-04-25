<?php

class Controller_Profile extends Controller
{
    
    function __construct(){
        $this->view = new View();
        $this->model = new Model_Profile();
    }
	function action_index()
	{	
        
        $data = array();
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
        
        $data["profile"] = $_GET["user"];
        
		$this->view->generate('profile_view.php', 'template_view.php',$data);
	}
    
    function action_user($login){
        $data = array();
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
        
        $data["profile"] = $this->model->get_user_data($login);
        
		$this->view->generate('profile_view.php', 'template_view.php',$data);
    }
}
?>