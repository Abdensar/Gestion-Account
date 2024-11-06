 <?php
    session_start();
    if (!isset($_SESSION['email'])) {
    ?>
     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Home</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     </head>

     <body>
         <?php include('navbar.php'); ?>

         <div class="container mt-4">

             <h1>please login </h1>
         </div>
     </body>

     </html>
 <?php
        exit();
    }

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>

 <body>
     <?php include('navbar.php'); ?>

     <div class="container mt-4">

         <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
     </div>
 </body>

 </html>