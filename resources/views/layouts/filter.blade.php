<div class="filters-section">
    <h5>Filter by</h5>
    <form>
        <!-- Categories -->
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="gender">
                <option>select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rating">choose type</label>
            <select class="form-control" id="categorytype">
                <option>types</option>
                <option value=""></option>
            </select>
        </div>
        <!-- Price Range -->
        <div class="form-group">
            <label for="priceRangeDropdown">Price Range</label>
            <select class="form-control" id="pricerange">
                <option value="+">low to high</option>
                <option value="-">high to low</option>
            </select>
        </div>
        <!-- Rating -->
        <button id="filter" type="submit" class="btn btn-primary mt-3">Apply Filters</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#gender').change(function() {
            var catname = $(this).val();
            $.ajax({
                url: '{{ route('front.filter') }}',
                method: 'GET',
                data: { value: catname },
                dataType: 'json',
                success: function(response) {
                    var options = '<option>Choose Type</option>';
                    $.each(response.data, function(index, item) {
                        options += '<option value="' + item.product_pname + '">' + item.product_pname + '</option>';
                    });
                    $('#categorytype').html(options);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('#filter').on('click', function(e) {
            e.preventDefault();
            var catid = $('#gender').val();
            var typename = $('#categorytype').val();
            var priceRange = $('#pricerange').val();

            $.ajax({
                url: '{{ route('front.filterdata') }}',
                method: 'GET',
                data: { catid: catid, typename: typename, priceRange: priceRange },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#product-list').html(response.result);
                    } else {
                        console.error('Failed to load data');
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>