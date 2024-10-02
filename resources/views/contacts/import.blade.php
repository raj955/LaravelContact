<!-- resources/views/contacts/import.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Import Contacts via XML</h2>

        <!-- Display validation errors, if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('xmlDatacontacts.import') }}" method="POST" enctype="multipart/form-data" class="border p-4 shadow-sm bg-white rounded">
            @csrf
            <div class="form-group mb-3">
                <label for="xml_file" class="form-label">Upload XML File</label>
                <input type="file" name="xml_file" class="form-control" required accept=".xml">
            </div>

            <button type="submit" class="btn btn-primary w-100">Import Contacts</button>
        </form>
    </div>
@endsection
