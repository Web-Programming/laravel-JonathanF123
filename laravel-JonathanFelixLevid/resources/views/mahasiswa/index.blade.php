@extends('layout.master')
@section('title', 'Halaman Mahasiswa')

@section('content')

<table class="table table-stripped">
    <thead>
        <tr>
            <th>
                NPM
            </th>
            <th>
                Nama Mahasiswa
            </th>
            <th>
                Nama Prodi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allmahasiswa as $item)
        <tr>
            <td>
                {{$item->npm}}
            </td>
            <td>
                {{$item->nama}}
            </td>
            <td>
                {{ $item->prodi->nama }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
