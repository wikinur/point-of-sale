<div class="modal fade bd-example-modal-lg" id="modalForm">
  <div class="modal-dialog modal-lg">
    <form :action="actionUrl" method="post" autocomplete="off" v-on:submit="submitForm($event, dataMember.id_member)">
        @csrf
        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="member_name" class="col-md-2 offset-1 form-label">Nama Member</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="text" name="member_name" id="member_name" class="form-control" placeholder="Masukkan Nama Member" :value="dataMember.member_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-2 offset-1 form-label">Alamat</label>
                    <div class="col-md-7 offset-md-1">
                        <textarea name="address" id="address" class="form-control" cols="5" rows="10" placeholder="Masukkan Alamat Anda" :value="dataMember.address"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telpon" class="col-md-2 offset-1 form-label">Telepon</label>
                    <div class="col-md-7 offset-md-1">
                        <input type="number" name="telpon" id="telpon" class="form-control" placeholder="Masukkan Angka Maksimal 14 Karakter" :value="dataMember.telpon">
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