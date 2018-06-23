@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>
            @php
                $selcat = $book->categories->pluck('id')->toArray();
                $selpod = $book->collections->pluck('id')->toArray();
            @endphp
            <div class="col-12 col-md-8 col-lg-9 content" style="margin-top: 60px;">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <h2 class="cat-title">Редактировать книгу</h2>
                        <form class="wow fadeInUp" method="POST" action="/book/edit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$book->id}}" name="id">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="name" placeholder="Название книги" value="{{$book->name}}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="author" placeholder="Имя автора" value="{{$book->author_name}}" required>
                                </div>
                                <div class="form-group custom-file-block col-md-12" style="margin-top: 35px; margin-left: 5px;">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover" lang="es">
                                    @if(isset($book->cover))
                                        <label class="custom-file-label" for="customFile" style="background-image: url('/{{$book->cover}}');"></label>
                                    @else
                                        <label class="custom-file-label" for="customFile"></label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="annotacia" rows="8" name="annotation" placeholder="Аннотации"  required>{{$book->annotation}}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect1">Жанры</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="cats[]" id="cats" required>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}"
                                            @if(in_array($cat->id,$selcat))
                                             selected="selected"
                                            @endif
                                            >{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect2">Темматические подборки</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="collections[]" id="collections" required>
                                        @foreach($cols as $col)
                                            <option value="{{$col->id}}"
                                               @if(in_array($col->id,$selpod))
                                               selected="selected"
                                               @endif
                                            >{{$col->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="tags"  rows="4" placeholder="Теги (через запятую)">{{$book->tags}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="booktailer" id="exampleFormControlTextarea1" rows="1" placeholder="Ссылка на буктрейлер">{{$book->booktailer}}</textarea>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input type="text" class="form-control" name="chaptercount" placeholder="С какой главы платная? 0 - бесплатная" value="{{$book->chapter_count}}"required>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$book->price}}">
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
                                    <button type="submit" class="btn btn-primary">Обновить книгу</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        document.querySelector("#customFile").addEventListener("change", function () {
            if (this.files[0]) {
                var fr = new FileReader();

                fr.addEventListener("load", function () {
                    document.querySelector("label").style.backgroundImage = "url(" + fr.result + ")";
                }, false);

                fr.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
