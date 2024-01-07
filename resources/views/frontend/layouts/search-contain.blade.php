@section('style')
    <style>
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    </style>
@endsection
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <!-- Search -->
        <div class="search-container">
            <div class="search-box">
                <form action="#">
                    <div class="form-group search-info">
                        <input type="text" class="form-control "
                            placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i>
                        <span>Search</span>
                    </button>
                </form>
            </div>
        </div>
        <!-- /Search -->
    </div>
</div>
<!-- /Breadcrumb -->
