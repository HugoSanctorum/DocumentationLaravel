@extends('layouts.overlay')

@section('content')	
	<div class="jumbotron" style="padding-left: 5%;">
		<h1>Welcome on the <b>Wiki</b></h1>
		<p>of the Detector Unit</p>
	</div>

	<div class="well">
		<div class="row">
			<div class="col-md-6">
				<div class="jumbotron">
					<div class="container" style="text-align: center;">
						<h3>Create a new <b>Section</b></h3> 
						<br />
						<p><a class="btn btn-default btn-lg btn-block" href="{{ URL('section/create') }}" role="button"><b><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></b></a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="jumbotron">
					<div class="container" style="text-align: center;">
						<h3>Create a new <b>Article</b></h3> 
						<br />
						<p><a class="btn btn-default btn-lg btn-block" href="{{ URL('article/create') }}" role="button"><b><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></b></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="well">
		<h2>Browse Sections in the <b>Wiki</b></h2>

		<input id="searchInput" onkeyup="search()" placeholder="Search for a Section .." />

		<ul id="searchContent" class="list-unstyled components">
			@foreach($sections as $section)
				<li>
					<a class="first-range" href="{{ URL('section/'.$section->id) }}">{{ $section->title }}</a>
				</li>
			@endforeach
		</ul>
	</div>
@endsection