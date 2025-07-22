@if(Auth::check())
<form action="{{ route('resep.rate', $resep->id) }}" method="POST">
    @csrf
    <label for="rating">Beri Rating:</label>
    <select name="rating" id="rating" required>
        @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ optional($resep->ratings->where('user_id', Auth::id())->first())->rating == $i ? 'selected' : '' }}>
                {{ $i }} ⭐
            </option>
        @endfor
    </select>
    <button type="submit">Kirim</button>
</form>
@endif
