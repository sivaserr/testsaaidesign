//Invoice Entry Page
$(document).ready(function(){
    var i=1;
    let j =0;
    $("#add_row").click(function(){
        b=i-1;
        
        let netvalueParent = "addr"+j;
        //console.log(netvalueParent)
        let net = document.getElementById(netvalueParent);
        let netValue = net.getElementsByClassName("netvalue")[0];
         if(netValue){
           if(netValue.value !== ''){
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++; 
            j++;  
          }else{
            alert("Field required");
          } 
        }else{
          $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++; 
            j++;
        }
        
        

    });
    $("#delete_row").click(function(){
      if(i>1){

      let icalc = i-1;
      let doc= document.getElementById("addr"+icalc);
      let netvalue = doc.getElementsByClassName('netvalue')[0];
      let cgst = doc.getElementsByClassName('cgst')[0];
      let sgst = doc.getElementsByClassName('sgst')[0];
      let totalcgst = document.getElementById('totalcgst');
      let totalsgst = document.getElementById('totalsgst');
      let rowtaxamountss = document.getElementById('rowtaxamount');
      let sub_total = document.getElementById('sub_total');
      let tax = document.getElementById('tax');
      let tax_amount = document.getElementById('tax_amount');
      let grand_total = document.getElementById('grand_total');

      tax_amount.value -=rowtaxamountss.value;
      sub_total.value -=netvalue.value;
      // tax.value -=cgst.value; 
      // tax.value -=sgst.value; 
      // tax_amount.value = sub_total.value/100*tax.value;
      grand_total.value = parseInt(sub_total.value) - parseInt(tax_amount.value);
      console.log();
    $("#addr"+(i-1)).html('');
    i--;
    j--;
    }
 

  });

  
  $('#tab_logic tbody').on('keyup change',function(){
    //calc();
  });

  // $('#tax').on('keyup change',function(){
   
  //   let sub_total = document.getElementById('sub_total').value;
  //   let tax = document.getElementById('tax').value;
  //   let tax_amount = document.getElementById('tax_amount');
  //   let total_amount = document.getElementById('total_amount');

  //   let tax_sum = sub_total/100*tax; 
    
  //   tax_amount.value = tax_sum;

  //   total_amount.value = parseInt(sub_total) + parseInt(tax_sum)  ;

  // });
  



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

//  sqrft =(sqft)=>{
//   let parentnodes = sqft.parentNode.parentNode.id;

//   let inputs = document.getElementById(parentnodes);
//   let str = inputs.getElementsByClassName('size')[0].value;
//   let sqrfts = inputs.getElementsByClassName('sqrfts')[0];
//   let qty = inputs.getElementsByClassName('qty')[0].value;

//   var sqrft  = str.split('x');
//   var height = parseInt(sqrft[0]);
//   var width  = parseInt(sqrft[1]);

//   var size = height * width;
  
//   sqrfts.value = size;



// }

 copies =(copy)=>{
  let parentnodes = copy.parentNode.parentNode.id;

  let inputs = document.getElementById(parentnodes);
  let str = inputs.getElementsByClassName('size')[0].value;
  let units_id = inputs.getElementsByClassName('units_id')[0].value;


  let qty = inputs.getElementsByClassName('qty')[0].value;
  // let price = inputs.getElementsByClassName('price')[0].value;
  // let netvalue = inputs.getElementsByClassName('netvalue')[0];
  let size = inputs.getElementsByClassName('size')[0].value;
  // let sqrfts = inputs.getElementsByClassName('sqrfts')[0];
  let totals = inputs.getElementsByClassName('total')[0];


  var sqrft  = str.split('x');
  var height = parseInt(sqrft[0]);
  var width  = parseInt(sqrft[1]);
  
 

  // console.log(sqrfts*qty);

  if(size === '0'){

      let totals_sqrft = qty;
      totals.value =totals_sqrft ;
      // netvalue.value = totals_sqrft*price ;

  }else if(units_id === '3'){
    
    let totals_sqrft = qty;
    totals.value =totals_sqrft ;
  }else{
      var onesqrft= height * width;
      let totals_sqrft = onesqrft*qty
      totals.value = totals_sqrft;
      // netvalue.value = totals_sqrft*price ;
  }


  // //netvalue.value = qty*price ;
  // // console.log(netvalue.value);




  //   let totalsalesnetvalue = 0;

  //   let rownetvalue = document.getElementsByClassName('netvalue');
  //   let rowcgst= inputs.getElementsByClassName('cgst')[0].value;
  //   let sub_total = document.getElementById('sub_total');


  //   for (var i= 0; i<rownetvalue.length; i++){
  //       totalsalesnetvalue +=parseInt(rownetvalue[i].value);
  //      }

  //  console.log(rowcgst)
  //   sub_total.value = totalsalesnetvalue;



}

pricecalculation=(pri)=>{
  let parentnodes = pri.parentNode.parentNode.id;

  let priseinputs = document.getElementById(parentnodes);
  // let qty = inputs.getElementsByClassName('qty')[0].value;
  let price = priseinputs.getElementsByClassName('price')[0].value;
  let netvalue = priseinputs.getElementsByClassName('netvalue')[0];
  let rowtaxamount = priseinputs.getElementsByClassName('rowtaxamount')[0];
  // let size = inputs.getElementsByClassName('size')[0].value;
  // let sqrfts = inputs.getElementsByClassName('sqrfts')[0].value;
  let cgst = priseinputs.getElementsByClassName('cgst')[0].value;
  let sgst = priseinputs.getElementsByClassName('sgst')[0].value;
  let totals = priseinputs.getElementsByClassName('total')[0].value;

  let  tax  = parseFloat(cgst)+parseFloat(sgst);

  let  actual_amount= totals*price;
  let  rowtaxamounts= actual_amount/100*tax;
  
  netvalue.value = actual_amount;
  rowtaxamount.value = rowtaxamounts;




    let totalrownetvalue = 0;
    let totaltaxamount = 0;
    // let totalrowcgst = 0;
    // let totalrowsgst = 0;

    let rowntotaltaxamount = document.getElementsByClassName('rowtaxamount');
    let rownetvalue = document.getElementsByClassName('netvalue');
    let rowcgst = document.getElementsByClassName('cgst');
    let rowsgst = document.getElementsByClassName('sgst');
    let totalcgst = document.getElementById('totalcgst');
    let totalsgst = document.getElementById('totalsgst');
    let totaltax = document.getElementById('tax');
    let tax_amount = document.getElementById('tax_amount');
    let sub_total = document.getElementById('sub_total');
    let grand_total = document.getElementById('grand_total');


    for (var i= 0; i<rowntotaltaxamount.length; i++){
        totaltaxamount +=parseFloat(rowntotaltaxamount[i].value);

       }
    for (var i= 0; i<rownetvalue.length; i++){
        totalrownetvalue +=parseInt(rownetvalue[i].value);
       }
//     for (var i= 0; i<rowcgst.length; i++){
//         totalrowcgst +=Number(rowcgst[i].value);
//        }
//     for (var i= 0; i<rowsgst.length; i++){
//         totalrowsgst +=Number(rowsgst[i].value);
//        }
// // console.log(totalrowcgst);
//     totalcgst.value = totalrowcgst;
//     totalsgst.value = totalrowsgst;

//     let taxs = totalrowcgst+totalrowsgst
//     totaltax.value   = taxs;
//     let taxsamount = totalrownetvalue/100*taxs;
//     tax_amount.value = taxsamount;
    tax_amount.value = totaltaxamount;
    sub_total.value = totalrownetvalue;
    grand_total.value = totalrownetvalue + totaltaxamount;



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

customer_details=()=>{

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
    
  let  hsn  = inputs.getElementsByClassName('hsn')[0];
  let  units_id  = inputs.getElementsByClassName('units_id')[0];
  let  unit_of_sqrft  = inputs.getElementsByClassName('size')[0];
  let  unit_of_total  = inputs.getElementsByClassName('total')[0];
  let  cgst  = inputs.getElementsByClassName('cgst')[0];
  let  sgst  = inputs.getElementsByClassName('sgst')[0];

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
       }else if(data.unit === 3){
                    unit_of_sqrft.enabled = true;
            unit_of_sqrft.disabled = false;
       }
       else{
            unit_of_sqrft.disabled = true;
            unit_of_sqrft.enabled = false;


       }
      units_id.value = data.unit;
      hsn.value = data.hsn_code;
      cgst.value = data.cgst;
      sgst.value = data.sgst;
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
       "hsn" : $(this).find('.hsn').val(),
       "size" : $(this).find('.size').val(),
       "qty" : $(this).find('.qty').val(),
       "total" : $(this).find('.total').val(),
       "price" : $(this).find('.price').val(),
       "cgst" : $(this).find('.cgst').val(),
       "sgst" : $(this).find('.sgst').val(),
       "netvalue" : $(this).find('.netvalue').val(),
       "rowtaxamount": $('#rowtaxamount').val()
    });
  });


  let invoiceData = {
    'invoiceno': $('#invoiceno').val(),
    'date': $('#date').val(),
    'customer': $('#customer').val(),
    'sub_total': $('#sub_total').val(),
    // 'totalcgst': $('#totalcgst').val(),
    // 'totalsgst': $('#totalsgst').val(),
    // 'tax': $('#tax').val(),
    'tax_amount': $('#tax_amount').val(),
    'grand_total': $('#grand_total').val(),
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



//print function

$('#print').click(function(){
  $('.printcontent').printThis({
        debug: false,               // show the iframe for debugging
        importCSS: true,            // import parent page css
        importStyle: true,         // import style tags
        printContainer: true,       // print outer container/$.selector
        loadCSS: "",                // path to additional css file - use an array [] for multiple
        pageTitle: "",              // add title to print page
        removeInline: false,        // remove inline styles from print elements
        removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
        printDelay: 100,            // variable print delay
        header: null,               // prefix to html
        footer: null,               // postfix to html
        base: false,                // preserve the BASE tag or accept a string for the URL
        formValues: true,           // preserve input/form values
        canvas: false,              // copy canvas content
        doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
        removeScripts: false,       // remove script tags from print content
        copyTagClasses: false,      // copy classes from the html & body tag
        beforePrintEvent: null,     // callback function for printEvent in iframe
        beforePrint: null,          // function called before iframe is filled
        afterPrint: true      

  });
});





$(function () {

    var specialElementHandlers = {
        '#editor': function (element,renderer) {
            return true;
        }
    };
 $('#pdf').click(function () {
        var doc = new jsPDF('p','pt', 'a4', true);
        doc.fromHTML(
            $('#target').html(), 15, 15, 
            { 'width': 170, 'elementHandlers': specialElementHandlers }, 
            function(){ doc.save('sample-file.pdf'); }
        );

    });  
});





});