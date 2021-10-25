<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $voting->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $voting->description }}</p>
</div>

<!-- Begin At Field -->
<div class="col-sm-12">
    {!! Form::label('begin_at', 'Begin At:') !!}
    <p>{{ $voting->begin_at }}</p>
</div>

<!-- End At Field -->
<div class="col-sm-12">
    {!! Form::label('end_at', 'End At:') !!}
    <p>{{ $voting->end_at }}</p>
</div>

