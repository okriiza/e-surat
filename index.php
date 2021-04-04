<?php
if (!isset($_SESSION)) {
   session_start();
}

?>


<?php include 'navbar.php'; ?>

<!-- <div id="carouselExampleControls" class="carousel slide mt-5 mb-3 bg-dark" data-ride="carousel">
        <div class="carousel-inner">
            <div class="container">
                <div class="carousel-item active">
                <div class="row pt-5 justify-content-center">
                <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="assets/img/logo/696px-Bandung_coa.png" width="150" height="150" class="mt-5">
                    </div>
                    <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                        <h1 class="mb-4">Lorem ipsum dolor sit amet </h1>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. At adipisci omnis facilis consectetur? Eum eligendi ut est veniam impedit consequuntur non quia numquam tempore voluptatem. Excepturi ipsa vero placeat a.</p>
                        <a href="" class="btn btn-primary text-white ">Lihat Profile</a>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row pt-5 justify-content-center">
                    <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                        <h1 class="mb-4">Spesial Eid Lebaran</h1>
                        <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorable</p>
                        <a href="" class="btn btn-warning text-white">Get It Now</a>
                    </div>
                    <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="asset/img/slideshow/1.png">
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row pt-5 justify-content-center">
                    <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                        <h1 class="mb-4">Spesial Eid Lebaran</h1>
                        <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorable</p>
                        <a href="" class="btn btn-warning text-white">Get It Now</a>
                    </div>
                    <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="asset/img/slideshow/1.png">
                    </div>
                </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->




<!-- Post -->
<div class="container" style="margin-top: 100px;">
   <div class="row">
      <div class="col-md-8">
         <!-- Carousel -->
         <div id="carouselExampleCaptions" class="carousel slide mb-3" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="assets/img/slide/1.jpg" class="d-block w-100" alt="..." height="350">
                  <div class="carousel-caption">
                     <h5>Seorang Petani Sedang Membajak Sawah</h5>
                     <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
               </div>
               <div class=" carousel-item">
                  <img src="assets/img/slide/2.jpg" class="d-block w-100" alt="..." height="350">
                  <div class="carousel-caption ">
                     <h5>Seorang Anak Kecil Sedang Mandi</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img src="assets/img/slide/3.jpg" class="d-block w-100" alt="..." height="350">
                  <div class="carousel-caption ">
                     <h5>Para Warga Sedang Memanen Padi</h5>
                     <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
         <!-- Akhir Carousel -->

         <h4>Berita Terbaru</h4>
         <hr style="border: 1px solid #000;">

         <div class="row">
            <div class="col-md-6">
               <div class="card mb-3">
                  <img src="assets/img/slide/1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Seorang Petani Sedang Membajak Sawah</h5>
                     <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card mb-3">
                  <img src="assets/img/slide/2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Seorang Anak Kecil Sedang Mandi</h5>
                     <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card mb-3">
                  <img src="assets/img/slide/3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Para Warga Sedang Memanen Padi</h5>
                     <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card mb-3">
                  <img src="assets/img/slide/2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Seorang Anak Kecil Sedang Mand</h5>
                     <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                  </div>
               </div>
            </div>
         </div>

         <!-- Pagination -->
         <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
               <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
               </li>
               <li class="page-item"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item">
                  <a class="page-link" href="#">Next</a>
               </li>
            </ul>
         </nav>
         <!-- Pagination END -->
      </div>
      <div class="col-md-4">
         <h4 class="">Pencarian</h4>
         <hr style="border: 1px solid #000;">
         <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Sesuatu..." aria-label="Search">
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
         </form>

         <h4 class="mt-3">Recent Post</h4>
         <hr style="border: 1px solid #000;">
         <a href="" class="text-decoration-none font-weight-light text-justify " style="font-size: 14px;"><label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
      </div>
   </div>
</div>
<!-- Post END -->

<?php include 'footer.php'; ?>