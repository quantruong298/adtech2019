<div id="menu" class="col-2 mr-auto flex-fill p-0 ">
    <div id="menu_admin" class="">
        <div id="sidebar" class="">
            <h2><a class="nav-link text-left" href="/mp">DashBoard</a></h2>
            <hr class="p-o m-0">
            <ul id="menu_admin_users" class="nav nav-pills nav-fill">
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-left" href="{{route('plans.index')}}">
                        <i class="fa fa-calendar"></i> Plan Management</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-left" href="{{route('campaigns.index')}}">
                        <i class="fa fa-bullhorn"></i> Campaign Management</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-left" href="{{ url('mp/adgroups') }}">
                        <i class="fa fa-cubes"></i> AdGroup Management</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-left" href="{{ route('ads.index') }}">
                        <i class="fa fa-cube"></i> Ads Management</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-left" href="{{ url('mp/reports') }}">
                        <i class="fa fa-bar-chart "></i> Report Management</a>
                </li>
            </ul>
        </div>
    </div>
</div>
