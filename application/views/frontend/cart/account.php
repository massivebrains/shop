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
          <a href='javascript:;'>Accounts</a> 

        </div>
        <h1 class="page_headers">Register</h1>

        <div class="content">
          <div class="column" id="column1">

              <h1>Kindly fill the form below</h1>
              <?php ($action == 'checkout'? $_action = 'checkout' : $_action = '') ?>
              <form class="" action="<?=site_url('shop/home/account/'.$_action) ?>" method="post">
                <p><?php echo validation_errors();$this->session->userdata('error'); ?></p>
                <label for="email">Your Email</label><br/>
                <input type="text" name="email" size="14" value="" class="" id="" placeholder="user@domain.com"/><br /><br/>
                <label for="password">Choose a password</label><br/>
                <input type="text" name="password" size="14" value="" class="shipQuote" placeholder="choose a password" /><br /><br/>
                <hr /><br />
                <label for="name">Your Full name</label><br/>
                <input type="text" name="name" size="14" value="" class="txtBoxStyle" placeholder="Full Name" /><br />
                <label for="phone_1">Mobile Number 1</label><br/>
                <input type="text" name="phone_1" size="14" value="" class="txtBoxStyle" placeholder="Phone" /><br />
                <label for="phone_2">Mobile Number 2</label><br/>
                <input type="text" name="phone_2" size="14" value="" class="txtBoxStyle" placeholder="Phone" /><br /><br />
                <hr /><br/>
                <label for="address">Full Contact Address</label><br/>
                <textarea name="address" rows="8" cols="40" placeholder="Full Contact Address"></textarea><br />
                <label for="city">City</label><br/>
                  <input type="text" name="city" size="14" value="" class="txtBoxStyle" placeholder="City" /><br />
                  <label for="area">Area/Location</label><br/>
                  <input type="text" name="area" size="14" value="" class="txtBoxStyle" placeholder="Area/Location" /><br /><br />
                  <label for="address">How did you hear about us?</label><br/>
                  <select class="" name="how_you_heared">
                    <option value="friend">Through a friend</option>
                    <option value="internet">From the internet</option>
                    <option value="internet">Via a promotion</option>
                  </select><br/>
                  <input type="submit" value="Register" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" />
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
