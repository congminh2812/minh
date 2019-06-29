<?php


class Login_Control extends CI_Controller {
	public function index()
	{
		//$this->load->model('home_model');
		//$data['userArray'] = $this->home_model->return_users();
		$this->load->view('login');
	}

	// create function login 1: true,else false
	public function log_out(){
           $this->session->unset_userdata('name');
           $this->load->view('login');
    }
    public function login_validation(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()){
                //true
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                //print_r($username.$password);
                $this->load->model('login_model');
                $data = array();
                $data = $this->login_model->login($username,$password);
                if(count($data) > 0){
                    //print_r('tai khoan dung');
                    $this->session->set_userdata('name',$data[0]['displayname']);
                    $data['page'] = 'listaccount.php';
                    $this->load->model('home_model');
                    $data['account'] = $this->home_model->getList('account');
                    $this->load->view('home',$data);
                }else{
                //print_r('tai khoan sai');
                    $data['error'] = "Login Failed!";
                    $this->load->view('login',$data);
                }
            }else
                $this->index();
    }
  
}
