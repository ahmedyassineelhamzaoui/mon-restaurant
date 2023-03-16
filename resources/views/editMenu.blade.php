@include('components.tailwind')
@if(session('message'))
<div class="w-full mt-4 px-24">
<div id="alert-border" class="flex px-4 py-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div class="ml-3 text-sm font-medium">
        <strong class="mb-4" >{{session('message')}}</strong>
    </div>
    <button id="close-alert" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
</div>
@endif
@if ($errors->any())
    <div class="w-full mt-4 px-24">
    <div id="alert-border" class="flex px-4 py-4 mb-4 text-red-500 border-t-4 border-red-400 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium">
            @foreach ($errors->all() as $error)
            <p class="mb-4" > {{ $error }}</p>
            @endforeach
        </div>
        <button id="close-alert" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-400 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-500 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    </div>
@endif
<div class="h-screen flex justify-center items-center">
<div class="w-full mt-4 px-24">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
        <form action="{{route('DashboardMenu.update',$menu->id)}}"   method="post" class="border border-gray-200" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mx-4 mt-6 ">
                <div class="w-full">
                    <label for="menu_name" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">name of menu</label>
                    <input type="text" value="{{ $menu->menu_name }}"  name="menu_name"  id="menu_name" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                <div class="w-full">
                    <label for="menu_name" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">price of menu</label>
                    <input type="number" value="{{ $menu->menu_price }}"  name="menu_name"  id="menu_name" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                <div class="w-full">
                    <label for="menu_picture" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">picture of menu</label>
                    <input type="file"  name="menu_picture"  id="menu_picture" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                <div class="mt-1">
                    <label for="menu_description" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descreption of menu</label>
                    <textarea  name="menu_description" id="menu_description" class="bg-gray-50 rounded w-full border border-gray-300 p-2" placeholder="Descreption of dishes" rows="5">{{$menu->menu_description}}</textarea>
                </div>
              
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button  type="submit" class=" text-black border-2 hover:bg-green-500 border-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center font-sans">Update</button>
                    <a href="{{url('/dashboard')}}" type="button" class="text-black font-sans bg-gray-100 hover:bg-gray-300  border-2 border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Back</a>
            </div>
        </form>
    </div>
</div>
</div>