<div>
    <label><b>Product ID</b></label>
    <select  name="id_product" wire:model="productid" class="form-control" required>
        <option value="" hidden>- Pilih -</option>
        @foreach ($product as $product)
        <option value="{{$product->id}}">{{$product->id}}</option>
        @endforeach
    </select><br>

    <label><b>Product Name</b></label>
    <input name="productname" class="form-control" type="text" value="{{$productname}}" readonly=""><br>

    <label><b>Unit Price</b></label>
    <div class="input-group">
        <div class="input-group-text">Rp</div>
        <input name="unitprice" class="form-control" type="text" value="{{$unitprice}}" readonly="">
    </div><br>

    <label><b>QTY</b></label>
    <input name="qty" class="form-control" type="number" min="1" value=""  required="">


</div> 




