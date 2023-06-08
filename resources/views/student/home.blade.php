@extends('student.layout.app')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">


            @include('student.layout.search_menu')
            <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front_end/img/pexels-mark-cruzat-3494806.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb__text">
                                <h2>My Library</h2>
                                <div class="breadcrumb__option">
                                    <a href="{{ url('student/home') }}">Home</a>
                                    <span>Shop</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                        @php
                            $allCatgories = Student::allCategory();
                        @endphp


                         @foreach ($allCatgories as $category)

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('/uploads/category/'.$category->image) }}" id="cat">

                            <h5><a href="{{ route('student.category.show', $category->id) }}">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Books</h2>

                    </div>

                </div>
            </div>
            <div class="row featured__filter" id="book">

                @if(count($books) > 0)
                @foreach ($books as $book )
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat"  >
                    <div class="featured__item" >
                        <a href="{{ route('student.book_detail', $book->id) }}" id="book">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset('/uploads/books/'.$book->image ) }}" >


                            </div>
                       </a>
                        <div class="featured__item__text">
                            <h6><a href="">{{ $book->name }}</a></h6>
                            <h5>Rs. {{ $book->price }}</h5>
                        </div>

                    </div>
                </div>
                @endforeach

                @else
                  <p style="text-align:center">Not Found!</p>
            @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>

/*============Start----Cookies============*/
function createCookie(name,value,minutes) {
    if (minutes) {
        var date = new Date();
        date.setTime(date.getTime()+(minutes*60*1000));
        var expires = "; expires="+date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}
createCookie("name", "afzal", 1)
/*=============End----Cookies============*/


</script>
@endsection

