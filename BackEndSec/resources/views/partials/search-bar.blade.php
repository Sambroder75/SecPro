<form action="{{ route('recipes.index') }}" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Cari Resep..." value="{{ request('search') }}">
    <button type="submit">
        <img src="{{ asset('foto/search.png') }}" alt="Search Icon">
    </button>
</form>