<div class="form-group">
    <h1 class="fs-18">{{ __('admin/datatable.'.$label) }}   </h1>
    <select name="{{ $name }}" id="{{ $name }}" {{ $readonly ? 'readonly' : '' }} required class="form-control form-control-lg select2 {{ $class }}">
        <option disabled @if ($selected == null) selected @endif value="">اختيار {{ __('admin/datatable.'.$label) }}</option>

        @if ($keyOfValue && $keyOfOption)
            @foreach ($options as $option)
                <option @if ($selected == $option->id) selected @endif value="{{ $option[$keyOfOption] }}">{{ $option[$keyOfValue] }}</option>
            @endforeach
        @else
            @foreach ($options as $key => $option)
                <option @if ($selected == $key) selected @endif value="{{ $key }}">{{ $option }}</option>
            @endforeach
        @endif
    </select>
</div>
