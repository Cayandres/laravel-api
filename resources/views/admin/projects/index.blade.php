@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <a href="{{ route('admin.project.create') }}" class="btn btn-secondary btn-lg m-4">Aggiungi Nuovo Progetto</i></a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Azioni</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tag</th>
                <th scope="col">Elimina</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->creation_date }}</td>
                    <td>

                        <a href="{{ route('admin.project.show', $project) }}" class="btn btn-info"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary"><i
                                class="fa-solid fa-pencil"></i></a>

                    </td>

                    <td>
                        <div class="badge text-bg-primary">{{ $project->category?->name }}</div>
                    </td>

                    <td>
                        @forelse ( $project->tags as $tag )

                        <span class="badge text-bg-secondary">{{ $tag->name }}</span>

                        @empty

                        <span>-no tag-</span>

                        @endforelse
                    </td>

                    <td>

                        <form class="d-line" action="{{ route('admin.project.destroy', $project) }}" method="POST"
                         onsubmit="return confirm('Confermi di volerlo eliminare')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                title="Elimina">elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
