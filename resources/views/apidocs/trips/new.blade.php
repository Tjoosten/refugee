<h3>Aanmaken van een rit</h3>

<table>
    <tbody>
        <tr>
            <td style="width: 25%"><strong>URL:</strong></td>
            <td><code>{{ url('api/tips/new') }}</code></td>
        </tr>
        <tr>
            <td style="width: 25%"><strong>AUTH:</strong></td>
            <td><code>?api_token={uw token}</code></td>
        </tr>
        <tr>
            <td style="width: 25%"><strong>METHOD:</strong></td>
            <td><code>POST</code></td>
        </tr>
    </tbody>
</table>

<h5>Parameters:</h5>

<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th style="width:10%;">Attribuut:</th>
            <th style="width:12%">Data type:</th>
            <th style="width:12%">Vereiste:</th>
            <th style="width:40%">Beschrijving:</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>new</code></td>
            <td><code>string</code></td>
            <td><span class="label label-danger">Required</span></td>
            <td>The name of the driver.</td>
        </tr>
        <tr>
            <td><code>email</code></td>
            <td><code>string</code></td>
            <td><span class="label label-danger">Required</span></td>
            <td>Het email adres van de trip verantwoordelijke.</td>
        </tr>
    </tbody>
</table>

<p>
    {need to make doc section}
</p>