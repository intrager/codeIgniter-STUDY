<?
    class Gallery extends CI_Controller {       // gallery클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("gallery_m");				// 모델 gallery_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
			$this->load->library("pagination");			// pagination 선언
			$this->load->library('upload');
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
				$base_url = "/gallery/lists/page";				  //$page_segment = 4;
			else
				$base_url = "/gallery/lists/text1/$text1/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url = "/~sale27" . $base_url;


			$config["per_page"]	 = 10;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->gallery_m->rowcount($text1);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용
	
			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
			
			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수
			
			$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
            $data["list"]=$this->gallery_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("gallery_list",$data);           // gallery_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
        }

		public function zoom()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$data["iname"] = array_key_exists("iname",$uri_array) ? urldecode($uri_array["iname"]) : "" ;
			$data["pname"] = array_key_exists("pname",$uri_array) ? urldecode($uri_array["pname"]) : "" ;

			$this->load->view("main_header_nomenu");                    // 상단출력(메뉴)
            $this->load->view("gallery_zoom",$data);           // gallery_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
		}
		public function view()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID	= array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

			$data["text1"]=$text1;
			$data["page"] = $page;
			$data["row"] = $this->gallery_m->getrow($ID);

            $this->load->view("admin_header");
            $this->load->view("gallery_view",$data);
            $this->load->view("admin_footer");
        }

		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID    =array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->gallery_m->deleterow($ID);
			redirect("/~team4/gallery/lists". $text1 . $page);

		}

		public function add()
		{			
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation"); // 라이브러리 등록
			$this->form_validation->set_rules("gallerytypeId","방종류","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");


			if ($this->form_validation->run()==FALSE ) // 목록화면의 추가버튼 클릭한 경우
			{
				$data["list"] = $this->gallery_m->getlist_galleryType();
				$this->load->view("admin_header");
				$this->load->view("gallery_add", $data);    // 입력화면 표시
				$this->load->view("admin_footer");
			}
			else              // 입력화면의 저장버튼 클릭한 경우
			{
				$data=array(
					"gallerytypeId" => $this->input->post("gallerytypeId",TRUE),
					"name" => $this->input->post("name",TRUE),
					"price" => $this->input->post("price",TRUE),
					"people" => $this->input->post("people",TRUE),
					"tmi" => $this->input->post("tmi",TRUE)
				);
				$picname = $this->call_upload();
				if($picname) $data["pic"] = $picname;
				$this->gallery_m->insertrow($data); 

				redirect("/~team4/gallery/lists". $text1 . $page);
			}
		}

		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID    =array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation"); // 라이브러리 등록
			$this->form_validation->set_rules("gallerytypeId","방종류","required");
			$this->form_validation->set_rules("name","이름","required|max_length[50]");
			$this->form_validation->set_rules("price","단가","required|numeric");

			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$data["list"] = $this->gallery_m->getlist_galleryType();
				$this->load->view("admin_header");
				$data["row"]=$this->gallery_m->getrow($ID);
				$this->load->view("gallery_edit",$data);
				$this->load->view("admin_footer");
			}
			else                                                                   // 저장버튼 클릭한 경우
			{  
				$data=array(
					"gallerytypeId" => $this->input->post("gallerytypeId",TRUE),
					"name" => $this->input->post("name",TRUE),
					"price" => $this->input->post("price",TRUE),
					"people" => $this->input->post("people",TRUE),
					"tmi" => $this->input->post("tmi",TRUE)
				);
				$picname = $this->call_upload();
				if($picname) $data["pic"] = $picname;
				$this->gallery_m->updaterow($data,$ID);

				redirect("/~team4/gallery/lists". $text1 . $page);
			}
		}

		public function call_upload()
		{
			$config['upload_path']	= './product_img';
			$config['allowed_types']	= 'gif|jpg|png'; 
			$config['overwrite']	= TRUE; 
			$config['max_size'] = 100000000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;
			$this->upload->initialize($config); 
			if (!$this->upload->do_upload("pic")) 
				$picname="";
			else
			{
				$picname=$this->upload->data("file_name");

				$config['image_library'] = 'gd2';
				$config['source_image'] = './product_img/' . $picname;
				$config['thumb_marker'] = '';
				$config['new_image'] = './product_img/thumb';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$config['height'] = 150;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}
			return $picname;
		}
    }
?>
