@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-tabs" role="tablist"> {{-- Navigation tabs --}}
                <li role="presentation" class="active">
                    <a href="#punten" aria-controls="home" role="tab" data-toggle="tab">
                        Inzamelpunten
                    </a>
                </li>
                @if(Auth::check() && Auth::user()->is('admin'))
                <li role="presentation">
                    <a href="#new" aria-controls="home" role="tab" data-toggle="tab">
                        Nieuw inzamelpunt
                    </a>
                </li>
                @endif
            </ul> {{-- /Navigation tabs --}}

            {{-- Tab panes --}}
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="punten">
                    <div style="padding-top: 15px;">
                        <div class="row">
                            @if(count($query) == 0)
                                <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6">
                                    <div class="alert alert-warning">
                                        <h4>Oh Snap!</h4>
                                        <p>Er zijn nog geen verzamelpunten ingevoerd.</p>
                                    </div>
                                </div>
                            @else
                                @foreach($query as $info)
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                        <div class="well well-sm">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="http://chart.apis.google.com/chart?cht=qr&chs=70x70&chld=L|0&chl={!! $info->naam_inzamelpunt !!}" alt="QR code">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{!! $info->naam_inzamelpunt !!}</h4>

                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong>Locatie:</strong></td>
                                                            <td> {!! $info->adress !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"><strong>Contact:</strong></td>
                                                            <td>{!! $info->contact !!}</td>
                                                        </tbody>
                                                    </table>

                                                    <h4>Openingsuren:</h4>

                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Maandag: </strong> </td>
                                                            <td> {!! $info->Opening_maandag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Dinsdag: </strong> </td>
                                                            <td> {!! $info->Opening_dinsdag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Woensdag: </strong> </td>
                                                            <td> {!! $info->Opening_woensdag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Donderdag: </strong> </td>
                                                            <td> {!! $info->Opening_donderdag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Vrijdag: </strong> </td>
                                                            <td> {!! $info->Opening_vrijdag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Zaterdag: </strong> </td>
                                                            <td> {!! $info->Opening_zaterdag !!} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100px;"> <strong> Zondag: </strong> </td>
                                                            <td> {!! $info->Opening_zondag !!} </td>
                                                        </tbody>
                                                    </table>

                                                    @if(Auth::check() && Auth::user()->is('admin'))
                                                        <p style="padding-top: 10px;">
                                                            <a href="{{ route('points.destroy', ['id' => $info->id]) }}" class="btn btn-danger btn-xs">Verwijderen</a>
                                                            <a href="" class="btn btn-warning btn-xs">Bewerken</a>
                                                        </p>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                @if(Auth::check() && Auth::user()->is('admin'))
                <div role="tabpanel" class="tab-pane" id="new">
                    <div style="padding-top: 15px;">
                        <div>
                            <form action="{!! route('points.post') !!}" method="POST">
                                {{-- CSRF protection --}}
                                {{ csrf_field() }}

                                <fieldset style="width:40%;">
                                    <legend>Algemene info:</legend>
                                </fieldset>

                                {{-- Naam inzamelpunt --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="name" class="col-sm-3 form-control-label control-label">Naam inzamelpunt:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Naam inzamelpunt">
                                    </div>
                                </div>

                                {{-- Locatie field --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="location" class="col-sm-3 form-control-label control-label">Adres:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="address" id="location" placeholder="adres">
                                    </div>
                                </div>

                                {{-- Contact field --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="contact" class="col-sm-3 form-control-label control-label">Contact:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="contact" id="contact" placeholder="contact info">
                                    </div>
                                </div>

                                <fieldset style="width:40%;">
                                    <legend>Openingsuren:</legend>
                                </fieldset>

                                <p class="text-info" style="margin-bottom: 15px;">
                                    Hier defineert u de openingsuren. Wij zouden graag vragen om de uren <br />
                                    als volgt in te geven. bv. [uur] tot [uur]. indien gesloten mag je gewoon het </br />
                                    invoer veld leeglaten.
                                </p>

                                {{-- Openings uur maandag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="maandag" class="col-sm-3 form-control-label control-label">Maandag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="maandag" id="maandag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uur dinsdag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="dinsdag" class="col-sm-3 form-control-label control-label">Dinsdag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="dinsdag" id="dinsdag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uur woensdag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="woensdag" class="col-sm-3 form-control-label control-label">Woensdag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="woensdag" id="woensdag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uur donderdag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="donderdag" class="col-sm-3 form-control-label control-label">Donderdag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="donderdag" id="donderdag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uur vrijdag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="vrijdag" class="col-sm-3 form-control-label control-label">Vrijdag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="vrijdag" id="vrijdag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uren zaterdag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="zaterdag" class="col-sm-3 form-control-label">Zaterdag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="zaterdag" id="zaterdag" placeholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Openings uren zondag --}}
                                <div class="form-group row required form-group-sm">
                                    <label for="zondag" class="col-sm-3 form-control-label">Zondag:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="zondag" id="zaterdag" plceholder="van [uur] tot [uur]">
                                    </div>
                                </div>

                                {{-- Button groups --}}
                                <div style="padding-bottom: 15px;" class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success">Insturen</button>
                                    <button type="reset" class="btn btn-sm btn-danger">reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            <!-- /Tab panes -->

        </div>
    </div>
@stop