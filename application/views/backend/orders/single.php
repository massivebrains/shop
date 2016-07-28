<?php if(!isset($order)){ redirect(site_url('backend/orders')); }?>
<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
  <?php $this->load->view('backend/includes/links') ?>


  <div class="page-container ">

    <?php $this->load->view('backend/includes/header') ?>


    <div class="page-content-wrapper ">

      <div class="content ">

        <div class="jumbotron" data-pages="parallax">
          <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">

              <ul class="breadcrumb">
                <li><p>Dashboard</p></li>
                <li><a href="<?php echo site_url('backend/orders') ?>" class="active">Order</a></li>
                <li><a href="#" class="active"><?=$order->order_number ?></a></li>
              </ul>

            </div>
          </div>
        </div>


        <div class="container-fluid container-fixed-lg">
          <?php $this->load->view('backend/includes/alert') ?>

          <div class="panel">

            <ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
              <li class="active">
                <a data-toggle="tab" href="#add"><span>Order Information.</span></a>
              </li>

            </ul>

            <div class="tab-content">

              <div class="tab-pane slide-left active" id="add">
                <div class="row">

                <style>
                .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                  background: #f8f8f8;
                  color: rgba(20,20,20,0.8) !important;
                }
                </style>
                <form method="post" action="" class="form">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ORDER DATE</label>
                      <input type="text" name="date" class="form-control" value="<?=$order->date ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>ORDER NUMBER</label>
                      <input type="text" name="order_number" class="form-control" value="<?=$order->order_number ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>ORDER DETAILS</label>
                      <table class="table">
                          <thead>
                              <tr>
                                <th>SKU</th>
                                <th>NAME</th>
                                <th>QTY</th>
                                <th>PRICE</th>
                                <th>SUBTOTAL</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach(json_decode($order->details) as $row): ?>
                                <tr>
                                  <td><strong><?=$row->sku ?></strong></td>
                                  <td><strong><?=$row->name ?></strong></td>
                                  <td><strong><?=$row->qty ?></strong></td>
                                  <td><strong><?=APP_CURRENCY.number_format($row->price,2) ?></strong></td>
                                  <td><strong><?=APP_CURRENCY.number_format($row->subtotal,2) ?></strong></td>
                                </tr>
                              <?php endforeach; ?>
                              <?php foreach(json_decode($order->positive_charges) as $row): ?>
                                <tr>
                                  <td colspan="4" class="text-success"><?=$row->charge ?></td>
                                  <td colspan="1" class="text-success"><?=APP_CURRENCY.number_format($row->value,2) ?></td>
                                </tr>
                              <?php endforeach; ?>
                              <?php foreach(json_decode($order->negative_charges) as $row): ?>
                                <tr>
                                  <td colspan="4" class="text-danger"><?=$row->charge ?></td>
                                  <td colspan="1" class="text-danger"><?=APP_CURRENCY.number_format($row->value,2) ?></td>
                                </tr>
                              <?php endforeach; ?>
                              <tr style="font-size:20px !important;">
                                <td colspan="4">
                                  <strong>ORDER TOTAL:</strong>
                                </td colspan="1">
                                <td><strong><?=APP_CURRENCY.number_format($order->order_total,2) ?></strong></td>
                              </tr>

                          </tbody>
                      </table>
                    </div>

                    <div class="form-group">
                      <label>Contact Person</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$order->contact_person ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$order->phone_1,' '.$order->phone_2 ?>" disabled>
                    </div>

                  </div><!-- END OF FIRST COL-LG-6 -->

                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Customer</label>
                      <?php ($order->customer_type == 'guest' ? ($customer = 'GUEST') : ($customer = get_cell(TABLE_CUSTOMERS, array('id'=>$order->customer_id), 'name'))); ?>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$customer ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Delivery Option</label>
                      <?php $delivery_option = $order->delivery_option == 'pick_up' ? 'Pick Up' : 'Deliver to Address' ?>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$delivery_option ?>" disabled>
                    </div>

                    <?php if($order->delivery_option == 'address'){ ?>
                    <div class="form-group">
                      <label>Delivery Address</label>
                      <div class="alert">
                        <address><?=$order->address ?></address>
                        <city><?=$order->city ?></city><br>
                        <area><?=$order->area ?></area>
                      </div>

                    </div>
                    <?php }else{ ?>
                      <div class="form-group">
                      <label>Pickp Station Selected</label>
                      <div class="alert">
                      <?php if($pickup_station = get_row(TABLE_PICKUP_STATIONS, array('id'=>$order->pickup_station))): ?>
                        <span><?=$pickup_station->name ?></span><br/>
                        <address><?=$pickup_station->address ?></address>
                        <?php endif; ?>
                      </div>

                    </div>
                    <?php } ?>



                    <div class="form-group">
                      <label>Date Delivered</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$order->date_delivered ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Delivery Status</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$order->delivery_status ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Order Status</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?=$order->status ?>" disabled>
                    </div>

                    <div class="form-group">
                      <?php if(order_is_completed($order->id)){ ?>
                        <a class="btn btn-warning btn-sm" href="<?=site_url('backend/orders/unmark_order_as_completed/'.$order->id) ?>" onclick="return confirm('Are you sure');" class="tooltip-test" data-toggle="tooltip"
                         title="If this order is unmarked delivered, it is understood that payment has been reversed but order is still valid.">
                          <i class="fa fa-check"></i> Unmark As Delivered
                        </a>&nbsp;
                      <?php }else{ ?>
                      <a class="btn btn-success btn-sm" href="<?=site_url('backend/orders/mark_order_as_completed/'.$order->id) ?>" onclick="return confirm('Are you sure');" class="tooltip-test" data-toggle="tooltip"
                       title="If this order is marked delivered, it is understood that payment has been confirmed either manually or online.">
                        <i class="fa fa-check"></i> Mark As Delivered
                      </a>&nbsp;
                      <?php } ?>
                      <?php if($order->payment_method == 'online'): ?>
                      <a class="btn btn-primary btn-sm" href="<?php echo site_url('backend/orders/verify_payment/'.$order->id) ?>" onclick="return confirm('Are you sure');" class="tooltip-test" data-toggle="tooltip"
                       title="Use this button to requery the payment gateway and confirm if payment was both successful and was <?=currency($order->order_total) ?>">
                       <i class="fa fa-external-link-square"></i> Verify Payment
                     </a>&nbsp;
                   <?php endif; ?>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('backend/orders/delete/'.$order->id) ?>" onclick="return confirm('Are you sure');" class="tooltip-test" data-toggle="tooltip"
                       title="By deleting this order, the system deletes any transaction associated with it and assumes it never existed.">
                       <i class="fa fa-calendar-times-o"></i> Delete
                     </a>
                    </div>







                  </div> <!-- end of row 6 -->
                </form>


                <div class="col-md-3"></div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>

    <?php  $this->load->view('backend/includes/footer-note') ?>

  </div>

</div>

<?php $this->load->view('backend/includes/tables-footer') ?>
</body>
<script>

</script>
</html>
