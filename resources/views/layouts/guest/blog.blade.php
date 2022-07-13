<div class="my-4">
    <h1>Blog</h1>
</div>

<div class="row">
    @foreach ($blogs as $blog)
        <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit($blog->description, 75) }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="my-4">
    {{ $blogs->links() }}
</div>
