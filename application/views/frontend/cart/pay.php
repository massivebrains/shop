<html lang="en">
  <body onLoad="document.submit2cepay_form.submit()">
    <form method="post" name="submit2cepay_form" action="https://www.cashenvoy.com/sandbox/?cmd=cepay" target="_self">
    <input type="hidden" name="ce_merchantid" value="<?=$cash_envoy_merchant_id ?>"/>
    <input type="hidden" name="ce_transref" value="<?=$cash_envoy_transction_reference ?>"/>
    <input type="hidden" name="ce_amount" value="<?=$cash_envoy_amount ?>"/>
    <input type="hidden" name="ce_customerid" value="<?=$cash_envoy_customer_id ?>"/>
    <input type="hidden" name="ce_memo" value="<?=$cash_envoy_transaction_description ?>"/>
    <input type="hidden" name="ce_notifyurl" value="<?=$cash_envoy_notify_url ?>"/>
    <input type="hidden" name="ce_window" value="parent"/><!-- self or parent -->
    <input type="hidden" name="ce_signature" value="<?=$signature ?>"/>
    </form>
  </body>
</html>









<!-- merchant_id = <?//=$cash_envoy_merchant_id ?><br/>
transactio reference = <?//=$cash_envoy_transction_reference ?><br/>
amount = <?//=$cash_envoy_amount ?><br/>
customer id = <?//=$cash_envoy_customer_id ?><br/>
transaction descp = <?//=$cash_envoy_transaction_description ?><br/>
notify url = <?//=$cash_envoy_notify_url ?><br/>
signature = <?//=$signature ?><br/> -->
