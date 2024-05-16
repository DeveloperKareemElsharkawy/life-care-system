<table style="border-collapse: collapse; width: 100%; border: 1px solid #dddddd;">
    <thead>
    @php
    $sessionsCashPayments = 0;
    $sessionsVisaPayments = 0;

    $examinationCashEarnings = 0;
    $examinationVisaEarnings = 0;

    $clientsCount = [];
    $totalContractPayments = 0;
    $totalCashPayments = 0;
    $cashEarnings = 0;
    $totalEarnings = 0;

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
    <tr>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">#</th>
        <th width="22" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> العميل</th>
        <th width="22" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> رقم الموبايل</th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> القسم</th>
        <th width="25" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الخدمة</th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الدكتور</th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">    المبلغ المدفوع
        </th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: lightgray;font-size: 16px"> نوع الدفع </th>

        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة
        </th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة
            للعميل
        </th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة
            للشركة
        </th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">نسبة الخصم
        </th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الملاحظات
        </th>
    </tr>
    </thead>
    <tbody>

    @foreach($transactions as $attendance)
        @php
            $clientsCount[] = $attendance->session->user->id;
        @endphp
        @if($attendance->sessionRecord)

            @if($attendance->transaction_type == 'cash')
                @php
                    $sessionsCashPayments += $attendance->payment; // Increment $cashEarnings for each cash payment
                @endphp

            @else
                @php
                    $sessionsVisaPayments += $attendance->payment; // Increment $cashEarnings for each cash payment
                @endphp
            @endif


            <tr>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $loop->iteration }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->session->user->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->session->user->phone }}</td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->sessionRecord?->category->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->subCategory->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->doctor->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->payment }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->transaction_type == 'cash' ? 'كاش' : 'visa' }}</td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->session_price }}
                    جنيه
                </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->sessions_debt_for_client }}
                    جنيه
                </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->sessions_debt_for_company }}
                    جنيه
                </td>


                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord->discount_percentage_value }}
                    %
                </td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{$attendance->notes ?? 'لا يوجد'}}</td>


            </tr>
        @endif
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
        @php
            $clientsCount[] = $user->id;
        @endphp
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
            style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ count(array_unique($clientsCount))}}
            عميل
        </td>
    </tr>

    @if(isset($day))
        <tr>
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                توريدات يوم
            </td>
            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $day}}</td>
        </tr>
    @else
        <tr>
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                توريدات شهر
            </td>
            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $month}}</td>
        </tr>
    @endif



    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة كاش للجلسات </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">  {{ $sessionsCashPayments }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة Visa للجلسات </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">  {{ $sessionsVisaPayments }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة كاش للكشوفات </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">  {{ $examinationCashEarnings }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي التوريدات المحصلة Visa للكشوفات </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">  {{ $examinationVisaEarnings }} </td>
    </tr>


    <tr style="background-color: #d9d9d9;">
        <td colspan="3"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            الإجمالي
        </td>
        <td colspan="2"
            style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
            جنيه {{   $examinationCashEarnings + $examinationVisaEarnings + $sessionsCashPayments + $sessionsVisaPayments}} </td>
    </tr>
    </tfoot>
</table>
