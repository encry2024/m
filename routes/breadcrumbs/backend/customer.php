<?php

Breadcrumbs::for('admin.customer.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.customers.management'), route('admin.customer.index'));
});

Breadcrumbs::for('admin.customer.deleted', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customers.deleted'), route('admin.customer.deleted'));
});

Breadcrumbs::for('admin.customer.create', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.customers.create'), route('admin.customer.create'));
});

Breadcrumbs::for('admin.customer.show', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customers.view', ['customer' => $id->company_name]), route('admin.customer.show', $id));
});

Breadcrumbs::for('admin.customer.edit', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customers.edit'), route('admin.customer.edit', $id));
});
