@extends('nova::layout')

@section('Content')
    <div>
        <loading ref="loading"></loading>

        <transition name="fade" mode="out-in">
            <router-view :key="$route.name + ($route.params.resourceName || '')"></router-view>
        </transition>

        <portal-target name="modals" multiple></portal-target>
    </div>
@endsection
