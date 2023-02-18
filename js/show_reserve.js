$(document).ready(function () {
    $("head").append("<meta name='viewport' content="
        + ($.cookie("switchScreen") == 1 ?
            "'width=1024'" :
            "'width=device-width, initial-scale=1, maximum-scale=1'")
        + " />");
    $("#item_button, #customer_button").click(function () {
        $.cookie("switchScreen", $(this).attr("id") == "btnPC" ? 1 : 0);
        location.reload();
        return false;
    });
});