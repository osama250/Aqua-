<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $itineraryDetail->id }}</p>
</div>

<!-- Itinerary Id Field -->
<div class="col-sm-12">
    {!! Form::label('itinerary_id', 'Itinerary Id:') !!}
    <p>{{ $itineraryDetail->itinerary_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $itineraryDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $itineraryDetail->updated_at }}</p>
</div>

