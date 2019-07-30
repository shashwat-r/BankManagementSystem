@extends('layout')

@section('content')

    <form method="POST" action="/branches/search" id="form">
        @csrf
{{--        <label for="name">Entry</label>--}}
        <div>
            <input name="search" placeholder="Enter Text" onchange="this.form.submit();">
        </div>
        <div>
            <button type="submit" name="submit">Search by IFSC or Name</button>
        </div>
    </form>

    @if (isset($_POST['submit']))
        @if ($results->count())
            <table border="0">
                <tr>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>IFSC</th>
                </tr>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->bank->name }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->ifsc }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            No banks matching the keywords found
        @endif
    @endif

@endsection