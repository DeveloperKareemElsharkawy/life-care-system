@extends('admin-panel.layouts.master')
@section('style-bottom')
    <style>

    </style>
@endsection

@section('content')
    <div class="side-app">
        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i class="fe fe-home me-2"
                                                                                                 aria-hidden="true"></i>{{trans('admin/dashboard.dashboard')}}
                </a></li>
            <li class="breadcrumb-item1 active"> {{trans('admin/dashboard.menus.all_sessions')}}</li>
        </ol>

        <div class="row">

            <div class="col-12">
                <div class="card datable-custom ">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-2">
                                <x-admin.text-input name="name"></x-admin.text-input>
                            </div>

                            <div class="col-2">
                                <x-admin.text-input name="mobile"></x-admin.text-input>
                            </div>

                            <div class="col-2">
                                <x-admin.drop-down-input name="doctor_id" label="doctor_id" label="session_doctor"
                                                         key-of-value="name" key-of-option="id"
                                                         :options="$doctors"></x-admin.drop-down-input>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <x-admin.drop-down-input name="contract_type"
                                                         :options="[
                                        'cash' => 'كاش',
                                        'contract' => 'تعاقد',
                                        ]"></x-admin.drop-down-input>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <x-admin.drop-down-input name="status"
                                                         :options="[
                                        'pending' => 'قيد المراجعه',
                                        'onProgress' => 'مستمره',
                                        'finished' => 'منتهية',
                                        ]"></x-admin.drop-down-input>
                            </div>

                            <div class="col-6">
                                <x-admin.text-area-input name="notes"></x-admin.text-area-input>
                            </div>

                            <div class="col-sm-1 col-md-1 mt-6">
                                <!-- Search button with Font Awesome icon -->
                                <button type="submit" class="btn btn-primary search-btn">
                                    <i class="fa fa-search"></i> بحث
                                </button>
                            </div>
                            <div class="col-sm-1 col-md-1 mt-6">
                                <!-- Reset button with Font Awesome 4.6 icon -->
                                <button type="button" class="btn btn-secondary reset-btn">
                                    <i class="fa fa-refresh"></i> اعاده الفلتر
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">

            <div class="col-12">
                <div class="card datable-custom ">
                    <div class="table-responsive">
                        <livewire:admin.sessions-table/>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.1.57/js/jquery.inputmask.js"></script>
    <script src="{{ URL::asset('admin_asset/js/sessions-repeater.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/jquery.imagesloader.js') }}"></script>


    <script src="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.js')}}"></script>
    <script src="{{ URL::asset('admin_asset/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{ URL::asset('admin_asset/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/formelementadvnced.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/form-elements.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/js-repeater.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/workers-custom.js') }}"></script>


    <script src="{{ URL::asset('admin_asset/js/file-upload.js') }}"></script>
    <script>


        function emptyArrayByInputNames(array, namesToEmpty) {
            return array.filter(item => !namesToEmpty.includes(item));
        }

        // Assuming you have multiple elements with the class 'modal-open'
        var myButtons = document.querySelectorAll(".modal-open-btn");

        // Add click event listener to each button
        myButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                console.log("Button clicked!");

                var sessionID = button.dataset.sessionId;

                // Initialize Datepicker for dynamic input
                $(".attends_date_" + sessionID).datepicker({
                    changeYear: true,
                    changeMonth: true,
                    clearBtn: true,
                    startDate: new Date(),
                    dateFormat: 'yy-mm-dd',
                    yearRange: '2021:2024'
                });

                $(".payment_date_" + sessionID).datepicker({
                    changeYear: true,
                    changeMonth: true,
                    clearBtn: true,
                    startDate: new Date(),
                    dateFormat: 'yy-mm-dd',
                    yearRange: '2021:2024'
                });

                // Example usage:
                var inputNames = ["payment", "receipt_number", "notes"];

// Loop through each input name
                inputNames.forEach(function (name) {
                    // Select input elements with the current name
                    var inputs = document.querySelectorAll('input[name="' + name + '"]');

                    // Loop through selected input elements
                    inputs.forEach(function (input) {
                        // Clear the value of each input element
                        input.value = '';
                    });
                });


            });
        });


        $('.attendanceForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            var $form = $(this);
            var formData = $form.serialize();
            var closepopup = $(".btn-close");

            // Disable the submit button to prevent multiple submissions
            $form.find(':submit').prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: $form.attr('action'),
                data: formData, // Original form data
                success: function (response) {
                    if (response.status === false) {
                        // If the user confirms, force update
                        Swal.fire({
                            title: 'تأكيد',
                            text: response.message,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'نعم، متابعة!',
                            cancelButtonText: 'لا، إلغاء'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If the user confirms, force update
                                forceUpdate();
                            } else {
                                // If the user cancels, enable submit button
                                $form.find(':submit').prop('disabled', false);
                            }
                        });
                    } else {
                        // If status is true or not provided, close popup and emit filterData event
                        closepopup.click();
                        window.livewire.emit('filterData', {});
                    }
                },
                error: function (error) {
                    console.error(error);
                },
                complete: function () {
                    // Re-enable the submit button after the request is complete
                    $form.find(':submit').prop('disabled', false);
                }
            });

            function forceUpdate() {
                // Modify formData to include force=true
                formData += '&force=true';
                // Resubmit the form with force=true
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: formData, // Modified form data with force=true
                    success: function (response) {
                        // Handle success response after force update
                        closepopup.click();
                        window.livewire.emit('filterData', {});
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        });


        $('.transactionsForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission
            var $form = $(this);
            var formData = $form.serialize();
            var closepopup = $(".btn-close");

            // Disable the submit button to prevent multiple submissions
            $form.find(':submit').prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: $form.attr('action'),
                data: formData,
                success: function (response) {
                    closepopup.click();
                    window.livewire.emit('filterData', {});
                },
                error: function (error) {
                    console.error(error);
                },
                complete: function () {
                    // Re-enable the submit button after the request is complete
                    $form.find(':submit').prop('disabled', false);
                }
            });
        });


        $(document).ready(function () {
            $('.search-btn').click(function () {

                var textarea = document.getElementById('notes');

                var notes = textarea.value;
                var name = $('input[name="name"]').val();
                var doctorId = $('select[name="doctor_id"]').val();
                var status = $('select[name="status"]').val();
                var mobile = $('input[name="mobile"]').val();
                var contract_type = $('select[name="contract_type"]').val();

                // Prepare the data object
                var searchData = {
                    name: name,
                    doctor_id: doctorId,
                    mobile: mobile,
                    status: status,
                    contract_type: contract_type,
                    notes: notes,
                };

                // Emit filterData event with search data
                window.livewire.emit('filterData', searchData);
            });

            // Reset button functionality
            $('.reset-btn').click(function () {
                // Reset form fields
                $('input[name="name"]').val('');
                document.getElementById('mobile').value = '';
                $('select[name="doctor_id"]').val('');
                $('select[name="status"]').val('');
                $('select[name="contract_type"]').val('');

                // Emit filterData event with empty data
                window.livewire.emit('filterData', {});
            });
        });

        // Select the <span> element by its class
        const spanElement = document.querySelector('.d-flex');

        // Check if the <span> element exists
        if (spanElement) {
            // Remove the 'd-flex' class
            spanElement.classList.remove('d-flex');
        }
    </script>
@endpush
