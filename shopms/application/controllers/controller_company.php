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
        
        
        $this->view->generate('company_create_view.php', 'template_view.php',$data);
    }
}
?>