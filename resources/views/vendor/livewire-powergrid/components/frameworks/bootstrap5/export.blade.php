<div>
    @if($exportActive)
        <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span>
                      Export
                    </span>
            </button>
            <ul class="dropdown-menu">
                @if(in_array('excel',$exportType))
                    <li class="d-flex">
                        <div class="dropdown-item">
                            Excel
                            <a class="text-black-50 fs-15 text-indigo" wire:click="exportToXLS()" href="#">
                                @lang('livewire-powergrid::datatable.labels.all')
                            </a>
                            @if($checkbox)
                                /
                                <a class="text-black-50 fs-15 text-secondary" wire:click="exportToXLS(true)" href="#">
                                    @lang('livewire-powergrid::datatable.labels.selected')
                                </a>
                            @endif
                        </div>
                    </li>
                @endif
                @if(in_array('csv',$exportType))
                    <li class="d-flex">
                        <div class="dropdown-item">
                            Csv
                            <a class="text-black-50 fs-15 text-indigo" wire:click="exportToCsv()" href="#">
                                @lang('livewire-powergrid::datatable.labels.all')
                            </a>
                            @if($checkbox)
                                /
                                <a class="text-black-50 fs-15 text-secondary" wire:click="exportToCsv(true)" href="#">
                                    @lang('livewire-powergrid::datatable.labels.selected')
                                </a>
                            @endif
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>
