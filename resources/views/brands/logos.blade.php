<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Listing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .brand-logo {
            max-width: 100px;
            height: auto;
        }
        .alphabetical-index a {
            margin: 0 5px;
            text-decoration: none;
        }
        .brand-listing {
            margin-top: 20px;
        }
        .brand-item {
            margin-bottom: 20px;
        }
        .form-search {
            border: 1px solid #ddd;
            padding: 5px 10px;
            flex-wrap: nowrap;
        }
        .form-search input {
            border: none;
        }
        input:focus {
            outline: none !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex align-items-sm-center justify-content-between flex-sm-row flex-column my-2">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <a href="{{ route('brands.index') }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div>
                    <h4>Brands</h4>
                    <p class="mb-0 small">showing result</p>
                </div>
            </div>
            <div class="mt-sm-0 mt-3">
               <form action="{{ route('brands.search') }}" method="GET">
                    
                    <div class="input-group form-search pr-0">
                        <input type="search" name="search" placeholder="Search brands..." value="{{ request()->input('search') }}" class="w-100">                
                        <div class="input-group-append">
                            <button type="submit" class="btn border-left">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div clas="text-center">
            <div class="alphabetical-index text-center mt-5">
                <a href="{{ route('brands.search') }}" style="color:black !important;">All Brands</a>
                @foreach(range('A', 'Z') as $char)
                <a href="{{ route('brands.searchByAlphabetic', ['char' => $char]) }}" style="color:black !important;">{{ $char }}</a>
                @endforeach
            </div>
        </div>
        <div class="brand-listing row">    
            @foreach($brands as $brand)
                <div class="col-6 col-md-3 col-lg-2 brand-item text-center">
                    <div class="align-items-center d-flex h-100 justify-content-center">
                        @if($brand->logo)
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="brand-logo img-fluid">
                        @else
                            <p>No Image</p>
                        @endif
                        </div>
                </div>
            @endforeach
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
