		<br>
        <div class="alert mycolor1" role="alert">Ajax 구분</div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<script>

    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~sale27/ajax/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~sale27/ajax/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

	$(function() {
		/**
			add (click)
		*/
		$("#ajax_add").click(function() {		// 저장버튼 클릭 시 호출
			var name=$("#name").val();			// name 입력란에 입력한 값
			$.ajax({							// ajax 함수 호출
				url:"/~sale27/ajax/ajax_insert",		// Ajax.php의 ajax_insert 함수 호출 // 실행할 문서
				type:"POST",					// 값 전송방식
				data:{							// 전송할 값들
					"name":name
				},
				dataType:"text",				// return 결과값의 데이터형식
				complete:function(xhr, textStatus) {	// 처리 완료 후
					var no = xhr.responseText;	// ajax_insert에서 return 된 no값	// 처리 후, return 값

					$("#table_list").append(	// 테이블(table_list)에 추가
						"<tr id='rowno" + no + "'>" +
						"	<td>" + no + "</td>" +
						"	<td><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='" + no + "' data-name='" + name + "'>" + name + "</a></td>" +
						"	<td><a href='#' rowno='" + no + "' class='ajax_del btn btn-sm mycolor1'>삭제 </a></td>" +
						"</tr>");
					//$("#name").val('');			// name 입력란 초기화
				}
			});
			$("#collapseExample").collapse('hide');
		});

		/**
			add (enter)
		*/
		$("#name").keyup(function(event) {	// 저장버튼 클릭 시 호출
			if(event.keyCode == 13) {	
			var name=$("#name").val();			// name 입력란에 입력한 값
				$.ajax({							// ajax 함수 호출
					url:"/~sale27/ajax/ajax_insert",		// Ajax.php의 ajax_insert 함수 호출 // 실행할 문서
					type:"POST",					// 값 전송방식
					data:{							// 전송할 값들
						"name":name
					},
					dataType:"text",				// return 결과값의 데이터형식
					complete:function(xhr, textStatus) {	// 처리 완료 후
						var no = xhr.responseText;	// ajax_insert에서 return 된 no값	// 처리 후, return 값

						$("#table_list").append(	// 테이블(table_list)에 추가
							"<tr id='rowno" + no + "'>" +
							"	<td>" + no + "</td>" +
							"	<td><a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='" + no + "' data-name='" + name + "'>" + name + "</a></td>" +
							"	<td><a href='#' rowno='" + no + "' class='ajax_del btn btn-sm mycolor1'>삭제 </a></td>" +
							"</tr>");
						//$("#name").val('');			// name 입력란 초기화
					}
				});
				$("#collapseExample").collapse('hide');
			}
		});

		/**
			edit (click)
		*/
		$("#ajax_edit").click(function() {
			var no = $("#edit_no").val();
			var name = $("#edit_name").val();
			$.ajax({
				url:"/~sale27/ajax/ajax_update",
				type: "POST",
				data: {
					"no":no,
					"name":name
				},
				dataType: "html",
				complete: function(xhr, textStatus) {
					$('#rowno' + no).replaceWith(
						"<tr id='rowno" + no + "'>" + 
						"	<td>" + no + "</td>" + 
						"	<td> <a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='" + no + "' data-name='" + name + "'>" + name + "</a></td>" + 
						"	<td><a href='#' rowno='" + no + "' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>" +
						"</tr>");
				}
			});
			$('#collapseExampleEdit').collapse('hide');
		});

		/**
			edit (enter)
		*/
		$("#edit_name").keyup(function(evnet) {
			if(event.keyCode == 13) {
			var no = $("#edit_no").val();
			var name = $("#edit_name").val();
				$.ajax({
					url:"/~sale27/ajax/ajax_update",
					type: "POST",
					data: {
						"no":no,
						"name":name
					},
					dataType: "html",
					complete: function(xhr, textStatus) {
						$('#rowno' + no).replaceWith(
							"<tr id='rowno" + no + "'>" + 
							"	<td>" + no + "</td>" + 
							"	<td> <a href='#collapseExampleEdit' data-toggle='collapse' class='ajax_edit' aria-expanded='false' aria-controls='collapseExampleEdit' data-no='" + no + "' data-name='" + name + "'>" + name + "</a></td>" + 
							"	<td><a href='#' rowno='" + no + "' class='ajax_del btn btn-sm mycolor1'>삭제</a></td>" +
							"</tr>");
					}
				});
				$('#collapseExampleEdit').collapse('hide');
			}
		});

		/**
			delete (click)
		*/
		$("#table_list").on("click",".ajax_del",function() {
			if(confirm("삭제할까요?")) {
				no = $(this).attr("rowno");
				$.ajax({
					url: "/~sale27/ajax/ajax_delete",
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

	$(document).on('click', '.ajax_add', function() {
		$("#collapseExampleEdit").collapse('hide');
	});
	$(document).on('click', '.ajax_edit', function() {
		$("#collapseExample").collapse('hide');
		$('#edit_no').val( $(this).data('no') );
		$('#edit_name').val( $(this).data('name') );
	});

</script>

        <form name="form1" method="post" action="">

            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">이름</span>
                        </div>
                        <input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
                        <span class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="javascript:find_text();">검색</button>
                        </span>
                    </div>
                </div>

                <div class="col-9" align="right">           
                     <a href="#collapseExample" class="ajax_add btn btn-sm mycolor1" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" data-id="" data-name="">추가</a>
                </div>
            </div>
        </form>

        <table class="table table-sm table-bordered mymargin5" id="table_list">
            <tr class="mycolor2">
                <td width="10%">번호</td>
                <td width="80%">구분명</td>
				<td width="10%">삭제</td>
            </tr>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no27;                                 // 사용자번호
?>
			<tr id="rowno<?=$no; ?>">
				<td><?=$no; ?></td>
				<td><a href="#collapseExampleEdit" data-toggle="collapse" class="ajax_edit" aria-expanded="false" aria-controls="collapseExampleEdit" data-no="<?=$no; ?>" data-name="<?=$row->name27; ?>"><?=$row->name27; ?></a></td>
				<td>
					<a href="#" rowno="<?=$no; ?>" class="ajax_del btn btn-sm mycolor1">삭제</a>
				</td>
			</tr>
<?
    }
?>
        </table>

<div class="collapse mymargin5" id="collapseExample">
  <div class="card card-body" style="padding:0px 5px 0px 5px;">
  	<table class="table table-sm table-bordered alert-primary mymargin5">
		<form name="form2">
			<tr>
				<td width="10%">
					<input type="text" name="none" value="" disabled class="form-control form-control-sm" id="none">
				</td>
				<td width="80%">
					<input type="text" name="name" value="" class="form-control form-control-sm" id="name" >
				</td>
				<td width="10%" style="vertical-align:middle">
					<input type="button" id="ajax_add" value="저장" class="btn btn-sm btn-primary">
				</td>
			</tr>
		</form>
	</table>
  </div>
</div>

<div class="collapse mymargin5" id="collapseExampleEdit">
	<div class="card card-body" style="padding:0px 5px 0px 5px;">
		<table class="table table-sm table-bordered alert-primary mymargin5">
			<form name="form3">
			<tr>
				<td width="10%">
					<input type="text" name="no" value="" disabled class="form-control form-control-sm" id="edit_no">
				</td>
				<td width="80%">
					<input type="text" name="name" value="" class="form-control form-control-sm" id="edit_name" >
				</td>
				<td width="10%" style="vertical-align:middle">
					<input type="button" id="ajax_edit" value="수정" class="btn btn-sm btn-primary" >
				</td>
			</tr>
			</form>
		</table>
	</div>
</div>

<?=$pagination; ?>