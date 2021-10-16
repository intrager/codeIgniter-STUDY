<?
    class Best_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$text2,$start,$limit)
        {    
			$sql="select product.name27 as product_name, count(jangbu.numo27) as cnumo 
				from jangbu left join product on jangbu.product_no27=product.no27 
				where io27=1 and jangbu.writeday27 between '$text1' and '$text2'
				group by product.name27
				order by cnumo desc limit $start,$limit";   // 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1, $text2)
		{
			$sql="select product.name27 as product_name, count(jangbu.numo27) as cnumo 
				from jangbu left join product on jangbu.product_no27=product.no27 
				where io27=1 and jangbu.writeday27 between '$text1' and '$text2'
				group by product.name27";

			return $this->db->query($sql)->num_rows();
		}
    }
?>
