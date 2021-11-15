<?
    $no=$row->no27;

	$text1 = $text1 ? "/text1/$text1" : "";
	$text2 = $text2 ? "/text2/$text2" : "";
	$text3 = $text3 ? "/text3/$text3" : "";
	$tmp = $text1 . $text2 . $text3 . "/page/$page";
?>
        <br>
        <div class="alert mycolor1" role="alert"><?=$row->name27; ?></div>

        <form name="form1" method="post" action="" >
			<table class="table table-bordered table-sm mymargin5">
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
					<td width="80%" align="left"><?=$no; ?></td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle"> 가수명 </td>
					<td width="80%" align="left">
						<div class="form-inline"><?=$row->singer_name; ?> </div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle"> 음반명 </td>
					<td width="80%" align="left">
						<div class="form-inline"><?=$row->record_name; ?></div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle"> 음반 발매일 </td>
					<td width="80%" align="left">
						<div class="form-inline"><?=$row->record_release; ?></div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle"> 영상 </td>
					<td width="80%" align="left">
						<div class="form-inline"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$row->video27; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					</td>
				</tr>
			</table>

			<div align="center">
				<a href="/~sale27/music/edit/no/<?=$no; ?><?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
				<a href="/~sale27/music/del/no/<?=$no; ?><?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
				<a href="/~sale27/music/lists<?=$tmp; ?>" class="btn btn-sm mycolor1">이전 페이지로</a>
			</div>
        </form>
