<div class="form-group">
    <label class="form-label">@lang('admin/datatable.'.$label  ) <span
            class="text-red">*</span></label>
    <select name="{{$name}}" id="{{$name}}"
            {{$readonly ? 'readonly' : ''}}


            class="form-control SlectBox {{$class}}">
        <option disabled @selected($selected == null) value=""> إختيار @lang('admin/datatable.'.$label  ) </option>

        @if($keyOfValue && $keyOfOption)
            @foreach($options as  $option)
                <option @selected($selected == $option->id) value="{{$option[$keyOfOption]}}">{{$option[$keyOfValue]}}</option>
            @endforeach
        @else
            @foreach($options as $key => $option)
                <option @selected($selected == $key) value="{{$key}}">{{$option}}</option>
            @endforeach
        @endif

    </select>
    <input id="{{$name}}" type="hidden">

</div>
