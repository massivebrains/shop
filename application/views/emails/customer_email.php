<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Wetin Dey - New order Notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div>
   <div
    style="
      font-size: 26px;
      font-weight: 700;
      letter-spacing: -0.02em;
      line-height: 32px;
      color: #41637e;
      font-family: sans-serif;
      text-align: center
    "
    align="center"
    id="emb-email-header">
    <!-- <img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="http://www.anil2u.info/wp-content/uploads/2013/09/anil-kumar-panigrahi-blog.png" alt="" width="152" height="108"> -->
  </div>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Your order has been placed succesfully. Below is the details of your order information.</p>
<div>
 <style>
 .table thead tr th {
  text-transform: uppercase;
  font-weight: 600;
  font-family: 'Montserrat';
  font-size: 13px;
  padding-top: 1px;
  padding-bottom: 1px;
  vertical-align: middle;
  border-bottom: 1px solid rgba(230,230,230,0.7);
  color: rgba(44,44,44,0.35);
}
.table>thead>tr>th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
th {
  text-align: left;
}
td, th {
  padding: 0;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
th {
  font-weight: bold;
}
td, th {
  display: table-cell;
  vertical-align: inherit;
}
table {
  border-spacing: 0;
  border-collapse: collapse;
}
table {
  display: table;
  border-collapse: separate;
  border-spacing: 2px;
  border-color: grey;
}
 </style>
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
</div>
</body>
</html>
