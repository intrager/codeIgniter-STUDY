		<br>
        <div class="alert mycolor1" role="alert">사용자</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/member1/lists";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/member1/lists/text1/" + form1.text1.value;
		form1.submit();
	}
</script>

        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-3" align="left">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">이름</span>
                        </div>
<?	if($this->session->userdata("rank") == 1) { ?>	
                        <input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
                        <div class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
                        </div>
<?	} else { ?>
						<input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="find_text();" disabled>검색</button>
                        </div>
<?	} ?>
                    </div>
                </div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";

	if($this->session->userdata("rank") == 1) {
?>
                <div class="col-9" align="right">           
                    <a href="/~sale27/member1/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
                </div>
<?	} ?>
            </div>
        </form>

        <table class="table  table-bordered  table-sm  mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="20%">아이디</td>
                <td width="20%">암호</td>
                <td width="20%">이름</td>
                <td width="20%">전화</td>
                <td width="10%">등급</td>
            </tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
        $tel1 = trim(substr($row->tel27,0,3));			// 전화 : 지역번호 추출
        $tel2 = trim(substr($row->tel27,3,4));			// 전화 : 국번호 추출
        $tel3 = trim(substr($row->tel27,7,4));			// 전화 : 번호 추출
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;       // 합치기
        $rank = $row->rank27==0 ? "직원" : "관리자" ;     // 0->직원, 1->관리자 
?>
			<tr>
				<td><?=$no; ?></td>
				<td><?=$row->uid27; ?></td>
				<td><?=$row->pwd27; ?></td>
				<td><a href="/~sale27/member1/view/no/<?=$no; ?><?=$tmp; ?>"><?=$row->name27; ?></a></td>
				<td><?=$tel; ?></td>
				<td><?=$rank; ?></td>
			</tr>
<?
    }
?>
        </table>
<?=$pagination; ?>

   