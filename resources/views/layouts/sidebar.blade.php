<ul class="list-group list-group-flush">

    <a class="list-group-item side-item" href="/allbook">Все жанры</a>

    @foreach($cats as $cat)

        <a class="list-group-item side-item" href="/category/{{$cat->id}}">{{$cat->name}}</a>

    @endforeach

</ul>
<a href="https://vk.com/bookstorya" >
	<img src="{{asset('img/side_bar.png')}}" alt="" style="width: 100%;">
</a>