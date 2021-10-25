@extends('layouts.app')

@push('page_css')
    <style>
        button.chosen-option {
            width: 100%;
            background-color: unset;
            border: unset;
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$voting->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('home') }}">
                        Back
                    </a>
                </div>
                <div class="col-sm-12">
                    {!!  $voting->description !!}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-center">Sus Opciones</h5>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            @foreach($voting->options as $option)
                                <div class="col-md-12 col-sm-12 col-12">
                                    {!! Form::open(['route' => ['voting.chose', $voting]]) !!}
                                    @csrf
                                    {{ Form::hidden('option_id', $option->id) }}
                                    {{ Form::hidden('voting_id',  $voting->id) }}
                                    {{ Form::hidden('user_id',  0) }}
                                    <button type="submit" class="chosen-option" title="Vote Aquí">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i
                                                    class="fas fa-hand-point-up"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">{{$option->description}}</span>
                                                <span class="info-box-number">Click Para Votar</span>
                                            </div>
                                        </div>
                                    </button>
                                    </form>
                                    <hr>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
