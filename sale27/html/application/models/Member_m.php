<?
    class Member_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1)
        {    
			if (!$text1)
				$sql="select * from member order by name27";    // 전체 자료
			else
				$sql="select * from member where name27 like '%$text1%' order by name27";

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }
		
		function getrow($no) 
		{
			$sql="select * from member where no27=$no";
			return  $this->db->query($sql)->row();
		}

		function deleterow($no)
		{
			$sql="delete from member where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("member",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("member",$row,$where);
		}
    }
?>
