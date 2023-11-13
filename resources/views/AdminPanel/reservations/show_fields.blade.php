<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $reservation->id }}</p>
</div>

<!-- Trip Id Field -->
<div class="col-sm-12">
    {!! Form::label('trip_id', 'Trip Id:') !!}
    <p>{{ $reservation->trip_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $reservation->user_id }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $reservation->price }}</p>
</div>

<!-- Comment Field -->
<div class="col-sm-12">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $reservation->comment }}</p>
</div>

<!-- Uuid Field -->
<div class="col-sm-12">
    {!! Form::label('uuid', 'Uuid:') !!}
    <p>{{ $reservation->uuid }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $reservation->status }}</p>
</div>

<!-- Payment Res Code Field -->
<div class="col-sm-12">
    {!! Form::label('payment_res_code', 'Payment Res Code:') !!}
    <p>{{ $reservation->payment_res_code }}</p>
</div>

<!-- Payment Res Msg Field -->
<div class="col-sm-12">
    {!! Form::label('payment_res_msg', 'Payment Res Msg:') !!}
    <p>{{ $reservation->payment_res_msg }}</p>
</div>

<!-- Payment Res Full Field -->
<div class="col-sm-12">
    {!! Form::label('payment_res_full', 'Payment Res Full:') !!}
    <p>{{ $reservation->payment_res_full }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $reservation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $reservation->updated_at }}</p>
</div>

