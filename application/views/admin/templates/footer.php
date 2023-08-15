<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a>Butik Busana Fashion</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Sweet Alert -->
<script src="<?= base_url('assets') ?>/bower_components/sweetalert/sweetalert.min.js"></script>
<!-- jQuery 3 -->
<script src="<?= base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?= base_url('assets') ?>/bower_components/pace/pace.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Data Table -->
<script src="<?= base_url('assets') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- CK Editor -->
<script src="<?= base_url('assets') ?>/bower_components/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<?php if($title == 'Detail Data Cabang') { ?>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("cabang");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ],
        datasets: [{
            label: "Terlambat",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [
                <?php
              date_default_timezone_set('Asia/Jayapura');
              $tahun  = date('Y');

              //Januari
              $januari = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="01" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $januari->num_rows() . ', ';
              //Februari
              $februari = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="02" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $februari->num_rows() . ', ';
              //Maret
              $maret = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="03" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $maret->num_rows() . ', ';
              //April
              $april = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="04" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $april->num_rows() . ', ';
              //Mei
              $mei = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="05" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $mei->num_rows() . ', ';
              //Juni
              $juni = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="06" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $juni->num_rows() . ', ';
              //Juli
              $juli = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="07" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $juli->num_rows() . ', ';
              //Agustus
              $agustus = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="08" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $agustus->num_rows() . ', ';
              //September
              $september = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="09" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $september->num_rows() . ', ';
              //Oktober
              $oktober = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="10" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $oktober->num_rows() . ', ';
              //November
              $november = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="11" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $november->num_rows() . ', ';
              //Desember
              $desember = $this->db->query('SELECT id FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$idCabangGrafik.'") AND status="Terlambat" AND MONTH(tanggal)="12" AND YEAR(tanggal)="'.$tahun.'" ');
              echo $desember->num_rows() . ', ';
            ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 5
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>
<?php } ?>
<?php if($title == 'Detail Karyawan' OR $title="Dashboard") { ?>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("karyawan");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ],
        datasets: [{
            label: "Terlambat",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [
                <?php
              date_default_timezone_set('Asia/Jayapura');
              $tahun  = date('Y');

              for ($i=1; $i <= 12; $i++) { 
                $bulan  = $this->db->query('SELECT id FROM tb_absensi WHERE idUser="'.$idKaryawangrafik.'" AND MONTH(tanggal)="'.$i.'" AND YEAR(tanggal)="'.$tahun.'" AND status="Terlambat"');
                echo $bulan->num_rows() . ', ';
              }
            ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 5
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>
<?php } ?>
<script>
//Konfirmasi
$('.tombol-yakin').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const isiData = $(this).data('isidata');
    swal({
        title: 'Apakah anda yakin?',
        text: isiData,
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.location.href = href;
        }
    });
});

// Data Table
$(document).ready(function() {
    $('#dataTable').DataTable();
});

// Data Table
$(document).ready(function() {
    $('.dataTable').DataTable();
});

// Notifikasi Success
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    swal({
        title: "Selamat!",
        text: flashData,
        icon: "success",
    });
}

// Notifikasi Error
const flashDaraError = $('.flash-data-error').data('flashdataerror');
if (flashDaraError) {
    swal({
        title: "Maaf!",
        text: flashDaraError,
        icon: "error",
    });
}

// Efek Loading
$(document).ajaxStart(function() {
    Pace.restart()
})

$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
})

//Editor
$(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
})

var rupiah1 = document.getElementById("rupiah1");
rupiah1.addEventListener("keyup", function(e) {
    rupiah1.value = convertRupiah(this.value);
});

function convertRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

// Sow Password
$(document).ready(function() {
    $('#checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    });
});
</script>
</body>

</html>