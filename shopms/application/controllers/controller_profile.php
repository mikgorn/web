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
    
    function action_items($id){
        $data = array();
        $user = $this->model->get_user();
        
        $data["user_data"] = $this->model->get_user_data($user);
        
        $data["items"] = $this->model->get_items_data($id);
        
        
        $this->view->generate('item_list_view.php', 'template_view.php',$data);
    }
    
    function action_item($id){
        $data = array();
        $user= $this->model->get_user();
        
        if(isset($_POST["send"])){
            $source = $_POST["source"];
            $destination = $_POST["destination"];
            $item = $_POST["item"];
            if($destination == "sell"){
                $customer = $_POST["customer"];
                $cash = intval($_POST["cash"]);
                $card = intval($_POST["card"]);
                $debt = intval($_POST["debt"]);
                $memo = $_POST["memo"];
                for($i = 19;$i<40;$i++){
                if($_POST[$i]>0){
                    $amount = $_POST[$i];
                    $this->model->send_item($item,$source,$destination,$i,$amount,$user,"sell",$customer,$cash,$card,$debt,$memo);
                }
            }
            } else{
            for($i = 19;$i<40;$i++){
                if($_POST[$i]>0){
                    $amount = $_POST[$i];
                    $this->model->send_item($item,$source,$destination,$i,$amount,$user);
                }
            }
            }
        }
        
        if (isset($_POST["shop"])){
            $shop_id = $_POST["shop"];
            $shop_data = $this->model->get_shop_data($shop_id);
            $data["shop_id"] = $shop_id;
            $data["shop_name"] = $shop_data["name"];
            
            $data["sizes"] = $this->model->get_item_sizes($id,$shop_id);
        } else{
            $data["sizes"] = $this->model->get_all_sizes();
        }
        
       
        $data["user_data"] = $this->model->get_user_data($user);
        
        $user_data = $data["user_data"];
        $company_id = $user_data["company"];
        
        $data["company"] = $this->model->get_company_data($company_id);
        
        $data["item"] = $this->model->get_item_data($id);
        $this->view->generate('item_view.php', 'template_view.php',$data);
    }
}
?>