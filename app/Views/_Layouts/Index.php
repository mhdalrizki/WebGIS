 <!DOCTYPE html>
 <html lang="en">

 <head>
     <?php include 'head.php' ?>

 </head>

 <body>
     <div id="app">

         <?php include 'sidebar.php' ?>

         <div id="main">
             <header class="mb-3">
                 <a href="#" class="burger-btn d-block d-xl-none">
                     <i class="bi bi-justify fs-3"></i>
                 </a>
             </header>

             <?= $this->renderSection('content') ?>

             <?php include 'footer.php' ?>
         </div>
     </div>
 </body>
 <?php include 'java.php' ?>

 </html>