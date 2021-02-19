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
                <div class="card-header p-0">
                    <h1 style="font-size:5vh;"><b><?php echo e($data1); ?></b></h1>
                </div>
                <div class="card-body">
                <div class="row" style="max-height:450px">
                <div class="col-sm-12" style="max-height:450px">
                    <img src="/fimages/<?php echo e($ikang); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example1" class="display" style="width:100%;height:200px">
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
                    <div class="col-sm-12" >
                    <h1>Sisa :  <b id="jumlah_1"> <?php echo e($sisikan); ?> </b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card" align="center">
                <div class="card-header">
                    <h1 style="font-size:5vh;"><b><?php echo e($data2); ?></b></h1>
                </div>
                <div class="card-body">
                <div class="row" style="max-height:450px">
                <div class="col-sm-12" style="max-height:450px">
                    <img src="/fimages/<?php echo e($ayamg); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example2" class="display" style="width:100%;height:200px">
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
                        <div class="col-sm-12">
                        <h1>Sisa :  <b id="jumlah_2"> <?php echo e($sisayam); ?> </b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card" align="center">
                <div class="card-header">
                    <h1 style="font-size:5vh;"><b><?php echo e($data3); ?> </b></h1>
                </div>
                <div class="card-body">
                <div class="row" style="max-height:450px">
                <div class="col-sm-12" style="max-height:450px">
                    <img src="/fimages/<?php echo e($gdaging); ?>" class="img-fluid h-100" alt="No Image">
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">
                <table id="example3" class="display" style="width:100%;height:200px">
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
                        <div class="col-sm-12">
                        <h1>Sisa :  <b id="jumlah_3"> <?php echo e($sisdaging); ?> </b></h1>
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

    refreshAt(08, 35, 05);
    refreshAt(14, 20, 05);
    refreshAt(19, 20, 05);
    refreshAt(03, 20, 05);

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
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
}, 2000);
</script>
<script>
var channel = Echo.channel('my-channel');
channel.listen('.jikan', function(data) {
    $("#jumlah_1").text(data.jikan);
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
});
channel.listen('.jayam', function(data) {
    $("#jumlah_2").text(data.jayam);
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
});
channel.listen('.jaging', function(data) {
    $("#jumlah_3").text(data.jaging);
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/kantin/resources/views/monitor3.blade.php ENDPATH**/ ?>