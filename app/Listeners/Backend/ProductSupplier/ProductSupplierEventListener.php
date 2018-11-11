<?php

namespace App\Listeners\Backend\ProductSupplier;

/**
 * Class ProductSupplierEventListener.
 */
class ProductSupplierEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info($event->doer.' Created supplier\'s product "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info($event->doer.' Updated supplier\'s product "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info($event->doer.' Deleted supplier\'s product "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info($event->doer.' Permanently Deleted supplier\'s product "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info($event->doer.' Restored supplier\'s product "'.$event->model.'".');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\ProductSupplier\ProductSupplierCreated::class,
            'App\Listeners\Backend\ProductSupplier\ProductSupplierEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\ProductSupplier\ProductSupplierUpdated::class,
            'App\Listeners\Backend\ProductSupplier\ProductSupplierEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\ProductSupplier\ProductSupplierDeleted::class,
            'App\Listeners\Backend\ProductSupplier\ProductSupplierEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\ProductSupplier\ProductSupplierPermanentlyDeleted::class,
            'App\Listeners\Backend\ProductSupplier\ProductSupplierEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\ProductSupplier\ProductSupplierRestored::class,
            'App\Listeners\Backend\ProductSupplier\ProductSupplierEventListener@onRestored'
        );
    }
}
