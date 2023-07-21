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
          <th>Email</th>
          <th>Password</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $n)
        <tr>
          <td>{{ $loop-> index + 1 }}</td>
          <td>{{ $n->name }}</td>
          <td>{{ $n->email }}</td>
          <td>{{ $n->password }}</td>
          <td>
            <a href="{{ route('user.edit', $n->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $n->id }}">Edit</a>
          </td>
          <td>
            <a href="{{ route('user.destroy', $n->id) }}" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary"><i class="fa fa-trash"></i></a>
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
                    <form action="{{ route('user.destroy', $n) }}" method="POST">
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
                <form action="{{ route('user.update', $n->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="for-group">
                    <label>Nama:</label>
                    <input class="form-control" name="name" value="{{ $n->name }}"></input><br>
                  </div>
                  <div class="for-group">
                    <label>Email:</label>
                    <input class="form-control" name="email" value="{{ $n->email }}"></input><br>
                  </div>
                  <div class="for-group">
                    <label>Password:</label>
                    <input class="form-control" type="password" name="password" value="{{ $n->password }}"></input><br>
                  </div>
                  <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                        <option value="">---Pilih Role---/option>
                        <option value="admin" {{ $n->role == 'admin' ? 'selected' : '' }}>admin</option>
                        <option value="user" {{ $n->role == 'user' ? 'selected' : '' }}>user</option>
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
        <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="for-group">
            <label>Name:</label>
            <input class="form-control" name="name"></input><br>
          </div>
          <div class="for-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email"></input><br>
          </div>
          <div class="for-group">
            <label>Password:</label>
            <input class="form-control" name="password"></input><br>
          </div>
          <div class="form-group">
             <label>Role</label>
             <div class="form-check">
             <div class="radio">
             <input class="form-check-input" type="radio" name="role" value="admin">
             <label class="form-check-label"> Admin </label>
             </div>
             <div class="radio">
             <input class="form-check-input" type="radio" name="role" value="user">
             <label class="form-check-label"> User </label>
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