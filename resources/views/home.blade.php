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
            <a class="btn btn-primary btn-lg" href="">
                <span class="fa fa-btn fa-asterisk"></span> Acties
            </a>
            <a class="btn btn-primary btn-lg" href="{!! route('trips.index', ['selector' => 'all']) !!}">
                <span class="fa fa-btn fa-car"></span> Ritten
            </a>
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
        <h2>Inzamelpunten</h2>

        <p>
            Hebt u spullen die u niet meer gebruikt? En u wilt ze weghebben.
            Dan kunt u eventueel een vluchteling helpen en je spullen doneren.
            Zodat vrijwilligers deze voor u kunnen brengen naar de vluchtelingen
            kampen...
        </p>

        <a class="btn btn-default" href="{{ route('points.index') }}">Lees meer</a>
    </div>

    <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
        <h2>Ritten</h2>

        <p>
            Wilt u rijden naar een kamp of wilt u wel gaan maar hebt u geen vervoer.
            Dat kan dit platform u eventueel helpen om toch daar te geraken. U kunt
            simpelweg een zit aanmaken en of zoeken naar de locatie die u wenst te
            bezoeken
        </p>

        <a class="btn btn-default" href="{!! route('trips.index', ['selector' => 'all']) !!}">
            Lees meer
        </a>
    </div>

    <div class="col-sm-4 col-sm-4 col-xs-4 col-lg-4">
        <h2>Acties</h2>

        <p>
            Buiten ritten en spullen inzameling organiseren vrijwilligers ook een tal
            van evenementen in de kampen. Deze acties zijn bedoeld om alle problemen
            onder de vluchtelingen te vergeten. En even plezier te brengen
        </p>

        <a class="btn btn-default" href="">Lees meer</a>
    </div>
</div>

<hr>
<footer>
    <p>
        <span class="pull-left">
            © {{ date('Y') }} Solidarity for all.
        </span>

        <span class="pull-right">
            <a href="">NL</a> |
            <a href="">EN</a> |
            <a href="">FR</a>
        </span>
</footer>
@endsection
