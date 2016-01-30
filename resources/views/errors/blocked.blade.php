@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="alert alert-danger">
                <h3> Geen toegang!</h3>

                <p> Sorry, je bent gebanned... </p>

                <p>
                    Bij een ban wordt altijd een e-amil verstuurd naar je geregistreerde adres.
                    (in jouw geval {!! Auth::user()->email !!}). Dus controleer even je mail voordat je ons gaat
                    liggen mailen met vragen, geklaag, enz.... <br />

                    Mocht je na enkele uren na je deze mail enkule uren na de ban nog niet hebben ontvangen,
                    dan kun je contact opnemen met de <a href="">Webmaster</a>.
                </p>

                <p> <h4>Mogelijke oorzaken:</h4> </p>

                <p>
                    <ul class="list-unstyled">
                        <li> - Account misbruik. </li>
                        <li> - Discriminatie, Racisme. </li>
                        <li> - Offensief taalgebruik naar leden toe. </li>
                        <li> - Wan-gebruik van het platform. </li>
                    </ul>
                </p>

                <p style="padding-top: 7px;">
                    <a class="btn btn-danger" href="">
                        Ja, Ik begrijp het.
                    </a>
                    <a class="btn btn-danger" href="">
                        Contacteer ons.
                    </a>
                </p>
            </div>
        </div>
    </div>
@stop