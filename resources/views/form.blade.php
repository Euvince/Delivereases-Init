<div>
    <form action="{{ route('admin.product.store') }}" method="POST">
        <input type="file" name="image">
        {{-- @error('image')
            $message
        @enderror --}}
        <button>Soumettre</button>
    </form>
</div>
