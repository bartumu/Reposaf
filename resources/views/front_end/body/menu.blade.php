<!-- Menu -->


<!-- Search -->
<section>
    <form class="search" method="get" action="/">
        <input type="text" name="procurar" id="procurar" placeholder="Search" />
    </form>
</section>

<!-- Links -->
<section>
    <ul class="links">
        <li>
            @guest
            <a href="{{route('frontEnd.home')}}">
                <h3>Home</h3>
                <p>Pagina Inicial</p>
            </a>
            @endguest
            @auth
            <a href="{{route('frontEnd.home.portal')}}">
                <h3>Home</h3>
                <p>Pagina Inicial</p>
            </a>
            @endauth
        </li>
        <li>
            <a href="#">
                <h3>Categoria</h3>
                <p>Ver os elementos em Categoria</p>
            </a>
        </li>
        @auth
        <li>
            <a href="{{route('autor.portal')}}">
                <h3>Portal Do Autor</h3>
                <p>Manuseie e Gira as suas obras</p>
            </a>
        </li>
        <li>
            <a href="{{route('autor.profile')}}">
                <h3>Profile</h3>
                <p>Ver e editar seu Perfil</p>
            </a>
        </li>
        <li>
            <a href="{{route('autor.change.password')}}">
                <h3>Mudar Palavra-Passe</h3>
                <p>Edite a sua Passe</p>
            </a>
        </li>
        @endauth
        <!-- <li>
                <a href="#">
                    <h3></h3>
                    <p>Porta lectus amet ultricies</p>
                </a>
            </li> -->
    </ul>
</section>

<!-- Actions -->
<section>
    @guest
    <ul class="actions stacked">
        <li><a href="{{ route('login') }}" class="button large fit">Log In</a></li>
    </ul>
    @endguest
    @auth
    <ul class="actions stacked">
        <li><a href="{{ route('autor.logout') }}" class="button large fit">Log Out</a></li>
    </ul>
    @endauth
</section>