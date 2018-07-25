@extends('layouts.overlay')

@section('content')

	<div class="jumbotron" style="padding-left: 5%;">
		<h2><b>Article</b> Editor</h2>
	</div>
	@guest
		<div class="jumbotron" style="text-align: center;">
			<h2 style="color: #C9302C">You must be <a href="{{ route('login') }}"><b style="color: #C9302C;text-decoration: underline;">logged</b></a> to edit Article</h2>
		</div>
	@else
		<div class="container">
			<div class="row">
				<section>
	            	<form method="post" action="{{route('article.update', ['article' => $article])}}" enctype="multipart/form-data">
		            	{!! csrf_field() !!}
		            	{!! method_field('PUT') !!}
                       	<input type="text" required class="form-control" value="{{ $article->title }}" name="title">
                       	<br />
                        <textarea required name="content" id="froala-editor">{{ $article->content }}</textarea>
                       	<br />
                       	<select required class="form-control" name="idSection">
                       		@foreach(App\Section::All() as $section)
                       			@if ($article->idSection == $section->id)
                       				<option selected value="{{ $section->id }}">{{ $section->title }}</option>
                       			@else
                       				<option value="{{ $section->id }}">{{ $section->title }}</option>
                       			@endif
                            @endforeach
                       	</select>
                       	<br />
                       	<input type="hidden" value="{{ Auth::user()->id }}" name="editor">
						<button type="submit" class="btn btn-primary next-step">Edit Article</button>
	            	</form>
		    	</section>
			</div>
		</div>
	@endguest
@endsection