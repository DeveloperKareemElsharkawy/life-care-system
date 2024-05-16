<div class="row clients destination-item-0 mb-5">

    <div class="col-sm-4 col-md-4">
        <x-admin.drop-down-input label="main_category_id"
                                 name="sessions[0][main_category_id]"
                                 class="main_category_id"
                                 :options="$categories" key-of-option="id"
                                 key-of-value="name"></x-admin.drop-down-input>
    </div>


    <div class="col-sm-4 col-md-4">
        <x-admin.drop-down-input label="category_id"
                                 name="sessions[0][category_id]"
                                 class="category_id"
                                 :options="[]"
                                 key-of-option="id"
                                 key-of-value="name"></x-admin.drop-down-input>
    </div>



    <div class="col-sm-3 col-md-3">
        <x-admin.drop-down-input name="sessions[0][doctor_id]"  label="doctor_id" class="doctor_id"
                                 key-of-value="name" key-of-option="id"
                                 :options="$doctors"></x-admin.drop-down-input>
    </div>

    <div class="col-sm-4 col-md-4">
        <x-admin.number-input  symbol="جنيه"  label="session_price" name="sessions[0][session_price]"
                               class="session_price"></x-admin.number-input>
        <p class="old_price">  </p>

    </div>

    <div class="col-sm-4 col-md-4">
        <x-admin.number-input  symbol="%"  label="discount_percentage_value" label="discount"
                               name="sessions[0][discount_percentage_value]"
                               class="discount_percentage_value"></x-admin.number-input>
    </div>




    <div class="col-sm-4 col-md-4">
        <x-admin.number-input  symbol="جنيه"  label="sessions_debt_for_client_v2" name="sessions[0][sessions_debt_for_client]"
                               class="sessions_debt_for_client"></x-admin.number-input>
        <p class="old_price">  </p>

    </div>


    <div class="col-sm-6 col-md-6">
        <x-admin.number-input label="sessions_count" class="sessions_count"
                              name="sessions[0][sessions_count]"/>
    </div>


    <div class="col-sm-6 col-md-6">
        <x-admin.number-input  symbol="جنيه"  label="total_sessions_debt_for_client_session" class="total_sessions_debt_for_client_session" disabled="1"
                               name="sessions[0][total_sessions_debt_for_client_session]"/>
    </div>


    <div class="col-sm-10 col-md-10">
        <x-admin.text-area-input rows="4" label="notes" class="notes" class="notes"
                                 name="sessions[0][notes]"/>
    </div>

    <div class="col-sm-1 col-md-1 d-none delete-destination-button">
        <button type="button" id="delete-destination-0"
                class="delete-destination btn btn-icon btn-md mt-6 btn-danger">
            <i
                class="fe fe-trash "></i></button>
    </div>

    <div class="card-header" style=" min-height: 5px; "></div>
</div>
