
<x-wrapper>
    <div style="width:70%;" class="p-7 m-auto bg-gray-100">
        @auth
        <form action="/note/update/dashboard/{{$note->id}}" method="POST">
            @csrf
            @method('PUT')
                <h2 class="text-gray-800 p-3 font-semibold text-xlg">Create Post</h2>
            <input placeholder="Title" type="text" value="{{$note->title}}" name="title" class="w-full py-1 px-3 my-1">
            @error('title')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror

            <input placeholder="Tags" type="text" name="tags" value="{{$note->tags}}" class="w-full py-1 px-3 my-1">
            @error('tags')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror
            <textarea name="body" placeholder="Your note" class="w-full py-1 px-3 my-2">{{$note->note}}</textarea>
            @error('body')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror

            <button class="py-2 px-3 text-center bg-orange-500 font-semibold text-white rounded-md">Save changes</button>
        </form>


        @else
            <center><a href="/login" class="bg-red-500 py-3 px-7 m-2 text-gray-200 rounded-md">Login to post note</a></center>
        @endauth
       
        
    </div>
  </x-wrapper>