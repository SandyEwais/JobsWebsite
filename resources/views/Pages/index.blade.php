<x-layout>
    @include('includes._hero')
    <x-searchbox>{{route('index')}}</x-searchbox>
<x-wrap-cards>
    
    <x-item-card :items="$items"/>
    
</x-wrap-cards>
<x-swiping-pages :items="$items"/>
</x-layout>