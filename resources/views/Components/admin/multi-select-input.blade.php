<div class="form-group">
    <label class="form-label">@lang('admin/datatable.'.$name)<span
            class="text-red">*</span></label>
    <select class="form-control select2"
            name="{{$name}}[]"
            data-placeholder="{{trans('admin/datatable.input_placeholder', ['attribute' => trans('admin/datatable.'.$name)])}}"
            multiple>

        @if($keyOfOption && $keyOfValue)
            @foreach($options as $option)
                <option @selected(in_array($option[$keyOfOption],$selectedValues)) value="{{$option[$keyOfOption]}}">
                    {{$option[$keyOfValue]}}
                </option>
            @endforeach
        @else
            @foreach($options as $option)
                <option @selected(in_array($option,$selectedValues)) value="{{$option}}">
                    {{$option}}
                </option>
            @endforeach
        @endif
    </select>

    <input id="{{$name}}" type="hidden">

</div>
