<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 space-y-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Shorten Your URL</h1>
            <form action="{{ route('shorten') }}" class="flex space-x-2" method="POST">
                @csrf
                    <input type="text" name="url" placeholder="Enter your long URL here" class="flex-grow px-3 py-2 w-full
                 bg-background text-foreground border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-ring focus:border-ring" />
                    <button class="px-4 py-2 bg-primary text-primary-foreground rounded-md hover:bg-primary/90" type="submit">Shorten</button>

            </form>
        </div>

        <div class="flex flex-col gap-y-6">
            <h2 class="text-2xl font-bold text-gray-900">Shortened URLs</h2>
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200">

                    @foreach($urls as $url)
                        <li>
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-2xl text-indigo-600 truncate">
                                        <a href="{{ route('redirect', $url) }}" target="_blank" class="hover:underline">{{ $url->short_url }}</a>
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $url->click }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between pt-2">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            {{ $url->url }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
