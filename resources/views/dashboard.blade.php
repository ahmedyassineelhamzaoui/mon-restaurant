@include('components.tailwind')

@if (session('success'))
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
    <div id="alert-border-2" class="flex px-4 py-4 mb-4 text-red-500 border-t-4 border-red-400 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium">
            @foreach ($errors->all() as $error)
            <p class="mb-4" > {{ $error }}</p>
            @endforeach
        </div>
        <button id="close-alert-2" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-400 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-500 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    </div>
@endif

<div class="flex justify-between mx-4 mt-4">
    <div class="flex items-center">
    <form  method="POST" action="{{url('logout')}}">
        @csrf
        <button name="logout" type="submit" class="text-yellow-400 bg-black px-3 py-2 font-sans rounded-lg font-bold hover:bg-yellow-400 hover:text-white"><i class="fa-solid fa-plus mr-2  "></i>log out</button>
    </form>
    <a href='{{url('DashboardMenu')}}'  class="ml-2 text-yellow-400 bg-black px-3 py-2 font-sans rounded-lg font-bold hover:bg-yellow-400 hover:text-white"><i class="fa-solid fa-plus mr-2  "></i>menu</a>

    </div>
    <div class="flex">
        <button id="target-addForm" class="mr-2 text-yellow-400 bg-black px-3 py-2 font-sans rounded-lg font-bold hover:bg-yellow-400 hover:text-white"><i class="fa-solid fa-plus mr-2  "></i>Add picture</button>    </div>
    </div>
<div id="add-images" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="flex fixed hidden justify-center items-center top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <div class="bg-white rounded-lg shadow dark:bg-gray-700 ">
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Images
                </h3>
                <button id="closeAdd-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{url('dashboard')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="mx-4 mt-6">
                    <div class="mt-1">
                        <label for="picture_dishes" class="font-serif block mb-2  text-sm font-medium text-gray-900 dark:text-white">Picture of dishes</label>
                        <input type="file" name="plat_picture"  id="picture_dishes" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mt-1">
                        <label for="descreption_dishes" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descreption of dishes</label>
                        <textarea name="description" id="description" class="bg-gray-50 rounded w-full border border-gray-300 p-2" placeholder="Descreption of dishes" rows="5"></textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="add-button" type="submit" class=" text-black border-2 hover:bg-green-500 border-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center font-sans">Create</button>
                    <button id="decline-button" type="button" class="text-black font-sans bg-gray-100 hover:bg-gray-300  border-2 border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="w-full mt-4 px-24 pb-4 ">
   
    <div class="relative overflow-x-auto shadow-md  sm:rounded-lg w-full">
        
        <table class="w-full text-sm text-left border  text-gray-500 dark:text-gray-400">
          
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th class="px-6 py-3">
                        picture
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descreption
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$image->id}}
                    </th>
                    <td class="px-6 py-4 text-center">
                        <img style="width:60px;height:60px;border-radius:50%" src="/myimages/{{$image->plat_picture}}" alt="foody">
                    </td>
                    <td class="px-6 py-4">
                       {{$image->description}}
                    </td>          
                   
                    <td class="px-6 py-4 text-center">
                            <div class="flex">                                
                                <a href="{{ url('/editPlat/'.$image->id)}}"   class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-green-400 hover:text-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </a>
                                <form method="post"  action="{{ route('dashboard.destroy', $image->id) }}"    >                                @csrf
                                @method('delete')
                                <button  type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-red-400 hover:text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex items-center justify-center ">
            <div class="flex justify-center my-2">
                {{ $images->links() }}
            </div> 
        </div>  
    </div>
</div>


<div id="add-menu" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="flex fixed hidden justify-center items-center top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <div class="bg-white rounded-lg shadow dark:bg-gray-700 ">
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add menu
                </h3>
                <button id="closeAdd-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{url('dashboard')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="mx-4 mt-6">
                    <div class="mt-1">
                        <label for="menu_name" class="font-serif block mb-2  text-sm font-medium text-gray-900 dark:text-white">menu_name</label>
                        <input type="text" name="menu_name"  id="menu_name" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mt-1">
                        <label for="menu_picture" class="font-serif block mb-2  text-sm font-medium text-gray-900 dark:text-white">Picture of dishes</label>
                        <input type="file" name="menu_picture"  id="menu_picture" class="py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mt-1">
                        <label for="menu_description" class="font-serif block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descreption of dishes</label>
                        <textarea name="menu_description" id="menu_description" class="bg-gray-50 rounded w-full border border-gray-300 p-2" placeholder="Descreption of dishes" rows="5"></textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="add-menu" type="submit" class=" text-black border-2 hover:bg-green-500 border-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center font-sans">Create</button>
                    <button id="decline-menu" type="button" class="text-black font-sans bg-gray-100 hover:bg-gray-300  border-2 border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>
     @else
    <div class="w-full h-screen flex justify-center items-center bg-gray-300">
        <p class="font-bold">Page not found 404</p>
    </div>

    @endif  

