@extends('layout')
@section('content')
    <style>
        .uper{
            margin-top:40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            {{ config('lenguages.'.app()->getLocale().'.EDIT_CLIENT') }}
        </div>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        <form method="post" action="{{ route('clientes.update',$cliente->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="rut">Rut</label>
                <input type="text" class="form-control" name="rut" value="{{ $cliente->rut }}"/>
            </div>

            <div class="form-group">
                <label for="nombre_fantasia">{{ config('lenguages.'.app()->getLocale().'.CLIENT_FANTASY') }}</label>
                <input type="text" class="form-control" name="nombre_fantasia" value="{{ $cliente->nombre_fantasia }}"/>
            </div>

            <div class="form-group">
                <label for="razon_social">{{ config('lenguages.'.app()->getLocale().'.CLIENT_NAME') }}</label>
                <input type="text" class="form-control" name="razon_social" value="{{ $cliente->razon_social }}"/>
            </div>

            <div class="form-group">
                <label for="direccion">{{ config('lenguages.'.app()->getLocale().'.CLIENT_ADDRESS') }}</label>
                <input type="text" class="form-control" name="direccion" value="{{ $cliente->direccion }}"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.UPDATE') }}</button>
        </form>
    </div>
@endsection
