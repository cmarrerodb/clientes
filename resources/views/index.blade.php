@php
@endphp
@extends('layout')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <div class="card card-header">
            {{ config('lenguages.'.app()->getLocale().'.CLIENT_ADMIN') }}
        </div>
        <div class="col-md-2 col-md-offset-3 text-right">
            <strong>{{ config('lenguages.'.app()->getLocale().'.SELECT_LANGUAGE') }}: </strong>
        </div>
        <div>
            {{-- <a href="{{ route('clientes.create')}}" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.ADD') }}</a> --}}
            <a href="{{ route('create')}}" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.ADD') }}</a>
            <a href="{{ route('LangChange')."?lang=en&vista=index" }}" class="btn btn-success">English</a>
            <a href="{{ route('LangChange')."?lang=es&vista=index" }}" class="btn btn-warning">Español</a>
        </div>
        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>Rut</td>
                <td>{{ config('lenguages.'.app()->getLocale().'.CLIENT_FANTASY') }}</td>
                <td>{{ config('lenguages.'.app()->getLocale().'.CLIENT_NAME') }}</td>
                <td>{{ config('lenguages.'.app()->getLocale().'.CLIENT_ADDRESS') }}</td>
                <td colspan="2">{{ config('lenguages.'.app()->getLocale().'.ACTION') }}</td>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->rut }}</td>
                        <td>{{ $cliente->nombre_fantasia }}</td>
                        <td>{{ $cliente->razon_social }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        {{-- <td><a href="{{ route('edit', $cliente->id)}}" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.EDIT') }}</a></td> --}}
                        <td><a href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.EDIT') }}</a></td>
                        <td>
                            <form action ="{{ route('clientes.destroy',$cliente->id) }}" method="post">
                            {{-- <form action ="{{ route('destroy',$cliente->id) }}" method="post"> --}}
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ config('lenguages.'.app()->getLocale().'.DELETE') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
