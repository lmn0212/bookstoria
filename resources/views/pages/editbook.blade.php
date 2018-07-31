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
                        @if(isset($chapters) && !empty($chapters))
                            @foreach($chapters as $key=>$c)
                                <div class="accordion" id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                    Глава: № {{$c->number}}  "{{$c->name}}"
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <form class="wow fadeInUp" method="POST" action="{{route('editChapter', ['id'=>$c->id])}}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="bookid" value="{{$book->id}}">
                                                <div class="card-body">
                                                    <input type="number" name="number" class="form-control"  placeholder="Номер главы" value="{{$c->number}}" required><br>
                                                    <input type="text" name="name" class="form-control"  placeholder="Название главы" value="{{$c->name}}" required><br>
                                                    <textarea name="text" class="form-control editorchapter" rows="20"  placeholder="Текст книги" required>{{$c->text}}</textarea>
                                                </div>
                                                <div class="form-group col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-primary">Изменить главу</button>
                                                </div>
                                            </form>
                                            <form class="wow fadeInUp" method="POST" action="{{route('deleteChapter', ['id'=>$c->id])}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-danger">Удалить главу</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <h2 class="cat-title">Добавить Главу</h2>
                        <form class="wow fadeInUp" method="POST" action="/chapter/add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center">
                                <input type="hidden" name="bookid" value="{{$book->id}}">
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <!-- Здесь начинаются слайдеры с главами -->
                                    <div class="accordion" id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                        Глава: Добавить главу
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="number" class="form-control" name="numberchapter" placeholder="Номер главы" required><br>
                                                    <input type="text" class="form-control" name="namechapter" placeholder="Название главы" required><br>
                                                    <textarea class="form-control" id="addchapter" rows="20" name="textchapter" placeholder="Текст книги" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary">Загрузить главу</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
