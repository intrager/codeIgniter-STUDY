<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>판매관리</title>
    <link   href="/~sale27/my/css/bootstrap.min.css" rel="stylesheet">
    <script src="/~sale27/my/js/jquery-3.5.1.min.js"></script>
    <script src="/~sale27/my/js/popper.min.js"></script>
    <script src="/~sale27/my/js/bootstrap.min.js"></script>

	<link  href="/~sale27/my/css/my.css" rel="stylesheet">

    <script src="/~sale27/my/js/moment-with-locales.min.js"></script>
    <script src="/~sale27/my/js/bootstrap-datetimepicker.js"></script>
	<link  href="/~sale27/my/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<link  href="/~sale27/my/css/fontawesome-all.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">판매관리</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/~sale27/jangbui">매입</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/~sale27/jangbuo">매출</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/~sale27/gigan">기간조회</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                         통계
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Best제품</a>
                        <a class="dropdown-item" href="#">월별 제품 현황</a>
                        <a class="dropdown-item" href="#">종류별분포도</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                         기초정보
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/~sale27/gubun">구분</a>
                        <a class="dropdown-item" href="/~sale27/product">제품</a>
                        <div class="dropdown-driver"></div>
                        <a class="dropdown-item" href="/~sale27/member">사용자</a>
                    </div>
                  </li>
                </ul>

                <a href="#" class="btn btn-sm btn-outline-secondary btn-dark">로그인</a>

            </div>
        </nav>