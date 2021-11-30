<?
    class Login_m1 extends CI_Model						 // 모델 클래스 선언
    {
        function getrow($uid,$pwd)
		{
			$sql="select * from member1 where uid27='$uid' and pwd27='$pwd'";
			return $this->db->query($sql)->row();
		}
    }
?>
