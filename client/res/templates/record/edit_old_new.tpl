<script type="text/javascript">
      var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 

if(first=='portal')
{
    
 $('div[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="createdBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="modifiedBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span .text-muted .message').addClass('myclass');
 $('.myclass a').removeAttr('href');
 
 $('span[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');
}
</script>

<script>
	$("input[name=pancardno]").change(function () {     
		 var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
		 var txtpan = $("input[name=pancardno]").val();
		//alert(txtpan);	
		var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

		if(regpan.test(txtpan)){
		   //alert("valid pan card number");
		} else {
			$.confirm({
						title: 'Warning!',
						content: 'Enter valid PAN Number',
							buttons: {
						Ok: function () {
							 $("input[name=pancardno]").val("");
							}
						}

					});
		   //alert("invalid pan card number");
		   //$("input[name=pancardno]").val("");
		}		
		

		});
		
		$("input[name=aadharno]").attr("onkeypress", "return event.charCode >= 48 && event.charCode <= 57");
		$("input[name=aadharno]").change(function () {
			var aadhar = $("input[name=aadharno]").val();
			var adharcardTwelveDigit = /^\d{12}$/;
	        var adharSixteenDigit = /^\d{16}$/;
	        if (aadhar != '') {
	            if (aadhar.match(adharcardTwelveDigit)) {
	                return true;
	            }
	            else {
					$.confirm({
						title: 'Warning!',
						content: 'Enter valid Aadhar Number',
							buttons: {
						Ok: function () {
							 $("input[name=aadharno]").val("");
							}
						}

					});
	               // alert("Enter valid Aadhar Number");
					//$("input[name=aadharno]").val("");
	                return false;
	            }
	        }
		});
		
		
		
		$(".phone-number").attr("onkeypress", "return event.charCode >= 48 && event.charCode <= 57");
		$(".phone-number").attr("maxlength", "10");
		$(".phone-number").change(function () {
			//alert("HI IN PHONE");
			var phoneNo= $(this).val();
			if(phoneNo.match('[0-9]{10}')){
				//alert(phoneNo);
			}else{
				$.confirm({
					title: 'Warning!',
					content: 'Please enter valid Mobile number',
						buttons: {
					Ok: function () {
						 $(".phone-number").val("");
						}
					}

				});
				//alert("Please enter valid Mobile number");
				//$(this).val("");
			}
			
		});
		
		$("input[type=email]").change(function () {
			var emailAdd = $(this).val();
			var emailPattern= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			//alert("Email= "+emailAdd);
			
			if(emailPattern.test(emailAdd)){
			}
			else{
				$.confirm({
					title: 'Warning!',
					content: 'Please enter valid email address',
						buttons: {
					Ok: function () {
						 $("input[type=email]").val("");
						}
					}

				});
				
				//alert("Invalid email address");
				//$(this).val("");
			}
		});
		
</script>

<script>
				var count20= 0;
				
                $("input[name=gstin]").on('change', function(){
					count20++;
                  var inputvalues = $(this).val();
                  var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
                  console.log(count20);
                  if (gstinformat.test(inputvalues)) {
                   return true;
                  } else {

              $.alert({
                  title: 'Warning!',
                  content: 'Please Enter Valid GSTIN Number',
              });
                      //$.alert('Please Enter Valid GSTIN Number');
                      $("input[name=gstin]").val('');
                      $("input[name=gstin]	").focus();
                  }
                  
              });
              </script>


<script>

   $(document).ready(function() {

//console.log(document.getElementsByClassName("cell"));


   $("input[name=rate]").keyup(function(){


        var rate=$("input[name=rate]").val();

        var quantity=$("input[name=quantity]").val();
        var total=rate * quantity;


        $("input[name=amount]").val(total);

});


   $("select[name=gST]").change(function(){


    var gstRate=$("select[name=gstRate]").val();
    var gST=$("select[name=gST]").val();
    var amount=$("input[name=amount]").val();


    if(gST=='IGST')
    {


        var igst=gstRate*amount/100;

         $("input[name=igst]").val(igst);

         var total=parseInt(igst) + parseInt(amount);
        $("input[name=total]").val(total);

    }
    else if(gST=='CGST/SGST')
    {
        var dividerate=gstRate/2;
        var csgst=dividerate*amount/100;
        $("input[name=cGST]").val(csgst);
        $("input[name=sGST]").val(csgst);

         var total=parseInt(csgst) + parseInt(csgst) + parseInt(amount);
        $("input[name=total]").val(total);

    }

});

var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

  if(first=='portal')
  {
        document.getElementsByClassName("cell")[1].style.display = "none"; 
       
  }
  else
  {
        document.getElementsByClassName("cell")[1].style.display = "block"; 
  }

count=0;
// $("input[name=dateStart]").on("change", function(){

// count++;
// var GivenDate = $("input[name=dateStart]").val();
// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();
// CurrentDate = dd + '/' + mm + '/' + yyyy;

// if(GivenDate < CurrentDate){
// if(count==3)
// { 
// $.confirm({
//         title: 'Warning!',
//         content: 'Please select future date',
//             buttons: {
//         Ok: function () {
//              $("input[name=dateStart]").val("");
//              delete(count);
//              count=0;
//             }
//         }

//     }); 

//     }
// }
// else
// {
//     if(count==3)
// { 

// delete(count);
// count=0;
// // $("input[name=dateEnd]").removeAttr('disabled');
// }
// }
// });

count1=0;
// $("input[name=dateEnd]").on("change", function(e){
// count1++;

// var GivenDate = $("input[name=dateStart]").val();
// var dateEnd = $("input[name=dateEnd]").val();
// //alert(count1);

// // if(count1==3){
// //     count1=2;
// // }

// if(count1==3){
//  if(GivenDate== ""){
     
//       var today = new Date();
//     var dd = String(today.getDate()).padStart(2, '0');
//     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
//     var yyyy = today.getFullYear();
//     CurrentDate = dd + '/' + mm + '/' + yyyy;
//     $("input[name=dateStart]").val(CurrentDate);
//     if(CurrentDate>dateEnd){
//         $.confirm({
//             title: 'Warning!',
//             content: 'Please select date greater than start date',
//                 buttons: {
//             Ok: function () {
     
//                  $("input[name=dateEnd]").val("");
//              // $("input[name=dateEnd]").attr('disabled', 'true');
//              delete(count1);
//                 count1=0;
//                 }
//             }
    
//         });
//     }
     
    
//   // alert("Please select start date first");
//   // $("input[name=dateEnd]").val("");
// }   
// }


// // if(GivenDate=='')
// // {
// // if(count1==3)
// // { 
// //     $.confirm({
// //         title: 'Warning!',
// //         content: 'Please select start date first',
// //             buttons: {
// //         Ok: function () {
 
// //              $("input[name=dateEnd]").val("");
// //           $("input[name=dateEnd]").attr('disabled', 'true');
            
// //             }
// //         }

// //     });
// //     }
// // }
// // else
// // {

// if(GivenDate > dateEnd){
// if(count1==3)
// { 
// $.confirm({
//         title: 'Warning!',
//         content: 'Please select date greater than start date',
//             buttons: {
//         Ok: function () {
 
//              $("input[name=dateEnd]").val("");
//              delete(count1);
//              count1=0;
            
//             }
//         }

//     });
//     }
// }
    

// else
//     {
//     if(count1==3)
// { 
//      delete(count1);
//              count1=0;
//              }
//     }
// //}

// });

count2=0;
// $("input[name=dateEnd-time]").on("blur", function(e){
// count2++;
// var GivenDate = $("input[name=dateStart]").val();
// var dateEnd = $("input[name=dateEnd]").val();

// var startTime = $("input[name=dateStart-time]").val();
// var endTime = $("input[name=dateEnd-time]").val();

// var jdt1=Date.parse('20 Aug 2000 '+startTime);
// var jdt2=Date.parse('20 Aug 2000 '+endTime);

// if(GivenDate == dateEnd && jdt1 >= jdt2){

// $.confirm({
//         title: 'Warning!',
//         content: 'Please select time greater than start time',
//             buttons: {
//         Ok: function () {
//              $("input[name=dateEnd-time]").val("");
//              delete(count2);
//              count2=0;
//             }
//         }

//     });

     
// }
// else
// {

//  delete(count2);
//              count2=0;
//              }

// });



count3=0;
// $("input[name=startDate]").on("change", function(e){
// count3++;
// var GivenDate = $("input[name=startDate]").val();

// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();
// CurrentDate = dd + '/' + mm + '/' + yyyy;

// //alert("CURRENT DATE= "+CurrentDate);
// if(GivenDate < CurrentDate){
// if(count3==3)
// {
// $.confirm({
//         title: 'Warning!',
//         content: 'Please select future date',
//             buttons: {
//         Ok: function () {
//              $("input[name=startDate]").val("");
//              delete(count3);
//              count3=0;
//             }
//         }

//     });
// }
     
// }
// else
// {
// if(count3==3)
// { 
// delete(count3);
//              count3=0;
             

//              }
//              }
// });

count4=0;
// $("input[name=endDate]").on("change", function(e){
// count4++;
// var GivenDate = $("input[name=startDate]").val();
// var dateEnd = $("input[name=endDate]").val();
// //alert("IN DAILY DATE");

// if(count4==3){
//  if(GivenDate== ""){
//      var today = new Date();
//     var dd = String(today.getDate()).padStart(2, '0');
//     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
//     var yyyy = today.getFullYear();
//     CurrentDate = dd + '/' + mm + '/' + yyyy;
//     $("input[name=startDate]").val(CurrentDate);
//      if(CurrentDate>dateEnd){
//         $.confirm({
//             title: 'Warning!',
//             content: 'Please select date greater than start date',
//                 buttons: {
//             Ok: function () {
     
//                  $("input[name=endDate]").val("");
//              // $("input[name=dateEnd]").attr('disabled', 'true');
                
//                 }
//             }
    
//         });    
//      }
     
    
//   // alert("Please select start date first");
//   // $("input[name=dateEnd]").val("");
// }   
// }

// if(GivenDate > dateEnd){
// if(count4==3)
// {
// $.confirm({
//         title: 'Warning!',
//         content: 'Please select date greater than start date',
//             buttons: {
//         Ok: function () {
//              $("input[name=endDate]").val("");
//              delete(count4);
//              count4=0;
//             }
//         }

//     });    
// }
// }
// else
// {
// if(count4==3)
// { 
//  delete(count4);
//              count4=0;
//              }
// }       

// });

count5=0;
$("input[name=weeklystartDate]").change(function(){
count5++;
var GivenDate = $("input[name=weeklystartDate]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;
//alert(CurrentDate);
if(GivenDate < CurrentDate){
if(count5++==3)
{
$.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=weeklystartDate]").val("");
             delete(count5);
             count5=0;
            }
        }

    });
}
}
else
{
if(count5==3)
{ 
delete(count5);
             count5=0;
             }
             }
});

count6=0;

$("input[name=weeklyendDate]").on("change", function(e){
count6++;
var GivenDate = $("input[name=weeklystartDate]").val();
var dateEnd = $("input[name=weeklyendDate]").val();

if(count6==3){
 if(GivenDate== ""){
     var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    CurrentDate = dd + '/' + mm + '/' + yyyy;
    $("input[name=weeklystartDate]").val(CurrentDate);
    
    if(CurrentDate>dateEnd){
       $.confirm({
        title: 'Warning!',
        content: 'Please select date greater than start date',
            buttons: {
        Ok: function () {
 
             $("input[name=weeklyendDate]").val("");
         // $("input[name=dateEnd]").attr('disabled', 'true');
            
            }
        }

    }); 
    }
     
    
   // alert("Please select start date first");
   // $("input[name=dateEnd]").val("");
}   
}

var oneDay = 24*60*60*1000;
var firstDate = new Date(GivenDate);
var secondDate = new Date(dateEnd);

var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));



if(GivenDate > dateEnd){
if(count6==3)
{
$.confirm({
        title: 'Warning!',
        content: 'Please select date greater than start date',
            buttons: {
        Ok: function () {
             $("input[name=weeklyendDate]").val("");
             delete(count6);
             count6=0;
            }
        }

    });

   }  
}
else if(diffDays < 7)
{
if(count6==3)
{
$.confirm({
        title: 'Warning!',
        content: 'Please select date at least after 1 week from start date',
            buttons: {
        Ok: function () {
             $("input[name=weeklyendDate]").val("");
             delete(count6);
             count6=0;
            }
        }

    });
  }
}
else
{
if(count6==3)
{ 
 delete(count6);
             count6=0;
             }
             }

});




count7=0;
$("input[name=monthlyStartDate]").change(function(){
count7++;
var GivenDate = $("input[name=monthlyStartDate]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
if(count7==3)
{
   $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=monthlyStartDate]").val("");
             delete(count7);
             count7=0;
            }
        }

    });
}
}
else
{
if(count7==3)
{ 
 delete(count7);
             count7=0;
             }
}
});

count8=0;
$("input[name=monthlyEndDate]").on("change", function(e){
count8++;
var GivenDate = $("input[name=monthlyStartDate]").val();
var dateEnd = $("input[name=monthlyEndDate]").val();

if(count8==3){
 if(GivenDate== ""){
     var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    CurrentDate = dd + '/' + mm + '/' + yyyy;
    $("input[name=monthlyStartDate]").val(CurrentDate);
    if(CurrentDate>dateEnd){
        $.confirm({
            title: 'Warning!',
            content: 'Please select date greater than start date',
                buttons: {
            Ok: function () {
     
                 $("input[name=monthlyEndDate]").val("");
             // $("input[name=dateEnd]").attr('disabled', 'true');
                
                }
            }
    
        });
    }
    
     $("input[name=monthlyStartDate]").val(CurrentDate);
    //  $.confirm({
    //     title: 'Warning!',
    //     content: 'Please select start date first',
    //         buttons: {
    //     Ok: function () {
 
    //          $("input[name=monthlyEndDate]").val("");
    //      // $("input[name=dateEnd]").attr('disabled', 'true');
            
    //         }
    //     }

    // });
    
   // alert("Please select start date first");
   // $("input[name=dateEnd]").val("");
}   
}


var oneDay = 24*60*60*1000;
var firstDate = new Date(GivenDate);
var secondDate = new Date(dateEnd);

var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));


if(GivenDate > dateEnd){
if(count8==3)
{
$.confirm({
        title: 'Warning!',
        content: 'Please select date greater than start date',
            buttons: {
        Ok: function () {
             $("input[name=monthlyEndDate]").val("");
             delete(count8);
             count8=0;
            }
        }

    });

}
     
}
else if(diffDays < 30)
{
if(count8==3)
{
$.confirm({
        title: 'Warning!',
        content: 'Please select date at least after 1 month from start date',
            buttons: {
        Ok: function () {
             $("input[name=monthlyEndDate]").val("");
             delete(count8);
              count8=0;
            }
        }

    });
}
}
else
{
if(count8==3)
{ 
delete(count8);
             count8=0;
             }
             }
});



count9=0;
$("input[name=customStartDate1]").change(function(){
count9++;
var GivenDate = $("input[name=customStartDate1]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
   if(count9==3)
   {
    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate1]").val("");
             delete(count9);
             count9=0;
            }
        }

    });
}
}
else
{
if(count9==3)
{ 
 delete(count9);
             count9=0;
             }
}
});

count10=0;

$("input[name=customStartDate2]").change(function(){
count10++;
var GivenDate = $("input[name=customStartDate2]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
   if(count10==3)
   {
    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate2]").val("");
             delete(count10);
             count10=0;
            }
        }

    });
}
}
else
{
if(count10==3)
{ 
delete(count10);
             count10=0;
             }
             }
});

count11=0;

$("input[name=customStartDate3]").change(function(){
count11++;
var GivenDate = $("input[name=customStartDate3]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
   if(count11==3)
   {
    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate3]").val("");
             delete(count11);
             count11=0;
            }
        }

    });
}
}
else
{
if(count11==3)
{ 
delete(count11);
             count11=0;
             }
             }
});

count12=0;
$("input[name=customStartDate4]").change(function(){
count12++;
var GivenDate = $("input[name=customStartDate4]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
   if(count12==3)
   {
    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate4]").val("");
             delete(count12);
             count12=0;
            }
        }

    });
}
}
else
{
if(count12==3)
{ 
 delete(count12);
             count12=0;
             }
}
});

count13=0;
$("input[name=customStartDate5]").change(function(){
count13++;
var GivenDate = $("input[name=customStartDate5]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
if(count13==3)
{
    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate5]").val("");
             delete(count13);
             count13=0;
            }
        }

    });
}
}
else
{
if(count13==3)
{ 
delete(count13);
             count13=0;
             }
             }
});

count14=0;
$("input[name=customStartDate6]").change(function(e){
count14++;
var GivenDate = $("input[name=customStartDate6]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

if(GivenDate < CurrentDate){
if(count14==3)
{
    

    $.confirm({
        title: 'Warning!',
        content: 'Please select future date',
            buttons: {
        Ok: function () {
             $("input[name=customStartDate6]").val("");
             delete(count14);
             count14=0;
            }
        }

    });
}
}
else
{
if(count14==3)
{ 
 delete(count14);
             count14=0;
             }
}
});
});
</script>

<div class="edit" id="{{id}}">


    {{#if buttonsTop}}
    <div class="detail-button-container button-container record-buttons clearfix">
        <div class="btn-group" role="group">
        {{#each buttonList}}{{button name scope=../../entityType label=label style=style html=html}}{{/each}}
        {{#if dropdownItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownItemList}}
            <li><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
            {{/each}}
        </ul>
        {{/if}}
        </div>
    </div>
    {{/if}}


    <div class="row">
        <div class="{{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-7{{else}} col-md-8{{/if}}{{/if}}">
            <div class="middle">{{{middle}}}</div>
            <div class="extra">{{{extra}}}</div>
            <div class="bottom">{{{bottom}}}</div>
        </div>
        <div class="side {{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-5{{else}} col-md-4{{/if}}{{/if}}">
        {{{side}}}
        </div>
    </div>


    {{#if buttonsBottom}}
    <div class="detail-button-container button-container record-buttons">
        <div class="btn-group" role="group">
        {{#each buttonList}}{{button name scope=../../entityType label=label style=style html=html}}{{/each}}
        {{#if dropdownItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownItemList}}

            <li><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
            {{/each}}
        </ul>
        {{/if}}
        </div>
    </div>
    {{/if}}
</div>

<script>

count=0;
$("input[name=closeDate]").on("change", function(){
count++;
var GivenDate = $("input[name=closeDate]").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

var stage=$("select[name=stage]").val();
;
if(GivenDate > CurrentDate && (stage=='Closed Won' || stage=='Closed Lost')){
if(count==3)
{ 
$.confirm({
        title: 'Warning!',
        content: 'You can not select future date',
     buttons: {
        Ok: function () {
             $("input[name=closeDate]").val("");
             delete(count);
             count=0;
            }
        }

    }); 

    }
}
else
{
    if(count==3)
{ 
delete(count);
count=0;
}
}
});

</script>
<script>
          var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 
$('input[name=customId]').blur(function(){
if(first=='portal')
{
}
else
{
    
    id=$('input[name=customId]').val();

    $.ajax({
    url: "../../client/res/templates/check_custom_id.php?id="+id,
    type: "post", 
    async: false,
    success: function(result)
    {
          if(result==1)
          {
             $.confirm({
        title: 'Warning!',
        content: 'Custom ID exist,please enter another one!',
            buttons: {
        Ok: function () {
            $('input[name=customId]').val("");
            }
        }

    });
          }      
               
    }

    });

}
});

</script>
