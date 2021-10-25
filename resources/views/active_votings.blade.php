<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Votaciones Activas</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vontings as $voting)
                <tr>
                    <td>
                        {{$voting->name}}
                    </td>
                    <td>{{$voting->begin_at->diffForHumans()}}</td>
                    <td>
                        <span
                            class="text-{{$voting->end_at->diffInHours(\Carbon\Carbon::now()) <= 24 ? 'danger' : 'success'}} mr-1">
                            <i class="fa fa-clock"></i>
                            {{$voting->end_at->diffForHumans()}}
                        </span>

                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            @can('votar')
                                <a href="{{route('voting.choice', $voting->id)}}"
                                   class="btn btn-default btn-sm text-muted"
                                   title="Votar">
                                    <i class="fas fa-edit"></i>
                                    Votar
                                </a>
                            @endcan
                            @can('gestion votacion')
                                <a href="#" class=" btn btn-default btn-sm text-muted" title="Resultados">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
