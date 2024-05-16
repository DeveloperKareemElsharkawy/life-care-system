<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Rules\RuleActions;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use Auth;

final class RoleTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    //Messages informing success/error data is updated.
    public array $rolesIdsForDeletion = [];

    //Custom per page values
    public array $perPageValues = [10, 15, 30, 50, 100, 500];


    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
            'alertEvent',
            'ConfirmRemoveSystemRoles',
            'deleteConfirmed' => 'deleteSystemUsers'

        ]);
    }

    public function ConfirmRemoveSystemRoles($data)
    {

        if (count($this->checkboxValues) == 0 && !isset($data['role_id'])) {
            $this->dispatchBrowserEvent('NoSelectedItemsAlert', ['message' => 'You must select at least one item!']);
            return;
        }

        $systemUsersIds = isset($data['role_id']) ? [$data['role_id']] : $this->checkboxValues;

        $this->rolesIdsForDeletion = $systemUsersIds;

        $this->dispatchBrowserEvent('show-delete-confirmation', ['message' => 'You have selected IDs: ']);
    }

    public function deleteSystemUsers()
    {
        $ids = array_map(function ($value) {
            return intval($value);
        }, $this->rolesIdsForDeletion);
        Role::query()->whereIn('id', $ids)->delete();
        $this->rolesIdsForDeletion = [];
    }

    public function alertEvent($data)
    {
        $this->dispatchBrowserEvent('showAlert', $data);
    }


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
     * @return  Builder|null
     */
    public function datasource(): ?Builder
    {
        return Role::query()->withoutGlobalScope('active');
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
            ->addColumn('display_name')
            ->addColumn('description')
            ->addColumn('status')
            ->addColumn('admins_list', function (Role $role) {
                $admins = Admin::whereRoleIs($role->name)->get();

                $tags = '';
                foreach ($admins as $admin) {
                    $tags .= "<span class='tag fs-14 tag-view'>" . $admin->name . " </span> ";
                }

                return $tags;
            })
            ->addColumn('created_at_formatted', function (Role $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function (Role $model) {
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
                ->field('display_name')
                ->editOnClick(true)
                ->sortable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->searchable()
                ->makeInputText(),


            Column::add()
                ->title(trans('admin/datatable.description'))
                ->field('description')
                ->editOnClick(true)
                ->sortable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(trans('admin/datatable.admins_list'))
                ->field('admins_list'),

            Column::add()
                ->title(trans('admin/datatable.created_at'))
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title(trans('admin/datatable.updated_at'))
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->headerAttribute('datatable-header-txt', '')
                ->bodyAttribute('datatable-body-txt', '')
                ->makeInputDatePicker('updated_at'),

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
     * PowerGrid Role Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
//            Button::add('edit')
//                ->caption('<i class="fe fe-eye"  title="" data-bs-original-title="fe fe-eye" aria-label="fe fe-eye"></i>')
//                ->class('btn btn-icon btn-light')
//                ->route('admin.users.edit', ['user' => 'id']),
            Button::add('edit')
                ->caption('<i class="fe fe-edit"  title="" data-bs-original-title="fe fe-edit-3" aria-label="fe fe-edit-3"></i>')
                ->class('btn btn-icon btn-secondary')
                ->target('_self')
                ->route('admin.roles.edit', ['role_id' => 'id']),

            Button::add('destroy')
                ->caption('<svg style="width: 20px;height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>')
                ->class('btn btn-icon btn-danger')
                ->target('_self')
                ->route('admin.roles.edit', ['role_id' => 'id'])
                ->emit('ConfirmRemoveSystemRoles', ['role_id' => 'id']),

        ];
    }


    public function header(): array
    {
        $CreatNewBtnIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style=" margin: 2px; "> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path> </svg>';
        $DeleteSelectedBtnIcon = '<svg style="width: 19px; height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>';
        $buttons = [];

        if (Auth::user()->hasPermission('create-roles')) {
            $buttons[] = Button::add('create')
                ->caption($CreatNewBtnIcon . __('admin/datatable.buttons.c_role'))
                ->class('btn btn-success  btn-svgs btn-svg-white datatable-delete-btn')
                ->target('_self')
                ->route('admin.roles.create', []);

        }
        if (Auth::user()->hasPermission('delete-roles')) {
            $buttons[] = Button::add('bulk-delete')
                ->caption($DeleteSelectedBtnIcon . __('admin/datatable.buttons.general.bulk_delete'))
                ->class('btn btn-danger  btn-svgs btn-svg-white datatable-delete-btn')
                ->emit('ConfirmRemoveSystemRoles', []);

        }

        return $buttons;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Role Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
        return [

            Rule::button('edit')
                ->when(fn($role) => Auth::user()->hasPermission('update-roles') != true)
                 ->hide(),
            Rule::button('destroy')
                ->when(fn($role) => Auth::user()->hasPermission('delete-roles') != true)
                ->when(fn($role) => count(Admin::whereRoleIs($role->name)->get()))
                ->hide(),

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
     * PowerGrid Role Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data): bool
    {
        try {
            $updated = Role::query()->withoutGlobalScope('active')->findOrFail($data['id'])
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
