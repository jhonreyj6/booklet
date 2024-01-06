
@if($reviews->count())
    @foreach ($reviews as $review)
    <div class="border p-4 mb-2 bg-blue-50">
        <div class="flex flex-row gap-8">
            <div class="w-16 h-16">
                <img src="https://down-ph.img.susercontent.com/file/fbfd144031b361a216adfedbef79f325"
                    class="w-full h-full" alt="">
            </div>
            <div class="w-full">
                <div class="flex flex-row justify-between mb-1 items-center">
                    <h3 class="text-semibold text-blue-500">Jhon Rey Repuela</h3>
                    <div class="text-gray-400">
                        2013/03/15
                    </div>
                </div>
                <div class="mb-2">
                    Mollit amet et adipisicing veniam quis adipisicing fugiat. Dolore pariatur magna labore proident
                    fugiat. Duis deserunt in eiusmod sint. Proident Lorem velit excepteur laborum. Mollit esse irure
                    nisi laborum quis. Ex non quis deserunt eiusmod labore ullamco amet sit. Aliquip ipsum sit
                    officia ea nisi proident proident id do.

                    Aute occaecat anim esse ut consequat labore id reprehenderit excepteur id labore. Sint minim
                    magna proident ut eiusmod eu do fugiat. Do sit in ipsum amet aliquip in voluptate occaecat qui
                    amet sint ea. Sit mollit irure nostrud cillum ipsum et proident. Excepteur id nisi ea dolore
                    reprehenderit eiusmod labore Lorem elit officia anim. Ea pariatur laboris irure mollit duis.
                    Aliqua laboris magna cillum esse.
                </div>
                <div class="flex flex-row gap-0.5 items-center text-yellow-400">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <div class="ml-0.5">{{ $book->rating }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

