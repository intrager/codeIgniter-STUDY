<?
    class Book_m extends CI_Model     // 모델 클래스 선언
    {
// start between '$text1' and '$text2'
		public function getlist($text1, $text2, $start,$limit)
		{
			$sql="select book.*, room.name as room_name, room.people as room_people, member.name as member_name
				  from (book left join room on book.roomId=room.ID) left join member on book.memberId=member.ID
			  where start >= '$text1' and end <= '$text2'
			  order by ID limit $start,$limit";
			return $this->db->query($sql)->result();
		}

		function getlist_room()
		{
			$sql="select * from room order by name";
			return $this->db->query($sql)->result();
		}
		function getlist_member()
		{
			$sql="select * from member order by name";
			return $this->db->query($sql)->result();
		}
		public function rowcount( $text1 )
		{
			$sql="select * from book";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($ID) 
		{
			$sql="select book.*, room.name as room_name, room.people as room_people, member.name as member_name
				  from (book left join room on book.roomId=room.ID) left join member on book.memberId=member.ID where book.ID=$ID";
			return  $this->db->query($sql)->row();
		}
		function deleterow($ID)
		{
			$sql="delete from book where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("book",$row);
		}
		function updaterow($row, $ID)
		{
			$where=array("ID"=>$ID);
			return $this->db->update("book",$row,$where);
		}
    }
?>