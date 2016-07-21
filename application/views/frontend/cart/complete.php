<?php $this->load->view('frontend/includes/head') ?>
<body>
  <div id="mainContainer">
    <?php $this->load->view('frontend/includes/links') ?>
    <div id="HomeCarousel"></div>
    <div class="wrapper">
     <?php $this->load->view('frontend/cart/aside') ?>
     <div id="mainContent"><section id="extrapage">
      <div class="breadcrumbs">
        <a href='index.html'>Home</a> > 
        <a href='#'>Order Status</a>
      </div>
      <h1 class="page_headers"><?=$header ?></h1>

      <div class="content">
        <p><?=$text ?></p>.
        <p><a href="<?php echo site_url('shop') ?>">Return to Home page.</a></p>
        </div>
        <div class="clear"></div>
      </section>
    </div>
    <div class="clear"></div>
  </div>
  <div style="padding:100px;">

  </div>
  <?php $this->load->view('frontend/includes/footer') ?>
</div>
</body>

</html>
