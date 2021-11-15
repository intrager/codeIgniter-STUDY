<?
    $no=$row->no27;

	$text1 = $text1 ? "/text1/$text1" : "";
	$text2 = $text2 ? "/text2/$text2" : "";
	$text3 = $text3 ? "/text3/$text3" : "";
	$tmp = $text1 . $text2 . $text3 . "/page/$page";
?>
        <br>
        <div class="alert mycolor1" role="alert"><?=$row->name27; ?></div>

        <form name="form1" method="post" action="" >
        <table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
				<td width="80%" align="left"><?=$row->no27; ?></td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 음반 이름 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->name27; ?> </div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 가수 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->singer_name; ?> </div>
				</td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle">발매 일자</td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->release27; ?></div>
				</td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
				<td width="80%" align="left">
	<?
		if ($row->pic27)     // 이미지가 있는 경우
			echo("<img src='/~sale27/record_img/$row->pic27' width='300' class='img-fluid img-thumbnail'>");
		else                   // 이미지가 없는 경우
			echo("<img src='' width='300' class='img-fluid img-thumbnail'>");
	?>
				</td>
			</tr>
        </table>

		<table class="table table-bordered table-sm mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
				<td width="80%">음원이름</td>
				<td width="10%">뮤직비디오</td>
            </tr>
<?
	foreach($list as $row1)
	{
?>
			<tr>
				<td><?=$row1->no27; ?></td>
				<td><?=$row1->name27; ?></td>
				<td><button type="button" data-src="https://www.youtube.com/embed/<?=$row1->video27; ?>" class="btn btn-primary video-btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-music"></i></button></td>
			</tr>	
<?
    }
?>
        </table>

        <div align="center">
            <a href="/~sale27/record/edit/no/<?=$no; ?><?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <a href="/~sale27/record/del/no/<?=$no; ?><?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
            <a href="/~sale27/record/lists<?=$tmp; ?>" class="btn btn-sm mycolor1" >이전화면으로</a>
        </div>
        </form>

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