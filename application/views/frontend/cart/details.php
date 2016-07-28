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
          <a href='javascript:;'>Details</a> 

        </div>
        <h1 class="page_headers">Checkout</h1>

        <div class="content">
          <div class="column" id="column1">
            <h1>Checkout Options</h1><br/>

            <form class="" action="<?=site_url('checkout/details') ?>" method="post">
              <label for="delivery_option"><h3>Delivery Option</h3></label>
              <input type="radio" name="delivery_option" value="pick_up"  checked>&nbsp; &nbsp;Pickup At A Station<br />
              
              <input type="radio" name="delivery_option" value="address" >&nbsp; &nbsp;Deliver to the address below<br />
              <hr /><br />
              <div id="address">
                <span style="color:red">
                Please note that our delivery only covers VI, Ikoyi, Lekki, Ikate, Jakande, Osapa, Agungi, Igboefon, Chevron, Alpha Beach, Ikota, Ajah and Sangotedo ONLY.
                </span><br/>
                <label for="address">Full Contact Address</label><br/>
                <textarea name="address" rows="8" cols="40" placeholder="Full Contact Address"><?php echo $this->session->userdata('address') ?></textarea><br />
                <label for="city">City</label><br/>
                <input type="text" name="city" size="14" class="txtBoxStyle" placeholder="City" value="<?php echo $this->session->userdata('city') ?>" /><br />
                <label for="area">Area/Location</label><br/>
                <input type="text" name="area" size="14" value="<?php echo $this->session->userdata('area') ?>" class="txtBoxStyle" placeholder="Area/Location" /><br /><br />
                <hr /><br />
              </div>

              <div id="pickup">
                <table class="table">
                <tr>
                  <td>&nbsp;</td>
                  <td style="color:red">AVALIABLE PICKUP STATIONS <small>(Please Kindly Select a station closer to you.)</small></td>
                </tr>
                <?php foreach(get(TABLE_PICKUP_STATIONS) as $row): ?>
                  <tr>
                    <td><input type="radio" name="pickup_station" value="<?=$row->id ?>">&nbsp;</td>
                    <td>
                      <?=$row->address ?><br/>
                      <strong>Contact Person:</strong><?=$row->contact_person ?><br/>
                      <strong>Contact Phone:</strong><?=$row->contact_phone ?><br/><br />
                    </td>
                  </tr>
                <?php endforeach; ?>
                </table>
                

              </div>

              <label for="contact_person">Contact Person</label><br/>
              <input type="text" name="contact_person" size="14" value="<?php echo $this->session->userdata('contact_person') ?>" class="txtBoxStyle" placeholder="Full Name" /><br />
              <label for="phone_1">Mobile Number 1</label><br/>
              <input type="text" name="phone_1" size="14" value="<?php echo $this->session->userdata('phone_1') ?>" class="txtBoxStyle" placeholder="Phone" /><br />
              <label for="phone_2">Mobile Number 2</label><br/>
              <input type="text" name="phone_2" size="14" value="<?php echo $this->session->userdata('phone_2') ?>" class="txtBoxStyle" placeholder="Phone" /><br /><br />
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

<script>
  $(document).ready(function(){
    delivery_option = $('input[name=delivery_option]:checked').val();
    if(delivery_option == 'pick_up') {
      $('#address').hide();
      $('#pickup').show();
    } else {
      $('#address').show();
      $('#address').hide();
    }
    $('input[name=delivery_option]').change(function(){
       delivery_option = $('input[name=delivery_option]:checked').val();
      if(delivery_option == 'pick_up') {
        $('#address').hide();
        $('#pickup').show();
      } else {
        $('#address').show();
        $('#pickup').hide();
      }
      console.log(delivery_option);
    });
    
  })
</script>
</body>

</html>
