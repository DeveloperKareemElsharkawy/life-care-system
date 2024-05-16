@if(count($enabledFilters))
    <div class="expanel expanel-default m-0" style="padding: 10px;">
    <div class="tags">
            @foreach($enabledFilters as $field => $filter)
                <span class="tag" style="direction: ltr;">{{ $filter['label'] }}
    <a href="javascript:void(0)" wire:click.prevent="clearFilter('{{ $field }}')" class="tag-addon"><i
            class="fe fe-x"></i></a>
											</span>
            @endforeach
        </div>
        </div>
@endif




