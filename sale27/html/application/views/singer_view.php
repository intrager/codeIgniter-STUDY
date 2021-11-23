<?
    $no=$row->no27;

	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
<script>

	function zoomimage(iname, pname)
	{
		w=window.open("/~sale27/singer/zoom/iname/" + iname + "/pname/" + pname,
			"imageview", "resizable=yes, scrollbars=yes, status=no, width=600, height=550");
		w.focus();
	}


</script>
        <br>
        <div class="alert mycolor1" role="alert"><?=$row->name27; ?></div>

        <form name="form1" method="post" action="" >
        <table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
				<td width="80%" align="left"><?=$row->no27; ?></td>
			</tr>
			 <tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 가수 이름 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->name27; ?></div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
				<td width="80%" align="left">
<?
		$iname=$row->pic27 ? $row->pic27 : "";                       
		$pname=$row->name27;

	if ($row->pic27)     // 이미지가 있는 경우
		echo("<a href='javascript:zoomimage(\"$iname\", \"$pname\");'><img src='/~sale27/singer_img/$row->pic27' width='300' class='img-fluid img-thumbnail'></a>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='300' class='img-fluid img-thumbnail'>");
?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red"></font> 추가 정보 </td>
				<td width="80%" align="left">
					<div class="form-inline"><?=$row->tmi27; ?></div>
				</td>
			</tr>
        </table>

        <table class="table table-bordered table-sm mymargin5">
            <tr class="mycolor2">
                <td width="10%">번호</td>
				<td width="35%">음반명</td>
				<td width="47%">음원명</td>
				<td width="8%">뮤직비디오</td>
            </tr>
<?
    foreach($list as $row1)                             // row를 통해 출력한다.
    {
?>
			<tr>
				<td><?=$row1->no27; ?></td>
				<td><?=$row1->name27; ?></td>
				<td><?=$row1->music_name; ?></td>
				<td><button type="button" data-src="https://www.youtube.com/embed/<?=$row1->music_video; ?>" class="btn btn-primary video-btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-music"></i></button></td>
			</tr>
<?
    }
?>

        </table>
        <div align="center">
            <a href="/~sale27/singer/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
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