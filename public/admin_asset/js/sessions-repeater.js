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

        $('.destination-item-' + destinationsLoop + ' .main_category_id')
            .attr("name", "sessions[" + destinationsLoop + "][main_category_id]")
            .attr("id", "sessions[" + destinationsLoop + "][main_category_id]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .category_id')
            .attr("name", "sessions[" + destinationsLoop + "][category_id]")
            .attr("id", "sessions[" + destinationsLoop + "][category_id]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .doctor_id')
            .attr("name", "sessions[" + destinationsLoop + "][doctor_id]")
            .attr("id", "sessions[" + destinationsLoop + "][doctor_id]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .session_price')
            .attr("name", "sessions[" + destinationsLoop + "][session_price]")
            .attr("id", "sessions[" + destinationsLoop + "][session_price]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .discount_percentage_value')
            .attr("name", "sessions[" + destinationsLoop + "][discount_percentage_value]")
            .attr("id", "sessions[" + destinationsLoop + "][discount_percentage_value]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .sessions_count')
            .attr("name", "sessions[" + destinationsLoop + "][sessions_count]")
            .attr("id", "sessions[" + destinationsLoop + "][sessions_count]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .total')
            .attr("name", "sessions[" + destinationsLoop + "][total]")
            .attr("id", "sessions[" + destinationsLoop + "][total]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .notes')
            .attr("name", "sessions[" + destinationsLoop + "][notes]")
            .attr("id", "sessions[" + destinationsLoop + "][notes]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .receipt_count')
            .attr("name", "sessions[" + destinationsLoop + "][receipt_count]")
            .attr("id", "sessions[" + destinationsLoop + "][receipt_count]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .total_sessions_debt_for_company_session')
            .attr("name", "sessions[" + destinationsLoop + "][total_sessions_debt_for_company_session]")
            .attr("id", "sessions[" + destinationsLoop + "][total_sessions_debt_for_company_session]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .total_sessions_debt_for_client_session')
            .attr("name", "sessions[" + destinationsLoop + "][total_sessions_debt_for_client_session]")
            .attr("id", "sessions[" + destinationsLoop + "][total_sessions_debt_for_client_session]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .sessions_debt_for_company')
            .attr("name", "sessions[" + destinationsLoop + "][sessions_debt_for_company]")
            .attr("id", "sessions[" + destinationsLoop + "][sessions_debt_for_company]")
            .val('');

        $('.destination-item-' + destinationsLoop + ' .sessions_debt_for_client')
            .attr("name", "sessions[" + destinationsLoop + "][sessions_debt_for_client]")
            .attr("id", "sessions[" + destinationsLoop + "][sessions_debt_for_client]")
            .val('');


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
