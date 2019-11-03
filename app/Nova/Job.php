<?php

namespace App\Nova;

use App\Nova\Actions\active;
use App\Nova\Metrics\ActiveJobs;
use App\Nova\Metrics\NewJobs;
use App\Nova\Metrics\TotalJobs;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;


class Job extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $model = \App\Entities\Job::class;

    public static $title = 'code';

    public static $group = 'Management Jobs';
    public static function label()
    {
        return 'Management Jobs';
    }


    public static $search = [
        'id', 'Salary'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('employer','user'),
            BelongsTo::make('countries'),
            Number::make('Salary'),
            Number::make('Bed Rooms'),
            Number::make('Child No.'),
            Number::make('Place Size'),
            Boolean::make('status'),
            BelongsTo::make('places'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            ( new TotalJobs)->width('1/3'),
            new ActiveJobs,
            (new NewJobs())->width('1/3')
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new active)->canSee(function ($request) {
                return true;
            })->canRun(function ($request, $user) {
                return $user->role == 1;
            }),
            (new DownloadExcel())->askForFilename(),

        ];
    }
}
