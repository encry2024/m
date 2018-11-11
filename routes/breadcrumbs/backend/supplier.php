<?php

Breadcrumbs::for('admin.supplier.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.suppliers.management'), route('admin.supplier.index'));
});

Breadcrumbs::for('admin.supplier.deleted', function ($trail) {
    $trail->parent('admin.supplier.index');
    $trail->push(__('menus.backend.suppliers.deleted'), route('admin.supplier.deleted'));
});

Breadcrumbs::for('admin.supplier.create', function ($trail) {
    $trail->parent('admin.supplier.index');
    $trail->push(__('labels.backend.suppliers.create'), route('admin.supplier.create'));
});

Breadcrumbs::for('admin.supplier.show', function ($trail, $id) {
    $trail->parent('admin.supplier.index');
    $trail->push(__('menus.backend.suppliers.view', ['supplier' => $id->name]), route('admin.supplier.show', $id));
});

Breadcrumbs::for('admin.supplier.edit', function ($trail, $id) {
    $trail->parent('admin.supplier.index');
    $trail->push(__('menus.backend.suppliers.edit'), route('admin.supplier.edit', $id));
});
