@extends('layouts.admin')

@section('title', 'Create Product')

@push('css')


    <link href="{{ asset('contents/admin') }}/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!-- Summernote css -->
    <link href="{{ asset('contents/admin') }}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="{{ asset('contents/admin') }}/plugins/select2/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('contents/admin') }}/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css">

@endpush

@section('content')

<!-- Start Breadcrumbbar -->                    
@component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ url('prodcuts') }}">Prodcuts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endcomponent
<!-- End Breadcrumbbar -->

<div class="contentbar">
    <!-- Start row -->
    <form action="{{ url('admin/products/'.$product->slug) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="row">
            <!-- Start col -->
            <div class="col-lg-8 col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Product Create</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="productTitle" class="col-sm-12 col-form-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control font-20" placeholder="Product Name" value="{{ $product->name }}">
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                                     
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Features</label>
                            <div class="col-sm-12">
                               <textarea name="feature" class="summernote">{{ $product->feature }}</textarea>
                                @error('features')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-product-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                        <div class="form-group row">
                                            <label for="regularPrice" class="col-sm-4 col-form-label">Price(Tk)</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="price" class="form-control" placeholder="Product Price" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="salePrice" class="col-sm-4 col-form-label">Discount(Tk)</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="discount" class="form-control" placeholder="Product Discount" value="{{ $product->discount }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 mt-2">
                                            <label for="stockQuantity" class="col-sm-4 col-form-label">Stock</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="stock" class="form-control" placeholder="Product Stock" value="{{ $product->stock }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="shippingClass" class="col-sm-12 col-form-label">Product Description</label>
                                            <div class="col-sm-12">
                                                <textarea name="description" class="form-control" id="" cols="30" rows="6"> {{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-info btn-block">Update Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Categories</h5>
                    </div>
                    <div class="card-body">
                        <select class="select2-single form-control" name="category" id="category">
                            <option>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"

                                    @foreach ($product->subcategories as $subcategory)
                                        {{ $subcategory->category->id ==  $category->id ? 'selected' : ''}}
                                    @endforeach

                                >{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <hr>

                        <select class="select2-multi-select form-control" name="subcategories[]" multiple="multiple" id="subcategories">
                            <option>Select Subcategory</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"

                                    @foreach ($product->subcategories as $productSubcategory)
                                        {{ $productSubcategory->id ==  $subcategory->id ? 'selected' : ''}}
                                    @endforeach

                                >{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Color</h5>
                    </div>
                    <div class="card-body pt-3">
                        <div class="custom-checkbox-button">
                            <select class="select2-multi-select form-control" name="colors[]" multiple="multiple">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}"

                                    @foreach ($product->colors as $productColor)
                                        {{ $productColor->id ==  $color->id ? 'selected' : ''}}
                                    @endforeach

                                    >{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Brand</h5>
                    </div>
                    <div class="card-body">
                        <div class="product-tags">
                            <select class="select2-single form-control" name="brand_id">
                            <option>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id ==  $brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                            @endforeach
                            </select>
                        </div>                                
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Product Images</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="form-control" multiple name="images[]">
                        </div>     
                        <div class="form-group">
                            <label for="">New From</label>
                            <input type="text" id="default-date" name="new_from" class="datepicker-here form-control" value="{{ $product->new_from }}"/>
                        </div>             
                        <div class="form-group">
                            <label for="">New To</label>
                            <input type="text" id="default-date-to" name="new_to" class="datepicker-here form-control" value="{{ $product->new_to }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
    </form>
    <!-- End row -->
</div>


@endsection

@push('js')
    <script src="{{ asset('contents/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('contents/admin') }}/plugins/dropzone/dist/dropzone.js"></script>
    <!-- eCommerce Page js -->
    <script src="{{ asset('contents/admin') }}/js/custom/custom-ecommerce-product-detail-page.js"></script>
    <script src="{{ asset('contents/admin') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom/custom-form-select.js"></script>
    <script src="{{ asset('contents/admin') }}/plugins/datepicker/datepicker.min.js"></script>
    <script src="{{ asset('contents/admin') }}/plugins/datepicker/i18n/datepicker.en.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom/custom-form-datepicker.js"></script>
@endpush