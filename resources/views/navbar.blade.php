<nav class="navbar navbar-expand-lg navbar-ligth bg-ligth">
    <img src="{{ asset('img/aviao.jpg') }}" style="width: 70px; height: 70px;">
    <a class="navbar-brand">Companhia Aérea Milhas</a>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current="home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/"> Início <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current="passagem") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/passagem">Passagem <span class="sr-only">(current)</span></a>
            </li>

            @auth

                @if(Auth::user()->tipo == 1)

                <li @if($current="servico") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/servico">Serviços <span class="sr-only">(current)</span></a>
                </li>
                <li @if($current="cliente") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/cliente">Clientes <span class="sr-only">(current)</span></a>
                </li>
                @endif
            @endauth
            <li @if($current="voo") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/voo">Voos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/home">Register/Login <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
