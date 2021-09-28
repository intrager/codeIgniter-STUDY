        <br>
        <div class="alert mycolor1" role="alert">제품</div>

        <form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
        <table class="table table-bordered table-sm mymargin5">
          <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
               <font color="red">*</font> 구분명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <select name="gubun_no" class="form-control-form-control-sm">
						<option value="">선택하세요.</option>
<?
	foreach ($list as $row1)
	{
		if ($row->gubun_no27==$row1->no27)
			echo("<option value='$row1->no27' selected>$row1->name27</option>");
		else
			echo("<option value='$row1->no27'> $row1->name27</option>");
	}
?>
					</select>
                </div>
				<? if (form_error("gubun_no")==true) echo form_error("gubun_no"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 제품명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" value="<?=$row->name27; ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 단가
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="price" value="<?=$row->price27; ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("price")==true) echo form_error("price"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 재고 </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="jaego" value="<?=$row->jaego27; ?>" class="form-control form-control-sm" />
                </div>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
            <td width="80%" align="left">
                <div class="form-inline">
					<b>파일이름</b> : <?=$row->pic27; ?> <br>
					<input type="file" name="pic" value="" class="form-control form-control-sm" >
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
            <input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>

