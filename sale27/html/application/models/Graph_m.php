<?
    class Graph_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1, $text2)
        {    
			$sql="select gubun.name27 as gubun_name, count(jangbu.numo27) as cnumo
					from (gubun right join product on gubun.no27=product.gubun_no27) 
						right join jangbu on product.no27=jangbu.product_no27
					where io27=1 and jangbu.writeday27 between '$text1' and '$text2'
					group by gubun.name27
					order by cnumo desc limit 14";		// 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1, $text2)
		{
			$sql="select gubun.name27 as gubun_name, count(jangbu.numo27) as cnumo
					from (gubun right join product on gubun.no27=product.gubun_no27) 
						right join jangbu on product.no27=jangbu.product_no27
					where io27=1 and jangbu.writeday27 between '$text1' and '$text2'
					group by gubun.name27 limit 14";

			return $this->db->query($sql)->num_rows();
		}
    }
?>
