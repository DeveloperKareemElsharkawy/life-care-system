<div class="form-group">
    <label for="name" class="form-label">{{trans('admin/datatable.'.$name)}} <span
            class="text-red">*</span></label>

    <div class="input-group">

        @if($groupWith)
            <span class="input-group-text" id="inputGroupPrepend2">{{$groupWith}}</span>
        @endif

        <input   autocomplete="off" aria-autocomplete="none" type="text" name="{{$name}}"
               class="form-control   input_field"
               placeholder="{{trans('admin/datatable.input_placeholder', ['attribute' => trans('admin/datatable.'.$name)])}}"
               id="{{$name}}"
               value="{{$value}}">
    </div>
</div>


