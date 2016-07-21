 <footer>
    <div class="wrapper">
      <div class="store-links">
          <div id="FRAME_LINKS" ><!--START: FRAME_LINKS-->
          <div id="modLinks">
              <h3>Links</h3>
              <ul class="frame-links">
                <!--START: LINKS-->
                <li><a href="#" target="_self" class="menu-bottom">Thank You!</a></li>

                <li><a href="#" target="_self" class="menu-bottom">Terms and Conditions</a></li>

                <li><a href="#" target="_self" class="menu-bottom">Become an Affiliate</a></li>

                <li><a href="#" target="_self" class="menu-bottom">Product Index</a></li>

                <li><a href="#" target="_self" class="menu-bottom">Category Index</a></li>
                <!--END: LINKS-->
              </ul>
          </div>
          <!--END: FRAME_LINKS--></div>
      </div>
      <div class="text-block">
      		<h3>About</h3>
            <p>
              Wetin dey® is a branded convenience store fulfilling a need that will continue to exist into the future. At Wetin dey, we’re happy to help you with any of your shopping needs. We sell the same products as other convenience stores in the same packaging sizes, quality, and quantity. This includes groceries, personal care items, household items, beverages (soft drinks, fruit juices, etc.), hot and cold snacks, etc.
              Don’t forget to check out our stores. Thank you for choosing Wetin dey Stores and hope to see you soon!
            </p>
      </div>
      <div class="newsletter">
      <!--START: FRAME_MAILLIST-->
      <div id="mailistBox">
        <form method="post" name="mailing" action="#" onsubmit="return mailing_list();">
          <label>Mailing List</label>
          <div class="mailist-box">
            <input type="text" name="email" value="" placeholder="Email Address" />
            <input type="submit" name="www" value="GO" />
            <div class="clear"></div>
          </div>
          <input type="radio" name="subscribe" value="1" checked="checked" />
          <span class="menu-text">Subscribe</span>
          <input type="radio" name="subscribe" value="0" />
          <span class="menu-text">Unsubscribe</span>
          <div class="clear"></div>
        </form>
        <div class="clear"></div>
      </div>
      <!--END: FRAME_MAILLIST-->
      <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <div id="footerBottom" class="footer">
          <div class="social-icons">
          <ul>
                <li>Find us also on:</li>
                <li><a href="#" class="facebook" target="_blank" title="Like Us on Facebook"><i class="icon-facebook"></i></a></li>
               <li><a href="#" class="twitter" target="_blank" title="Follow Us on Twitter"><i class="icon-twitter"></i></a></li>
               <li><a href="#" class="gplus" target="_blank" title="Follow Us on Google+"><i class="icon-gplus"></i></a></li>
                <li><a href="#" class="youtube" target="_blank" title="Subscribe to Our Channel"><i class="icon-youtube-play"></i></a></li>
                <li><a href="#" class="instagram" target="_blank" title="Follow Us on Instagram"><i class="icon-instagramm"></i></a></li>

            </ul>
            <div class="clear"></div>
          </div>
          <div class="fooPayment">
          	<p><span>Secure Payment Methods:</span> <!-- <img alt="Credit Card Logos" title="Credit Card Logos" src="#" width="249" height="28" border="0" alt="Credi Card Logo"> -->
			</p>
		</div>
<div class="clear"></div>
      </div>
      <div id="globalFooter">

      </div>
      <div class="clear"></div>
    </div>
    <div id="copyright">
        <div class="wrapper">
            <div class="rights"><p>Copyright  <script type="text/javascript" language="javascript"><?php echo date('Y') ?></script> <?=APP_NAME ?>. All Rights Reserved.</p></div>
            <div class="credits">
                <p>Powered by <a href="#" target="_blank" class="dcart">Thinkfirst Technologies</a>. <!-- Design by <a href="#" class="raviG">MassiveSolutions</a> --></p>
            </div>
            <div class="clear"></div>
        </div>
     </div>
  </footer>


<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend//templates/diamond-html5/js/functions.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery('#desktopMenu').slicknav({
      prependTo: '.top-menu .wrapper',
      label: '',
      allowParentLinks: true,
      closedSymbol: '',
      openedSymbol: ''
    });
  });
</script>

<div id="qv_buttontitle" style="display:none;">Quick View</div>
<script type="text/javascript">
  var site_url = '<?php echo site_url() ?>';
</script>
<script type="text/javascript" src="<?=base_url() ?>assets/frontend/toastr/toastr.min.js"></script>
<script src="<?=base_url() ?>assets/frontend/cart.js" type="text/javascript"></script>
