<h3>
    Latest News <small><a href='news.php'>[more...]</a></small>
</h3>
@foreach (News::orderBy('time_added', 'desc')->take(Config::get('bnuoj.limits.news_on_index'))->get() as $news)

    @if (strlen($news->title) > Config::get('bnuoj.limits.news_on_index_title_len'))
        <h4>{{ str_limit($news->title, Config::get('bnuoj.limits.news_on_index_title_len'), '') }}<a name='{{ $news->newsid }}' class='newslink' href='#'>[...]</a></h4>
    @else
        <h4>{{ $news->title }}</h4>
    @endif

    <p>{{ str_limit(strip_tags($news->content), Config::get('bnuoj.limits.news_on_index_content_len'), '') }} <a name='{{ $news->newsid }}' class='newslink' href='#'>[...]</a></p>

@endforeach