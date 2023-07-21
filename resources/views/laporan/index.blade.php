@extends('master')
@section('isi')
<div class="table-responsive">
  <div class="card-body">
    <table id="example1" class="table  table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Tanggal</th>
          <th>Shift</th>
        </tr>
      </thead>
      <tbody>
        @foreach($absensi as $n)
        <tr>
          <td>{{ $loop-> index + 1 }}</td>
          <td>{{ $n->studentlabor->nama }}</td>
          <td>{{ $n->status }}</td>
          <td>{{ $n->tanggal }}</td>
          <td>{{ $n->shift->shift}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection