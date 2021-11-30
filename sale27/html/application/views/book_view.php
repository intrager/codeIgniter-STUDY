<?
	$ID=$row->ID;                                 // 사용자번호

	$tmp = $text1 ? "/ID/$ID/text1/$text1/page/$page" : "/ID/$ID/page/$page";
?>
	<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">예약 목록</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$ID; ?></td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 방이름
						</td>
						<td width="80%" align="left">
							<?=$row->room_name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 회원명
						</td>
						<td width="80%" align="left">
							<?=$row->member_name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 체크인
						</td>
						<td width="80%" align="left">
							<?=$row->start;?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 체크아웃
						</td>
						<td width="80%" align="left">
							<?=$row->end;?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 예약 yes/no
						</td>
						<td width="80%" align="left">
							<?
								if ($row->reserve == 0){ echo("No");}
								else {echo("Yes");}
							?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 예약인원
						</td>
						<td width="80%" align="left">
							<?=$row->count; ?>명
						</td>
					</tr>

				</table>
				<div align="center">
					<a href="/~team4/book/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/book/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
				</div>
			</form>
		</div>