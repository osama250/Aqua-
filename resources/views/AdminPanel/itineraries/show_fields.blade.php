<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $itinerary->id }}</p>
</div>

<!-- Trip Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('trip_category_id', 'Trip Category Id:') !!}
    <p>{{ $itinerary->trip_category_id }}</p>
</div>

<!-- Day Field -->
<div class="col-sm-12">
    {!! Form::label('day', 'Day:') !!}
    <p>{{ $itinerary->day }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $itinerary->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $itinerary->updated_at }}</p>
</div>

