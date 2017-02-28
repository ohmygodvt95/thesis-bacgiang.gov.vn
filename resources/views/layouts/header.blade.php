<header>
    <ul class="top-menu">
        <li class="pull-right"><a href="#">English</a></li>
        <li class="pull-right"><a href="#">Tiếng Việt</a></li>
        <li class="pull-right"><a href="/sitemap">Sơ đồ web</a></li>
        <li class="pull-right"><a href="/contact">Liên hệ</a></li>
        <li class="pull-right"><a href="#">Bookmark this site</a></li>
    </ul>
    <a href="/" class="logo">
        <img src="{{ asset('images/header.jpg') }}"
            alt="Logo"
            class="img-responsive">
    </a>
    <ul class="navigation">
        <li class="pull-left"><a href="{{ url('/') }}"><i class="fa fa-home fa-2x"></i></a></li>
        @foreach($menu as $item)
            <li class="pull-left nav-item">
                <a href="{{ $item->type == 'link' ? $item->link : url('/categories/'.$item->id) }}">
                    {{ $item->title }}
                </a>
                <div class="hidden">
                    <ul>
                        @if($item->type == 'null')
                            @foreach($item->getSubCategories() as $element)
                                <li>
                                    @if($element->type == 'text')
                                        <a href="{{ url('/categories/'.$element->id) }}">
                                            {{ $element->title }}
                                        </a>
                                    @elseif($element->type == 'link')
                                        <a href="{{ $element->link }}">
                                            {{ $element->title }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        @elseif($item->type == 'text')
                            @foreach($item->getPosts(4) as $element)
                                <li><a href="{{ url('/posts/'.$element->id) }}">{{ $element->title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </li>
        @endforeach
        <li class="pull-right">
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="text" title="search" placeholder="Type something..">
                    <span class="input-group-btn">
                    <button class="" type="submit"></button>
                </span>
                </div>
            </form>
        </li>
    </ul>
    <div class="sub-navigation">
    </div>
</header>
