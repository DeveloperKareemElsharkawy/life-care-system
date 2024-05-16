$(document).ready(function () {

    var ownersLoop = 1;
    $("body").on("click", "#add-owner", function () {

        $(".owner-item-0").clone().appendTo(".owners-group").removeClass("owner-item-0")
            .removeClass("d-none").addClass("owner-item-" + ownersLoop)
            .find("input[type='text']").val("");

        $('.owner-item-' + ownersLoop + ' .delete-owner-button').removeClass("d-none");

        $('.owner-item-' + ownersLoop + ' .owner_id_input').attr("name", "owner_id[" + ownersLoop + "]");
        $('.owner-item-' + ownersLoop + ' .owner_id_input').attr("name", "owners[" + ownersLoop + "][owner_id]");
        $('.owner-item-' + ownersLoop + ' .percent_input').attr("name", "owners[" + ownersLoop + "][percentage]");


        ownersLoop++;

        $(".percent_input").inputmask('Regex', {regex: "^[1-9][0-9]?$|^100$"});

    });

    $("body").on("click", ".delete-owner-button", function () {
        $(this).parent().remove();
    });
});


$(document).ready(function () {
    $("#percent_input").inputmask('Regex', {regex: "^[1-9][0-9]?$|^100$"});
    $("#car_capital").inputmask('Regex', {regex: "^[0-9]{1,8}(\\.\\d{1,2})?$"});
});
