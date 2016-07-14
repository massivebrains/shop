

jQuery(window).load(function() {

  jQuery('.main-image').removeClass('disable-click');

});

jQuery(function() {

  jQuery('#giftcertificate_block input').focusin(function () {
    jQuery(this).next('div.info-tip').animate({
      right: '0px',
      opacity: 1.0
    }, 250);
  });
  jQuery('#giftcertificate_block input').focusout(function () {
    jQuery(this).next('div.info-tip').animate({
      right: '-50px',
      opacity: 0
    }, 250);
  });
  jQuery('#giftcertificate_block textarea').focusin(function () {
    jQuery(this).next('div.info-tip').animate({
      top: '-15px',
      width: '150px',
      right: '0px',
      opacity: 1.0
    }, 250);
  });

//Radio Button Options
  jQuery('.radio-format .radio-option').click(function() {

    var group = jQuery(this).attr('data-group');
    var value = jQuery(this).attr('id');

    jQuery(".opt-field :radio[name='" + group + "']").each(function(i) {

      if(jQuery(this).attr('value') === value) {
        document.getElementById('radio-' + jQuery(this).attr('value')).checked = true;
        jQuery("#" + value).addClass('radio-selected');
      }
      else {
        document.getElementById('radio-' + jQuery(this).attr('value')).checked = false;
        jQuery('#' + jQuery(this).attr('value')).removeClass('radio-selected');
      }
    });
  });

  //Responsive Tabs initialized
  jQuery('#rTabs').responsiveTabs({
    rotate: false,
    startCollapsed: 'accordion',
    collapsible: 'accordion',
    setHash: false
  });

  //Responsive Tabs initializing the first tab on mobile
  if(document.body.clientWidth < 767) {
    jQuery('span.pipe').hide();
    jQuery('#rTabs').responsiveTabs('activate', 0);
  }


  //Responsive Tabs initializing the first tab on mobile
  if(document.body.clientWidth < 767) {
    jQuery('span.pipe').hide();
    jQuery('#rTabs').responsiveTabs('activate', 0);
  }


});

function viewTabs() {
  jQuery('html, body').animate({scrollTop:jQuery('#rTabs').position().top}, 'fast');
}
//Show/Hide 'Multipule Ship-To' Recipient field/note
function showAddName() {
  if ( jQuery('.multipleShipToBlock .send-to select').val() != 'myself' || jQuery('.multipleShipToBlock .send-to select').val() != 'select' ) {
    jQuery('.multipleShipToBlock .add-name, .multipleShipToBlock .note').show();
  }
  else {
    jQuery('.multipleShipToBlock .add-name, .multipleShipToBlock .note').hide();
  }
}
//Show/Hide 'Quantity Pricing' Table
jQuery('#showQtyTable').on('click', function() {
  jQuery('.quantity-table').slideToggle();
});
