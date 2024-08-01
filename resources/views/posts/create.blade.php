<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route("posts.store")}}" method="post" class="flex flex-col m-10">
                        @csrf
                        <input type="text" name="title" id="title" class="rounded-lg my-5 h-16"
                               placeholder="Título do post">

                        <textarea class="rounded-lg h-52 my-5" placeholder="Conteúdo do post" name="content" id="content"></textarea>
                        <div class="flex justify-between">
                            <input type="submit" value="Postar"
                                   class="bg-green-500 text-white font-bold h-full p-4 rounded-lg cursor-pointer hover:bg-green-600">
                            <a href="{{route("dashboard")}}"
                               class="bg-red-500 text-white font-bold h-full p-4 rounded-lg cursor-pointer hover:bg-red-600">
                                Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
