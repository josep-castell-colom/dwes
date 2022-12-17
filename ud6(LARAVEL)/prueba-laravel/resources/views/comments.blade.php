@extends('layouts.dashboard')

@section('title')
Formulario básico
@endSection

@section('content')
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title">Comentarios</h3>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Comentario</th>
              </tr>
            </thead>
            <tbody>
              @forelse($comments as $comentario)
                <tr>
                  <td>{{ $comentario->id }}</td>
                  <td>{{ $comentario->name }}</td>
                  <td>{{ $comentario->created_at }}</td>
                  <td>{{ $comentario->body }}</td>
                </tr>
              @empty
                <tr><td>No hay ningún comentario</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @if($errors->any())
      @foreach($errors->all() as $error)
        <p class="bg-warning p-3">{{ $error }}</p>
      @endforeach
    @endif
    <form method="POST" action="{{ route('comments') }}">
      @csrf
      <div class="row">
        <div class="col">
          <!-- textarea -->
          <div class="form-group">
            <label for="body">Comentario</label>
            <textarea name="body" id="body" class="form-control mb-4" rows="3" placeholder="Introduce el texto aquí ..."></textarea>
            <button type="submit" class="form-control btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endSection
