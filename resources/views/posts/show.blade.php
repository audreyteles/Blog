@php use Carbon\Carbon; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="p-2 text-gray-900">
                    <br>
                    <a class="m-5 p-3 border rounded-lg breakline" href="{{route('posts.index')}}">Voltar</a>

                    <div class="p-10 m-5 text-gray-900 bg-gray-100 rounded-lg">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name={{$post->user->name}}"
                                 class="w-10 rounded-full">
                            <div class="flex flex-col p-2">
                                <h1 class="">{{($post->user->name)}}</h1>
                                <p class="text-justify text-xs bg-gray-200 w-fit p-0.5 rounded-lg ">{{Carbon::parse($post->created_at)->setTimezone("America/Sao_Paulo")->translatedFormat('H:i d/m/Y')}}</p>
                            </div>
                        </div>
                        <hr class="my-5">
                        <h1 class="font-extrabold text-xl my-2">{{$post->title}}</h1>
                        <p class="text-justify">{!! nl2br(e($post->content)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
