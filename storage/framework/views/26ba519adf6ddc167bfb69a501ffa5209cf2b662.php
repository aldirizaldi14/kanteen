<?php $__env->startSection('content'); ?>

<style>
td { 
    font-size: 35px;
 }
</style>

<div class="container-fluid">
    <!-- Row 1 -->
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card" align="center">
                <div class="card-header">
                    <h4><?php echo e($data1); ?></h4>
                </div>
                <div class="card-body">
                <div class="row" style="height:450px">
                <div class="col-sm-12" style="height:450px">
                    <img src="/fimages/<?php echo e($ikang); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example1" class="display" style="width:100%;height:250px">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                <h5>Status : <b id="msg1"></b></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card" align="center">
                <div class="card-header">
                    <h4><?php echo e($data2); ?></h4>
                </div>
                <div class="card-body">
                <div class="row" style="height:450px">
                <div class="col-sm-12" style="height:450px">
                    <img src="/fimages/<?php echo e($ayamg); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example2" class="display" style="width:100%;height:250px">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_2">
                        <h5>Status : <b id="msg2"></b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card" align="center">
                <div class="card-header">
                    <h4><?php echo e($data3); ?></h4>
                </div>
                <div class="card-body">
                <div class="row" style="height:450px">
                <div class="col-sm-12" style="height:450px">
                    <img src="/fimages/<?php echo e($gdaging); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example3" class="display" style="width:100%;height:250px">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_3">
                        <h5>Status : <b id="msg3"></b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {

    refreshAt(07, 30, 05);
    refreshAt(13, 20, 05);
    refreshAt(18, 45, 05);
    refreshAt(03, 10, 05);

    $('#example1').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device1",
        order: [[ 0, "desc" ]],
        columns: [{
                data:'id'
        },
            {
                data: 'name'
            },
        ], 
        columnDefs: [ 
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });
    $('#example2').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device2",
        order: [[ 0, "desc" ]],
        columns: [{
            data: 'id'
        },
            {
                data: 'name'
            },
        ], 
        columnDefs: [ 
            {
                "targets": [ 0 ],
                "visible": false,
            }
        ]
    });
    $('#example3').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device3",
        order: [[ 0, "desc" ]],
        columns: [{
                data: 'id'
        },
            {
                data: 'name'
            },
        ], 
        columnDefs: [ 
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });
});

function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if (now.getHours() > hours ||
        (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() {
        window.location.reload(true);
    }, timeout);
}
setInterval(function() {
    if (new Date().getHours() == 7 && new Date().getMinutes() > 30) {
        location.reload()
    } else if (new Date().getHours() == 13 && new Date().getMinutes() > 25) {
        location.reload()
    } else if (new Date().getHours() == 17 && new Date().getMinutes() > 45) {
        location.reload()
    } else if (new Date().getHours() == 3 && new Date().getMinutes() > 10) {
        location.reload()
    }
}, 30000);
setInterval(function() {
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
}, 2000);
</script>
<script>
var channel = Echo.channel('my-channel');
channel.listen('.jikan', function(data) {
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg1").text("OK");
  }else {
    $("#msg1").text("Error");
  }
});
channel.listen('.jayam', function(data) {
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg2").text("OK");
  }else {
    $("#msg2").text("Error");
  }
});
channel.listen('.jaging', function(data) {
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg3").text("OK");
  }else {
    $("#msg3").text("Error");
  }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kantin/resources/views/monitor3.blade.php ENDPATH**/ ?>