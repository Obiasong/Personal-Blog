<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('blog/article.documentation') }}
        </h2>
{{--        Put all text in header slot just for presentation--}}
        <div class="pt-6">
            <div class="pt-4">
                <div class="flex items-center">
                    <div class="text-lg font-semibold"><span class="underline text-gray-900 dark:text-white">{{__('blog/article.about')}}</span></div>
                </div>

                <div class="pt-2">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        A personal blog application where a guest can view list of articles, visit the documentation of the project and they can view details of a particular article
                        as well as the possibility of reading the article.
                        A logged in user can manage their articles that is create, update and delete articles that they added.
                        The administrator of the application can manage articles, manage categories and manage tags.
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <div class="flex items-center">
                    <div class="text-lg font-semibold"><span class="underline text-gray-900 dark:text-white">{{__('blog/article.how_to_add_article')}}</span></div>
                </div>

                <div class="pt-2">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        A logged in user can manage their articles that is create, update and delete articles that they added.To add an article,
                        follow the following steps:
                        <ul>
                            <li>Login using your email and password <a href="{{route('login')}}" class="text-blue-700 dark:bg-blue-900 underline">Login</a> </li>
                            <li>Click on Manage Articles</li>
                            <li>The link takes you list of articles added by that user</li>
                            <li>On the top right click the button "Add New Article"</li>
                            <li>Enter the required information</li>
                            <li>You can Save to publish later or Save and Publish immediately</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <div class="flex items-center">
                    <div class="text-lg font-semibold"><span class="underline text-gray-900 dark:text-white">{{__('blog/article.how_to_add_tag')}}</span></div>
                </div>

                <div class="pt-2">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        The administrator manages tags create, update and delete tags.To add an tag,
                        follow the following steps replacing article with tags:
                        <ul>
                            <li>Login using your email and password as the administrator <a href="{{route('login')}}" class="text-blue-700 dark:bg-blue-900 underline">Login</a> </li>
                            <li>Click on Manage Articles</li>
                            <li>The link takes you list of articles added by that user</li>
                            <li>On the top right click the button "Add New Article"</li>
                            <li>Enter the required information</li>
                            <li>You can Save to publish later or Save and Publish immediately</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <div class="flex items-center">
                    <div class="text-lg font-semibold"><span class="underline text-gray-900 dark:text-white">{{__('blog/article.how_to_add_category')}}</span></div>
                </div>

                <div class="pt-2">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        The administrator manages the article categories that is create, update and delete categories.To add an article,
                        follow the following steps replacing article with category:
                        <ul>
                            <li>Login using your email and password as the administrator<a href="{{route('login')}}" class="text-blue-700 dark:bg-blue-900 underline">Login</a> </li>
                            <li>Click on Manage Articles</li>
                            <li>The link takes you list of articles added by that user</li>
                            <li>On the top right click the button "Add New Article"</li>
                            <li>Enter the required information</li>
                            <li>You can Save to publish later or Save and Publish immediately</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <div class="flex items-center">
                    <div class="text-lg font-semibold"><span class="underline text-gray-900 dark:text-white">{{__('blog/article.about')}}</span></div>
                </div>

                <div class="pt-2">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        A personal blog application where a guest can view list of articles, visit the documentation of the project and they can view details of a particular article
                        as well as the possibility of reading the article.
                        A logged in user can manage their articles that is create, update and delete articles that they added.
                        The administrator of the application can manage articles, manage categories and manage tags.
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="ml-6 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </x-slot>
</x-app-layout>
