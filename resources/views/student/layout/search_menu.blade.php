<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" id="categories">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    {{-- {{  $keyword }} --}}
                    <ul>
                        @php
                            $allCatgories = Student::allCategory();
                        @endphp
                        @if (count($allCatgories) > 0)

                            @foreach ($allCatgories as $category)
                                 <li><a href="{{ route('student.category.show', $category->id) }}">{{ $category->name }}</a></li>

                            @endforeach

                        @endif

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search" >
                    <div class="hero__search__form">
                        <form action="{{ url('student/home?keyword') }}" method="GET">

                            <div class="hero__search__categories" >
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="search" placeholder="What do you need?" id="in">
                            <button type="submit" class="site-btn" id="site-btn">Search</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>042-1234567</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- @section('script')
<script>

$(document).ready(function(){

    $('#site-btn').mouseenter(function(){
        $('#site-btn' ).css('background-color', 'green');
    });
    $('#site-btn').mouseleave(function(){
        $('#site-btn').css('background-color', '');
    });

    $('#categories').mouseenter(function(){
        $('#categories').css('background-color', 'green');
    });
    $('#categories').mouseleave(function(){
        $('#categories').css('background-color', '');
    });

    $('#in').mouseenter(function(){
        $('#in').css('border', '1px solid green');
    });
    $('#in').mouseleave(function(){
        $('#in').css('border', '');
    });

});


</script>
@endsection
 --}}
