@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.project.store') }}" enctype='multipart/form-data' method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"></input>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="creation_date" class="form-label">Data</label>
            <input type="date" class="form-control" id="creation_date" name="creation_date"
                value="{{ old('creation_date') }}"></input>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input name="image" id="image" class="form-control" type="file" onchange="showImage(event)">
            <img class="w-25" id="p-img" src="" alt="">
        </div>


        <button type="submit" class="btn btn-primary">invia</button>


    </form>

    <script>
        function showImage(event) {
            const pimg = document.getElementById('p-img');
            pimg.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
@endsection
