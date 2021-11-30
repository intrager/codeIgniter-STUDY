<?
    class Crosstab_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			$sql="select product.name27 as product_name,
				sum( if(month(jangbu.writeday27)=1, jangbu.numo27,0) ) as s1,
				sum( if(month(jangbu.writeday27)=2, jangbu.numo27,0) ) as s2,
				sum( if(month(jangbu.writeday27)=3, jangbu.numo27,0) ) as s3,
				sum( if(month(jangbu.writeday27)=4, jangbu.numo27,0) ) as s4,
				sum( if(month(jangbu.writeday27)=5, jangbu.numo27,0) ) as s5,
				sum( if(month(jangbu.writeday27)=6, jangbu.numo27,0) ) as s6,
				sum( if(month(jangbu.writeday27)=7, jangbu.numo27,0) ) as s7,
				sum( if(month(jangbu.writeday27)=8, jangbu.numo27,0) ) as s8,
				sum( if(month(jangbu.writeday27)=9, jangbu.numo27,0) ) as s9,
				sum( if(month(jangbu.writeday27)=10, jangbu.numo27,0) ) as s10,
				sum( if(month(jangbu.writeday27)=11, jangbu.numo27,0) ) as s11,
				sum( if(month(jangbu.writeday27)=12, jangbu.numo27,0) ) as s12

				from jangbu left join product on jangbu.product_no27=product.no27 
				where year(jangbu.writeday27)=$text1
				group by jangbu.product_no27
				order by product.name27 limit $start,$limit";   // 전체 자료

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			$sql="select product_no27 from jangbu
				where year(writeday27)=$text1 group by product_no27";

			return $this->db->query($sql)->num_rows();
		}
    }
?>
