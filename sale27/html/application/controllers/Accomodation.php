<?
    class Accomodation extends CI_Controller {       // accomodation클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("accomodation_m");    // 모델 accomodation_m 연결
			$this->load->helper(array("url","date")); // 헬퍼등록
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Seoul");         // 지역설정
			$today=date("Y-m-d"); 
        }
        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month")) ;
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d") ;

			$base_url = "/gigan/lists/text1/$text1/text2/$text2/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

			$base_url = "/~team4" . $base_url;


			$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->accomodation_m->rowcount($text1, $text2);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용

			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수

			$data["text1"]=$text1;
			$data["text2"]=$text2;
			$data["list"] = $this->accomodation_m->getlist($text1, $text2,$start,$limit);   // 해당페이지 자료읽기
            $this->load->view("admin_header");                    // 상단출력(메뉴)
            $this->load->view("accomodation_list",$data);           // accomodation_list에 자료전달
            $this->load->view("admin_footer");                      // 하단 출력 
        }
		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID	= array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d") ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
			$data["text2"]=$text1;
			$data["page"]=$page;
			$data["row"]=$this->accomodation_m->getrow($ID);

			$this->load->view("admin_header");                    // 상단출력(메뉴)
            $this->load->view("accomodation_view",$data);           // accomodation_list에 자료전달
            $this->load->view("admin_footer"); 
		}
		public function add()
		{
			$data["list1"] = $this->accomodation_m->getlist_room();
			$data["list2"] = $this->accomodation_m->getlist_member();
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
		    $text2 = array_key_exists("text2",$uri_array) ? "/text2/" . urldecode($uri_array["text2"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("roomId","방이름","required");

			if ($this->form_validation->run()==FALSE)
			{ 
				$this->load->view("admin_header");
				$this->load->view("accomodation_add", $data);    // 입력화면 표시
				$this->load->view("admin_footer");
			}
			else              // 입력화면의 저장버튼 클릭한 경우
			{				
				$data=array(
					"roomId" => $this->input->post("roomId",TRUE),
					"memberId" => $this->input->post("memberId",TRUE),
					"start" => $this->input->post("start",TRUE),
					"end" => $this->input->post("end",TRUE),
					"reserve" => 0,
					"count" => $this->input->post("count",TRUE)
				);

				$this->accomodation_m->insertrow($data); 

				redirect("/~team4/accomodation/lists" . $text1 . $text2 . $page);    //   목록화면으로 이동.
			}
		}

		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID    =array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$text2=array_key_exists("text2",$uri_array) ? "/text2/" . urldecode($uri_array["text2"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->accomodation_m->deleterow($ID);
			redirect("/~team4/accomodation/lists" . $text1 . $text2 . $page);    //   목록화면으로 이동.

		}

		public function edit()
		{
			$data["list1"] = $this->accomodation_m->getlist_room();
			$data["list2"] = $this->accomodation_m->getlist_member();
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID	= array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$text2=array_key_exists("text2",$uri_array) ? "/text2/" . urldecode($uri_array["text2"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");	// 폼검증 라이브러리 로드
			$this->form_validation->set_rules("roomId","방이름","required");


			
			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$this->load->view("admin_header");
				$data["row"]=$this->accomodation_m->getrow($ID);
				$this->load->view("accomodation_edit",$data);
				$this->load->view("admin_footer");
			}
			else           // 저장버튼 클릭한 경우
			{  	
				$data=array(
					"roomId" => $this->input->post("roomId",TRUE),
					"memberId" => $this->input->post("memberId",TRUE),
					"start" => $this->input->post("start",TRUE),
					"end" => $this->input->post("end",TRUE),
					"reserve" => $this->input->post("reserve",TRUE),
					"count" => $this->input->post("count",TRUE)
				);

				$result = $this->accomodation_m->updaterow($data,$ID);
				redirect("/~team4/accomodation/lists" . $text1 . $page);
			}
		}
    }
?>
