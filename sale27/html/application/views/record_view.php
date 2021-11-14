<?
    $no=$row->no27;

	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
        <br>
        <div class="alert mycolor1" role="alert"><?=$row->name27; ?></div>

        <form name="form1" method="post" action="" >
        <table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
				<td width="80%" align="left"><?=$row->no27; ?></td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 음반 이름 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->name27; ?> </div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 가수 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->singer_name; ?> </div>
				</td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle">발매 일자</td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->release27; ?></div>
				</td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
				<td width="80%" align="left">
	<?
		if ($row->pic27)     // 이미지가 있는 경우
			echo("<img src='/~sale27/record_img/$row->pic27' width='300' class='img-fluid img-thumbnail'>");
		else                   // 이미지가 없는 경우
			echo("<img src='' width='300' class='img-fluid img-thumbnail'>");
	?>
				</td>
			</tr>
        </table>

		<table class="table table-bordered table-sm mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
				<td width="90%">음원이름</td>
            </tr>
<?
	foreach($list as $row1)
	{
?>
			<tr>
				<td><?=$row1->no27; ?></td>
				<td><?=$row1->name27; ?></td>
			</tr>	
<?
    }
?>

        </table>

        <div align="center">
            <a href="/~sale27/record/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <a href="/~sale27/record/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>
