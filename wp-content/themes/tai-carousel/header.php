<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="icon" href="../../favicon.ico"-->

    <title><?php wp_title( ); ?></title>

    <!-- Bootstrap core CSS -->
 <link rel='stylesheet' id='main-style'  href="<?php echo get_stylesheet_uri(); ?>" type='text/css'  />

    <link rel='stylesheet' id='main-style'  href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css" type='text/css'  />
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->   
    <link rel='stylesheet' id='main-style'  href="<?php echo get_template_directory_uri() ?>/css/carousel.css" type='text/css'  />

    <?php wp_head(); ?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
	      <a class="navbar-brand" href="<?php echo  home_url( '/' ) ?>">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
	      <ul class="nav navbar-nav">
		
		<?php  echo getMaimMenu(); ?>

                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

