<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/branch.php';
require __DIR__.'/supplier.php';
require __DIR__.'/log-viewer.php';
