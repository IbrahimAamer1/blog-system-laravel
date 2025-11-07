@php
$categories = App\Models\Category::get();
@endphp
@extends('theme.master')
@section('title', 'Register')
@section('content')
@include('theme.partials.hero', ['title' => 'add new blog'])


  <!-- ================ contact section start ================= -->
  
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
            @if(session('blog_created'))
            <div class="alert alert-success">
              {{ session('blog_created') }}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          <form action="{{ route('blog.store') }}" class="form-contact contact_form" method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" type="text" placeholder="Enter your blog title" value="{{ old('name') }}">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>  
                <div class="form-group">
                  <label for="category_id">Category</label>
                  <select name="category_id" class="form-control">
                  @if($categories->count() > 0)
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @endif
                  </select>
                  <x-input-error :messages="$errors->get('category_id')" class="mt-2" />  
                </div>
                <div class="form-group">
                  <textarea class="form-control border" name="description" type="text" placeholder="Enter your description" value="{{ old('description') }}"></textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="form-group">
                    
                  <input class="form-control border" name="image" type="file" placeholder="Enter your image" value="{{ old('image') }}">
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
              </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection
