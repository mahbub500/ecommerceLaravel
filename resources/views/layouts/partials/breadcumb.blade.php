<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-9">
                <h4 class="page-title">Dashboard</h4>   
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="widgetbar">
                    <div class="breadcrumb-list">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            {{ $slot }}
                        </ol>
                    </div>
                </div>                        
            </div>
        </div>          
    </div>