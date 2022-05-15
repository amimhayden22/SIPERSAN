@extends('layouts.app')
@section('content')
    <h1>Tambah Kamar</h1>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Room Name</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama kamar">
    </div>

    <select class="form-select" aria-label="Default select example">
        <option selected>Pilih Id Asrama</option>
        @foreach ($dormitories as $dormitory)
            <option value="{{ $dormitory->id }}">{{ $dormitory->id }}</option>
        @endforeach
    </select>
    
    {{-- <select class="form-select" aria-label="Default select example">
        <option selected>Pilih Id Ketua Kamar</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->id }}</option>
        @endforeach
    </select> --}}
      
    <button type="button" class="btn btn-success">Submit</button>

@endsection