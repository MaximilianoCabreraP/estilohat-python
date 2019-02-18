<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interno extends CI_Controller {
	
	public function logs() {
		//if(empty($this->session->logged)){
		//	redirect("https://www.bidcom.com.ar/login?url=https://www.bidcom.com.ar/interno/logs");
		//}
		$date = new DateTime();
		$current_path = "log-".$date->format('Y-m-d').".php";
		$content = explode("\n",file_get_contents("application/logs/$current_path"));
		
		$length = $this->input->get("lines")!=null? $this->input->get("lines"):25;
		$lines = array_slice($content, $length>count($content)? -count($content):-$length);
		
		$this->load->view('json',['data'=>["file"=>$current_path, "lines"=>$lines]]);
	}

	public function getTabla($slug){
		$this->load->view('json', ['data' => $this->Interno_model->getTabla($slug)]);
	}
	
}