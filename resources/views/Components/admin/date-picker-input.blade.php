<div class="form-group">
    <label class="form-label">@lang('admin/datatable.'.$label )</label>
    <div class="input-group">
        <input  autocomplete="off" aria-autocomplete="none" name="{{$name}}" class="form-control datepicker {{$dateTimeFormat}} date_input {{$name}}_input {{$class}}" data-name="{{$name}}"
               placeholder="MM/DD/YYYY"
                {{$isRequired ? 'required' : ''}}
                value="{{$value}}"
               type="text">
    </div>
    <input id="{{$name}}" type="hidden">
</div>
