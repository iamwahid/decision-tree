<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
    
<title>Judul</title>
</head>
<body>
<!--nav-->
<nav class="navbar nav-index navbar-expand-lg navbar-light fixed-top">
    <button type="button" id="sidebarCollapse" class="btn btn-secondary" href="layout/sidebar.php" >
        <i class="fas fa-align-left"></i><span></span>
    </button>
    <a class="navbar-brand" href="index.php" style="color: white; font-size:25px">Sistem </a>
</nav>
<!--content-->
<div id="content mt-5"></div>
<!--end-->
<!--script button sidebar-->
<script>
$(document).ready(function () {

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});

});
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.0/dist/chart.min.js"></script>
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
