<section id="home-section" class="hero">
      <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(<?php echo $base_url; ?>asset/front/images/bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-md-12 ftco-animate text-center">
                <h1 class="mb-2">Sewa Mobil Dengan Kualitas Terbaik</h1>
                <h2 class="subheading mb-4">Mobil yang kita sewakan terawat dengan baik</h2>
              </div>

            </div>
          </div>
        </div>

        <div class="slider-item" style="background-image: url(<?php echo $base_url; ?>asset/front/images/bg_2.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-sm-12 ftco-animate text-center">
                <h1 class="mb-2">100% Jaminan Tanpa Kendala</h1>
                <h2 class="subheading mb-4">Sewa Mobil Terbaru Anti Mogok</h2>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Pilih Mobil Yang Kami Sediakan</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <div class="row">
          <?php
          foreach ($mobil as $produk) {
              
          ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="Home/detail?id=<?php echo $produk->id_mobil; ?>" class="img-prod"><img class="img-fluid" src="<?php echo $base_url.$produk->gambar_mobil; ?>" alt="Colorlib Template">
                
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="Home/detail?id=<?php echo $produk->id_mobil; ?>"><?php echo $produk->nama_mobil; ?></a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span class="price-sale">Rp. <?php echo $produk->harga_mobil; ?></span></p>
                  </div>
                </div>
                <div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <a href="Home/detail?id=<?php echo $produk->id_mobil; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                      <span><i class="ion-ios-menu"></i></span>
                    </a>
                    <a href="Home/detail?id=<?php echo $produk->id_mobil; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
          
        </div>
      </div>
    </section>
