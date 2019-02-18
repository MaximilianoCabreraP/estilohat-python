<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'gapi/vendor/autoload.php';

class Usuario extends CI_Controller {
	private static $CLIENT_ID = "384322466553-8ib5pf7docnd9fjden7thf88ibpge82h.apps.googleusercontent.com";

	public function login() {
		$url = $this->input->get("url");
		$this->load->view('usuario/login', ['url'=>$url]);			
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect("/", "refresh");			
	}
	public function success() {
		if ($this->session->logged)
			$this->load->view("usuario/login_success");	
		else
			show_error("Forbidden", 403);
	}
	public function proccess() {
		$token = $this->input->get("token");
		$url = $this->input->get("url");
		if (!$token) {
			show_error("Bad Request", 400);
			return;
		}
		$client = new Google_Client(['client_id' => self::$CLIENT_ID]);
		$payload = $client->verifyIdToken($token);
		if ($payload) {
			if ($payload["hd"]==="vivamos.com.ar") {
				$user = ["logged"=>true];
				$user["id"] = $payload['sub'];
				$user["domain"] = $payload['hd'];
				$user["name"] = $payload['name'];
				$user["email"] = $payload['email'];
				$user["picture"] = $payload['picture'];
				/*
					$permiso = $this->Usuario_model->obtener_permiso($user["email"]);
					if (count($permiso)>0) {
						$user["type"] = $permiso["tipo"];
					}
					else {
						$user["type"] = "admin";
					}
				*/
				$user["type"] = "admin";
				$this->session->set_userdata($user);
				if (empty($url))
					redirect("login/success");	
				else
					redirect($url);	
			}
		}
		show_error("Unauthorized", 401);	
	}	
}
