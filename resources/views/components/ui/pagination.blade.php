@props([
    'paginator',
])

@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    $perPage = $paginator->perPage();
    $total = $paginator->total();
    $from = $paginator->firstItem();
    $to = $paginator->lastItem();

    // Generate page range (show max 7 pages with ellipsis)
    $pages = [];
    if ($lastPage <= 7) {
        $pages = range(1, $lastPage);
    } else {
        if ($currentPage <= 3) {
            $pages = [1, 2, 3, 4, '...', $lastPage];
        } elseif ($currentPage >= $lastPage - 2) {
            $pages = [1, '...', $lastPage - 3, $lastPage - 2, $lastPage - 1, $lastPage];
        } else {
            $pages = [1, '...', $currentPage - 1, $currentPage, $currentPage + 1, '...', $lastPage];
        }
    }
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }} data-test="pagination-container">
    {{-- Info text --}}
    <div class="flex items-center justify-between text-sm text-muted-foreground" data-test="pagination-info">
        <span>
            Showing <span class="font-medium text-foreground">{{ $from }}</span> to
            <span class="font-medium text-foreground">{{ $to }}</span> of
            <span class="font-medium text-foreground">{{ $total }}</span> results
        </span>
    </div>

    {{-- Pagination navigation --}}
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Previous button --}}
        <button
            type="button"
            wire:click="previousPage"
            @disabled($currentPage <= 1)
            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg border border-border bg-background text-foreground transition-all duration-200
                   hover:bg-accent hover:text-accent-foreground
                   disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-background"
            data-test="pagination-previous"
        >
            <x-lucide-chevron-left class="size-4" />
            Previous
        </button>

        {{-- Page numbers --}}
        <div class="flex items-center gap-1" data-test="pagination-pages">
            @foreach($pages as $page)
                @if($page === '...')
                    <span class="px-3 py-2 text-sm text-muted-foreground" data-test="pagination-ellipsis">...</span>
                @else
                    <button
                        type="button"
                        wire:click="gotoPage({{ $page }})"
                        @class([
                            'min-w-[40px] px-3 py-2 text-sm font-medium rounded-lg border transition-all duration-200',
                            'bg-primary text-primary-foreground border-primary' => $page === $currentPage,
                            'bg-background text-foreground border-border hover:bg-accent hover:text-accent-foreground' => $page !== $currentPage,
                        ])
                        data-test="pagination-page"
                        data-page="{{ $page }}"
                        @if($page === $currentPage)
                            aria-current="page"
                        @endif
                    >
                        {{ $page }}
                    </button>
                @endif
            @endforeach
        </div>

        {{-- Next button --}}
        <button
            type="button"
            wire:click="nextPage"
            @disabled($currentPage >= $lastPage)
            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg border border-border bg-background text-foreground transition-all duration-200
                   hover:bg-accent hover:text-accent-foreground
                   disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-background"
            data-test="pagination-next"
        >
            Next
            <x-lucide-chevron-right class="size-4" />
        </button>
    </nav>
</div>
