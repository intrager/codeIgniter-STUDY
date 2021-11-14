        <br>
        <div class="alert mycolor1" role="alert">가수 정보 등록</div>

        <form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
        <table class="table table-bordered table-sm mymargin5">
  
		 <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 가수명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" />
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
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
		<tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 추가정보 </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="tmi" value="" class="form-control form-control-sm" />
                </div>
            </td>
        </tr>
        </table>
        

		<div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
        </div>
        </form>