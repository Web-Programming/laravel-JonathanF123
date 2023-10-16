{{-- @include('layout.header', ['title' => 'Halaman Fakultas']) --}}
@extends('layout.master')
@section('title','Halaman Fakultas')

@section('content')

<h2>Faklultas</h2>
{{-- {(-- - {{silkom}} - --)} --}}

<ul>
    @if(count($fakultas) > 0)
        @foreach ($fakultas as $item)
            <li>{{$item}}</li>
        @endforeach
    @else
        <li>Belum ada data</li>
    @endif
</ul>
@endsection
{{-- @include('layout.footer') --}}
