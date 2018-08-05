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
                                    <label for="name">Название книги:</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Название книги" required>
                                </div>
                                <div class="form-group col-md-12">
                                    {{--<input type="text" class="form-control" name="author" placeholder="Имя автора" required>--}}
                                    <div class="ui-widget">
                                        <label for="tags">Имя автора:</label>
                                        <input id="tags" class="form-control" name="author" size="50" required>
                                    </div>
                                </div>
                                <div class="form-group custom-file-block col-md-12" style="margin-top: 35px; margin-left: 5px;">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover" lang="es" accept="image/*" required>
                                    <label class="custom-file-label" id="label_file" for="customFile"></label>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="annotacia">Аннотация</label>
                                    <textarea class="form-control" id="annotacia" rows="8" name="annotation" placeholder="Аннотации" required></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect1">Жанры</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="cats[]" id="cats" required>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        let last_valid_selection = null;
                                        $('#cats').change(function(event) {
                                            if ($(this).val().length > 3) {
                                                $(this).val(last_valid_selection);
                                                alert('Возможно указать не больше 3 жанров');
                                            } else {
                                                last_valid_selection = $(this).val();
                                            }
                                        });
                                    });
                                </script>

                                <div class="form-group col-md-6">
                                    <label for="FormControlSelect2">Тематические подборки</label>
                                    <select class="form-control js-example-basic-multiple" multiple name="collections[]" id="collections">
                                        @foreach($cols as $col)
                                            <option value="{{$col->id}}">{{$col->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        let last_valid_selection = null;
                                        $('#collections').change(function(event) {
                                            if ($(this).val().length > 5) {
                                                $(this).val(last_valid_selection);
                                                alert('Возможно указать не больше 5 тематических подборок');
                                            } else {
                                                last_valid_selection = $(this).val();
                                            }
                                        });
                                    });
                                </script>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="tags" rows="4" placeholder="Теги (через запятую)"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="booktailer" id="exampleFormControlTextarea1" rows="1" placeholder="Ссылка на буктрейлер"></textarea>
                                </div>
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <input type="text" class="form-control" name="chaptercount" placeholder="С какой главы платная? 0 - бесплатная" required>
                                </div>
                                {{--<div class="form-group col-md-12" style="text-align: center;">--}}
                                    {{--<input type="text" class="form-control" name="price" placeholder="Цена">--}}
                                {{--</div>--}}
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

    <script>
        document.querySelector("#customFile").addEventListener("change", function () {
            if (this.files[0]) {
                let fr = new FileReader();

                fr.addEventListener("load", function () {
                    document.querySelector("#label_file").style.backgroundImage = "url(" + fr.result + ")";
                }, false);

                fr.readAsDataURL(this.files[0]);
            }
        });
    </script>

    {{--Автокомплит, мультиселект АВТОР--}}
    <script>
        $( function() {
            let availableTags = [];
            function split( val ) {
                return val.split( /,\s*/ );
            }
            function extractLast( term ) {
                return split( term ).pop();
            }
            $.ajax({
                type: 'GET',
                url: '/api/getAuthors',
                data: '',
                processData: true,
                contentType: false,
                success: function(data) {
                    console.log(data.data);
                    if(data.success){
                        availableTags = data.data;
                    }
                }
            });

            $( "#tags" )
            // don't navigate away from the field on tab when selecting an item
                .on( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function( request, response ) {
                        // delegate back to autocomplete, but extract the last term
                        response( $.ui.autocomplete.filter(
                            availableTags, extractLast( request.term ) ) );
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        let terms = split( this.value );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join( ", " );
                        return false;
                    }
                });
        } );
    </script>
@endsection
