$(document).ready(function () {

    var destinationsLoop = 1;

    // Check if the element with the specified ID exists
    var element = document.getElementById("destinationsLoop");

    if (element) {
        // If the element exists, get its value and parse it as an integer
        destinationsLoop = parseInt(element.value, 10);
    }


    $("body").on("click", "#add-destination", function () {

        $(".destination-item-0").clone().appendTo(".destinations-group").removeClass("destination-item-0")
            .removeClass("d-none").addClass("destination-item-" + destinationsLoop)
            .find("input[type='text']").val("");

        $('.destination-item-' + destinationsLoop + ' .delete-destination-button').removeClass("d-none");

        $('.destination-item-' + destinationsLoop + ' .id').attr("name", "categories[" + destinationsLoop + "][id]").attr("id", "categories[" + destinationsLoop + "][id]");
        $('.destination-item-' + destinationsLoop + ' .profit_percentage').attr("name", "categories[" + destinationsLoop + "][profit_percentage]").attr("id", "categories[" + destinationsLoop + "][profit_percentage]");
        $('.destination-item-' + destinationsLoop + ' .examination_profit_percentage').attr("name", "categories[" + destinationsLoop + "][examination_profit_percentage]").attr("id", "categories[" + destinationsLoop + "][examination_profit_percentage]");

        destinationsLoop++;

    });

    $("body").on("click", ".delete-destination-button", function () {
        $(this).parent().remove();
    });
});




$(document).ready(function () {
    $("#percent_input").inputmask('Regex', {regex: "^[1-9][0-9]?$|^100$"});
    $("#car_capital").inputmask('Regex', {regex: "^[0-9]{1,8}(\\.\\d{1,2})?$"});
});
