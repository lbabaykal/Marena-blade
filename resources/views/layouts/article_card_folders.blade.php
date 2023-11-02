<div class="article_short">
    <a href="{{ route('article.show', $article->id) }}">
        <div class="article">
            <div class="article_image" style="background-image: url('{{ asset('images_articles/' . $article->image) }}')"></div>
            <div class="article_count_series">
                @isset($article->episodes) EPS: {{ $article->episodes }} @endisset
            </div>
            <div class="article_title">{{ $article->title_rus }}</div>
        </div>
        <div class="article_type">{{ $article->title }}</div>
        <div class="article_rating">☆ {{ $article->rating }}</div>
    </a>
</div>
