<?php
/* <> with love by Default */
defined('BASEPATH') OR exit('Hayoo mau buka apaaaa??');
class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}
	
	public function index(){
		$data = array(
		'title'=> 'Biner 3.0 - Code Jam',
		'isi' => 'pages/home',
		'nav' => 'nav.php',
		'nav_active' => 'Home'
		);
		
		$this->load->view('layout/wrapper',$data);
	}

	public function login(){
		$data = array(
		'title'=> 'CodeJam - Login',
		'nav' => 'nav.php',
		'isi' => 'pages/login',
		'nav_active' => 'Masuk'
		);
		
		$this->load->view('layout/wrapper',$data);
	}

	public function masuk(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$data = array(
			'username' => $username, 
			'password' => $password
		);

		$login = $this->home_model->get_users($data);

			if( $login == "not_registered"){
				$data['err_massages'] = "Username belum terdaftar....";
				$_SESSION['login_err'] = true;
				$_SESSION['user_err'] = $username;
				$_SESSION['pass_err'] = $password;
				$this->load->view('layout/wrapper', $data);
			}else{
				$db_pass = $this->home_model->get_users_pass($username)->password; 
				$level= $this->home_model->get_users_level($username)->level; // [1]admin, [2]pengajar, [3]orangtua, [4]murid, [5]calon_orangtua, [0] guest


				if(password_verify($password, $db_pass)){
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('password', $password);
					$this->session->set_userdata('level', $level);

					if($level == 5){
						$data['nav'] = 'calon_ortu/nav.php';
					}elseif($level == 2){
						$data['nav'] = 'nav.php';
					}
					
					$this->load->view('layout/wrapper', $data);
				}else{
					$data['err_massages'] = "Password yang dimasukkan salah....";
					$_SESSION['login_err'] = true;
					$_SESSION['user_err'] = $username;
					$_SESSION['pass_err'] = $password;
					$this->load->view('layout/wrapper', $data);
				}
			}
	}

	public function registrasi(){
		$data = array(
		'title'		=> 'CodeJam - Registrasi',
		'nav' 		=> 'nav.php',
		'isi' 		=> 'pages/registrasi',
		'nav_active'=> 'registrasi',
		'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha,
        'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
		);
		$this->load->view('layout/wrapper',$data);
	}
	
	public function daftar(){
		$username = $this->input->post('username');
		$email    = $this->input->post('email');
		$password = $this->input->post('password');
		$passwordv= $this->input->post('passwordv');
		$name	  = $this->input->post('name');
		$telp	  = $this->input->post('telp');
		$alamat	  = $this->input->post('alamat');
		
		$data = array(
		'title'		=> 'My Karamel - Registrasi',
		'nav' 		=> 'nav.php',
		'isi' 		=> 'pages/registrasi',
		'nav_active'=> 'registrasi',
		'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
        'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
		);

		$recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

		
		if(!isset($response['success']) || $response['success'] <> true){
			$data['err_massages'] = "Recaptcha error";
			$_SESSION['reg_err_username'] = $username;
			$_SESSION['reg_err_email'] = $email;
			$_SESSION['reg_err_name'] = $name;
			$_SESSION['reg_err_telp'] = $telp;
			$_SESSION['reg_err_alamat'] = $alamat;
		}else{
			if($password != $passwordv){
			$data['err_massages'] = "password tidak sama...";
			$_SESSION['reg_err_username'] = $username;
			$_SESSION['reg_err_email'] = $email;
			$_SESSION['reg_err_name'] = $name;
			$_SESSION['reg_err_telp'] = $telp;
			$_SESSION['reg_err_alamat'] = $alamat;
		}else{
			$username_check = $this->home_model->is_UserExist($username);
			if($username_check == 0){ //check username yang diinput sudah terdaftar atau belum
				//jika username input belum terdaftar
				$data_users = array(
					'username'	=> $username,
					'email' 	=> $email,
					'password'	=> password_hash($password, PASSWORD_DEFAULT),
					'level'		=> 5
				);	
				$this->db->insert('users', $data_users);
				$data_calonOrtu = array(
					'username'	=> $username,
					'noTelp'	=> $telp,
					'nama'		=> $name,
					'alamat'	=> $alamat
				);
				$this->db->insert('calonortu', $data_calonOrtu);
				$data['succ_massages'] = "Akun berhasil didaftarkan :)";
				$_SESSION['regist_err'] = false;
			}else{ //jika username input sudah terdaftar
				$data['err_massages'] = "Username sudah terdaftar sebelumnya...";
				$_SESSION['regist_err'] = true;
				$_SESSION['reg_err_email'] = $email;
				$_SESSION['reg_err_name'] = $name;
				$_SESSION['reg_err_telp'] = $telp;
				$_SESSION['reg_err_alamat'] = $alamat;
			}
		}
		}
		
		$this->load->view('layout/wrapper',$data);
	}

	function logout()
    {   
        if( $this->session->has_userdata('username')){
            unset(
                $_SESSION['username'],
                $_SESSION['password'],
                $_SESSION['level']
            );
            $this->session->sess_destroy();
       }
       redirect('Beranda');
    }
    
    public function view_pengumuman($slug = NULL)
    {
    	$data = array(
		'title'=> 'My Karamel - Beranda',
		'nav' => 'nav.php',
		'isi' => 'pages/beranda',
		'user_level' => '0', // [1]admin, [2]pengajar, [3]orangtua, [4]murid, [5]calon_orangtua, [0] guest
		'nav_active' => 'beranda',
		'news_item' => $this->home_model->get_news($slug)
		);
        if(empty($data['news_item'])){
        	show_404();
	    }
       
    	$this->load->view('layout/wrapper', $data);
    }
}