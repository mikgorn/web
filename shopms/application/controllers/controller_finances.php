<?php

class Controller_Finances extends Controller
{
    
    function __construct(){
        $this->view = new View();
        $this->model = new Model_Main();
    }
	function action_index()
	{	
        
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
        
        
		$this->view->generate('finances_view.php', 'template_view.php',$data);
	}
    function action_cash($id){
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
        $this->view->generate('finances_view.php', 'template_view.php',$data);
    }
}
?>