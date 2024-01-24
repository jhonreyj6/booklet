<div class="pt-24 w-64 h-screen">
    <h3 class="text-xl font-bold mb-2">Search Filter</h3>
    <div class="flex flex-col gap-3">
        <div>
            <h4 class="text-lg font-semibold mb-1">By Category</h4>
            <div class="flex flex-col gap-2 text-sm">
                <div><a href="/search?genre=Action & Adventure">Action & Adventure</a></div>
                <div><a href="/search?genre=business">Business</a></div>
                <div><a href="/search?genre=crime">Crime</a></div>
                <div><a href="/search?genre=fantasy">Fantasy</a></div>
                <div><a href="/search?genre=fiction">Fiction</a></div>
                <div><a href="/search?genre=history">History</a></div>
                <div><a href="/search?genre=horror">Horror</a></div>
                <div><a href="/search?genre=lifestyle">Lifestyle</a></div>
                <div><a href="/search?genre=romance">Romance</a></div>
                <div><a href="/search?genre=thriller & suspense">Thriller & Suspense</a></div>
            </div>
        </div>

        <div>
            <h4 class="text-lg font-semibold mb-1">Rating</h4>
            <div class="flex flex-col gap-2 text-yellow-500">
                <a href="{{ request()->fullUrlWithQuery(['rating' => 5]) }}">
                    <div class="flex flex-row gap-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['rating' => 4]) }}">
                    <div class="flex flex-row gap-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['rating' => 3]) }}">
                    <div class="flex flex-row gap-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['rating' => 2]) }}">
                    <div class="flex flex-row gap-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['rating' => 1]) }}">
                    <div class="flex flex-row gap-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </a>
            </div>
        </div>

        <form method="GET" action="{{ route('search') }}" autocomplete="on" id="form_language">
            @csrf
            <h4 class="text-lg font-semibold mb-1">Language</h4>
            <div class="flex flex-col gap-1 mb-4">
                <div class="flex items-center">
                    <input id="english" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="language[]" value="english"
                        @if(request()->query('language'))
                            @checked(in_array('english', request()->query('language')))
                        @endif
                        >
                    <label for="english"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">English</label>
                </div>
                <div class="flex items-center">
                    <input id="french" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="language[]" value="french"
                        @if(request()->query('language'))
                            @checked(in_array('french', request()->query('language')))
                        @endif
                        >
                    <label for="french" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">French
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="spanish" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="language[]" value="spanish"
                        @if(request()->query('language'))
                            @checked(in_array('spanish', request()->query('language')))
                        @endif
                        >
                    <label for="spanish"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">Spanish</label>
                </div>
            </div>

            <button type="submit" class="px-8 py-1 bg-blue-500 text-white rounded">Language Filter</button>

        </form>

    </div>
</div>
