<div class="form-group mt-4">
    <label class="form-label mb-5">@lang('admin/datatable.'.$name) <span
            class="text-red">*</span></label>
    <div class="material-switch">
        <input id="{{$name}}" name="{{$name}}"
               type="checkbox" @checked($value == 1)>
        <label for="{{$name}}" class="label-success"></label>
        @if($details)
            <span class="custom-switch-description">{{$details}}</span>
        @endif
    </div>


</div>
