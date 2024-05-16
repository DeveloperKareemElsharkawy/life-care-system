<table style="border-collapse: collapse; width: 100%; border: 1px solid #dddddd;">
    <thead>
    @php
        $clientsCount = 0;
        $totalContractPayments = 0;
        $totalPayments = 0;
        $totalCashPayments = 0;
        $cashEarnings = 0;
        $totalEarnings = 0;
        $examinationCashEarnings = 0;
        $examinationVisaEarnings = 0;
        $visaEarnings = 0;

    @endphp

    <tr>
        <td colspan="8"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
            العملاء / الجلسات
        </td>
        <td colspan="8"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">

        </td>
    </tr>
    <tr></tr>
    @foreach($transactions as $payment)
        <tr style="background-color: red; color: white;">
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">#</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">الإسم رباعي</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">رقم العميل</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">نوع العميل</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> الشركة</th>
            {{--        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">الخدمات</th>--}}
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">المبلغ المدفوع
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">مديونية العميل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> إجمالي المبلغ
                المدفوع
                من العميل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">المبلغ المتبقي
                للجلسات
                القادمة
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">رقم الإيصال</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">الموظف المسئول
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">التاريخ</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>

    @php
        $clientSessionsDebts = 0;
        $sessionPayments = 0;

    @endphp

    <tr>
        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $loop->iteration }}</td>
        <td width="40"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->session->user->name }}</td>
        <td width="30"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->session->user->phone }}</td>
        <td width="20"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->session->user->contract_type == 'contract' ? 'تعاقد' : 'كاش' }}</td>
        <td width="20"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->session->user?->insurance_company?->name ?? ' -- ' }}</td>
        <td width="20"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->payment }}
            جنيه
        </td>
        <td width="20"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->user_wallet['client_debt'] }}
            جنيه
        </td>
        <td width="35"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->user_wallet['paid_amount'] }}
            جنيه
        </td>
        <td width="35"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->user_wallet['remaining_for_client'] }}
            جنيه
        </td>
        <td width="35"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->receipt_number }}</td>
        <td width="35"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->admin?->name }}</td>
        <td width="35"
            style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $payment->date }}</td>
        <!-- Add more columns as needed -->
    </tr>

    @php
        $sessionRecords = \App\Models\SessionRecord::query()->whereHas('attendees')->where('session_id',$payment->session_id)->with('attendees','doctor')->withCount('attendees')->get();
    @endphp

    @if(count($sessionRecords))
        <tr></tr>

        <tr>
            <td colspan="8"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
                الجلسات
            </td>
            <td colspan="8"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">

            </td>
        </tr>

        <tr>

            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"></th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> #</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> القسم</th>

            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> الخدمة</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> سعر الجلسة
                للعميل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> سعر الجلسة
                للشركة
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> الحضور</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> إجمالي سعر
                الجلسات للعميل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> إجمالي سعر
                الجلسات للشركة
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> الدكتور
            </th>

        </tr>


        @foreach($sessionRecords as $sessionRecord)
            <tr>
                <td></td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{$sessionRecord->id}}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $sessionRecord->category->name }}</td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $sessionRecord->subCategory->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $sessionRecord->sessions_debt_for_client}}
                    جنيه
                </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $sessionRecord->sessions_debt_for_company}}
                    جنيه
                </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{$sessionRecord->attendees_count}}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $sessionRecord->sessions_debt_for_client * $sessionRecord->attendees_count}}
                    جنيه
                </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $sessionRecord->sessions_debt_for_client * $sessionRecord->attendees_count}}
                    جنيه
                </td>
                <td width="40"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $sessionRecord->doctor->name }}</td>


            </tr>
            <tr></tr>



            @if(count($sessionRecord->payments))
                <tr></tr>

                <tr>
                    <td colspan="8"
                        style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
                        التعاملات المادية
                    </td>
                    <td colspan="8"
                        style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">

                    </td>
                </tr>
                <tr>

                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"></th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> التاريخ
                    </th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الدفعة</th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> نوع الدفع
                    </th>


                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الموظف</th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> رقم
                        الإيصال
                    </th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">النوع</th>
                    <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الملاحظات
                    </th>
                </tr>

                @foreach($sessionRecord->payments as $payment)

                    <tr>

                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"></td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->date }}</td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">
                            جنيه {{ $payment->payment }} </td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->type == 'Deposit' ? 'إيداع' : 'سحب'  }}</td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->admin->name }}</td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->receipt_number }}</td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->transaction_type == 'cash' ? 'كاش' : 'visa' }}</td>
                        <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{$payment->notes ?? 'لا يوجد'}}</td>

                        @if($payment->transaction_type == 'cash' && $payment->type == 'Deposit')
                            @php
                                $cashEarnings += $payment->payment; // Increment $cashEarnings for each cash payment
                                $totalEarnings += $payment->payment; // Increment $cashEarnings for each cash payment
                                $sessionPayments += $payment->payment; // Increment $cashEarnings for each cash payment
                            @endphp

                        @elseif($payment->transaction_type != 'cash' && $payment->type == 'Deposit')
                            @php
                                $visaEarnings += $payment->payment; // Increment $cashEarnings for each cash payment
                                $totalEarnings += $payment->payment; // Increment $cashEarnings for each cash payment
                                $sessionPayments += $payment->payment; // Increment $cashEarnings for each cash payment
                            @endphp

                        @endif


                    </tr>
                @endforeach

            @endif

        @endforeach
        <tr></tr>

    @endif

    @php

        $totalPayments += $payment->payment;
        $clientsCount++;

    @endphp
    <tr>
        <td colspan="30"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
        </td>
    </tr>

    <tr></tr>

    </tbody>

    @endforeach

    <tr>
        <td colspan="8"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
            العملاء / الكشوفات
        </td>
        <td colspan="8"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #aba3a3; color: #ffffff; font-weight: bold;">
        </td>
    </tr>
    <tr>

        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">#</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">الإسم رباعي</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">رقم العميل</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px">نوع العميل</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> الشركة</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> سعر الكشف</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> نوع الدفع </th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> رقم الإيصال </th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> ملاحظات الكشف</th>
    </tr>

    @foreach($users as $user)

        <tr>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"></td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->phone }}</td>
            <td width="20"
                style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $user->contract_type == 'contract' ? 'تعاقد' : 'كاش' }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user?->insurance_company?->name ?? ' -- ' }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">
                جنيه {{ $user->examination_price }} </td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->payment_type == 'cash' ? 'كاش' : 'visa' }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->receipt_number }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{$user->examination_notes ?? 'لا يوجد'}}</td>

            @if($user->payment_type == 'cash')
                @php
                    $examinationCashEarnings += $user->examination_price; // Increment $cashEarnings for each cash payment
                @endphp

            @else
                @php
                    $examinationVisaEarnings += $user->examination_price; // Increment $cashEarnings for each cash payment
                @endphp

            @endif


        </tr>
    @endforeach


    <tr></tr>

    <tfoot>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="3"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            عدد العملاء
        </td>
        <td colspan="2"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $clientsCount}}
            عميل
        </td>
    </tr>

    <tr>
        <td colspan="3"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            توريدات يوم
        </td>
        <td colspan="2"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $day}}</td>
    </tr>


    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة كاش  </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $examinationCashEarnings + $cashEarnings }} </td>
    </tr>


    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة Visa  </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $examinationVisaEarnings }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            الإجمالي
        </td>
        <td colspan="2"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            جنيه {{ $totalPayments + $totalContractPayments }} </td>
    </tr>
    </tfoot>
</table>
