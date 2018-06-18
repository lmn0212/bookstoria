@extends('layouts.master')



@section('content')

    <div class="container main ">

        <div class="row">

            <div class="col-12 col-md-4 col-lg-3 left-sidebar wow fadeInLeft">

                <h5>Главы</h5>

                <ul class="list-group list-group-flush">
                    @foreach($chapter as $cat)
                        <a class="list-group-item side-item" href="/chapter/read/{{$page->id}}/{{$cat->id}}">{{$cat->name}}</a>
                    @endforeach

                </ul>

            </div>



            <div class="col-12 col-md-8 col-lg-9 content">



                <div class="example">

                    <h2>{{$page->name}}</h2>

                    <h4>{{$page->author_name}}</h4>

                    <div id="content" class="contents">
                            @if(isset($chap))

                                    {!!  $chap  !!}

                            @elseif(isset($html) && isset($out))
                               <div class="col-md-12">
                                   {{$out}}
                               </div>
                            <div class="col-md-12">
                                {!!  $html !!}
                            </div>
                            @endif
                    </div>

                    <hr />
                    <div class="row justify-content-center">
                    <nav id="pagination1" class="pagination1" aria-label="Page navigation example">

                        <br />

                        <div id="page_number" class="page_number">1</div>

                    </nav>
                    </div>
<!--                     <div id="pagination1" aria-label="Page navigation example">
                      <ul class="pagination pagination-lg">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </div> -->

                </div>

            </div>

        </div>

    </div>



@endsection