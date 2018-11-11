<?php

namespace App\Listeners\Backend\Supplier;

/**
 * Class SupplierEventListener.
 */
class SupplierEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info($event->doer.' Created supplier "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info($event->doer.' Updated supplier "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info($event->doer.' Deleted supplier "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info($event->doer.' Permanently Deleted supplier "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info($event->doer.' Restored supplier "'.$event->model.'".');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Supplier\SupplierCreated::class,
            'App\Listeners\Backend\Supplier\SupplierEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Supplier\SupplierUpdated::class,
            'App\Listeners\Backend\Supplier\SupplierEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Supplier\SupplierDeleted::class,
            'App\Listeners\Backend\Supplier\SupplierEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Supplier\SupplierPermanentlyDeleted::class,
            'App\Listeners\Backend\Supplier\SupplierEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Supplier\SupplierRestored::class,
            'App\Listeners\Backend\Supplier\SupplierEventListener@onRestored'
        );
    }
}
