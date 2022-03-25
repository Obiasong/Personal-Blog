<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage Articles') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-4" align="left">
                    <div class="p-2">
                        @error('message')
                        <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <x-link :href="route('admin/article.create')">{{__('Create New Article')}}</x-link>
                </div>
                <table class="w-full px-6 py-4 border-b border-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-4 sm:text-left border-b border-gray-200">{{__('Title')}}</th>
                        <th class="px-6 py-4 sm:text-left border-b border-gray-200">{{__('Category')}}</th>
                        <th class="px-6 py-4 sm:text-left border-b border-gray-200">{{__('Tags')}}</th>
                        <th class="px-6 py-4 sm:text-left border-b border-gray-200">{{__('Image')}}</th>
                        <th class="sm:text-left px-6 py-4 border-b border-gray-200">{{__('Modified On')}}</th>
                        <th class="sm:text-left lg:px-8 py-2 border-b border-gray-200">{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $art)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $art->title }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $art->category->name }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                @foreach($art->tags as $tagger)
                                    <button value="{!! $tagger->pivot->tag_id !!}" style="background-color: #6b7280; color: #e2e8f0"> {{ \App\Models\Tag::findorfail($tagger->pivot->tag_id)->name }}</button>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                @if($art->image != "")
                                    <img src="{{ asset('article/'.$art->image) }}" alt="" style="width: 100px; height: 100px" title="{{$art->title}}"/>
                                @else
                                    <img src="{{ asset('storage/avatar.jpeg') }}" alt="" style="width: 100px; height: 100px" title="article cover image" />
                                @endif
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $art->updated_at }}</td>
                            <td class="px-8 py-2 border-b border-gray-200">
                                <a href="{{route('admin/article.edit', $art->id)}}">
                                    <x-button>
                                        {{ __('Edit') }}
                                    </x-button>
                                </a>
                                <form method="POST" action="{{ route('admin/article.destroy', $art->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this article?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit" class="focus:bg-indigo-100; bg-white">
                                        {{ __('Delete') }}
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="active:bg-gray-300">{{ __('You have not created any article yet') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table><br/>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
</x-app-layout>
