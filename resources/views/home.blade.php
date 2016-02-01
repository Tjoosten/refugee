@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="jumbotron">
            <h1> Solidarity for all - TRIPS </h1>

            <p> Wie rijd wanneer aan Calais en of Duinkerke - vraag en aanbod. </p>

            <a class="btn btn-primary btn-lg" href="">
                <span class="fa fa-btn fa-envelope"></span> Contact
            </a>
            <a class="btn btn-success btn-lg" href="">
                <span class="fa fa-btn fa-asterisk"></span> Acties
            </a>
            <a class="btn btn-danger btn-lg" href="{!! route('trips.index') !!}">
                <span class="fa fa-btn fa-car"></span> Ritten
            </a>
        </div>
    </div>
</div>
@endsection
