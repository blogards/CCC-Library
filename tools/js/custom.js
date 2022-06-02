

$("body").delegate(".resource-status","change",function(event){
  var barcode = $(this).attr('barcode');
  var status = $(this).val();
  // alert(status);
  $.ajax({
       url:"resource_status",
       type:'post',
       dataTYpe:'text',
       data: {barcode:barcode, status:status},
       success:function(data){
         window.setTimeout(function(){window.location.reload()});
       }
  });
});

$("body").delegate(".user-status","change",function(event){
  var id = $(this).attr('id');
  var status = $(this).val();
 $.ajax({
       url:"user_status",
       type:'post',
       dataTYpe:'text',
       data: {id:id, status:status},
       success:function(data){
         window.setTimeout(function(){window.location.reload()});
       }
  });
});
// let myDate = new Date(myDate);
// alert(new Date());
$("body").delegate(".pickup_date","change",function(event){
  var pick_due = $(this).val();
  var someDate = new Date(pick_due);
  someDate.setDate(someDate.getDate() + 5); //number  of days to add, e.x. 15 days
  var dateFormated = someDate.toISOString().substr(0,10);
  $('.dueassign').val(dateFormated);
  // alert(dateFormated);

 
});

$("body").delegate(".library-resource-selector","change",function(event){
    var category = $(this).val();

    if(category == "Audio Visual Material"){
        window.location="available_audio_visual";

    }else if(category == "Books"){
      window.location="available_books";
    }
    else if(category == "Thesis/Dissertation"){
        window.location="available_thesis";

    }else if(category == "Government Publications"){
        window.location="available_gov_pubs";
      
    }else if(category == "Journals"){
        window.location="available_journals";

    }else if(category == "Manuscript"){
        window.location="available_manuscripts";
      
    }
});
//open pdf file Book 
$("body").delegate(".view_pdf","click",function(event){
  var filename = $(this).attr('file');
  // alert(filename);
  window.open(filename, '_blank')
});


 $(document).ready(function(){

  $('.select2').select2({});
  $('.select3').select2({});
  
  //*********       change input type [from text to date]                    ************/
  
  $("#datetime1").focus(function(){    
    $(this).attr({type:'date'});

  });

//this is for admin date transaction(reservation confirmation release)

//*********              current timestamp                     ************/

//set min max date for datetime-local
  var today = new Date();
  if(today.getMonth()< 10){
    var date = today.getFullYear()+'-'+('0'+(today.getMonth()+1))+'-'+today.getDate();
    var max_pickup = today.getFullYear()+'-'+('0'+(today.getMonth()+1))+'-'+(today.getDate()+5);
    var due = today.getFullYear()+'-'+('0'+(today.getMonth()+1))+'-'+(today.getDate()+3);
  }else{
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var max_pickup = today.getFullYear()+'-'+('0'+(today.getMonth()+1))+'-'+(today.getDate()+5);
    var due = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+1);
  }

  if(today.getHours()< 10){
    var time = ('0'+today.getHours()) + ":" + today.getMinutes();
    if(today.getMinutes()< 10){
      var time = ('0'+today.getHours()) + ":" + ('0'+today.getMinutes());
    }
  }else if(today.getMinutes()< 10){
    var time = today.getHours() + ":" + ('0'+today.getMinutes());
    if(today.getHours()< 10){
      var time = ('0'+today.getHours()) + ":" + ('0'+today.getMinutes());
    }
  }else{
    var time = today.getHours() + ":" + today.getMinutes();
  }
  

  var dateTime = date+'T'+time;
  //date of pickup
  $(".datetime2").val(date);
  $(".datetime2").attr('min',date);
  $(".datetime2").attr('max',date);
  // alert(date+'T'+time);
  //date of due
  $(".datetime3").attr('min',due);
  $(".datetime3").val(due);

  //date of return

  $(".datetime4").attr('min',date+'T'+time);
  $(".datetime4").attr('max',date+'T'+time);
  $(".datetime4").val(date+'T'+time);

  // $(".due-assign").attr('min',due);
  $(".dueassign").val(due);
  $(".dueassign").attr('min', due);
  

  $('.date-assign').attr('min',date);
  $('.date-assign').attr('max',date);

  
  // alert(max_pickup);

// get 5 days /limit
let myDate = new Date(Date.now() + 5 * 86400000);
if(myDate.getMonth()< 10){
  var max_date = myDate.getFullYear()+'-'+('0'+(myDate.getMonth()+1))+'-'+myDate.getDate();
  // var due = myDate.getFullYear()+'-'+('0'+(myDate.getMonth()+1))+'-'+(myDate.getDate()+3);
  if(myDate.getDate()< 10){
  var max_date = myDate.getFullYear()+'-'+('0'+(myDate.getMonth()+1))+'-'+('0'+myDate.getDate());
  // var due = myDate.getFullYear()+'-'+('0'+(myDate.getMonth()+1))+'-'+(myDate.getDate()+3);
  }
}else{
  var max_date = myDate.getFullYear()+'-'+(myDate.getMonth()+1)+'-'+myDate.getDate();
  // var max_date = myDate.getFullYear()+'-'+('0'+(myDate.getMonth()+1))+'-'+(myDate.getDate()+5);
  var due = myDate.getFullYear()+'-'+(myDate.getMonth()+1)+'-'+(myDate.getDate()+1);
}


$('.pickup_date').attr('min', date);
$('.pickup_date').attr('max',max_date);
$('.pickup_date').val(date);

$('.date_to_borrow').attr('min', date);
$('.date_to_borrow').attr('max',max_date);
$('.date_to_borrow').val(date);
// alert(max_date);

//

  var someDate = new Date();
  someDate.setDate(someDate.getDate() + 5); //number  of days to add, e.x. 15 days
  var dateFormated = someDate.toISOString().substr(0,10);
  // alert(someDate);
  // alert(dateFormated); 

//
 $('.expected_due').val(dateFormated);

//this is for student's date reservation

//*********              current date                     ************/

    var dtToday = new Date();
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
      var day3 = dtToday.getDate() + 2;
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
			  day = '0' + day.toString();
			var maxDate = year + '-' + month + '-' + day;
      var maxDate1 = year + '-' + month + '-' + day3;
      // alert(day3);
	  	$('.datetime1').attr('min',maxDate);
      $('.datetime0').attr('max',maxDate1);
      $('.datetime0').attr('min',maxDate);
      $('.datetime0').val(maxDate);


      // $('.date-assign').attr('min',maxDate);
      $('.date-assign').val(maxDate);
    


  
});
