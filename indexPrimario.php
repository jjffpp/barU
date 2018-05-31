<!DOCTYPE html>
<?php include "navbar.php" ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script type="text/javascript" src="client.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="js/jquery-3.3.1.min.js"></script>-->
    <link rel="stylesheet" href="./css/styleexample.css">
    <!--<script type="text/javascript" src="f2.js"></script>-->
  </head>
  <body>
    <?php generarNavbar(); ?>
    <div id="content"></div>
    <!--<center>
      <ul class="pagination" id="pagination"></ul>
    </center>-->
    <?php echo imprimir_footer(); ?>
  </body>
</html>
