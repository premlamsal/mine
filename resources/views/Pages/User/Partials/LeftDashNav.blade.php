<div class="dash-vertical-menu">
    <ul>
        <li> <a href="{{ route('user.dashboard') }}" class="@if (request()->route()->getName() == 'user.dashboard') active @endif">
                <span class="material-icons orange600">dashboard
                </span>Dashboard
            </a>
        </li>
        <li> <a href="{{ route('user.purchase') }}" class="@if (request()->route()->getName() == 'user.purchase') active @endif""> <span
                    class="material-icons orange600">local_mall
                </span> Purchase</a></li>
        <li> <a href="{{ route('user.withdraw') }}" class="@if (request()->route()->getName() == 'user.withdraw') active @endif"> <span
                    class="material-icons orange600">account_balance_wallet
                </span> WithDraw</a></li>
        <li> <a href="{{ route('user.referral') }}" class="@if (request()->route()->getName() == 'user.referral') active @endif"> <span
                    class="material-icons orange600">group_add
                </span> Referral</a></li>
        <li> <a href="{{ route('user.settings') }}" class="@if (request()->route()->getName() == 'user.settings') active @endif"> <span
                    class="material-icons orange600">settings
                </span> Settings</a></li>
    </ul>
</div>
