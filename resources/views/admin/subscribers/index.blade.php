@extends('layouts.dashboard')

@section('title', 'Subscribers')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Subscribers</li>
@endsection

@section('main')

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Email</th>
                <th>Created At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $subscriber)
            <tr>
                <td><input type="checkbox" name="subscriber_id[]" value="{{ $subscriber->id }}"></td>
                <td>{{ $subscriber->email }}<br>{{ $subscriber->name }}</td>
                <td>{{ $subscriber->created_at }}</td>
                <td><a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" class="btn btn-sm btn-outline-success">Edit</a></td>
                <td>
                    <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{ $subscribers->links() }}

@endsection