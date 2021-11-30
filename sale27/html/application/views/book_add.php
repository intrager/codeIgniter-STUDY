		<script>
			$(function(){
				$("#start") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});
				$("#end") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});

				$("#start") .on("dp.change", function (e){
					find_text();
				});
				$("#end") .on("dp.change", function (e){
					find_text();
				});
			});

			function select_room()
			{
				var frm = document.form1;
				var str;
				str = form1.sel_roomId.value;
				form1.roomId.value = str[0];
				form1.count.options.length=0;
				if(str=="")
				{
						form1.count.value="";
				}
				else
				{					
					str = str.split("^^");									
					for(var i=1;i<=str[1];i++){
						form1.count.add(new Option(i+"명", i));
					}									
				}	
				
			}

		</script>
		
		<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">예약 목록</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							방이름
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<input type="hidden" name="roomId" value="<?=set_value("product_no");?>">
								<select name="sel_roomId" class="form-control form-control-sm" onchange="select_room();">
									<option value="">선택하세요.</option>
									<?
										$roomId=set_value("roomId");
										foreach($list1 as $row1){
											$t1 = "$row1->ID^^$row1->people";
											if($row1->ID==$roomId)
												echo("<option value='$t1' selected>$row1->name</option>");
											else
												echo("<option value='$t1'>$row1->name</option>");
										}
									?>		

								</select>
							</div>
							<? If (form_error("roomtypeId")==true) echo form_error("roomtypeId"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							회원명
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="memberId" class="form-control form-control-sm">
									<option value="">선택하세요.</option>
									<?
										$memberId=set_value("memberId");
										foreach($list2 as $row2){
											if($row2->ID==$memberId)
												echo("<option value='$row2->ID' selected>$row2->name</option>");
											else
												echo("<option value='$row2->ID'>$row2->name</option>");
										}
									?>		
								</select>
							</div>
							<? If (form_error("memberId")==true) echo form_error("memberId"); ?>
						</td>
					</tr>

					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							체크인
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<div class="input-group input-group-sm date" id="start">
								<input  type="text" name="start" class="form-control form-control-sm" size="20" maxlength="20" value="<?=set_value("start"); ?>">&nbsp;
								<? If (form_error("start")==true) echo form_error("start"); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"> <i class="far fa-calendar-alt fa-lg"> </i></div>
									</div>
								</div>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							체크아웃
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<div class="input-group input-group-sm date" id="end">
								<input  type="text" name="end" class="form-control form-control-sm" size="20" maxlength="20" value="<?=set_value("end"); ?>">&nbsp;
								<? If (form_error("end")==true) echo form_error("end"); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"> <i class="far fa-calendar-alt fa-lg"> </i></div>
									</div>
								</div>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							예약인원
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="count" class="form-control form-control-sm">
									<?
										for($i=1; $i<($row->room_people + 1); $i++){
											echo("<option value='$i'> $i 명</option>");											
										}
									?>
								</select>
							</div>
							<? If (form_error("count")==true) echo form_error("count"); ?>
						</td>
					</tr>

				</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
				</div>
			</form>
		</div>
