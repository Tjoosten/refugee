
<h3 id="routering">Routering</h3>

<p>
    De api heeft verschillende endpoints. Alle endpoints worden hieronder voor u nog is opgesomd.
</p>

<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>URI:</th>
                <th>GET:</th>
                <th>POST:</th>
                <th>DELETE:</th>
                <th>UPDATE:</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {!! url('api/trips') !!}</td>
                    <td><code> Ok </code></td>
                    <td><code> - </code></td>
                    <td><code> - </code></td>
                    <td><code> - </code></td>
                </tr>
                <tr>
                    <td> {!! url('api/trips/{id}') !!}</td>
                    <td><code> Ok </code></td>
                    <td><code> - </code></td>
                    <td><code> Ok </code></td>
                    <td><code> Ok </code></td>
                </tr>
                <tr>
                    <td> {!! url('api/profile') !!} </td>
                    <td><code> Ok </code></td>
                    <td><code> - </code></td>
                    <td><code> - </code></td>
                    <td><code> - </code></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>