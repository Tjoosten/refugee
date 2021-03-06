@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10"><h1>{!! Auth::user()->name !!}</h1></div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right">
                <img title="profile image" style="height: 100px; width: 100px;" class="img-circle img-responsive" src="{{ url('/images/_DSC4028.jpg') }}">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profiel:</li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong>Naam:</strong></span> {!! Auth::user()->name !!}
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong>Email:</strong></span> {!! Auth::user()->email !!}
                </li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Machtegingen:

                    @if(Auth::user()->is('admin'))
                        <a href="{!! url('profile/permissions') !!}" class="pull-right">
                            <span class="fa fa-wrench">
                        </a>
                    @endif
                </div>
                <div class="panel-body">
                    @foreach(Auth::user()->roles as $role)
                        <span class="label label-danger">{!! $role->name !!}</span>
                    @endforeach
                </div>
            </div>

        </div><!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li @if(Request::is('profile')) class="active" @endif>
                    <a href="#ritten" data-toggle="tab">Ritten</a>
                </li>
                <li @if(Request::is('profile/edit')) class="active" @endif>
                    <a href="#account" data-toggle="tab">Account configuratie</a>
                </li>
                <li @if(Request::is('profile/edit/api')) @endif>
                    <a href="#api" data-toggle="tab">API configuratie</a>
                </li>
                <li @if(Request::is('profile/permissions') && Auth::user()->is('admin')) class="active" @endif>
                    <a href="#permission" data-toggle="tab">Permissies</a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane @if(Request::is('profile')) active @endif" id="ritten">
                    <div style="padding-top: 15px;">
                        @if(count($query) > 0)
                            <table class="table table-hover table-condensed table-bordered">
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
                                    @foreach($query as $data)
                                        <tr>
                                            <td> <code> #{!! $data->id !!} </code> </td>
                                            <td> {!! $data->date !!} </td>
                                            <td> {!! $data->region !!} </td>
                                            <td>
                                                @if($data->destination == 1)
                                                    Calais
                                                @elseif($data->destination == 2)
                                                    Duinkerke
                                                @endif
                                            </td>
                                            <td> {!! $data->places !!} </td>

                                            @if($data->user_id === Auth::user()->id)
                                                <td>
                                                    <a href="" style="margin-right: 4px;" class="label label-danger">
                                                        Bewerken
                                                    </a>
                                                    <a href="{{ route('trips.delete', ['id' => $data->id])  }}" class="label label-danger">
                                                        Verwijderen
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif(count($query) === 0)
                            <div class="alert alert-warning">
                                <h4>Waarschuwing.</h4>

                                <p> U hebt nog geen ritten naar duinkerke of calais gepland. </p>
                            </div>
                        @endif
                    </div>
                </div>{{-- /tab-pane --}}

                <div class="tab-pane @if(Request::is('profile/edit')) active @endif" id="account">
                    <div style="padding-top: 15px;">
                        {{ Form::open(array('url'=>'/profile/edit','files'=>true)) }}

                            <!-- Name field -->
                            <div class="form-group required">
                                <label for="name" class="control-label">Naam:</label>
                                <input id="name" style="width: 30%;" type="text" value="{!! Auth::user()->name !!}" disabled class="form-control">
                            </div>

                            <!-- Email field -->
                            <div class="form-group required">
                                <label for="email">Email:</label>
                                <input style="width: 30%;" class="form-control" type="email" value="{!! Auth::user()->email !!}">
                            </div>

                            <!-- Password field -->
                            <div class="form-group">
                                <label for="password"> Wachtwoord: </label>
                                <input id="password" placeholder="Wachtwoord" style="width: 30%;" type="text" class="form-control">
                                <small class="help-block">Indien niet te wijzigen kunt u dit leeglaten.</small>
                            </div>

                            <button type="submit" class="btn btn-success">
                                Wijzigen
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </form>
                    </div>
                </div>

                <div class="tab-pane @if(Request::is('profile/edit/api')) @endif" id="api">
                    <div style="padding-top: 15px;">
                        <form method="POST" action="{!! route('api.regenerate') !!}">
                            {{-- CSRF protection --}}
                            {!! csrf_field() !!}

                            <label for="user-email">E-mail:</label>
                            <input id="user-email" style="width: 30%" disabled value="{!! Auth::user()->email !!}" class="form-control" type="text">
                            <br />

                            <label for="api-key">API sleutel:</label>
                            <input id="api-key" style="width: 65%" value="{!! Auth::user()->api_token !!}" disabled class="form-control" type="text">
                            <br />

                            <button class="btn btn-primary" type="submit">Regenerate</button>
                        </form>
                    </div>
                </div> {{-- /tab-pane --}}

                <div class="tab-pane @if(Request::is('profile/permissions') && Auth::user()->is('admin')) @endif" id="permission">
                    <div style="padding-top: 15px;">
                        {{ Form::open(array('url'=>'','files'=>true)) }}
                            {{-- CSRF protection --}}
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Permissie:</th>
                                                <th>Y</th>
                                                <th>N</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> {{-- Tab pane --}}

            </div> {{-- /tab-content --}}

        </div><!--/col-9-->
    </div><!--/row-->
@stop