<div id="wijzigen" class="modal fade" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Trip wijzigen</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @foreach($query as $trip)

                        {{-- Email field: --}}
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" name="email" value="{!! $trip->email !!}" class="form-control" style="width: 50%;">
                        </div>

                        {{-- Telephone field --}}
                        <div class="form-group">
                            <label for="telephone">Telefoon nr:</label>
                            <input id="telephone" name="telephone" class="form-control" style="width: 50%;" value="{!! $trip->telephone !!}">
                        </div>

                        {{-- Region field --}}
                        <div class="form-group">
                            <label for="region">Vertek regio:</label>
                            <input id="region" name="region" class="form-control" style="width: 50%" value="{!! $trip->region !!}">
                        </div>

                        {{-- Datum vertrek field --}}
                        <div class="form-group">
                            <label for="departure">Datum vertrek:</label>
                            <input id="departure" name="date" class="form-control" style="width: 50%;" value="{!! $trip->date !!}">
                        </div>

                        {{-- Places field --}}
                        <div class="form-group">
                            <label for="places">Beschikbare plaatsen:</label>
                            <input id="places" name="places"  class="form-control" style="width: 20%" value="{!! $trip->places !!}">
                        </div>
                    @endforeach
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Wijzigen</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>