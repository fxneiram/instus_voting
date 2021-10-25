<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $voting->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $voting->description }}</p>
</div>

<!-- Begin At Field -->
<div class="col-sm-12">
    {!! Form::label('begin_at', 'Fecha Inicio:') !!}
    <p>{{ $voting->begin_at }}</p>
</div>

<!-- End At Field -->
<div class="col-sm-12">
    {!! Form::label('end_at', 'Fecha Fin:') !!}
    <p>{{ $voting->end_at }}</p>
</div>

