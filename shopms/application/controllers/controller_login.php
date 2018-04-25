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
				$role = "3";
                $role = $this->model->get_role_from_db($login);
				$this->model->set_user($login);
                $this->model->set_role($role);
				header(
"Location: /web/shopms/profile/user/$login");
                
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
        $data["user"] = $this->model->get_user();
        $data["role"] = $this->model->get_role();
        
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
}
?>