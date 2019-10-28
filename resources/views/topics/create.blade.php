@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Cr&er un topic</h2>
    <form action="{{route('topics.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Titre</label>
            <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Titre">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection