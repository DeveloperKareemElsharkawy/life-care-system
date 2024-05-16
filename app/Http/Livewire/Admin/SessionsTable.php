<?php

namespace App\Http\Livewire\Admin;

use App\Models\InsuranceCompanyCategory;
use App\Models\Session;
use App\Models\User;
use App\Services\Admin\Session\SessionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;


final class SessionsTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;
    public array $SessionIdsForDeletion = [];

    public ?string $status = null;
    public ?string $name = null;
    public ?int $doctor_id = null;
    public ?string $contract_type = null;
    public ?string $mobile = null;
    public ?string $notes = null;

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
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Session>|null
     */
    public function datasource(): ?Builder
    {
        $tenDaysAgo = Carbon::now()->subDays(10);


        return Session::query()->latest()->with('records')->latest()
            ->when($this->status == 'missed', function ($query) use ($tenDaysAgo) {
                return $query->whereDoesntHave('attendances', function ($q) use ($tenDaysAgo) {
                    $q->where('date', '>=', now()->subDays(7));
                })->has('attendances');
            })

        ->when($this->status != 'missed' && $this->status, function ($query) {
                return $query->where('sessions.status', $this->status);
            })
            ->when($this->doctor_id, function ($query) {
                $doctorId = $this->doctor_id;
                return $query->whereHas('records', function ($q) use ($doctorId) {
                    $q->where('doctor_id', $doctorId);
                });
            })
            ->when($this->contract_type, function ($query) {
                $contractType = $this->contract_type;
                return $query->whereHas('user', function ($q) use ($contractType) {
                    $q->where('contract_type', $contractType);
                });
            })
            ->when($this->mobile, function ($query) {
                $phone = $this->mobile;
                return $query->whereHas('user', function ($q) use ($phone) {
                    $q->where('phone', $phone)->orWhere('phone_2', $phone);
                });
            })
            ->when(strlen($this->notes) > 1, function ($query) {
                $notes = $this->notes;
                 return $query->whereHas('user', function ($q) use ($notes) {
                    $q->where('examination_notes', $notes);
                });
            })
            ->when($this->name != 'missed' && $this->name, function ($query) {
                $name = $this->name;
                return $query->where(function ($query) use ($name) {
                    $query->where('clients.name', 'LIKE', '%' . $name . '%')
                        ->orwhereRaw('clients.name REGEXP "' . $this->sql_text_to_regx($name) . '"');
                });
            })
            ->join('users as clients', 'sessions.user_id', '=', 'clients.id')
            ->select('sessions.*', 'clients.name as client_name');
    }


    function sql_text_to_regx($string)
    {
        $alamat = array("+", "=", "-", "_", ")", "(", "*", "&", "^", "%", "$", "#", "@", "!", "/", "\\", "|", ">", "<", "?", "؟");
        $alamat_change = "";

        $alef = array("ا", "أ", "آ", "إ");
        $alef_change = "@@@";
        $alef_last_change = "(ا|أ|آ|إ)";

        $yeh = array("ى", "ي");
        $yeh_change = "(ي|ى)";

        $teh = array("ة", "ه");
        $teh_change = "(ة|ه)";

        $abd = array("عبد {$alef_change}ل", "عبد{$alef_change}ل");
        $abd_change = "(عبدال|عبد ال)";

        $alfLam = array("{$alef_change}ل{$alef_change}", "{$alef_change}");
        $alfLam_change = "(ا|أ|آ|إلا|أ|آ|إ|ا|أ|آ|إ)";

        $all_changes = array($alamat, $alef, $yeh, $teh, $abd, $alfLam, $alef_change);
        $replaces = array($alamat_change, $alef_change, $yeh_change, $teh_change, $abd_change, $alfLam_change, $alef_last_change);

        $id = 0;
        foreach ($all_changes as $change) {
            $string = str_replace($change, $replaces[$id], $string);
            $id++;
        }
        return $string;
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
            ->addColumn('uuid_format', function (Session $model) {
                return '<div class="d-flex">
                <div class="mt-1">
                    <a class="btn-link fs-16" target="_blank" href="' . route('admin.sessions.show', ['session_id' => $model->id]) . '">#' . $model->uuid . '</a>
                </div>
            </div>';
//                return '<div class="pro-user-username mb-1 font-weight-bold"><a class="btn-link fs-16" target="_blank">' . $model->user->name . '</a>  </div>' . '<br>' . '<span class="avatar avatar-xxl bradius" style="background-image: url(' . $model->user->imageUrl . ')"></span>';
            })
            ->addColumn('name')
            ->addColumn('client', function (Session $model) {


                return '<div class="d-flex">
                    <span class="avatar brround avatar-md d-block" style="background-image: url(' . $model->user->imageUrl . ')"></span>
                    <div class="ms-3 mt-1">
                        <h6 class="mb-0 font-weight-bold mt-2">
                            ' . $model->user->name . '
                             </h6>
                    </div>
                </div>';
//                return '<div class="pro-user-username mb-1 font-weight-bold"><a class="btn-link fs-16" target="_blank">' . $model->user->name . '</a>  </div>' . '<br>' . '<span class="avatar avatar-xxl bradius" style="background-image: url(' . $model->user->imageUrl . ')"></span>';
            })
//            ->addColumn('doctor', function (Session $model) {
//                return '<div class="d-flex">
//                    <span class="avatar brround avatar-md d-block" style="background-image: url(' . $model->doctor->imageUrl . ')"></span>
//                    <div class="ms-3 mt-1">
//                        <h6 class="mb-0 font-weight-bold mt-2">
//                            ' . $model->doctor->name . '
//                             </h6>
//                    </div>
//                </div>';
//            })
            ->addColumn('contract_type', function (Session $model) {
                return trans('admin/datatable.' . $model->contract_type);
            })
            ->addColumn('sessions', function (Session $sessionModel) {
                $session = Session::query()->with('records','transactions.sessionRecord.subCategory','transactions.sessionRecord.category', 'attendances')->find($sessionModel->id);

                // Instantiate the SessionService
                $sessionService = new \App\Services\Admin\Session\SessionService();

                // Call the getSessionData method from the SessionService
                $sessionData = $sessionService->getSessionData($sessionModel->id);


                return view('admin-panel.sessions.partials.data_tables_sessions', ['session' => $session, 'sessionPayments' => $sessionData]);
            })
            ->addColumn('contract_price', function (Session $session) {
                return view('admin-panel.sessions.partials.session_price', [
                    'session' => $session, // Assuming you pass $session to the view
                ]);
            })
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function (Session $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
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

//            Column::add()
//                ->title('الرقم')
//                ->field('uuid_format', 'uuid')
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputText(),

//            Column::add()
//                ->title(trans('admin/datatable.client'))
//                ->field('client', 'clients.name')
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputText(),
//

            Column::add()
                ->title('الجلسات')
                ->field('sessions')->bodyAttribute('no-flex', ''),


//            Column::add()
//                ->title('التعاملات الماديه')
//                ->field('contract_price'),

//            Column::add()
//                ->title(trans('admin/datatable.created_at'))
//                ->field('created_at_formatted', 'created_at')
//                ->searchable()
//                ->sortable()
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputDatePicker('created_at'),

//            Column::add()
//                ->title(trans('admin/datatable.discount_value'))
//                ->field('discount_value')
//                ->sortable()
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputText(),
//
//            Column::add()
//                ->title(trans('admin/datatable.contract_final_total'))
//                ->field('contract_final_total')
//                ->sortable()
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputText(),

//            Column::add()
//                ->title(trans('admin/datatable.created_at'))
//                ->field('created_at_formatted', 'created_at')
//                ->searchable()
//                ->sortable()
//                ->headerAttribute('datatable-header-txt', '')
//                ->bodyAttribute('datatable-body-txt', '')
//                ->makeInputDatePicker('created_at'),

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
                ->caption('<i class="fe fe-eye"  title="" data-bs-original-title="fe fe-eye" aria-label="fe fe-eye"></i>')
                ->class('btn btn-icon btn-green')
                ->target('_blank')
                ->route('admin.sessions.show', ['session_id' => 'id']),

            Button::add('edit')
                ->caption('<i class="fe fe-edit"  title="" data-bs-original-title="fe fe-edit-3" aria-label="fe fe-edit-3"></i>')
                ->class('btn btn-icon btn-secondary')
                ->target('_self')
                ->route('admin.sessions.edit', ['session_id' => 'id']),

            Button::add('destroy')
                ->caption('<svg style="width: 20px;height: 20px;" viewBox="0 0 24 24"> <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /> </svg>')
                ->class('btn btn-icon btn-danger')
                ->target('_self')
                ->emit('ConfirmRemoveSession', ['SessionIds' => 'id']),
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
                ->caption($CreatNewBtnIcon . __('admin/datatable.buttons.c_session'))
                ->class('btn btn-success  btn-svgs btn-svg-white datatable-delete-btn')
                ->target('_self')
                ->route('admin.sessions.create', []),

            Button::add('bulk-sold-out')
                ->caption($DeleteSelectedBtnIcon . __('admin/datatable.buttons.general.bulk_delete'))
                ->class('btn btn-danger  btn-svgs btn-svg-white datatable-delete-btn')
                ->target('_self')
                ->emit('ConfirmRemoveSession', []),
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
            'ConfirmRemoveSession',
            'deleteConfirmed' => 'deleteSession',
            'filterData' => 'applyFilter', // Listen for 'filterData' and call 'applyFilter' method
        ]);
    }

    public function applyFilter($data)
    {

        $this->status = $data['status'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->doctor_id = $data['doctor_id'] ?? null;
        $this->contract_type = $data['contract_type'] ?? null;
        $this->mobile = $data['mobile'] ?? null;
        $this->notes = $data['notes'] ?? null;
    }

    public function ConfirmRemoveSession($data)
    {
        if (count($this->checkboxValues) == 0 && !isset($data['SessionIds'])) {
            $this->dispatchBrowserEvent('NoSelectedItemsAlert', ['message' => 'You must select at least one item!']);
            return;
        }

        $systemUsersIds = isset($data['SessionIds']) ? [$data['SessionIds']] : $this->checkboxValues;

        $this->SessionIdsForDeletion = $systemUsersIds;

        $this->dispatchBrowserEvent('show-delete-confirmation', ['message' => 'You have selected IDs: ']);
    }

    public function deleteSession()
    {
        $ids = array_map(function ($value) {
            return intval($value);
        }, $this->SessionIdsForDeletion);
        Session::query()->whereIn('id', $ids)->delete();
        $this->SessionIdsForDeletion = [];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Session Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($session) => $session->id === 1)
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
     * PowerGrid Session Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Session::query()
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
