		<br>
        <div class="alert mycolor1" role="alert">음반 목록</div>
<script>
    function find_text()
	{
		form1.action="/~sale27/record/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/page";
		form1.submit();
	}

	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$('#text2').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});

		$("#text1").on("dp.change", function (e) {
			find_text();
		});
		$("#text2").on("dp.change", function (e) {
			find_text();
		});

		/**
			delete (click)
		*/
		$("#table_list").on("click",".record_del",function() {
			if(confirm("삭제할까요?")) {
				no = $(this).attr("rowno");
				$.ajax({
					url: "/~sale27/record/del",
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
                <div class="col-9">            
                    <div class="form-inline">
						<div class="input-group input-group-sm table-sm date" id="text1">
							<div class="input-group-prepend">
								<span class="input-group-text">날짜</span>
							</div>
							<input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }" size="9">
							<div class="input-group-append">
								<div class="input-group-text">
									<div class="input-group-addon">
										<i class="far fa-calendar-alt fa-lg"></i>
									</div>
								</div>
							</div>
						</div>
						&nbsp;-&nbsp;
						<div class="input-group input-group-sm table-sm date" id="text2">
							<input type="text" name="text2" class="form-control" value="<?=$text2; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }" size="9">
							<div class="input-group-append">
								<div class="input-group-text">
									<div class="input-group-addon">
										<i class="far fa-calendar-alt fa-lg"></i>
									</div>
								</div>
							</div>
						</div>
						&nbsp;&nbsp;
						<div class="input-group input-group-sm">
							<div class="input-group-prepend">
								<span class="input-group-text">음반이름</span>
							</div>
							<div class="input-group-append">
								<select name="text3" class="form-control form-control-sm" onchange="javascript:find_text();">
									<option value="0">전체</option>
<?
		foreach ($list_record as $row)                             // 연관배열 list_product를 row를 통해 출력한다.
		{
			if($row->no27==$text3)
				echo("<option value='$row->no27' selected>$row->name27</option>");
			else
				echo("<option value='$row->no27'>$row->name27</option>");
		}
?>
								</select>
							</div>
						</div>
					</div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
                </div>

                <div class="col-3" align="right">           
                     <a href="/~sale27/record/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-sm mymargin5" id="table_list">
            <tr class="mycolor2">
                <td width="10%">번호</td>
				<td width="30%">음반이름</td>
                <td width="25%">가수이름</td>
				<td width="25%">발매날짜</td>
				<td width="10%">삭제</td>
			</tr>
<?
    foreach ($list as $row1)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row1->no27;                                 // 사용자번호

?>
			<tr id="rowno<?=$no; ?>">
				<td><?=$no; ?></td>
				<td><a href="/~sale27/record/view/no/<?=$no; ?><?=$tmp; ?>"><?=$row1->name27; ?></td>
				<td><?=$row1->singer_name; ?></td>
				<td><?=$row1->release27 ; ?></td>
				<td><a href="#" rowno="<?=$no; ?>" class="record_del btn btn-sm mycolor1">삭제</a></td>
			</tr>
<?
    }
?>

        </table>
<?=$pagination; ?>

   