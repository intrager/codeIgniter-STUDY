        <br>
        <div class="alert mycolor1" role="alert">음반 수정 화면</div>
<script>
	$(function() {
		$('#release').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
	});

	
	function find_product()
	{
		window.open("/~sale27/findsinger","","resizable=yes,scrollbars=yes,width=500,height=600");
	}
</script>
        <form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
        <table class="table table-bordered table-sm mymargin5">
		<tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
               <font color="red">*</font> 가수 선택
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="hidden" name="singer_no" value="<?=$row->singer_no27; ?>">
					<input type="text" name="singer_name" value="<?=$row->singer_name; ?>" 
						class="form-control form-control-sm" disabled>
					<input type="button" value="가수찾기" onClick="find_product();" 
						class="form-control btn btn-sm mycolor1">
                </div>
				<? if (form_error("singer_no")==true) echo form_error("singer_no"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 음반 이름
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" value="<?=$row->name27; ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
            </td>
        </tr>
		<tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 발매 날짜</td>
            <td width="80%" align="left">
                <div class="form-inline">
					<div class="input-group input-group-sm date" id="release">
						<input type="text" name="release" value="<?=$row->release27; ?>"
							class="form-control form-control-sm" />
						<div class="input-group-append">
							<div class="input-group-text">
								<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
							</div>
						</div>
					</div>
				</div>
				<? if (form_error("release")==true) echo form_error("release"); ?>
			</td>
		</tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
            <td width="80%" align="left">
                <div class="form-inline">
					<b>파일이름</b> : <?=$row->pic27; ?> <br><br>
					<input type="file" name="pic" value="" class="form-control form-control-sm" >
				</div>
<?
	if ($row->pic27)     // 이미지가 있는 경우
		echo("<img src='/~sale27/record_img/$row->pic27' width='200’ class='img-fluid img-thumbnail'>");
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

