@extends('layouts.app')
@section('main')
	@parent
	<!--carousel-->
	<div id='carousel-home'>
		@include('contents.carousel')
		@include('inputs.searchHome')
	</div>
	<!--main contents====================================-->
	<div id='body-content' class="container-fluid no-boundry">
		<div class="container-fluid no-boundry">
		    <div class="no-boundry col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				@include('contents.homeInfoCenter')
				@include('contents.exprienceReportShowcase')
				<!--left side=================-->
		        <div class="content-side-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
		            @include('contents.homeSide')
		        </div>
				<!--=================left side-->

				<!--article list=================-->
		        <div id="content-main" class="no-boundry col-xs-12 col-sm-8 col-md-8 col-lg-8">
		            @include('layouts.articleList')
		        </div>
				<!--=================article list-->
		        <div class="content-side-right col-xs-12 col-sm-4 col-md-4 col-lg-4">
		            @include('contents.homeSide')
		        </div>
		    </div>
		</div>
	</div>
	<!--========================================main contents-->
		
@endsection