<?php $this->load->view('frontend/includes/head') ?>
<body>
  <div id="mainContainer">

    <?php $this->load->view('frontend/includes/links')  ?>

    <div id="HomeCarousel"></div>
    <div class="wrapper">

      <div id="mainContent">
        <style type="text/css">
          #simplemodal-container {
           border: none !important;
           background: none !important;
           overflow-y:visible;
         }
         #divBusy {
          display:none;
          background-image:url(admin/templates/images/ajax-loader.html);
          width:32px;
          height:32px;
          margin:auto;
          z-index:999;
          position: absolute;
          top: 40px;
          left: 50%;
        }
      </style>

<section id="viewCart">
  <h1 class="page_headers"></h1>

  <div class="chk-buttons">
    <a href="<?=site_url('shop') ?>"><i class="icon-left-open"></i> Continue Shopping</a>
    <a href="<?=site_url('cart-checkout') ?>" class="btn" style="font-size:16px !important;"><i class="icon-basket"></i> Proceed to Checkout</a>
    <div class="clear"></div>
  </div>

  <form action="#" method="post" name="recalculate" id="recalculate">

    <div class="shoppingCartItems" id="divshoppingCartItems">
      <div class="titles2">
        <div class="item-info">ITEMS</div>
        <div class="item-qty">QTY</div>
        <div class="item-price">PRICE</div>
        <div class="item-total">Total</div>
        <div class="item-remove">&nbsp;</div>
        <div class="clear"></div>
      </div>

      <?php  foreach($cart as $item): ?>
      <div class="row">
        <div class="item-info">
          <div class="product-image">
            <?php $product = get_row(TABLE_PRODUCTS, array('sku'=>$item['id'])); ?>
            <a href="<?=site_url('products/details/'.$product->sku); ?>">
              <?php (empty($product->image) ? ($image = 'product.png'): ($image = $product->image)) ?>
              <img src="<?php echo PRODUCTS_IMAGE_DIR.$image ?>" height="55" width="55" />
            </a>
          </div>
          <div class="product-name-options">
            <a href="<?=site_url('products/details/'.$product->sku); ?>"><?=$item['name'] ?></a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="item-qty">
          <input type="text" name="qty" value="<?=$item['qty'] ?>" id="<?=$item['id'] ?>" size="3" maxlength="5" class="txtBoxStyle" />
          <a href="javascript:;" onclick="updateQty('<?=$item['rowid'] ?>', '<?=$item['id'] ?>')" class="update-qty">Update</a>
        </div>
        <div class="item-price"><?=currency($item['price']) ?></div>
        <div class="item-total" id="item-subtotal-<?=$item['id'] ?>"><?=$item['subtotal'] ?></div>
        <div class="item-remove">
          <a href="javascript:;" onclick="removeProduct('<?=$item['rowid'] ?>')"><i class="icon-cancel"></i></a>  </div>
          <div class="clear"></div>
        </div>
      <?php endforeach; ?>


        <div class="shoppingCartTotal">
          <div class="clear">&nbsp;</div>
          <div class="item-total" id="subtotal"><?=currency($total);?></div>
          <div class="item-price">Subtotal</div>
          <div class="clear"></div>

          <div class="clear">&nbsp;</div>
          <div class="item-total"><strong id="total"><?=currency($total);?></strong></div>
          <div class="item-price"><strong>Total</strong></div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>


      <div class="applyCoupon pad10 boxShadow">
        <div class="header">
          <h3 class="checkout-headers">Apply Coupon</h3>
        </div>
        <input type="text" name="coupon_code" class="txtBoxStyle" size="14" />
        <input type="submit" value="Apply" class="btn" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" />
        <div class="clear"></div>
        <div class="coupon-msg">If you have a promotion code enter it here.</div>
        <div class="clear"></div>
      </div>

      <!-- <div class="shipQuote pad10 boxShadow">
        <div class="header">
          <h3 class="checkout-headers">Calculate Shipping</h3>
        </div>
        <div class="clear"></div>
        <div class="shipquote-location">
          <input type="text" name="shipping_zip" size="14" value="" class="txtBoxStyle" id="calculate_shipping_zip" />
          <input type="button" value="Calculate" class="btn" onclick="#" onmouseover="this.className='btn_over'" onmouseout="this.className='btn'" id="calculate_button_go"/>
        </div>
        <div class="clear"></div>
        <div class="shipquote-msg">Enter zip code to calculate shipping.</div>
        <div class="clear"></div>
      </div> -->

      <div class="clear"></div>

      <div class="chk-buttons">

        <a href="<?=site_url('shop') ?>"><i class="icon-left-open"></i> Continue Shopping</a>
        <a href="<?=site_url('cart-checkout') ?>" class="btn" style="font-size:16px !important;"><i class="icon-basket"></i> Proceed to Checkout</a>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>

      <div class="clear"></div>
    </form>


   <div class="clear"></div>
 </section>


</div>
<div class="clear"></div>
</div>
<?php $this->load->view('frontend/includes/footer') ?>
</div>
</body>

</html>
