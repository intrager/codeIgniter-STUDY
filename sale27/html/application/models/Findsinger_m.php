<?
    class Findsinger_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select singer.* from singer order by name27 limit $start,$limit";   // 전체 자료
			else
				$sql="select singer.* from singer where name27 like '%$text1%'
					order by name27 limit $start,$limit";
 
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from singer";
			else
				$sql="select * from singer where name27 like '%$text1%'";
	
			return $this->db->query($sql)->num_rows();
		}
    }
?>
