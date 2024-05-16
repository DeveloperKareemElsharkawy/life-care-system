<table style="border-collapse: collapse; width: 100%; border: 1px solid #dddddd;">
    <thead>
    <tr colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
        <td colspan="10" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">   الجلسات </td>

    </tr>
    <tr style="background-color: red; color: white;">
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">#</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">إسم العميل</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">رقم العميل</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">القسم</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">الخدمة</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">سعر الخدمة</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">عدد مرات الحضور</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">إجمالي سعر الجلسات</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">نسبة الربح</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">الربح</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">تاريخ أخر حضور</th>
        <!-- Add more columns as needed -->
    </tr>
    </thead>
    <tbody>
    @php
        $totalEarnings = 0;
        $totalSessionsCount = 0;
    @endphp
    @foreach($sessionRecords as $sessionRecord)
        <tr>
            <td  style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $loop->iteration }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->session->user->name }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->session->user->phone }}</td>
            <td width="30" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->category->name }}</td>
            <td width="20" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->subCategory->name }}</td>
            <td width="20" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->session_price }} جنيه</td>
            <td width="30" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->attendees_count }}</td>
            <td width="30" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->total }} جنيه</td>
            <td width="20" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->profit_percentage }}%</td>
            <td width="10" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->profit }} جنيه</td>
            <td width="10" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $sessionRecord->profit }} جنيه</td>
            <!-- Add more columns as needed -->
        </tr>
        @php
            $totalEarnings += $sessionRecord->profit;
            $totalSessionsCount += $sessionRecord->attendees_count;
        @endphp
    @endforeach
    </tbody>
    <tr></tr>
    <tr></tr>
    <thead>
    <tr colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
        <td colspan="10" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">   الكشوفات </td>

    </tr>
    <tr style="background-color: red; color: white;">
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">#</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">إسم العميل</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">  القسم</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px"> سعر الكشف</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px"> نسبه الربح من الكشف</th>
        <th style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16pxbackground: lightgray;font-size: 16px">الربح من الجلسة</th>

        <!-- Add more columns as needed -->
    </tr>
    </thead>
    <tbody>
    @php
        $totalExaminationEarnings = 0;
     @endphp
    @foreach($examinations as $examination)
        <tr>
            <td  style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $loop->iteration }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $examination->name }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $examination->category?->name }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $examination->examination_price }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $examination->doctor_examination_percentage }}</td>
            <td width="40" style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{  ($examination->doctor_examination_percentage / 100) * $examination->examination_price }}</td>

            <!-- Add more columns as needed -->
        </tr>
        @php
            $totalExaminationEarnings += ($examination->doctor_examination_percentage / 100) * $examination->examination_price;

        @endphp
    @endforeach
    </tbody>
    <tfoot>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">   الدكتور </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $doctor->name}}</td>
    </tr>

    <tr>
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> أرباح شهر </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $month}}</td>
    </tr>

    <tr>
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 17px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">عدد الجلسات </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 17px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $totalSessionsCount }} جلسة </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي أرباح الجلسات   </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $totalEarnings }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي أرباح الكشوفات   </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $totalExaminationEarnings }} </td>
    </tr>

    <tr style="background-color: #d9d9d9;">
        <td colspan="3" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">إجمالي الأرباح   </td>
        <td colspan="2" style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;"> جنيه {{ $totalEarnings  + $totalExaminationEarnings}} </td>
    </tr>

    </tfoot>
</table>
