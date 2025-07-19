<form action="{{ route('rating.store', $resep->id) }}" method="POST">
    @csrf
    <label for="nilai_rating">Rating:</label>
    <select name="nilai_rating" id="nilai_rating">
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}"
                {{ optional($resep->ratings->where('user_id', auth()->id())->first())->nilai_rating == $i ? 'selected' : '' }}>
                {{ $i }} Bintang
            </option>
        @endfor
    </select>
    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
</form>

<p>
    Rating:
    @for ($i = 1; $i <= 5; $i++)
        @if($i <= round($resep->averageRating()))
            ⭐
        @else
            ☆
        @endif
    @endfor
    ({{ number_format($resep->averageRating(), 1) }}/5)
</p>

