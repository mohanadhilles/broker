<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BeOnline extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $field;
    private $value;

    public function __construct(string $label, string $field, $value)
    {
        $this->name = $label;
        $this->field = $field;
        $this->value = $value;

    }

    /**
     * Perform the action on the given models.
     *
     * @param \Laravel\Nova\Fields\ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $ids = $models->pluck('id');
        $modelClass = get_class($models->first());
        $modelClass::whereIn('id', $ids)->update([$this->field => $this->value]);
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
