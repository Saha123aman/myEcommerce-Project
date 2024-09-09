
<div class="container">
    <div class="categories">
        <div class="category">
          <a href="{{ route('front.men.getcategory', ['id' => $tshirtcategory->id]) }}"> <img src="{{ asset('images/tshirt3.jpg') }}" alt="T-Shirts"></a>
            <div class="title">T-Shirts</div>
            <div class="offer">MIN. 50% OFF</div>
        </div>
        <div class="category">
          <a href="{{ route('front.men.getcategory', ['id' => $shirtcategory->id]) }}"><img src="{{ asset('images/shirtcat1.jpg') }}" alt="Shirts"></a>
            <div class="title">Shirts</div>
            <div class="offer">FLAT 50% OFF</div>
        </div>
        <div class="category">
          <a href="{{ route('front.men.getcategory', ['id' => $trousercategory->id]) }}"> <img src="{{ asset('images/mentrackpantscat1.jpg') }}" alt="Trousers & Pants"></a>
            <div class="title">Trousers & Pants</div>
            <div class="offer">40-70% OFF</div>
        </div>
        <div class="category">
          <a href="{{ route('front.men.getcategory', ['id' => $jeanscategory->id]) }}"> <img src="{{ asset('images/jeanscat3.jpg') }}" alt="Jeans"></a>
            <div class="title">Jeans</div>
            <div class="offer">MIN. 40% OFF</div>
        </div>
    </div>
  </div>