@extends('layouts.master')



@section('content')



    <div class="container main ">

        <div class="row">

            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">

                <h5>Жанры</h5>

                @include('layouts.sidebar')

            </div>



            <div class="col-12 col-md-8 col-lg-9 content">

                <div class="row">

                    <div class="col-12 col-md-3">

                        <img src="/{{$book->cover}}" width="100%" height="auto">
                        <a href="/chapter/read/{{$book->id}}" class="btn btn btn-primary book-btn" style="width: 100%;">Читать</a>
                    </div>

                    <div class="col-12 col-md-9">

                        <h3 class="book-single-titile">{{$book->name}} - {{$book->author_name}}</h3>

                        <div class="row">

                            <div class="col-12 col-md-12">

                                <p class="single-book-tags"><strong>Статус:</strong>
                                    @if($book->complete == 1)
                                        Закончена
                                    @else
                                        Не закончена
                                    @endif

                                </p>

                                <p class="single-book-tags"><strong>Дата публикации:</strong> {{$book->created_at}}</p>

                                <p class="single-book-tags"><strong>Жанры:</strong>

                                    @foreach($book->categories as $cat)

                                        <a href="/category/{{$cat->id}}">

                                            <span class="btn btn-light"> {{$cat->name}} </span>

                                        </a>

                                    @endforeach

                                </p>

                                <p class="single-book-tags"><strong>Темматические подборки:</strong>

                                    @foreach($book->collections as $cat)

                                        <a href="/collections/{{$cat->id}}">

                                            <span class="btn btn-light"> {{$cat->name}} </span>

                                        </a>

                                    @endforeach

                                </p>

                                <i class="fas fa-eye"></i> <span> {{$book->count_views}}</span>

                                <i class="fas fa-comments"></i> <span> {{$book->comments->count()}}</span>

                                <i class="fas fa-bookmark"></i> <span> {{$book->libraries->count()}}</span><br>

                                @if(count(Auth::user()->orders) > 0)
                                    @foreach(Auth::user()->orders as $order)
                                        @if($order->book_id == $book->id && $order->result == 'ok')
                                            <p>Вы купили эту книгу</p>
                                            @php
                                                $payment = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                @endif

                                    @if($book->price > 0)
                                        <div style="display: inline-block; font-size: 18px; padding-right: 20px;"><span> <strong>Цена:</strong> {{$book->price}} &#8381; </span></div>
                                    @else
                                        <div class="col-md-12" style=" font-size: 18px; padding: 0px;"><span> <strong>Цена:</strong> Бесплатно </span></div>
                                    @endif
                                    @if(!Auth::user())
                                        <p>Чтобы купить книгу, пожалуйста <a href="/login"> войдите на сайт</a></p>
                                    @endif
                                @if(Auth::user() && $book->price > 0 && $book->chapter_count > 0)
                                    @if(!isset($payment))
                                        @if(isset($book->complete) && $book->complete == 1)
                                            <a href="/order/create/{{$book->id}}" class="btn book-btn btn-success">Купить за {{$book->price}} &#8381;</a >
                                        @else
                                            <a href="/order/create/{{$book->id}}" class="btn book-btn btn-success">Подписаться за {{$book->price}} &#8381;</a>
                                        @endif
                                    @endif
                                @endif


                                @if(Auth::user())
                                <a href="/library/add/{{$book->id}}" class="btn btn-warning book-btn" style="color: white;">Добавить в библиотеку</a>
                                @endif
                            </div>

                        </div>

                    </div>

                        <div class="col-12 col-md-12">

                           <p class="book-description">{!! $book->annotation !!}</p>

                        </div>

                    @if(Auth::check())

                        <!-- Комментарии-->

                            <div class="col-12">

                                <h4>Комментарии</h4>

                                <hr>

                                <div class="row justify-content-between">

                                    <p class="book-tags col-6">Комментариев: {{$book->comments->count()}}</p>

                                    <p class="col-6 text-right">

                                        <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#add_comment" aria-expanded="false" aria-controls="add_comment" >

                                            Комментировать

                                        </button>

                                    </p>

                                    <div class="collapse" id="add_comment">

                                        <div class="card card-body">

                                            <form method="POST" action="/comment/add">

                                                <div class="form-row justify-content-center">

                                                    <input type="hidden" name="book" value="{{$book->id}}"/>

                                                    @csrf

                                                    <div class="form-group col-md-12">

                                                        <textarea class="form-control" name="comment" rows="6" cols="100" placeholder="Комментарий"></textarea>

                                                    </div>



                                                    <div class="form-group col-md-4" style="text-align: center;">

                                                        <button type="submit" class="btn btn-primary">Опубликовать</button>

                                                    </div>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                    @endif

                    <div class="col-md-12">

                        <h4>Комментарии</h4>

                        @foreach($book->comments as $comment)

                            <div class="row comment-item">

                                <i class="fa fa-user-circle" style="font-size: 50px"></i>

                                <div class="comment-info col-10">

                                   @if(isset($commen->user))
                                        <h5> {{$comment->user->name}}</h5>
                                   @endif

                                    <span class="book-tags">Дата публикации: {{$comment->created_at}}</span>

                                    <p class="comment">

                                        {{$comment->text}}

                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>



                </div>

            </div>

        </div>

    </div>

@endsection