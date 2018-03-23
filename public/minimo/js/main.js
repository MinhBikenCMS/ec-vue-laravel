$(document).ready(function() {
    $(".open-hamburger-menu").click(function() {
        if( $(".hamburger-menu").is(":visible") ) {
            $(".hamburger-menu").hide();
        } else {
            $(".hamburger-menu").show();
        }
    });
});