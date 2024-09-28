<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        @if(Auth::check())
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                {{Auth::user()->name}}</strong></span></span>
                        @else
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                </strong></span></span>
                        @endif
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            @if(Auth::check() && Auth::user()->role == 1)
                <li >
                    <a href="{{route('genre.index')}}"><i class="fa fa-user"></i> <span class="nav-label"> QL Thể loại</span> </a>
                </li>
                <li >
                    <a href="{{route('status.index')}}"><i class="fa fa-user"></i> <span class="nav-label"> QL Mượn Trả </span> </a>
                </li>
                <li >
                    <a href="{{route('author.index')}}"><i class="bi bi-cart4"></i> <span class="nav-label">QL Tác giả</span> </a>
                </li>
            @endif
            <li >
                <a href="{{route('book.index')}}"><i class="bi bi-bag-dash-fill"></i><span class="nav-label">QL Sách</span> </a>

            </li>

            @if(Auth::check())
                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            @endif

            @if(!Auth::check())
            <li><a href="{{route('login')}}">
                   <i class="fa fa-sign-in"></i> Login
                </a></li>
            @else
            <li></li>
            @endif

        </ul>
    </div>
</nav>
