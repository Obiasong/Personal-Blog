<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4" align="left">
                        <div class="p-2">
                            @error('message')
                                <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-link :href="route('admin/tag.create')">{{__('Create a Tag')}}</x-link>
                    </div>
                    <table class="w-full px-6 py-4 border-b border-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 sm:text-left border-b border-gray-200">{{__('Tag')}}</th>
                            <th class="sm:text-left px-6 py-4 border-b border-gray-200">{{__('Modified On')}}</th>
                            <th class="sm:text-left lg:px-8 py-2 border-b border-gray-200">{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tags as $tag)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tag->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tag->updated_at }}</td>
                                <td class="px-8 py-2 border-b border-gray-200">
                                        <a href="{{route('admin/tag.edit', $tag->id)}}">
                                        <x-button>
                                            {{ __('Edit') }}
                                        </x-button></a>
                                    <form method="POST" action="{{ route('admin/tag.destroy', $tag->id) }}"
                                          onsubmit="return confirm('You are about to delete this tag. Do you want to continue?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
{{--                                            <input type="hidden" name="_method" value="DELETE">--}}
                                        <x-button type="submit" class="focus:bg-indigo-100; bg-white">
                                            {{ __('Delete') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="active:bg-gray-300">{{ __('No Existing Tags') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table><br/>
                    {{ $tags->onEachSide(3)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
