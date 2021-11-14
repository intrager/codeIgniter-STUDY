<?
    class Music extends CI_Controller {       // music클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("music_m");				// 모델 music_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
			$this->load->library("pagination");			// pagination 선언
			
			date_default_timezone_set("Asia/Seoul");         // 지역설정
        }

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month"));
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");
			$text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "";

			if($text3=="")
		 		$base_url="/music/lists/text1/$text1/text2/$text2/page";
			else
		 		$base_url="/music/lists/text1/$text1/text2/$text2/text3/$text3/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url = "/~sale27" . $base_url;

			$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->music_m->rowcount($text1, $text2, $text3);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용
	
			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수
			
			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
			$data["text2"]=$text2;  
			$data["text3"]=$text3;  
			$data["list_music"]=$this->music_m->getlist_music();
			$data["list"]=$this->music_m->getlist($text1,$text2,$text3,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("main_header1");                    // 상단출력(메뉴)
            $this->load->view("music_list",$data);           // music_list에 자료전달
            $this->load->view("main_footer1");                      // 하단 출력
        }
		
		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		    $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month"));
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");
			$text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "";
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
			$data["text2"]=$text2;  
			$data["text3"]=$text3;  
			
			$data["page"]=$page;
			$data["row"]=$this->music_m->getrow($no);			
			
			$this->load->view("main_header1");                    // 상단출력(메뉴)
            $this->load->view("music_view",$data);           // record_list에 자료전달
            $this->load->view("main_footer1"); 
		}
		
		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;		// URI: /~sale27/record/del/no/1
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;
			
			$this->music_m->deleterow($no);

			redirect("/~sale27/music/lists". $text1 . $page);             // 목록화면으로 돌아가기
		}

		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("record_no","음반이름","required|max_length[50]");
			$this->form_validation->set_rules("video","뮤직비디오ID","required|max_length[50]");

			if ($this->form_validation->run()==FALSE)
			{ 
				$data["list"] = $this->music_m->getlist_record();
				$this->load->view("main_header1");
				$this->load->view("music_add",$data);    // 입력화면 표시
				$this->load->view("main_footer1");
			}
			else              // 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(
					"name27" => $this->input->post("name",TRUE),
					"record_no27" => $this->input->post("record_no",TRUE),
					"video27" => $this->input->post("video",TRUE)
				);
				$result = $this->music_m->insertrow($data); 

				redirect("/~sale27/music/lists" . $text1 . $page);    //   목록화면으로 이동.
			}
		}

		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		    $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$text2 = array_key_exists("text2",$uri_array) ? "/text2/" . urldecode($uri_array["text2"]) : "" ;
			$text3 = array_key_exists("text3",$uri_array) ? "/text3/" . urldecode($uri_array["text3"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");	// 폼검증 라이브러리 로드

			$this->form_validation->set_rules("record_no","음반이름","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("video","뮤직비디오ID","required|max_length[50]");

			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$this->load->view("main_header1");
				$data["row"]=$this->music_m->get_music($no);
				$this->load->view("music_edit",$data);
				$this->load->view("main_footer1");
			}
			else           // 저장버튼 클릭한 경우
			{  
				$data = array(
					"name27" => $this->input->post("name",TRUE),
					"record_no27" => $this->input->post("record_no",TRUE),
					"video27" => $this->input->post("video",TRUE)
				);

				$result = $this->music_m->updaterow($data,$no);
				redirect("/~sale27/music/lists" . $text1 . $text2. $text3. $page);
			}
		}
	}
?>
