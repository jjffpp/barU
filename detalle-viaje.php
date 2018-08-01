<!DOCTYPE html>
<?php include "navbar.php" ?>
<?php include "cargarSolicitudes.php" ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./css/spacing.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/styleexample.css">
    <script type="text/javascript" src="client.js"></script>
  </head>
  <body>
    <?php generarNavbar(); ?>
    <div class="container  mt-20">
    <?php cargarSolicitudes(); ?>      
    </div>    
    <?php echo imprimir_footer(); ?>
  </body>
</html>


