<header class="showcase-header col-sm-2">
    <span class="showcase-header-title">Showcase</span>
    <nav>
        <ul class="showcase-nav-container">
            <li class="showcase-nav-item">
                <a href="{{route('displays.index')}}">Displays</a>
                <ul class="showcase-nav-container">
                    <li class="showcase-nav-item"><a href="{{route('displays.create')}}">Create</a></li>
                    @foreach($displays as $display)
                    <li class="showcase-nav-item"><a href="{{route('displays.show', ['display' => $display])}}">{{$display->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <ul class="showcase-nav-container">
            <li class="showcase-nav-item">
                <a href="{{route('trophies.index')}}">Trophies</a>
                <ul class="showcase-nav-container">
                <li class="showcase-nav-item"><a href="{{route('trophies.create')}}">Create</a></li>
                @foreach($trophies as $trophy)
                <li class="showcase-nav-item"><a href="{{route('trophies.show', ['trophy' => $trophy])}}">{{$trophy->name}}</a></li>
                @endforeach
                </ul>
            </li>
        </ul>
    </nav>
</header>