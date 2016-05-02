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
    <div class='container-fluid no-boundry'>
        <div class='post-hero'>
            <a class="hero-btn" onclick='uploadHero()'><i class="fa fa-picture-o" aria-hidden="true"></i><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            @include('inputs.newPost')
        </div>
    </div>
    <div>
        <a href="">继续编辑</a><a href="">完成发布</a>
    </div>
    @include('components.geoname')
@endsection