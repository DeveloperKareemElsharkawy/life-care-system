<div class="dt--top-section">
    <div class="row">

        <div class="col-6 col-sm-3 d-flex justify-content-sm-start mt-3">


            @include(powerGridThemeRoot().'.export')

            @includeIf(powerGridThemeRoot().'.toggle-columns')



            @include(powerGridThemeRoot().'.loading')

        </div>
        <div class="col-3 col-sm-5 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-4">
            <div>
                <x-livewire-powergrid::actions-header
                    :theme="$theme"
                    :actions="$this->headers"/>
            </div>
        </div>
        <div class="col-6 col-sm-4 d-flex justify-content-sm-end mt-sm-0 mt-2">
            @include(powerGridThemeRoot().'.filter')
        </div>

    </div>
</div>

@include(powerGridThemeRoot().'.batch-exporting')

@include(powerGridThemeRoot().'.enabled-filters')




