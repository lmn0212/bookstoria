@extends('layouts.master')

@section('content')
    <div class="container main admin-main">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                @include('pages.usersidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content" style="margin-top: 60px;">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="cat-title">Моя библиотека</h2>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            @if(count($lib))
                             @foreach($lib as $l)
                                 @if($l->book)
                                     <div class="col-md-4">
                                         <div class="col-md-12">
                                             <a href="/book/{{$l->book->id}}">
                                                 <img class="img-responsive" style="width: 100%" src="{{$l->book->cover}}"/>
                                                 <div class="col-md-12 text-center mar-10">
                                                     {{$l->book->name}} | {{$l->book->author_name}}
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="col-md-12">
                                             <a class="btn btn-danger" href="/library/delete/{{$l->book->id}}">Удалить из библиотеки</a>
                                         </div>
                                     </div>
                                 @endif
                             @endforeach
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
