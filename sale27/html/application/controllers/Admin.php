<?
	// team 4 호텔
	class Admin extends CI_Controller {               // 클래스이름 첫 글자는 대문자
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
        }
        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                 // list 함수 호출
        }
        public function lists()
        {
            $this->load->view("admin_header");                    // 상단출력(메뉴)
            $this->load->view("admin_index");           // admin_index에 자료전달
            $this->load->view("admin_footer");                      // 하단 출력 
        }
	}
?>
