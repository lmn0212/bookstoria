@extends('layouts.master')

@section('content')
    <div class="container main ">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">
                <h5>Жанры</h5>
                @include('layouts.sidebar')
            </div>

            <div class="col-12 col-md-8 col-lg-9 content">
              {!! $page->body !!}

            </div>
        </div>
    </div>

@endsection