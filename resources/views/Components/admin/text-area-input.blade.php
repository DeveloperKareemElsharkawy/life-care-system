<div class="form-group"><label class="form-label">{{trans('admin/datatable.'.$label)}} <span
            class="text-red">*</span></label>
    <textarea     autocomplete="off" aria-autocomplete="none" data-skip-name="true"
              class="form-control {{$class}}"
              id="{{$name}}"
              name="{{$name}}"
              rows="{{$rows}}"
              placeholder="{{trans('admin/datatable.input_placeholder', ['attribute' => trans('admin/datatable.'.$name)])}}"
              spellcheck="false"> {{$value}}</textarea>
</div>

