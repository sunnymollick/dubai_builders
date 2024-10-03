<div class="topbar d-flex align-items-center">
    <nav class="navbar navbar-expand">
        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
        </div>
        <div class="top-menu-left d-none d-lg-block">
            <ul class="nav">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"><i class='bx bx-envelope'></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class='bx bx-message'></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class='bx bx-calendar'></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class='bx bx-check-square'></i></a>
                </li> --}}
            </ul>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative search-bar-box">
                {{-- <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span> --}}
            </div>
        </div>
        <div class="top-menu ms-auto">
            <ul class="navbar-nav align-items-center">

                <li class="nav-item dropdown dropdown-large">
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="header-notifications-list">
                        </div>
                    </div>
                </li>
                @php
                    $message_count = DB::table('contacts')->where('is_read', '0')->count();
                @endphp
                <li class="nav-item dropdown dropdown-large">

                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="{{route('admin.messages.index')}}">
                        <?php if ($message_count > 0) : ?>
                            <span class="alert-count">{{$message_count}}</span>
                        <?php endif; ?>
                        <i class='bx bx-comment'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="header-message-list">

                        </div>
                        <a href="{{route('admin.messages.index')}}">
                            <div class="text-center msg-footer">View All Messages</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        @php
        $auth = DB::table('users')->where('id',Session::get("adminId"))->first();
        @endphp
        <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('backend')}}/images/avatars/admin.png" class="user-img" alt="user avatar">
                <div class="user-info ps-3">
                    <p class="user-name mb-0">{{ $auth->name ?? 'Admin Name' }}</p>
                    <p class="designattion mb-0">{{ $auth->email ?? 'Admin Email' }}</p>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
                </li>
                <li><a class="dropdown-item" href="{{ url('admin/logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- JavaScript to fetch messages -->
<!-- Include Moment.js from a CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
