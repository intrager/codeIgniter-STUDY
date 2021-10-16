		<br>
        <div class="alert mycolor1" role="alert">제품선택</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/findproduct/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/findproduct/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

	function SendProduct(no, name, price)
	{
		opener.form1.product_no.value = no;                // 1
		opener.form1.product_name.value = name;       // 2
		opener.form1.price.value = price;                       // 3
		opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value);
		self.close();
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

        <table class="table  table-bordered  table-sm  mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="20%">구분명</td>
				<td width="30%">제품명</td>
                <td width="20%">단가</td>
				<td width="20%">재고</td>
            </tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
?>
			<tr>
				<td><?=$no; ?></td>
				<td><?=$row->gubun_name; ?></td>
				<td align="left">
					<a href="javascript:SendProduct(<?=$row->no27; ?>,'<?=$row->name27; ?>',<?=$row->price27; ?>);">
						<?=$row->name27; ?>
					</a>
				</td>
				<td align="right"><?=number_format($row->price27); ?></td>
				<td align="right"><?=number_format($row->jaego27); ?></td>
			</tr>
<?
    }
?>
        </table>
<?=$pagination; ?>