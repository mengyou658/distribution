@layout('layout')
@section('content')
<div>
@forelse ($posts as $post)
    {{ $post->title }}
    <br />
@empty
    No posts!
@endforelse
</div>
@endsection