<?php

class Controller_Main extends Controller
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
        
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
}
?>