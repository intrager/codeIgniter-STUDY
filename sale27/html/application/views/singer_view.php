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
				<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 가수 이름 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->name27; ?></div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
				<td width="80%" align="left">
<?
	if ($row->pic27)     // 이미지가 있는 경우
		echo("<img src='/~sale27/singer_img/$row->pic27' width='300' class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='300' class='img-fluid img-thumbnail'>");
?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red"></font> 추가 정보 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->tmi27; ?></div>
				</td>
			</tr>
        </table>

        <table class="table table-bordered table-sm mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
				<td width="35%">음반명</td>
				<td width="55%">음원명</td>
            </tr>
<?
    foreach($list as $row1)                             // row를 통해 출력한다.
    {
?>
			<tr>
				<td><?=$row1->no27; ?></td>
				<td><?=$row1->name27; ?></td>
				<td><?=$row1->music_name; ?></td>
			</tr>
<?
    }
?>

        </table>
        <div align="center">
            <a href="/~sale27/singer/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>
