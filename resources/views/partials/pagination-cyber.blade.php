@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1.5 select-none font-code-metric text-xs">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1.5 rounded-lg border border-[#1e293b] text-on-surface-variant/40 bg-[#080b11] cursor-not-allowed flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
                <span class="hidden sm:inline">Prev</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-1.5 rounded-lg border border-primary/40 text-primary hover:border-primary hover:bg-primary/10 transition-all flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
                <span class="hidden sm:inline">Prev</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-2 py-1.5 text-on-surface-variant/50 cursor-default">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="px-3 py-1.5 rounded-lg bg-primary text-[#002022] font-black border border-primary shadow-[0_0_12px_rgba(0,240,255,0.4)]">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg border border-[#1e293b] text-on-surface-variant hover:text-primary hover:border-primary/60 hover:bg-primary/5 transition-all">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1.5 rounded-lg border border-primary/40 text-primary hover:border-primary hover:bg-primary/10 transition-all flex items-center gap-1">
                <span class="hidden sm:inline">Next</span>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
        @else
            <span class="px-3 py-1.5 rounded-lg border border-[#1e293b] text-on-surface-variant/40 bg-[#080b11] cursor-not-allowed flex items-center gap-1">
                <span class="hidden sm:inline">Next</span>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </span>
        @endif
    </nav>
@endif
