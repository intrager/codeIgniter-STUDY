		<br>
        <div class="alert mycolor1" role="alert">제품 사진</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/picture/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/picture/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

	function zoomimage(iname, pname)
	{
		w=window.open("/~sale27/picture/zoom/iname/" + iname + "/pname/" + pname,
			"imageview", "resizable=yes, scrollbars=yes, status=no, width=800, height=600");
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

			<div class="row">			
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $iname=$row->pic27 ? $row->pic27 : "";                       
		$pname=$row->name27;
?>
				<div class="col-3">
					<div class="mythumb_box">
						<a href="javascript:zoomimage('<?=$iname; ?>', '<?=$pname; ?>');">
							<img class="mythumb_image" src="/~sale27/product_img/thumb/<?=$iname; ?>" />
						</a>
						<div class="mythumb_text"><?=$pname; ?></div>
					</div>
				</div>
<?
    }
?>
			</div>
<?=$pagination; ?>