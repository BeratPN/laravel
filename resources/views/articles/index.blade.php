@extends('layouts.app')

@section('content')
@auth
<div>
    <h1>Articles</h1>
</div>

@can('list-articles')
<div>
    Article List
</div>
@endcan

@can('create-articles')

<div>
    <button style="margin:1rem 0rem;">Create a new article</button>

    <p>Dont wanna be a writer anymore ?</p>
    <form method="POST" action="{{ route('user.requestUserRole') }}">
        @csrf
        <button type="submit">become a user</button>
    </form>
</div>

@else
<div style="margin-top: 4rem;">
    <p>Do u wanna be a writer?</p>
    <form method="POST" action="{{ route('user.requestWriterRole') }}">
        @csrf
        <button type="submit">become a writer</button>
    </form>
</div>
<div>
</div>
@endcan

@endauth
@endsection