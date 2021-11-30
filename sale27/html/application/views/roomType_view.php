<?
	$ID=$row->ID;                                 // 사용자번호

	$tmp = $text1 ? "/ID/$ID/text1/$text1/page/$page" : "/ID/$ID/page/$page";
?>
	<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">방 종류</div>

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
							<?=$row->name; ?>
						</td>
					</tr>
				</table>
				<div align="center">
					<a href="/~team4/roomType/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/roomType/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
				</div>
			</form>
		</div>