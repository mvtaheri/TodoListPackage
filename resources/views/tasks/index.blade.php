<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TODO LIST') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="row mt-3">
        <div class="col-12 align-self-center">
            <form action="{{route('label.search')}}" method="POST">
            @csrf

            <div>
                <x-label for="search" :value="__('search')" />

                <x-input id="search" class="block mt-1 w-full" type="text" name="search" :value="old('search')" required autofocus />
            </div>
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('search') }}
                </x-button>
            </div>
        </form>
        </div> 
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($tasks as $todo)
                    <li class="list-group-item"><a href="{{route('tasks.show',$todo)}}" style="color: cornflowerblue">{{$todo->title}}</a>
                    </li>
                     <li class="list-group-item"><a href="details" style="color: cornflowerblue">{{$todo->description}}</a>
                     </li>
                     <li><a href="{{route('tasks.show',['task'=>$todo->id])}}"><span class="btn btn-danger">show</span>
                       </a>
                   </li>
                       <li><a href="{{route('task.delete',['task'=>$todo->id])}}"><span class="btn btn-danger">Delete</span>
                       </a>
                   </li>
                @endforeach
            </ul>
        </div>
                   </div>
             </div>
            </div>
        </div>
    </div>
</x-app-layout>