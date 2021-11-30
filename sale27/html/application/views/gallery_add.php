        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">방 종류</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 이름(필수)
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
							<? if (form_error("name")==true) echo form_error("name"); ?>
						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
				</div>
			</form>
		</div>
