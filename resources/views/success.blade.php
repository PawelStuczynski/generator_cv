
@extends('layouts.app')
@section('title','Generator CV')
@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="justify-content-center  w3-animate-zoom" style="height: 100vh; display: flex; align-items: center; flex-direction: column " >
    <div style="margin: 5px 0 5px 0">
        <h1 style="color: #1c7430; text-align: center ">Dziękuję za wypełnienie formularza</h1>
    </div>
    <div style="margin: 5px 0 5px 0" >
        <button class="btn btn-primary">Pobierz PDF</button>
    </div>
   {{$form->name}}
</div>

@endsection
