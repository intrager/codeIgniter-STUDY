        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">방 목록</div>

			<form name="form1" method="post" action="" enctype="multipart/form-data">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							방종류
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="roomtypeId" class="form-control form-control-sm">
									<option value="">선택하세요.</option>
									<?
										$roomtypeId=set_value("roomtypeId");
										foreach($list as $row){
											if($row->ID==$roomtypeId)
												echo("<option value='$row->ID' selected>$row->name</option>");
											else
												echo("<option value='$row->ID'>$row->name</option>");
										}
									?>		
								</select>
							</div>
							<? If (form_error("roomtypeId")==true) echo form_error("roomtypeId"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 방이름(필수)
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
							<? if (form_error("name")==true) echo form_error("name"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							가격
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input  type="text" name="price" class="form-control form-control-sm" size="20" maxlength="20" value="<?=set_value("price"); ?>">&nbsp;
								<? If (form_error("price")==true) echo form_error("price"); ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							최대인원
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="people" class="form-control form-control-sm">
									<?
										for($i=1; $i<5; $i++){
											echo("<option value='$i'> $i 명</option>");											
										}
									?>
								</select>
							</div>
							<? If (form_error("people")==true) echo form_error("people"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 설명
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="tmi" value="<?=set_value("tmi"); ?>" class="form-control form-control-sm" size="100" maxlength="255" />
							</div>
							<? if (form_error("tmi")==true) echo form_error("tmi"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							<font color="red"></font> 사진
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<input  type="file" name="pic" class="form-control form-control-sm" value="<?=set_value("pic"); ?>">&nbsp;
							</div>
							<? If (form_error("pic")==true) echo form_error("pic"); ?>
						</td>
						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
				</div>
			</form>
		</div>
