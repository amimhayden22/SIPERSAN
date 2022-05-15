@extends('layouts.app');
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id Kamar</th>
        <th scope="col">Nama Kamar</th>
        <th scope="col">Dormitory_id</th>
        <th scope="col">User_id</th>
      </tr>
    </thead>
    @foreach ($rooms as $room)
    <tbody>
        <tr>
          <th scope="row">{{ $room->id }}</th>
          <td>{{ $room->name }}</td>
          <td>{{ $room->dormitory_id }}</td>
          <td>{{ $room->user_id }}</td>
        </tr>
      </tbody>
    @endforeach
  </table>
    
@endsection