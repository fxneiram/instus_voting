{!! Form::open(['route' => ['votings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('votings.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('votings.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    <a href="{{ route('options.index', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-cog"></i>
    </a>
    <a href="{{ route('votings.publish', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-gavel"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
