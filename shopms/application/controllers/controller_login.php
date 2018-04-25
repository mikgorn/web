<?php

class Controller_Login extends Controller
{
	function __construct(){
        $this->model = new Model_Login();
		$this->view = new View();
    }
	function action_index()
	{
		//$data["login_status"] = "";

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =$_POST['password'];
			

            
            
			if($this->model->authentication($login,$password))
			{
				$data["login_status"] = "access_granted";
                $user=$this->model->get_id($login);
                $role = $this->model->get_role($user);
				$this->model->set_user($user);
				header(
"Location: /web/shopms/profile/user/$user");
                
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "";
		}
        
		 $data = array();
        $user = $this->model->get_user();
        $data["user_data"] = $this->model->get_user_data($user);
        
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
}
?>