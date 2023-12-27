<div class="pt-20 bg-gray-50 border-r w-64 h-screen">
    <h3 class="text-xl font-bold mb-2">Search Filter</h3>
    <div class="flex flex-col gap-3">
        <div>
            <h4 class="text-lg font-semibold mb-1">By Category</h4>
            <div class="flex flex-col gap-2 text-sm">
                <div><a href="#!">Action & Adventure</a></div>
                <div><a href="#!">Business</a></div>
                <div><a href="#!">Crime</a></div>
                <div><a href="#!">Fantasy</a></div>
                <div><a href="#!">Fiction</a></div>
                <div><a href="#!">History</a></div>
                <div><a href="#!">Horror</a></div>
                <div><a href="#!">Romance</a></div>
                <div><a href="#!">Thriller & Suspense</a></div>
                {{-- <div><a href="#!"></a></div> --}}
            </div>
        </div>

        <div>
            <h4 class="text-lg font-semibold mb-1">Rating</h4>
            <div class="flex flex-col gap-2 text-yellow-500">
                <div class="flex flex-row gap-1">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="flex flex-row gap-1">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="flex flex-row gap-1">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="flex flex-row gap-1">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="flex flex-row gap-1">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
            </div>
        </div>

        <div>
            <h4 class="text-lg font-semibold mb-1">Language</h4>
            <div class="flex flex-col gap-1">
                <div class="flex items-center">
                    <input id="english" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="english"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">English</label>
                </div>
                <div class="flex items-center">
                    <input id="french" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="french"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">French</label>
                </div>
                <div class="flex items-center">
                    <input id="spanish" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="spanish"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-700">Spanish</label>
                </div>
            </div>
        </div>

    </div>
</div>

{{--
  rating
  language
--}}
