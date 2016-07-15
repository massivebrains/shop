<?php $this->load->view('frontend/includes/head') ?>
<body>
  <div id="mainContainer">
    <?php $this->load->view('frontend/includes/links') ?>
    <div id="HomeCarousel"></div>
    <div class="wrapper">
      <?php $this->load->view('frontend/cart/aside') ?>
      <div id="mainContent"><section id="extrapage">
        <div class="breadcrumbs">
          <a href='<?php echo site_url('shop/home') ?>'>Home</a> > 
          <a href='javascript:;'>Checkout</a> 

        </div>
        <h1 class="page_headers">Checkout</h1>

        <div class="content">
          <div class="column" id="column1">
            <?php
            if(customer_is_logged_in()){
              echo 'You are already loggged in.';
              echo ' <a href="'.site_url('checkout/customer_is_logged_in').'">Click here</a> To continue.';
            }else{
             ?>
              <h1>Guest Checkout</h1>

              <form class="" action="<?=site_url('checkout/guest') ?>" method="post">
                  <input type="text" name="email" size="14" value="" class="txtBoxStyle" id="" placeholder="user@domain.com" /><br /><br />
                  <input type="submit" value="Continue" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" />
              </form>
              <br /><br />
              <hr /><br />
              <?php if($this->session->userdata('message') == ''){
                echo '<h1>Or Login Below.</h1>';
              } else {
                echo $this->session->userdata('message');
                $this->session->set_userdata('message', '');
              } ?>
                <form class="" action="<?=site_url('checkout/login') ?>" method="post">
                    <p><?php echo validation_errors(); echo $this->session->userdata('error'); ?></p>
                    <input type="text" name="email" size="14" value="" class="" id="" placeholder="user@domain.com"/><br /><br/>
                    <input type="password" name="password" placeholder="password" style="width:200px; !important" /><br /><br/>
                    <input type="submit" value="Continue" class="btn" onclick="#" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'">
                </form>

                <p>Dont have an account with us? <a href="<?=site_url('registration') ?>">Register here</a></p>
                <?php } ?>
          </div>
        </div>
        <div class="clear"></div>
      </section>
    </div>

    <div class="clear"></div>
  </div>
  <?php $this->load->view('frontend/includes/footer') ?>
</div>
</body>

</html>
