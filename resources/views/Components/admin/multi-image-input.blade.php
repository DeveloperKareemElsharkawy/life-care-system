<label class="form-label">{{trans('admin/datatable.'.$galleryNameKey)}} <span
        class="text-red">*</span></label>

<div class="row" data-type="imagesloader"
     data-errorformat="Accepted file formats" data-errorsize="Maximum size accepted"
     data-errorduplicate="File already loaded"
     data-errormaxfiles="Maximum number of images you can upload"
     data-errorminfiles="Minimum number of images to upload"
     data-modifyimagetext="Modify immage">

    <!-- Progress bar -->
    <div class="col-12 order-1 mt-2">
        <div data-type="progress" class="progress"
             style="height: 25px; display:none;">
            <div data-type="progressBar"
                 class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                 role="progressbar" style="width: 100%;">Load in progress...
            </div>
        </div>
    </div>

    <!-- Model -->
    <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2"
         style="max-width:250px; display:none;">

        <div class="ratio-box text-center" data-type="image-ratio-box">
            <img data-type="noimage"
                 class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded multi-image-default-bg"
                 src="{{ asset('admin_asset/images/svgs/photo-camera-gray.svg') }}"
                 style="cursor:pointer;">
            <div data-type="loading" class="img-loading"
                 style="color:#218838; display:none;">
                <span class="fa fa-2x fa-spin fa-spinner"></span>
            </div>
            <img data-type="preview"
                 class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded"
                 src="" style="display: none; cursor: default;">
            <span class="badge badge-pill badge-success p-2 w-50 main-tag"
                  style="display:none;">Main</span>
        </div>

        <!-- Buttons -->
        <div data-type="image-buttons" class="row justify-content-center mt-2">
            <button data-type="add"
                    class="btn btn-outline-success outline-success multi-image-add-button"
                    type="button"><span
                    class="fa fa-camera mr-2 upload-icon me-2"></span>@lang('admin/datatable.images_gallery_input.add')
            </button>
            <button data-type="btn-modify" type="button"
                    class="btn btn-outline-success m-0 outline-success-mod multi-image-modify-button"
                    data-toggle="popover" data-placement="right"
                    style="display:none;">
                <span class="fa fa-edit mr-2 upload-icon me-2"></span>@lang('admin/datatable.images_gallery_input.modify')
            </button>
        </div>
    </div>

    <!-- Popover operations -->
    <div data-type="popover-model" style="display:none">
        <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
            <div class="row">
                <div class="col p-0">
                    <button data-operation="main"
                            class="btn btn-block btn-success btn-sm rounded-pill  main-image-btn btn-succ main-btn"
                            type="button"><span
                            class="fa fa-angle-double-up mr-2"></span>@lang('admin/datatable.images_gallery_input.main_image')
                    </button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6 p-0 pr-1">
                    <button data-operation="left"
                            class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                            type="button"> <span
                            class="fa fa-angle-right mr-2"></span> @lang('admin/datatable.images_gallery_input.right_image')
                    </button>
                </div>
                <div class="col-6 p-0 pl-1">
                    <button data-operation="right"
                            class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                            type="button"> @lang('admin/datatable.images_gallery_input.left_image') <span
                            class="fa fa-angle-left ml-2"></span></button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6 p-0 pr-1">
                    <button data-operation="rotateanticlockwise"
                            class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                            type="button"><span
                            class="fa fa-rotate-left mr-2 "></span> @lang('admin/datatable.images_gallery_input.rotate_image')
                    </button>
                </div>
                <div class="col-6 p-0 pl-1">
                    <button data-operation="rotateclockwise"
                            class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                            type="button"> @lang('admin/datatable.images_gallery_input.rotate_image') <span
                            class="fa fa-rotate-right ml-2"></span></button>
                </div>
            </div>
            <div class="row mt-2">
                <button data-operation="remove"
                        class="btn btn-outline-danger btn-sm btn-block del-btn"
                        type="button"><span class="fa fa-times mr-2"></span>Remove
                </button>
            </div>
        </div>
    </div>

</div>

<div class="form-group row">
    <div class="input-group">
        <!--Hidden file input for images-->
        <input id="files" type="file" name="{{$galleryNameKey}}[]" data-button="" multiple=""
               style="display:none;">
    </div>
</div>


@push('scripts_bottom')

    @javascript('gallery_name_key', $galleryNameKey)
    @javascript('max_files', $maxImages)

    @javascript('auctionImagesList',  $images)


    <script src="{{ URL::asset('admin_asset/js/jquery.imagesloader.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/imagesloader.js') }}"></script>
@endpush
