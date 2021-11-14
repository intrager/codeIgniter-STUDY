<?
	// result는 여러줄, row는 한 줄
    class Singer_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select singer.* from singer order by singer.name27 limit $start,$limit";   // 전체 자료
			else
				$sql="select singer.* from singer where singer.name27 like '%$text1%' order by singer.name27 limit $start,$limit";
 
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from singer order by name27";
			else
				$sql="select * from singer where name27 like '%$text1%' order by name27";
	
			return $this->db->query($sql)->num_rows();
		}

		function getrow($no) 
		{
			$sql="select singer.*, record.name27 as record_name, record.singer_no27, record.no27 as record_no, music.name27 as music_name, music.record_no27
				from (singer left join record on record.singer_no27=singer.no27) left join music on music.record_no27=record.no27 
				where singer.no27=$no";
			return $this->db->query($sql)->row();
		}

		function getrecord_list($no) 
		{
			$sql="select record.*, music.name27 as music_name from record left join music on music.record_no27=record.no27 where singer_no27=$no";
			return $this->db->query($sql)->result();
		}

		function deleterow($no)
		{
			$sql="delete from singer where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("singer",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("singer",$row,$where);
		}

		function getlist_record()
		{
			$sql="select * from record order by name27";
			return $this->db->query($sql)->result();
		}
    }
?>
