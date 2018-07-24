@extends('layouts.overlay')

@section('content')	
	<h2>Articles list for the section <b>{{ $title }}</b></h2>

		<input id="searchInput" onkeyup="search()" placeholder="Search for an article .." />

		<ul id="searchContent" class="list-unstyled components">
			@foreach($articles as $article)
				<li>
					<a class="first-range" href="{{ URL('article/'.$article->id) }}">{{ $article->title }}</a>
				</li>
			@endforeach
		</ul>
@endsection