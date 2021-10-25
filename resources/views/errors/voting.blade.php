@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Error</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i>
                        Oops! Su voto no se pudo registrar.
                        Intente de nuevo.
                    </h3>
                </div>
            </div>
        </div>
    </section>
@endsection
