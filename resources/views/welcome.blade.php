@extends('layouts.overlay')

@section('content')
    <h2>Welcome on the dynamic Documentation/Wiki of the Detector Unit</h2>
    
    <h4><i>Start your navigation using the sidebar on the left</i></h4>

    <div class="line"></div>

    <p>Make sure to be <a style="color:#24276B; text-decoration: underline;" href="{{ route('login') }}">logged</a> to create or modify article.</p>

    <div class="line"></div>

    <p>If you can't add or modify article <a style="color:#24276B; text-decoration: underline;" href="{{ route('contact') }}">contact</a> the administrator.</p>

@endsection