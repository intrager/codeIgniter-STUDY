        <br>
        <div class="alert mycolor1" role="alert">음원 수정</div>
<script>
	function find_product()
	{
		window.open("/~sale27/findrecord","","resizable=yes,scrollbars=yes,width=800,height=600");
	}
</script>
        <form name="form1" method="post" action="" class="form-inline">
			<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle">
				   <font color="red">*</font> 음반 이름
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input type="hidden" name="record_no" value="<?=$row->record_no27; ?>">
						<input type="text" name="record_name" value="<?=$row->record_name; ?>" 
							class="form-control form-control-sm" disabled>
						<input type="button" value="음반찾기" onClick="find_product();" 
							class="form-control btn btn-sm mycolor1">
					</div>
				<? if (form_error("record_no")==true) echo form_error("record_no"); ?>
				</td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle">
					<font color="red">*</font> 음원 이름
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
					<font color="red">*</font> 뮤직비디오 ID
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input type="text" name="video" value="<?=$row->video27; ?>" class="form-control form-control-sm" />
					</div>
					<? if (form_error("video")==true) echo form_error("video"); ?>
				</td>
			</tr>
			</table>
			
			<div align="center">
				<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
				<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
			</div>
        </form>