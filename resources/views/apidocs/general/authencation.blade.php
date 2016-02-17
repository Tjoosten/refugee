<h3>Authencatie</h3>

<p>
    Onze API heeft als authencatie een token. Een willekeurige gegenereerde
    karakter reeks die uit 60 tekens bestaat. Je kunt je request valideren door middel van
    <code>?api_token={uw token}</code> achter elke link van de api te plaatsen. Aangezien elke token request
    maar voor eenmalig gebruik is.
</p>

<p>
    U kunt tevens u token vinden door de volgende route te volgen:
</p>

<pre class="prettyprint" id="quine"> {!! Auth::user()->name !!} > Account configuratie > API configuratie</pre>

<p>
    <strong>Opgelet:</strong> De token is specifiek voor eigen gebruik bedoeld en ook strikt persoonlijk.
</p>

