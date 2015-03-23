@extends('header')

@section('content')
		<div class="container">
			<div class="content">
				<div class="title">Thank you!</div>
				<div class="quote">Here's the numbers so far:</div>
				<div class="quote">{{$is_playing}} playing out of {{$total}} decided.</div>
				<div class="quote">{{$undecided}} still undecided.</div>
			</div>
		</div>
@endsection