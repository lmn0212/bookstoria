<footer>
    <div class="container">
        <div class="row justify-content-between">
            <a href="/" class="col-12 col-md-6 col-lg-3" style="text-align: center; padding-top: 20px;">
                <img src="/img/logo.png" width="200px;" height="auto">
            </a>
            <div class="col-12 col-md-6 col-lg-3">
                <p class="footer-title">Помощь</p>
                <ul class="footer-list">
                    @foreach($foot as $f)
                        @if($f->type == 'help')
                            <li><a href="{{$f->link}}">{{$f->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <p class="footer-title">Информация</p>
                <ul class="footer-list">
                    @foreach($foot as $f)
                        @if($f->type == 'info')
                            <li><a href="{{$f->link}}">{{$f->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <p class="footer-title">Мы в соц.сетях</p>
                {{--<a target="_blank" href="https://vk.com/bookstoria" class="footer-social-icon"><i class="fab fa-vk"></i></a>--}}
                <a target="_blank" href="https://www.youtube.com/channel/UCR-ZYQtlunzYMcGh0Jwxo_g" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
                {{--<a target="_blank" href="https://www.instagram.com/ledi_bookstoria/" class="footer-social-icon"><i class="fab fa-instagram"></i></a>--}}
            </div>
        </div>
    </div>
</footer>