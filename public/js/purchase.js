//Invoice Entry Page
$(document).ready(function(){
    var i=1;
    let j =0;
    $("#add_rowpurchase").click(function(){
        b=i-1;
        
        let netvalueParent = "addr"+j;
        //console.log(netvalueParent)
        let _net = document.getElementById(netvalueParent);
        let netValue = _net.getElementsByClassName("netvalue")[0];
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
    $("#delete_rowpurchase").click(function(){
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

      // totalcgst.value -=cgst.value;
      // totalsgst.value -=sgst.value;
      sub_total.value -=netvalue.value;
      tax_amount.value -=rowtaxamountss.value;
      // tax.value -=cgst.value; 
      // tax.value -=sgst.value; 
      // tax_amount.value = sub_total.value/100*tax.value;
      grand_total.value = parseInt(sub_total.value) - parseInt(tax_amount.value);
      //console.log();
    $("#addr"+(i-1)).html('');
    i--;
    }
 

  });

  
  $('#tab_logic tbody').on('keyup change',function(){
    //calc();
  });






//supplier details append function

supplier_details=()=>{

      let supplier_id = document.getElementById("supplier");
      let supplier = supplier_id.options[supplier_id.selectedIndex].value;

      let gst = document.getElementById('gst');
      let phone = document.getElementById('phone');
      let address = document.getElementById('address');
      let state = document.getElementById('state');

        $.ajax({
    type:'get',
    url:"/api/supplier/"+supplier,
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


//invoice entry

$('#purchasedata').on('submit',function(e){
  e.preventDefault();

  let purchaseproduct = [];


  $("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
    purchaseproduct.push({ 
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


  let purchaseData = {
    'invoiceno': $('#invoiceno').val(),
    'date': $('#date').val(),
    'supplier': $('#supplier').val(),
    'sub_total': $('#sub_total').val(),
    // 'totalcgst': $('#totalcgst').val(),
    // 'totalsgst': $('#totalsgst').val(),
    // 'tax': $('#tax').val(),
    'tax_amount': $('#tax_amount').val(),
    'grand_total': $('#grand_total').val(),
    'purchaseproduct_datas':purchaseproduct  // ALL BILL DATA ARRAY
  }
  $.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
});
  $.ajax({
    type:"post",
    url:"/purchase-entery",
    data:purchaseData,
    success:function(response){
      response = JSON.parse(response);
      //console.log(response);
      //if saved
      if(response.status == 'success'){
        alert(response.message);
        window.location.replace("/purchase-entery");
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