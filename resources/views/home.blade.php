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
                        <h2 class="cat-title">Добавить книгу</h2>
                        <form class="wow fadeInUp" method="POST" action="/book/add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="name" placeholder="Название книги" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="author" placeholder="Имя автора" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover" lang="es" required>
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" rows="8" name="annotation" placeholder="Аннотации" required></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect1">Жанры</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="cats[]" id="cats" required>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect2">Темматические подборки</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="collections[]" id="collections" required>
                                        @foreach($cols as $col)
                                            <option value="{{$col->id}}">{{$col->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="tags" rows="4" placeholder="Теги (через запятую)"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="booktailer" id="exampleFormControlTextarea1" rows="1" placeholder="Ссылка на буктрейлер"></textarea>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input type="text" class="form-control" name="chaptercount" placeholder="С какой главы платная? 0 - бесплатная" required>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input type="text" class="form-control" name="price" placeholder="Цена">
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input class="form-check-input" name="translated" type="checkbox" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1" >
                                        Это перевод
                                    </label>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input class="form-check-input" name="public" type="checkbox" value="1" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Разрешить показ
                                    </label>
                                </div>

                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck3" required>
                                    <label class="form-check-label" for="defaultCheck3" >
                                        Вы согласны с правилами пользования сервисом?
                                    </label>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary">Создать книгу и загрузить главы</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
