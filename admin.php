<?php
	ini_set('display_errors', 1);

	include 'bootstrap.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<title>Вопрос.Ответ</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href='https://fonts.googleapis.com/css?family=Anonymous+Pro:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="libs/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="libs/animate/animate.min.css">
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><!-- testing -->
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header class="formHead">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="valign-wrapper">
						<h2 class="center-align">Вопрос/ответ</h2>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="postsTable">
		<div class="container">
			<div class="row">
				<table>
					<thead>
						<tr>
							<th>id</th>
							<th>theme</th>
							<th>text</th>
							<th>btn1</th>
							<th>btn2</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$qa->getNewPostsForEdit();
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<footer class="mainFooter page-footer red darken-1">

	</footer>
	<div class="hidden">
            <!--[if lt IE 9]>
                <script src="libs/html5shiv/es5-shim.min.js"></script>
                <script src="libs/html5shiv/html5shiv.min.js"></script>
                <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
                <script src="libs/respond/respond.min.js"></script>
                <![endif]-->
                <script src="libs/jquery/jquery-2.1.3.min.js"></script>
                <script src="libs/materialize/js/materialize.min.js"></script>
                <script src="libs/animate/animate-css.js"></script>
                <script src="libs/jqBootstrapValidation/jqBootstrapValidation.js"></script>
                <script src="js/common.js"></script>
              </div>
            </body>
            </html>