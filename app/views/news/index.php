<section class="content-section">

    <!-- Blog Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Tin Tức</h1>
                <!-- <div class="breadcrumbs">
               
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to PET SHOP Sài Gòn - PET STORE TP.HCM bán Thức Ăn Phụ Kiện cho Chó và Mèo Uy Tín - Chính Hãng." href="https://petshopsaigon.vn" class="home"><span property="name">PET SHOP Sài Gòn - PET STORE TP.HCM bán Thức Ăn Phụ Kiện cho Chó và Mèo Uy Tín - Chính Hãng</span></a>
                    <meta property="position" content="1">
                </span> &gt; <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Tin tức." href="https://petshopsaigon.vn/tin-tuc" class="post post-tin-tuc-archive"><span property="name">Tin tức</span></a>
                    <meta property="position" content="2">
                </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">Chó</span>
                    <meta property="position" content="3">
                </span>
            </div> -->
            </div>


            <div class="container1">
                <div class="row">
                    <?php
                    while ($set = $News->fetch()) :
                    ?>
                        <div class="col-sm-4">
                            <div class="noi_dung">
                                <a href="/news/detail/<?= $set['id'] ?>">
                                    <div class="img">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_news/<?php echo $set["img_news"] ?>" alt="" width="100%">
                                    </div>
                                    <h3><?php echo $set["name"] ?></h3>
                                    <p class="expert"> /<?php echo $set["des_news"] ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>







    <!-- Blog End -->



</section>