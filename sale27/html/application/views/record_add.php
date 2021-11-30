        <br>
        <div class="alert mycolor1" role="alert">음반 추가</div>
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
               <font color="red">*</font> 가수 이름
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="hidden" name="singer_no" value="<?=set_value("singer_no"); ?>">
					<input type="text" name="singer_name" value="" 
						class="form-control form-control-sm" disabled>
					<input type="button" value="가수찾기" onClick="find_product();" 
						class="form-control btn btn-sm mycolor1">
                </div>
				<? if (form_error("singer_no")==true) echo form_error("singer_no"); ?>
            </td>
        </tr>
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 음반이름
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 발매날짜</td>
            <td width="80%" align="left">
                <div class="form-inline">
					<div class="input-group input-group-sm date" id="release">
						<input type="text" name="release" value="<?=set_value("release"); ?>"
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
                    <input type="file" name="pic" value="" class="form-control form-control-sm" />
                </div>
            </td>
        </tr>
        </table>
        

		<div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
        </div>
        </form>