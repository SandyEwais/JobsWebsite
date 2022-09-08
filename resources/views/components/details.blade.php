@props(['item'])
@php
    $tags = explode(',',$item->tags)
@endphp
<a href="{{route('index')}}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$item->logo ? asset('storage/'.$item->logo) : asset('images/No_Image_Available.jpg')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{ $item->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
                        <ul class="flex">
                            @foreach ($tags as $tag)
                                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                                    <a href="{{route('index',['tag' => $tag])}}">{{ $tag }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{ $item->description }}
                                </p>
                                <a
                                    href="{{$item->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$item->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                                @auth
                                <div class="flex justify-around">
                                    <a class="p-5 bg-slate-700 text-white py-2 rounded-xl hover:opacity-80" href="{{route('edit',['job' => $item->id])}}"><i class="fa-solid fa-pencil"></i>Edit</a>
                                    <form method="POST" action="{{route('destroy',['job' => $item->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-4 bg-red-500 text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-trash"></i>Delete</button>
                                    </form>
                                </div>
                                @endauth
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>