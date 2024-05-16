<table style="border-collapse: collapse; width: 100%; border: 1px solid #dddddd;">
    @php
        $totalCompaniesDebt = 0;
        $clients = [];
        $totalSessionsCount = 0;
            $iterationCount = 0; // Initialize a counter variable

    @endphp
    @foreach($companies as $company)
        @if(!count($company->attendence))
            @continue
        @else

            @php
                $iterationCount++;

            @endphp
        @endif

        <thead>
        <tr style="background-color: red; color: white;">
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px">#</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px">إسم الشركة</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px">رقم الموبايل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px"></th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px"> عدد الجلسات
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px"></th>
            {{--        <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px">الخدمات</th>--}}
            <th style="border: 1px solid #dddddd; padding: 8px;background: #cfbbbb;font-size: 16px">إجمالي مديونية
                الشركة
            </th>

        </tr>
        </thead>
        <tbody>

        <tr>
            <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $iterationCount }}</td>
            <td width="40"
                style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $company->name }}</td>
            <td width="40"
                style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $company->mobile }}</td>
            <td width="20"></td>

            <td width="40"
                style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $company->attendence_count }}</td>
            <td width="20"></td>
            <td width="40"
                style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $company->debt }}</td>

            <!-- Add more columns as needed -->
        </tr>


        <tr>

            <th></th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الإسم رباعي
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> رقم الموبايل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> القسم</th>

            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> الخدمة</th>

            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة</th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> نسبة التحمل</th>

            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> سعر الجلسة
                للعميل
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px"> مديونية
للشركة
            </th>
            <th style="border: 1px solid #dddddd; padding: 8px;background: #dfc4c4;font-size: 16px">
                التاريخ
            </th>

        </tr>


        @foreach($company->attendence as $attendence)
            <tr>
                <td></td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendence->session->user->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendence->session->user->phone }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $attendence->sessionRecord->category->name }}</td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendence->sessionRecord->subCategory->name }}</td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendence->sessionRecord->session_price}}
                    جنيه
                </td>
                <td width="25"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">  {{ $attendence->sessionRecord->discount_percentage_value}}
                    %
                </td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">{{ $attendence->sessionRecord->sessions_debt_for_client}}
                    جنيه
                </td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $attendence->sessionRecord->sessions_debt_for_company}}
                    جنيه
                </td>
                <td width="30"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $attendence->date->format('Y-m-d')}}
                </td>
            </tr>

            @php


                $totalCompaniesDebt += $attendence->sessionRecord->sessions_debt_for_company;
                $totalSessionsCount ++;
                $clients[] =  $attendence->session->user->id;

            @endphp
        @endforeach

        @php

        if(isset($day)){
             $examinationDebts = \App\Models\User::query()->where('insurance_company_id',$company->id)->whereHas('insurance_company')
                ->whereDate('examination_date' , $day)->get();
        }else{
            $examinationDebts = \App\Models\User::query()->where('insurance_company_id',$company->id)->whereHas('insurance_company')
                ->whereMonth('examination_date', $month)->whereYear('examination_date', $year)->get();
        }

        @endphp
        @foreach($examinationDebts as $user)
            <tr>
                <td></td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->name }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> {{ $user->phone }}</td>
                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> -- </td>

                <td style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">كشف</td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">--
                </td>
                <td width="25"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px"> --
                </td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">--
                </td>
                <td width="20"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $user->examination_price}}
                    جنيه
                </td>
                <td width="30"
                    style="border: 1px solid #dddddd; padding: 8px;background: #fff;font-size: 16px">    {{ $user->examination_date}}
                </td>
            </tr>

            @php


                $totalCompaniesDebt += $user->examination_price;
                $clients[] =  $user->id;

            @endphp
        @endforeach

        <tr></tr>
        <tr></tr>
        <tr></tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr></tr>
        <tr></tr>
        <tr></tr>

        <tr>
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                عدد الشركات
            </td>

            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $iterationCount}}
                شركة
            </td>
        </tr>

        <tr>
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                عدد العملاء
            </td>

            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ count(array_unique($clients))}}
                عميل
            </td>
        </tr>


        <tr>
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                إجمالى عدد الجلسات المتعاقد عليهاو تم حضورها
            </td>

            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 15px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold; direction: rtl;"> {{ $totalSessionsCount }}
                عميل
            </td>
        </tr>


        <tr style="background-color: #d9d9d9;">
            <td colspan="3"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                إحمالي مديونيات الشركات
            </td>
            <td colspan="2"
                style="border: 4px solid #dddddd; padding: 20px; font-size: 19px; text-align: center; background-color: #63c363; color: #ffffff; font-weight: bold;">
                جنيه {{ $totalCompaniesDebt  }} </td>
        </tr>
        </tfoot>
</table>
