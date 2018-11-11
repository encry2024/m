<?php

namespace App\Listeners\Backend\Branch;

/**
 * Class BranchEventListener.
 */
class BranchEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info($event->doer.' Created branch "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info($event->doer.' Updated branch "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info($event->doer.' Deleted branch "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info($event->doer.' Permanently Deleted branch "'.$event->model.'".');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info($event->doer.' Restored branch "'.$event->model.'".');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Branch\BranchCreated::class,
            'App\Listeners\Backend\Branch\BranchEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchUpdated::class,
            'App\Listeners\Backend\Branch\BranchEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchDeleted::class,
            'App\Listeners\Backend\Branch\BranchEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchPermanentlyDeleted::class,
            'App\Listeners\Backend\Branch\BranchEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchRestored::class,
            'App\Listeners\Backend\Branch\BranchEventListener@onRestored'
        );
    }
}
