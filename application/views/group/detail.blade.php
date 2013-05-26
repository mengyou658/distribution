@layout('layout')
@section('content')
<div>

    {{ $group->name }}
    <br />
    <br />
    {{ $group->description }}
    <hr />
    Page: {{ $page }}
    <br />
    Posts : <br /><br />
    @forelse ($posts as $post)
    {{ $post->title }}
    <br />
    <br />
    @empty
        No posts!
    @endforelse
</div>
@endsection