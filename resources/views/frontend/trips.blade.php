@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        {{-- Navigation tabs --}}
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if(count($errors->all()) == 0) class="active" @endif>
                <a href="#ritten" aria-controls="home" role="tab" data-toggle="tab">Ik zoek een plaats</a>
            </li>
            @if(Auth::check())
                <li role="presentation" @if(count($errors->all()) > 0) class="active" @endif>
                    <a href="#rijden" aria-controls="profile" role="tab" data-toggle="tab">Ik wil rijden</a>
                </li>
            @endif
        </ul>

        {{-- Tabs content --}}
        <div class="tab-content">
            <div class="tab-pane @if(count($errors->all()) == 0) active @endif" id="ritten" role="tabpanel">
                <div style="padding-top: 15px">
                    @if(count($query) > 0)
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Datum vertrek:</th>
                                <th>Regio vertrek:</th>
                                <th>Bestemming:</th>
                                <th>Plaatsen:</th>
                                <th></th> {{-- Ik wil meerijden --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($query as $trip)
                                <tr>
                                    <td> <code>#{!! $trip->id !!}</code></td>
                                    <td> {!! $trip->date !!} </td>
                                    <td> {!! $trip->region !!} </td>
                                    <td>
                                        @if($trip->destination == 2)
                                            Duinkerke
                                        @elseif($trip->destination == 1)
                                            Calais
                                        @endif
                                    </td>
                                    <td> {!! $trip->places !!}</td>
                                    <td>
                                        @if(Auth::check() && $trip->user_id === Auth::user()->id)
                                            <a href="" style="margin-right: 4px;" class="label label-danger">
                                                Bewerken
                                            </a>
                                            <a href="{{ route('trips.delete', ['id' => $trip->id])  }}" class="label label-danger">
                                                Verwijderen
                                            </a>
                                        @else
                                            <a href="{{route('trips.intrest', ['id' => $trip->id]) }}" class="label label-danger"> Meerijden </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <h5>Info bericht:</h5>

                            <p> Het systeem bevat geen ritten naar de vluchtelingen kampen. </p>
                        </div>
                    @endif
                </div>
            </div>

            @if(Auth::check())
                <div class="tab-pane @if(count($errors->all()) > 0) active @endif" id="rijden" role="tabpanel">
                    <div style="padding-top: 15px;">
                        <form method="POST" action="{{ route('trips.create') }}">
                            {{-- CSRF protection --}}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="naam" class="col-sm-3 form-control-label">Naam:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="name" id="naam" placeholder="Jouw naam">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 form-control-label">Email:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Jouw email adres">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telephone" class="col-sm-3 form-control-label">GSM nr:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="telephone" id="telephone" placeholder="Jouw GSM nr.">
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('date') ? 'has-error' : '' }}">
                                <label for="date" class="col-sm-3 form-control-label">Datum vertrek:</label>
                                <div class="col-sm-4">
                                    <input type="text" value="{{ old('date') }}" class="form-control form-control-sm" name="date" id="telephone" placeholder="Datum van vertrek">
                                    <small class="text-muted"> Format: dd/mm/yyyy </small>
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('region') ? ' has-error' : '' }}">
                                <label for="regio" class="col-sm-3 form-control-label">Regio:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="region" value="{{ old('region') }}" id="telephone" placeholder="Vertrek regio.">
                                    <small class="text-muted">Alleen plaatsnamen.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="places" class="col-sm-3 form-control-label">Beschikbare plaatsen:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" name="places" id="telephone" placeholder="Aantal">
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('destination') ? 'has-error' : '' }} ">
                                <label for="regio" class="col-sm-3 form-control-label">Bestemming:</label>
                                <div class="col-sm-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="destination" id="optionsRadios1" value="1">
                                            Calais
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="destination" id="optionsRadios2" value="2">
                                            Duinkerke
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3">
                                    <button type="submit" class="btn btn-success">Insturen</button>
                                    <button type="reset" class="btn btn-danger">reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            </div>
        {{-- End tab content --}}
    </div>
    <div class="col-xs-3 col-sm-3 col-md-9 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bestemmingen:
            </div>
            <div class="list-group">
                <a class="list-group-item" href="">
                    Alle ritten
                    <span class="pull-right badge"> {!! count($all) !!} </span>
                </a>
                <a class="list-group-item" href="">
                    Calais
                    <span class="pull-right badge"> {!! count($calais) !!} </span>
                </a>
                <a class="list-group-item" href="">
                    Duinkerke
                    <span class="pull-right badge"> {!! count($duinkerke) !!} </span>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
