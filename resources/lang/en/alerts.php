<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'product_suppliers' => [
            'created'             => 'The supplier\'s product ":product_supplier" was successfully created.',
            'deleted'             => 'The supplier\'s product ":product_supplier" was successfully deleted.',
            'deleted_permanently' => 'The supplier\'s product ":product_supplier" was deleted permanently.',
            'restored'            => 'The supplier\'s product ":product_supplier" was successfully restored.',
            'updated'             => 'The supplier\'s product ":product_supplier" was successfully updated.'
        ],

        'suppliers' => [
            'created'             => 'The supplier ":supplier" was successfully created.',
            'deleted'             => 'The supplier ":supplier" was successfully deleted.',
            'deleted_permanently' => 'The supplier ":supplier" was deleted permanently.',
            'restored'            => 'The supplier ":supplier" was successfully restored.',
            'updated'             => 'The supplier ":supplier" was successfully updated.'
        ],

        'branches' => [
            'created'             => 'The branch ":branch" was successfully created.',
            'deleted'             => 'The branch ":branch" was successfully deleted.',
            'deleted_permanently' => 'The branch ":branch" was deleted permanently.',
            'restored'            => 'The branch ":branch" was successfully restored.',
            'updated'             => 'The branch ":branch" was successfully updated.'
        ],

        'customers' => [
            'created'             => 'The customer ":customer" was successfully created.',
            'deleted'             => 'The customer ":customer" was successfully deleted.',
            'deleted_permanently' => 'The customer ":customer" was deleted permanently.',
            'restored'            => 'The customer ":customer" was successfully restored.',
            'updated'             => 'The customer ":customer" was successfully updated.'
        ],

        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'A new confirmation e-mail has been sent to the address on file.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'The user was successfully created.',
            'deleted'             => 'The user was successfully deleted.',
            'deleted_permanently' => 'The user was deleted permanently.',
            'restored'            => 'The user was successfully restored.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'The user was successfully updated.',
            'updated_password'    => "The user's password was successfully updated.",
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
