@props(['items'])
@foreach ($items as $item)
@php
    $tags = explode(',', $item->tags)
@endphp
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$item->logo ? asset('storage/'.$item->logo) : asset('images/No_Image_Available.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{route('show',['item' => $item->id])}}">{{ $item->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
            <ul class="flex">
                @foreach ($tags as $tag)
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                        <a href="{{route('index',['tag' => $tag ])}}">{{ $tag }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
            </div>
        </div>
    </div>
</div>
@endforeach 
