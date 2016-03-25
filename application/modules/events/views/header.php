
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen,projection" />
      <title><?php echo $page_title; ?></title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<<<<<<< HEAD

	<nav>
=======
      <script type="text/javascript" src="<?php echo base_url("assets/js/materialize.min.js"); ?>"></script>

      <nav>
>>>>>>> origin/master
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><?php echo $page_title; ?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <?php
            if($_SESSION['role'] == 'admin')
            {
          ?>
        <li><a href="<?php echo base_url("index.php/events/event"); ?>">Events</a></li>
        <li><a href="<?php echo base_url("index.php/events/lcs"); ?>">LCs</a></li>
        <?php
            }
        ?>
        <li><a href="<?php echo base_url("index.php/events/persons"); ?>">Persons</a></li>
        <li><a href="<?php echo base_url("index.php/events/logout"); ?>">Logout</a></li>
      </ul>
    </div>
	</nav>
    <div class="container">
