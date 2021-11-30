<?
    class Product extends CI_Controller {       // product클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("product_m");				// 모델 product_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
			$this->load->library("pagination");			// pagination 선언
			$this->load->library('upload');				// 사진 업로드 선언
			$this->load->library('image_lib');
        }

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;

		 	if ($text1=="") 
				$base_url = "/product/lists/page";				  //$page_segment = 4;
			else
				$base_url = "/product/lists/text1/$text1/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url = "/~sale27" . $base_url;

			$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->product_m->rowcount($text1);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용
	
			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수
			
			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
            $data["list"]=$this->product_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("product_list",$data);           // product_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
        }

		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
			$data["page"]=$page;
			$data["row"]=$this->product_m->getrow($no);

			$this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("product_view",$data);           // product_list에 자료전달
            $this->load->view("main_footer"); 
		}

		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;		// URI: /~sale27/product/del/no/1
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;
			
			$this->product_m->deleterow($no);

			redirect("/~sale27/product/lists". $text1 . $page);             // 목록화면으로 돌아가기
		}

		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("gubun_no","구분명","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");

			if ($this->form_validation->run()==FALSE)
			{ 
				$data["list"] = $this->product_m->getlist_gubun();
				$this->load->view("main_header");
				$this->load->view("product_add",$data);    // 입력화면 표시
				$this->load->view("main_footer");
			}
			else              // 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(
					"gubun_no27" => $this->input->post("gubun_no",TRUE),
					"name27" => $this->input->post("name",TRUE),
					"price27" => $this->input->post("price",TRUE),
					"jaego27" => $this->input->post("jaego",TRUE)
				);
				$picname = $this->call_upload();		// 업로드 시작
				if($picname) $data["pic27"] = $picname;	// 파일이름 저장

				$result = $this->product_m->insertrow($data); 

				redirect("/~sale27/product/lists" . $text1 . $page);    //   목록화면으로 이동.
			}
		}

		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");	// 폼검증 라이브러리 로드

			$this->form_validation->set_rules("gubun_no","구분명","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");

			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$data["list"] = $this->product_m->getlist_gubun();
				$this->load->view("main_header");
				$data["row"]=$this->product_m->getrow($no);
				$this->load->view("product_edit",$data);
				$this->load->view("main_footer");
			}
			else           // 저장버튼 클릭한 경우
			{  
				$data = array(
					"gubun_no27" => $this->input->post("gubun_no",TRUE),
					"name27" => $this->input->post("name",TRUE),
					"price27" => $this->input->post("price",TRUE),
					"jaego27" => $this->input->post("jaego",TRUE)
				);
				$picname = $this->call_upload();		// 업로드 시작
				if($picname) $data["pic27"] = $picname;	// 파일이름 저장

				$result = $this->product_m->updaterow($data,$no);
				redirect("/~sale27/product/lists" . $text1 . $page);
			}
		}

		public function call_upload()
		{
			$config['upload_path'] = './product_img';		// 저장할 경로
			$config['allowed_types'] = 'gif|jpg|png';	// 저장할 파일 종류
			$config['overwrite'] = TRUE;					// overwrite 허용
			$config['max_size'] = 10000000;					// 이미지 최대 파일 크기
			$config['max_width'] = 10000;					// 이미지 최대 가로 길이
			$config['max_height'] = 10000;					// 이미지 최대 세로 길이
			$this->upload->initialize($config);				// 설정 적용

			if (!$this->upload->do_upload('pic'))			// 업로드 시작
				$picname="";								// 실패할 경우 빈 문자열 리턴
			else 
			{
				$picname=$this->upload->data("file_name");	// 성공할 경우 파일 이름 리턴
			
				// 썸네일 환경 설정
				$config['image_library'] = 'gd2';	// gd2 라이브러리 이용 선언
				$config['source_image'] = './product_img/' . $picname;	// 원본 사진 이름
				$config['thumb_marker'] = "";
				$config['new_image'] = './product_img/thumb';	// thumb 저장 폴더
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;		// 가로세로 비율 유지
				$config['width'] = 200;					// thumb 사진 가로길이
				$config['height'] = 150;				// thumb 사진 세로길이
				$this->image_lib->initialize($config);	// 설정 적용

				$this->image_lib->resize();	// thumb 사진 생성
			}
			
			return $picname;
		}

		public function jaego()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
			$data["page"]=$page;
			$this->product_m->cal_jaego();

			redirect("/~sale27/product/lists" . $text1 . $page);
		}
	}
?>
