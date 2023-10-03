
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Theses Upload') }}
    </h2>
</x-slot>
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="GET" action="search/{title}">
        <x-input name="searchTitle" value="" class="max-w-lg"></x-input>
        <x-button type="submit" class="mt-4">{{ __('Search') }}</x-button> 
    </form>
</div>

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('theses.store') }}" enctype="multipart/form-data" class="p-4">
        @csrf
        <x-label class="text-1xl">Title</x-label>
        <x-input name="title" placeholder="Write the title of your thesis here.." class="p-2 w-full" required>{{old('title')}}</x-input>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />

        <x-label class="text-1xl">Abstract</x-label>
        <textarea name="abstract" placeholder="write your abstaract here" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('abstract')}}</textarea>
        <x-input-error :messages="$errors->get('abstract')" class="mt-2" />

        <x-label class="text-1xl">Authors</x-label>
        <x-input name="author_id" placeholder="Write authors here" class="block w-full py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('author_id')}}</x-input>
        <x-input name="author_id" placeholder="Write authors here" class="block w-full py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('author_id')}}</x-input>
        <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
    
        <x-label class="text-1xl">College</x-label>
        <select name="college_id" id="college_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
            <option value="College of Business and Management">College of Business and Management</option>
            <option value="College of Education">College of Education</option>
            <option value="College of Engineering and Technology">College of Engineering and Technology</option>
        </select>
        <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
        
        <x-label for="year" class="text-1xl">Year</x-label>
        <select name="year_id" id="year_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
        </select>

        <x-input-error :messages="$errors->get('year_id')" class="mt-2" />

        <x-label class="text-1xl">Course</x-label>
        <x-input name="course_id" placeholder="Write authors here" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('course_id')}}</x-input>
        <x-input-error :messages="$errors->get('course_id')" class="mt-2" />

        <x-label class="text-1xl">Metakeys</x-label>
        <textarea name="metakeys" placeholder="write your abstract here" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('metakeys')}}</textarea>
        <x-input-error :messages="$errors->get('metakeys')" class="mt-2" />

        <x-label class="text-1xl">File</x-label>
        <x-input type="file" name="filename" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></x-input>
        <x-input-error :messages="$errors->get('filename')" class="mt-2" />
        <x-button class="mt-4">{{ __('Submit') }}</x-button>
    </form>
</div> 

<div class="max-w-5xl mx-auto mt-6 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($theses as $theses)
        <div class="p-8 flex-wrap space-x-2">
            <div class="flex-wrap">
                <div class="flex-wrap justify-between items-center">
                    <div>
                        <a href="post/{{$theses->id}}" class="text-gray-800 text-lg font-bold">{{ $theses->title }}</a>
                        <small class="ml-2 text-sm text-gray-600">{{ $theses->created_at->format('n/j/Y') }}</small>
                        @unless ($theses->created_at->eq($theses->updated_at))
                        <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                    @endunless
                    </div>
                    <small class="ml-2 text-sm text-gray-600">Views: {{ $theses->views->count() }}</small>
                    <div>
                    </div>
                </div>
                <p class="mt-4 flex text-m text-gray-900">{{ $theses->course->course}} <br> {{$theses->college->college}} <br> {{$theses->year->year}}</p>
                @foreach ($theses->authors as $author)
                <p class="mt-4 w-1/2 text-sm font-bold text-gray-900">{{ $author->name}}</p>
                @endforeach
                <h5 class="mt-4 w-1/2 text-lg font-bold text-gray-900">Abstract</h5>
                <p class="mt-4 h-1/3 text-m text-gray-500 py-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $theses->abstract }}</p>
               
            </div>
        </div>
    @endforeach
</div>