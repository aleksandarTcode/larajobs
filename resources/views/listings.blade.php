<h1>{{ $heading }}</h1>
@foreach($listings as $listing)
    <a href="/listing/{{ $listing->id }}"><h3>{{ $listing->title }}</h3></a>
    <p>{{ $listing->description }}</p>

@endforeach

