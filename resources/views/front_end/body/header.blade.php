<header id="header">
    <h1><a href="{{route('frontEnd.home')}}">ResposAF</a></h1>
    <nav class="links">
        <ul>
            @guest
            <li><a href="{{route('frontEnd.home')}}">Home</a></li>
            @endguest
            @auth
            <li><a href="{{route('frontEnd.home.portal')}}">Home</a></li>
            @endauth
            <li><a href="#">Categoria</a></li>
        </ul>
    </nav>
    <nav class="main">
        <ul>
            <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="/">
                    <input type="text" name="procurar" id="procurar" placeholder="Search" />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>