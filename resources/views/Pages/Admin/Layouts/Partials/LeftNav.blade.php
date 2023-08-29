<div class="lef-nav-container">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('/admin/assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ env('APP_NAME') }}</h4>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li class="menu-label">Sections</li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="server-outline"></ion-icon>
                </div>
                <div class="menu-title">Miners</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.miners') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>All Miners
                    </a>
                </li>
                <li> <a href="{{ route('admin.add.miner') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Add New Miner
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="gift-outline"></ion-icon>
                </div>
                <div class="menu-title">Plans</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.plans') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>All Plans
                    </a>
                </li>
                <li> <a href="{{ route('admin.add.plan') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Add New Plan
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="briefcase-outline"></ion-icon>
                </div>
                <div class="menu-title">Purchase</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>All Purchase
                    </a>
                </li>
                {{-- <li> <a href="widgets-data-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Data Widgets
                    </a>
                </li> --}}
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="receipt-outline"></ion-icon>
                </div>
                <div class="menu-title">Payment</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>All Payments
                    </a>
                </li>
                <li> <a href="widgets-data-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Data Widgets
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
                <div class="menu-title">WithDraw</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>All Withdraw
                    </a>
                </li>
                <li> <a href="widgets-data-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Data Widgets
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html">
                        <ion-icon name="ellipse-outline"></ion-icon>All Users
                    </a>
                </li>

            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
