@extends('layouts.BottomNavigation')

@section('content')
    <h1>Notice</h1>
    <ul>
    @foreach($notice_datas as $notice_data)
        <li>{{$notice_data->title}}</li>
    @endforeach
@endsection