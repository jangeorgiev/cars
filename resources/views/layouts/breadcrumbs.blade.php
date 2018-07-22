@if ($breadcrumbs)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->first)
                    @if (!$breadcrumb->last)
                        <li class="breadcrumb-item">
                            @if ( $breadcrumb->url != '')
                                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                            @else
                                <span>{!! $breadcrumb->title !!}</span>
                            @endif
                        </li>
                    @else
                        <li class="breadcrumb-item active">
                            <strong>{{ $breadcrumb->title }}</strong>
                        </li>
                    @endif
                @elseif (!$breadcrumb->last)
                    <li class="breadcrumb-item">
                        @if ( $breadcrumb->url != '')
                            <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                        @else
                            <span>{!! $breadcrumb->title !!}</span>
                        @endif
                    </li>
                @else
                    <li class="breadcrumb-item active">
                        <strong>{{ $breadcrumb->title }}</strong>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif