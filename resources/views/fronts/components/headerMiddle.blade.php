<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{ url('/') }}" class="logo ml-lg-0">
                <img src="{{ asset(setting()->logo ?? 'front/assets/images/logo.png') }}" alt="logo" width="144" height="45" />
            </a>
            {{--                        <div style="position: relative;">--}}
            <form method="get" action="{{url('product-lists')}}"
                  class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category" class="form-control">
                        <option value="" selected disabled>All Categories</option>
                        @foreach($topCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="form-control" name="search_product" id="search-product"
                       placeholder="Search in..." autocomplete="off" />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>

                <!-- Search Results Dropdown -->
                <div class="search-results-dropdown" id="searchResults">
                    <!-- Loading State -->
                    <div class="search-loading" id="searchLoading" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i> Searching...
                    </div>

                    <!-- Results List -->
                    <div id="searchResultsList" style="display: none;">
                        <!-- Results will be populated here -->
                    </div>

                    <!-- No Results State -->
                    <div class="search-no-results" id="noResults" style="display: none;">
                        <i class="w-icon-exclamation-triangle"></i>
                        <p>No products found</p>
                    </div>
                </div>
            </form>
            <div id="search-suggestions-container" class="suggestions-container"></div>
            {{--                        </div>--}}
        </div>
        <div id="searchSuggestions" class="suggestion-box"></div>
        @include('fronts.components.headerCart')
    </div>
</div>
