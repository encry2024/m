<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.suppliers.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.supplier.index') }}">@lang('menus.backend.suppliers.all')</a>
                <a class="dropdown-item" href="{{ route('admin.supplier.create') }}">@lang('menus.backend.suppliers.create')</a>
                {{-- <a class="dropdown-item" href="{{ route('admin.supplier.deleted') }}">@lang('menus.backend.suppliers.deleted')</a> --}}
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
