<div class="modal fade bd-example-modal-lg" id="modalForm">
  <div class="modal-dialog modal-lg">
    <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, dataSupplier.id_supplier)">
        @csrf
        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="supplier_name" class="col-md-2 offset-1 form-label">Nama Supplier</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="Nama Supplier Wajib Diisi" :value="dataSupplier.supplier_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-2 offset-1 form-label">Alamat</label>
                    <div class="col-md-7 offset-md-1">
                        <textarea name="address" id="address" class="form-control" cols="5" rows="10" placeholder="Masukkan Alamat Anda" :value="dataSupplier.address"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telpon" class="col-md-2 offset-1 form-label">Telepon</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="number" name="telpon" id="telpon" class="form-control" placeholder="Masukkan Angka Maksimal 14 Karakter" :value="dataSupplier.telpon">
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