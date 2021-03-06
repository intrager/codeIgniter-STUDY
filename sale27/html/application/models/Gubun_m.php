<?
    class Gubun_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select * from gubun order by name27 limit $start,$limit";    // 전체 자료
			else
				$sql="select * from gubun where name27 like '%$text1%' order by name27 limit $start,$limit";

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from gubun order by name27";
			else
				$sql="select * from gubun where name27 like '%$text1%' order by name27";
	
			return $this->db->query($sql)->num_rows();
		}

		function getrow($no) 
		{
			$sql="select * from gubun where no27=$no";
			return  $this->db->query($sql)->row();
		}

		function deleterow($no)
		{
			$sql="delete from gubun where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("gubun",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("gubun",$row,$where);
		}

		
    }
?>
