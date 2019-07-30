@extends('layout')

@section('content')
    <h1 class="title">Create New Bank</h1>
    <div>
        <label>Existing Banks</label>
        <select>
            @foreach($banks->reverse() as $bank)
                <option value="{{ $bank->name }}">{{ $bank->name }}</option>
            @endforeach
        </select>
    </div>
    <form method="POST" action="/banks">
        @csrf
{{--        <label for="name">Bank Name</label>--}}
        <input name="name" placeholder="Bank Name">
        <div>
            <button type="submit">Create Bank</button>
        </div>
    </form>
@endsection