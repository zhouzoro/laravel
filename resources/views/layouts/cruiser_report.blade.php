@extends('layouts.app')
@section('page-title')
	<title>{{$post->title.' -- '.'漫行邮轮'}}</title>
@endsection
@section('additional-styles')
    @parent
    <link rel="stylesheet" href="/stylesheets/dist/travelogue.min.css">
@endsection

@section('main')
	@parent
	@include('contents.cruiser_report')
@endsection