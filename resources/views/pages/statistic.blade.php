@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content" style="margin-top: 60px;">

                    <div class="col-12">
                        <h2 class="cat-title">Статистика</h2>
                    </div>
                @foreach($book as $b)
                    <div class="row wow fadeInUp no-gutters justify-content-center">

                        <div class="col-5 col-md-3 catalog-item-col">
                            <div class="catalog-book-item">
                                <img src="{{$b->cover}}" width="100%" height="auto">
                            </div>
                        </div>

                        <div class="col-12 col-md-9">
                            <h4 class="cat-title">{{$b->name}}</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Просмтотры</th>
                                    <th scope="col">Покупки</th>
                                    <th scope="col">Комментарии</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--<tr>
                                    <th scope="row">За день</th>
                                    <td>{{$b->views_day}}</td>
                                    <td>{{$b->order_day}}</td>
                                    <td>{{$b->comment_day}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">За неделю</th>
                                    <td>{{$b->views_week}}</td>
                                    <td>{{$b->order_week}}</td>
                                    <td>{{$b->comment_week}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">За месяц</th>
                                    <td>{{$b->views_month}}</td>
                                    <td>{{$b->order_month}}</td>
                                    <td>{{$b->comment_month}}</td>
                                </tr>--}}
                                <tr>
                                    <th scope="row">Всего</th>
                                    <td>{{$b->count_views}}</td>
                                    <td>{{$b->order_total}}</td>
                                    <td>{{$b->comment_total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
