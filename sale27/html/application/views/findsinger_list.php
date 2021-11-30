		<br>
        <div class="alert mycolor1" role="alert">가수 선택</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/findsinger/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/findsinger/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

	function SendSinger(no, name)
	{
		opener.form1.singer_no.value = no;						// 1
		opener.form1.singer_name.value = name;					// 2
		self.close();
	}

	function zoomimage(iname, pname)
	{
		w=window.open("/~sale27/singer/zoom/iname/" + iname + "/pname/" + pname,
			"imageview", "resizable=yes, scrollbars=yes, status=no, width=600, height=550");
		w.focus();
	}


</script>

        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-6" align="left">            
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">이름</span>
                        </div>
                        <input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
                        <div class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
                <div class="col-6" align="right">
                </div>
            </div>
        </form>

        <table class="table table-bordered table-sm mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="25%">가수이름</td>
				<td width="10%">선택하기</td>
			</tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
		$iname=$row->pic27 ? $row->pic27 : "";                       
		$pname=$row->name27;
        $no=$row->no27;                                 // 번호
?>
			<tr>
				<td><?=$no; ?></td> 
				<td><a href="javascript:zoomimage('<?=$iname; ?>', '<?=$pname; ?>');"><?=$row->name27; ?></a></td>
				<td><a href="javascript:SendSinger(<?=$row->no27; ?>,'<?=$row->name27; ?>');">선택</a></td>
			</tr>
<?
    }
?>
        </table>
<?=$pagination; ?>