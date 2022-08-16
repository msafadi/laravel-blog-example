@if ($paginator->hasPages())
<!-- pagination -->
<div class="row pagination">
    <div class="column lg-12">
        <nav class="pgn">
            <ul>
                @if (!$paginator->onFirstPage())
                <li>
                    <a class="pgn__prev" href="{{ $paginator->previousPageUrl() }}">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
                        </svg>
                    </a>
                </li>
                @endif
                
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li><span class="pgn__num dots">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span class="pgn__num current">{{ $page }}</span></li>
                            @else
                                <li><a class="pgn__num" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                
                @if ($paginator->hasMorePages())
                <li>
                    <a class="pgn__next" href="{{ $paginator->nextPageUrl() }}">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
        </nav> <!-- end pgn -->
    </div> <!-- end column -->
</div> <!-- end pagination -->
@endif