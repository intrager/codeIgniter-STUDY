<?
	class Main1 extends CI_Controller {               // 클래스이름 첫 글자는 대문자
		public function index()                      // 제일 먼저 실행되는 함수
		{
			$this->load->view("main_header1");		// view폴더의 main_header1.php 와
			$this->load->view("main_footer1");		//  main_footer1.php 호출
		}
	}
?>
