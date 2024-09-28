<nav class="bg-white shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-gray-800">URL Shortener</span>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                @auth
                    <div class="fi-dropdown fi-user-menu relative" >
                        <div class="fi-dropdown-trigger flex cursor-pointer" @click="open = ! open" aria-expanded="true">
                            <button aria-label="User menu" type="button" class="shrink-0">
                                <img class="fi-avatar object-cover object-center fi-circular rounded-full h-8 w-8 fi-user-avatar" src="https://ui-avatars.com/api/?name=D+U&amp;color=FFFFFF&amp;background=09090b" alt="Avatar of Demo User">
                            </button>
                        </div>

                        <div class="fi-dropdown-panel absolute z-10 top-[50px] right-0 w-screen divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-gray-950/5 transition dark:divide-white/5 dark:bg-gray-900 dark:ring-white/10 !max-w-[14rem]" x-show="open" @click.outside="open = false">
                            <div class="fi-dropdown-header flex w-full gap-2 p-3 text-sm  fi-dropdown-header-color-gray fi-color-gray">
                                <svg class="fi-dropdown-header-icon h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd"></path>
                                </svg>

                                <span class="fi-dropdown-header-label flex-1 truncate text-start text-gray-700 dark:text-gray-200" style="">
                                    {{ auth()->user()->name }}
                                </span>
                            </div>
                            <div class="fi-dropdown-list p-1">
                                <a href="{{ route('dashboard') }}" style=";" class="fi-dropdown-list-item flex w-full items-center gap-2 whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 fi-dropdown-list-item-color-gray fi-color-gray">
                                    <svg class="fi-dropdown-list-item-icon h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path d="M12 2C6.48 2 2 6.48 2 12c0 5.52 4.48 10 10 10s10-4.48 10-10C22 6.48 17.52 2 12 2zm0 16c-3.31 0-6-2.69-6-6 0-.55.45-1 1-1s1 .45 1 1c0 2.21 1.79 4 4 4s4-1.79 4-4c0-.55.45-1 1-1s1 .45 1 1c0 3.31-2.69 6-6 6zm0-12a.9959.9959 0 0 1 .71 1.71l-3.29 3.29a1.004 1.004 0 0 1-1.42-1.42l3.29-3.29A.9959.9959 0 0 1 12 6z"/>
                                    </svg>

                                    <span class="fi-dropdown-list-item-label flex-1 truncate text-start text-gray-700 dark:text-gray-200" style="">
                                        Dashboard
                                    </span>
                                </a>
                            </div>
                            <div class="fi-dropdown-list p-1">
                                <a href="{{ route('profile.edit') }}" style=";" class="fi-dropdown-list-item flex w-full items-center gap-2 whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 fi-dropdown-list-item-color-gray fi-color-gray">
                                    <svg class="fi-dropdown-list-item-icon h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>


                                    <span class="fi-dropdown-list-item-label flex-1 truncate text-start text-gray-700 dark:text-gray-200" style="">
                                        Profile
                                    </span>
                                </a>
                            </div>

                            <div class="fi-dropdown-list p-1">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" style=";" class="fi-dropdown-list-item flex w-full items-center gap-2 whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 fi-dropdown-list-item-color-gray fi-color-gray">
                                        <svg class="fi-dropdown-list-item-icon h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z" clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-dropdown-list-item-label flex-1 truncate text-start text-gray-700 dark:text-gray-200" style="">
                                            Sign out
                                        </span>

                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md bg-primary text-primary-foreground hover:bg-primary/90">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-secondary text-secondary-foreground hover:bg-secondary/90">
                        Register
                    </a>
                @endauth

                <button class="sm:hidden p-2 rounded-md hover:bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>