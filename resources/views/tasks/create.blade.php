@extends('tasks.layouts')

@section('content')
    <div class="container py-3">
        <h1 class="mb-4 text-dark">Crear Tarea</h1>
        <hr class="border-dark">
        <form action="/tasks" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-dark">Nombre</label>
                <input type="text" class="form-control border-dark text-dark bg-light" name="name" id="name" placeholder="Escribe el nombre de la tarea">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-dark">Descripción</label>
                <textarea class="form-control border-dark text-dark bg-light" name="description" id="description" rows="4" placeholder="Describe la tarea"></textarea>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label text-dark">Prioridad</label>
                <select class="form-select border-dark text-dark bg-light" name="priority" id="priority">
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="user" class="form-label text-dark">Usuario</label>
                <select class="form-select border-dark text-dark bg-light" name="user" id="user">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-dark">Crear Tarea</button>
            </div>
        </form>
    </div>
@endsection
