 
//Success Message
      $(document).ready(function(){
      $('.alert-success').fadeIn().delay(1000).fadeOut();
      });




//Invoice Entry Page
$(document).ready(function(){
    var i=1;
    let j =0;
    $("#add_row").click(function(){
        b=i-1;
        
        let netvalueParent = "addr"+j;
        let _net = document.getElementById(netvalueParent);
        let netValue = _net.getElementsByClassName("netvalue")[0];
        //console.log(netValue)
        if(netValue.value != ''){
          $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
          j++;  
        }else{
          alert("Please fill the required field");
        }
        

    });
    $("#delete_row").click(function(){
      if(i>1){

      let icalc = i-1;
      let doc= document.getElementById("addr"+icalc);
      let netvalue = doc.getElementsByClassName('netvalue')[0];
      let sub_total = document.getElementById('sub_total');

      sub_total.value -=netvalue.value

    $("#addr"+(i-1)).html('');
    i--;
    }
 

  });
  
  $('#tab_logic tbody').on('keyup change',function(){
    //calc();
  });

  $('#tax').on('keyup change',function(){
   
    let sub_total = document.getElementById('sub_total').value;
    let tax = document.getElementById('tax').value;
    let tax_amount = document.getElementById('tax_amount');
    let total_amount = document.getElementById('total_amount');

    let tax_sum = sub_total/100*tax; 
    
    tax_amount.value = tax_sum;

    total_amount.value = sub_total - tax_sum ;

  });
  

});

// function calc()
// {
//   $('#tab_logic tbody tr').each(function(i, element) {
//     var html = $(this).html();
//     if(html!='')
//     {
//       var sqrft_copies = $(this).find('.sqrft_copies').val();
//       var copies = document.getElementById('totals').value;
//       var qty = $(this).find('.qty').val();
//       var price = $(this).find('.price').val();
//       var nettotal = copies*qty;
//       $(this).find('.total').val(sqrft_copies);
//       $(this).find('.netvalue').val(nettotal*price);

//       calc_total();
//     }
//     });
// }


// function calc()
// {
//   $('#tab_logic tbody tr').each(function(i, element) {
//     var html = $(this).html();
//     if(html!='')
//     {
//       // var totals = $(this).find('.totals').val();
//       var total = document.getElementById("totals").value;

//       var qty = $(this).find('.qty').val();
//       var price = $(this).find('.price').val();
//       var totals = total*qty;

//       //$(this).find('.total').val(total);
//       $(this).find('.netvalue').val(totals*price);

//       calc_total();
//     }
//     });
// }

 sqrft =(sqft)=>{
  let parentnodes = sqft.parentNode.parentNode.id;

  let inputs = document.getElementById(parentnodes);
  let str = inputs.getElementsByClassName('sqrft_copies')[0].value;
  let totals = inputs.getElementsByClassName('total')[0];
  let qty = inputs.getElementsByClassName('qty')[0].value;

  var sqrft  = str.split('x');
  var height = parseInt(sqrft[0]);
  var width  = parseInt(sqrft[1]);

  var sqrft_output = height * width;
  
  totals.value = sqrft_output;
 //console.log(sqft);
}

 copies =(copy)=>{
  let parentnodes = copy.parentNode.parentNode.id;

  let inputs = document.getElementById(parentnodes);
  let qty = inputs.getElementsByClassName('qty')[0].value;
  let price = inputs.getElementsByClassName('price')[0].value;
  let netvalue = inputs.getElementsByClassName('netvalue')[0];
  let sqrft_copies = inputs.getElementsByClassName('sqrft_copies')[0].value;
  let totals = inputs.getElementsByClassName('total')[0].value;

  //console.log(sqrft_copies,totals)
  if(totals === '0' && sqrft_copies === '0'){
      netvalue.value = qty*price ;
  }else{
    netvalue.value = totals*qty*price ;
  }
  //netvalue.value = qty*price ;
  // console.log(netvalue.value);
    let totalsalesnetvalue = 0;

    let rownetvalue = document.getElementsByClassName('netvalue');
    let sub_total = document.getElementById('sub_total');


    for (var i= 0; i<rownetvalue.length; i++){
        totalsalesnetvalue +=parseInt(rownetvalue[i].value);
       }
    sub_total.value = totalsalesnetvalue;



}



// function calc_total()
// {
//   total=0;
//   $('.netvalue').each(function() {
//         total += parseInt($(this).val());
//     });
//   $('#sub_total').val(total.toFixed(2));
//   tax_sum=total/100*$('#tax').val();
//   $('#tax_amount').val(tax_sum.toFixed(2));
//   $('#total_amount').val((tax_sum+total).toFixed(2));
// }



//customer details append function

function customer_details(){

      let customer_id = document.getElementById("customer");
      let customer = customer_id.options[customer_id.selectedIndex].value;

      let gst = document.getElementById('gst');
      let phone = document.getElementById('phone');
      let address = document.getElementById('address');
      let state = document.getElementById('state');

        $.ajax({
    type:'get',
    url:"/api/customer/"+customer,
    dataType:'json',
    success:function(data){
      // console.log(data);
         gst.value = data.gst_no;
         phone.value = data.phone_no;
         address.value = data.address;
         state.value = data.state;
    },
    error:function(){
    }
        });
       
}

//sqrft calaculation



//Material uni find

materialunitfind =(unit)=>{
  
  let parentnodes = unit.parentNode.parentNode.id;

  let inputs = document.getElementById(parentnodes);
    
  let  unit_of_sqrft  = inputs.getElementsByClassName('sqrft_copies')[0];
  let  unit_of_total  = inputs.getElementsByClassName('total')[0];

  let material_id = inputs.getElementsByClassName('material')[0];

  let material = material_id.options[material_id.selectedIndex].value;
          $.ajax({
    type:'get',
    url:"/api/material/"+material,
    dataType:'json',
    success:function(data){

       if(data.unit === 1){
            
            unit_of_sqrft.enabled = true;
            unit_of_sqrft.disabled = false;
       }
       else{
            unit_of_sqrft.disabled = true;
            unit_of_sqrft.enabled = false;


       }
    },
    error:function(){
    }
        });

}










//invoice entry

$('#invoicedata').on('submit',function(e){
  e.preventDefault();

  let invoiceproduct = [];


  $("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
    invoiceproduct.push({ 
       "description" : $(this).find('.description').val(),
       "material" :$(this).find('.material').val(),
       "sqrft_copies" : $(this).find('.sqrft_copies').val(),
       "total" : $(this).find('.total').val(),
       "qty" : $(this).find('.qty').val(),
       "price" : $(this).find('.price').val(),
       "netvalue" : $(this).find('.netvalue').val()
    });
  });


  let invoiceData = {
    'invoiceno': $('#invoiceno').val(),
    'date': $('#date').val(),
    'customer': $('#customer').val(),
    'sub_total': $('#sub_total').val(),
    'tax': $('#tax').val(),
    'tax_amount': $('#tax_amount').val(),
    'total_amount': $('#total_amount').val(),
    'invoiceproduct_datas':invoiceproduct  // ALL BILL DATA ARRAY
  }
  $.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
});
  $.ajax({
    type:"post",
    url:"/invoice-entery",
    data:invoiceData,
    success:function(response){
      response = JSON.parse(response);
      //console.log(response);
      //if saved
      if(response.status == 'success'){
        alert(response.message);
        window.location.replace("/invoice-entery");
      }else{
        alert(response.message);
      }
    },
    error:function(error){
       //  console.log(error)
      alert("Data Not Saved");
    }
  });
});




// $(document).ready(function(){

// $('#invoicedata').on('submit',function(e){
//   e.preventDefault();

//   let invoiceproduct = [];

//    $("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
//      invoiceproduct.push({
//        "description" = $(this).find('.description').val(),
//        "material" = $(this).find('.material').val(),
//        "sqrft_copies" = $(this).find('.sqrft_copies').val(),
//        "total" = $(this).find('.total').val(),
//        "qty" = $(this).find('.qty').val(),
//        "price" = $(this).find('.price').val(),
//        "netvalue" = $(this).find('.netvalue').val()
//      });

//    });

//   let invoiceData = {
//     'invoiceno': $('#invoiceno').val(),
//     'customer': $('#customer').val(),
//     'sub_total': $('#sub_total').val(),
//     'tax': $('#tax').val(),
//     'tax_amount': $('#tax_amount').val(),
//     'total_amount': $('#total_amount').val(),
//     'invoiceproduct_datas':salesproduct  // ALL BILL DATA ARRAY
//   }

//   $.ajax({
//     type:"post",
//     url:"/invoice-entery",
//     data:invoiceData,
//     success:function(response){
//       response = JSON.parse(response);
//       //console.log(response);
//       //if saved
//       if(response.status == 'success'){
//         alert(response.message);
//         window.location.replace("/invoiceData");
//       }else{
//         alert(response.message);
//       }
//     },
//     error:function(error){
//        //  console.log(error)
//       alert("Data Not Saved");
//     }
//   });

// });


// });