<!-- resources/views/contacts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2 class="my-4">Edit Contact</h2>

     <!-- Display validation errors -->
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" class="form-control" value="{{ $contact->lastName }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
@endsection
