<div class="card">
    <div class="card-header">
        <div class="fs-16">{{trans('admin/datatable.'.$name)}}</div>
    </div>
    <div class="form-group p-2">
        <input type="file" name="{{$name}}" class="dropify input_field p-5"
               data-default-file="{{$defaultValue}}"
               data-height="180"/>
        <input type="hidden" id="{{$name}}">
    </div>
    <div class="video-preview" style="display: none;">
        <video controls width="180" height="180"></video>
    </div>
</div>

<script>
    // When a file is selected, display video preview if it's a video
    $('input[name="{{$name}}"]').on('change', function () {
        var fileInput = this;
        var videoPreview = $('.video-preview');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var file = fileInput.files[0];

                if (file.type.startsWith('video/')) {
                    // It's a video, display the preview
                    videoPreview.show();
                    videoPreview.find('video').attr('src', e.target.result);
                } else {
                    // It's not a video, hide the preview
                    videoPreview.hide();
                    videoPreview.find('video').attr('src', '');
                }
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>
