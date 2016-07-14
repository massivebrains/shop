<div class="sticky">
<!--mobileview-->
    <div class="mobileview">
      <div id="logoMob">
       <a href="<?php echo site_url('shop') ?>"><img src="<?php echo base_url() ?>assets/frontend/images/logo.png" alt="<?=APP_NAME ?>" /></a>
     </div>
     <ul class="mobBtns">
      <li>
        <a href="#" class="menuMob">menu</a>
        <ul class="menu"></ul>
      </li>
      <li>
        <a href="#" class="searchMob">search</a>
        <ul class="search">
          <li>
            <div class="mobSearch">
              <form method="post"  action="<?=site_url('search') ?>">
                <input type="text" name="keyword" value="" placeholder="Search by name, price, etc" />
                <button name="search" type="submit">Search</button>
                <div class="clear"></div>
              </form>
            </div>
          </li>
        </ul>
      </li>
      <li><a href="<?=site_url('cart') ?>" class="miniCartMob">cart</a></li>
    </ul>
    <div class="clear"></div>
  </div>
  <!--end-of-mobile-view-->


<!--top-black-menu-->
<div class="top-menu">
  <div class="wrapper">
    <!--START: username--><!--END: username-->
    <nav>
      <ul>
        <li class="m-search show-mobile">
          <div>
            <form method="post"  action="<?=site_url('search') ?>">
              <input type="text" name="keyword" placeholder="Search" />
              <button name="search" type="submit"><i class="icon-search"></i></button>
              <div class="clear"></div>
            </form>
          </div>
        </li>
        <div id="FRAME_MENU" ><!--START: FRAME_MENU-->
          <ul>
            <!--START: menuitems_view-->
            <li><a href="<?=site_url('shop/home') ?>" class="menu">Home</a></li>

            <li><a href="#" class="menu">About Us</a></li>

            <li><a href="#" class="menu">My Account</a></li>
            <?php if(customer_is_logged_in()): ?>
              <li><a href="<?php echo site_url('shop/home/logout') ?>" class="menu">Logout</a></li>
            <?php endif; ?>

            <li><a href="#" class="menu">Contact Us</a></li>
            <!--END: menuitems_view-->
          </ul>
          <!--END: FRAME_MENU--></div>
        </ul>
        <div class="clear"></div>
      </nav>
      <div class="clear"></div>
    </div>
</div>
  <!--end of top black menu -->
<style>
      .fixed{
        position: fixed;
        top:0; left:0;
        width: 100%;
        z-index: 3000;
      }
</style>
<script type="text/javascript">
$(window).scroll(function(){
var sticky = $('.sticky'),
    scroll = $(window).scrollTop();

if (scroll >= 100) sticky.addClass('fixed');
else sticky.removeClass('fixed');
});
</script>





  <!--beginning of links -->
  <header>
    <div class="wrapper">
      <div id="logo"><!--START: global_header-->
        <a href="<?php echo site_url('shop') ?>" title="<?=APP_NAME ?>"><img src="<?php echo base_url() ?>assets/frontend/images/logo.png" alt="<?=APP_NAME ?>" /></a><!--END: global_header-->
      </div>

      <div class="miniCart">
       <a id="cart" href="<?php echo site_url('cart') ?>" class="hidden-mobile">
        Cart: <span id="noItems"><span id="cartcount">0</span></span> <span id="noItemsText">Item</span>
      </a>
     </div>
     <div id="FRAME_SEARCH" ><!--START: FRAME_SEARCH-->
      <div id="searchBox" class="hidden-mobile">
        <form method="post"  action="<?=site_url('search') ?>">
          <input type="text" id="searchlight" name="keyword" value="" placeholder="Search" />
          <button name="search" type="submit"><i class="icon-search"></i></button>
        </form>
        <div class="clear"></div>
      </div>
      <!--END: FRAME_SEARCH--></div>
      <nav id="catNavMenu">
        <div class="wrapper">
          <!--START: FRAME_CATEGORY-->
          <?=build_frontend_category_menu() ?>
          <!--END: FRAME_CATEGORY-->
          <div class="clear"></div>
        </div>
      </nav>
      <div class="clear"></div>
    </div>
  </header>
  <!--end of links -->
</div>
