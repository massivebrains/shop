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
          <a href='javascript:;'>Checkout</a> >
          <a href='javascript:;'>Guest Details</a> 

        </div>
        <h1 class="page_headers">Checkout</h1>

        <div class="content">
          <div class="column" id="column1">
              <h1>Guest Checkout</h1><br/>

              <form class="" action="<?=site_url('checkout/guest_details') ?>" method="post">
                <label for="delivery_option"><h3>Delivery Option</h3></label>
                <input type="radio" name="delivery_option" value="pick_up">&nbsp; &nbsp;Pickup At Branch<br />
                <input type="radio" name="delivery_option" value="address">&nbsp; &nbsp;Deliver to the address below<br />
                <hr /><br />
                <label for="address">Full Contact Address</label><br/>
                <textarea name="address" rows="8" cols="40" placeholder="Full Contact Address"></textarea><br />
                <label for="city">City</label><br/>
                  <input type="text" name="city" size="14" value="" class="txtBoxStyle" placeholder="City" /><br />
                  <label for="area">Area/Location</label><br/>
                  <input type="text" name="area" size="14" value="" class="txtBoxStyle" placeholder="Area/Location" /><br /><br />
                  <hr /><br />
                  <label for="contact_person">Contact Person</label><br/>
                  <input type="text" name="contact_person" size="14" value="" class="txtBoxStyle" placeholder="Full Name" /><br />
                  <label for="phone_1">Mobile Number 1</label><br/>
                  <input type="text" name="phone_1" size="14" value="" class="txtBoxStyle" placeholder="Phone" /><br />
                  <label for="phone_2">Mobile Number 2</label><br/>
                  <input type="text" name="phone_2" size="14" value="" class="txtBoxStyle" placeholder="Phone" /><br /><br />
                  <input type="submit" value="Continue" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" />
              </form>

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
