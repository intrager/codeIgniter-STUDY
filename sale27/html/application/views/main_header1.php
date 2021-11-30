<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>음원관리</title>
    <link href="/~sale27/my/css/bootstrap.min.css" rel="stylesheet">
    <script src="/~sale27/my/js/jquery-3.5.1.min.js"></script>
    <script src="/~sale27/my/js/popper.min.js"></script>
    <script src="/~sale27/my/js/bootstrap.min.js"></script>

	<link href="/~sale27/my/css/my.css" rel="stylesheet">

    <script src="/~sale27/my/js/moment-with-locales.min.js"></script>
    <script src="/~sale27/my/js/bootstrap-datetimepicker.js"></script>
	<link href="/~sale27/my/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<link href="/~sale27/my/css/fontawesome-all.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/~sale27/main1">음원관리</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/~sale27/music">음원</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/~sale27/record">음반</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                         가수
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/~sale27/singer">가수목록</a>         
                    </div>
                  </li>
				  <li class="nav-item">
<?
	if ($this->session->userdata("uid"))
		echo("<a class='nav-link' href='/~sale27/member1'>사용자</a>");
?>
				  </li>	
                </ul>
<?
	if (!$this->session->userdata("uid"))
		echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-sm btn-outline-secondary btn-dark'>로그인</a>");
	else 
		echo("<a href='/~sale27/login1/logout' class='btn btn-sm btn-outline-secondary btn-dark'>로그아웃</a>");
?>
            </div>
        </nav>
		
		<!-- Modal Login -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
			  <div class="modal-header mycolor1">
				<h4 class="modal-title" id="exampleModalLabel">로그인</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body bg-light" style="text-align:center">
				<form name="form_login" method="post" action="/~sale27/login1/check">
				  <div class="form-inline">
				  	아이디 : &nbsp;&nbsp;
					<input type="text" name="uid" size="15" value="" class="form-control form-control-sm">
				  </div>
				  <div style="height:10px"></div>
				  <div class="form-inline">
				  	암 &nbsp;&nbsp; 호 : &nbsp;&nbsp;
					<input type="password" name="pwd" size="15" value="" class="form-control form-control-sm">
				  </div>
				</form>
			  </div>
			  <div class="modal-footer alert-secondary" style="text-align:center">
				<button type="button" class="btn btn-secondary" onClick="javascript:form_login.submit();">확인</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">닫기</button>
			  </div>
			</div>
		  </div>
		</div>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="/~sale27/my/img/platform1.jpg" height="150" alt="First slide" class="d-block w-100">
			</div>
			<div class="carousel-item">
			  <img src="/~sale27/my/img/platform2.jpg" height="150" alt="Second slide" class="d-block w-100" >
			</div>
			<div class="carousel-item">
			  <img src="/~sale27/my/img/platform3.jpg" height="150" alt="Third slide" class="d-block w-100" >
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" style="aria-hidden:true"></span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" style="aria-hidden:true"></span>
		  </a>
		</div>