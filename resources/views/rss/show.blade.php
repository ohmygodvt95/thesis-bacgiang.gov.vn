<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title><![CDATA[{{ $category->title }}]]></title>
        <link>{{ url('/categories/'.$category->id) }}</link>
        <description><![CDATA[{{ $category->title }}]]></description>
        @foreach($category->getPosts(20) as $item)
            <item>
                <title><![CDATA[{{ $item->title }}]]></title>
                <link>{{ url('/posts/'.$item->id) }}</link>
                <description><![CDATA[<img src="{{ asset($item->thumb) }}" alt="" height="100"><br>{{ $item->description }}]]></description>
                <pubDate><![CDATA[{{ $item->created_at }}]]></pubDate>
            </item>
        @endforeach
    </channel>
</rss>
