<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Filter Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .filter-section {
            width: 250px;
            border-right: 1px solid #ccc;
            padding: 15px;
        }

        .filter-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .filter-category {
            margin-bottom: 10px;
        }

        .filter-heading {
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .filter-list {
            display: none;
            list-style-type: none;
            padding-left: 10px;
            margin-top: 5px;
        }

        .filter-list li {
            margin: 5px 0;
        }

        .toggle-icon {
            font-size: 18px;
            margin-right: 10px;
        }

    </style>
</head>
<body>

<div class="filter-section">
    <div class="filter-title">Filter</div>

    <div class="filter-category">
        <div class="filter-heading" onclick="toggleFilter('men')">
            Men
            <span id="men-toggle-icon" class="toggle-icon">+</span>
        </div>
        <ul id="men" class="filter-list filter-categories">
            @foreach($menproductcategories as $mencat)
            <li data-name="{{ $mencat->name  }}" data-id="{{ $mencat->id }}" ><input  data-name="{{ $mencat->name  }}" data-id="{{ $mencat->id }}" type="checkbox"> {{ $mencat->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="filter-category">
        <div class="filter-heading" onclick="toggleFilter('women')">
            Women
            <span id="women-toggle-icon" class="toggle-icon">+</span>
        </div>
        <ul id="women" class="filter-list filter-categories">
            @foreach($womenproductcategories as $womencat)
            <li data-name="{{ $womencat->name  }}" data-id="{{ $womencat->id }}"><input  data-name="{{ $womencat->name  }}" data-id="{{ $womencat->id }}" type="checkbox"> {{ $womencat->name }}</li>
            @endforeach
          
        </ul>
    </div>

    <div class="filter-category">
        <div class="filter-heading" onclick="toggleFilter('kids')">
            Kids
            <span id="kids-toggle-icon" class="toggle-icon">+</span>
        </div>
        <ul id="kids" class="filter-list filter-categories">
            <li><input type="checkbox"> T-Shirts</li>
            <li><input type="checkbox"> Jeans</li>
            <li><input type="checkbox"> Jackets</li>
        </ul>
    </div>

    <div class="filter-category">
        <div class="filter-heading" onclick="toggleFilter('price')">
            Price
            <span id="price-toggle-icon" class="toggle-icon">+</span>
        </div>
        <ul id="price" class="filter-list filter-sort">
            <li ><input type="checkbox" name="price-sort" value="low"> low to high</li>
            <li ><input type="checkbox" name="price-sort" value="high"> high to low</li>
           
        </ul>
    </div>

    <div class="filter-category">
        <div class="filter-heading" onclick="toggleFilter('brands')">
            Brands
            <span id="brands-toggle-icon" class="toggle-icon">+</span>
        </div>
        <ul id="brands" class="filter-list">
            <li><input type="checkbox"> Nike</li>
            <li><input type="checkbox"> Adidas</li>
            <li><input type="checkbox"> Puma</li>
        </ul>
    </div>
</div>

<script src="{{ asset('js/newfilter.js') }}"></script>
<script>
    //  var productFilterUrl = '{{ route("front.productfilter") }}';
     var newajaxfilter_url='{{ route("front.newajaxfilter") }}';
     var newajaxsort_url='{{ route("front.newajaxsort") }}';
</script>
<script>
    function toggleFilter(filterId) {
        const filterList = document.getElementById(filterId);
        const toggleIcon = document.getElementById(`${filterId}-toggle-icon`);
        
        if (filterList.style.display === "block") {
            filterList.style.display = "none";
            toggleIcon.textContent = "+";
        } else {
            filterList.style.display = "block";
            toggleIcon.textContent = "-";
        }
    }
</script>
</body>
</html>
