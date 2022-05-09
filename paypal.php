<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Villa - PayPal</title>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
</head>
<body>
    <div id="paypal-button-container">

    </div>

    <script>
        paypal.Buttons({
            style: {
                // color: 'blue',
                shape: 'pill'
                // label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '77.44' // Can also reference a variable or function
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(detalles) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', detalles);
                    // const transaction = detalles.purchase_units[0].payments.captures[0];
                    // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                });
            },
            onCancel: function(data){
                alert('Pago Cancelado')
                console.log(data)
            }
        }).render('#paypal-button-container')
    </script>
</body>
</html>