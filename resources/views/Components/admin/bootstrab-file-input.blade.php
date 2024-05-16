@push('styles')

     <style>
         .krajee-default.file-preview-frame{
             height: 100% !important;
             width: 95% !important;
         }
         .kv-file-content{
             height: 100% !important;
             width: 95% !important;
         }
         .kv-preview-data file-preview-video{
             height: 100% !important;
             width: 95% !important;
         }

         .krajee-default .file-footer-caption{
             margin-bottom: 0px !important;
         }
     </style>
@endpush


<div class="card">
    <div class="card-header">
        <div class="fs-16">الفديو</div>
    </div>

    <input id="input-uploader-v1" accept="video/mp4,video/x-m4v,video/*" name="{{$name}}" type="file" class="file" data-browse-on-zone-click="true">
</div>



@push('scripts_bottom')


    <script>
        $("#input-uploader-v1").fileinput({
            rtl: true,
            dropZoneEnabled: true,
            showUpload: false,
            showCaption: false,
            showDownload: true,
            previewSettings: {
                image: {width: "auto", height: "auto", 'max-width': "100%",'max-height': "100%"},
                html: {width: "100%", height: "100%", 'min-height': "480px"},
                text: {width: "100%", height: "100%", 'min-height': "480px"},
                office: {width: "100%", height: "100%", 'max-width': "100%", 'min-height': "480px"},
                gdocs: {width: "100%", height: "100%", 'max-width': "100%", 'min-height': "480px"},
                video: {width: "auto", height: "100%", 'max-width': "100%"},
                audio: {width: "100%", height: "30px"},
                flash: {width: "auto", height: "480px"},
                object: {width: "auto", height: "480px"},
                pdf: {width: "100%", height: "100%", 'min-height': "480px"},
                other: {width: "auto", height: "100%", 'min-height': "480px"}
            },
            theme: 'fa5',
            allowedFileExtensions: ['mp4'],
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,
            allowedFileTypes: [ 'video'],

            initialPreview: [
                "{{$defaultValue?? ""}}",

            ],
            initialPreviewConfig: [
                @if(isset($defaultValue))
                {
                    type: "video",
                    description: "<h5>The Video</h5> This is a representative description number three for this file.",
                    size: 375000,
                    filetype: "video/mp4",
                    caption: "KrajeeSample.mp4",
                    url: "{{$defaultValue?? ""}}",
                    key: 3,
                    downloadUrl: '{{$defaultValue?? ""}}', // override url
                    filename: 'KrajeeSample.mp4' // override download filename
                },
            ]
        @endif
        });
    </script>

@endpush
