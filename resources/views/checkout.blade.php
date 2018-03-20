<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping with vuejs</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')  }}"/>
    <link rel="stylesheet" href="{{ mix('css/all.css')  }}"/>
</head>
<body>
<div class="container">
    <div style="display:none;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
    </div>
    <div class="page-header">
        <h1><a href="/shop">Shopping</a> / Check out page</h1>
    </div>
    <div id="app">
        <app></app>
    </div>

</div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">

        $(function () {
            var goToCartIcon = function($addTocartBtn){
                var $cartIcon = $(".my-cart-icon");
                var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
                $addTocartBtn.prepend($image);
                var position = $cartIcon.position();

                $image.animate({
                    top: position.top,
                    left: position.left
                }, 500 , "linear", function() {
                    $image.remove();
                });
            };

            $('.my-cart-btn').myCart({
                currencySymbol: '$',
                classCartIcon: 'my-cart-icon',
                classCartBadge: 'my-cart-badge',
                classProductQuantity: 'my-product-quantity',
                classProductRemove: 'my-product-remove',
                classCheckoutCart: 'my-cart-checkout',
                affixCartIcon: true,
                showCheckoutModal: true,
                numberOfDecimals: 2,
                afterAddOnCart: function(products, totalPrice, totalQuantity) {
                    console.log("afterAddOnCart", products, totalPrice, totalQuantity);
                },
                clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
                    console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
                }
            });
            $('.my-cart-icon').on('click', function(){
                $('#my-cart-modal').modal('hide');
            });

            $( ".my-cart-icon" ).trigger( "click" );
            $('#cart').val(localStorage.products);

            if( localStorage.products.length == 2 ) {
                window.location.href = '/shop';
            }
        });
    </script>
    <script src="{{ mix('js/checkout.js') }}"></script>
</body>
</html>