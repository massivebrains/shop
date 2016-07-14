<?php $this->load->view('frontend/includes/head') ?>
<body>
  <div id="mainContainer">
    <?php $this->load->view('frontend/includes/links')  ?>
    <div id="HomeCarousel"></div>
    <div class="wrapper">
      <?php //$this->load->view('frontend/cart/aside')  ?>

      <div id="mainContent">
        <section id="message">
          <form method="post" action="#">
            <h1>Cart Contents</h1>
            <div class="notice">You don't have any products in your shopping cart.</div>

            <div class="button"><a href="<?=site_url('shop') ?>" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'">Click here to continue</a></div>

          </form>
        </section>
      </div>

      <div class="clear"></div>
    </div>
    <?php $this->load->view('frontend/includes/footer')  ?>
  </div>
</body>
</html>
