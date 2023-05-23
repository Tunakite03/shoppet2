<section class="content-section">
  <div class="container">
    <div class="row">
      <div class="">
        <?php   while ($set= $NewsId->fetch()) : ?>
        <div class="news-detail">
          <div class="detail">
            <h1 class="title" style="color: chocolate;"><?php echo $set['name']; ?></h1>  
            <p class="info">Ngày đăng: <?php echo $set['uptime']; ?> - Lượt xem: <?php echo $set['view']; ?></p>
            <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_news/<?php echo $set['img_news'];?>" alt="" width="70%" height="70%">
            <div class="content_news"><?php echo $set['content'];?></div>
          </div>
        </div>
        <?php  endwhile;  ?>
      </div>
    </div>
  </div>
</section>