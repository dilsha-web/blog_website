<section class="section-2">
    <h1 class="section-2-heading">Collection</h1>
    <div class="section-2-container">
        @foreach ($post as $post)
            <div class="section-2-card">
                <img src="/postImages/{{ $post->image }}" class="card-img" />
                <p class="card-name">{{ $post->title }}</p>
                <button class="card-btn"><a href="{{ url('post_details', $post->id) }}">Explore more</a></button>
            </div>
        @endforeach


    </div>
</section>
