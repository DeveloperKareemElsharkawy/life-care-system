<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{route('admin.dashboard.home')}}">


            <img src="{{ URL::asset('admin_asset/images/brand/logo.png') }}"
                 class="header-brand-img desktop-lgo" alt="Azea logo">


            <img src="{{ URL::asset('admin_asset/images/brand/logo1.png') }}"
                 class="header-brand-img dark-logo" alt="Azea logo">
            <img src="{{ URL::asset('admin_asset/images/brand/favicon.png') }}"
                 class="header-brand-img mobile-logo" alt="Azea logo">
            <img src="{{ URL::asset('admin_asset/images/brand/favicon1.png') }}"
                 class="header-brand-img darkmobile-logo" alt="Azea logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.dashboard.home')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                     viewBox="0 0 24 24">
                    <path
                        d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"/>
                </svg>
                <span class="side-menu__label"> @lang('admin/dashboard.menus.control_panel')</span></a>
        </li>


        @if (Auth::user()->hasPermission('read-admins') || Auth::user()->hasPermission('read-roles') )

            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">

                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                         height="24px"
                         viewBox="0 0 24 24" width="24px" fill="#000000">
                        <g>
                            <rect fill="none" height="24" width="24"/>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M17,11c0.34,0,0.67,0.04,1,0.09V6.27L10.5,3L3,6.27v4.91c0,4.54,3.2,8.79,7.5,9.82c0.55-0.13,1.08-0.32,1.6-0.55 C11.41,19.47,11,18.28,11,17C11,13.69,13.69,11,17,11z"/>
                                <path
                                    d="M17,13c-2.21,0-4,1.79-4,4c0,2.21,1.79,4,4,4s4-1.79,4-4C21,14.79,19.21,13,17,13z M17,14.38c0.62,0,1.12,0.51,1.12,1.12 s-0.51,1.12-1.12,1.12s-1.12-0.51-1.12-1.12S16.38,14.38,17,14.38z M17,19.75c-0.93,0-1.74-0.46-2.24-1.17 c0.05-0.72,1.51-1.08,2.24-1.08s2.19,0.36,2.24,1.08C18.74,19.29,17.93,19.75,17,19.75z"/>
                            </g>
                        </g>
                    </svg>
                    <span class="side-menu__label">@lang('admin/dashboard.menus.management')</span><i
                        class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu">

                    @if (Auth::user()->hasPermission('read-roles'))
                        <li><a href="{{route('admin.roles.index')}}" class="slide-item btn">
                                <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                                   data-bs-original-title="fe fe-circle"
                                   aria-label="fe fe-circle"></i>
                                <span class="slide-item-label">@lang('admin/dashboard.menus.roles')</span></a></li>
                    @endif

                    @if (Auth::user()->hasPermission('read-admins'))
                        <li><a href="{{route('admin.system.users.index')}}" class="slide-item btn">
                                <i class="fe fe-stop-circle" data-bs-toggle="tooltip" title=""
                                   data-bs-original-title="fe fe-stop-circle" aria-label="fe fe-stop-circle"></i>
                                <span class="slide-item-label">@lang('admin/dashboard.menus.admins')</span></a></li>
                    @endif


                </ul>
            </li>
        @endif

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.categories.index')}}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                     width="24px" fill="#000000">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 2l-5.5 9h11z"/>
                    <circle cx="17.5" cy="17.5" r="4.5"/>
                    <path d="M3 13.5h8v8H3z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.categories')}}</span></a>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.contract-users.index')}}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd"
                          d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.contract_users')}}</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.cash-users.index')}}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd"
                          d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.cash_users')}}</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.doctors.index')}}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
                    <path
                        d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4m13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.doctors')}}</span></a>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.insurance-companies.index')}}">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                    <path
                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.insurance_company')}}</span></a>
        </li>


        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">

                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>
                </svg>
                <span class="side-menu__label">@lang('admin/dashboard.menus.sessions')</span><i
                    class="angle fe fe-chevron-right"></i></a>
            <ul class="slide-menu">

                @if (Auth::user()->hasPermission('read-roles'))
                    <li><a href="{{route('admin.sessions.index')}}" class="slide-item btn">
                            <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                               data-bs-original-title="fe fe-circle"
                               aria-label="fe fe-circle"></i>
                            <span class="slide-item-label">@lang('admin/dashboard.menus.all_sessions')</span></a></li>
                @endif

                @if (Auth::user()->hasPermission('read-roles'))
                    <li><a href="{{route('admin.sessions.pending-sessions')}}" class="slide-item btn">
                            <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                               data-bs-original-title="fe fe-circle"
                               aria-label="fe fe-circle"></i>
                            <span class="slide-item-label">@lang('admin/dashboard.menus.pending_sessions')</span></a>
                    </li>
                @endif

                @if (Auth::user()->hasPermission('read-roles'))
                    <li><a href="{{route('admin.sessions.active-sessions')}}" class="slide-item btn">
                            <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                               data-bs-original-title="fe fe-circle"
                               aria-label="fe fe-circle"></i>
                            <span class="slide-item-label">@lang('admin/dashboard.menus.active_sessions')</span></a>
                    </li>
                @endif


                @if (Auth::user()->hasPermission('read-roles'))
                    <li><a href="{{route('admin.sessions.missed-sessions')}}" class="slide-item btn">
                            <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                               data-bs-original-title="fe fe-circle"
                               aria-label="fe fe-circle"></i>
                            <span class="slide-item-label">تنبيهات الجلسات</span></a></li>
                @endif

                @if (Auth::user()->hasPermission('read-roles'))
                    <li><a href="{{route('admin.sessions.finished-sessions')}}" class="slide-item btn">
                            <i class="fe fe-circle" data-bs-toggle="tooltip" title=""
                               data-bs-original-title="fe fe-circle"
                               aria-label="fe fe-circle"></i>
                            <span class="slide-item-label">@lang('admin/dashboard.menus.finished_sessions')</span></a>
                    </li>
                @endif

            </ul>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.sheet.supplies')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="16" height="16"
                     fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path
                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
                <span class="side-menu__label">الإيرادات اليومية</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.sheet.client-debts')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="16" height="16"
                     fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path
                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
                <span class="side-menu__label">مديونات العملاء</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.sheet.attendees-list')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="16" height="16"
                     fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path
                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
                <span class="side-menu__label">حضور الجلسات</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.sheet.companies-debts')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="16" height="16"
                     fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path
                        d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
                <span class="side-menu__label">مديونات الشركات</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.settings.admin.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="16" height="16"
                     fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                    <path
                        d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                </svg>
                <span class="side-menu__label">{{trans('admin/dashboard.menus.admin_settings')}}</span></a>
        </li>

    </ul>
</aside>
