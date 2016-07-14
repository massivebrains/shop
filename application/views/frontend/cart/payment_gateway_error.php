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
        <a href='#'>Oppzzz!</a>
      </div>
      <h1 class="page_headers">Payment Processing Error!</h1>

      <div class="content">
        <P>We are sorry, an unexpected errror has occurred while processing your payment. <a href="<?=site_url('shop/home') ?>">Kindly Click here</a> To return to home page.
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
