<div class="md:col-span-1 flex justify-between mx-20 mt-10">
    <div class="px-4 sm:px-0">
        <h3 class="text-xl font-bold text-gray-900">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
