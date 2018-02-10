@extends('layouts.app')
@section('title','Generator CV')
@section('content')
    <div class="form">
        <form action="{{route('form.save')}}" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Podaj imię" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="surname" placeholder="Podaj nazwisko" class="form-control">
            </div>

            <div class="form-group">
                <button class="'btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
@endsection