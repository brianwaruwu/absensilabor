@extends('master')
@section('isi')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus">ADD DATA</i>
</button>
<div class="table-responsive">
  <div class="card-body">
    <table id="example1" class="table  table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nim</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>Tingkat</th>
          <th>Pekerjaan</th>
          <th>Telepon</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($studentlabor as $n)
        <tr>
          <td>{{ $loop-> index + 1 }}</td>
          <td>{{ $n->nim }}</td>
          <td>{{ $n->nama }}</td>
          <td>{{ $n->jurusan }}</td>
          <td>{{ $n->tingkat }}</td>
          <td>{{ $n->pekerjaan_id }}</td>
          <td>{{ $n->nohp }}</td>

          <td>
            <a href="{{ route('studentlabor.edit', $n->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $n->id }}">Edit</a>
          </td>
          <td>
            <a href="{{ route('studentlabor.destroy', $n->id) }}" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary"><i class="fa fa-trash"></i></a>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apakah Anda Yakin Ingin Menghapus Data Ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('studentlabor.destroy', $n) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" style="width: 50%" type="submit"><i class="fa fa-trash"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
          </td>
        </tr>

        {{-- ModalEdit --}}
        <div class="modal fade" id="exampleModalLong{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('studentlabor.update', $n->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="for-group">
                    <label>Nim</label>
                    <input class="form-control" name="nim" value="{{ $n->nim }}"></input><br>
                  </div>
                  <div class="for-group">
                    <label>Nama:</label>
                    <input class="form-control" name="nama" value="{{ $n->nama }}"></input><br>
                  </div>
                  <div class="for-group">
                    <label>telepon</label>
                    <input class="form-control" name="nohp" value="{{ $n->nohp }}"></input><br>
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="jurusan">
                      <option value="">---Pilih Jurusan---</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Filsafat">Filsafat</option>
                      <option value="Manajemen">Manajemen</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tingkat</label>
                    <select class="form-control" name="tingkat">
                      <option value="">---Pilih Tingkat---</option>
                      <option value="I">I </option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Pekerjaan</label>
                    <select class="form-control" name="pekerjaan_id">
                      <option value="">---Pilih Pekerjaan---</option>
                      <option value="Cuci pring">Cuci piring</option>
                      <option value="Masak">Masak</option>
                      <option value="serve">server</option>
                      <option value="Jenitor">Jenitor</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        {{-- EndModalEdit --}}
        @endforeach
      </tbody>
    </table>
  </div>
</div>



{{-- ModalCreate --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('studentlabor.store') }}" method="POST">
          @csrf
          <div class="for-group">
            <label>Nim</label>
            <input class="form-control" name="nim"></input><br>
          </div>
          <div class="for-group">
            <label>Nama</label>
            <input class="form-control" name="nama"></input><br>
          </div>
          <div class="for-group">
            <label>Telepon</label>
            <input class="form-control" name="nohp"></input><br>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="jurusan">
              <option value="">---Pilih Jurusan---</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Filsafat">Filsafat</option>
              <option value="Manajemen">Manajemen</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tingkat</label>
            <select class="form-control" name="tingkat">
              <option value="">---Pilih Tingkat---</option>
              <option value="I">I </option>
              <option value="II">II</option>
              <option value="III">III</option>
            </select>
          </div>
          <div class="form-group">
            <label>Pekerjaan</label>
            <select class="form-control" name="pekerjaan_id">
              <option value="">---Pilih Pekerjaan---</option>
              <option value="Cuci pring">Cuci piring</option>
              <option value="Masak">Masak</option>
              <option value="serve">server</option>
              <option value="Jenitor">Jenitor</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
{{-- EndModalCreate --}}

@endsection