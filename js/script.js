jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    $(".modalbutton").click(function() {
        $("#deleteModalCenter").modal("show");
    });

    $(".modaldismiss").click(function() {
        $("#deleteModalCenter").modal("hide");
    });


});