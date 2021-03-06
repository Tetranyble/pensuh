

@extends('layouts.app')
@section('title', 'Events')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/button.min.css') }}">--}}
    @parent
@endsection
@section('content')
    <div class="wrapper">
        @include('frontend.partials.header')

        <section class="pager-section blog-version" style="background-image: url('{{ asset($home->blog_banner) }}')">
            <div class="container">
                <div class="pager-content text-center">
                    <ul>
                        <li><a href="{{ route('home') }}" title="Home">Home</a></li>
                        <li><a href="{{ route('news.index') }}" title="News">News</a></li>
                        <li><span>{{ $blog->name }}</span></li>
                    </ul>
                    <h2>{{ $blog->name }}</h2>
                    <span class="categry">
                         @foreach($blog->categories as $category)
                            <a href="{{ route('news.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        @endforeach
                    </span>
                    <ul class="meta">
                        <li><a href="#" title="{{ $blog->created_at }}">{{ $blog->created_at }}</a></li>
                        <li><a href="#" title="{{ $blog->user->fullname }}">{{ $blog->user->fullname }}</a></li>
                        <li><img src="{{ asset('assets/img/icon13.png') }}" alt="">
                            @foreach($blog->tags as $tag)
                                <a href="{{ route('news.index',['tag' => $tag->slug]) }}" title="{{ $tag->name }}">{{ $tag->name }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <!--pager-content end-->
            </div>
        </section>
        <!--pager-section end-->
        <section class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-post single">
                            {!! $blog->body !!}
                        </div>
                        <!--blog-post single end-->
{{--                        <div class="mdp-post-comments">--}}
{{--                            <h3 class="mdp-sub-title">Comments</h3>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <div class="mdp-comment d-flex flex-wrap">--}}
{{--                                        <div class="mdp-img"><img src="assets/img/comm1.png" alt=""></div>--}}
{{--                                        <div class="mdp-com">--}}
{{--                                            <h3>Polina Podolski</h3><span>25/09/2020</span>--}}
{{--                                            <p>Nullam iaculis elit tempor tellus eleifend, lobortis porta velit hendrerit. Curabitur eu felis--}}
{{--                                                maximus, tempus enim a, venenatis tortor. Phasellus elementum massa vel diam rhoncus vulputate.--}}
{{--                                            </p><a href="#" title="" class="reply-btn"><i class="fa fa-reply"></i>Reply</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--mdp-comment end-->--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!--post-comments end-->--}}
{{--                        <div class="mdp-contact">--}}
{{--                            <div class="comment-area">--}}
{{--                                <h3 class="mdp-sub-title">Add Comment</h3>--}}
{{--                                <form>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <div class="form-group"><input type="text" name="name" placeholder="Name"></div>--}}
{{--                                            <!--form-group end-->--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <div class="form-group"><input type="email" name="email" placeholder="Email"></div>--}}
{{--                                            <!--form-group end-->--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <div class="form-group"><input type="text" name="website" placeholder="Website"></div>--}}
{{--                                            <!--form-group end-->--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="form-group"><textarea name="message" placeholder="Message"></textarea></div>--}}
{{--                                            <!--form-group end-->--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="form-submit"><a href="#" title="" class="btn-default">Send Now <i--}}
{{--                                                        class="fa fa-long-arrow-alt-right"></i></a></div>--}}
{{--                                            <!--form-submit end-->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!--comment-area end-->--}}
{{--                        </div>--}}
                        <!--mdp-contact end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget-search">
                                <form method="GET" action="{{ route('news.index') }}">
                                    <input type="text" name="search" placeholder="Search"> <button type="submit"><img
                                            src="{{ asset('assets/img/icon4.png') }}" alt=""></button>
                                </form>
                            </div>
                            <!--widget-search end-->
                            <div class="widget widget-categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    @forelse($categories as $category)
                                        <li><a href="{{ route('news.index', ['category' => $category->slug]) }}" title="{{ $category->name }}">{{ $category->name }}</a> <span>{{ $category->blogs_count }}</span></li>
                                    @empty
                                        <p>No category</p>
                                    @endforelse

                                </ul>
                            </div>
                            <!--widget-categories end-->
                            <div class="widget widget-posts">
                                <h3 class="widget-title">Latest Posts</h3>
                                <div class="wd-posts">
                                    @forelse($latestBlogs as $blog)
                                        <div class="wd-post d-flex flex-wrap">
                                            <div class="wd-thumb"><img style="max-width: 3.25rem" src="{{ asset('storage/'.$blog->photo) }}" alt="{{ $blog->name }}"></div>
                                            <div class="wd-info">
                                                <h3><a href="{{ route('news.show', $blog->slug) }}" title="{{ $blog->name }}">{{ $blog->name }}</a></h3><span>{{ $blog->created_at }}</span>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No latest Blogs</p>
                                @endforelse
                                <!--wd-post end-->
                                </div>
                                <!--wd-posts end-->
                            </div>
                            <!--widget-posts end-->
                        {{--                            <div class="widget widget-comments">--}}
                        {{--                                <h3 class="widget-title">Recent Comments</h3>--}}
                        {{--                                <ul>--}}
                        {{--                                    <li><a href="#" title="">Admin</a> in tempor eros tortor, a ornare</li>--}}
                        {{--                                    <li><a href="#" title="">Admin</a> in tempor eros tortor, a ornare</li>--}}
                        {{--                                    <li><a href="#" title="">Admin</a> in tempor eros tortor, a ornare</li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        <!--widget-comments end-->
                        {{--                            <div class="widget widget-archives">--}}
                        {{--                                <h3 class="widget-title">Archives</h3>--}}
                        {{--                                <ul>--}}
                        {{--                                    <li><a href="#" title="">December</a></li>--}}
                        {{--                                    <li><a href="#" title="">January</a></li>--}}
                        {{--                                    <li><a href="#" title="">February</a></li>--}}
                        {{--                                    <li><a href="#" title="">March</a></li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        <!--widget-archives end-->
                            <div class="widget widget-tags">
                                <h3 class="widget-title">Tags</h3>
                                <ul>
                                    @forelse($tags as $tag)
                                        <li><a href="{{ route('news.index', ['tag' => $tag->slug]) }}" title="{{ $tag->name }}">{{ $tag->name }}</a></li>
                                    @empty
                                        <p>No data</p>
                                    @endforelse

                                </ul>
                            </div>
                            <!--widget-tags end-->
                        {{--                            <div class="widget widget-calendar">--}}
                        {{--                                <h3 class="widget-title">Calendar</h3>--}}
                        {{--                                <div class="mdp-calendar">--}}
                        {{--                                    <h3 class="month">July 2020</h3>--}}
                        {{--                                    <table>--}}
                        {{--                                        <thead>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <th>S</th>--}}
                        {{--                                            <th>M</th>--}}
                        {{--                                            <th>T</th>--}}
                        {{--                                            <th>W</th>--}}
                        {{--                                            <th>T</th>--}}
                        {{--                                            <th>F</th>--}}
                        {{--                                            <th>S</th>--}}
                        {{--                                        </tr>--}}
                        {{--                                        </thead>--}}
                        {{--                                        <tbody>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td></td>--}}
                        {{--                                            <td></td>--}}
                        {{--                                            <td></td>--}}
                        {{--                                            <td>1</td>--}}
                        {{--                                            <td>2</td>--}}
                        {{--                                            <td>3</td>--}}
                        {{--                                            <td>4</td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td>5</td>--}}
                        {{--                                            <td class="active">6</td>--}}
                        {{--                                            <td>7</td>--}}
                        {{--                                            <td>8</td>--}}
                        {{--                                            <td>9</td>--}}
                        {{--                                            <td>10</td>--}}
                        {{--                                            <td>11</td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td>12</td>--}}
                        {{--                                            <td>13</td>--}}
                        {{--                                            <td>14</td>--}}
                        {{--                                            <td>15</td>--}}
                        {{--                                            <td>16</td>--}}
                        {{--                                            <td>17</td>--}}
                        {{--                                            <td>18</td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td>19</td>--}}
                        {{--                                            <td>20</td>--}}
                        {{--                                            <td>21</td>--}}
                        {{--                                            <td>22</td>--}}
                        {{--                                            <td>23</td>--}}
                        {{--                                            <td>24</td>--}}
                        {{--                                            <td>25</td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <td>26</td>--}}
                        {{--                                            <td>27</td>--}}
                        {{--                                            <td>28</td>--}}
                        {{--                                            <td>29</td>--}}
                        {{--                                            <td>30</td>--}}
                        {{--                                            <td>31</td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        </tbody>--}}
                        {{--                                    </table>--}}
                        {{--                                    <ul class="controls">--}}
                        {{--                                        <li><a href="#" title=""><i class="fa fa-angle-left"></i> Prev</a></li>--}}
                        {{--                                        <li><a href="#" title="">Next <i class="fa fa-angle-right"></i></a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </div>--}}
                        {{--                                <!--mdp-calendar end-->--}}
                        {{--                            </div>--}}
                        <!--widget-calendar end-->
                        </div>
                        <!--sidebar end-->
                    </div>
                </div>
            </div>
        </section>
        <!--page-content end-->
    @include('components.contactform')
    @include('frontend.partials.footer')
    <!--footer end-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/bundle.min.js') }}"></script>
{{--    <script src="{{ asset('assets/js/button.min.js') }}"></script>--}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--    <script async src="http://www.googletagmanager.com/gtag/js2c98?id=UA-180910402-1"></script>--}}
    {{--    <script>window.dataLayer = window.dataLayer || [];--}}
    {{--        function gtag() { dataLayer.push(arguments); }--}}
    {{--        gtag('js', new Date());--}}
    {{--        gtag('config', 'UA-180910402-1');</script>--}}
    @parent
@endsection

