<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/room/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/room/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}
</script>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">방 목록
		<!-- Topbar Search -->
					<form name="form1" method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" name="text1" class="form-control bg-light border-1 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2" value="<?=$text1; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" onClick="find_text();">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
						</div>
					</form>
			<a href="/~team4/room/add<?=$tmp; ?>" style="float:right;" class="btn btn-primary">방 추가</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID(number)</th>
						<th>roomType</th>
						<th>name</th>
						<th>price</th>
						<th>people</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>방종류</th>
						<th>방이름</th>
						<th>가격</th>
						<th>최대인원</th>
					</tr>
				</tfoot>
				<tbody>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $ID=$row->ID;                                 // 사용자번호
?>
					<tr>
						<td><?=$ID; ?></td>
						<td><?=$row->roomType_name; ?></td>
						<td><a href="/~team4/room/view/ID/<?=$ID; ?><?=$tmp; ?>"><?=$row->name; ?></a></td>
						<td><?=number_format($row->price); ?>원</td>
						<td><?=$row->people; ?>명</td>
					</tr>
<?
    }
?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?=$pagination; ?>