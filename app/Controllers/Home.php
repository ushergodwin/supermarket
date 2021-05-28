<?php

namespace App\Controllers;
use App\Models\AuthModel;
use BL_Controller;
class Home extends BaseController
{
    protected $CTRL;
	public function index()
	{
        $this->CTRL = new BL_Controller();
        $content = [
            "base_url" => $this->CTRL->server->base_url(),
            "title" => "SUPERMARKET | BLUEFACES"
        ];
        $this->render(view('includes/header', $content));
		$this->render(view('welcome', $content));
		$this->render(view('includes/footer', $content));
	}

	public function auth() {
        $this->CTRL = new BL_Controller();
        $auth = new AuthModel();
	    $user_id = $this->CTRL->input->post('email');
	    $password = $this->CTRL->input->post('password');
	    $response = $auth->auth_user($user_id, $password);
	    if ($response['status'] == "Authenticated") {
	        $user_data = (object) $response;
	        $session_data = array(
	            'user' => $user_id,
				"userName" => $user_data->fname,
                "logged_in" => true
            );
	        $this->session->set($session_data);
            echo  json_encode($response);
        }else {
	        echo json_encode($response);
        }
    }

}
