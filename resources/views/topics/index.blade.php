@extends('layouts.app')
@section('content')
<div class="container">
    <div class="">
        <h2>Liste des topics</h2>
        <a href="{{route('topics.create')}}" class="btn btn-info float-right" >Ajouter un nouveau topic</a>
        @foreach($topics as $topic)
            <h2><a href="{{route('topics.show', $topic->slug)}}">{{$topic->title}}</a></h2>
            <ul>
            @foreach($topic->posts as $post)
                <li> <strong> {{$post->title}} </strong> <br>
                    <span> {{$post->user->name}} </span>
                </li>
            @endforeach
            </ul>
        @endforeach
    </div>
</div>
@endsection