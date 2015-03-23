@extends('app')

@section('content')
<div class="container">
@foreach ($users as $user)
<p>
	Name: {{$user->name}} <br />
	Email: {{$user->email}} <br />
	Registered: {{$user->created_at}} <br />
</p>
@endforeach
</div>
@endsection
