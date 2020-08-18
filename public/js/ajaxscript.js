
$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new product *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmTransaksi').trigger("reset");
        $('#myModal').modal('show');
    });



    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var transaksi_id = $(this).val();
       
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + transaksi_id,
            success: function (data) {
                console.log(data);
                $('#transaksi_id').val(data.id);
                $('#nama').val(data.nama);
                $('#kelas').val(data.kelas);
                $('#kategori').val(data.kategori);
                $('#nominal').val(data.nominal);
                $('#tanggal').val(data.tanggal);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        var formData = {
            name: $('#nama').val(),
            price: $('#kelas').val(),
            price: $('#kategori').val(),
            price: $('#nominal').val(),
            price: $('#tanggal').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var transaksi_id = $('#transaksi_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + transaksi_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var trans = '<tr id="trans' + data.id + '"><td>' + data.id + '</td><td>' + data.nama + '</td><td>' + data.kelas + '</td><td>' + data.kategori + '</td><td>' + data.nominal + '</td><td>' + data.tanggal + '</td>';
                trans += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                trans += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#transaksi-list').append(trans);
                }else{ //if user updated an existing record
                    $("#trans" + transaksi_id).replaceWith( trans );
                }
                $('#frmTransaksi').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click','.delete-transaksi',function(){
        var transaksi_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + transaksi_id,
            success: function (data) {
                console.log(data);
                $("#transaksi" + transaksi_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
});