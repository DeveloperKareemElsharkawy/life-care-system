/* Create Repeater */

$(document).ready(function () {
    'use strict';

    $('.repeater').repeater({
        defaultValues: {
            'textarea-input': 'foo',
            'text-input': 'bar',
            'select-input': 'B',
            'checkbox-input': ['A', 'B'],
            'radio-input': 'B'
        }, show: function () {
            $(this).slideDown();
        }, hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        }, ready: function (setIndexes) {

        }
    });

});


$(document).ready(function () {
    $('.mt-repeater-add').click(function () {
        $(".hasDatepicker").removeClass("hasDatepicker");
        $(".fk-datepicker").datepicker("destroy");

        $("#fk-datepicker").datepicker("update");

        $(".fk-datepicker").datepicker({
            changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '2000:2022'
        });
        $("#fk-datepicker").datepicker("update");
    })

});
