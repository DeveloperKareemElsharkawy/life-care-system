<script>
    <?php
    if (!isset($form)) {
        $form = 'form';
    }
    if (!isset($on_start)) {
        $on_start = false;
    }
    if (!isset($auto_focus)) {
        $auto_focus = true;
    }
    ?>
    var validated = false;
    var buton_submit = false;
    var my_form = $('<?=$form?>');
    var on_start = '<?=$on_start?>';
    var auto_focus = '<?=$auto_focus?>';

    initialize();

    function initialize() {
        my_form.on('submit', function () {
            // console.log('submit');
            if (validated == true) {
                var $form = $(this);
                if ($form.data('submitted') === true) {
                    e.preventDefault();
                } else {
                    $form.data('submitted', true);
                }
                return true;
            } else {
                buton_submit = true;
                return validate();
            }
        });

        my_form.find("input[type=submit]").on('click', function (e) {
            e.preventDefault();
            buton_submit = true;
            validate();
        });

        my_form.find('.form-group').append('<div class="help-block with-errors "></div>');

        my_form.find(':input').each(function () {
            // $(this).on('change', function () {
            //     validate();
            // });

            $(this).keyup(function () {
                validate(this.id);
            });
        });

        if (on_start == '1') {
            validate();
        }

        // if (auto_focus) {
        //     $(':input:enabled:visible:first').focus();
        // }
    }


    function validate(elementId = null) {
        $('#submit_button').addClass('btn-loading');

        var data = my_form.serializeArray();

        for (var i = 0; i < data.length; i++) {
            item = data[i];
            if (item.name == '_method') {
                data.splice(i, 1);
            }
        }

        let myForm = document.getElementById('myform');
        let formData = new FormData(myForm);


        $.ajax({
            url: my_form.attr("action"),
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (!data.status && data.errors) {
                    var campos_error = [];

                    $.each(data.errors, function (key, data) {
                        key = key.replace('.', '_');

                        var campo = $('#' + key);
                        if (elementId && elementId === key) {
                            campo.addClass('is-invalid');
                            var father = campo.closest('.form-group');
                            father.removeClass('has-success');
                            father.addClass('has-error');
                            father.find('.help-block').html(data[0]);
                            father.find('.help-block').addClass('invalid-feedback');
                        } else if (!elementId) {
                            campo.addClass('is-invalid');
                            var father = campo.closest('.form-group');
                            father.removeClass('has-success');
                            father.addClass('has-error');
                            father.find('.help-block').html(data[0]);
                            father.find('.help-block').addClass('invalid-feedback');
                        }
                        campos_error.push(key);

                    });

                    var formParams = my_form.serializeArray();

                    my_form.find("input[type=file]").each(function (index, field) {
                        formParams.push({name: field.name, value: ''});
                        console.log('File name is ' + field.name);
                    });

                    $.each(formParams, function (i, field) {
                        var fieldNamestring = field.name;
                        var fieldName = fieldNamestring.replace('[]', '');
                        fieldName = fieldNamestring.replace('[', '_').replace(']', '');

                        if ($.inArray(fieldName, campos_error) === -1) {
                            var father = $('#' + fieldName).closest('.form-group');
                            $('#' + fieldName).removeClass('is-invalid');
                            $('#' + fieldName).addClass('is-valid');
                            father.removeClass('has-error');
                            father.addClass('has-success');
                            father.find('.help-block').html('');
                            father.find('.help-block').removeClass('invalid-feedback');
                        }
                    });

                    validated = false;
                    buton_submit = false;
                    $('#submit_button').removeClass('btn-loading');

                } else {

                    $.each(my_form.serializeArray(), function (i, field) {
                        var fieldNamestring = field.name;
                        var fieldName = fieldNamestring.replace('[]', '');
                        fieldName = fieldNamestring.replace('[', '_').replace(']', '');
                        var father = $('#' + fieldName).closest('.form-group');
                        father.removeClass('has-error');
                        father.addClass('has-success');
                        father.find('.help-block').html('');
                    });
                    $('#submit_button').removeClass('btn-loading');
                    validated = true;
                    if (buton_submit == true) {
                        my_form.submit();
                    }
                }
            },
            error: function (xhr) {
                // console.log(xhr.status);
            }
        });
        return false;
    }
</script>
