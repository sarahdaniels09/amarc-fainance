<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">@lang('Dashboard')</span>
                    </a>
                </li>


                <li class="list-divider"></li>

                {{--Manage Plan--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage Plan')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.scheduleManage') }}" aria-expanded="false">
                        <i class="fas fa-clock"></i>
                        <span class="hide-menu">@lang('Schedule')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.planList','admin.planCreate','admin.planEdit*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.planList')}}" aria-expanded="false">
                        <i class="fas fa-cubes"></i>
                        <span class="hide-menu">@lang('Plan List')</span>
                    </a>
                </li>



                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">@lang('Commission Setting')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.referral-commission')}}" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">@lang('Referral')</span>
                    </a>
                </li>



                {{--Manage User--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage User')</span></li>

                <li class="sidebar-item {{menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.users') }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">@lang('All User')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.email-send') }}"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu">@lang('Send Email')</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">@lang('All Transaction ')</span></li>

                <li class="sidebar-item {{menuActive(['admin.transaction*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.transaction') }}" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="hide-menu">@lang('Transaction')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.investments*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.investments') }}" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="hide-menu">@lang('Investments')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.commissions*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.commissions') }}" aria-expanded="false">
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="hide-menu">@lang('Commission')</span>
                    </a>
                </li>





                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Payment Settings')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.methods')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu">@lang('Payment Methods')</span>
                    </a>
                </li>
                <li class="sidebar-item {{menuActive(['admin.deposit.manual.index','admin.deposit.manual.create','admin.deposit.manual.edit'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.deposit.manual.index')}}"
                       aria-expanded="false">
                        <i class="fa fa-university"></i>
                        <span class="hide-menu">@lang('Manual Gateway')</span>
                    </a>
                </li>



                <li class="sidebar-item {{menuActive(['admin.payment.pending'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.pending')}}" aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu">@lang('Deposit Request')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payment.log','admin.payment.search'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.log')}}" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu">@lang('Payment Log')</span>
                    </a>
                </li>




                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Withdrawal Settings')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payout-method*'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-method')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu">@lang('Withdrawal Methods')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payout-request'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-request')}}" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="hide-menu">@lang('Withdrawal Request')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payout-log*'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-log')}}" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu">@lang('Withdrawal Log')</span>
                    </a>
                </li>

                <li class="list-divider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
