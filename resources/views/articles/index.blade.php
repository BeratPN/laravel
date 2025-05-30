@extends('layouts.app')

@section('content')
@auth
<div>
    <h1>Makaleler</h1>
</div>

@can('list-articles')
<div>
    Article List
</div>
@endcan

@can('create-articles')

<div>
    <button>Create a new article</button>
</div>
@endcan

@endauth
@endsection