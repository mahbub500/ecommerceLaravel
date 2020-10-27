@php
  $discount = 0;
@endphp
@foreach(Cart::content() as $product)
<tr>
  <td>
    <div class="media">
      <div class="d-flex">
        <img width="80" src="{{ asset('storage/products/'.$product->options->image) }}" alt="" />
      </div>
      <div class="media-body">
        <p>{{ $product->name }}</p>
      </div>
    </div>
  </td>
  <td>
    <h5>Tk {{ $product->price }}</h5>
  </td>
  <td>
    <div class="product_count">
      <input type="text" name="qty" id="sst{{ $product->id }}" maxlength="12" value="{{ $product->qty }}" title="Quantity:" class="input-text qty"
      />
      <button data-rowid="{{ $product->rowId }}" onclick="var result = document.getElementById('sst{{ $product->id }}'); 
                       var sst = result.value; 
                       if( !isNaN( sst )) result.value++;
                       return false;" 
        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
      <button data-rowid="{{ $product->rowId }}" onclick="var result = document.getElementById('sst{{ $product->id }}'); 
                       var sst = result.value; 
                       if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
        class="reduced items-count" type="button" ><i class="lnr lnr-chevron-down"></i></button>

    </div>
  </td>
  <td>{{ $product->options->color }}</td>
  <td>{{ $product->options->discount * $product->qty }}</td>
  <td>
    <h5>{{ ($product->price * $product->qty) - ($product->options->discount * $product->qty) }}</h5>
  </td>
  <td>
    <a href="{{ url('cart/remove/'.$product->rowId) }}" class="btn btn-default btn-remove"><i class="fa fa-times text-danger"></i></a>
    
  </td>
</tr>

@php
  $discount += $product->options->discount * $product->qty;
@endphp


@endforeach
<tr>
  <td></td>
  <td></td>
  <td>Total Qty: {{ Cart::count() }}</td>
  <td></td>
  <td>Total Discount: Tk {{ $discount }}</td>
  <td>Total: {{ Cart::total() - $discount }}</td>
  <td></td>
</tr>