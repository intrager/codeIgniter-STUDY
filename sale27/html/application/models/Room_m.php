<?
    class Room_m extends CI_Model     // 모델 클래스 선언
    {

		public function getlist($text1, $start,$limit)
		{
			if (!$text1)
				$sql="select room.*, roomType.name as roomType_name 
                  from room left join roomType on room.roomtypeId=roomType.ID
                  order by room.name limit $start,$limit";

			else
				$sql="select room.*, roomType.name as roomType_name 
                  from room left join roomType on room.roomtypeId=roomType.ID
                  where room.name like '%$text1%' order by room.name limit $start,$limit";
			return $this->db->query($sql)->result();
		}
		function getlist_roomType()
		{
			$sql="select * from roomType order by name";
			return $this->db->query($sql)->result();
		}
		public function rowcount( $text1 )
		{
			if (!$text1)
				$sql="select * from room";
			else
				$sql="select * from room where name like '%$text1%' ";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($ID)  {
			$sql="select room.*, roomType.name as roomType_name 
              from room left join roomType on room.roomtypeId=roomType.ID 
              where room.ID=$ID";
			return  $this->db->query($sql)->row();
		}

		function deleterow($ID)  {
			$sql="delete from room where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)  {
			return  $this->db->insert("room",$row);
		}

		function updaterow( $row, $ID )
		{
			$where=array( "ID"=>$ID );
			return $this->db->update( "room", $row, $where );
		}

    }
?>
