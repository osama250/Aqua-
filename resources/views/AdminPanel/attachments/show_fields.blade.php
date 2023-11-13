<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $attachment->id }}</p>
</div>

<!-- Factsheet Field -->
<div class="col-sm-12">
    {!! Form::label('factsheet', 'Factsheet:') !!}
    <p>{{ $attachment->factsheet }}</p>
</div>

<!-- Itinerary Field -->
<div class="col-sm-12">
    {!! Form::label('itinerary', 'Itinerary:') !!}
    <p>{{ $attachment->itinerary }}</p>
</div>

<!-- Sightseeing Field -->
<div class="col-sm-12">
    {!! Form::label('sightseeing', 'Sightseeing:') !!}
    <p>{{ $attachment->sightseeing }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $attachment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $attachment->updated_at }}</p>
</div>

