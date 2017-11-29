<div>
    <h1>Yo dudes,</h1>
    <h2>you got a new sales inquiry!</h2>
    <div style="border:1px solid gray; padding:12px;">
        <h3>Interested in:</h3>
        <p>{{ $data->message }}</p>
        <h3>Email:</h3>
        @if($data->address)
        <p>{{ $data->address }}</p>
        @else
        <p>{{ $data->email_address }}</p>
        @endif
        @if ($data->name)
        <p>Name: {{ $data->name }}</p>
        @endif
    </div>
    <h2>Write them back!</h2>
</div>
