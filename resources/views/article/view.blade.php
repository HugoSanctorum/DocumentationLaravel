@extends('layouts.overlay')

@section('content')	

	<a href="{{ route('article.edit', ['article' => $article->id]) }}"><span class="glyphicon glyphicon-pencil" title="Edit" style="float: right;display: inline-block;font-size: 30px;vertical-align: middle;"></span></a>
	<h2>{{ $article->title }}</h2>
	<h5 style="font-style: italic;">Written by {{ $article->author }}</h5>
	<h6 style="font-style: italic; color:grey">
		Edited last by
		@if(!empty($editors))
			{{ $editors[count($editors)-1]->name.' on '.$article->updated_at }}
		@else
			{{ $article->author.' on '.$article->created_at }}
		@endif
		&nbsp;&nbsp;
		<a id="editorModalTrigger" href="#editorsModal"><small>edit log <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></small></a>
	</h6>
	<div style="display: none;" id="editorCollapse" class="well">
    	<ul>
            @foreach($editors as $editor)
				<li>edited by {{ $editor->name }} on {{ $article->updated_at }}</li>
			@endforeach
		</ul>
	</div>
	<hr />	
	<p>{!! html_entity_decode($article->content) !!}</p>
@endsection

@section('scripts')
	<script>
		$('#editorModalTrigger').click(function(){
			$('#editorCollapse').slideToggle('slow');
		})
	</script>
@endsection