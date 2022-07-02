<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Show Tasks') }}
      </h2>
   </x-slot>
   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="p-6 bg-white border-b border-gray-200">
            <div class="card text-center mt-5">
               <div class="card-header">
                  <b>TODO DETAILS</b>
               </div>
               <div class="card  bg-secondary mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{$task->title}}</h5>
                  <p class="card-text">{{$task->description}}</p>
                  @if($task->labels)
                  @foreach($task->labels as $label)
                  <p class="card-text">#{{$label->name}}</p>
                  @endforeach   
                  @endif
                  <a href="{{route('task.delete',['task'=>$task->id])}}"><span class="btn btn-danger">Delete</span></a>
               </div>
              </div>
               <div class="card-body">
                  <h3>Add Label To Task</h3>
                  <form action="{{route('label.create')}}" method="POST">
                     @csrf
               
                        <x-label for="name" :value="__('name')" />
                        <x-input id="name" class="block mt-1 w-ful" type="text" name="name" :value="old('name')" required autofocus />
             
                     <input type="hidden" name="task" value="{{$task->id}}">
                     <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                           {{ __('add') }}
                        </x-button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div
</x-app-layout>