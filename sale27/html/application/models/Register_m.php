<?
    class Register_m extends CI_Model						 // 모델 클래스 선언
    {
		function insertrow($row)
		{
			 return $this->db->insert("member",$row);
		}

    }
?>
