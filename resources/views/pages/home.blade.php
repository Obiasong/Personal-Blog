<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('List of Articles') }}
                </h2><br/>
                        <table class="border" style="border: solid">
                            <thead>
                            <tr style="border: solid">
                                <th style="border: solid">@lang('blog/article.title')</th>
                                <th style="border: solid">@lang('blog/article.category')</th>
                                <th style="border: solid">@lang('blog/article.tags')</th>
                                <th style="border: solid">@lang('blog/article.image')</th>
                                <th style="border: solid">@lang('blog/article.created')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $post)
                                <tr>
                                    <td style="border: solid">{{ $post->title }}</td>
                                    <td style="border: solid">{{ $post->category->name }}</td>
                                    <td style="border: solid">
                                    @foreach($post->tags as $tagger)
                                            <button value="{!! $tagger->pivot->tag_id !!}" style="background-color: #6b7280; color: #e2e8f0"> {{ \App\Models\Tag::findorfail($tagger->pivot->tag_id)->name }}</button>
                                    @endforeach
                                    </td>
                                    @if($post->image != "")
                                    <td style="border: solid"><img src="{{ asset('articles/'.$post->image) }}" /></td>
                                    @else
                                    <td style="border: solid"><img src="{{ asset('storage/avatar.jpeg') }}" alt="" style="width: 100px; height: 100px" title="article cover image" /></td>
                                    @endif                           
                                    <td style="border: solid">{{ $post->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="active:bg-gray-300">{{ trans('blog/article.no_article') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
