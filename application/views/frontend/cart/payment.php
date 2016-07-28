<?php $this->load->view('frontend/includes/head') ?>
<link rel="stylesheet" href="<?=base_url() ?>assets/frontend/paginate.css" title="no title" charset="utf-8">
<body>
  <div id="mainContainer">
    <?php $this->load->view('frontend/includes/links') ?>
    <div id="HomeCarousel"></div>
    <div class="wrapper">
      <?php $this->load->view('frontend/cart/aside') ?>
      <div id="mainContent"><section id="extrapage">
        <div class="breadcrumbs">
          <a href='<?php echo site_url('shop') ?>'>Home</a> > 
          <a href='javascript:;'>Checkout</a> > 
          <a href='javascript:;'>Payment</a>  

        </div>
        <div class="content">
          <div class="column" id="column1">
              <h1 class="page_headers">Delivery Information</h1>

              <table class="table">
                      <tr>
                        <td><strong>Delivery Option</strong></td>
                        <td>
                          <p>
                            <?=$this->session->userdata('delivery_option') ?>
                            <?php if(customer_is_logged_in()): ?>
                          <?php endif ?>
                          </p>
                        </td>
                        <td><strong>Contact Address</strong></td>
                        <td><p><?=$this->session->userdata('address') ?></p></td>
                      </tr>
                      <tr>
                        <td><strong>City</strong></td>
                        <td><p><?=$this->session->userdata('city') ?></p></td>
                        <td><strong>Area/Location</strong></td>
                        <td><p><?=$this->session->userdata('area') ?></p></td>
                      </tr>
                      <tr>
                        <td><strong>Contact Person</strong></td>
                        <td><p><?=$this->session->userdata('contact_person') ?></p></td>
                        <td><strong>Mobile Numbers</strong></td>
                        <td><p><?=$this->session->userdata('phone_1').' , '.$this->session->userdata('phone_2') ?></p></td>
                      </tr>
              </table><br/>
              <h1 class="page_headers">Order Details</h1>
              <table class="table">
                <tr>
                  <th><strong>Item</strong></th>
                  <th><strong>Quantity</strong></th>
                  <th><strong>Price</strong></th>
                  <th><strong>Total</strong></th>
                </tr>
                  <?php foreach($cart as $item): ?>
                  <tr>
                    <td><?=$item['name'] ?></td>
                    <td><?=$item['qty'] ?></td>
                    <td><?=currency($item['price']) ?></td>
                    <td><?=currency($item['subtotal']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </table><br />

              <h1 class="page_headers">Order Summary</h1>
              <?php $charges_table = build_charges_table($total, $this->session->userdata('delivery_option')) ?>
              <?=$charges_table['html'] ?>
              <br>
              <img src="<?php echo base_url() ?>assets/frontend/payment_options.PNG" alt="Payement Options" />
                <form class="" action="<?=site_url('checkout/pay_online') ?>" method="post">
                  <input type="hidden" name="order_total" value="<?=$charges_table['total'] ?>">
                  <button type="submit" name="submit" style="font-size:20px;" style="font-size:20px; margin-right:10px;">Pay Online</button>
                </form>
              <!-- <form class="" action="<?php //echo site_url('checkout/pay_on_delivery') ?>" method="post">
                <input type="hidden" name="order_total" value="<?php //echo $charges_table['total'] ?>">
                <button type="submit" name="submit" style="font-size:20px;">Pay on Delivery</button>
              </form> -->
              <form class="" action="<?=site_url('checkout/cancel_order') ?>" method="post">
                <button type="submit" name="submit" style="font-size:20px;">Cancel Order</button>
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
