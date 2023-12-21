<div class="sidebar-header">
    <div>
        <img src="{{asset('backend')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">DubaiBuilders</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
    </div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
    <li>
        <a href="{{route('admin.index')}}">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
        <!-- <ul>
            <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
            </li>
            <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
            </li>
            <li> <a href="index3.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
            </li>
            <li> <a href="index4.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
            </li>
            <li> <a href="index5.html"><i class="bx bx-right-arrow-alt"></i>Hospitality</a>
            </li>
        </ul> -->
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-spa'></i>
            </div>
            <div class="menu-title">Projects</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.clients.index') }}"><i class="bx bx-right-arrow-alt"></i>All Customer</a>
            </li>
            <li> <a href="{{ route('admin.projects.index') }}"><i class="bx bx-right-arrow-alt"></i>Projects List</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='lni lni-construction-hammer'></i>
            </div>
            <div class="menu-title">Services</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.services.index') }}"><i class="bx bx-right-arrow-alt"></i>All Services</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='lni lni-briefcase'></i>
            </div>
            <div class="menu-title">Career</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.careers.index') }}"><i class="bx bx-right-arrow-alt"></i>Job Circular</a>
            </li>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Job Application</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('admin.team.index') }}">
            <div class="parent-icon"> <i class='bx bx-atom'></i>
            </div>
            <div class="menu-title">Team</div>
        </a>
    </li>
        <a href="{{ route('admin.settings.index') }}">
            <div class="parent-icon"><i class="lni lni-cogs"></i>
            </div>
            <div class="menu-title">Settings</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.abouts.index') }}">
            <div class="parent-icon"><i class="lni lni-atlassian"></i>
            </div>
            <div class="menu-title">About</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.blogs.index') }}">
            <div class="parent-icon"><i class="lni lni-bootstrap"></i>
            </div>
            <div class="menu-title">Blog</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.request.quotation') }}">
            <div class="parent-icon"><i class="lni lni-question-circle"></i>
            </div>
            <div class="menu-title">Quotation Request</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.all.quotations') }}">
            <div class="parent-icon"><i class='bx bx-file'></i>
            </div>
            <div class="menu-title">All Quotations</div>
        </a>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-command'></i>
            </div>
            <div class="menu-title">Items</div>
        </a>
        <ul>
            <li> <a href="{{route('admin.workcategories.index')}}"><i class="bx bx-right-arrow-alt"></i>All Categories & Units</a>
            </li>
            <li> <a href="{{route('admin.itemworks.index')}}"><i class="bx bx-right-arrow-alt"></i>All Items</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('admin.sliders.index') }}">
            <div class="parent-icon"><i class="bx bx-carousel"></i>
            </div>
            <div class="menu-title">Slider</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title">eCommerce</div>
        </a>
        <ul>
            <li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
            </li>
            <li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product
                    Details</a>
            </li>
            <li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New
                    Products</a>
            </li>
            <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-gift'></i>
            </div>
            <div class="menu-title">Components</div>
        </a>
        <ul>
            <li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
            </li>
            <li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
            </li>
            <li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Badges</a>
            </li>
            <li> <a href="component-buttons.html"><i class="bx bx-right-arrow-alt"></i>Buttons</a>
            </li>
            <li> <a href="component-cards.html"><i class="bx bx-right-arrow-alt"></i>Cards</a>
            </li>
            <li> <a href="component-carousels.html"><i class="bx bx-right-arrow-alt"></i>Carousels</a>
            </li>
            <li> <a href="component-list-groups.html"><i class="bx bx-right-arrow-alt"></i>List Groups</a>
            </li>
            <li> <a href="component-media-object.html"><i class="bx bx-right-arrow-alt"></i>Media
                    Objects</a>
            </li>
            <li> <a href="component-modals.html"><i class="bx bx-right-arrow-alt"></i>Modals</a>
            </li>
            <li> <a href="component-navs-tabs.html"><i class="bx bx-right-arrow-alt"></i>Navs & Tabs</a>
            </li>
            <li> <a href="component-navbar.html"><i class="bx bx-right-arrow-alt"></i>Navbar</a>
            </li>
            <li> <a href="component-paginations.html"><i class="bx bx-right-arrow-alt"></i>Pagination</a>
            </li>
            <li> <a href="component-popovers-tooltips.html"><i class="bx bx-right-arrow-alt"></i>Popovers &
                    Tooltips</a>
            </li>
            <li> <a href="component-progress-bars.html"><i class="bx bx-right-arrow-alt"></i>Progress</a>
            </li>
            <li> <a href="component-spinners.html"><i class="bx bx-right-arrow-alt"></i>Spinners</a>
            </li>
            <li> <a href="component-notifications.html"><i class="bx bx-right-arrow-alt"></i>Notifications</a>
            </li>
            <li> <a href="component-avtars-chips.html"><i class="bx bx-right-arrow-alt"></i>Avatrs &
                    Chips</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-command'></i>
            </div>
            <div class="menu-title">Content</div>
        </a>
        <ul>
            <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Grid System</a>
            </li>
            <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Typography</a>
            </li>
            <li> <a href="content-text-utilities.html"><i class="bx bx-right-arrow-alt"></i>Text
                    Utilities</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class='bx bx-atom'></i>
            </div>
            <div class="menu-title">Icons</div>
        </a>
        <ul>
            <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
            </li>
            <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
            </li>
            <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Forms & Tables</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-hourglass'></i>
            </div>
            <div class="menu-title">Forms</div>
        </a>
        <ul>
            <li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Form Elements</a>
            </li>
            <li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Input Groups</a>
            </li>
            <li> <a href="form-layouts.html"><i class="bx bx-right-arrow-alt"></i>Forms Layouts</a>
            </li>
            <li> <a href="form-validations.html"><i class="bx bx-right-arrow-alt"></i>Form Validation</a>
            </li>
            <li> <a href="form-wizard.html"><i class="bx bx-right-arrow-alt"></i>Form Wizard</a>
            </li>
            <li> <a href="form-text-editor.html"><i class="bx bx-right-arrow-alt"></i>Text Editor</a>
            </li>
            <li> <a href="form-file-upload.html"><i class="bx bx-right-arrow-alt"></i>File Upload</a>
            </li>
            <li> <a href="form-date-time-pickes.html"><i class="bx bx-right-arrow-alt"></i>Date
                    Pickers</a>
            </li>
            <li> <a href="form-select2.html"><i class="bx bx-right-arrow-alt"></i>Select2</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-grid-alt"></i>
            </div>
            <div class="menu-title">Tables</div>
        </a>
        <ul>
            <li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Basic Table</a>
            </li>
            <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Pages</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-lock-open-alt'></i>
            </div>
            <div class="menu-title">Authentication</div>
        </a>
        <ul>
            <li> <a href="authentication-signin.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
            </li>
            <li> <a href="authentication-signup.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
            </li>
            <li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
            </li>
            <li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
            </li>
            <li> <a href="authentication-forgot-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
            </li>
            <li> <a href="authentication-reset-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
            </li>
            <li> <a href="authentication-lock-screen.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="user-profile.html">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">User Profile</div>
        </a>
    </li>
    <li>
        <a href="timeline.html">
            <div class="parent-icon"> <i class="bx bx-video-recording"></i>
            </div>
            <div class="menu-title">Timeline</div>
        </a>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-error"></i>
            </div>
            <div class="menu-title">Errors</div>
        </a>
        <ul>
            <li> <a href="errors-404-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>404
                    Error</a>
            </li>
            <li> <a href="errors-500-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>500
                    Error</a>
            </li>
            <li> <a href="errors-coming-soon.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
            </li>
            <li> <a href="error-blank-page.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Blank Page</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="faq.html">
            <div class="parent-icon"><i class="bx bx-help-circle"></i>
            </div>
            <div class="menu-title">FAQ</div>
        </a>
    </li>
    <li>
        <a href="pricing-table.html">
            <div class="parent-icon"><i class='bx bx-dollar-circle'></i>
            </div>
            <div class="menu-title">Pricing</div>
        </a>
    </li>
    <li class="menu-label">Charts & Maps</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-line-chart"></i>
            </div>
            <div class="menu-title">Charts</div>
        </a>
        <ul>
            <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
            </li>
            <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
            </li>
            <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-map-pin'></i>
            </div>
            <div class="menu-title">Maps</div>
        </a>
        <ul>
            <li> <a href="map-google-maps.html"><i class="bx bx-right-arrow-alt"></i>Google Maps</a>
            </li>
            <li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Vector Maps</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Others</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-menu"></i>
            </div>
            <div class="menu-title">Menu Levels</div>
        </a>
        <ul>
            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                    One</a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                        <ul>
                            <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                                    Three</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="https://codervent.com/synadmin/documentation/index.html" target="_blank">
            <div class="parent-icon"><i class='bx bx-file'></i>
            </div>
            <div class="menu-title">Documentation</div>
        </a>
    </li>
    <li>
        <a href="https://themeforest.net/user/codervent" target="_blank">
            <div class="parent-icon"><i class='bx bx-headphone'></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
</ul>
<!--end navigation-->
