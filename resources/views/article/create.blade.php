@extends('layouts.overlay')

@section('content')

	<div class="jumbotron" style="padding-left: 5%;">
		<h2><b>Article</b> Creator</h2>
	</div>
	@guest
		<div class="jumbotron" style="text-align: center;">
			<h2 style="color: #C9302C">You must be <a href="{{ route('login') }}"><b style="color: #C9302C;text-decoration: underline;">logged</b></a> to create a new Article</h2>
		</div>
	@else
		<div class="container">
			<div class="row">
				<section>
		        	<div class="wizard">
		            	<div class="wizard-inner">
		                	<div class="connecting-line"></div>
			                <ul class="nav nav-tabs" role="tablist">

			                    <li role="presentation" class="active">
			                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Presentation">
			                            <span class="round-tab">
			                                <i class="glyphicon glyphicon-folder-open"></i>
			                            </span>
			                        </a>
			                    </li>

			                    <li role="presentation" class="disabled">
			                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Choose a title">
			                            <span class="round-tab">
			                                <i class="glyphicon glyphicon-pencil"></i>
			                            </span>
			                        </a>
			                    </li>

			                    <li role="presentation" class="disabled">
			                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Write content">
			                            <span class="round-tab">
			                                <i class="glyphicon glyphicon-text-size"></i>
			                            </span>
			                        </a>
			                    </li>

			                    <li role="presentation" class="disabled">
			                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Choose a Section">
			                            <span class="round-tab">
			                                <i class=" glyphicon glyphicon-folder-open"></i>
			                            </span>
			                        </a>
			                    </li>

			                    <li role="presentation" class="disabled">
			                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
			                            <span class="round-tab">
			                                <i class="glyphicon glyphicon-ok"></i>
			                            </span>
			                        </a>
			                    </li>
			                </ul>
		            	</div>
		            	<form method="post" action="{{route('article.store')}}" enctype="multipart/form-data">
			            	{!! csrf_field() !!}
			                <div class="tab-content">
			                    <div class="tab-pane active" role="tabpanel" id="step1">
			                        <h3>You're about to create a new <b>Article</b></h3>
			                        <p>Proceed by clicking the "<i>Next</i>" button</p>
			                        <ul class="list-inline pull-right">
			                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
			                        </ul>
			                    </div>
			                    <div class="tab-pane" role="tabpanel" id="step2">
			                        <h3>Choose a <b>Title</b> for your new Article</h3>
			                       	<input type="text" required class="form-control" placeholder="Enter your title here .." name="title">
			                       	<br />
			                        <ul class="list-inline pull-right">
			                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
			                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
			                        </ul>
			                    </div>
			                    <div class="tab-pane" role="tabpanel" id="step3">
			                        <h3>Write your <b>content</b></h3>
			                       	<textarea required name="content" id="froala-editor"></textarea>
			                       	<br />
			                        <ul class="list-inline pull-right">
			                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
			                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
			                        </ul>
			                    </div>
			                    <div class="tab-pane" role="tabpanel" id="step4">
			                        <h3>Select a <b>Section</b> for your article</h3>
			                       	<select required class="form-control" name="idSection">
			                       		@foreach(App\Section::All() as $section)
			                                <option value="{{ $section->id }}">{{ $section->title }}</option>
			                            @endforeach
			                       	</select>
			                       	<br />
			                        <ul class="list-inline pull-right">
			                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
			                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
			                        </ul>
			                    </div>
			                    <div class="tab-pane" role="tabpanel" id="complete">
			                        <h3>Complete</h3>
			                        <p>You have completed all steps ! Click on "<i>Create Article</i>" to proceed.</p>
			                        <ul class="list-inline pull-right">
			                            <li><button type="submit" class="btn btn-primary next-step">Create Article</button></li>
			                        </ul>
			                    </div>
			                    <div class="clearfix"></div>
			                </div>
		            	</form>
		        	</div>
		    	</section>
			</div>
		</div>
	@endguest
@endsection