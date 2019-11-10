<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current="home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current="servico") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/servico">Serviços <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current="cliente") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/cliente">Clientes <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current="voo") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/voo">Voos <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
