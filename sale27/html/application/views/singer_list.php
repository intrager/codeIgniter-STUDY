		<br>
        <div class="alert mycolor1" role="alert">가수목록</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/singer/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/singer/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}
	
	$(function() {
		/**
			delete (click)
		*/
		$("#table_list").on("click",".singer_del",function() {
			if(confirm("삭제할까요?")) {
				no = $(this).attr("rowno");
				$.ajax({
					url: "/~sale27/singer/del",
					type: "POST",
					data: {
						"no":no
					},
					dataType: "text",
					complete: function(xhr, textStatus) {
						$('#rowno'+no).remove();
					}
				});
			}
		});
	});
</script>

        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">가수이름</span>
                        </div>
                        <input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
                        <div class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
                <div class="col-9" align="right">           
                     <a href="/~sale27/singer/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>

        <table class="table  table-bordered  table-sm  mymargin5" id="table_list">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="80%">가수명</td>
				<td width="10%">삭제</td>
            </tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
?>
			<tr id="rowno<?=$no; ?>">
				<td><?=$no; ?></td>
				<td><a href="/~sale27/singer/view/no/<?=$no; ?><?=$tmp; ?>"><?=$row->name27; ?></a></td>
				<td>
					<a href="#" rowno="<?=$no; ?>" class="singer_del btn btn-sm mycolor1">삭제</a>
				</td>
			</tr>
<?
    }
?>

        </table>
<?=$pagination; ?>

   