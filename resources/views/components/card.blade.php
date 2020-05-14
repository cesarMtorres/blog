<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded px-8 pt-4 pb-6']) }}>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
  <img class="w-full" src="/img/card-top.jpg" alt="">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $title }}</div>
    <p class="text-gray-700 text-base">
      {{$slot}}
    </p>
  </div>
  @if($hasTags)
  <div class="px-6 py-4">
    @foreach($tags as $tag)
    <a href="/tags/{{$tag}}">

    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{$tag}}</span>
</a>
@endforeach

  </div>
@endif
</div>
</div>