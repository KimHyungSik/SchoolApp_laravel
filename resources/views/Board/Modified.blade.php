@extends('layouts.BottomNavigation')

@section('content')
	<form action="{{route('PostModifiedBoard',['id'=>$board_id])}}" method="POST">
		@csrf
		<input type='text' name='title' value='{{$data['title']}}'/>
		<textarea name='content'>
			{{$data['content']}}
		</textarea>
		<input type='submit'/>
	</form>
@endsection

