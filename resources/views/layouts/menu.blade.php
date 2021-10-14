
<nav class="sidebar">
    <ul class="sidebar__nav">
        <li class="nav__item hide-children">
            <span class="item__title">
                <a class="hide-children"  href="{{ Route('dashboard') }}">Dashboard</a>
            </span>
        </li>
        <li class="nav__item hide-children">
            <span class="item__title">
                <span>Cadastros</span>
                <img class="title__icon" src="{{ asset('svgs/arrow-down.svg') }}" alt="arrow down">
            </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('produto.index') }}">Produtos</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('categoria.index') }}">Categoria</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('tag.index') }}" >Tag</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('marca.index') }}" >Marca</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('usuario.index') }}" >Usuário ADM</a>
                </li>
            </ul>
        </li>
        <li class="nav__item hide-children">
            <span class="item__title">
                <span>Vendas</span>
                <img class="title__icon" src="{{ asset('svgs/arrow-down.svg') }}" alt="arrow down">
            </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('cliente.index') }}" >Clientes</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('pedido.index') }}">Pedidos</a>
                </li>
            </ul>
        </li>
        <li class="nav__item hide-children">
            <span class="item__title">
                <span>{{ Auth()->user()->name }}</span>
                <img
                    class="title__icon"
                    src="{{ asset('svgs/arrow-down.svg') }}"
                    alt="arrow down"
                />
            </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link style="" class="item__link" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
