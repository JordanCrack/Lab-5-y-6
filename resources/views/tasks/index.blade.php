@extends('tasks.layouts')

@section('content')
    <div class="container py-4">
        <main>
            <div class="d-flex justify-content-between mb-4">
                <a href="/tasks/create" class="btn btn-link">Añadir Nueva Tarea</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Lista de Tareas</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Prioridad</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $task->id }}</th>
                                        <td><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ optional($task->priority)->name }}</td>
                                        <td>{{ optional($task->user)->name }}</td>
                                        <td>
                                            @if ($task->completed)
                                                <span class="badge bg-light text-success">Completada</span>
                                            @else
                                                <form action="/tasks/{{ $task->id }}/complete" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Completar</button>
                                                </form>
                                            @endif
                                            <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-outline-secondary">Editar</a>
                                            <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
