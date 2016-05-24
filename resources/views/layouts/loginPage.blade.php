@extends('layouts.app')

@section('main')

    <div class='container-fluid no-boundry'>
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

			@include('inputs.login')
		</div>
    </div>
@endsection
@section('common-scripts')
	<script src="/javascripts/dist/vue.min.js"></script>
	@parent
@endsection
@section('footer')
@endsection