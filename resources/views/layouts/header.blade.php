<!-- resources/views/layouts/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('contacts.index') }}">Contacts App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.create') }}">Add Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('xmlcontacts.import') }}">Import Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
