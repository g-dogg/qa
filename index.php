<?php
	ini_set('display_errors', 1);

	include 'bootstrap.php';

		//$qa->showPosts();

	if(isset($_POST['send']))
	{
		$qa->saveNewPost();
		//$qa->test();
	}
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
	<section class="qaFrom">
		<div class="container">
			<div class="row">
				<form class="col s12" id="form" method="POST">
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input id="icon_prefix" type="text" class="validate" name="username" required>
							<label for="icon_prefix">First Name*</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">email</i>
							<input id="email" type="email" class="validate" name="email" required>
							<label for="email" data-error="wrong" data-success="right">Email*</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">mode_edit</i>
							<input id="text" type="text" class="validate" name="theme" required>
							<label for="text">Заголовок*</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">mode_edit</i>
							<textarea id="textarea1" class="materialize-textarea" name="text" required></textarea>
							<label for="textarea1">Textarea*</label>
						</div>
						<p>
							<input type="checkbox" class="filled-in right-align" id="filled-in-box" checked="checked" name="subscribe" value="ok">
							<label for="filled-in-box">Получить ответ на почту</label>
						</p>
						<div class="col s12">
							<button class="btn waves-effect waves-light right-align" type="submit" name="send" value="send" onclick="sendMsg();">Отправить
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</form>
				<div class="col s12 result hidden" id="results"></div>
			</div>
		</div>
	</section>
	<section class="posts">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<?php $qa->showApprovedPosts();?>
				</div>
			</div>
		</div>
	</section>
	<footer class="mainFooter page-footer red darken-1">
		<div class="container">
			<div class="row">
				<div class="col s4">&nbsp;</div>
				<div class="col s4">Форма "Вопрос/Ответ"</div>
				<div class="col s4">&nbsp;</div>
			</div>
		</div>
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

