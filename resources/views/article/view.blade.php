@extends('layouts.overlay')

@section('content')	
	<a href="{{ route('article.edit', ['article' => $article->id]) }}"><span class="glyphicon glyphicon-pencil" title="Edit" style="float: right;display: inline-block;font-size: 30px;vertical-align: middle;"></span></a>
	<h2>{{ $article->title }}</h2>
	<h5 style="font-style: italic;">Written by {{ $article->author }}</h5>
	<h6 style="font-style: italic; color:grey">Edited by ...</h6>
	<hr />
	<p>{{ $article->content }}</p>
@endsection