<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4" align="left">
                        <x-link :href="route('admin/category.index')">{{__('Back')}}</x-link>
                    </div>
                    <form method="POST" action="{{route('admin/category.update', $category->id)}}">
                        @method('PUT')
                        <div class="py-2">
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                            @csrf
                            <x-label class="block text-sm text-gray-600" for="name"/>{{__('Enter a name for your Category')}}
                            <x-input id="name" class="block w-full mt-1" name="name" type="text" value="{{$category->name}}" required/>
                        </div>
                        <x-button type="submit">{{__('Save Change')}}</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
