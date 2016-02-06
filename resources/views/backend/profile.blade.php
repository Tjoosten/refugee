@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <h1> {!! Auth::user()->name !!} </h1>
        </div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right">
                <img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100">
            </a>
        </div>
    </div>
@stop