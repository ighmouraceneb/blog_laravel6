@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Liste de mes topics</h2>
        <a href="{{route('topics.create')}}" class="btn btn-info float-right" >Ajouter un nouveau topic</a>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Titre</th>
                <th>Créé</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->id}}</td>
                    <td>{{$topic->title}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td> <a href="{{route('topics.edit', $topic->id)}}" class="btn btn-link">Modifier</a>
                    <form action="{{route('topics.destroy', $topic->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection