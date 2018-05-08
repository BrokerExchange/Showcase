@extends('showcase::app.layouts.app') 
@section('title', 'Create Display') 
@section('content')
<main class="col-sm-4 col-sm-offset-2 showcase-display-main">
    <h1>Create New Display</h1>
    <form action="{{route('displays.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Display Name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="component_view">Component View</label>
            <input class="form-control" type="text" name="component_view">
        </div>
        <div class="form-group">
            <label for="default_trophy_component_view">Default Trophy Component View</label>
            <input class="form-control" type="text" name="default_trophy_component_view">
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" name="force_trophy_default" value="yes">
            <label class="form-check-label" for="force_trophy_default">Force Default Trophy View</label>
        </div>
        <button class="btn btn-success btn-block" type="submit">Save</button>
    </form>
</main>
@stop