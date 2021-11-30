<?
    $no=$row->no27;

	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
	<br>
        <div class="alert mycolor1" role="alert">구분</div>

        <form name="form1" method="post" action="">
        <table class="table table-bordered table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
            <td width="80%" align="left"><?=$row->no27; ?></td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 구분명
            </td>
            <td width="80%" align="left">
                <?=$row->name27; ?>
            </td>
        </tr>
        </table>
        <div align="center">
            <a href="/~sale27/gubun/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <a href="/~sale27/gubun/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>
