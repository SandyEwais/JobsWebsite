<x-layout>
    <x-searchbox>{{route('manage')}}</x-searchbox>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Posts
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @foreach ($items as $job)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{route('show',['item' => $job->id])}}">
                                    {{$job->title}}
                                </a>
                            </td>
                            @if ($job->user_id == Auth::user()->id)
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a
                                        href="{{route('edit',['job' => $job->id])}}"
                                        class="text-blue-400 px-6 py-2 rounded-xl"
                                        ><i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                        Edit</a
                                    >
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="{{route('destroy',['job' => $job->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i
                                                class="fa-solid fa-trash-can"
                                            ></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endif
                            
                        </tr>
                    @endforeach
                    

                </tbody>
            </table>
        </div>
    </div>
</x-layout>