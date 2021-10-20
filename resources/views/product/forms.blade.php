@extends('layouts.master')

@section('title')
    Products
@endsection

@section('headername')
   Form Products

@endsection

@section('content')
   
<div class="card">
    <div class="card-header">
      <h5 class="title">Insurance</h5>
      <a href="/products" style="float:right" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body">
     @if (request()->id == 0)
      <form method="POST" action="{{ url('product_store')}}">
      @csrf
    @else
    <form method="POST" action="{{ url('product_update',['id'=>request()->id])}}">
      @csrf
      @method('PUT')
    @endif
      <div class="container" style="margin-left: 10%">
        <div class="row">
          <div class="col-md-3 p1-5">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{ (is_null($data->name)) ? '' : $data->name}}" required>
            </div>
          </div>
          <div class="col-md-3 p1-5">
            <div class="form-group">
              <label>Brand Name</label>
              <select name="brand_id" id="" class="form-control" required>
                <option value="">Select</option>
                @foreach ($brand_array as $array)
                    @if ($data->brand_id == $array->id)
                        <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                    @else
                        <option value="{{ $array->id }}">{{ $array->name }}</option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3 p1-5">
            <div class="form-group">
              <label>Sub Category Name</label>
              <select name="sub_category_id" id="" class="form-control" required>
                <option value="">Select</option>
                @foreach ($sub_cat_array as $array)
                    @if ($data->sub_category_id == $array->id)
                        <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                    @else
                        <option value="{{ $array->id }}">{{ $array->name }}</option>
                    @endif
                @endforeach
              </select>            
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Hashtags</label>
                  <input type="text" name="hashtags" id="" class="form-control" placeholder="Enter hashtag" required value="{{ (is_null($data->hashtags)) ? '' : $data->hashtags}}">     
              </div>
            </div>
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Web Image</label>
                  <input type="file" name="web_image" id="" required>     
              </div>
            </div>
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Mobile Image</label>
                  <input type="file" name="mobile_image" id="" required >    
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Sale Price</label>
                  <input type="text" name="sale_price" id="" required placeholder="Enter sale price" class="form-control" value="{{ (is_null($data->sale_price)) ? '' : $data->sale_price}}">     
              </div>
            </div>
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Purchase Price</label>
                  <input type="text" name="purchase_price" id="" required placeholder="Enter purchase price" class="form-control" value="{{ (is_null($data->purchase_price)) ? '' : $data->purchase_price}}">     
              </div>
            </div>
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Discount</label>
                  <input type="text" name="discount_price" id="" required placeholder="Enter discount price" class="form-control" value="{{ (is_null($data->discount_price)) ? '' : $data->discount_price}}">     
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label>Shipping Cost</label>
                  <input type="text" name="shipping_cost" id="" required placeholder="Enter shipping cost" class="form-control" value="{{ (is_null($data->shipping_cost)) ? '' : $data->shipping_cost}}">     
              </div>
            </div>
            <div class="col-md-3 p1-5">
              <div class="form-group">
                <label for="">Username</label>
                <select name="user_id" id="" class="form-control" required>
                  <option value="">Select</option>
                  @foreach ($user_array as $array)
                      @if ($data->user_id == $array->id)
                          <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                      @else
                          <option value="{{ $array->id }}">{{ $array->name }}</option>
                      @endif
                  @endforeach
                </select>          
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <button type="submit" class="btn btn-primary btn-md">Submit</button>    
        </div>
        </div>
    </div>
      </form>
    </div>
  </div>

</div>






    
@endsection

@section('scripts')

@endsection