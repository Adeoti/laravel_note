
<x-wrapper>
    <div style="width:70%;" class="p-7 m-auto bg-gray-100">
        @auth
        <form action="/note/create/dashboard" method="POST">
            @csrf
                <h2 class="text-gray-800 p-3 font-semibold text-xlg">Create Post</h2>
            <input placeholder="Title" type="text" name="title" class="w-full py-1 px-3 my-1">
            @error('title')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror

            <input placeholder="Tags" type="text" name="tags" class="w-full py-1 px-3 my-1">
            @error('tags')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror
            <textarea name="body" placeholder="Your note" class="w-full py-1 px-3 my-2"></textarea>
            @error('body')
                <p class="text-red-700 bg-white rounded-sm py-1 px-2">{{$message}}</p>
            @enderror

            <button class="py-2 px-3 text-center bg-orange-500 font-semibold text-white rounded-md">Post</button>
        </form>


        @else
            <center><a href="/login" class="bg-red-500 py-3 px-7 m-2 text-gray-200 rounded-md">Login to post note</a></center>
        @endauth
        @if($searchNote != "")
            <div class="p-3 bg-gray-300 rounded-lg my-4">
                Your search result for <span class="text-red-400 font-medium border-y-2 border-dotted border-slate-400 p-1 rounded-xl">{{$searchNote}}</span>
            </div>
        @endif
        <h2 class="text-5xl font-bold block mt-10 text-red-500">Dashboard Notes</h2>
            @foreach($notes as $note)
                <div class="p-4 bg-red-100 my-4 rounded-md">
                    
                    <h2 class="text-2xl font-bold text-red-500 my-2">
                        {{$note->title}}
                        <span class="text-xs py-3 text-gray-500">
                            {{ $note->created_at->diffForHumans() }}
                        </span>
                    </h2>
                        @php
                            $tags = explode(',', $note->tags);
                        @endphp
                        @foreach($tags as $tag)
                            <a href="?tag={{$tag}}" class="p-1 text-center text-white bg-gray-500 rounded-r-full m-3">
                                {{$tag}}
                            </a>
                        @endforeach
                    <p class="p-2">
                        {{$note->note}}
                    </p>
                    <div class="p-3 text-center flex justify-items-end">
                        <a href="/edit/{{$note->id}}" class="font-semibold text-white m-3 text-xs bg-blue-600 py-1 px-2">edit</a>
                        <form action="/delete/{{$note->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="font-semibold text-white text-xs bg-red-500 m-3 py-1 px-2">delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
                <div class="p-4 my-3 bg-gray-100 rounded-md">
                    {{$notes->links()}}
                </div>
    </div>
  </x-wrapper>