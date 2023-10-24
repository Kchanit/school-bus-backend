<h1>
    This is the staff index page
    <div>
        {{ $staff->first_name }}
    </div>
    <button>
        <a href="{{ route('drivers.create') }}">Create Driver</a>
    </button>
    <button>
        <a href="{{ route('drivers.index') }}">All Drivers</a>
    </button>
</h1>
