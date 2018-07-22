<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item" >
                <a class="nav-link" href="{!! route('home.index') !!}">
                    <span class="nav-label">Home</span>
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{!! route('brand.index') !!}">
                    <span class="nav-label">Brands</span>
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{!! route('model.index') !!}">
                    <span class="nav-label">Models</span>
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{!! route('engine.index') !!}">
                    <span class="nav-label">Engines</span>
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{!! route('car.index') !!}">
                    <span class="nav-label">Cars</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
