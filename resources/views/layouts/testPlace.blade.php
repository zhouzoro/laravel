@extends('layouts.app')

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

@section('main')
    @parent
    @include('components.geoname')
@endsection