<div class="mb-3">
    <label for="title" class="form-label">Nom equip</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $team->title ?? '') }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descripció</label>
    <input type="text" name="description" class="form-control" value="{{ old('description', $team->description ?? '') }}">
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="logo" class="form-label">Logo (url)</label>
    <input type="text" name="logo" class="form-control" value="{{ old('logo', $team->logo ?? '') }}">
    @error('logo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
