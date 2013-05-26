@layout('layout')
@section('content')
<div>
@forelse ($groups as $group)
    {{ $group->name }}
    <br />
@empty
    No groups!
@endforelse
</div>
@endsection