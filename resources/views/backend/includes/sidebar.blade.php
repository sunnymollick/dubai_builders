@php
    $setting = DB::table('settings')->where('is_active',1)->first();
@endphp
<div class="sidebar-header">
    <div>
        <img src="{{ asset($setting->app_logo) }}" class="logo-icon" width="200px !important;" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">DubaiBuilders.</h4>
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
    </li>
    <li class="menu-label">Admin</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-spa'></i>
            </div>
            <div class="menu-title">Projects</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.clients.index') }}"><i class="bx bx-right-arrow-alt"></i>All Customer</a>
            </li>
            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Project List</a>
                <ul>

                    <li> <a href="{{ route('admin.projects.index') }}"><i class="bx bx-right-arrow-alt"></i>Website Projects</a>
                    </li>
                    <li> <a href="{{ route('admin.projects.client-projects') }}"><i class="bx bx-right-arrow-alt"></i>Client Projects</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-command'></i>
            </div>
            <div class="menu-title">Sub-Category</div>
        </a>
        <ul>
            <li> <a href="{{route('admin.workcategories.index')}}"><i class="bx bx-right-arrow-alt"></i>All Categories & Units</a>
            </li>
            <li> <a href="{{route('admin.itemworks.index')}}"><i class="bx bx-right-arrow-alt"></i>All Sub-Category</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-file' ></i>
            </div>
            <div class="menu-title">Quotation</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.request.quotation') }}"><i class="bx bx-right-arrow-alt"></i>Quotation Request</a>
            </li>
            <li> <a href="{{ route('admin.all.quotations') }}"><i class="bx bx-right-arrow-alt"></i>All Quotations</a>
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
            <li> <a href="{{ route('admin.job_applications') }}"><i class="bx bx-right-arrow-alt"></i>Job Application</a>
        </ul>
    </li>

    <li class="menu-label">Website</li>

    <li>
        <a href="{{ route('admin.sliders.index') }}">
            <div class="parent-icon"><i class="bx bx-carousel"></i>
            </div>
            <div class="menu-title">Slider</div>
        </a>
    </li>

    <li>
        <a href="https://premium261.web-hosting.com:2096/webmaillogout.cgi">
            <div class="parent-icon"><i class="fadeIn animated bx bx-mail-send"></i>
            </div>
            <div class="menu-title">Web Mail</div>
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
        <a href="{{ route('admin.team.index') }}">
            <div class="parent-icon"> <i class='bx bx-atom'></i>
            </div>
            <div class="menu-title">Team</div>
        </a>
    </li>

    <li class="menu-label">Settings</li>

    <li>
        <a href="{{ route('admin.settings.index') }}">
            <div class="parent-icon"><i class="lni lni-cogs"></i>
            </div>
            <div class="menu-title">Settings</div>
        </a>
    </li>




</ul>
<!--end navigation-->
