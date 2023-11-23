$(document).ready(function(){

$('#fname_err').hide();
$('#lname_err').hide();
$('#ph_err').hide();
$('#bio_err').hide();
$('#pass_err').hide();
$('#cpass_err').hide();

let fn_err=true;
let ln_err=true;
let ph_err=true;
let bi_err=true;
let p_err=true;
let cp_err=true;

$('#fname').keyup(function(){
    fnamechk()
});
$('#lname').keyup(function(){
    lnamechk()
});
$('#phone').keyup(function(){
    phonechk()
});
$('#ibio').keyup(function(){
    biochk()
});
$('#pass').keyup(function(){
    passchk()
});
$('#cpass').keyup(function(){
    cpasschk()
});


function fnamechk(){
var uname=$('#fname').val();
if(uname.length=='' || uname.length<2){
    $('#fname_err').show();
    $('#fname_err').html("please enter at least 2 characters");
    $('#fname_err').focus();
    $('#fname_err').css("color","red");
    fn_err=false;
    
}else{
    $('#fname_err').hide();
}
}

function lnamechk(){
var uname=$('#lname').val();
if(uname.length=='' || uname.length<2){
    $('#lname_err').show();
    $('#lname_err').html("please enter at least 2 characters");
    $('#lname_err').focus();
    $('#lname_err').css("color","red");
    ln_err=false;
    
}else{
    $('#lname_err').hide();
}
}

function phonechk(){
var pho=$('#phone').val();
if(pho.length=='' || pho.length!=10){
    $('#ph_err').show();
    $('#ph_err').html("invailid mobile");
    $('#ph_err').focus();
    $('#ph_err').css("color","red");
    ph_err=false;
    
}else{
    $('#ph_err').hide();
}
}


function biochk(){
var b=$('#ibio').val();
if(b.length=='' || b.length<20){
    $('#bio_err').show();
    $('#bio_err').html("please enter minimum 20 characters");
    $('#bio_err').focus();
    $('#bio_err').css("color","red");
    bi_err=false;
   
    
}else{
    $('#bio_err').hide();
}
}


function passchk(){
var pchk=$('#pass').val();
var sp=/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/; 
var cap=/[A-Z]/;
if(pchk.length<8 || !sp.test(pchk) || !cap.test(pchk)){
    $('#pass_err').show();
    $('#pass_err').html("please enter at least 8 characters with 1 special and 1 capital letter");
    $('#pass_err').focus();
    $('#pass_err').css("color","red");
    p_err=false;
    
    
}else{
    $('#pass_err').hide();
}
}

function cpasschk(){
    var cpchk=$('#cpass').val();
    var pchk=$('#pass').val();
    if(cpchk!=pchk){
        $('#cpass_err').show();
        $('#cpass_err').html("pass do not match");
        $('#cpass_err').focus();
        $('#cpass_err').css("color","red");
        cp_err=false;
    
    }else{
        $('#cpass_err').hide();
    } 
    
}
$('#btn_sub').click(function(){
     fn_err=true;
     ln_err=true;
     ph_err=true;
     bi_err=true;
     p_err=true;
     cp_err=true;

     fnamechk();
     lnamechk();
     phonechk();
     biochk();
     passchk();
     cpasschk();
 if((fn_err==true && ln_err==true && ph_err==true &&  bi_err==true && p_err==true && cp_err==true)){
    return true;
 }
 else{
    return false;
 }

});

});


