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
        $user = $this->model->get_user();
        $data["user_data"]=$this->model->get_user_data($user);
        
        $data["profile"] = $this->model->get_user_data($user);
        
		$this->view->generate('profile_view.php', 'template_view.php',$data);
	}
    
    function action_user($id){
        $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        $data["is_mine"] = false;
        if($id==$this->model->get_user_name($user)){
            $data["is_mine"]=true;
        }
        
        $profile = $this->model->get_user_data($id);
        $data["profile"] = $profile;
        $data["company"] = $this->model->get_company_data($profile["company"]);
        
		$this->view->generate('profile_view.php', 'template_view.php',$data);
    }
    function action_company($id){
        $data = array();
        $user = $this->model->get_user();
        
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["company"] = $this->model->get_company_data($id);
        
		$this->view->generate('profile_company_view.php', 'template_view.php',$data);
    }
    function action_shop($id){
        $data = array();
        $user = $this->model->get_user();
        
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["shop"] = $this->model->get_shop_data($id);
        
        
        $this->view->generate('profile_shop_view.php', 'template_view.php',$data);
    }
}
?>