<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li {{ (Route::is('') ? 'class=active' : '') }}><a href="{{ url('home') }}"><i class='fa fa-tachometer'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview{{ (in_array(Route::currentRouteName(), array('blacklist','whitelist','welcoming','outside','schedhangup','transfer','holdmusic','2mobile','onedial'))?' active':'') }}">
                <a href="#"><i class='fa fa-wrench'></i> <span>{{ trans('adminlte_lang::message.config') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li {{ (Route::is('blacklist') ? 'class="active"' : '') }}><a href="{{ url('config/blacklist') }}">{{ trans('adminlte_lang::message.blacklist') }}</a></li>
                    <li {{ (Route::is('whitelist') ? 'class="active"' : '') }}><a href="{{ url('config/whitelist') }}">{{ trans('adminlte_lang::message.whitelist') }}</a></li>
                    <li {{ (Route::is('welcoming') ? 'class="active"' : '') }}><a href="{{ url('config/welcoming') }}">{{ trans('adminlte_lang::message.welcoming') }}</a></li>
                    <li {{ (Route::is('outside') ? 'class="active"' : '') }}><a href="{{ url('config/outside') }}">{{ trans('adminlte_lang::message.outside') }}</a></li>
                    <li {{ (Route::is('schedhangup') ? 'class="active"' : '') }}><a href="{{ url('config/schedhangup') }}">{{ trans('adminlte_lang::message.schedhangup') }}</a></li>
                    <li {{ (Route::is('transfer') ? 'class="active"' : '') }}><a href="{{ url('config/transfer') }}">{{ trans('adminlte_lang::message.transfer') }}</a></li>
                    <li {{ (Route::is('holdmusic') ? 'class="active"' : '') }}><a href="{{ url('config/holdmusic') }}">{{ trans('adminlte_lang::message.holdmusic') }}</a></li>
                    <li {{ (Route::is('2mobile') ? 'class="active"' : '') }}><a href="{{ url('config/2mobile') }}">{{ trans('adminlte_lang::message.2mobile') }}</a></li>
                    <li {{ (Route::is('onedial') ? 'class="active"' : '') }}><a href="{{ url('config/onedial') }}">{{ trans('adminlte_lang::message.onedial') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart'></i> <span>{{ trans('adminlte_lang::message.stat') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-tty'></i> <span>{{ trans('adminlte_lang::message.monitor') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-cogs'></i> <span>{{ trans('adminlte_lang::message.manage') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-terminal'></i> <span>{{ trans('adminlte_lang::message.tool') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            </li>
            <li class="treeview{{ (in_array(Route::currentRouteName(), array('tenant','extension','user','role','permission'))?' active':'') }}">
                <a href="#"><i class='fa fa-users'></i> <span>{{ trans('adminlte_lang::message.account') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @role('admin|moderator')
                    <li {{ (Route::is('tenant') ? 'class="active"' : '') }}><a href="{{ url('account/tenant') }}">{{ trans('adminlte_lang::message.tenant') }}</a></li>
                    @endif
                    <li {{ (Route::is('extension') ? 'class="active"' : '') }}><a href="{{ url('account/extension') }}">{{ trans('adminlte_lang::message.extension') }}</a></li>
                    <li {{ (Route::is('user') ? 'class="active"' : '') }}><a href="{{ url('account/user') }}">{{ trans('adminlte_lang::message.user') }}</a></li>
                    @role('admin')
                    <li role="separator" class="divider"></li>
                    <li {{ (Route::is('role') ? 'class="active"' : '') }}><a href="{{ url('account/role') }}">{{ trans('adminlte_lang::message.role') }}</a></li>
                    <li {{ (Route::is('permission') ? 'class="active"' : '') }}><a href="{{ url('account/permission') }}">{{ trans('adminlte_lang::message.permission') }}</a></li>
                   @endif
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
