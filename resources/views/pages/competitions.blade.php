@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>


        <div class="col-12 col-md-8 col-lg-9 content">
            <div class="col-12">
                <h2 class="cat-title">Конкурсы</h2>
            </div>

            @foreach($com as $c)
            <div class="contest-item">
                <div class="row wow fadeInUp justify-content-center">
                    <div class="col-5 col-md-3 catalog-item-col">
                        <div class="catalog-book-item">
                            <img src="/{{$c->cover}}" width="100%" height="auto">
                        </div>
                    </div>

                    <div class="col-12 col-md-9">

                        <a href="/competition/{{$c->id}}"><h4 class="book-title">{{$c->name}}</h4></a>
                        <p>
                            {{$c->description}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <p style="font-size: 13px;"><strong>Создан: </strong>{{$c->created_at}}</p>
                                <p style="font-size: 13px;"><strong>Участников: </strong>{{$c->comporders->count()}}</p>
                                @if($c->status == 1)
                                    <p style="font-size: 13px;"><strong>Статус: </strong>Регистрация открыта</p>
                                @else
                                    <p style="font-size: 13px;"><strong>Статус: </strong>Регистрация закрыта</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalrules">
                                    Ознакомиться с правилами
                                </button>
                                @if(\Illuminate\Support\Facades\Auth::user())
                                <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#add_book_collapse" aria-expanded="false" aria-controls="add_book_collapse" style="margin-top: 10px;">
                                    Подать книгу на конкурс
                                </button>
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="collapse col-md-12" id="add_book_collapse">
                                <div class="card card-body">
                                    <form method="POST" action="/competition/createorder">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="hidden" name="compid" value="{{$c->id}}">
                                                <select class="form-control" name="bookid" required>
                                                    @if(isset($user->books) && !empty($user->books[0]))
                                                        @foreach($user->books as $book)
                                                            <option value="{{$book->id}}">{{$book->name}}</option>
                                                        @endforeach
                                                    @else
                                                        <option disabled>Вы еще не добавили ни одной книги</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Отправить</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>



                </div>
                <!-- Попап с правилами -->
                <div class="modal fade" id="modalrules" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Правила</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                {{$c->rules}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Назад</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection