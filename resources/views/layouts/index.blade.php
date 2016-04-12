@extends('layouts.app')
@section('main')
	@parent
	<!--carousel-->
	<div id='carousel-home'>
		@include('contents.carousel')
		@include('contents.carouselThumbnail')
		@include('inputs.searchHome')
	</div>
	<!--main contents====================================-->
	<div id='body-content' class="container-fluid no-boundry">
		<!--exprienceReportShowcase======-->
		<div class="container-fluid no-boundry">
		    <div class="no-boundry col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				@include('contents.exprienceReportShowcase')
		    </div>
		</div>
		<!--========exprienceReportShowcase-->

		<!--experienceProjectsnReports======-->
		<div class="container-fluid no-boundry">
		    <div class="no-boundry col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				@include('contents.experienceProjectsnReports')
		    </div>
		</div>
		<!--========experienceProjectsnReports-->

		<!--home lower==================================-->
		<div class="container-fluid no-boundry">
		    <div class="no-boundry col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<!--left side=================-->
		        <div id="content-side" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		            @include('contents.homeSide')
		        </div>
				<!--=================left side-->

				<!--article list=================-->
		        <div id="content-main" class="no-boundry col-xs-12 col-sm-8 col-md-8 col-lg-8">
		            @include('layouts.articleList')
		        </div>
				<!--=================article list-->
		    </div>
		</div>
		<!--==================================home lower-->
	</div>
	<!--========================================main contents-->
		
@endsection


@section('additional-styles')
    @parent
    <link rel="stylesheet" href="/stylesheets/dist/upload.min.css">
@endsection


@section('additional-scripts')
    <script src='/javascripts/dist/vibrant.min.js' ></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.min.js' ></script>
    <script src='/tinymce/tinymce.min.js' ></script>
    @parent
    <script  src='/javascripts/dist/post.babeled.min.js' ></script>
@endsection