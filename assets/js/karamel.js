//submit registrasi
$('#regForm').submit(function(e) {
    e.preventDefault();
    $('#loader').css('display', 'block');
    $('#btnReg').hide();

    $.ajax({
        type: 'post',
        url: $(this).attr("action"),
        data: $(this).find('input, textarea, select').serialize(),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.status ==  'fail'){
                toastr["error"](data.msg);
                $('#loader').css('display', 'none');
                $('#btnReg').show();
                grecaptcha.reset();
            }else{
                toastr["success"](data.msg);
                $("#regForm")[0].reset();
                $('#loader').css('display', 'none');
                $('#btnReg').show();
                grecaptcha.reset();
                $(window).scrollTop(0);
            }
        }
    });
});

//submit pendaftaran
$('#pendaftaranFrm').submit(function(e) {
    e.preventDefault();
    $('#loader').css('display', 'block');
    $('#btnPend').hide();

    $.ajax({
        type: 'post',
        url: $(this).attr("action"),
        data: $(this).find('input, textarea, select').serialize(),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.status ==  'fail'){
                toastr["error"](data.msg);
                $('#loader').css('display', 'none');
                $('#btnPend').show();
                grecaptcha.reset();
            }else{
                toastr["success"](data.msg);
                $("#pendaftaranFrm")[0].reset();
                $('#loader').css('display', 'none');
                $('#btnPend').show();
                grecaptcha.reset();
                $(window).scrollTop(0);
            }
        }
    });
});

// SideNav Initialization
$(".button-collapse").sideNav();

//Animation init
new WOW().init();

// Time Picker Initialization
$('#waktu').pickatime({
    twelvehour: false
});

//pass toggle
$(document).ready(function() {
    $("#showHide").click(function() {
        if ($(".password").attr("type") == "password") {
            $(".password").attr("type", "text");

        } else {
            $(".password").attr("type", "password");
        }
    });

});

// Material Select Initialization
$(document).ready(function() {
    $('.mdb-select').material_select();
});

// Tooltips Initialization
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$('select#role').on('change', function() {
    var val = this.value;
    var url;
    if( val == 1){
        $('#username').attr({type:"text"});
        $('#email').attr({type:"text"});
        $('#password').attr({type:"password"});
        $('#repassword').attr({type:"password"});
        $('#nama').attr({type:"text"});
        $('#alamat').attr({type:"text"});
        $('#notelp').attr({type:"text"});
        $("#divMapel").css("display", "none");
        $("#divProgram").css("display", "none");
        $("#divKelas").css("display", "none");
        $("#divBank").css("display", "none");
        $("#namaOrtu").css("display", "none");
        $('#univ').attr({type:"hidden"});
        $('#norek').attr({type:"hidden"});
        $('#noktp').attr({type:"hidden"});
        $('#sekolah').attr({type:"hidden"});
    }else if(val == 2){
        $('#username').attr({type:"text"});
        $('#email').attr({type:"text"});
        $('#password').attr({type:"password"});
        $('#repassword').attr({type:"password"});
        $('#nama').attr({type:"text"});
        $('#alamat').attr({type:"text"});
        $('#notelp').attr({type:"text"});
        $('#univ').attr({type:"text"});
        $('#norek').attr({type:"text"});
        $('#noktp').attr({type:"hidden"});
        $("#divMapel").css("display", "block");
        $("#divBank").css("display", "block");
        $("#divProgram").css("display", "none");
        $("#divKelas").css("display", "none");
        $("#namaOrtu").css("display", "none");
        $('#sekolah').attr({type:"hidden"});
    }else if(val == 3){
        $('#username').attr({type:"text"});
        $('#email').attr({type:"text"});
        $('#password').attr({type:"password"});
        $('#repassword').attr({type:"password"});
        $('#nama').attr({type:"text"});
        $('#alamat').attr({type:"text"});
        $('#notelp').attr({type:"text"});
        $('#noktp').attr({type:"text"});
        $("#divMapel").css("display", "none");
        $("#divBank").css("display", "none");
        $("#divProgram").css("display", "none");
        $("#divKelas").css("display", "none");
        $('#univ').attr({type:"hidden"});
        $('#norek').attr({type:"hidden"});
        $("#namaOrtu").css("display", "none");
        $('#sekolah').attr({type:"hidden"});
    }else if( val == 4){
        $('#username').attr({type:"text"});
        $('#email').attr({type:"text"});
        $('#password').attr({type:"password"});
        $('#repassword').attr({type:"password"});
        $('#nama').attr({type:"text"});
        $('#sekolah').attr({type:"text"});
        $("#namaOrtu").css("display", "block");
        $("#divProgram").css("display", "block");
        $("#divKelas").css("display", "block");
        $("#divBank").css("display", "none");
        $("#divMapel").css("display", "none");
        $('#alamat').attr({type:"hidden"});
        $('#notelp').attr({type:"hidden"});
        $('#noktp').attr({type:"hidden"});
    }else{
        $('#username').attr({type:"hidden"});
        $('#email').attr({type:"hidden"});
        $('#password').attr({type:"hidden"});
        $('#repassword').attr({type:"hidden"});
        $('#nama').attr({type:"hidden"});
        $('#alamat').attr({type:"hidden"});
        $('#notelp').attr({type:"hidden"});
        $('#univ').attr({type:"hidden"});
        $('#norek').attr({type:"hidden"});
        $("#divMapel").css("display", "none");
    }
});