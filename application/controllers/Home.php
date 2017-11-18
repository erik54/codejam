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
			'password' => $password,
			'title'=> 'Codejam - Beranda',
			'nav' => 'nav.php',
			'isi' => 'pages/home',
			'nav_active' => 'home'
		);

		$whereS = array(
		    'username' => $username
        );

        if($username == "" || $password == ""){
            echo json_encode(array('status' => 'fail', 'msg' => 'Harap masukkan semua input...'));
        }else{
            $login = $this->home_model->get_users($data);

            if( $login == "not_registered"){
                echo json_encode(array('status' => 'fail', 'msg' => 'Username belum terdaftar....'));
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
                    echo json_encode(array('status' => 'ok'));
                }else{
                    echo json_encode(array('status' => 'fail', 'msg' => 'Password yang dimasukkan salah....'));
                }
            }
        }
	}

	public function register(){
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
        $college  = $this->input->post('college');
        $tingkat  = $this->input->post('tingkat');

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);


        if(!isset($response['success']) || $response['success'] <> true){
            echo json_encode(array('status' => 'fail', 'msg' => 'Recaptcha dibutuhkan...'));
        }else{
            if($password != $passwordv){
                echo json_encode(array('status' => 'fail', 'msg' => 'Password dan repassword tidak sama...'));
            }elseif ($username == "" || $email == "" || $password == "" || $passwordv == "" || $name =="" || $college ==""
                || $tingkat == ""){
                echo json_encode(array('status' => 'fail', 'msg' => 'Harap isi semua input...'));
            }else{
                $username_check = $this->home_model->is_UserExist($username);
                if($username_check == 0){ /*check username yang diinput sudah terdaftar atau belum*/
                    /*jika username input belum terdaftar*/
                    $data_users = array(
                        'username'	=> $username,
                        'email' 	=> $email,
                        'password'	=> password_hash($password, PASSWORD_DEFAULT),
                        'level'		=> 2
                    );
                    $this->db->insert('users', $data_users);
                    $data_participants = array(
                        'username'	=> $username,
                        'nama'		=> $name,
                        'college'	=> $college,
                        'tingkat'	=> $tingkat
                    );
                    $this->db->insert('participants', $data_participants);
                    echo json_encode(array('status' => 'ok', 'msg' => 'Akun berhasil didaftarkan :)'));
                }else{ //jika username input sudah terdaftar
                    echo json_encode(array('status' => 'fail', 'msg' => 'Akun sudah didaftarkan sebelumnya...'));
                }
            }
        }
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