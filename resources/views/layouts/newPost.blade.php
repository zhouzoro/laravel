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
    <div class='container-fluid no-boundry'>
        <div class='post-hero' onclick='uploadHero()'>
            <a class="hero-btn"><i class="fa fa-picture-o" aria-hidden="true"></i><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 no-boundry">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 no-boundry">
                <div class="table-of-content">
                    <div class="label">
                        <i class='icon list'></i>
                        内容目录
                    </div>
                    <ul class="content"></ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-boundry">
                @include('inputs.newPost')
            </div>
            <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2 no-boundry">
                <div class="editing-tips">
                    <div class="label">
                        <i class='icon idea'></i>
                        Tips
                    </div>
                    <ul class="content"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class='hidden'>
        <a href="">继续编辑</a><a href="">完成发布</a>
    </div>
@endsection