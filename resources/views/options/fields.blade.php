<!-- Voting Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_id', 'Voting Id:') !!}
    {!! Form::number('voting_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 125]) !!}
</div>