@extends('layouts.app')
@section('content')
    <div class="flex flex-row gap-8 px-4">
        @include('templates.aside')
        <div class="mt-24 w-full">
            {{-- Search --}}
            <form method="GET" action="/search" autocomplete="on" class="mb-4">
                <div class="relative">
                    <input type="text" name="query"
                        class="py-3 px-4 pe-11 block w-full border border-blue-500 bg-blue-50 shadow-sm rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                        value="{{ request()->query('query') }}" placeholder="Search Book">

                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4">
                        <i class="fa-solid fa-magnifying-glass text-blue-700"></i>
                    </div>
                </div>
            </form>

            {{-- book item loop --}}
            @if ($books->count())
                <div class="grid md:grid-cols-4 lg:grid-cols-5 sm:grid-cols-1 gap-4 mb-8">
                    @foreach ($books as $book)
                        <div class="border rounded-sm flex flex-col">
                            <img src="{{ $book->image ? '/assets/img/' . $book->image : '/assets/img/empty_book.jpg'}}"
                                class="h-44 w-full" alt="">
                            <div class="p-2">
                                <div>
                                    <h3 class="font-semibold text-lg">{{ $book->name }}</h3>
                                    <div class="text-sm text-gray-400">By:</div>
                                    <h5 class="text-sm font-semibold">{{ $book->author }}</h5>
                                    <div>
                                        <h6 class="text-sm text-dark">Php {{ $book->price }}</h6>
                                        <h6 class="text-sm text-gray-400">{{ $book->stocks }} stocks left</h6>
                                    </div>
                                    <div class="flex flex-row gap-0.5 items-center text-sm text-yellow-400">
                                        @for ($i = 0; $i < $book->rating; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                        @for ($i = $book->rating; $i < 5; $i++)
                                            <i class="fa-regular fa-star"></i>
                                        @endfor
                                        <div class="ml-0.5">{{ $book->rating }}</div>
                                    </div>
                                    <div class="text-gray-400 mb-4">
                                        {{ $book->getAllReviews->count() }}
                                        {{ $book->getAllReviews->count() > 1 ? 'reviews' : 'review' }}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 mt-auto text-center">
                                <a href="/book?id={{ $book->id }}&name?={{ $book->name }}"
                                    class="py-1.5 rounded bg-blue-700 text-white px-4">Checkout</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center mt-12">
                    <h3 class="text-4xl text-blue-700 mb-2">No Result Found</h3>
                    <div class="text-lg">Try another word</div>
                </div>
            @endif

            @if ($books->nextPageUrl() || $books->previousPageUrl())
                <div class="text-center mb-8">
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a href="{{ $books->previousPageUrl() }}"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        @for ($i = 1; $i <= $books->lastPage(); $i++)
                            <a href="{{ '?page=' . $i }}" @class([
                                'bg-blue-600 text-white' => $i == $books->currentPage(),
                                'relative z-10 inline-flex items-center text-gray-400 border-gray-300 border px-4 py-2 text-sm font-semibold focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600',
                            ])>{{ $i }}</a>
                        @endfor
                        <a href="{{ $books->nextPageUrl() }}"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
