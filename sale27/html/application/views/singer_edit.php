        <br>
        <div class="alert mycolor1" role="alert">가수 정보 수정</div>

        <form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
        <table class="table table-bordered table-sm mymargin5">

		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 가수명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" value="<?=$row->name27; ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
            <td width="80%" align="left">
                <div class="form-inline">
					<b>파일이름</b> : <?=$row->pic27; ?> <br>
                    <input type="file" name="pic" value="" class="form-control form-control-sm" />
                </div>
<?
	if ($row->pic27)     // 이미지가 있는 경우
		echo("<img src='/~sale27/singer_img/$row->pic27' width='200' class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
?>
            </td>
        </tr>
		<tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 추가정보 </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <textarea type="text" name="tmi" value="" class="form-control form-control-sm" ><?=$row->tmi27; ?></textarea>
                </div>
            </td>
        </tr>
        </table>
        
        <div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>

