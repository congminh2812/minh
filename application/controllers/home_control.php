<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Control extends CI_Controller {

	public function index(){
		$this->load->view('home');
	}
	public function page_insert(){
		$data['page'] = 'insertaccount.php';
		$this->load->view('home',$data);
	}
	public function page_update(){
		$data['page'] = 'update_account.php';
		$this->load->view('home',$data);
	}
	public function insertAccount(){
			$this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('cpassword','Confirm Password','required');
            $this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('displayname','Display Name','required');
			
            if($this->form_validation->run()){
                //true
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $cpassword = $this->input->post('cpassword');
                $email = $this->input->post('email');
				$displayname = $this->input->post('displayname');
				$status = $this->input->post('status');
				$tiny = 0; // status : false
				if($status == 'Lock') $tiny = 1; // status : true
				if(strcmp($password,$cpassword) == 0){
					$result = (object) array(
						'username' => $username,
						'password' => $password,
						'email' => $email,
						'displayname' => $displayname,
						'status' => $tiny
					);
					$this->load->model('home_model');
					if($this->home_model->insert($result)){
						$this->getListAccount();
					}else{
						$data['page'] = 'insertaccount.php';
						$data['success'] = 'Insert Failed';
						$this->load->view('home',$data);
					}

				}else{
					$data['page'] = 'insertaccount.php';
					$data['success'] = 'Confirm Password Wrong';
						$this->load->view('home',$data);
				}
            }else
                $this->page_insert();
	}

	public function getListAccount(){
		$data['page'] = 'listaccount.php';
		//$this->load->view('home',$data);
		
		$this->load->model('home_model');
		$data['account'] = $this->home_model->getList('account');
		$this->load->view('home',$data);
	}
	
}