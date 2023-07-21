<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Absensi Student Labor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- DataTables -->
  <link rel="stylesheet" href="/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="home" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>

      </ul>


    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <img src="/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kafetaria UNAI</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Brian Waruwu</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Dasboard
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="user" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="studentlabor" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Studentlabor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="labor" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>labor</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="absensi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Absensi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Absensi</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">Title</h3> -->
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">

            <div id="app">

              <!-- Modal for Creating User -->
              <div class="modal fade" id="createlaborModalCenter" tabindex="-1" role="dialog" aria-labelledby="createlaborModalCenterTitle">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="createlaborModalLongTitle"> Tambah Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="grade">grade</label><br>
                          <input type="radio" value="A" v-model="grade">
                          <label>A</label><br>
                          <input type="radio" value="B" v-model="grade">
                          <label>B</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="nominal">Nominal</label><br>
                          <input type="radio" value="Rp.5.500" v-model="nominal">
                          <label>Rp.5.500,-</label><br>
                          <input type="radio" value="Rp.5000" v-model="nominal">
                          <label>Rp.5000,-</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="jam">Jam Kerja</label><br>
                          <input type="radio" value="4" v-model="jam">
                          <label>4</label><br>
                          <input type="radio" value="5" v-model="jam">
                          <label>5</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" v-on:click="createlabor">Save</button>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal for Updating User -->
              <div class="modal fade" id="updatelaborModalCenter" tabindex="-1" role="dialog" aria-labelledby="updatelaborModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updatelaborModalLongTitle">Tambah Labor</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="grade">grade</label><br>
                          <input type="radio" value="A" v-model="gradeUpdate">
                          <label>A</label><br>
                          <input type="radio" value="B" v-model="gradeUpdate">
                          <label>B</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="nominal">Nominal</label><br>
                          <input type="radio" value="Rp.5.500" v-model="nominalUpdate">
                          <label>Rp.5.500,-</label><br>
                          <input type="radio" value="Rp.5000" v-model="nominalUpdate">
                          <label>Rp.5000,-</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="jam">Jam Kerja</label><br>
                          <input type="radio" value="4" v-model="jamUpdate">
                          <label>4</label><br>
                          <input type="radio" value=" 5" v-model="jamUpdate">
                          <label>5</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input">
                              </span>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" v-on:click="updatelabor">Update</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal for Deleting User -->
              <div class="modal fade" id="deletelaborModalCenter" tabindex="-1" role="dialog" aria-labelledby="deletelaborModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deletelaborModalLongTitle">Confirm data deletion</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure want to delete this entry?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" v-on:click="deletelabor">Yes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="col-md-12">
                  <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#createlaborModalCenter">
                    Tambah Data
                  </button>
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Grade</th>
                      <th>Nominal</th>
                      <th>Jam Kerja</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <tr v-for="labor in labors">
                      <td>{{ labor.id }}</td>
                      <td>{{ labor.grade }}</td>
                      <td>{{ labor.nominal }}</td>
                      <td>{{ labor.jam }}</td>

                      <td><button class="btn btn-md btn-warning" v-on:click="getEdit(labor)">Edit</button></td>
                      <td><button class="btn btn-danger" v-on:click="getDelete(labor)">Delete</button></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.1
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        errors: [],
        message: null,
        labors: [],
        grade: [],
        nominal: [],
        jam: [],
        laborIdEdit: null,
        laborIdDelete: null,
        editMode: false,
        deleteMode: false,
        labor: '',
        grade: '',
        nominal: '',
        jam: '',
        gradeUpdate: '',
        nominalUpdate: '',
        jamUpdate: '',

      },
      mounted: function() {
        this.getlabors();
      },
      methods: {
        getlabors() { 
          axios.get('http://localhost:8000/api/labor')
            .then(response => {
              this.labors = response.data;
              this.grade = response.grade;
              this.nominal = response.nominal;
              this.jam = response.tanggal;

              console.log(response);
            })
            .catch(error => {
              console.log(error);
            });
        },
        createlabor: function() {
          //Hide the create modal
          $('#createlaborModalCenter').modal('hide');

          axios.post('http://localhost:8000/api/labor', {

              grade: this.grade,
              nominal: this.nominal,
              jam: this.jam,

            })
            .then(response => {
              this.getlabors();
              this.message = "Your data has been created";
              this.resetForm();
              console.log(response);
            })
            .catch(error => {
              console.log(error);
            });
        },
        resetForm: function() {
          this.editMode = false;
          this.deleteMode = false;
          this.laborIdEdit = null;
          this.labor = null;
          this.grade = null;
          this.nominal = null;
          this.jam = null;

        },
        getEdit: function(labor) {
          //Show the update modal
          $('#updatelaborModalCenter').modal('show');
          this.message = null;
          this.editMode = true;
          this.deleteMode = false;
          this.laborIdEdit = labor.id;
          this.gradeUpdate = labor.grade;
          this.nominalUpdate = labor.nominal;
          this.jamUpdate = labor.jam;

        },
        getDelete: function(labor) {
          //Show the delete modal
          $('#deletelaborModalCenter').modal('show')
          this.message = null;
          this.deleteMode = true;
          this.editMode = false;
          this.laborIdDelete = labor.id;
        },
        updatelabor: function() {
          axios.patch(`http://localhost:8000/api/labor/${this.laborIdEdit}`, {
              grade: this.gradeUpdate,
              nominal: this.nominalUpdate,
              jam: this.jamUpdate,

            })
            .then(res => {
              // handle success
              this.message = "Your data has been updated";
              //close the update modal
              $('#updatelaborModalCenter').modal('hide');
              this.resetForm();
              this.getlabors();
            })
            .catch(err => {
              // handle error
              console.log(err);
            })
        },
        // Delete User
        deletelabor: function() {
          axios.delete(`http://localhost:8000/api/labor/${this.laborIdDelete}`)
            .then(res => {
              // handle success
              this.message = "Your data has been deleted";
              //close the delete modal
              $('#deletelaborModalCenter').modal('hide');
              this.resetForm();
              this.getlabors();
            })
            .catch(err => {
              // handle error
              console.log(err);
            })
        }
      }
    })
  </script>
  <!-- jQuery -->
  <script src="/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/template/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/template/dist/js/demo.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="/template/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/template/dist/js/demo.js"></script>
  <!-- page script -->

</body>

</html>