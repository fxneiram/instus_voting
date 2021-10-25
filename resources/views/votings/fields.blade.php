<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Begin At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('begin_at', 'Begin At:') !!}
    {!! Form::text('begin_at', null, ['class' => 'form-control','id'=>'begin_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#begin_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_at', 'End At:') !!}
    {!! Form::text('end_at', null, ['class' => 'form-control','id'=>'end_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush