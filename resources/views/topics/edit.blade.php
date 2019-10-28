@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Cr&er un topic</h2>
    <form action="{{route('topics.update', $topic->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Titre</label>
            <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Titre" value='{{$topic->title}}'>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection