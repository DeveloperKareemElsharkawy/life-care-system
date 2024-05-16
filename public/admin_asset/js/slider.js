$(document).ready(function () {
    $('#url_target').hide();
    $('#worker_target').hide();
    $('#category_target').hide();

    var targetValue = document.getElementById('target').value;

    $('#' + targetValue + '_target').show();

    $('#target').on('change', function () {
        switch (this.value) {
            case 'url':
                $('#url_target').show();
                $('#worker_target').hide();
                $('#category_target').hide();

                break;
            case 'category':
                $('#url_target').hide();
                $('#worker_target').hide();
                $('#category_target').show();
                break;
            case 'worker':
                $('#url_target').hide();
                $('#worker_target').show();
                $('#category_target').hide();
                break;
        }
    });
});
