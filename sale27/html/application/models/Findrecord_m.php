<?
    class Findrecord_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select record.*, singer.name27 as singer_name, singer.pic27 as singer_pic from record left join singer on record.singer_no27=singer.no27 order by release27 asc limit $start,$limit";   // 전체 자료
			else
				$sql="select record.*, singer.name27 as singer_name, singer.pic27 as singer_pic from record left join singer on record.singer_no27=singer.no27 where record.name27 like '%$text1%' 
					order by release27 asc limit $start,$limit";
 
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from record order by release27 asc";
			else
				$sql="select * from record where name27 like '%$text1%' order by release27 asc";
	
			return $this->db->query($sql)->num_rows();
		}
    }
?>
