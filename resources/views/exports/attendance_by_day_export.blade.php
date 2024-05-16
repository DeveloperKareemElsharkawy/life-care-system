<table>


    <thead>
    <tr>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">#</th>
        <th width="22" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> العميل</th>
        <th width="22" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> رقم الموبايل</th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> القسم</th>
        <th width="25" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الخدمة</th>
        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">الدكتور</th>

        <th width="20" style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> تاريخ الحضور
        </th>
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

    @foreach($attendances as $attendance)
@if($attendance->sessionRecord)
        <tr>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $loop->iteration }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->session->user->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->session->user->phone }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendance->sessionRecord?->category->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->subCategory->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord?->doctor->name }}</td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->date->format('Y-m-d') }}</td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord->session_price }}
                جنيه
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord->sessions_debt_for_client }}
                جنيه
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord->sessions_debt_for_company }}
                جنيه
            </td>


            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendance->sessionRecord->discount_percentage_value }}
                %
            </td>

            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{$attendance->notes ?? 'لا يوجد'}}</td>


        </tr>
@endif
    @endforeach
    </tbody>

</table>
