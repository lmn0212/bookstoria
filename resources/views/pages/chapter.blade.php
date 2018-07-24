@extends('layouts.master')



@section('content')

    <div class="container main ">

        <div class="row">

            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">

                <h5>Главы</h5>

                    @if(count($chapters) < 7)
                    <ul class="list-group list-group-flush">
                        @foreach($chapters as $cat)
                            <a class="list-group-item side-item" href="/chapter/read/{{$page->id}}/{{$cat->id}}">{{$cat->name}}</a>
                        @endforeach
                    </ul>
                    @else
                    <select id="select_glav" class="form-control">
                        @foreach($chapters as $cat)
                            <option link-url="/chapter/read/{{$page->id}}/{{$cat->id}}">
                                {{$cat->name}}
                            </option>
                        @endforeach
                    </select>
                    @endif

            </div>

            <div class="col-12 col-md-8 col-lg-9 content">

                <div class="example">

                    <h2>{{$page->name}}</h2>

                    <h4>{{$page->author_name}}</h4>

                    <div id="content" class="contents">
                        <div id="app">
                            <!-- Вызов компонента -->
                            <chapter-reader :id="{{$chapter->id}}"></chapter-reader>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection