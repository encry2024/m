<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn" href="{{ route('admin.customer.show', $customer->id) }}" role="button" id="breadcrumb-dropdown-1" aria-haspopup="true" aria-expanded="false">Back to {{ $customer->company_name }}</a>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
