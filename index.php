<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
        <title></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href='https://fonts.googleapis.com/css?family=Anonymous+Pro:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="libs/materialize/css/materialize.min.css">
        <link rel="stylesheet" href="libs/animate/animate.min.css">
        <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><!-- testing -->
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/media.css">
</head>
<body>
<div class="container">
	<div class="row">
		<form class="col s12">
      		<div class="row">
        			<div class="input-field col s6">
          				<i class="material-icons prefix">account_circle</i>
          				<input id="icon_prefix" type="text" class="validate" name="username">
          				<label for="icon_prefix">First Name*</label>
        			</div>
        			<div class="input-field col s6">
        				<i class="material-icons prefix">email</i>
          				<input id="email" type="email" class="validate" name="email">
          				<label for="email" data-error="wrong" data-success="right">Email*</label>
        			</div>
        			<div class="input-field col s12">
        				<i class="material-icons prefix">mode_edit</i>
          				<input id="text" type="text" class="validate" name="theme">
          				<label for="text">Заголовок*</label>
        			</div>
        			<div class="input-field col s12">
        				<i class="material-icons prefix">mode_edit</i>
        				<textarea id="textarea1" class="materialize-textarea" name="text"></textarea>
          				<label for="textarea1">Textarea*</label>
        			</div>
        			 <p>
      				<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
      				<label for="filled-in-box">Filled in</label>
    				</p>
    				<div class="col s12">
    					<a class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</a>
    				</div>
      		</div>
   		</form>
	</div>
</div>
<footer class="mainFooter">

</footer>
      <div class="hidden">
            <!--[if lt IE 9]>
                <script src="<?= Config::getRootPath();?>libs/html5shiv/es5-shim.min.js"></script>
                <script src="<?= Config::getRootPath();?>libs/html5shiv/html5shiv.min.js"></script>
                <script src="<?= Config::getRootPath();?>libs/html5shiv/html5shiv-printshiv.min.js"></script>
                <script src="<?= Config::getRootPath();?>libs/respond/respond.min.js"></script>
            <![endif]-->
            <script src="libs/jquery/jquery-2.1.3.min.js"></script>
            <script src="libs/materialize/js/materialize.min.js"></script>
            <script src="libs/animate/animate-css.js"></script>
            <script src="libs/jqBootstrapValidation/jqBootstrapValidation.js"></script>
            <script src="js/common.js"></script>
      </div>
</body>
</html>

