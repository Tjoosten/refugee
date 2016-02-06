@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        @if(count($users) > 0)
            {{-- Users table --}}
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam:</th>
                        <th>Status:</th>
                        <th>Email:</th>
                        <th></th> {{-- Empty because the use of function buttons --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><code> #{!! $user->id !!} </code></td>

                            <td>{!! $user->name !!}</td>

                            <td>
                                @if($user->status == 1)
                                    <span class="label label-danger">Geblokkeerd</span>
                                @elseif($user->status == 0)
                                    <span class="label label-success">Actief</span>
                                @endif
                            </td>

                            <td>{!! $user->email !!}</td>

                            {{-- Functions --}}
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-danger btn-xs" href="{{ route('acl.block', ['status' => 1, 'id' => $user->id]) }}">
                                        <span class="fa fa-lock"></span>
                                    </a>

                                    @if(Auth::user()->is('admin'))
                                        <a class="btn btn-success btn-xs" href="{!! route('make.user', ['id' => $user->id]) !!}">
                                            <span class="fa fa-key"></span>
                                        </a>
                                    @else
                                        <a class="btn btn-danger btn-xs" href="{!! route('make.admin', ['id' => $user->id]) !!}">
                                            <span class="fa fa-key"></span>
                                        </a>
                                    @endif

                                    <a href="" class="btn btn-danger btn-xs">
                                        <span class="fa fa-user"></span>
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="">
                                        <span class="fa fa-close"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            {{-- Error warning  --}}
            <div class="alert alert-danger">
                <h3>Woops!</h3>
                <p>Er zijn nog geen gebruikers.</p>
            </div>
        @endif
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Filters:
            </div>
            <div class="list-group">
                <a class="list-group-item">
                    Alle gebruikers
                    <span class="pull-right badge"> {!! $all !!} </span>
                </a>
                <a class="list-group-item">
                    Actieve leden
                    <span class="pull-right badge"> {!! $active !!} </span>
                </a>
                <a class="list-group-item">
                    Geblokkeerd leden
                    <span class="pull-right badge"> {!! $blocked !!} </span>
                </a>
            </div>
        </div>
    </div>
</div>
@stop