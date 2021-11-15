		<br>
        <div class="alert mycolor1" role="alert">음원 목록</div>
<script>
    function find_text()
	{
		if(!form1.text3.value)
			form1.action="/~sale27/music/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/page";
		else
			form1.action="/~sale27/music/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/page";
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
	});

</script>

        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-9">            
                    <div class="form-inline">
						<div class="input-group input-group-sm table-sm date" id="text1">
							<div class="input-group-prepend">
								<span class="input-group-text">발매 날짜</span>
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
								<span class="input-group-text">음원 이름</span>
							</div>
							<div class="input-group-append">
								<input type="text" name="text3" class="form-control" value="<?=$text3; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
								<div class="input-group-append">
									<button class="btn btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
								</div>
							</div>
						</div>
					</div>
                </div>
<?
	$text1 = $text1 ? "/text1/$text1" : "";
	$text2 = $text2 ? "/text2/$text2" : "";
	$text3 = $text3 ? "/text3/$text3" : "";
	$tmp = $text1 . $text2 . $text3 . "/page/$page";
?>
                <div class="col-3" align="right">           
                     <a href="/~sale27/music/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>

        <table class="table  table-bordered  table-sm  mymargin5">
            <tr class="mycolor2">
                <td width="5%">번호</td>
				<td width="25%">음원이름</td>
				<td width="25%">음반이름</td>
                <td width="15%">가수이름</td>
				<td width="18%">발매날짜</td>
				<td width="7%">뮤직비디오</td>
			</tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
?>
			<tr id="rowno<?=$no; ?>">
				<td><?=$no; ?></td>
				<td align="center" bgcolor="antiquewhite"><a href="/~sale27/music/view/no/<?=$no; ?><?=$tmp; ?>"><?=$row->name27; ?></a></td>
				<td align="center" bgcolor="lightyellow"><?=$row->record_name; ?></td>
				<td align="center" bgcolor="lightyellow"><?=$row->singer_name; ?></td>
				<td align="center"><?=$row->record_release; ?></td>
				<td><button type="button" data-src="https://www.youtube.com/embed/<?=$row->video27; ?>" class="btn btn-primary video-btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-music"></i></button></td>
			</tr>
<?
    }
?>

        </table>

<?=$pagination; ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
			</div>
		</div>
	</div>
</div> 


<script>
	$(document).ready(function() {

		// Gets the video src from the data-src on each button
		var $videoSrc;  
		$('.video-btn').click(function() {
			$videoSrc = $(this).data( "src" );
		});
		console.log($videoSrc);

		// when the modal is opened autoplay it  
		$('#myModal').on('shown.bs.modal', function (e) {
			
		// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
		$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
		})
		// stop playing the youtube video when I close the modal
		$('#myModal').on('hide.bs.modal', function (e) {
			// a poor man's stop video
			$("#video").attr('src',$videoSrc); 
		})
	// document ready  
	});
</script>