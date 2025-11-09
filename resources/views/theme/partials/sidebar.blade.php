@php
$categories = App\Models\Category::get();
$blogs = App\Models\Blog::orderBy('created_at', 'desc')->take(3)->get();
@endphp
<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Newsletter</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      @if(session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div>
                      @endif
                      <form action="{{route('subscribe.store')}}" method="POST">
                        @csrf
                        <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter email'">
                        <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </form>
                    </div>
                  </div>
                </div>

                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Category</h4>
                  <ul class="cat-list mt-20">
                    @foreach ($categories as $category)
                    <li>  
                      <a href="{{ route('theme.category', $category->id) }}" class="d-flex justify-content-between">
                        <p>{{$category->name}}</p>
                        <p>{{$category->blogs->count()}}</p>
                        
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Recent Post</h4>
                  <div class="popular-post-list">
                    @foreach($blogs as $blog)
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="{{asset('storage/blogs/'.$blog->image)}}" alt="">
                        <ul class="thumb-info">
                          <li><a href="{{route('theme.singleblog', $blog->id)}}">{{$blog->user->name}}</a></li>
                          <li><a href="{{route('theme.singleblog', $blog->id)}}">{{$blog->created_at->format('d M Y')}}</a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="{{route('theme.singleblog', $blog->id)}}">
                          <h6>{{$blog->name}}</h6>
                        </a>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
              </div>
          </div>
          <!-- End Blog Post Siddebar -->