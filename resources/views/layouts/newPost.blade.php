@extends('layouts.app')

@section('additional-scripts')
    <script src='/javascripts/dist/vibrant.min.js' ></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.min.js' ></script>
    <script src='/tinymce/tinymce.min.js' ></script>
    @parent
    <script  src='/javascripts/dist/post.babeled.min.js' ></script>
@endsection

@section('main')
    @parent
    <div class='container-fluid'>
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-2">
            @include('inputs.newPost')
        </div>
    </div>
@endsection