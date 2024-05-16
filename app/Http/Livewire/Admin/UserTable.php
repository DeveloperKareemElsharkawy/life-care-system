<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Folder;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Exportable;

final class UserTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public array $UsersIdsForDeletion = [];

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    //Custom per page values
    public array $perPageValues = [10, 15, 30, 50, 100, 500];

    public $startDate;
    public $endDate;
    public $state;
    public $isTopWorker;

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

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
            'alertEvent',
            'ConfirmRemoveUsers',
            'ViewModelInfo',
            'deleteConfirmed' => 'deleteUsers'

        ]);
    }

    public function ConfirmRemoveUsers($data)
    {
        if (count($this->checkboxValues) == 0 && !isset($data['user_id'])) {
            $this->dispatchBrowserEvent('NoSelectedItemsAlert', ['message' => 'You must select at least one item!']);
            return;
        }

        $systemUsersIds = isset($data['user_id']) ? [$data['user_id']] : $this->checkboxValues;

        $this->UsersIdsForDeletion = $systemUsersIds;

        $this->dispatchBrowserEvent('show-delete-confirmation', ['message' => 'You have selected IDs: ']);
    }

    public function ViewModelInfo()
    {
        $this->dispatchBrowserEvent('view-model-info');
    }

    public function deleteUsers()
    {
        $ids = array_map(function ($value) {
            return intval($value);
        }, $this->UsersIdsForDeletion);
        User::query()->whereIn('id', $ids)->delete();
        $this->UsersIdsForDeletion = [];
    }

    public function alertEvent($data)
    {
        $this->dispatchBrowserEvent('showAlert', $data);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {

        return User::query()->where('contract_type','contract')
            ->when($this->startDate, function ($query) {
                return $query->where('created_at', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                return $query->where('created_at', '<=', $this->endDate);
            })
            ->when($this->state, function ($query) {
                return $query->where('state_id', $this->state);
            })
            ->when($this->isTopWorker, function ($query) {
                $query->whereHas('favorites')->withCount('favorites')->orderByDesc('favorites_count');
            })
             ->latest();
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
        return [
            'folders' => [
                'id',
                'user_id',
                'name_ar',
                'name_en'
            ]
        ];
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
            ->addColumn('image', function (User $model) {
                return '<span class="avatar avatar-xxl bradius" style="background-image: url(' . $model->imageUrl . ')"></span>';
            })
            ->addColumn('insurance_company', function (User $model) {
                return $model->insurance_company->name;
            })
            ->addColumn('email')
            ->addColumn('mobile')
            ->addColumn('created_at_formatted', function (User $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function (User $model) {
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
                ->title(trans('admin/datatable.name'))
                ->field('name')
                ->sortable()
                ->searchable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->makeInputText(),


            Column::add()
                ->title(trans('admin/datatable.avatar'))
                ->field('image')
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', ''),

            Column::add()
                ->title(trans('admin/datatable.mobile'))
                ->field('phone')
                ->sortable()
                ->searchable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->clickToCopy(true, 'Copy name to clipboard')
                ->makeInputText(),


            Column::add()
                ->title(trans('admin/datatable.phone_2'))
                ->field('phone_2')
                ->sortable()
                ->searchable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->clickToCopy(true, 'Copy name to clipboard')
                ->makeInputText(),



            Column::make(trans('admin/datatable.company'), 'insurance_company', 'insurance_company_id')
                ->makeInputSelect(InsuranceCompany::query()->get(), 'name', 'insurance_company_id'),


            Column::add()
                ->title(trans('admin/datatable.examination_price'))
                ->field('examination_price')
                ->sortable()
                ->searchable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->clickToCopy(true, 'Copy name to clipboard')
                ->makeInputText(),



            Column::add()
                ->title(trans('admin/datatable.created_at'))
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->makeInputDatePicker('created_at'),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [

//            Button::add('edit')
//                ->caption('<i class="fa fa-users"  title="" data-bs-original-title="fe fe-eye-3" aria-label="fe fe-eye-3"></i>')
//                ->class('btn btn-icon btn-light')
//                ->target('_self')
//                ->route('admin.contacts-list.index', ['user_id' => 'id']),

//            Button::add('edit')
//                ->caption('<i class="fe fe-eye"  title="" data-bs-original-title="fe fe-eye-3" aria-label="fe fe-eye-3"></i>')
//                ->class('btn btn-icon btn-success')
//                ->target('_self')
//                ->route('admin.users.show', ['user_id' => 'id']),

            Button::add('edit')
                ->caption('<i class="fe fe-edit"  title="" data-bs-original-title="fe fe-edit-3" aria-label="fe fe-edit-3"></i>')
                ->class('btn btn-icon btn-secondary')
                ->target('_self')
                ->route('admin.contract-users.edit', ['user_id' => 'id']),

            Button::add('destroy')
                ->caption('<svg style="width: 20px;height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>')
                ->class('btn btn-icon btn-danger')
                ->target('_self')
                ->emit('ConfirmRemoveUsers', ['user_id' => 'id']),

//            Button::add('view')
//                ->caption('<svg style="width: 20px;height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>')
//                ->class('btn btn-icon btn-info  modal-info')
//                 ->emit('ViewModelInfo', []),
        ];
    }


    public function header(): array
    {
        $CreatNewBtnIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style=" margin: 2px; "> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path> </svg>';
        $DeleteSelectedBtnIcon = '<svg style="width: 19px; height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>';

        return [
            Button::add('bulk-sold-out')
                ->caption($CreatNewBtnIcon . __('admin/datatable.buttons.c_user'))
                ->class('btn btn-success  btn-svgs btn-svg-white datatable-delete-btn')
                ->route('admin.contract-users.create', []),

            Button::add('bulk-sold-out')
                ->caption($DeleteSelectedBtnIcon . __('admin/datatable.buttons.general.bulk_delete'))
                ->class('btn btn-danger  btn-svgs btn-svg-white datatable-delete-btn')
                ->emit('ConfirmRemoveUsers', []),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, Rule>
     */


    public function actionRules(): array
    {
        return [


            Rule::checkbox()
                ->when(function ($user) {
                    return $user->id == 1;
                })
                ->hide(),
            //Hide button edit for ID 1
//            Rule::button('edit')
//                ->when(fn($user) => $user->id === 1)
//                ->hide(),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid User Update.
     *
     * @param array<string,string> $data
     */

    public function update(array $data): bool
    {
        try {
            $updated = User::query()->findOrFail($data['id'])
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
            'success' => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        $this->dispatchBrowserEvent('show-update-notification', ['type' => $status, 'message' => $message]);

        return (is_string($message)) ? $message : 'Error!';
    }

}
