<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping with vuejs</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')  }}"/>
    <link rel="stylesheet" href="{{ mix('css/all.css')  }}"/>
    <style>
        .badge-notify{
            background:red;
            position:relative;
            top: -20px;
            right: 10px;
        }
        .my-cart-icon-affix {
            position: fixed;
            z-index: 999;
            top: 10px;
            right:0;
        }
    </style>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

<div class="page-header">
    <h1>Products
        <div style="float: right; cursor: pointer;">
            <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
        </div>
    </h1>
</div>

<div id="app">
    <app></app>
</div>

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
                $('.modal-footer').show();
            },
            clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {

            }
        });

        if( localStorage.products.length == 2 ) {
            $('.modal-footer').hide();
        }
    });
</script>
<script src="{{ mix('js/vue.js') }}"></script>
</body>
</html>