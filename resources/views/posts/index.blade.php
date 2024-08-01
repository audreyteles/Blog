@php use Carbon\Carbon;use Illuminate\Support\Facades\Auth; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900">
                    <br>
                    <a class="m-5 p-3 border rounded-lg hover:bg-gray-100" href="{{route('dashboard')}}">Voltar</a>
                    @forelse($posts as $post)
                        <div class="p-10 m-5 text-gray-900 bg-gray-100 rounded-lg hover:ring hover:ring-gray-300">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name={{$post->user->name}}"
                                     class="w-10 rounded-full" alt="foto de perfil">
                                <div class="flex flex-col p-2">
                                    <h1 class="">{{($post->user->name)}}</h1>
                                    <p class="text-justify text-xs bg-gray-200 w-fit p-0.5 rounded-lg ">{{Carbon::parse($post->created_at)->setTimezone("America/Sao_Paulo")->translatedFormat('H:i d/m/Y')}}</p>
                                </div>
                            </div>
                            <hr class="my-5">
                            <h1 class="font-extrabold text-xl my-2">{{$post->title}}</h1>
                            <p class="text-justify truncate">{{$post->content}}</p>
                            <div class="my-2 flex flex-row">
                                <a class="bg-white w-fit h-fit p-1.5 rounded-lg text-black mr-5 border border-gray-700"
                                   href="{{route("posts.show", $post->id)}}">
                                    Ler completo
                                </a>
                                @if($post->user_id == Auth::id())
                                    <form action="{{route("posts.destroy", $post->id)}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="bg-red-600 w-fit h-fit p-1.5 rounded-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>

                                        </button>
                                    </form>
                                    <a class="bg-blue-600 w-fit h-fit p-1.5 rounded-lg text-white mx-4"
                                       href="{{route("posts.edit", $post->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                    @empty
                        <div class="p-10 m-5 text-gray-900 bg-gray-100 rounded-lg">
                            <p>Nenhum post encontrado!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
