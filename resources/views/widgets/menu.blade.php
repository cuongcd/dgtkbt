<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
            <a href="{!! route('users.edit',Auth::id()) !!}">
                <img alt="image" width="60" class="img-circle" src="/img/avatar.png">
            </a>
            </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="text-muted text-xs block">{!! Auth::user()->first_name !!} <b
                                        class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{!! route('my_acount') !!}">{{Lang::get('general.my_account')}}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{{ URL::to('users/logout') }}}">{{Lang::get('general.logout')}}</a></li>
                    </ul>
                </div>
            </li>
            @if(!empty($menus))
                @foreach($menus as $key => $menu)
                    <li @if(!empty($menu['active'])) class="active" @endif>
                        <a href="{!! url() . $menu['url'] !!}">
                            <i class="fa {!! $menu['icon'] !!}"></i>
                            <span class="nav-label">{{ trans('menus.' . $key) }}</span>
                            @if (!empty($menu['children']))
                                <span class="fa arrow"></span>
                            @endif
                        </a>
                        @if (!empty($menu['children']))
                            <ul class="nav nav-second-level collapse @if(!empty($menu['active'])) in @endif">
                                @foreach($menu['children'] as $key => $menu)
                                    <li @if(!empty($menu['active'])) class="active" @endif>
                                        <a href="{!! url() . $menu['url'] !!}">
                                            <i class="fa {!! $menu['icon'] !!}"></i>
                                            {{ trans('menus.' . $key) }}
                                            @if (!empty($menu['children']))
                                                <span class="fa arrow"></span>
                                            @endif
                                        </a>
                                        @if (!empty($menu['children']))
                                            <ul class="nav nav-third-level collapse @if(!empty($menu['active'])) in @endif">
                                                @foreach($menu['children'] as $key => $menu)
                                                    <li @if(!empty($menu['active'])) class="active" @endif>
                                                        <a href="{!! url() . $menu['url'] !!}">
                                                            <i class="fa {!! $menu['icon'] !!}"></i>
                                                            {{ trans('menus.' . $key) }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</nav>
