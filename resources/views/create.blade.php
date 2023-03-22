@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    {{ config('lenguages.'.app()->getLocale().'.ADD_CLIENT') }}
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('clientes.store') }}">
          <div class="form-group">
              @csrf
              <label for="country_name">Rut:</label>
              <input type="text" class="form-control" name="rut"/>
          </div>
          <div class="form-group">
              <label for="cases">{{ config('lenguages.'.app()->getLocale().'.CLIENT_FANTASY') }}:</label>
              <input type="text" class="form-control" name="nombre_fantasia"/>
          </div>
          <div class="form-group">
              <label for="cases">{{ config('lenguages.'.app()->getLocale().'.CLIENT_NAME') }}:</label>
              <input type="text" class="form-control" name="razon_social"/>
          </div>
          <div class="form-group">
              <label for="cases">{{ config('lenguages.'.app()->getLocale().'.CLIENT_ADDRESS') }}:</label>
              <input type="text" class="form-control" name="direccion"/>
          </div>

          <button type="submit" class="btn btn-primary">{{ config('lenguages.'.app()->getLocale().'.SAVE') }}</button>
      </form>
  </div>
</div>
@endsection
