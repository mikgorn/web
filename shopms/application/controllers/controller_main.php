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
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
}
?>