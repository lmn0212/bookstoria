@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content" style="margin-top: 60px;">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="col-12">
                            <h2 class="cat-title">Мои Блоги</h2>
                        </div>
                        <div class="col-md-12 cat-title">
                            <a href="/blog/add" class="btn btn-primary">Добавить запись</a>
                        </div>
                        <div class="row">
                            @foreach($blogs as $b)
                                <div class="row wow fadeInUp justify-content-center animated">
                                    <div class="col-5 col-md-3 catalog-item-col">
                                        <div class="catalog-book-item">
                                            <img src="{{$b->cover}}" width="100%" height="auto">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-9">
                                        <a href="/blog/{{$b->id}}"><h4 class="blog-title">{{$b->name}}</h4></a>
                                        <h5 class="blog-title">{{$b->user->name}}</h5>

                                        <p>  {{ $b->text }}

                                        </p>
                                        <div class="blog-panel">
                                            <div class="blog-stat">
                                                <p class="book-tags">Дата публикации: {{$b->created_at}}</p>
                                                <i class="fas fa-eye"></i> <span> {{$b->count_views}}</span>
                                                <i class="fas fa-comments"></i> <span> {{$b->comments->count()}}</span>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 mar-15">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="/blog/edit/{{$b->id}}" class="btn btn-warning">Редактировать</a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/blog/delete/{{$b->id}}" class="btn btn-danger">Удалить</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
