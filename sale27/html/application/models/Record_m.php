<?
	// result는 여러줄, row는 한 줄
    class Record_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$text2,$text3,$start,$limit)
        {    
			if ($text3=="")
				$sql="select record.*, singer.name27 as singer_name 
					from record left join singer on record.singer_no27=singer.no27 
					where record.release27 between '$text1' and '$text2'
					order by record.release27 desc limit $start,$limit";   // 전체 자료
			else
				$sql="select record.*, singer.name27 as singer_name 
					from record left join singer on record.singer_no27=singer.no27 
					where record.release27 between '$text1' and '$text2' and record.name27 like '%$text3%'
					order by record.release27 desc limit $start,$limit";   // 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1, $text2, $text3)
		{
			if ($text3=="")
				$sql="select * from record where record.release27 between '$text1' and '$text2'";
			else
				$sql="select * from record where record.release27 between '$text1' and '$text2' and record.name27 like '%$text3%'";

			return $this->db->query($sql)->num_rows();
		}

		function getrow($no)
		{
			$sql="select record.*, singer.no27 as singer_no, singer.name27 as singer_name
				from record left join singer on record.singer_no27=singer.no27
				where record.no27=$no";
			return $this->db->query($sql)->row();
		}

		function getmusic_list($no) 
		{
			$sql="select * from music where record_no27=$no";
			return $this->db->query($sql)->result();
		}

		function getlist_record()
		{
			$sql="select * from record order by name27";
			return $this->db->query($sql)->result();
		}

		function getlist_singer()
		{
			$sql="select * from singer order by name27";
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
			$sql="delete from record where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("record",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("record",$row,$where);
		}
    }
?>
