<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $trip->id }}</p>
</div>

<!-- Trip Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('trip_category_id', 'Trip Category Id:') !!}
    <p>{{ $trip->trip_category_id }}</p>
</div>

<!-- Check In Field -->
<div class="col-sm-12">
    {!! Form::label('check_in', 'Check In:') !!}
    <p>{{ $trip->check_in }}</p>
</div>

<!-- Check Out Field -->
<div class="col-sm-12">
    {!! Form::label('check_out', 'Check Out:') !!}
    <p>{{ $trip->check_out }}</p>
</div>

<!-- Cabin Count Field -->
<div class="col-sm-12">
    {!! Form::label('cabin_count', 'Cabin Count:') !!}
    <p>{{ $trip->cabin_count }}</p>
</div>

<!-- Suite Count Field -->
<div class="col-sm-12">
    {!! Form::label('suite_count', 'Suite Count:') !!}
    <p>{{ $trip->suite_count }}</p>
</div>

<!-- Cabin Available Field -->
<div class="col-sm-12">
    {!! Form::label('cabin_available', 'Cabin Available:') !!}
    <p>{{ $trip->cabin_available }}</p>
</div>

<!-- Suite Available Field -->
<div class="col-sm-12">
    {!! Form::label('suite_available', 'Suite Available:') !!}
    <p>{{ $trip->suite_available }}</p>
</div>

<!-- Cabin Price Field -->
<div class="col-sm-12">
    {!! Form::label('cabin_price', 'Cabin Price:') !!}
    <p>{{ $trip->cabin_price }}</p>
</div>

<!-- Suite Price Field -->
<div class="col-sm-12">
    {!! Form::label('suite_price', 'Suite Price:') !!}
    <p>{{ $trip->suite_price }}</p>
</div>

<!-- Single Cabin Price Field -->
<div class="col-sm-12">
    {!! Form::label('single_cabin_price', 'Single Cabin Price:') !!}
    <p>{{ $trip->single_cabin_price }}</p>
</div>

<!-- Single Suite Price Field -->
<div class="col-sm-12">
    {!! Form::label('single_suite_price', 'Single Suite Price:') !!}
    <p>{{ $trip->single_suite_price }}</p>
</div>

<!-- Is Home Field -->
<div class="col-sm-12">
    {!! Form::label('is_home', 'Is Home:') !!}
    <p>{{ $trip->is_home }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $trip->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $trip->updated_at }}</p>
</div>

