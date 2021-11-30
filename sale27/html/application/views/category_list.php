<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/category/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/category/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

			$(function(){
				/**
                    add (click)
                 */
                $("#ajax_add").click(function(){                // 저장버튼 클릭 시 호출
					var name=$("#add_name").val();              // add_name 입력란에 입력한 값
					$.ajax({                                    // ajax 함수 호출
						url:"/~team4/category/ajax_insert",     // Category.php의 ajax_insert 함수 호출 // 실행할 문서
						type:"POST",                            // 값 전송방식
						data:{                                  // 전송할 값들
							"name":name
						},
						dataType:"text",                        // return 결과값의 데이터형식
						complete:function(xhr, textStatus){     // 처리 완료 후
                        var ID = xhr.responseText;          	// ajax_insert에서 return 된 ID값	// 처리 후, return 값

							$("#dataTable").append(             // 테이블(dataTable)에 추가
								"<tr id='rowno"+ID+"'>"+
								"	<td>" + ID + "</td>"+
								"	<td><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-id='"+
								ID+"' data-name='"+name+"'>"+name+"</a></td>"+
								"	<td><a href='#' rowno='"+ID+"' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>"+
								"</tr>");
						}
					});
					$("#collapseExample").collapse('hide');
				});

				/**
                    add (enter)
                 */
				$("#add_name").keyup(function(key){
					if(key.keyCode == 13){
						var name=$("#add_name").val();
						$.ajax({
							url:"/~team4/category/ajax_insert",
							type:"POST",
							data:{
								"name":name
							},
							dataType:"text",
							complete:function(xhr, textStatus){
								var ID = xhr.responseText;
								$("#dataTable").append(
									"<tr id='rowno"+ID+"'>"+
									"	<td style='vertical-align:middle;'>"+ID+"</td>"+
									"	<td style='vertical-align:middle;'><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-id='"+
									ID+"' data-name='"+name+"'>"+name+"</a></td>"+
									"	<td><a href='#' rowno='"+ID+"' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>"+
									"</tr>");
							}
						});
						$("#collapseExample").collapse('hide');
					}
				});

				/**
                    edit (click)
                */
				$("#ajax_edit").click(function(){
					var ID = $("#edit_ID").val();
					var name = $("#edit_name").val();
					$.ajax({
					url:"/~team4/category/ajax_update",
					type:"POST",
					data:{
						"ID":ID,
						"name":name
					},
					dataType:"html",
					complete:function(xhr, textStatus){
						$('#rowno'+ID).replaceWith(
							"<tr id='rowno"+ID+"'>"+
							"	<td style='vertical-align:middle;'>"+ID+"</td>"+
							"	<td style='vertical-align:middle;'><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-id='"+
							ID+"' data-name='"+name+"'>"+name+"</a></td>"+
							"	<td><a href='#' rowno='"+ID+"' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>"+
							"</tr>");
					}
					});
					$("#collapseExampleEdit").collapse('hide');
				});

				

	            /**
                    edit (enter)
                */
				$("#edit_name").keyup(function(event){
					if(event.keyCode == 13){
						var ID = $("#edit_ID").val();
						var name = $("#edit_name").val();
						$.ajax({
							url:"/~team4/category/ajax_update",
							type:"POST",
							data:{
								"ID":ID,
								"name":name
							},
							dataType:"html",
							complete:function(xhr, textStatus){
								$('#rowno'+ID).replaceWith(
									"<tr id='rowno"+ ID +"'>"+
									"	<td style='vertical-align:middle;'>"+ ID +"</td>"+
									"	<td style='vertical-align:middle;'><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-id='"+
									ID +"' data-name='"+name+"'>"+name+"</a></td>"+
									"	<td><a href='#' rowno='"+ ID +"' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>"+
									"</tr>");
							}
						});
						$("#collapseExampleEdit").collapse('hide');
					}
				});
        
                /**
                    delete (click)
                */
				$("#dataTable").on("click",".ajax_del",function(){
					if(confirm("삭제할까요?")){
							ID = $(this).attr("rowno");
							$.ajax({
							url:"/~team4/category/ajax_delete",
							type:"POST",
							data:{
								"ID":ID,
							},
							dataType:"text",
							complete:function(xhr, textStatus){
								$('#rowno' + ID).remove();
							}
						});
					}
				});
			});

			$(document).on('click', '.ajax_add', function(){
				$("#collapseExampleEdit").collapse('hide');
			});

			$(document).on('click', '.ajax_edit', function(){
				$("#collapseExample").collapse('hide');
				$('#edit_ID').val($(this).data('id'));
				$('#edit_name').val($(this).data('name'));
			});
</script>

<!-- DataTales Gallery -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">갤러리 분류
		<!-- Topbar Search -->
					<form name="form1" method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" name="text1" class="form-control bg-light border-1 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2" value="<?=$text1; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" onClick="javascript:find_text();">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
			<form name="form2" method="post" action="" style="float:right;">
			<a href="#collapseExample" class="ajax_add btn btn-primary" id="btn-add" data-toggle="collapse" aria-expanded="false"
					aria-controls="collapseExample" data-id="" data-name="">종류 추가</a>
			</form>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="20%">ID(number)</th>
						<th width="70%">name</th>
						<th width="10%">Delete</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>종류명</th>
						<th>삭제</th>
					</tr>
				</tfoot>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $ID=$row->ID;                                 // 사용자번호
?>
				<tbody>
					<tr id="rowno<?=$ID; ?>">
						<td><?=$ID; ?></td>
						<td><a href="#collapseExampleEdit" data-toggle="collapse" class="ajax_edit" aria-expanded="false" aria-controls="collapseExampleEdit" data-id="<?=$ID; ?>" data-name="<?=$row->name; ?>"><?=$row->name; ?></a></a></td>
						<td><a href="#" rowno="<?=$ID; ?>" class="ajax_del btn btn-sm mycolor1">삭제</a></td>
					</tr>
				</tbody>
<?
    }
?>
			</table>
		</div>
	</div>
</div>

		<div class="collapse mymargin5" id="collapseExample">
			<div class="card card-body" style="padding:0px 5px 0px 5px;">
				<table class="table table-sm table-bordered mymargin5 alert-primary">
					<form name="form2"><!--  엔터 처리를 위해 form태그 제거  -->
						<tr>
							<td width="10%">
								<input type="text" name="none" value="" disabled class="form-control form-control-sm" id="none">
							</td>
							<td width="80%">
								<input type="text" name="name" value="" class="form-control form-control-sm" id="add_name">
							</td>
							<td width="10%" style="vertical-align:middle">
								<a href="#" id="ajax_add" class="btn btn-sm btn-primary">저장</a>
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>

		<div class="collapse mymargin5" id="collapseExampleEdit">
			<div class="card card-body" style="padding:0px 5px 0px 5px;">
				<table class="table table-sm table-bordered mymargin5 alert-primary">
					<form name="form3">
						<tr>
							<td width="10%">
								<input type="text" name="ID" value="" disabled class="form-control form-control-sm" id="edit_ID">
							</td>
							<td width="80%">
								<input type="text" name="name" value="" class="form-control form-control-sm" id="edit_name" >
							</td>
							<td width="10%" style="vertical-align:middle">
								<input type="button" id="ajax_edit" value="수정" class="btn btn-sm btn-primary">
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>
<?=$pagination; ?>