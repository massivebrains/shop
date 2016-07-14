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
        <a href='#'>Thank You!</a>
      </div>
      <h1 class="page_headers">Thank You!</h1>

      <div class="content">
        <P>Your order has been placed succesfully. Return to the <a href="<?=site_url('shop/home') ?>">Home Page</a>.
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
