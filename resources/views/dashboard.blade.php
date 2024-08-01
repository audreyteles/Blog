<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-[50vh]">
                <div class="p-10 text-gray-900 flex flex-col w-fit">
                    <a href="{{route("posts.create")}}"
                       class="bg-green-500 text-white font-bold h-full p-4 rounded-lg cursor-pointer hover:bg-green-600 m-2">Criar
                        post</a>
                    <a href="{{route("posts.index")}}"
                       class="bg-green-500 text-white font-bold h-full p-4 rounded-lg cursor-pointer hover:bg-green-600 m-2">Ver
                        posts</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
