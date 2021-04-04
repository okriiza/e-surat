<!doctype html>
<html lang="en">

<head>
   <title>Desa Sebrang</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500&display=swap">
   <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
      <div class="container">
         <a class="navbar-brand" href="index.php"> <img src="assets/img/logo/696px-Bandung_coa.png" width="45" height="45" class="d-inline-block" alt=""> </a>
         <p class="mt-3 text-white font-weight-font-weight-light font" style="font-size: 16px;">Desa Sebrang</p>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
            <ul class="navbar-nav ">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Profile</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="pengajuan.php">E-Surat</a>
               </li>
               <!-- <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Pengajuan
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </li> -->
               <li class="nav-item">
                  <?php if (isset($_SESSION["user"])) : ?>
                     <a class="nav-link" href="logout.php">Logout</a>
                  <?php else : ?>
                     <a class="nav-link" href="login.php">Login</a>
                  <?php endif ?>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- navbar END -->