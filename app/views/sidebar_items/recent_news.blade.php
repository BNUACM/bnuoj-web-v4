<h3>
    Latest News <small><a href='news.php'>[more...]</a></small>
</h3>
@foreach (News::orderBy('time_added', 'desc')->take(Config::get('bnuoj.limits.news_on_index'))->get() as $news)

    @if (strlen($news->title) > Config::get('bnuoj.limits.news_on_index_title_len'))
        <h4>{{ mb_strcut($news->title, 0, Config::get('bnuoj.limits.news_on_index_title_len'), 'UTF-8') }}<a name='{{ $news->newsid }}' class='newslink' href='#'>[...]</a></h4>
    @else
        <h4>{{ $news->title }}</h4>
    @endif

    <p>{{ mb_strcut(strip_tags($news->content), 0, Config::get('bnuoj.limits.news_on_index_content_len'), 'UTF-8') }} <a name='{{ $news->newsid }}' class='newslink' href='#'>[...]</a></p>

@endforeach