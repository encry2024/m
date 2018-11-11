<?php

Breadcrumbs::for('admin.customer.branch.deliver', function ($trail, $customer, $branch) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.customers.management'), route('admin.customer.index'));
    $trail->push(__('labels.backend.customers.view', ['customer' => $customer->company_name]), route('admin.customer.show', $customer->id));
    $trail->push(__('labels.backend.branches.view', ['branch' => $branch->name]));
    $trail->push(__('labels.backend.branches.deliver'));
});

Breadcrumbs::for('admin.customer.branch.product.assign_product_pricing', function ($trail, $customer, $branch) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.customers.management'), route('admin.customer.index'));
    $trail->push(__('labels.backend.customers.view', ['customer' => $customer->company_name]), route('admin.customer.show', $customer->id));
    $trail->push(__('labels.backend.branches.view', ['branch' => $branch->name]));
    $trail->push(__('labels.backend.branches.assign_product'));
});