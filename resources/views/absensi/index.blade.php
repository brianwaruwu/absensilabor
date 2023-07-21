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
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Shift</th>
          <th>Status</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($absensi as $n)
        <tr>
          <td>{{ $loop-> index + 1 }}</td>
          <td>{{ $n->studentlabor->nama}}</td>
          <td>{{ $n->status }}</td>
          <td>{{ $n->tanggal }}</td>
          <td>{{ $n->shift->shift}}</td>
          <td>
            <a href="{{ route('absensi.edit', $n->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $n->id }}">Edit</a>
          </td>
          <td>
            <a href="{{ route('absensi.destroy', $n->id) }}" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary"><i class="fa fa-trash"></i></a>
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
                    <form action="{{ route('absensi.destroy', $n) }}" method="POST">
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
        </tr>

        {{-- ModalEdit --}}
        <div class="modal fade" id="exampleModalLong{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('absensi.update', $n->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label>Shift</label>
                    <select class="form-control" name="nama_id">
                      <option value="">---Pilih Nama---</option>
                      @foreach($studentlabor as $s)
                      <option value="{{ $s->id }}" {{ $n->nama_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="for-group">
                    <label>Tanggal:</label>
                    <input class="form-control" name="tanggal" type="date" value="{{ $n->tanggal }}"></input><br>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                      <div class="radio">
                        <input class="form-check-input" type="radio" name="status" value="Hadir">
                        <label class="form-check-label">
                          Hadir
                        </label>
                      </div>
                      <div class="radio">
                        <input class="form-check-input" type="radio" name="status" value="Tidak Hadir">
                        <label class="form-check-label">
                          Tidak Hadir
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Shift</label>
                    <select class="form-control" name="shift_id">
                      <option value="">---Pilih Shift---</option>
                      @foreach($shift as $s)
                      <option value="{{ $s->id }}" {{ $n->shift_id == $s->id ? 'selected' : '' }}>
                        {{ $s->shift }}
                      </option>
                      @endforeach
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('absensi.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama</label>
            <select class="form-control" name="nama_id">
              <option value="">---Pilih nama---</option>
              @foreach($studentlabor as $studentlabor)
              <option value="{{ $studentlabor->id }}">{{ $studentlabor->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control" type="date" name="tanggal" id="tanggal"></input><br>
          </div>
          <div class="form-group">
            <label>Shift</label>
            <select class="form-control" name="shift_id">
              <option value="">---pilih Shift---</option>
              @foreach($shift as $shift)
              <option value="{{ $shift->id }}">{{ $shift->shift}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <div class="form-check">
              <div class="radio">
                <input class="form-check-input" type="radio" name="status" value="Hadir">
                <label class="form-check-label">
                  Hadir
                </label>
              </div>
              <div class="radio">
                <input class="form-check-input" type="radio" name="status" value="TIdak Hadir">
                <label class="form-check-label">
                  Tidak Hadir
                </label>
              </div>
            </div>
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