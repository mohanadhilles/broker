<?php

namespace App\Nova;

use App\Nova\Actions\BeOnline;
use App\Nova\Actions\Deactive;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class Employer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $group = 'Management';

    public static $model = \App\User::class;


    public static $title = 'name';

    public static function label()
    {
        return 'Management Employers';
    }

    public static $search = [
        'id', 'name', 'country', 'active','role'
    ];
    public static function indexQuery(NovaRequest $request, $query)
    {
        return  $query->where('role','1')->orWhere('role','6')->orWhere('role','7')->orWhere('role','1');
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')->showOnIndex(false),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Place::make('address')->showOnIndex(false),
            BelongsTo::make('Countries')->searchable(false)->rules('required'),
            Boolean::make('active')->rules('required'),
            BelongsToMany::make('skills')->searchable(),
            BelongsTo::make('roles')->rules('required')->sortable(),
            Text::make('Code')->readonly(),

            Image::make('Photo')->showOnIndex(false),
            Text::make('youtube')->onlyOnForms(),
            Trix::make('bio'),
            Text::make('Entry By','entry_by')->withMeta([
                'value' => \auth()->user()->name ?? auth()->user()->name,
            ])->readonly(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }




    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            ( new Deactive)->canSee(function ($request) {
                return true;
            })->canRun(function ($request, $user) {
                return $user->role == 1;
            }),
            new BeOnline('Be Online','active',1),

            (new DownloadExcel())->askForFilename(),

        ];
    }
}
