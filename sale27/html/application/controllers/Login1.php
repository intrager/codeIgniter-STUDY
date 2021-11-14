<?
    class Login1 extends CI_Controller {       // login클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("login_m1");				// 모델 login_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
        }

	
        public function check()
        {
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);
            
			$row=$this->login_m1->getrow($uid,$pwd);
			if($row)
			{
				$data=array(
					"uid"=>$row->uid27,
					"rank"=>$row->rank27
				);
				$this->session->set_userdata($data);
			}

			$this->load->view("main_header1");
			$this->load->view("main_footer1");
		}
		
		public function myPage()
        {
			$uid=$this->input->post("uid",TRUE);

			$my=$this->login_m1->getrow($uid);

			$this->load->view("main_header1");
			$this->load->view("mypage_view1",$my);
			$this->load->view("main_footer1");
		}
		
		public function logout()
		{
			$data=array('uid','rank');
			$this->session->unset_userdata($data);

			$this->load->view("main_header1");
			$this->load->view("main_footer1");
		}
	}
?>
