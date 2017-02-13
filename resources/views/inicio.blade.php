@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if(Auth::user()->getPerfil->idPerfil == 1 )
            <app></app>
        @elseif(Auth::user()->getPerfil->idPerfil == 2 )
            <super></super>
        @else
            <revisor></revisor>
        @endif


    </div>
@endsection
