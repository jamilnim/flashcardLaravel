@extends('layouts.name-layout')

@section('title', 'Name Manager')

@section('content')
<div class="container">
  <h2>Enter Name and Color</h2>

  @if (session('success'))
    <div class="message success">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="message error">{{ session('error') }}</div>
  @endif

  <form action="{{ isset($edit_id) ? route('name.update', $edit_id) : route('name.store') }}" method="POST">
    @csrf
    @if (isset($edit_id)) @method('PUT') @endif

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $edit_name ?? '') }}">
    @error('name') <p class="error-text">{{ $message }}</p> @enderror

    <label for="color">Color</label>
    <input type="text" name="color" id="color" value="{{ old('color', $edit_color ?? '') }}">
    @error('color') <p class="error-text">{{ $message }}</p> @enderror

    <label for="category">Category</label>
    <select name="category" id="category">
      <option value="personal">Personal</option>
      <option value="work">Work</option>
      <option value="hobby">Hobby</option>
    </select>

    <button type="submit">{{ isset($edit_id) ? 'Update' : 'Submit' }}</button>
  </form>

  @if (!empty($names))
  <h3>Stored Names</h3>
  <ul>
    @foreach ($names as $index => $entry)
    <li>
      <span style="color: {{ $entry['color'] }}">{{ $entry['name'] }}</span>
      <span style="color: {{ $entry['color'] }}">{{ $entry['category'] }}</span>
      <div>
        <a href="{{ route('name.edit', $index) }}">Edit</a>
        <form action="{{ route('name.destroy', $index) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" class="delete-btn">Delete</button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
  @endif
</div>
@endsection
