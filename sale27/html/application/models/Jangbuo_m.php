<?
    class Jangbuo_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			$sql="select jangbu.*, product.name27 as product_name 
				from jangbu left join product on jangbu.product_no27=product.no27 
				where jangbu.io27=1 and jangbu.writeday27='$text1'
				order by jangbu.no27 limit $start,$limit";   // 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			$sql="select * from jangbu where io27=1 and jangbu.writeday27='$text1'";

			return $this->db->query($sql)->num_rows();
		}

		function getrow($no) 
		{
			$sql="select jangbu.*, product.name27 as product_name
				from jangbu left join product on jangbu.product_no27=product.no27 
				where jangbu.no27=$no";
			return $this->db->query($sql)->row();

		}

		function deleterow($no)
		{
			$sql="delete from jangbu where no27=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("jangbu",$row);
		}
		
		function updaterow($row, $no)
		{
			$where=array("no27"=>$no);
			return $this->db->update("jangbu",$row,$where);
		}

		function getlist_product()
		{
			$sql="select * from product order by name27";
			return $this->db->query($sql)->result();
		}
    }
?>
