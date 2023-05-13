<div class="modal fade bd-example-modal-lg" id="modalForm">
  <div class="modal-dialog modal-lg">
    <form :action="actionUrl" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="category_id" class="col-md-2 offset-1 form-label">Nama Kategori</label>
                    <div class="col-md-7 offset-md-1">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" disabled>Pilih Category</option>
                            @foreach ($categories as $category)
                                <option :selected="dataProduct.category_id == {{ $category->id_category }}" value="{{ $category->id_category }}">{{ $category->category_name }}</option>
                            @endforeach                           
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="supplier_id" class="col-md-2 offset-1 form-label">Nama Supplier</label>
                    <div class="col-md-7 offset-md-1">
                        <select name="supplier_id" id="supplier_id" class="form-control">
                            <option selected="" disabled>Pilih Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option :selected="dataProduct.supplier_id == {{ $supplier->id_supplier }}" value="{{ $supplier->id_supplier }}">{{ $supplier->supplier_name }}</option>
                            @endforeach                           
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_name" class="col-md-2 offset-1 form-label">Nama Produk</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="text" name="product_name" id="product_name" placeholder="Nama Produk" class="form-control" :value="dataProduct.product_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="purchase_price" class="col-md-2 offset-1 form-label">Harga Beli</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="number" name="purchase_price" id="purchase_price" placeholder="Masukkan Angka" class="form-control" :value="dataProduct.purchase_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selling_price" class="col-md-2 offset-1 form-label">Harga Jual</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="number" name="selling_price" id="selling_price" placeholder="Masukkan Angka" class="form-control" :value="dataProduct.selling_price">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat">Simpan</button>
                <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </form>
  </div>
</div>