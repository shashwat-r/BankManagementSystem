@extends('layout')

@section('content')
    <h1 class="title">Create New Branch</h1>
    <form method="POST" action="/branches">
        @csrf
        <div>
            <label>Bank</label>
            <select name="bank_id">
                @foreach($banks->reverse() as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
{{--            <label for="name">Branch Name</label>--}}
            <input name="name" placeholder="Branch Name">
        </div>
        <div>
{{--            <label for="ifsc">IFSC</label>--}}
            <input name="ifsc" placeholder="IFSC">
        </div>
        <div>
{{--            <label for="address">Address</label>--}}
            <input name="address" placeholder="Address">
        </div>
        <div>
            <button type="submit">Create Branch</button>
        </div>
    </form>
@endsection