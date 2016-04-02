@extends('layouts.app')
@section('main')
	<div id='carousel-home'>
		@include('contents.carousel')
		@include('contents.carouselThumbnail')
		@include('inputs.searchHome')
	</div>
	<div id='body-content' class="container-fluid no-boundry">
		@include('contents.exprienceReportShowcase')
		@include('contents.experienceProjectsnReports')
	</div>
		
@endsection