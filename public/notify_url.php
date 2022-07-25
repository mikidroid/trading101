<?php
        $ref = $_GET['ref'];
        $coin = $_GET['coin'];
        //$secret = $_GET['secret'];
        //other post request
        $address = $_POST['address'];
        $paid_amount = $_POST['paid_amount'];
        $coin_value = $paid_amount[$coin];
        $usd_value = $paid_amount['USD'];
        $url = $_POST['url'];
        $status_code = $_POST['status_code'];
        $invoice_id = $_POST['invoice_id'];
        $payment_history = $_POST['payment_history'];
        $confirmations = $payment_history['confirmation'];

?>

<html>
 <head>
 
 </head>
  <body>
   <div>
    
    </div>
   <script>
    docReady();
    function docReady(){
     
      //load php POST and GET variables into JS object
      let data = {
        route:'/deposit/callback',
        url:'<?php echo "url=".$url; ?>',
        ref:'<?php echo "ref=".$ref; ?>',
        status_code:'<?php echo "status_code=".$status_code; ?>',
        invoice_id: '<?php echo "invoice_id=".$invoice_id; ?>',
        confirmations: '<?php echo "confirmations=".$confirmations; ?>',
        address: '<?php echo "address=".$address; ?>',
        coin_value: '<?php echo "coin_value=".$coin_value; ?>',
        usd_value: '<?php echo "usd_value=".$usd_value; ?>'
      };
      
      // Visit page with variables
      window.location.href=
       `${data.route}?${data.ref}&${data.url}&${data.invoice_id}&${data.status_code}&${data.confirmations}&${data.address}&${data.coin_value}&${data.usd_value}`
       ; 
    }
   </script>
  </body>
 
 </html>