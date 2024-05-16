<div class="form-group">
    <label class="form-label" id="{{$name}}_label">@lang('admin/datatable.'.$label)</label>

    <div class="input-group">

        @if($groupWithHTML)
            <span class="input-group-text" id="inputGroupPrepend2">{!! $groupWithHTML !!}</span>
        @endif

        @if($groupWithText)
            <span class="input-group-text" id="inputGroupPrepend2">{{$groupWithText}}</span>
        @endif
        <input
            id="{{$name}}"
            value="{{$value}}"
            {{$readonly ? 'readonly' : ''}}
            {{$isRequired ? 'required' : ''}}
            min="0"
            step="any"
            placeholder="{{ $readonly != '1' ? trans('admin/datatable.input_placeholder', ['attribute' => trans('admin/datatable.'.$name)]) : ''}}"
            class="form-control input_field {{$class}}" type="number" name="{{$name}}">
        @if($symbol)
            <div class="input-group-text btn-primary">{{$symbol}}</div>
        @endif
    </div>
</div>
