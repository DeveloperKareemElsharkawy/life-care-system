<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;


final class CountryTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;
    public array $CountryIdsForDeletion = [];

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Country>|null
     */
    public function datasource(): ?Builder
    {
        return Country::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('name_en', function ($data) {
                return $data->getTranslation('name', 'en');
            })

            ->addColumn('created_at_formatted', function (Country $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function (Country $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title(trans('admin/datatable.name_ar'))
                ->field('name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(trans('admin/datatable.name_en'))
                ->field('name_en'),

            Column::add()
                ->title(trans('admin/datatable.created_at'))
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
            ,
            Column::add()
                ->title(trans('admin/datatable.updated_at'))
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
            ,
            ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('<i class="fe fe-edit"  title="" data-bs-original-title="fe fe-edit-3" aria-label="fe fe-edit-3"></i>')
                ->class('btn btn-icon btn-secondary')
                ->target('_self')
                ->route('admin.countries.edit', ['country_id' => 'id']),

            Button::add('destroy')
                ->caption('<svg style="width: 20px;height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>')
                ->class('btn btn-icon btn-danger')
                ->target('_self')
                ->emit('ConfirmRemoveCountry', ['CountryIds' => 'id']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Header Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */
    public function header(): array
    {
        $CreatNewBtnIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style=" margin: 2px; "> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path> </svg>';
        $DeleteSelectedBtnIcon = '<svg style="width: 19px; height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>';

        return [
            Button::add('bulk-sold-out')
                ->caption($CreatNewBtnIcon . __('admin/datatable.buttons.c_country'))
                ->class('btn btn-success  btn-svgs btn-svg-white datatable-delete-btn')
                ->target('_self')
                ->route('admin.countries.create', []),

            Button::add('bulk-sold-out')
                ->caption($DeleteSelectedBtnIcon . __('admin/datatable.buttons.general.bulk_delete'))
                ->class('btn btn-danger  btn-svgs btn-svg-white datatable-delete-btn')
                ->target('_self')
                ->emit('ConfirmRemoveCountry', []),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | getListeners
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
            'alertEvent',
            'ConfirmRemoveCountry',
            'deleteConfirmed' => 'deleteCountry',

        ]);
    }

    public function ConfirmRemoveCountry($data)
    {
        if (count($this->checkboxValues) == 0 && !isset($data['CountryIds'])) {
            $this->dispatchBrowserEvent('NoSelectedItemsAlert', ['message' => 'You must select at least one item!']);
            return;
        }

        $systemUsersIds = isset($data['CountryIds']) ? [$data['CountryIds']] : $this->checkboxValues;

        $this->CountryIdsForDeletion = $systemUsersIds;

        $this->dispatchBrowserEvent('show-delete-confirmation', ['message' => 'You have selected IDs: ']);
    }

    public function deleteCountry()
    {
        $ids = array_map(function ($value) {
            return intval($value);
        }, $this->CountryIdsForDeletion);
        Country::query()->whereIn('id', $ids)->delete();
        $this->CountryIdsForDeletion = [];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Country Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($country) => $country->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid Country Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Country::query()
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
