<!-- Main Wrapper -->
	<div class="main-wrapper">

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="#" class="logo logo-normal">
            <img src="assets/img/logo/logo-small.png" alt="Logo" width="150" height="150">
        </a>
        <a href="#" class="logo-small">
            <img src="assets/img/logo/logo-small.png" alt="Logo">
        </a>
        <a href="#" class="dark-logo">
            <img src="assets/img/logo/logo-small.png" alt="Logo">
        </a>
    </div>
    <!-- /Logo -->
    
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
            </ul>
        </div>
    </div>
    
    <div class="sidebar-header p-3 pb-0 pt-2">
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md online">
                <img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
        </div>
        
        <div class="input-group input-group-flat d-inline-flex mb-4">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search in HRMS">
            <span class="input-group-text">
                <kbd>CTRL + / </kbd>
            </span>
        </div>
        
        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div class="me-3">
                <a href="calendar.html" class="btn btn-menubar">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>
            <div class="me-3">
                <a href="chat.html" class="btn btn-menubar position-relative">
                    <i class="ti ti-brand-hipchat"></i>
                    <span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                </a>
            </div>
            <div class="me-3 notification-item">
                <a href="activity.html" class="btn btn-menubar position-relative me-1">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>
            <div class="me-0">
                <a href="email.html" class="btn btn-menubar">
                    <i class="ti ti-message"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Main Menu -->
                <li class="menu-title"><span>Main Menu</span></li>
                
                <li>
                    <a href="{{ route('dashboard') }}" class="active">
                        <i class="ti ti-home"></i><span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('services.index') }}">
                        <i class="ti ti-server"></i><span>Services</span>
                    </a>
                </li>
                
                <li>
                    <a href="wallet.html">
                        <i class="ti ti-wallet"></i><span>Wallet</span>
                    </a>
                </li>

                <!-- Utility Bill Payment -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ti ti-credit-card"></i>
                        <span>Utility Bill Payment</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="buy-airtime.html">Buy Airtime</a></li>
                        <li><a href="buy-data.html">Buy Data</a></li>
                        <li><a href="pay-electric.html">Pay Electric</a></li>
                        <li><a href="pay-cable.html">Pay Cable TV</a></li>
                    </ul>
                </li>
                <!-- /Utility Bill Payment -->

                <!-- BVN Services -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ti ti-id"></i>
                        <span>BVN Services</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="bvn-modification.html">Modification</a></li>
                        <li><a href="bvn-crm.html">CRM</a></li>
                        <li><a href="bvn-enrolment.html">Enrolment User</a></li>
                        <li><a href="bvn-vnin.html">VNIN & FAS</a></li>
                    </ul>
                </li>
                <!-- /BVN Services -->

                <!-- NIN Services -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ti ti-user-check"></i>
                        <span>NIN Services</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="nin-modification.html">Modification</a></li>
                        <li><a href="nin-validation.html">Validation</a></li>
                        <li><a href="nin-ipe.html">IPE</a></li>
                        <li><a href="nin-selfservice.html">Self Service</a></li>
                    </ul>
                </li>
                <!-- /NIN Services -->

                <!-- Agent Services -->
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="ti ti-building-store"></i>
                        <span>Agent Services</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="agent-affidavit.html">Affidavit</a></li>
                        <li><a href="agent-tin.html">TIN</a></li>
                        <li><a href="agent-cac.html">CAC</a></li>
                        <li><a href="agent-vas.html">VAS</a></li>
                    </ul>
                </li>
                <!-- /Agent Services -->

                <!-- Account Section -->
                <li class="menu-title"><span>Account</span></li>
                
                <li>
                    <a href="settings.html">
                        <i class="ti ti-settings"></i><span>Settings</span>
                    </a>
                </li>
                
                <li>
                    <a href="transactions.html">
                        <i class="ti ti-receipt"></i><span>Transactions</span>
                    </a>
                </li>
                
                <li>
                    <a href="enrolment-report.html">
                        <i class="ti ti-user-star"></i><span>Enrolment Report</span>
                    </a>
                </li>
                
                <li>
                    <a href="support.html">
                        <i class="ti ti-message"></i><span>Support</span>
                    </a>
                </li>
                
                <li>
                    <a href="logout.html">
                        <i class="ti ti-logout"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->


 <style>

  /* Better icon and text spacing */
.sidebar-menu li a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
}

.sidebar-menu li a i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
}

/* Submenu styling */
.sidebar-menu .submenu ul {
    background: rgba(0, 0, 0, 0.02);
}

.sidebar-menu .submenu ul li a {
    padding-left: 45px;
    font-size: 13px;
}

/* Active state */
.sidebar-menu li a.active {
    background: #007bff;
    color: white;
}

/* Menu title spacing */
.menu-title {
    padding: 15px 15px 5px 15px;
    font-size: 12px;
    text-transform: uppercase;
    color: #6c757d;
    font-weight: 600;
}
 </style>