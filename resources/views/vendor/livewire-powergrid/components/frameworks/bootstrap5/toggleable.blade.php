<div x-data="pgToggleable({
            id: '{{ $row->{$primaryKey} }}',
            tableName: '{{ $tableName }}',
            field: '{{ $column->field }}',
            toggle: {{ $row->{$column->field} }},
            trueValue: '{{ $column->toggleable['default'][0] }}',
            falseValue:  '{{ $column->toggleable['default'][1] }}',
         })">
    @if($column->toggleable['enabled'])
        <div class=" material-switch pull-center" style="display: flex; justify-content: center;">
            <input x-on:click="save()" id="Switch{{ $row->{$primaryKey} }}"
                   class="form-check-input"
                   {{ $row->{$column->field} == 1 ? 'checked' : '' }}
                   type="checkbox">
            <label for="Switch{{ $row->{$primaryKey} }}" class="label-primary">
            </label>
        </div>
    @else
        <div class="text-center">
            @if($row->{$column->field} == 0)
                <div x-text="falseValue"
                     style="padding-top: 0.1em; padding-bottom: 0.1rem"
                     class="badge bg-danger">
                </div>
            @else
                <div x-text="trueValue"
                     style="padding-top: 0.1em; padding-bottom: 0.1rem"
                     class="badge bg-success">
                </div>
            @endif
        </div>
    @endif
</div>

