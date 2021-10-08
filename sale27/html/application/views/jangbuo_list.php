		<br>
        <div class="alert mycolor1" role="alert">매출장</div>
<script>
    function find_text()
	{
		form1.action="/~sale27/jangbuo/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});

		$("#text1").on("dp.change", function (e) {
			find_text();
		});
	});
</script>

        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-3">            
                    <div class="form-inline">
						<div class="input-group input-group-sm table-sm date" id="text1">
							<div class="input-group-prepend">
								<span class="input-group-text">날짜</span>
							</div>
							<input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<div class="input-group-addon">
										<i class="far fa-calendar-alt fa-lg"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
<?
	$tmp = "/text1/$text1/page/$page";
?>
                <div class="col-9" align="right">           
                     <a href="/~sale27/jangbuo/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>

        <table class="table  table-bordered  table-sm  mymargin5">
            <tr class="mycolor2">
                <td width="5%">번호</td>
                <td width="15%">날짜</td>
				<td width="30%">제품명</td>
                <td width="15%">단가</td>
				<td width="10%">수량</td>
				<td width="15%">금액</td>
				<td width="10%">비고</td>
			</tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
?>
			<tr>
				<td><?=$row->no27; ?></td>
				<td><?=$row->writeday27; ?></td>
				<td align="left"><a href="/~sale27/jangbuo/view/no/<?=$no; ?><?=$tmp; ?>"><?=$row->product_name; ?></a></td>
				<td align="right"><?=number_format($row->price27); ?></td>
				<td align="right"><?=number_format($row->numo27); ?></td>
				<td align="right"><?=number_format($row->prices27); ?></td>
				<td align="left"><?=$row->bigo27; ?></a></td>
			</tr>
<?
    }
?>

        </table>
<?=$pagination; ?>

   