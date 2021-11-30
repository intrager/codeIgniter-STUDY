<?
    class Register extends CI_Controller {       // register클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("register_m");				// 모델 register_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
        }

        public function index()                            // 제일 먼저 실행되는 함수
		{
            $this->registerForm();                                        // list 함수 호출
        }

        public function registerForm()
        {
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");

			if ($this->form_validation->run()==FALSE)
			{ 
				$this->load->view("main_header");
				$this->load->view("registerForm");    // 입력화면 표시
				$this->load->view("main_footer");
			} 
			else 
			{								// 입력화면의 저장버튼 클릭한 경우
				$phone1 = $this->input->post("phone1",true);
				$phone2 = $this->input->post("phone2",true);
				$phone3 = $this->input->post("phone3",true);
				$phone = sprintf("%-3s%-4s%-4s",$phone1,$phone2,$phone3);
				
				$data=array(
					"uid" => $this->input->post("uid",TRUE),
					"pwd" => $this->input->post("pwd",TRUE),
					"name" => $this->input->post("name",TRUE),
					"phone" => $phone,
					"email" => $this->input->post("email",TRUE),
					"rank" => 0
				);

				$this->register_m->insertrow($data); 

				redirect("/~team4/login");    //   목록화면으로 이동.
			}
        }
	}
?>
