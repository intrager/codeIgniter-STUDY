<?
    class Login extends CI_Controller {       // login클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("login_m");				// 모델 login_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
        }

	
        public function check()
        {
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);
            
			$row=$this->login_m->getrow($uid,$pwd);
			if($row)
			{
				$data=array(
					"uid"=>$row->uid27,
					"rank"=>$row->rank27
				);
				$this->session->set_userdata($data);
			}

			$this->load->view("main_header");
			$this->load->view("main_footer");
		}

		public function logout()
		{
			$data=array('uid','rank');
			$this->session->unset_userdata($data);

			$this->load->view("main_header");
			$this->load->view("main_footer");
		}
	}
?>
