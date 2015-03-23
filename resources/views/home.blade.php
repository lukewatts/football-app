@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-body">
				@if ($decision_made)
					<div class="content">
						<div class="title">Football App</div>
						<div class="quote">Here's the numbers so far:<br />
							{{$is_playing}} playing out of {{$total}} decided.<br />
							{{$undecided}} still undecided.
						</div>
					</div>
				@else
					<form class="form-horizontal" role="form" method="POST" action="/public/decision/store">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<section class="main">

								<select id="cd-dropdown" class="cd-select">
									<option value="-1" selected>Will you play this Friday?</option>
									<option value="1">Yes</option>
									<option value="2">No</option>
								</select>
							</section>
						</div>
						<div class="form-group">
							<button type="submit" class="choice-submit btn btn-primary">
								Submit
							</button>
						</div>
					</form>
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
