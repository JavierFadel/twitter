<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Write something wonderfull..') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">

                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center justify-between mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="{{ URL::to(getPostAuthorImage($tweet->user_id)) }}" alt="Jese Leos">
                                <div>
                                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</a>
                                    <p class="text-base font-light text-gray-500 dark:text-gray-400">{{ @getPostAuthor($tweet->user_id) }}</p>
                                    <p class="text-base font-light text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ @convertDateToTime($tweet->created_at) }}</time></p>
                                </div>
                            </div>
                            <div class="flex">
                                <form action="{{ route('tweet.edit', $tweet->id) }}" method="GET">
                                    @csrf
                                    
                                    <button type="submit" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 mr-2 mb-2">
                                        <svg class="w-4 mr-2 -ml-1" fill="#f2f2f2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z" fill-rule="nonzero"/></svg>
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('tweet.delete', $tweet->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 mr-2 mb-2">
                                        <svg class="w-4 mr-2 -ml-1" fill="#f2f2f2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/></svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </address>
                        
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $tweet->content }}</h1>

                        @if ($tweet->image_url != NULL)
                            <img class="mb-6 h-auto max-w-lg rounded-lg" src="{{ URL::to($tweet->image_url) }}" alt="image description">
                        @else
                            <img class="mb-6 h-44 object-cover w-full rounded-lg" src="https://images.unsplash.com/photo-1548350896-fafc317d3ceb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="image description">
                        @endif

                        <div class="flex mb-4">
                            <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 mr-2 mb-2">
                                <svg class="w-4 mr-2 -ml-1" clip-rule="evenodd" fill="#f2f2f2" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7.234 3.004c-2.652 0-5.234 1.829-5.234 5.177 0 3.725 4.345 7.727 9.303 12.54.194.189.446.283.697.283s.503-.094.697-.283c4.977-4.831 9.303-8.814 9.303-12.54 0-3.353-2.58-5.168-5.229-5.168-1.836 0-3.646.866-4.771 2.554-1.13-1.696-2.935-2.563-4.766-2.563zm0 1.5c1.99.001 3.202 1.353 4.155 2.7.14.198.368.316.611.317.243 0 .471-.117.612-.314.955-1.339 2.19-2.694 4.159-2.694 1.796 0 3.729 1.148 3.729 3.668 0 2.671-2.881 5.673-8.5 11.127-5.454-5.285-8.5-8.389-8.5-11.127 0-1.125.389-2.069 1.124-2.727.673-.604 1.625-.95 2.61-.95z" fill-rule="nonzero"/></svg>
                                Like
                            </button>
                        
                            <form action="{{ Route('comment.store') }}" method="POST" class="mb-4 w-full">   
                                @csrf

                                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Comment</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 ml-1" fill="#f2f2f2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z" fill-rule="nonzero"/></svg>
                                    </div>
                                    <input type="text" id="text" name="comment" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comment" required>
                                    <input id="post" name="post_id" type="number" value="{{ $tweet->id }}" class="hidden" />
                                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </div>
                            </form>
                        </div>

                        {{-- Comment section. --}}
                        <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Comments</h3>
                        <div class="space-y-4 text-white">
                            @if ($comments != NULL)
                                @foreach ($comments as $item)
                                    <div class="flex">
                                        <div class="flex-shrink-0 mr-3">
                                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ URL::to(getPostAuthorImage($tweet->user_id)) }}" alt="">
                                        </div>
                                        <div class="flex justify-between w-full text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                            <div>
                                                <strong>{{ @getPostAuthorName($item->user_id) }}</strong> <span class="text-xs text-gray-400">{{ @convertToTime($item->created_at) }}</span>
                                                <p class="text-sm">
                                                    {{ $item->comment }}
                                                </p>
                                                <div class="mt-4 flex items-center">
                                                    <div class="flex -space-x-2 mr-2">
                                                        <img class="rounded-full w-6 h-6 border border-white" src="https://images.unsplash.com/photo-1604079628040-94301bb21b91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="">
                                                        <img class="rounded-full w-6 h-6 border border-white" src="https://images.unsplash.com/photo-1604079628040-94301bb21b91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="">
                                                    </div>
                                                    <div class="text-sm text-gray-500 font-semibold">
                                                        5 Replies
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('comment.delete', $item->id) }}" method="POST">
                                                @csrf
            
                                                <input id="post" name="post_id" type="number" value="{{ $tweet->id }}" class="hidden" />
                                                <button type="submit" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 mr-2 mb-2">
                                                    <svg class="w-4 mr-2 -ml-1" fill="#f2f2f2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/></svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>  
                                @endforeach
                            @endif

                            {{-- <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                                </div>
                                <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                    <p class="text-sm">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                    magna aliquyam erat, sed diam voluptua.
                                    </p>
                                    
                                    <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>

                                    <div class="space-y-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0 mr-3">
                                        <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                                        </div>
                                        <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                        <p class="text-xs sm:text-sm">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                            sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua.
                                        </p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex-shrink-0 mr-3">
                                        <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                                        </div>
                                        <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                        <p class="text-xs sm:text-sm">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                            sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua.
                                        </p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        {{-- @if ($comments)
                            @foreach ($comments as $item)
                                
                            @endforeach
                        @endif --}}
                    </header>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
