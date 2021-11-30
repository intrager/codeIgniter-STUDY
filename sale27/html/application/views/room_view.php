<?
	$ID=$row->ID;                                 // 사용자번호

	$tmp = $text1 ? "/ID/$ID/text1/$text1/page/$page" : "/ID/$ID/page/$page";
?>
	<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">방 목록</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$ID; ?></td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 종류명
						</td>
						<td width="80%" align="left">
							<?=$row->roomType_name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 방이름
						</td>
						<td width="80%" align="left">
							<?=$row->name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 가격
						</td>
						<td width="80%" align="left">
							<?=number_format($row->price); ?>원
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 최대인원
						</td>
						<td width="80%" align="left">
							<?=$row->people; ?>명
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 설명
						</td>
						<td width="80%" align="left">
							<?=$row->tmi; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 사진
						</td>
						<td width="80%" align="left">
					<div class="form-inline">
					<b>파일이름</b> : <?=$row->pic?> <br>
					</div>
					<?
						if ($row->pic)     // 이미지가 있는 경우
							echo("<img src='/~team4/product_img/$row->pic' width='200’ class='img-fluid img-thumbnail'>");
						else                   // 이미지가 없는 경우
							echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
					?>

						</td>
					</tr>
				</table>
				<div align="center">
					<a href="/~team4/room/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/room/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
				</div>
			</form>
		</div>