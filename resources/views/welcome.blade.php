<x-app-layout>
        <div class="px-4 py-6 sm:px-0">
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Recently Shortened URLs</h2>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        @foreach($urls as $url)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <p class="font-medium text-2xl text-indigo-600 truncate">
                                            <a href="{{ route('redirect', $url) }}" target="_blank" class="hover:underline">{{ $url->short_url }}</a>
                                        </p>

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