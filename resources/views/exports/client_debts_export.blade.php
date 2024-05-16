<table>

    @php
        $clientSessionsEarnings = 0;
        $cashEarnings = 0;
        $visaEarnings = 0;
        $totalEarnings = 0;
        $totalDebts = 0;
    @endphp

    @foreach($sessionsRecords as $record)

        @php
            $clientSessionsDebts = 0;
            $sessionPayments = 0;

        @endphp

        <thead>
        <tr>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">#</th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> القسم</th>
            <th width="25" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الخدمة</th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الدكتور</th>

            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة </th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة للعميل</th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة للشركة</th>
            <th width="30" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">  عدد الجلسات المتعاقد عليها</th>

            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> نسبة التحمل</th>

            <th width="25" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">إجمالي مديونية العميل </th>
            <th width="25" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">إجمالي مديونية الشركة </th>


            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">  عدد الإيصالات</th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الحضور</th>
            <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الملاحظات</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $loop->iteration }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $record->category->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->subCategory->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->doctor->name }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->session_price }} جنيه</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->sessions_debt_for_client }} جنيه</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->sessions_debt_for_company }} جنيه</td>


            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->sessions_count ?? 0 }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->discount_percentage_value }} %</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->sessions_debt_for_client * $record->attendees_count }}  جنيه</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->sessions_debt_for_company * $record->attendees_count }} جنيه</td>



            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->receipt_count ?? 0 }}</td>




            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $record->attendees_count ?? 0 }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{$attendance->notes ?? 'لا يوجد'}}</td>



            @php
                $clientSessionsDebts += $record->sessions_debt_for_client * $record->attendees_count; // Increment $cashEarnings for each cash payment
                $clientSessionsEarnings += $record->sessions_debt_for_client * $record->attendees_count; // Increment $cashEarnings for each cash payment
            @endphp
        </tr>


        @if(count($record->payments))

        <tr>

            <th></th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> التاريخ</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الدفعة  </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> نوع الدفع	  </th>


            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الموظف</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> رقم الإيصال	</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">النوع</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الملاحظات</th>
        </tr>

        @foreach($record->payments as $payment)

            <tr>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">  </td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $payment->date }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">جنيه {{ $payment->payment }} </td>
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

        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي مديونيه هذه الجلسة  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $clientSessionsDebts }} </td>
        </tr>

        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">   مديونات هذه الجلسة </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $clientSessionsDebts - $sessionPayments }} </td>
        </tr>

        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">   المتبقي للجلسات القادمة  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $sessionPayments - $clientSessionsDebts }} </td>
        </tr>

        @php
            $totalDebts += max(0, $clientSessionsDebts - $sessionPayments);
        @endphp
        <tr></tr>
        <tr></tr>
        <tr></tr>
        </tbody>
    @endforeach

        <tfoot>
        <tr></tr>
        <tr></tr>
        <tr></tr>

        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي مستحقات  الجلسات  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $clientSessionsEarnings }} </td>
        </tr>

        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي أرباح الجلسات المحصلة كاش  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $cashEarnings }} </td>
        </tr>


        <tr style="background-color: #d9d9d9;">
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي أرباح الجلسات المحصلة Visa  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $visaEarnings }} </td>
        </tr>


        <tr>
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> إجمالي المدفوع   </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 17px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $totalEarnings }} جنيه </td>
        </tr>

        <tr>
            <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> إجمالي المديونات المتبقية  </td>
            <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $totalDebts }} جنيه</td>
        </tr>



        </tfoot>
</table>
