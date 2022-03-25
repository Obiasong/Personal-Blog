<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin/article.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <div class="p-2">
                                @error('title')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-label for="title">Title</x-label>
                            <x-input id="title" class="block w-full mt-1" name="title" required value="{{ old('title', $article->title) }}" type="text"/>
                        </div>
                        <div class="mb-4">
                            <div class="p-2">
                                @error('image')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-label for="image">Image</x-label>
                            <x-input id="image" class="block w-full mt-1" name="image" type="file" />
                        </div>
                        <div class="mb-4">
                            <div class="p-2">
                                @error('tags')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-label for="tags">Tags</x-label>
                            <input id="tags" class="block w-full mt-1" name="tags" type="text" value="{{old('tags', $tags)}}"/>
                            <span class="text-xs text-gray-400">Separated by comma</span>
                        </div>
                        <div class="mb-4">
                            <div class="p-2">
                                @error('category')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-label for="category">Category</x-label>
                            <select name="category" id="category" class="block w-full mt-1">
                                <option value="0">--- SELECT CATEGORY ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if ($category->id == $article->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <div class="p-2">
                                @error('article')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-label for="article">Article text</x-label>
                            <textarea id="article" class="block w-full mt-1" name="article"  rows="6">{{ old('article', $article->full_text) }}</textarea>
                        </div>
                        <div class="mt-6">
                            <x-button>Submit</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
