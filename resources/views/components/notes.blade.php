@props('notes')
<section>
    @foreach($notes as $note)
        <div class="p-5 rounded-full my-4 bg-red-200">{{$note}}</div>
    @endforeach
</section> 