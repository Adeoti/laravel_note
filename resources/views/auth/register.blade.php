<x-wrapper>
    <div class="m-8">
        <form action="/auth/register" method="post" style="width:40%;" class="m-auto bg-gray-300 p-8">
            @csrf
            <h2 class="font-bold text-center text-red-700 text-lg my-3">Register here</h2>
            <input type="email" value="{{old('email')}}" name="email" placeholder="Your email" class="block p-2 w-full my-2">
                @error('email')
                    <p class="text-red-700 py-1 px-3 bg-white rounded-sm">{{$message}}</p>
                @enderror
            <input type="text" value="{{old('name')}}" name="name" id="" placeholder="Your full name" class="block p-2 w-full my-2">
                @error('name')
                    <p class="text-red-700 py-1 px-3 bg-white rounded-sm">{{$message}}</p>
                @enderror
            <input type="password" value="{{old('password')}}" name="password" placeholder="Your pass" class="block p-2 w-full my-2">
                @error('password')
                    <p class="text-red-700 py-1 px-3 bg-white rounded-sm">{{$message}}</p>
                @enderror
            <input type="password"  name="password_confirmation" placeholder="Confirm your pass" class="block p-2 w-full my-2">
                @error('password')
                     <p class="text-red-700 py-1 px-3 mb-3 bg-white rounded-sm">{{$message}}</p>
                @enderror
            <button type="submit" class="bg-red-700 py-2 px-5 font-medium text-white rounded-sm">Sign Up</button>
    </form>
    </div>
    
</x-wrapper>