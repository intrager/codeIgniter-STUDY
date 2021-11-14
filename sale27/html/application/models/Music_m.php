<?
	// result는 여러줄, row는 한 줄
    class Music_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$text2,$text3,$start,$limit)
        {    
			if ($text3=="0")
				$sql="select music.*, record.name27 as record_name, singer.name27 as singer_name, record.release27 as record_release
					from (music left join record on music.record_no27=record.no27) left join singer on record.singer_no27 = singer.no27 
					where record.release27 between '$text1' and '$text2'
					order by music.no27 limit $start,$limit";   // 전체 자료
			else
				$sql="select music.*, record.name27 as record_name, singer.name27 as singer_name, record.release27 as record_release
					from (music left join record on music.record_no27=record.no27) left join singer on record.singer_no27 = singer.no27  
					where (record.release27 between '$text1' and '$text2') and music.name27 like '%$text3%'
					order by music.no27 limit $start,$limit";   // 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1, $text2, $text3)
		{
			if ($text3=="0")
				$sql="select music.*, record.name27 as record_name, singer.name27 as singer_name, record.release27 as record_release from (music left join record on music.record_no27=record.no27) left join singer on record.singer_no27=singer.no27 where record.release27 between '$text1' and '$text2'";
			else
				$sql="select music.*, record.name27 as record_name, singer.name27 as singer_name, record.release27 as record_release from (music left join record on music.record_no27=record.no27) left join singer on record.singer_no27=singer.no27 where (record.release27 between '$text1' and '$text2') and music.name27 like '%$text3%'";

			return $this->db->query($sql)->num_rows();
		}

		function getrow($no)
		{
			$sql="select music.*, record.name27 as record_name, singer.name27 as singer_name, record.release27 as record_release
				from (music left join record on music.record_no27=record.no27) left join singer on record.singer_no27=singer.no27
				where music.no27=$no";
			return $this->db->query($sql)->row();
		}

		function get_music($no)
		{
			$sql="select music.*, record.name27 as record_name from music left join record on music.record_no27=record.no27 where music.no27=$no";
			return $this->db->query($sql)->row();
		}

		function getlist_music()
		{
			$sql="select * from music order by name27";
			return $this->db->query($sql)->result();
		}

		public function getlist_all($text1,$text2,$text3)
		{
			if ($text3=="0")    // 전체인 경우
				$sql="select record.*, singer.name27 as singer_name
							 from record left join record on record.singer_no27=singer.no27
							 where record.release27 between '$text1' and '$text2' 
							 order by record.no27";
			else
				$sql="select record.*, singer.name27 as singer_name 
							 from record left join record on record.singer_no27=singer.no27
							 where record.release27 between '$text1' and '$text2' and
									   record.name27=$text3 
							 order by record.no27";
			return $this->db->query($sql)->result();
		}

		

		function deleterow($no)
		{
			$sql="delete from music where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("music",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("music",$row,$where);
		}

		function getlist_record()
		{
			$sql="select * from record order by name27";
			return $this->db->query($sql)->result();
		}
    }
?>
