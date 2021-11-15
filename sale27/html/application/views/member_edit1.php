        <br>
        <div class="alert mycolor1" role="alert">사용자</div>

        <form name="form1" method="post" action="">
        <table class="table table-bordered table-sm mymargin5">
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
            <td width="80%" align="left"><?=$row->no27; ?></td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 이름
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" size="20" maxlength="20" value="<?=$row->name27; ?>" class="form-control form-control-sm">
                </div>
				<? if (form_error("name")==true) echo form_error("name"); ?>
            </td>
        </tr>
         <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 아이디
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
<? if($this->session->userdata("rank") == 1) { ?>
                    <input  type="text" name="uid" class="form-control form-control-sm" size="20" maxlength="20" value="<?=$row->uid27; ?>">
<? } else { ?>
                    <input type="hidden" name="uid" value="<?=$row->uid27; ?>">
					<input  type="text" name="uid" class="form-control form-control-sm" size="20" maxlength="20" value="<?=$row->uid27; ?>" disabled>
<? } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 암호
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input  type="text" name="pwd" class="form-control form-control-sm" size="20" maxlength="20" value="<?=$row->pwd27; ?>">
				</div>
				<? if (form_error("pwd")==true) echo form_error("pwd"); ?>
            </td>
        </tr>
<?
    $tel1 = trim(substr($row->tel27,0,3));
    $tel2 = trim(substr($row->tel27,3,4));
    $tel3 = trim(substr($row->tel27,7,4));
?>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                 전화
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="tel1" 
                                 class="form-control form-control-sm" size="3" maxlength="3" value="<?=$tel1; ?>">&nbsp;-&nbsp;
                    <input type="text" name="tel2" 
                                 class="form-control form-control-sm" size="4" maxlength="4" value="<?=$tel2; ?>">&nbsp;-&nbsp;
                    <input type="text" name="tel3" 
                                 class="form-control form-control-sm" size="4" maxlength="4" value="<?=$tel3; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                등급
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
<?	if($this->session->userdata("rank") == 1) {
	
		if($row->rank27==0) { ?>
                    <input type="radio" name="rank" value="0" checked> 직원&nbsp;&nbsp;
                    <input type="radio" name="rank" value="1" > 관리자
<?		} else { ?>
                    <input type="radio" name="rank" value="0" > 직원&nbsp;&nbsp;
                    <input type="radio" name="rank" value="1" checked > 관리자
<?		} 
	} else { ?>
					<input type="hidden" name="rank" value="<?=$row->rank27; ?>">
                    <input type="radio" name="rank" value="0" checked disabled> 직원&nbsp;&nbsp;
                    <input type="radio" name="rank" value="1" disabled> 관리자
<?	} ?>
				</div>
            </td>
        </tr>
        </table>
        <div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
        </div>
        </form>

