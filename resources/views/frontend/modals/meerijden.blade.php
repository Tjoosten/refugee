<!-- Modal -->
<div class="modal fade" id="meerijden" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rit intresse</h4>
            </div>
            <div class="modal-body">
                <p>
                    Bedankt voor uw intresse om met iemand mee te rijden naar Calais en of Duinkerke.
                    Hier onder kunt u invullen met hoeveel personen u zich wilt registreren om
                    mee te rijden. Vervolgens zullen wij voor u een mail sturen naar de Bestuurder van het
                    voertuig om hem op de hoogte te stellen van uw intresse.

                    @foreach($query as $trip)
                        <form method="POST" action="">

                            <div class="form-group">
                                <label for="passenger">Passagiers:</label>
                                <input id="passenger" style="width: 15%" class="form-control" type="number" value="0" max="{!! $trip->places !!}" />
                            </div>
                    @endforeach
                    </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Versturen</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>