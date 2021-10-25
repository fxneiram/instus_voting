@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Página de Error</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger">403</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Algo salió mal.</h3>

                <p>
                    No tiene la autorización requerida.
                </p>
            </div>
        </div>
    </section>
@endsection
