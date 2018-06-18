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
                        <h2 class="cat-title">Добавить запись в блог</h2>
                        <form class="wow fadeInUp" method="POST" action="/blog/editblog" enctype="multipart/form-data">
                            <div class="form-row justify-content-center">
                                @csrf
                                <input type="hidden" name="id" value="{{$blog->id}}">
                                <div class="form-group col-md-12">
                                    <input type="text" name="title" class="form-control"  placeholder="Заголовок" value="{{$blog->name}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="tags" class="form-control" placeholder="Ключевые слова" value="{{$blog->tags}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="file" name="cover" class="custom-file-input" id="customFile" lang="es" required>
                                    <label class="custom-file-label" for="customFile">Загрузите обложку</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="text" rows="12" placeholder="Содержимое записи"  required>{{$blog->text}}</textarea>
                                </div>
                                <div class="form-group col-md-4" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                                </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
