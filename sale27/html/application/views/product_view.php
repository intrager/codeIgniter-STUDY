<?
    $no=$row->no27;

	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
        <br>
        <div class="alert mycolor1" role="alert">제품</div>

        <form name="form1" method="post" action="" >
        <table class="table table-bordered table-sm mymargin5">
		<tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
            <td width="80%" align="left"><?=$row->no27; ?></td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 구분명 </td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$row->gubun_name; ?> </div>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 제품명 </td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$row->name27; ?></div>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 단가 </td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$row->price27; ?></div>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 재고 </td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$row->jaego27; ?></div>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
            <td width="80%" align="left">
                <div class="form-inline">
					<b>파일이름</b> : <?=$row->pic27; ?> <br>
				</div>
<?
	if ($row->pic27)     // 이미지가 있는 경우
		echo("<img src='/~sale27/product_img/$row->pic27' width='200’ class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
?>
            </td>
        </tr>
        </table>

        <div align="center">
            <a href="/~sale27/product/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <a href="/~sale27/product/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>
