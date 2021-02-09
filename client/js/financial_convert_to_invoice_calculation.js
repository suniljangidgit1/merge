// New Create Estimate Form Script
$(".convert_invoice_select_account").customA11ySelect();
$("#convert_datepicker").datepicker({ 
    autoclose: true, 
    todayHighlight: true
}).datepicker('update', new Date());

/* Variables */
var p = $("#convert_participants").val();
var row = $(".convert_participantRow");

var convert_items_add_row = '<tr class="main-group" style="border-top: 2px solid #ddd;"><td><input type="checkbox" class="checkbox sub_checkbox" onchange="Convert_count_of_selected_checkboxes(this,document.getElementById('+"'convert_check_sub_checkboxes_cnt'"+').value)"></td><td class="sno"><span>1</span></td><td><input name="convert_item_descr[]" id="" type="text" value="" class="form-control item_descr"></td><td><input name="convert_item_hsn[]" id="" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="convert_item_qty[]" id="" type="text" value="" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="convert_item_rate[]" id="" type="text" value="" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input type="text" class="convert_invoice_main_amount form-control" name="convert_item_convert_invoice_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><!--<button class="btn btn-danger remove"type="button">Remove</button>--><span class="material-icons-outlined convert_invoice_remove">delete_outline</span></td></tr><script>var q = 0;</script><tr><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount(At item level)</span></td><td class="width_15 discount_section"><select name="convert_item_discount_type[]" id="" class="convert_invoiceEstimate_Percentage form-control"><option value="">Select Type</option><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select></td><td class="width_10"><input name="convert_item_discount_rate[]" id="" type="text" value="" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td class="width_15"><span class="convert_invoice_main_amount">₹ 0000.00 <input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0" /></span></td><td class="width_10"><span class="material-icons-outlined convert_invoice_remove_discount" style="display: none;">delete_outline</span></td></tr><tr class="CGST_TR_section"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+GST(At item level)</span></td><td class="width_15 GST_section"><select name="convert_item_gst_type[]" id="" class="convert_invoice_IGSTandCGST common_convert_invoice_IGSTandCGST form-control"><option value="">Select Type</option><option value="IGST">IGST</option><option value="CGST">CGST</option></select></td><td class="width_10 rate_data"><select name="convert_item_gst_discont[]" id="" class="DiscountPer form-control"><option value="0">0%</option><option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option><option value="12">12%</option><option value="18">18%</option><option value="28">28%</option></select><input type="hidden" class="item_igst_amount" name="convert_item_igst_amount[]" value="0" /><input type="hidden" class="item_cgst_amount" name="convert_item_cgst_amount[]" value="0" /><input type="hidden" class="item_sgst_amount" name="convert_item_sgst_amount[]" value="0" /></td><td class="width_15"><span class="convert_invoice_main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined convert_invoice_remove_adddiscount" style="display: none;">delete_outline</span></td></tr><tr id="" class="SGST_Discount" style="display: none;"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span></td><td class="width_15"><input name="SGST" value="SGST" class="SGST form-control"type="text"></td><td class="width_10 rate_data"><!--<select name="convert_item_sgst_discount[]" id="" class="DiscountPer form-control"><option value="">None</option><option value="18%">18%</option><option value="19%">19%</option></select>--></td><td class="width_15"><span class="convert_invoice_main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined convert_invoice_remove_adddiscount">delete_outline</span></td></tr>';

/* Functions */
function getP_convert() {
    p = $("#convert_participants").val();
}

function addRow_convert() {
    $('#convert_ToInvoiceModal .convert_participantRow').append(convert_items_add_row);
}

function removeRow(button) {
    button.closest("tr").remove();
}

/* Doc ready */
$(document).on('click', "#convert_Invoice_add", function (event) {

    event.preventDefault();
    event.stopImmediatePropagation();
    
    // getP_convert();
    //if ($("#convert_invoice_convert_participantTable tr").length < 17) {
        addRow_convert();
        var i = Number(p) + 1;
        $("#convert_participants").val(i);
        
        var convert_total_items = $("#convert_total_items").val();
        convert_total_items = parseInt(convert_total_items) + 1;
        $("#convert_total_items").val(convert_total_items);

        $("#convert_ToInvoiceModal .convert_invoiceEstimate_Percentage").customA11ySelect();
        $("#convert_ToInvoiceModal .convert_invoice_IGSTandCGST").customA11ySelect();
        $("#convert_ToInvoiceModal .Calculate_IGSTandCGST").customA11ySelect();
        $("#convert_ToInvoiceModal .BillingFrom_address").customA11ySelect();
        $("#convert_ToInvoiceModal .BillingFrom_gst").customA11ySelect();
        $("#convert_ToInvoiceModal .BillingTo_address").customA11ySelect();
        $("#convert_ToInvoiceModal .BillingTo_gst").customA11ySelect();
        $("#convert_ToInvoiceModal .DiscountPer").customA11ySelect();
        // $("#convert_ToInvoiceModal .discount_section").customA11ySelect();

        var element=$("#convert_total_items").val();

        $(".convert_participantRow .sno").html("");

        for(var g=0;g<element;g++)
        {
            var s=g+1;
            $(".convert_participantRow .main-group").eq(g).find(".sno").html(s);
        }

        // $(".convert_participantRow .main-group:last").next().next().next().find(".DiscountPer").customA11ySelect();

        var items_selected_gst = $(".convert_participantRow .main-group:first").next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(items_selected_gst!="Select Type" || items_selected_gst!=""){
            $("#convert_ToInvoiceModal .convert_participantRow ").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text(items_selected_gst);
            $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").show();

            if(items_selected_gst === 'CGST'){
                $("#convert_ToInvoiceModal .convert_participantRow .SGST_Discount").show();
            }
            else {
                $("#convert_ToInvoiceModal .convert_participantRow .SGST_Discount").hide();
            }
        }
        
        if(items_selected_gst =="Select Type")
        {
            $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").hide();

        }

        // Disabled item level GST fields if selected billing entity has not GST
        if($("#convert_invoice_BillFromAddress_street #edit_billingaddressgstin").val()!="" && $("#edit_invoice_BillFromAddress_street #edit_billingaddressgstin").val()==0)
        {
            $("#convert_invoice_convert_participantTable .convert_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

            $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $("#convert_invoice_convert_participantTable .convert_participantRow .GST_section").closest("tr").find(" .convert_invoice_remove_adddiscount").css("display","none");

            $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "opacity":"1", "cursor":"not-allowed","pointer-events":"none"});
        }
    //}
    // $(this).closest("tr").appendTo("#convert_ToInvoiceModal .convert_participantRow");
    /*if ($("#convert_ToInvoiceModal .convert_participantRow tr").length === 2) {
        $("#convert_ToInvoiceModal .convert_invoice_remove").hide();
    } else {
        $("#convert_ToInvoiceModal .convert_invoice_remove").show();
    }*/
});

$(document).on("change", "#convert_participants", function () {
    var i = 0;
    p = $("#convert_participants").val();
    var rowCount = $(".convert_participantRow tr").length - 2;
    if (p > rowCount) {
        for (i = rowCount; i < p; i += 1) {
            addRow();
        }
        $("#convert_invoice_convert_participantTable #invoice_convert_addButtonRow").appendTo(".convert_participantRow");
    } else if (p < rowCount) {}
});

//FOR Serial Number- use ON 
$(document).on("click", ".convert_Invoice_add, .convert_invoice_remove", function(){
    $("#convert_invoice_convert_participantTable td.sno").each(function(index,element){                 
        $(element).text(index + 1);
    });
});

$(document).on("click", "#convert_invoiceDiffBillingEntity", function(){
    $(".BillingFrom_address_and_gst").show();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFrom_gst_main").hide();
    $("#convert_invoice_billfromname").remove();
    $("#convert_convert_invoice_BillingFromAddress").hide();
    $("#convert_invoice_BillingFromAddress_convert").show();
    $("#BillingFrom_address_and_gst_convert").show();
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_billing_entities.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {  
                $(".BillingFrom_address_main").show();
                if(data.total_num == 1){
                    $(".convert_invoice_BillingFromAddress").show();
                    $("#convert_invoice_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#convert_BillFromAddress_address").html("<span>"+data.address+"</span>");

                    if(data.emailid!="" && data.phoneno!=""){
                        $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                    }

                    $("#convert_BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#convert_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#convert_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".convert_invoice_BillingFromAddress").hide();
                    $(".BillingFrom_address_and_gst").show();
                    $("#convert_BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $("#convert_BillingFrom_addr").customA11ySelect('refresh');

                    $("#convert_invoice_billfromname, #convert_billing_address_street, #convert_billing_address_city, #convert_billing_address_state, #convert_billing_address_postal_code, #convert_billingaddressgstin, #convert_billingaddresspanno, #convert_billingemailaddress, #convert_billingphoneno, #convert_billingfrom_udyamno").remove();
                }
                else{
                    $(".convert_invoice_BillingFromAddress").show();
                }
            }
        }
    });
    $(".convert_invoice_BillingFromAddress").hide();
 });

$(document).on("click", ".convertDiffcustomer", function(){
    $(".BillingTo_address_and_gst").show();
    $(".BillingToGSTDetails").hide();
    $(".BillingTo_gst_main").hide();
    $("#convert_billtoname").remove();
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_accounts.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
           if(data)
           {  
                $(".BillingTo_address_main").show();
                if(data.total_num == 1)
                {
                    $(".convert_invoice_BillingFromAddress").show();
                    $("#convert_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#convert_BillToAddress_address").html("<span>"+data.address+"</span>");
                    $("#convert_BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#convert_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#convert_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#convert_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#convert_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".convert_BillingTo_address_main select").append(data.str_opt);
                    $("#convert_BillingTo_addr").customA11ySelect('refresh');
                }
                else{
                    $(".BillingToAddress").show();
                }
            }
        }
    });
    $(".BillingToAddress").hide();
});

$(document).on("click", ".estimateDiffcustomergst", function(){
    $(".BillingTo_address_and_gst").show();
    $(".BillingToGSTDetails").hide();
    $(".BillingTo_gst_main").hide();
    $("#convert_billtoname").remove();
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_accounts.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
           if(data)
           {  
                $(".BillingTo_address_main").show();
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".BillingToAddress").remove();
                        $(".BillingTo_address_main").hide();
                        $(".BillingTo_address_and_gst").show();
                        $(".BillingTo_gst_main").show();
                        $(".BillingToGSTDetails_dropdown").show();
                        
                        $(".BillingToAddress").hide();
                        $(".BillingTo_address_gst").show();
                        
                        $(".BillingToGSTDetails").hide();
                        $("#edit_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#convert_BillingTo_gstno").append(data.str_opt);
                        $("#convert_BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#convert_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#convert_BillToAddress_address").html("<span>"+data.address+"</span>");
                        $("#convert_BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                        $("#convert_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#convert_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        $("#convert_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#convert_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $("#convert_BillingTo_addr").customA11ySelect('refresh');

                    $("#convert_billtoname, #convert_shipping_address_street, #convert_shipping_address_city, #convert_shipping_address_state, #convert_shipping_address_postal_code, #convert_shippingaddressgstin, #convert_shippingaddresspanno, #convert_shippingaddressemailid, #convert_shippingaddresshphoneno, #convert_billingto_udyamno").remove();
                }
                else{
                    $(".BillingToAddress").show();
                }
            }
        }
    });
    $(".BillingToAddress").hide();
});

$(document).on("click", "#create_estimate", function(){
    $(".convert_invoice_convert_invoice_BillingFromAddress").show();
    $(".BillingFrom_address_and_gst").hide();
    $(".convert_invoice_BillingFromAddress").hide();

    $(".BillingToCard").show();
    $(".BillingTo_address_and_gst").hide();
    $(".BillingToAddress").hide();
});

$(document).on('change','#convert_invoice_convert_participantTable .convert_invoice_IGSTandCGST',function(e){
    e.preventDefault();
    e.stopImmediatePropagation();

   // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var current=$(this).closest(".convert_participantRow");
    
    var a=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // for CGST
    var current1=current.find(".rate_data");
    var cgst_rate_id=current.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".rate_data .custom-a11yselect-menu li:first button").text();

    var cur_data_val=$(this).closest(".GST_section").find(".custom-a11yselect-selected").attr('data-val');
    var cur_val_id=$(this).closest(".GST_section").find(".custom-a11yselect-selected").attr('id');

    var except_cur = $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section").not(this);
    except_cur.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text('');
    except_cur.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text(a);
    except_cur.find(".GST_section .custom-a11yselect-btn").attr('aria-activedescendant',cur_val_id);
    except_cur.find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option[data-val='"+cur_data_val+"']").addClass('custom-a11yselect-selected custom-a11yselect-focused');

    if(a=="Select Type")
    {
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").css("display","none");
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section").next().hide();

        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        // ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $('#convert_ToInvoiceModal .CGST_TR_section .main_amount').text('');
        $('#convert_ToInvoiceModal .CGST_TR_section .main_amount').text('₹ 0000.00');
        $('#convert_ToInvoiceModal .CGST_TR_section').next().find('.convert_invoice_main_amount').text('');
        $('#convert_ToInvoiceModal .CGST_TR_section').next().find('.convert_invoice_main_amount').text('₹ 0000.00');

        $("#convert_invoice_Calculate_discounts .CGST_TR_section").show();
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").next().hide();

        cleared_convertTOInvoice_estimate_level_gst_details();
    }
    else if(a=='IGST')
    {
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").css("display","inline-block");
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section").next().hide();
        $('#convert_ToInvoiceModal .CGST_TR_section').next().find('.convert_invoice_main_amount').text('');
        $('#convert_ToInvoiceModal .CGST_TR_section').next().find('.convert_invoice_main_amount').text('₹ 0000.00');

        $("#convert_invoice_Calculate_discounts .CGST_TR_section").hide();
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").next().hide();
        // ResetDiscount(current2,sgst_rate_id,sgst_rate_text);
    }
    else if(a=='CGST')
    {   
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").css("display","inline-block");
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section").next().find(".convert_invoice_remove_adddiscount").css("display","inline-block");
        $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section").next().show();

        $("#convert_invoice_Calculate_discounts .CGST_TR_section").hide();
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").next().hide();
    }
    calculate_estimate_level_discount_convert();
    for_hiding_convert_to_invoice_estimate_level_GST();
    convert_to_invoice_remove_panel_color();
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert(this);
});

//  checkbox section
$(document).on('click','#convert_invoice_convert_participantTable .header_checkbox',function(){
    if($(this).prop("checked") == true){
        $("#convert_invoice_convert_participantTable .sub_checkbox").prop("checked",true);
        $("#convert_invoice_convert_participantTable .header_delete").css("display","inline-block");
        $("#convert_check_sub_checkboxes_cnt").val($("#convert_total_items").val());
    }
    else if($(this).prop("checked") == false){
        $("#convert_invoice_convert_participantTable .sub_checkbox").prop("checked",false);
        $("#convert_invoice_convert_participantTable .header_delete").css("display","none");

        $("#convert_check_sub_checkboxes_cnt").val(0);

    }       
});
$(document).on('click','#convert_invoice_convert_participantTable .sub_checkbox',function(){
    var ele=$(this).closest("#convert_invoice_convert_participantTable .convert_participantRow");
    var length=ele.find(".main-group .sub_checkbox:checked").length;
    if(length>=1)
    {
        $("#convert_invoice_convert_participantTable .header_delete").css("display","inline-block");
    }
    else
    {
        $("#convert_invoice_convert_participantTable .header_delete").css("display","none");
        $("#convert_invoice_convert_participantTable .header_checkbox").prop("checked",false); //new change
    }
});


 function Convert_count_of_selected_checkboxes(ele,n)
  {
    var nn = parseInt(n);
    var no = '';
    var $el = $(ele);
    if ($el.prop('checked')) {
        no = nn + 1; 
      $('#convert_check_sub_checkboxes_cnt').val(no);
    } else {
         no = nn - 1;
      $('#convert_check_sub_checkboxes_cnt').val(no);
    }
    // return no;
 }



$(document).on("click","#convert_invoice_convert_participantTable .header_delete",function(){
    var r=$(".convert_participantRow .main-group .sub_checkbox:checked").closest("tr");

    var sub_checkbox_len= $("#convert_check_sub_checkboxes_cnt").val();


    var deleted_row_val = $(".convert_participantRow .main-group .sub_checkbox:checked").closest("tr").find('.convert_invoice_main_amount').val();

    // console.log("Sub checkbox length = > "+r.length);

    r.next().next().remove();
    r.next().next().remove();
    r.next().next().remove();
    r.remove();
    
    // ================ Total number of rows reduces ================
    var total_rows = $("#convert_total_items").val();
    var new_row_count = total_rows - sub_checkbox_len;
    $("#convert_total_items").val(new_row_count);
    $("#convert_check_sub_checkboxes_cnt").val(0);

    // ================ Total number of rows reduces ================
    
   
    
    var current=$("#convert_check_sub_checkboxes_cnt").val();
    // var element=$(".convert_participantRow .main-group").length;
    var element=$("#convert_total_items").val();

    // console.log("After deleting Main Group length = > "+element);
    
    if(current==0)
    {
        $("#convert_invoice_convert_participantTable .header_delete").css("display","none");
    }
    
    $(".convert_participantRow .sno").html("");

    for(var g=0;g<element;g++)
    {
        var s=g+1;
        $(".convert_participantRow .main-group").eq(g).find(".sno").html(s);
    }
    
    if(element==0)
    {
        $('.convert_participantRow').append(convert_items_add_row);
        cleared_convertTOInvoice_estimate_level_gst_details();
        cleared_convertTOInvoice_estimate_level_discount_details();
        $("#convert_ToInvoiceModal .convert_invoiceEstimate_Percentage").customA11ySelect();
        $("#convert_invoice_convert_participantTable .convert_invoice_IGSTandCGST").customA11ySelect();
        $("#convert_ToInvoiceModal .DiscountPer").customA11ySelect();

        $('#convert_total_items').val(1);


    }
    $("#convert_invoice_convert_participantTable .header_checkbox").prop("checked",false); // new change

    if(deleted_row_val){
        var l = parseFloat($("#convert_total_estimate_value").val()) - parseFloat(deleted_row_val);
    }
    else{
        var l = parseFloat($("#convert_total_estimate_value").val());
    }
    calculate_estimate_level_discount_convert(l);
    $("#convert_total_estimate_value").val(0);
    $("#convert_total_estimate_value").val(l);


    for_hiding_convert_to_invoice_estimate_level_percentage();
    for_hiding_convert_to_invoice_estimate_level_GST();
    convert_to_invoice_remove_panel_color();

});

// validation for rate
$(document).on('keyup', ".convert_participantRow .rate", function(event) 
{
    event.preventDefault();
    event.stopImmediatePropagation();
    // console.log("ehehehe");
    var cur_html=$(this);
    var cur_rate_val = $(this).val();
    var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    // if(current=='Percentage')
    // {
    //     convert_Percentage_validation(cur_html,cur_rate_val);
    // }
    // else if(current=='Amount')
    // {
    //     var main_amt = cur_html.closest('tr').prev().find('.convert_invoice_main_amount').val();
    //     convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
    // }
    
    var main_amt = cur_html.closest('tr').prev().prev().find('.convert_invoice_main_amount').val();

    var convert_count = 0;
    var convert_count1 = 0;

    if(main_amt != '')
    {
        // console.log("not Empty Amount ");

        cur_html.closest("tr").prev().prev().find(".convert_invoice_main_amount").closest("td").find(".err").remove();
        cur_html.closest("tr").prev().prev().find(".convert_invoice_main_amount").removeAttr('style');

            // if(current=='Percentage')
            // {
            //     convert_Percentage_validation(cur_html,cur_rate_val);
            // }
            // else if(current=='Amount')
            // {
            //     convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
            // }

            if(current=='Percentage')
            {
                if(convert_count == 0)
                {
                    convert_count = convert_Percentage_validation(cur_html,cur_rate_val,convert_count);
                }
            }
            else if(current=='Amount')
            {
                if(convert_count1 == 0)
                {

                    convert_count1 = convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt),convert_count1);
                }
            }
    }
    else
    {
        // console.log("Empty Amount ");
        cur_html.closest("tr").prev().prev().find(".convert_invoice_main_amount").closest("td").append('<span class="err text-danger">Please enter amount</span>');
        cur_html.closest("tr").prev().prev().find(".convert_invoice_main_amount").css('border-color', 'rgb(173, 72, 70)');
        cur_html.val("");
        cur_html.closest("tr").prev().prev().find(".convert_invoice_main_amount").focus();
        // $.alert({
        //         title: 'Alert!',
        //         content: 'Please enter Main Amount',
        //         type: 'dark',
        //         typeAnimated: true,
        //         buttons: {
        //             ok: function() { 
        //                 cur_html.val("");
        //                 convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
        //                 // cur_html.closest("tr").prev().find(".main_amount").focus();
        //                 // cur_html.blur();
        //             }
        //         }
        //  });

    }

    cal_estimate_level_amts_convert(this);

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }

});

$(document).on('keyup', "#convert_invoice_Calculate_discounts .rate", function(event) 
{
    event.preventDefault();
    event.stopImmediatePropagation();
    var cur_html=$(this);
    var cur_rate_val = $(this).val();
    var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    // if(current=='Percentage')
    // {
    //     convert_Percentage_validation(cur_html,cur_rate_val);
    // }
    // else if(current=='Amount')
    // {
    //     var main_amt = cur_html.closest('tr').prev().prev().find('.convert_invoice_main_amount').val();
    //     convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
    // }


    // var main_amt = cur_html.closest('tr').prev().prev().find('.convert_invoice_main_amount').val();
    var main_amt = $("#convert_total_estimate_value").val();

    var convert_count = 0;
    var convert_count1 = 0;

    if(main_amt != '')
    {
        // console.log("not Empty Amount ");

            // if(current=='Percentage')
            // {
            //     convert_Percentage_validation(cur_html,cur_rate_val);
            // }
            // else if(current=='Amount')
            // {
            //     convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
            // }

            if(current=='Percentage')
            {
                if(convert_count == 0)
                {
                    // alert("hehehe");
                    convert_count = convert_Percentage_validation(cur_html,cur_rate_val,convert_count);
                }
            }
            else if(current=='Amount')
            {
                if(convert_count1 == 0)
                {

                    convert_count1 = convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt),convert_count1);
                }
            }

    }
    else
    {
        // console.log("Empty Amount ");
        $.alert({
                title: 'Alert!',
                content: 'Please enter Main Amount',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    ok: function() { 
                        cur_html.val("");
                        convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
                        // cur_html.closest("tr").prev().find(".main_amount").focus();
                        // cur_html.blur();
                    }
                }
         });

    }

});

$(document).on("keyup", "#convert_invoiceno", function(){
    $(this).removeAttr("style");
    $(this).closest("div").find(".err").remove("");
});

$(document).on("keyup", "input[name='convert_item_descr[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='convert_item_qty[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_rate").val('');
        $(this).closest("tr").find(".convert_invoice_main_amount").val('');
    }
});

$(document).on("keyup", "input[name='convert_item_rate[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='convert_item_convert_invoice_main_amount[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_qty").val('');
        $(this).closest("tr").find(".item_rate").val('');
    }
});

$(document).on("change", "#convert_BillingFrom_addr", function(){
    $("#convertEstimateForm #convert_invoice_convert_Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").removeAttr("style");
    $("#convertEstimateForm .BillingFrom_address_main").find(".err").remove();  
});

$(document).on("change", "#convert_BillingTo_addr", function(){
    $("#convertEstimateForm #convert_invoice_convert_Address_Details_BillTo").find(".convert_BillingTo_address_main .custom-a11yselect-btn").removeAttr("style");
    $("#convertEstimateForm .convert_BillingTo_address_main").find(".err").remove();  
});

// Validation for percentage greater than 100% or less than 0%
function convert_Percentage_validation(cur_html,cur_rate_val,count)
{
    // if (cur_rate_val!="" && cur_rate_val>100) {
    //     $.alert({
    //         title: 'Alert!',
    //         content: 'Maximum Discount % can be 100%.',
    //         type: 'dark',
    //         typeAnimated: true,
    //         buttons: {
    //             ok: function() { 
    //                 cur_html.val("");
    //                 convert_reset_percentage_validation(cur_html,cur_rate_val);
    //                 cur_html.focus();
    //             }
    //         }
    //     });
    // } 
    // else if (cur_rate_val!="" && cur_rate_val<0) {
    //     $.alert({
    //         title: 'Alert!',
    //         content: 'Minimum Discount % can be 0%.',
    //         type: 'dark',
    //         typeAnimated: true,
    //         buttons: {
    //             ok: function() {
    //                 cur_html.val("");
    //                 cur_html.focus();
    //             }
    //         }
    //     });
    // }


    if(count==0)
    {
       if (cur_rate_val!="" && cur_rate_val>100) {
            $.alert({
                title: 'Alert!',
                content: 'Maximum Discount % can be 100%.',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    ok: function() { 
                        cur_html.val("");
                        convert_reset_percentage_validation(cur_html,cur_rate_val);
                        cur_html.focus();
                    }
                }
            });
        } 
        else if (cur_rate_val!="" && cur_rate_val<0) {
            $.alert({
                title: 'Alert!',
                content: 'Minimum Discount % can be 0%.',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    ok: function() {
                        cur_html.val("");
                        cur_html.focus();
                    }
                }
            });
        }    

       count++;

    }
    
    return count;

}

// Validation for percentage greater than or less than item's amount
function convert_Amount_validation(cur_html,cur_rate_val,main_amt,count)
{
    // if (cur_rate_val!="" && cur_rate_val>main_amt) {
    //     if(main_amt!=0){
    //         $.alert({
    //             title: 'Alert!',
    //             content: 'Discount amount must be less than '+main_amt+'.',
    //             type: 'dark',
    //             typeAnimated: true,
    //             buttons: {
    //                 ok: function() { 
    //                     cur_html.val("");
    //                     convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
    //                     cur_html.focus();
    //                 }
    //             }
    //         });
    //     }
    //     else{
    //         $.alert({
    //             title: 'Alert!',
    //             content: 'You are not allowed to enter any amount.',
    //             type: 'dark',
    //             typeAnimated: true,
    //             buttons: {
    //                 ok: function() { 
    //                     cur_html.val("");
    //                     convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
    //                     cur_html.focus();
    //                 }
    //             }
    //         });
    //     }
    // } 
    // else if (cur_rate_val!="" && cur_rate_val<0) {
    //     $.alert({
    //         title: 'Alert!',
    //         content: 'Discount amount must be greater than '+main_amt+'.',
    //         type: 'dark',
    //         typeAnimated: true,
    //         buttons: {
    //             ok: function() {
    //                 cur_html.val("");
    //                 cur_html.focus();
    //             }
    //         }
    //     });
    // }


    if(count==0)
    {
       if (cur_rate_val!="" && cur_rate_val>main_amt) {
            if(main_amt!=0){
                $.alert({
                    title: 'Alert!',
                    content: 'Discount amount must be less than '+main_amt+'.',
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        ok: function() { 
                            cur_html.val("");
                            convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
                            cur_html.focus();
                        }
                    }
                });
            }
            else{
                $.alert({
                    title: 'Alert!',
                    content: 'You are not allowed to enter any amount.',
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        ok: function() { 
                            cur_html.val("");
                            convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
                            cur_html.focus();
                        }
                    }
                });
            }
        } 
        else if (cur_rate_val!="" && cur_rate_val<0) {
            $.alert({
                title: 'Alert!',
                content: 'Discount amount must be greater than '+main_amt+'.',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    ok: function() {
                        cur_html.val("");
                        cur_html.focus();
                    }
                }
            });
        }

       count++;

    }
    return count;

}

/*$(document).on("click", "#FinanceEstimateModal #convert_invoice_main_details .close", function(current){
    var modal_id=$(current).closest(".modal").find("form").attr("id");

    $("#"+modal_id)[0].reset();

    $(".convert_participantRow tr").remove();

    // ============ Code added by Sachin ============
    $("#convert_invoice_billfromname").remove();
    $("#convert_billtoname").remove();
    $("#convertEstimateForm .convert_invoice_convert_invoice_BillingFromAddress").removeAttr("style");
    $("#convertEstimateForm .BillingToCard").removeAttr("style");
    $("#convert_invoice_convert_Address_Details .BillingFrom_address_and_gst").hide();
    $("#convert_invoice_convert_Address_Details_BillTo .BillingTo_address_and_gst").hide();
    // ============ Code added by Sachin ============

    var element=$(".convert_participantRow .main-group").length;

    if(element==0)
    {
        $('.convert_participantRow').append(estimate_items_add);
        $(".convert_invoiceEstimate_Percentage,.convert_invoice_IGSTandCGST,.DiscountPer").customA11ySelect();
    }

    $("#convert_datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
    }).datepicker('update', new Date());

    // for discount
    var Calculate_discount_id=$("#convert_invoice_Calculate_discounts .discount_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_discount_text=$("#convert_invoice_Calculate_discounts .discount_section .custom-a11yselect-menu li:first button").text();

    var current_row=$("#convert_invoice_Calculate_discounts .discount_section");

    ResetDiscount(current_row,Calculate_discount_id,Calculate_discount_text);

    //  for gst

    var Calculate_gst_id=$("#convert_invoice_Calculate_discounts .GST_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_text=$("#convert_invoice_Calculate_discounts .GST_section .custom-a11yselect-menu li:first button").text();

    var current_gst_row=$("#convert_invoice_Calculate_discounts .GST_section ");

    ResetDiscount(current_gst_row,Calculate_gst_id,Calculate_gst_text);

    //  for gst rate

    var Calculate_gst_rate_id=$("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_rate_text=$("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first button").text();

    var current_gst_rate_row=$("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data ");

    ResetDiscount(current_gst_rate_row,Calculate_gst_rate_id,Calculate_gst_rate_text);

    // for sgst rate

    var Calculate_sgst_rate_id=$("#convert_invoice_Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$("#convert_invoice_Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$("#convert_invoice_Calculate_discounts .SGST_Discount .rate_data ");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);


    // for Bill from Select Billing Entity

    var Calculate_sgst_rate_id=$(".BillingFrom_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingFrom_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingFrom_address_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill from Select select GSTIN

    var Calculate_sgst_rate_id=$(".BillingFrom_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingFrom_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingFrom_gst_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select Customer

    var Calculate_sgst_rate_id=$(".BillingTo_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingTo_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingTo_address_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select select GSTIN

    var Calculate_sgst_rate_id=$(".BillingTo_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingTo_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingTo_gst_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    $("#convert_invoice_Calculate_discounts .SGST_Discount,#convert_invoice_Calculate_discounts .convert_invoice_remove_adddiscount,#convert_invoice_Calculate_discounts .convert_invoice_remove_discount").hide();
});*/

// convert_invoice_convert_invoice_BillingFromAddress Click event
$(document).on("click", "#convertEstimateForm .convert_invoice_convert_invoice_BillingFromAddress", function(){
    $(this).hide();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFromGSTDetails_dropdown").hide();
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_billing_entities.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        { 
            if(data)
            {
                $(".BillingFrom_address_main").show()  
                if(data.total_num == 1){
                    $(".convert_invoice_BillingFromAddress").show();
                    $("#convert_BillingTo_address_main").html("<span><b>"+data.name+"</b></span>");
                    $("#BillFromAddress_address").html("<span>"+data.address+"</span>");
                    $("#BillFromAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#BillFromAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingFrom_address_and_gst").show();
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $(".BillingFrom_address").customA11ySelect();
                    $(".convert_invoice_BillingFromAddress").hide();
                }
                else{
                    $(".convert_invoice_BillingFromAddress").show();
                }
            }
        }
    });
    $(".convert_invoice_BillingFromAddress").show();
});

// BillingToCard Click event
$(document).on("click", "#convertEstimateForm .BillingToCard", function(){
    $(this).hide();
    $(".BillingToGSTDetails").hide();
    $(".BillingToGSTDetails_dropdown").hide();
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_accounts.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {  
                $(".BillingTo_address_main").show();
                $(".BillingTo_address_and_gst").show();
                $(".BillingTo_address_main select").append(data.str_opt);
                $(".BillingTo_address").customA11ySelect();
                $(".BillingToAddress").hide();
            }
        }
    });
    $(".BillingToAddress").show();
});

// Scripts for Billed from
$(document).on("change", "#convert_BillingFrom_addr", function(){
    var sel_id = $('#convert_BillingFrom_addr option:selected').data('id');
    $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/financial_changes/get_all_billing_entities_gst.php?entity_id='"+sel_id+"'",
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data)
         {  
            $(".BillingFrom_gst_main").find(".err").remove();
            if(data.total_gst == 1)
            {
                $("#convert_convert_invoice_BillingFromAddress").remove();
                $(".BillingFrom_address_main").hide();
                $(".BillingFrom_gst_main").hide();
                $(".convert_invoice_BillingFromAddress").show();
                // $(".convert_diff_billing_entity").show();
                
                var checkAnchorLink = $(".convert_diff_billing_entity").length;
                if( checkAnchorLink > 2 ){
                    $(".convert_diff_billing_entity").first().remove();
                }

                $("#convert_invoice_convert_BillingTo_address_main").html("<span><b>"+data.name+"</b></span>");
                $("#convert_invoice_BillFromAddress_street").html("<span>"+data.address+"</span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#convert_invoice_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                if(data.gst_num){
                    $("#convert_BillFromAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                    // Enabled item level GST fields
                    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                    // Enabled invoice level GST fields
                    $("#convert_ToInvoiceModal #convert_invoice_Calculate_discounts .CGST_TR_section").next().show();

                    $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");
                }
                else
                {
                    convert_invoice_disabled_all_gst_fields();
                }

                if(data.panno){
                    $("#convert_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }
                if(data.udyam_registration_no){
                    $("#convert_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#convert_bill_id").remove();

                // Hidden fields to post the data
                $("#convert_invoice_BillFromAddress_name").append("<input type='hidden' name='billfromname' id='convert_invoice_billfromname' value='"+data.name+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='bill_id' id='convert_bill_id' value='"+data.billing_entity_id+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billing_address_street' id='convert_billing_address_street' value='"+data.street+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billing_address_city' id='convert_billing_address_city' value='"+data.city+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billing_address_state' id='convert_billing_address_state' value='"+data.state+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billing_address_postal_code' id='convert_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billingaddressgstin' id='convert_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billingaddresspanno' id='convert_billingaddresspanno' value='"+data.panno+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billingemailaddress' id='convert_billingemailaddress' value='"+data.emailid+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billingphoneno' id='convert_billingphoneno' value='"+data.phoneno+"' />");
                $("#convert_invoice_BillFromAddress_street").append("<input type='hidden' name='billingfrom_udyamno' id='convert_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");

                get_all_banks_details_convert(data.billing_entity_id);
            }
            else if(data.total_gst > 1)
            {
                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails_dropdown").show();
                $(".BillingFromGSTDetails").hide();
                $("#convert_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#convert_BillingFrom_gstno").append(data.str_opt);
                $("#convert_BillingFrom_gstno").customA11ySelect('refresh');
            }
            else
            {
                $(".BillingFrom_gst_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $(".BillingFromGSTDetails").hide();
                $("#convert_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#convert_BillingFrom_gstno").customA11ySelect('refresh');
            }
         }
         else
         {
            $(".BillingFrom_gst_main").hide();
            $(".BillingFromGSTDetails_dropdown").hide();
            $(".BillingFromGSTDetails").hide();
            $("#convert_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
            $("#convert_BillingFrom_gstno-menu").customA11ySelect('refresh');
         }
      }
    });
});

function convert_invoice_disabled_all_gst_fields()
{
    // For item level GST type dropdown
    $('option:selected', $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".convert_invoice_IGSTandCGST").val("Select Type")).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST type fields plugin
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For item level GST rate dropdown
    $('option:selected', $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".DiscountPer").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST rate fields plugin
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For hiding delete icon
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".convert_invoice_remove_adddiscount").hide();
    
    // For hiding SGST row
    $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").hide();
    
    // For hiding hidden fields
    $("#convert_ToInvoiceModal .item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    // For label of GST values
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".convert_invoice_main_amount").html("");
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".convert_invoice_main_amount").html("₹ 0000.00");

    $("#convert_estimate_summary_value").val(2);

    // Disabled item level GST fields
    $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee","opacity":"1", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
    
    // Disabled invoice level GST fields
    $('option:selected', $("#convert_invoice_Calculate_discounts .CGST_TR_section .GST_section").find("#convert_Calculate_IGSTandCGST_select").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For invoice level GST type fields plugin
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For invoice level GST rate dropdown
    $('option:selected', $("#convert_invoice_Calculate_discounts .CGST_TR_section").find("#convert_Calculate_rate").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For invoice level GST rate field plugin
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For invoice level gst hidden fields
    $("#convert_ToInvoiceModal .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    
    // Hide invoice level SGST row
    $("#convert_invoice_Calculate_discounts .SGST_Discount").hide();

    // For invoice level GST values label
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").html("");
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").html("₹ 0000.00");
    // For invoice level delete icon hide
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").hide();

    // For invoice level GST fields disable
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});

    $("#Selected_gst_hidden_val").val(0);
    $("#convert_ToInvoiceModal #convert_invoice_Calculate_discounts .CGST_TR_section").show();
}

$(document).on("change", "#convert_BillingFrom_gstno", function(){
    var sel_id = $('#convert_BillingFrom_gstno option:selected').data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_single_billing_entities_gstdetails.php?id="+sel_id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {
                $("#convert_convert_invoice_BillingFromAddress").remove(); 
                $(".convert_diff_billing_entity").show();
                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails").show();
                $(".BillingFrom_address_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $("#convert_BillFromGST_name").html("<span><b>"+data.name+"</b></span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#convert_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#convert_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#convert_BillFromGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                $("#convert_BillFromGST_street").html("<span>"+data.address+"</span>");

                // Enabled item level GST fields
                $("#convert_invoice_convert_participantTable .convert_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");
                // Enabled invoice level GST fields
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                $("#convert_BillFromGST_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                $("#convert_BillFromGST_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                if(data.udyam_registration_no){
                    $("#BillFromGST_state").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#convert_bill_id").remove();
                
                // Hidden fields to post the data
                $("#convert_BillFromGST_name").append("<input type='hidden' name='billfromname' id='convert_invoice_billfromname' value='"+data.name+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='bill_id' id='convert_bill_id' value='"+data.billing_entity_id+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billing_address_street' id='convert_billing_address_street' value='"+data.street+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billing_address_city' id='convert_billing_address_city' value='"+data.city+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billing_address_state' id='convert_billing_address_state' value='"+data.state+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billing_address_postal_code' id='convert_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billingaddressgstin' id='convert_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billingaddresspanno' id='convert_billingaddresspanno' value='"+data.panno+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billingemailaddress' id='convert_billingemailaddress' value='"+data.emailid+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billingphoneno' id='convert_billingphoneno' value='"+data.phoneno+"' />");
                $("#convert_BillFromGST_street").append("<input type='hidden' name='billingfrom_udyamno' id='convert_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");

                if(data.total_bank_details > 0)
                {   
                    get_all_banks_details_convert(data.billing_entity_id);
                }
                else {
                    $("#convert_Holder_name").html("");
                    $("#convert_bank_name").html("");
                    $("#convert_acc_no").html("");
                    $("#convert_IFSC_Code").html("");
                    $("#convert_accountType").html("");
                    $("#convert_UPI").html("");
                    $("#convert_Holder_name").html('<span><b>No bank details available</span>');
                }
            }
            else
            {
                $(".BillingFromGSTDetails").hide();
            }
        }
    });
});

// Scripts for Billed to
$(document).on("change", "#convert_BillingTo_addr", function(){
    var sel_id = $('#convert_BillingTo_addr option:selected').data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_account_gst.php?account_id='"+encodeURI(sel_id)+"'",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {  
                if(data.total_gst == 1)
                {
                    $("#convert_BillingToAddress").remove();
                    $(".BillingTo_address_main").hide();
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToAddress").show();
                    $("#convert_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#convert_BillToAddress_street").html("<span>"+data.address+"</span>");
                    $("#convertEstimateForm .BillingTo_gst_main").find(".err").remove();

                    if(data.emailid!="" && data.phoneno!=""){
                        $("#convert_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#convert_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#convert_BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                    }

                    if(data.gst_num){
                        $("#convert_BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                    }
                    if(data.panno){
                        $("#convert_BillToAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                    }
                    if(data.udyam_registration_no!=""){
                        $("#convert_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                    }
                    // Hidden fields to post the data
                    $("#convert_BillToAddress_name").append("<input type='hidden' name='billtoname' id='convert_billtoname' value='"+data.name+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shipping_address_street' id='convert_shipping_address_street' value='"+data.street+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shipping_address_city' id='convert_shipping_address_city' value='"+data.city+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shipping_address_state' id='convert_shipping_address_state' value='"+data.state+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shipping_address_postal_code' id='convert_shipping_address_postal_code' value='"+data.postal_code+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shippingaddressgstin' id='convert_shippingaddressgstin' value='"+data.gst_num+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shippingaddresspanno' id='convert_shippingaddresspanno' value='"+data.panno+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shippingaddressemailid' id='convert_shippingaddressemailid' value='"+data.emailid+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='shippingaddresshphoneno' id='convert_shippingaddresshphoneno' value='"+data.phoneno+"' />");
                    $("#convert_BillToAddress_street").append("<input type='hidden' name='billingto_udyamno' id='convert_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
                }

                else if(data.total_gst > 1)
                {
                    $(".BillingTo_gst_main").show();
                    $(".BillingToGSTDetails").hide();
                    $(".BillingToGSTDetails_dropdown").show();
                    $("#convert_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#convert_BillingTo_gstno").append(data.str_opt);
                    $("#convert_BillingTo_gstno").customA11ySelect('refresh');
                }
                else
                {
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToGSTDetails_dropdown").hide('refresh');
                    $(".BillingToGSTDetails").hide();
                    $("#convert_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#convert_BillingTo_gstno").customA11ySelect();
                }
            }
            else
            {
                $(".BillingTo_gst_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $(".BillingToGSTDetails").hide();
                $("#convert_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#convert_BillingTo_gstno").customA11ySelect('refresh');
            }
      }
    });
});

$(document).on("change", "#convert_BillingTo_gstno", function(){
    var sel_id = $('#convert_BillingTo_gstno option:selected').data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_single_account_gstdetails.php?id="+sel_id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        { 
            if(data)
            {  
                $("#BillingToAddress_convert").hide();
                $("#convert_BillingToAddress").remove();
                
                $(".BillingTo_gst_main").show();
                $(".BillingToGSTDetails").show();
                $(".convert_diff_customer_link").show();
                
                $(".convert_BillingTo_address_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $("#convert_BillToGST_name").html("<span><b>"+data.name+"</b></span>");
                $("#convert_BillToGST_address").html("<span>"+data.address+"</span>");
                $("#convertEstimateForm .BillingToGSTDetails_dropdown").find(".err").remove();

                if(data.emailid!="" && data.phoneno!=""){
                    $("#convert_BillToGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#convert_BillToGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#convert_BillToGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }
                $("#convert_BillToGST_gst").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                if(data.panno!=""){
                    $("#convert_BillToGST_pan").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                if(data.udyam_registration_no!=""){
                    $("#convert_BillToGST_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#convert_BillToGST_name").append("<input type='hidden' name='billtoname' id='convert_billtoname' value='"+data.name+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shipping_address_street' id='convert_shipping_address_street' value='"+data.street+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shipping_address_city' id='convert_shipping_address_city' value='"+data.city+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shipping_address_state' id='convert_shipping_address_state' value='"+data.state+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shipping_address_postal_code' id='convert_shipping_address_postal_code' value='"+data.postal_code+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shippingaddressgstin' id='convert_shippingaddressgstin' value='"+data.gst_num+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shippingaddresspanno' id='convert_shippingaddresspanno' value='"+data.panno+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shippingaddressemailid' id='convert_shippingaddressemailid' value='"+data.emailid+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='shippingaddresshphoneno' id='convert_shippingaddresshphoneno' value='"+data.phoneno+"' />");
                $("#convert_BillToGST_address").append("<input type='hidden' name='billingto_udyamno' id='convert_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else
            {
                $(".BillingToGSTDetails").hide();
            }
        }
    });
});

// On change event of discount type  i.e Percentage or Amount (item level)
$(document).on('change','#convert_invoice_convert_participantTable .convert_invoiceEstimate_Percentage',function(event){

    event.preventDefault();
    event.stopImmediatePropagation();
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_amt = 0;
    var selected_gst_type = $(this).closest('tr').next().find('.GST_section .custom-a11yselect-btn .custom-a11yselect-text').text();
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    var amt_val = $(this).closest('tr').prev().prev().find("input[name='convert_item_convert_invoice_main_amount[]']").val();
    
    // Estimate level GST
    var selected_gst_type_estimates = $("#convert_invoice_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per_estimates = $("#convert_invoice_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var split_tax_estimate = selected_gst_per_estimates / 2;

    var est_val_flag = 0;
    var estimate_value = 0;

    var cur_rate_html=$(this).closest("tr").find(".rate");
    var cur_rate_val=$(this).closest("tr").find(".rate").val();
    
    // if(a == 'Percentage')
    // {
    //   convert_Percentage_validation(cur_rate_html,cur_rate_val);
    // }
    // else if(a == 'Amount')
    // {
    //   convert_Amount_validation(cur_rate_html,cur_rate_val, parseFloat(amt_val));
    // }


    var convert_count = 0;
    var convert_count1 = 0;

    // if(a == 'Percentage')
    // {
    //     if(convert_count == 0)
    //     {
    //         convert_count = convert_Percentage_validation(cur_rate_html,cur_rate_val,convert_count);
    //     }
    // }
    // else if(a == 'Amount')
    // {
    //     if(convert_count1 == 0)
    //     {

    //         convert_count1 = convert_Amount_validation(cur_rate_html,cur_rate_val, parseFloat(amt_val),convert_count1);
    //     }
    // }

    if(a != 'Select Type' )
    {
        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","inline-block");

        if(a == 'Percentage')
        {
            if(convert_count == 0)
            {
                convert_count = convert_Percentage_validation(cur_rate_html,cur_rate_val,convert_count);
            }
        }
        else if(a == 'Amount')
        {
            if(convert_count1 == 0)
            {

                convert_count1 = convert_Amount_validation(cur_rate_html,cur_rate_val, parseFloat(amt_val),convert_count1);
            }
        }


    }
    else
    {
        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val('');
        $(this).closest("tr").find(".convert_invoice_main_amount").text('').text('₹ 0000.00');
        cleared_convertTOInvoice_estimate_level_discount_details();
    }

    $("#Selected_disc_hidden_val").val(0);
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();

    for_hiding_convert_to_invoice_estimate_level_percentage();
    convert_to_invoice_remove_panel_color();

    /*if(a!="Select Type")
    {
        $("#convert_estimate_calculated_disc_amt, #convert_estimate_disc_amt").val(0);

        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").hide();

        $("#convert_invoice_Calculate_discounts").find(".discount_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $("#convert_convert_invoiceEstimate_Percentage_select-button .custom-a11yselect-text").text('Select Type');
        
        $("#convert_convert_invoiceEstimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused");
        $("#convert_convert_invoiceEstimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-selected");

        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.convert_invoice_remove_adddiscount').hide();
        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.estimate_sgst_amount').val(0);
        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.convert_invoice_main_amount').text("₹ 0000.00");

        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","inline-block");
        var new_cal = 0;
        //var total_disc_amt = $("#convert_estimate_calculated_disc_amt").val();
        if(a=="Percentage")
        {
            var cur_rate_html=$(this).closest("tr").find(".rate");
            var cur_rate_val=$(this).closest("tr").find(".rate").val();
            // convert_Percentage_validation(cur_rate_html,cur_rate_val);

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = (cur_rate_val/100) * amt_val;
            }
            else{
                $(this).closest('tr').find(".convert_invoice_main_amount").text("");
                $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
            }
            
            if(selected_gst_type!="Select Type"){
                if(selected_gst_type == 'IGST'){
                    var amt_after_discount = amt_val - disc_amt;
                    new_cal = (selected_gst_per * amt_after_discount)/100;
                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);

                    $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                    
                    $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            else if(selected_gst_type_estimates!="Select Type"){
                var amt_after_discount = amt_val - disc_amt;
                if(selected_gst_type_estimates == 'IGST'){
                    new_cal = (selected_gst_per_estimates * amt_after_discount)/100;
                    $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);

                    $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(selected_gst_type_estimates == 'CGST'){
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax_estimate * new_cal_amt)/100;
                    $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                    $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                }
                // $("#convert_invoice_main_details").find("#convert_estimate_calculated_disc_amt").val(disc_amt);
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else{
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("");
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }
        if(a=="Amount")
        { 
            var cur_rate_val=$(this).closest("tr").find(".rate").val();

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = amt_val - cur_rate_val;
            }
            else{
                disc_amt = amt_val;
                $(this).closest('tr').find(".convert_invoice_main_amount").text("");
                $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
            }

            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var new_cal = (selected_gst_per * disc_amt)/100;
                    $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * disc_amt)/100;
                    $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                    $(this).closest("tr").next().find(".item_igst_amount").val(0);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }
            }
            else if(selected_gst_type_estimates != "Select Type"){
                if(disc_amt == 0) disc_amt = amt_val;
                if(selected_gst_type_estimates == 'IGST'){
                    var new_cal = (selected_gst_per_estimates * disc_amt)/100;
                    $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);

                    $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(selected_gst_type_estimates == 'CGST'){
                    var new_cal = (split_tax_estimate * disc_amt)/100;
                    $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                    $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                }
                // $("#convert_invoice_main_details").find("#convert_estimate_calculated_disc_amt").val(cur_rate_val);
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else{
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("");
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }  
        $(this).closest('tr').find(".convert_invoice_main_amount").text("");
        if(a=="Amount"){
            if(cur_rate_val){
                $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ "+cur_rate_val+".00");
            }
            else{
                $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
            }
        }
        if(a=="Percentage"){
            $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ "+disc_amt.toFixed(2));
        }
        $(this).closest('tr').find(".convert_invoice_main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+disc_amt+"'>");
        $("#Selected_disc_hidden_val").val(1);
    }
    else
    {
        var new_cal = 0;
        if(selected_gst_type!="Select Type"){
            if(selected_gst_type == 'IGST'){
                new_cal = (selected_gst_per * amt_val)/100;
                $(this).closest("tr").find(".item_igst_amount").val(new_cal);
            }
            if(selected_gst_type == 'CGST'){
                new_cal = (split_tax * amt_val)/100;
                $(this).closest("tr").find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal);            
        }
        else if(selected_gst_type_estimates != "Select Type"){
            var cal_amt = parseFloat($("#convert_total_estimate_value").val()) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
            if(selected_gst_type_estimates == 'IGST'){
                new_cal = (selected_gst_per_estimates * cal_amt)/100;
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
            }
            if(selected_gst_type_estimates == 'CGST'){
                new_cal = (split_tax_estimate * cal_amt)/100;
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
            }
            new_cal = new_cal.toFixed(2);
            if(new_cal == "")
            {
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else
            {
            $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ 0000.00");
            $("#convert_invoice_Calculate_discounts").find("#convert_SGST_Calculate .convert_invoice_main_amount").text("₹ 0000.00");

            }
        }
        else{
            $(this).closest("tr").find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
        }
        // $(this).closest('tr').find(".convert_invoice_main_amount .calculated_discount").remove();
        $(this).closest('tr').find(".convert_invoice_main_amount").text("");
        $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");

        // If any items discount dropdown selected as Select Type then show database record if present
        $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").show();
        if($("#hidden_estimate_discount_type").val() != '' || $("#hidden_estimate_discount_type").val() != "Select Type"){
            var discounttypeVal = $("#hidden_estimate_discount_type").val();
            $("#convert_convert_invoiceEstimate_Percentage_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $("#convert_convert_invoiceEstimate_Percentage_select-button .custom-a11yselect-text").text(discounttypeVal);
            $("#convert_convert_invoiceEstimate_Percentage_select-menu li[data-val='"+discounttypeVal+"']").addClass("custom-a11yselect-focused");
            $("#convert_convert_invoiceEstimate_Percentage_select-menu li[data-val='"+discounttypeVal+"']").addClass("custom-a11yselect-selected");
        }
        if($("#hidden_estimate_discount_rate").val()!="" || $("#hidden_estimate_discount_rate").val()!=0){
            // $("#convert_estimate_disc_amt").removeAttr("value");
            // $("#convert_estimate_disc_amt").attr("value", $("#hidden_estimate_discount_rate").val());
            $("#convert_estimate_disc_amt").val($("#hidden_estimate_discount_rate").val());
            $("#convert_estimate_calculated_disc_amt").attr("value", $("#hidden_estimate_discount_rate").val());
            var show_val = $("#convert_estimate_calculated_disc_amt").val();
            $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find('.convert_invoice_main_amount').text("₹ "+show_val+".00");
            estimate_value = parseFloat($("#convert_total_estimate_value").val()) - parseFloat($("#hidden_estimate_discount_rate").val());
            est_val_flag = 1;
        }
        $("#Selected_disc_hidden_val").val(0);
    }*/
    /*var t = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(t, 1);
    $("#convert_total_estimate_value").val(0);
    if(est_val_flag == 0){
        if($("#convert_estimate_calculated_disc_amt").val()){
            t = parseFloat(t) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
        }
        $("#convert_total_estimate_value").val(t);
    }
    else {
        if($("#convert_estimate_calculated_disc_amt").val()){
            estimate_value = parseFloat(estimate_value) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
        }
        $("#convert_total_estimate_value").val(estimate_value);
    }*/


    
});

function for_hiding_convert_to_invoice_estimate_level_GST()
{
    var len = $("#convert_total_items").val();
    var flag = 0 ;
    var arrr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".convert_participantRow .main-group").eq(v).next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arrr.push(selected_type) ;
          // console.log(selected_type);
        }

        
    }

    if(arrr.length == 0)
    {
        $("#convert_estimate_calculation .CGST_TR_section").show();
        $("#Selected_gst_hidden_val").val(0);
    }
    else
    {
        $("#convert_estimate_calculation .CGST_TR_section").hide();
        $("#Selected_gst_hidden_val").val(1);

    }
}

function for_hiding_convert_to_invoice_estimate_level_percentage()
{
    // var len = $(".convert_participantRow .main-group").length;
    var len = $("#convert_total_items").val();
    var flag = 0 ;
    var arr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".convert_participantRow .main-group").eq(v).next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arr.push(selected_type) ;
        }

        // console.log(selected_type);
        
    }
    // console.log(arr.length);
    if(arr.length == 0)
    {
        $("#convert_estimate_calculation .discount_section").closest("tr").show();
        $("#Selected_disc_hidden_val").val(0);
        // cleared_convertTOInvoice_estimate_level_discount_details();
    }
    else
    {
        $("#convert_estimate_calculation .discount_section").closest("tr").hide();
        $("#Selected_disc_hidden_val").val(1);

    }
}



// On change event of GST type (item level)
$(document).on("change", "#convert_invoice_convert_participantTable .convert_invoice_IGSTandCGST", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var a = $(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type"){
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").hide();
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").find('.convert_invoice_remove_adddiscount').hide();
        $("#convert_invoice_Calculate_discounts .SGST_Discount").closest("tr").hide();
        $("#convert_invoice_Calculate_discounts .SGST_Discount").closest("tr").find('.convert_invoice_remove_adddiscount').hide();

        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_sgst_amount').val(0);

        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").find('.convert_invoice_main_amount').text("₹ 0000.00");
        $("#convert_invoice_Calculate_discounts .SGST_Discount").closest("tr").find('.convert_invoice_main_amount').text("₹ 0000.00");

        $("#convert_items_selected_gst_type").val("");
        $("#convert_items_selected_gst_type").val(a);

        var element=$("#convert_invoice_Calculate_discounts .CGST_TR_section");
        // First GST rate field
        element.find(".rate_data .custom-a11yselect-btn").attr("aria-activedescendant",'convert_Calculate_rate-option-0');
        element.find(".rate_data .custom-a11yselect-btn .custom-a11yselect-text").text('');
        element.find(".rate_data .custom-a11yselect-btn .custom-a11yselect-text").text('0%');
        element.find(".rate_data .custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        element.find(".rate_data .custom-a11yselect-menu .custom-a11yselect-option[data-val='0']").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        // for CGST field
        element.find(".GST_section .custom-a11yselect-btn").attr("aria-activedescendant",'convert_Calculate_IGSTandCGST_select-option-0');
        element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text('');
        element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text('Select Type');
        element.find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        element.find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option[data-val='']").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;

        // var len = $("#convert_invoice_convert_participantTable .convert_participantRow .main-group").length;
        var len = $("#convert_total_items").val();
        var convert_invoice_main_amount = 0;
        for(var s=0;s<len;s++){
            var n = $(this).closest("#convert_invoice_convert_participantTable .convert_participantRow").find(".main-group").eq(s);
            var curr_tax = n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();

            if(m == 'IGST'){
                $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").hide();

                convert_invoice_main_amount = n.find(".convert_invoice_main_amount").val();
                //console.log(s+" "+convert_invoice_main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type"){
                    if(disc_type == 'Percentage'){
                        amt_after_discount = convert_invoice_main_amount - calculated_disc;
                        calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (curr_tax * calculated_disc)/100;
                    }
                }
                else{
                    calculated_tax_amt = (curr_tax * convert_invoice_main_amount)/100;
                }
                n.next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().next().next().find(".item_cgst_amount").val(0);
                n.next().next().next().find(".item_sgst_amount").val(0);
                n.next().next().next().find(".item_igst_amount").val(calculated_tax_amt);
            }
            if(m == 'CGST'){
                $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").show();

                convert_invoice_main_amount = n.find(".convert_invoice_main_amount").val();
                //console.log(s+" "+convert_invoice_main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                var split_tax = curr_tax / 2;
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type"){
                    if(disc_type == 'Percentage'){
                        amt_after_discount = convert_invoice_main_amount - calculated_disc;
                        calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (split_tax * calculated_disc)/100;
                    }
                }
                else{
                    calculated_tax_amt = (split_tax * convert_invoice_main_amount)/100;
                }
                n.next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().next().next().find(".item_cgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_sgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_igst_amount").val(0);
            }
            n.next().next().next().find(".convert_invoice_remove_adddiscount").show();
        }
        
        $("#Selected_gst_hidden_val").val(1);
    }
    else{
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_igst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_cgst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_sgst_amount').val(0);

        var element=$("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr");
        // First GST rate field
        var element1=element.find(".rate_data");
        var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

        // for CGST field
        var element2=element.find(".GST_section");
        element.find(".convert_invoice_main_amount").text("₹ 0000.00");
        var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
        var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        $("#convert_invoice_convert_participantTable .convert_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
        $("#convert_invoice_convert_participantTable .convert_participantRow .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        var len = $("#convert_total_items").val();
        for(var m=0;m<len;m++){
            $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").hide();

            var n = $(this).closest("#convert_invoice_convert_participantTable .convert_participantRow").find(".main-group").eq(m);
            console.log(n.next().next().find(".item_cgst_amount").html());
            n.next().next().next().find(".item_cgst_amount").val(0);
            n.next().next().next().find(".item_sgst_amount").val(0);
            n.next().next().next().find(".item_igst_amount").val(0);

            n.next().next().find(".convert_invoice_remove_adddiscount").hide();
        }

        $(this).closest("tr").find(".convert_invoice_main_amount").text("");
        $(this).closest("tr").find(".convert_invoice_main_amount").text("₹ 0000.00"); 
        $(this).closest("tr").next().find(".convert_invoice_main_amount").text("");
        $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        //$("#Calculate_IGSTandCGST_select").closest("tr").show();
        $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
        $("#convert_invoice_Calculate_discounts .SGST_Discount").closest("tr").show();

        // Estimate level Discount dropdown
        $("#convert_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('Select Type');
        $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        $("#convert_invoice_Calculate_discounts .SGST_Discount").hide();

        // Estimate level Discount rate dropdown
        $("#convert_Calculate_rate-button .custom-a11yselect-text").text('0%');
        $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
        if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
            var gsttypeVal = ($("#hidden_estimate_gst_type").val()!="") ? $("#hidden_estimate_gst_type").val() : "Select Type";
            if(gsttypeVal == 'CGST'){
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
                $("#convert_SGST_Calculate").show();
                var cgst = $("#hidden_estimate_cgst_amt").val();
                var sgst = $("#hidden_estimate_sgst_amt").val();
                var cgst_label = $("#hidden_estimate_cgst_label").val();
                var sgst_label = $("#hidden_estimate_sgst_label").val();
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").text("₹ "+cgst_label);
                $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+sgst_label);

                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
                $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_remove_adddiscount").show();
            }
            else {
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
                $("#convert_SGST_Calculate").hide();
                var igst_label = $("#hidden_estimate_igst_label").val();
                var igst = $("#hidden_estimate_igst_amt").val();
                $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+igst_label);

                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
                $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
            }
            $("#convert_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
            $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
            $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
        }
        if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
            var gstrateVal = $("#hidden_estimate_gst_rate").val();
            $("#convert_Calculate_rate-selected").text(gstrateVal+"%");
            $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
            $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
        }
        // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 

        $("#convert_items_selected_gst_type").val("");
        $("#Selected_gst_hidden_val").val(0);
    }
});


function convert_to_invoice_remove_panel_color()
{
    // Remove color when for any item both discount & gst is selected
    var items_inv_selected_disc = $("#Selected_disc_hidden_val").val();
    var items_inv_selected_gst = $("#Selected_gst_hidden_val").val();
    if(items_inv_selected_disc==1 && items_inv_selected_gst==1){
    $("#convert_ToInvoiceModal #convert_estimate_calculation .panel-heading").addClass("remove-panel-color");
    }
    else
    {
    $("#convert_ToInvoiceModal #convert_estimate_calculation .panel-heading").removeClass("remove-panel-color");
    }
}

// On change event of GST rate (item level)
$(document).on("change", "#convert_invoice_convert_participantTable .DiscountPer", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type"){
        // var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var convert_invoice_main_amount = 0;
        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;

        var len = $("#convert_total_items").val();
        for(var s=0;s<len;s++)
        {
            var n = $(this).closest("#convert_invoice_convert_participantTable .convert_participantRow").find(".main-group").eq(s);
            var curr_tax = n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();

            if(a == 'IGST')
            {
                $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").hide();

                main_amount = n.find(".convert_invoice_main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                // var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                
                if(disc_type!="Select Type"){
                    amt_after_discount = main_amount - calculated_disc;
                    if(disc_type == 'Percentage'){
                        calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    }
                }
                else{
                    calculated_tax_amt = (curr_tax * main_amount)/100;
                }
                n.next().next().next().find(".item_cgst_amount").val(0);
                n.next().next().next().find(".item_sgst_amount").val(0);
                n.next().next().next().find(".item_igst_amount").val(calculated_tax_amt);
            }
            if(a == 'CGST')
            {
                $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").show();

                main_amount = n.find(".convert_invoice_main_amount").val();
                // alert(main_amount);
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                var split_tax = curr_tax / 2;
                // var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                
                if(disc_type!="Select Type"){
                    amt_after_discount = main_amount - calculated_disc;
                    if(disc_type == 'Percentage'){
                        calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    }
                }
                else{
                    calculated_tax_amt = (split_tax * main_amount)/100;
                }
                n.next().next().next().find(".item_cgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_sgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_igst_amount").val(0);
            }

            if(calculated_tax_amt!=0)
            {
                n.next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            }
            else {
                n.next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                n.next().next().next().next().find(".convert_invoice_main_amount").text("");
                n.next().next().next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
            }
        }
    }*/
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();
});

// Remove button clicked in front of amount (item level)
$(document).on('click','#convert_invoice_convert_participantTable .convert_invoice_remove',function(){
    var len_edit = $("#convert_total_items").val();

    var checked = $(this).closest("tr").find(".sub_checkbox");

    var no = $("#convert_check_sub_checkboxes_cnt").val();

    if(checked.prop("checked"))
    {
        $("#convert_check_sub_checkboxes_cnt").val(no - 1 );
    }


    var ele = $(this).closest("tr");
    ele.next().next().remove(); // for discount
    ele.next().next().remove(); // for CGST
    ele.next().next().remove(); // for sgst
    ele.remove(); // for main item desc

    var cur_len = len_edit - 1 ;

    $('#convert_total_items').val(cur_len);

    if(cur_len == 0)
    {
        $('.convert_participantRow').append(convert_items_add_row);
        cleared_convertTOInvoice_estimate_level_gst_details();
        cleared_convertTOInvoice_estimate_level_discount_details();
        $("#convert_ToInvoiceModal .convert_invoiceEstimate_Percentage").customA11ySelect();
        $("#convert_invoice_convert_participantTable .convert_invoice_IGSTandCGST").customA11ySelect();
        $("#convert_ToInvoiceModal .DiscountPer").customA11ySelect();

        $('#convert_total_items').val(1);


    }

    var main_length = $('#convert_total_items').val();
    
    for(var g=0;g<main_length;g++)
    {
        var s=g+1;
        $(".convert_participantRow .main-group").eq(g).find(".sno").html(s);
        $('option:selected', $("#convert_item_discount_type"+g)).attr('selected',false).siblings().removeAttr('selected');

    }

    var len = $("#convert_ToInvoiceModal .sub_checkbox:checked").length;
    
    if(len == 0)
    {
        $("#convert_ToInvoiceModal .header_delete").css("display","none");
    }
   
    // var len = $("#convert_invoice_convert_participantTable .convert_participantRow .main-group").length;
    // $(this).closest("tr").find("input").val("");
    // var len_convert = $("#convert_total_items").val();

    // for(k=0;k<len_convert;k++){
    //     if($("#convert_total_items").val()!=1){
    //         var row_element = $(this).closest("tr").eq(k);
    //         row_element.next().next().next().next().remove();
    //         row_element.next().next().next().remove();
    //         row_element.next().next().remove();
    //         row_element.next().remove();
    //         row_element.remove();

    //     }
    //     else{
    //         var element = $(this).closest("tr").eq(k).next();
    //         element.next().find(".rate").val("");
    //         var id=element.next().find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=element.next().find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element,id,text_msg);

    //         element.next().next().find("input").val("");
    //         element.next().next().find(".convert_invoice_main_amount .calculated_discount").val(0);
    //         element.next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
    //         element.next().next().find(".convert_invoice_remove_discount").hide();
    //         element.next().next().next().find(".convert_invoice_remove_adddiscount").hide();
    //         element.next().next().next().next().find(".convert_invoice_remove_adddiscount").hide();

    //         element.next().next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    //         // First GST rate field
    //         var element1=element.next().next().find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         // for CGST field
    //         var element2=element.next().next().find(".GST_section");
    //         element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");
    //         var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element2,cur_id,cur_text);

    //         // for hide sgst row
    //         // element.next().next().next().hide();
    //     }
    // }
    // if(len_convert > 1){
    //     len_convert = len_convert - 1;
    //     $("#convert_total_items").val(len_convert);

    //     for(var g=0;g<len_convert;g++)
    //     {
    //         var s=g+1;
    //         $(".convert_participantRow .main-group").eq(g).find(".sno").html(s);
    //     }
    // }
    // $("#convert_items_selected_gst_type").val('');
    // $("#convert_convert_invoice_Calculate_discounts .discount_section").closest("tr").show();



    // var s = total_amount_for_estimate_level_discount_convert();
    // if(s){
    //     calculate_estimate_level_discount_convert(s);
    //     $("#convert_total_estimate_value").val(0);
    //     if($("#convert_estimate_calculated_disc_amt").val()){
    //         s = parseFloat(s) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    //     }
    //     $("#convert_total_estimate_value").val(s);
    // }
    // else{
    //     // var no=$("#convertEstimateForm .convert_participantRow .main-group").length;
    //     var estimate_element = $("#convert_invoice_Calculate_discounts");
    //     if(len_convert == 1){
    //         // Estimate level discount row reset
    //         $("#convert_estimate_disc_amt").val("");
    //         estimate_element.find(".convert_invoice_main_amount").text("₹ 0000.00");
    //         var id=estimate_element.find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=estimate_element.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(estimate_element,id,text_msg);

    //         var element1=estimate_element.find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         //for hide sgst row
    //         estimate_element.find("#SGST_Calculate").hide();
    //         $("#convert_total_estimate_value, #convert_estimate_subtotal_amount, #convert_estimate_totaldiscount_amount, #convert_estimate_totaltaxes_amount, #convert_estimatetotal_amount").val(0);
    //         //$(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    //     else{
    //         var k = get_all_item_rows_main_total();
    //         calculate_estimate_level_discount_convert(k);
    //         $("#convert_total_estimate_value").val(0);
    //         $("#convert_total_estimate_value").val(k);
    //         //$(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    // }

    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();

    for_hiding_convert_to_invoice_estimate_level_percentage();
    for_hiding_convert_to_invoice_estimate_level_GST();
    convert_to_invoice_remove_panel_color();


});

// Remove button clicked in front of SGST
$(document).on('click','.SGST_Discount .convert_invoice_remove_adddiscount',function(){


    $(".convert_participantRow").find(".GST_section .convert_invoice_IGSTandCGST option").removeAttr('selected');
    $(".convert_participantRow").find(".GST_section .convert_invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(".convert_participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".convert_participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var len = $("#convert_invoice_convert_participantTable .convert_participantRow .main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#convert_invoice_convert_participantTable .convert_participantRow").find(".SGST_Discount").eq(k);
        var current=element.prev().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(current == 'CGST'){
            element.css("display","none");
            // for rate select field of SGST
            var element1=element.find(".rate_data");
            var sgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
            var sgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
            ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
        }
        // for CGST select field
        var element2=element.prev().find(".GST_section");
        var cur_id=element.prev().find(".GST_section .custom-a11yselect-menu li:first").attr("id");
        var cur_text=element.prev().find(".GST_section .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        // for rate select field of GST
        var element3=element.prev().find(".rate_data");
        var cgst_rate_id=element.prev().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element.prev().find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

        element.find(".convert_invoice_main_amount").text("");
        element.find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.prev().find(".main_amount").text("");
        element.prev().find(".main_amount").text("₹ 0000.00");

        element.prev().find(".item_igst_amount").val(0);
        element.prev().find(".item_cgst_amount").val(0);
        element.prev().find(".item_sgst_amount").val(0);

        // element.find(".convert_invoice_remove_adddiscount").css("display","none");
    }
    $("#convert_items_selected_gst_type").val("");
    $("#convert_estimate_summary_value").val(2);

    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").css("display","none");
    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_main_amount").text("");
    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_main_amount").text("₹ 0000.00");
    
    for_hiding_convert_to_invoice_estimate_level_GST();
    convert_to_invoice_remove_panel_color();
       /*var element=$(this).closest("tr").prev();
    var current=element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    if(current=="CGST")
    {
        element.next().css("display","none");
        // for rate select field of SGST
        var element1=element.next().find(".rate_data");
        var sgst_rate_id=element.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.next().find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }

    // for CGST select field
    var element2=element.find(".GST_section");
    var cur_id=element.find(".GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.find(".GST_section .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element2,cur_id,cur_text);

    // for rate select field of GST
    var element3=element.find(".rate_data");
    var cgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.find(".convert_invoice_remove_adddiscount").css("display","none");*/

    $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
    // Estimate level GST dropdown
    $("#convert_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('Select Type');
    $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .SGST_Discount").hide();

    // Estimate level GST rate dropdown
    $("#convert_Calculate_rate-button .custom-a11yselect-text").text('0%');
    $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
        var gsttypeVal = $("#hidden_estimate_gst_type").val();
        if(gsttypeVal == 'CGST'){
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").show();
            var cgst = $("#hidden_estimate_cgst_amt").val();
            var sgst = $("#hidden_estimate_sgst_amt").val();
            var cgst_label = $("#hidden_estimate_cgst_label").val();
            var sgst_label = $("#hidden_estimate_sgst_label").val();
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").text("₹ "+cgst_label);
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+sgst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_remove_adddiscount").show();
        }
        else {
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").hide();
            var igst_label = $("#hidden_estimate_igst_label").val();
            var igst = $("#hidden_estimate_igst_amt").val();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+igst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
        }
        $("#convert_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    }
    if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
        var gstrateVal = $("#hidden_estimate_gst_rate").val();
        $("#convert_Calculate_rate-selected").text(gstrateVal+"%");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    }
    // ========== If any items GST dropdown selected as Select Type then show database record if present ==========

     cleared_convertTOInvoice_estimate_level_gst_details();

});

// Remove button clicked in front of discount (item level)
$(document).on('click','#convert_invoice_convert_participantTable .convert_invoice_remove_discount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".convert_invoiceEstimate_Percentage")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".discount_section .convert_invoiceEstimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .convert_invoiceEstimate_Percentage option").first().attr('selected','selected');

    var element=$(this).closest("tr");
    element.find(".rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".convert_invoice_main_amount").text("₹ 0000.00");

    var main_amt = $(this).closest("tr").prev().find(".convert_invoice_main_amount").val();
    var applied_tax = $(this).closest("tr").next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = $(this).closest("tr").next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type"){
        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            $(this).closest('tr').next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
        }
        $(this).closest('tr').next().find(".convert_invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
    }
    else{
        element.next().find(".convert_invoice_main_amount").text("");
        element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.next().next().find(".convert_invoice_main_amount").text("");
        element.next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.find(".convert_invoice_main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
    }

    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
     /*if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
        var gsttypeVal = $("#hidden_estimate_gst_type").val();
        if(gsttypeVal == 'CGST'){
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").show();
            var cgst = $("#hidden_estimate_cgst_amt").val();
            var sgst = $("#hidden_estimate_sgst_amt").val();
            var cgst_label = $("#hidden_estimate_cgst_label").val();
            var sgst_label = $("#hidden_estimate_sgst_label").val();
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").text("₹ "+cgst_label);
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+sgst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_remove_adddiscount").show();
        }
        else {
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").hide();
            var igst_label = $("#hidden_estimate_igst_label").val();
            var igst = $("#hidden_estimate_igst_amt").val();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+igst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
        }
        $("#convert_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    }
    if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
        var gstrateVal = $("#hidden_estimate_gst_rate").val();
        $("#convert_Calculate_rate-selected").text(gstrateVal+"%");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    }
=======
    // if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
    //     var gsttypeVal = $("#hidden_estimate_gst_type").val();
    //     if(gsttypeVal == 'CGST'){
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#convert_SGST_Calculate").show();
    //         var cgst = $("#hidden_estimate_cgst_amt").val();
    //         var sgst = $("#hidden_estimate_sgst_amt").val();
    //         var cgst_label = $("#hidden_estimate_cgst_label").val();
    //         var sgst_label = $("#hidden_estimate_sgst_label").val();
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").text("₹ "+cgst_label);
    //         $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+sgst_label);

    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
    //         $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_remove_adddiscount").show();
    //     }
    //     else {
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#convert_SGST_Calculate").hide();
    //         var igst_label = $("#hidden_estimate_igst_label").val();
    //         var igst = $("#hidden_estimate_igst_amt").val();
    //         $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+igst_label);

    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
    //         $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
    //     }
    //     $("#convert_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
    //     $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
    //     $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    // }
    // if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
    //     var gstrateVal = $("#hidden_estimate_gst_rate").val();
    //     $("#convert_Calculate_rate-selected").text(gstrateVal+"%");
    //     $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
    //     $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    // }
    var s = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(s);
    $("#convert_total_estimate_value").val(0);
    if($("#convert_estimate_calculated_disc_amt").val()){
        s = parseFloat(s) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(s);*/

    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();
    // $("#convert_total_estimate_value").val(s);

    for_hiding_convert_to_invoice_estimate_level_percentage();
    cleared_convertTOInvoice_estimate_level_discount_details();
    convert_to_invoice_remove_panel_color();
});

// Remove button clicked in front of CGST (item level)
$(document).on('click','#convert_invoice_convert_participantTable .CGST_TR_section .convert_invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".convert_invoice_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").find(".DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(".convert_participantRow").find(".GST_section .convert_invoice_IGSTandCGST option").removeAttr('selected');
    $(".convert_participantRow").find(".GST_section .convert_invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(".convert_participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".convert_participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var len = $("#convert_invoice_convert_participantTable .convert_participantRow .main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#convert_invoice_convert_participantTable .convert_participantRow").find(".CGST_TR_section").eq(k);
        var current=element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(current == 'CGST'){
            element.next().css("display","none");
            // for rate select field of SGST
            var element1=element.next().find(".rate_data");
            var sgst_rate_id=element.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
            var sgst_rate_text=element.next().find(".rate_data .custom-a11yselect-menu li:first button").text();
            ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
        }
        // for select gst field
        var element2=element.find(".GST_section");
        var cur_id=element.find(".GST_section .custom-a11yselect-menu li:first").attr("id");
        var cur_text=element.find(".GST_section .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        var element3=element.find(".rate_data");
        var cgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

        element.find(".main_amount").text("");
        element.find(".main_amount").text("₹ 0000.00");
        element.next().find(".convert_invoice_main_amount").text("");
        element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");

        element.find(".item_igst_amount").val(0);
        element.find(".item_cgst_amount").val(0);
        element.find(".item_sgst_amount").val(0);

        // $(this).css("display","none");
    }
    $("#convert_items_selected_gst_type").val("");
    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_main_amount").text('');
    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_main_amount").text('₹ 0000.00');
    $("#convert_ToInvoiceModal .convert_participantRow .CGST_TR_section .convert_invoice_remove_adddiscount").css("display","none");

    for_hiding_convert_to_invoice_estimate_level_GST();
    convert_to_invoice_remove_panel_color();

    /*var element=$(this).closest("tr");

    var current=element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    if(current=="CGST")
    {
        element.next().css("display","none");

        // for rate select field of SGST
        var element1=element.next().find(".rate_data");
        var sgst_rate_id=element.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.next().find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }

    // for select gst field
    var element2=element.find(".GST_section");

    var cur_id=element.find(".GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.find(".GST_section .custom-a11yselect-menu li:first button").text();

    ResetDiscount(element2,cur_id,cur_text);

    var element3=element.find(".rate_data");
    var cgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.find(".convert_invoice_main_amount").text("");
    element.find(".convert_invoice_main_amount").text("₹ 0000.00");
    element.next().find(".convert_invoice_main_amount").text("");
    element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");
    
    $(this).css("display","none");
    */

    $("#convert_invoice_Calculate_discounts .CGST_TR_section").show();

    cleared_convertTOInvoice_estimate_level_gst_details();
    
    // $("#convert_invoice_Calculate_discounts .CGST_TR_section .convert_invoice_remove_adddiscount").hide();

    // // Estimate level GST dropdown
    // $("#convert_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('Select Type');

    // $("#convert_invoice_Calculate_discounts .GST_section .custom-a11yselect-btn").attr("aria-activedescendant","convert_Calculate_IGSTandCGST_select-option-0");

    // $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    
    // $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // $("#convert_invoice_Calculate_discounts .SGST_Discount").hide();

    // // Estimate level GST rate dropdown
    // $("#convert_Calculate_rate-button .custom-a11yselect-text").text('0%');

    // $("#convert_invoice_Calculate_discounts .rate_data .custom-a11yselect-btn").attr("aria-activedescendant","convert_Calculate_rate-option-0");
    
    // $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    
    // $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    /*if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
        var gsttypeVal = $("#hidden_estimate_gst_type").val();
        if(gsttypeVal == 'CGST'){
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").show();
            var cgst = $("#hidden_estimate_cgst_amt").val();
            var sgst = $("#hidden_estimate_sgst_amt").val();
            var cgst_label = $("#hidden_estimate_cgst_label").val();
            var sgst_label = $("#hidden_estimate_sgst_label").val();
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_main_amount").text("₹ "+cgst_label);
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+sgst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_remove_adddiscount").show();
        }
        else {
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#convert_SGST_Calculate").hide();
            var igst_label = $("#hidden_estimate_igst_label").val();
            var igst = $("#hidden_estimate_igst_amt").val();
            $("#convert_invoice_Calculate_discounts #convert_SGST_Calculate").find(".convert_invoice_main_amount").text("₹ "+igst_label);

            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
            $("#convert_invoice_Calculate_discounts .CGST_TR_section").find(".convert_invoice_remove_adddiscount").show();
        }
        $("#convert_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    }
    if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
        var gstrateVal = $("#hidden_estimate_gst_rate").val();
        $("#convert_Calculate_rate-selected").text(gstrateVal+"%");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
        $("#convert_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    }*/
    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();

    // $("#Selected_disc_hidden_val").val(0);
});


function cleared_convertTOInvoice_estimate_level_gst_details()
{
    $("#convert_invoice_Calculate_discounts .CGST_TR_section .convert_invoice_remove_adddiscount").hide();

    // Estimate level GST dropdown
    $("#convert_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('Select Type');

    $("#convert_invoice_Calculate_discounts .GST_section .custom-a11yselect-btn").attr("aria-activedescendant","convert_Calculate_IGSTandCGST_select-option-0");

    $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .SGST_Discount").hide();

    // Estimate level GST rate dropdown
    $("#convert_Calculate_rate-button .custom-a11yselect-text").text('0%');

    $("#convert_invoice_Calculate_discounts .rate_data .custom-a11yselect-btn").attr("aria-activedescendant","convert_Calculate_rate-option-0");

    $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .CGST_TR_section .convert_invoice_main_amount ").text('');

    $("#convert_invoice_Calculate_discounts .CGST_TR_section .convert_invoice_main_amount").text('₹ 0000.00');
    
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").next().find(".convert_invoice_main_amount").text('');
    
    $("#convert_invoice_Calculate_discounts .CGST_TR_section").next().find(".convert_invoice_main_amount").text('₹ 0000.00');

    $("#convert_invoice_Calculate_discounts .GST_section .convert_invoice_IGSTandCGST option").removeAttr('selected');
    $("#convert_invoice_Calculate_discounts .GST_section .convert_invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $("#convert_invoice_Calculate_discounts .rate_data .DiscountPer option").removeAttr('selected');
    $("#convert_invoice_Calculate_discounts .rate_data .DiscountPer option[value='0']").attr('selected','selected');


}


function cleared_convertTOInvoice_estimate_level_discount_details()
{
    // Estimate level discount dropdown
    $("#convert_invoice_Calculate_discounts .discount_section .custom-a11yselect-btn .custom-a11yselect-text").text('');

    $("#convert_invoice_Calculate_discounts .discount_section .custom-a11yselect-btn .custom-a11yselect-text").text('Select Type');

    $("#convert_invoice_Calculate_discounts .discount_section .custom-a11yselect-btn").attr("aria-activedescendant","convert_convert_invoiceEstimate_Percentage_select-option-0");

    $("#convert_invoice_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#convert_invoice_Calculate_discounts #convert_estimate_disc_amt").val('');

    $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find(".convert_invoice_main_amount ").text('');

    $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find(".convert_invoice_main_amount").text('₹ 0000.00');
    
    $("#convert_invoice_Calculate_discounts .discount_section").closest("tr").find(".convert_invoice_remove_discount").hide();

    $("#convert_invoice_Calculate_discounts .discount_section .convert_invoiceEstimate_Percentage option").removeAttr('selected');
    $("#convert_invoice_Calculate_discounts .discount_section .convert_invoiceEstimate_Percentage option").first().attr('selected','selected');
    

}



// Calculation on estimate form
$(document).on("keyup", "#convert_invoice_convert_participantTable input[name='convert_item_qty[]']", function(e){

    item_qty_change_convert(this);

    var qty_val = $(this).val();
    var amt = 0;
    var rate_val = $(this).closest('.main-group').find("input[name='convert_item_rate[]']").val();
    if(rate_val == ""){
        $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(qty_val);
    }
    if(rate_val != ""){
        if(qty_val == ""){
          $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(rate_val);
          amt = rate_val;
        }
        else
        {
          amt = qty_val * rate_val;
          $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(amt);
        }
        // calculate_gst_amount_on_qty_rate_change_convert($(this), amt);
    }
    /*var t2 = total_amount_for_estimate_level_discount_convert(amt);
    calculate_estimate_level_discount_convert(t2);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t2);*/
    cal_estimate_level_amts_convert();

    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").closest("td").find(".err").remove("");
    
    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#convert_invoice_convert_participantTable input[name='convert_item_rate[]']", function(){

    item_rate_change_convert(this);

    var rate_val = $(this).val();
    var qty_val = $(this).closest('.main-group').find("input[name='convert_item_qty[]']").val();
    var amt = 0;

    if(qty_val == ""){
        $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(rate_val);
    }
    if(qty_val != ""){
        if(rate_val == ""){
            $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(qty_val);
        }
        else if(rate_val != "")
        {
            if(rate_val){
                amt = qty_val * rate_val;
            }
            else{
                amt = qty_val;
            }
            $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").val(amt);
        }
        calculate_gst_amount_on_qty_rate_change_convert($(this), amt);
    }

    /*var t3 = total_amount_for_estimate_level_discount_convert(amt);
    calculate_estimate_level_discount_convert(t3);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t3 = parseFloat(t3) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t3);*/

    cal_estimate_level_amts_convert();

    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").closest("td").find(".err").remove("");

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#convert_invoice_convert_participantTable .convert_invoice_main_amount", function(){
    /*var amt = parseFloat($(this).val());
    calculate_gst_amount_on_qty_rate_change_convert($(this), amt);
    var s = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(s);
    $("#convert_total_estimate_value").val(0);
    $("#convert_total_estimate_value").val(s);*/

    /*var amt = $(this).val();
    $("#convert_total_estimate_value").val(parseFloat(amt));
    if(amt != ""){
        calculate_gst_amount_on_qty_rate_change_convert($(this), amt);
    }
    var t3 = total_amount_for_estimate_level_discount_convert(amt, 1);
    calculate_estimate_level_discount_convert(t3);

    if($("#convert_estimate_calculated_disc_amt").val()){
        t3 = parseFloat(t3) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t3);*/

    check_qty_rate_convert_invoice(this);
    cal_estimate_level_amts_convert();

    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='convert_item_convert_invoice_main_amount[]']").closest("td").find(".err").remove("");

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});

/*$(document).on("keyup", "#convert_invoice_convert_participantTable input[name='convert_item_discount_rate[]']", function(){
    
    var disc_amt = 0;
    var disc_rate_val = $(this).val();
    var amt_val = $(this).closest('tr').prev().prev().find("input[name='convert_item_convert_invoice_main_amount[]']").val();
    var drop_val = $(this).closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;


    var cur_rate_html=$(this).closest("tr").find(".rate");
    var cur_rate_val=$(this).closest("tr").find(".rate").val();
    
    // if(drop_val == 'Percentage')
    // {
    //   convert_Percentage_validation(cur_rate_html,cur_rate_val);
    // }
    // else if(drop_val == 'Amount')
    // {
    //   convert_Amount_validation(cur_rate_html,cur_rate_val, parseFloat(amt_val));
    // }

    var convert_count = 0;
    var convert_count1 = 0;

    if(drop_val=='Percentage')
    {
        if(convert_count == 0)
        {
            convert_count = convert_Percentage_validation(cur_rate_html,cur_rate_val,convert_count);
        }
    }
    else if(drop_val=='Amount')
    {
        if(convert_count1 == 0)
        {

            convert_count1 = convert_Amount_validation(cur_rate_html,cur_rate_val, parseFloat(amt_val),convert_count1);
        }
    }


    // Estimate level GST
    var selected_gst_type_estimates = $("#convert_invoice_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per_estimates = $("#convert_invoice_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var split_tax_estimate = selected_gst_per_estimates / 2;

    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert(this);

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});*/


$(document).on("click", "#convert_estimateBTN_new", function(event){
    // $('#convertEstimateForm').submit(function(event)
    // {   
        event.preventDefault();
        event.stopImmediatePropagation();

        var flag = true;
         $("#convert_invoiceno").closest("div").find(".err").text('');
        if($('#convert_invoice_billfromname').length == 0)
        {
            var chk_fromaddr_ele = $(".BillingFrom_address_and_gst").find(".BillingFrom_address_main");
            var chk_fromaddr_ele_val = chk_fromaddr_ele.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_fromgst_ele = $(".BillingFrom_address_and_gst").find(".BillingFrom_gst_main");
            var chk_fromgst_ele_val = chk_fromgst_ele.find(".custom-a11yselect-btn .custom-a11yselect-text").text();

            var fromaddr_elem_val_convert = checkconvert_dropdown_value_for_validation(chk_fromaddr_ele_val);

            if(fromaddr_elem_val_convert == 'Select')
            {
                chk_fromaddr_ele_val = 'Select Billing Entity';
            }

            var convertfromgst_elem_val = '';
            if(chk_fromgst_ele.is(":visible")){
                convertfromgst_elem_val = checkconvert_dropdown_value_for_validation(chk_fromgst_ele_val);
            }

            if(convertfromgst_elem_val == 'Select')
            {
                chk_fromgst_ele_val = 'Select GSTIN';
            }
            
            if(chk_fromaddr_ele.is(":visible") && chk_fromaddr_ele_val=="Select Billing Entity")
            {
                $("#convertEstimateForm .BillingFrom_address_main").find(".err").remove();
                $("#convertEstimateForm #convert_invoice_convert_Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#convertEstimateForm #convert_invoice_convert_Address_Details").find(".BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");  
            }
            if(chk_fromgst_ele.is(":visible") && chk_fromgst_ele_val=="Select GSTIN")
            {
                $("#convertEstimateForm .BillingFromGSTDetails_dropdown").find(".err").remove();
                $("#convertEstimateForm #convert_invoice_convert_Address_Details").find(".BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#convertEstimateForm .BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");  
            }
            if(!chk_fromaddr_ele.is(":visible") && !chk_fromgst_ele.is(":visible"))
            {
                $(".convert_invoice_convert_invoice_BillingFromAddress").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else if($('#convert_invoiceno').val() == "")
        {
            $("#convert_invoiceno").find(".err").remove();
            $("#convert_invoiceno").css('border-color', '#ad4846');
            $("#convert_invoiceno").closest("div").append("<span class='err text-danger'>Please enter invoice number</span>");
            flag = false;
        }
        else if($('#convert_invoice_date').val() == "")
        {
            $('#convert_invoice_date').closest("div").parent().find(".err").remove();
            $('#convert_invoice_date').css('border-color', '#ad4846');
            $('#convert_invoice_date').closest("div").parent().append("<span class='err text-danger'>Please enter invoice date</span>");
            flag = false;
        }
        else if($('#convert_billtoname').length == 0)
        {
            var chk_toaddr_ele = $(".BillingTo_address_and_gst").find(".convert_BillingTo_address_main");
            var chk_toaddr_ele_val = chk_toaddr_ele.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_togst_ele = $(".BillingTo_address_and_gst").find(".BillingTo_gst_main");
            var chk_togst_ele_val = chk_togst_ele.find(".custom-a11yselect-btn .custom-a11yselect-text").text();

            var toaddress_element_val = checkconvert_dropdown_value_for_validation(chk_toaddr_ele_val);

            if(toaddress_element_val == 'Select')
            {
                chk_toaddr_ele_val = 'Select Customer';
            }
            
            if(chk_togst_ele.is(":visible")){
                var togst_elem_val = checkconvert_dropdown_value_for_validation(chk_togst_ele_val);
            }
            
            if(togst_elem_val == 'Select')
            {
                chk_togst_ele_val = 'Select GSTIN';
            }
            
            if(chk_toaddr_ele.is(":visible") && chk_toaddr_ele_val=="Select Customer")
            {
                $("#convertEstimateForm .convert_BillingTo_address_main").find(".err").remove();
                $("#convertEstimateForm #convert_invoice_convert_Address_Details_BillTo").find(".convert_BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#convertEstimateForm .convert_BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");  
            }
            if(chk_togst_ele.is(":visible") && chk_togst_ele_val=="Select GSTIN")
            {
                $("#convertEstimateForm .BillingToGSTDetails_dropdown").find(".err").remove();
                $("#convertEstimateForm #convert_invoice_convert_Address_Details_BillTo").find(".BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#convertEstimateForm .BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");  
            }
            if(!chk_toaddr_ele.is(":visible") && !chk_togst_ele.is(":visible"))
            {
                $(".BillingToCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else {
            var len = $("#convert_invoice_main_details .main-group").length;
            $(".err").remove();
            for(var s=0;s<len;s++)
            {
                var current=$("#convert_invoice_main_details .main-group").eq(s);
                if(current.find("input[name='convert_item_descr[]']").val() == '')
                {
                    current.find(".convert_item_descr").closest("td").find(".err").remove();
                    current.find(".convert_item_descr").css('border-color', '#ad4846');
                    current.find(".convert_item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                    $("#convert_ToInvoiceModal").animate({ 
                        scrollTop:  $("input[name='convert_item_descr[]']").offset().top 
                    }, 100);

                    flag = false; 
                }
                /*if(current.find("input[name='item_qty[]']").val() == ''){
                    current.find(".item_qty").css('border-color', '#ad4846');
                    current.find(".item_qty").closest("td").append("<span class='err text-danger'>Quantity required</span>");

                    $("#FinanceEstimateModal").animate({ 
                        scrollTop:  $("input[name='item_qty[]']").offset().top 
                    }, 1000);

                    flag = false;
                }
                if(current.find("input[name='item_rate[]']").val() == ''){
                    current.find(".item_rate").css('border-color', '#ad4846');
                    current.find(".item_rate").closest("td").append("<span class='err text-danger'>Rate required</span>");

                    $("#FinanceEstimateModal").animate({ 
                        scrollTop:  $("input[name='item_rate[]']").offset().top 
                    }, 1000);

                    flag = false;
                }*/
                if(current.find("input[name='convert_item_convert_invoice_main_amount[]']").val() == '')
                {
                    current.find("input[name='convert_item_convert_invoice_main_amount[]']").closest("td").find(".err").remove();
                    current.find("input[name='convert_item_convert_invoice_main_amount[]']").css('border-color', '#ad4846');
                    current.find("input[name='convert_item_convert_invoice_main_amount[]']").closest("td").append("<span class='err text-danger'>Please enter amount</span>");

                    $("#convert_ToInvoiceModal").animate({ 
                        scrollTop:  $("input[name='convert_item_convert_invoice_main_amount[]']").offset().top 
                    }, 100);
                    
                    flag = false;
                }
            }
        }

        if(flag == false){
          return false;
        }
        else{
            $("#convert_estimateBTN_new").attr("disabled", "disabled");
            
            var convert_estimate_summary_value = $("#convert_estimate_summary_value").val();
            var flag1 = true;
            $("#convert_summary_error").closest('.form-group').remove();
            var sectionOffset = $('#convert_CalculateBtn').offset();
            if(convert_estimate_summary_value == 0){
                $("<div class='form-group'><span id='convert_summary_error' style='color:#ad4846;'> Calculate estimate summary</span></div>").insertAfter("#convert_CalculateBtn .form-group");
                
                $("#convert_ToInvoiceModal").animate({ 
                    scrollTop:  $("#convert_CalculateBtn").offset().top 
                }, 100);
                
                flag1 = false;
            }
            else if(convert_estimate_summary_value == 2){
                $("<div class='form-group'><span id='convert_summary_error' style='color:#ad4846;'> Calculate estimate summary again</span></div>").insertAfter("#convert_CalculateBtn .form-group");
                
                $("#convert_ToInvoiceModal").animate({ 
                    scrollTop:  $("#convert_CalculateBtn").offset().top 
                }, 100);

                flag1 = false;
            }

            if(flag1 == false){
                return false;
            }
            else{
                var formdata= $('#convertEstimateForm');
                var newFileConvInvFlag = 0;
                form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#file_convert')[0].files, function(i, file) {
                    form.append('file_convert['+i+']', file);
                    newFileConvInvFlag = 1;
                });

                if(newFileConvInvFlag)
                {
                    $("#convert_ToInvoiceModal .email-blur-effect, #convert_ToInvoiceModal .email-loader").show();
                }
                  
                $.ajax({
                    type    : "POST",
                    url     : "../../client/res/templates/financial_changes/submit_convert_to_invoice.php",
                    dataType  : "json",
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data)
                    {
                        if(data.status == "true")
                        {
                            if(newFileConvInvFlag)
                            {
                                $("#convert_ToInvoiceModal .email-blur-effect, #convert_ToInvoiceModal .email-loader").hide();
                            }
                            $.confirm({
                                title: 'Success!',
                                content: data.msg,
                                buttons: {
                                    Ok: function () {
                                        $('button[data-action="reset"]').trigger('click');
                                        $('#convert_ToInvoiceModal').modal('hide');
                                        $('#convertEstimateForm')[0].reset();
                                         $(".modal-backdrop.in").remove();
                                    }
                                }
                            });
                        }
                        else
                        {
                            $.alert({
                                title: 'Alert!',
                                content: data.msg,
                                type: 'dark',
                                typeAnimated: true,
                            });
                        }
                    }
                });
            }
        }
    // });
});

function checkconvert_dropdown_value_for_validation(str)
{
    // alert(str);
    var arr = str.match(/[A-Za-z0-9]+/g);
    // alert(JSON.stringify(arr));
    var finalString = arr[0];
    // var finalString = newString.replace(/Select/g, '');
    // if(finalString == 'Customer' || finalString == 'billling entity'){
    //     finalString = 'Select';
    // }
    // alert("finalString: "+finalString);
    return finalString;
}

// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#convert_invoice_Calculate_discounts .CGST_TR_section .convert_invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $("#convert_Calculate_IGSTandCGST_select")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $("#convert_Calculate_rate")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".GST_section .convert_invoice_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").find(".GST_section .convert_invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(this).closest("tr").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var element=$(this).closest("tr");

    var current=element.find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    if(current=="CGST")
    {
        element.next().css("display","none");

        // for rate select field of SGST
        var element1=element.next().find(".rate_data");
        var sgst_rate_id=element.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.next().find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }

    // for select gst field
    var element2=element.find(".GST_section");

    var cur_id=element.find(".GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.find(".GST_section .custom-a11yselect-menu li:first button").text();

    ResetDiscount(element2,cur_id,cur_text);

    var element3=element.find(".rate_data");
    var cgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.find(".convert_invoice_main_amount").text("");
    element.find(".convert_invoice_main_amount").text("₹ 0000.00");
    element.next().find(".convert_invoice_main_amount").text("");
    element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");
    element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#convert_invoice_Calculate_discounts .SGST_Discount .convert_invoice_remove_adddiscount',function(){
    
    // Make dropdown option selected when slect any
    // $('option:selected', $("#convert_Calculate_IGSTandCGST_select")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $("#convert_Calculate_rate")).attr('selected',false).siblings().removeAttr('selected');


    $(this).closest("tr").prev().find(".GST_section .convert_invoice_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").prev().find(".GST_section .convert_invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").prev().find(".rate_data .DiscountPer option").removeAttr('selected');
    $(this).closest("tr").prev().find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');


    var element=$(this).closest("tr");

    var current=element.prev().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    if(current=="CGST")
    {
        element.css("display","none");
        // for rate select field of SGST
        var element1=element.find(".rate_data");
        var sgst_rate_id=element.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.find(".rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }
    // for select gst field
    var element2=element.prev().find(".GST_section");
    var cur_id=element.prev().find(".GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.prev().find(".GST_section .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element2,cur_id,cur_text);

    var element3=element.prev().find(".rate_data");
    var cgst_rate_id=element.prev().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.prev().find(".rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.prev().find(".convert_invoice_main_amount").text("");
    element.prev().find(".convert_invoice_main_amount").text("₹ 0000.00");
    element.find(".convert_invoice_main_amount").text("");
    element.find(".convert_invoice_main_amount").text("₹ 0000.00");
    element.prev().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    element.prev().find(".convert_invoice_remove_adddiscount").css("display","none");
    $(this).css("display","none");
});

// Calculations of gst on item qunatity or rate change
function calculate_gst_amount_on_qty_rate_change_convert(element, amt)
{   
    var disc_type = element.closest("tr").next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var disc_rate = element.closest("tr").next().next().find(".rate").val();
    var selected_gst_type = element.closest('tr').next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().next().next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;
    var cal_disc_amt = 0;
    if(amt!=""){
        if(disc_rate!="")
        {
            if(disc_type == 'Percentage'){
                cal_disc_amt = (disc_rate/100) * amt;
                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = amt - cal_disc_amt;
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * new_cal_amt)/100;
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * new_cal_amt)/100;
                    }
                    element.closest("tr").next().next().find(".convert_invoice_main_amount").text("");
                    element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".convert_invoice_main_amount").text("");
                    element.closest("tr").next().next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".convert_invoice_main_amount").text("");
                element.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+cal_disc_amt.toFixed(2));
            }
            if(disc_type == 'Amount'){
                cal_disc_amt = parseInt(amt) - parseInt(disc_rate);
                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * cal_disc_amt)/100;  
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * cal_disc_amt)/100;
                    }
                    element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+disc_rate+".00");
            }
            element.closest("tr").next().find(".convert_invoice_main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+cal_disc_amt+"'>");
        }
        else{
            var a=$("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_gst_type = $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_tax = $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
            var split_tax = selected_tax / 2;
            var total_val=$("#convert_total_estimate_value").val();
            var cur_rate_val=$("#convert_estimate_disc_amt").val();
            var calculated_val = 0;
            if(a=="Percentage")
            {
                calculated_val = (cur_rate_val/100) * total_val;
                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = total_val - calculated_val;
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * new_cal_amt)/100;
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * new_cal_amt)/100;
                    }
                    $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            if(a=="Amount")
            {
                calculated_val = total_val - cur_rate_val;
                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * calculated_val)/100;  
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * calculated_val)/100;
                    }
                    $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find("#convert_estimate_calculated_disc_amt").val(calculated_val);
            calculated_val = calculated_val.toFixed(2);
            $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find(".convert_invoice_main_amount").text("");
            $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find(".convert_invoice_main_amount").text("₹ "+calculated_val);
            //$("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find(".convert_invoice_remove_discount").css("display","inline-block");
        }
    }
    else{
        element.closest('tr').next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
        element.closest('tr').next().find(".convert_invoice_main_amount").text("");
        element.closest('tr').next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().find(".convert_invoice_main_amount").text("");
        element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().next().find(".convert_invoice_main_amount").text("");
        element.closest("tr").next().next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
    }
}

// Change event of estimate level discount type i.e. Percentage or Amount
$(document).on("change", "#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage", function(){
    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest("tr").next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;
    var total_val = $("#convert_total_estimate_value").val();
    var cur_rate_val = $("#convert_estimate_disc_amt").val();

    var cur_rate_html=$(this).closest("tr").find("#convert_estimate_disc_amt");
    // var cur_rate_val=$(this).closest("tr").find("#convert_estimate_disc_amt").val();

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');


    var convert_count = 0;
    var convert_count1 = 0;

    if(a=='Percentage')
    {
        if(convert_count == 0)
        {
            convert_count = convert_Percentage_validation(cur_rate_html,cur_rate_val,convert_count);
        }
    }
    else if(a=='Amount')
    {
        if(convert_count1 == 0)
        {

            convert_count1 = convert_Amount_validation(cur_rate_html, cur_rate_val, parseFloat(total_val),convert_count1);
        }
    }

    cal_estimate_level_amts_convert();

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }

    /*if(a!="Select Type")
    {   
        var calculated_val = 0;
        if(a=="Percentage")
        {  
            var cur_rate_html=$(this).closest("tr").find("#convert_estimate_disc_amt");
            var cur_rate_val=$(this).closest("tr").find("#convert_estimate_disc_amt").val();
            convert_Percentage_validation(cur_rate_html,cur_rate_val);

            calculated_val = (cur_rate_val/100) * total_val;
            if(selected_gst_type && selected_gst_type != "Select Type"){
                var new_cal_amt = total_val - calculated_val;
                if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){ 
                    var new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                }
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            // $(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(calculated_val);
            $(this).closest("tr").find(".convert_invoice_main_amount").text("");
            $(this).closest("tr").find(".convert_invoice_main_amount").text("₹ "+calculated_val.toFixed(2));
        }
        if(a=="Amount")
        {
            calculated_val = total_val - cur_rate_val;
            if(selected_gst_type && selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                }
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            // $(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find(".convert_invoice_main_amount").text("");
            if(cur_rate_val!=""){
                cur_rate_val = cur_rate_val;
            }
            else { 
                cur_rate_val = '0000';
            }
            $(this).closest("tr").find(".convert_invoice_main_amount").text("₹ "+cur_rate_val+".00");
        }
        calculated_val = calculated_val.toFixed(2);
        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","inline-block");
    }
    else{
        var new_cal = 0;
        if(selected_gst_type!="Select Type"){
            if(selected_gst_type == 'IGST'){
                new_cal = (selected_gst_per * amt_val)/100;
            }
            if(selected_gst_type == 'CGST'){
                new_cal = (split_tax * amt_val)/100;
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal);            
        }
        $(this).closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
        $(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(0);
        $(this).closest('tr').find(".convert_invoice_main_amount .calculated_discount").val(0);
        $(this).closest('tr').find(".convert_invoice_main_amount").text("");
        $(this).closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".convert_invoice_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");          
    }

    var t2 = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(t2);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t2);*/

    
});

// Change event of estimate level type i.e CGST or IGST
$(document).on("change", "#convert_invoice_Calculate_discounts .convert_invoice_IGSTandCGST", function(){
    var current=$(this).closest("tr");
    var a=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    // for CGST
    var current1=current.find(".rate_data");
    var cgst_rate_id=current.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".rate_data .custom-a11yselect-menu li:first button").text();
    
    //  for SGST
    var current2=current.next().find(".rate_data");
    var sgst_rate_id=current.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var sgst_rate_text=current.next().find(".rate_data .custom-a11yselect-menu li:first button").text();

    var convert_invoice_main_amount = $("#convert_total_estimate_value").val();
    var calculated_disc = $("#convert_estimate_calculated_disc_amt").val();
    var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
    var curr_tax = $(this).closest("tr").find(".rate_data .custom-a11yselect-menu  .custom-a11yselect-selected").attr("data-val");
    var split_tax = curr_tax / 2;
    var calculated_tax_amt = 0;

    if(a=="Select Type")
    {
        $(this).closest("tr").find(".convert_invoice_remove_adddiscount").css("display","none");
        $(this).closest("tr").next().hide();

        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $(this).closest("td").next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");

        $(this).closest('td').next().find(".estimate_igst_amount").val(0);
        $(this).closest('td').next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
    }
    else if(a=='IGST')
    {
        $(this).closest("tr").find(".convert_invoice_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().hide();
        // $("#convert_invoice_Calculate_discounts .convert_invoice_remove_discount").show();
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        /*if(disc_type){
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_discount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                }
                if(disc_type == 'Amount'){
                    convert_invoice_main_amount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * convert_invoice_main_amount)/100;
                }
            }
            else{
                calculated_tax_amt = (curr_tax * convert_invoice_main_amount)/100;
            }
        }
        $(this).closest("td").next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
        $(this).closest("td").next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
        $(this).closest("td").next().find(".estimate_igst_amount").val(calculated_tax_amt);*/
    }
    else if(a=='CGST')
    {
        $(this).closest("tr").find(".convert_invoice_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().find(".convert_invoice_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().show();

        /*if(disc_type!="Select Type"){
            if(disc_type == 'Percentage'){
                amt_after_discount = convert_invoice_main_amount - calculated_disc;
                calculated_tax_amt = (split_tax * amt_after_discount)/100;
            }
            if(disc_type == 'Amount'){
                convert_invoice_main_amount = convert_invoice_main_amount - calculated_disc;
                calculated_tax_amt = (split_tax * convert_invoice_main_amount)/100;
            }
        }
        else{
            calculated_tax_amt = (split_tax * convert_invoice_main_amount)/100;
        }
        $(this).closest("td").next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("");
        $(this).closest("td").next().next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        
        $(this).closest('td').next().find(".estimate_igst_amount").val(0);
        $(this).closest('td').next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(calculated_tax_amt);*/
    

    }

    /*var t2 = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(t2);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t2);*/

    cal_estimate_level_amts_convert();

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});

// Change event of discount rate i.e 0%, 1% ..... 18% etc
$(document).on("change", "#convert_invoice_Calculate_discounts .DiscountPer", function(){
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type")
    {
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var convert_invoice_main_amount = $("#convert_total_estimate_value").val();
        var calculated_disc = $("#convert_estimate_calculated_disc_amt").val();
        var disc_type = $(this).closest("td").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
        
        var split_tax = curr_tax / 2;
        var amt_after_estimate_discount = 0;
        var calculated_tax_amt = 0;

        if(a == 'IGST'){
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_estimate_discount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * amt_after_estimate_discount)/100;
                }
                if(disc_type == 'Amount'){
                    convert_invoice_main_amount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * convert_invoice_main_amount)/100;
                }
            }
            if(disc_type==""){
                calculated_tax_amt = (curr_tax * convert_invoice_main_amount)/100;
            }
            $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
            $(this).closest("td").find(".estimate_igst_amount").val(calculated_tax_amt);
        }
        if(a == 'CGST'){
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_estimate_discount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * amt_after_estimate_discount)/100;
                }
                if(disc_type == 'Amount'){
                    convert_invoice_main_amount = convert_invoice_main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * convert_invoice_main_amount)/100;
                }
            }
            if(disc_type==""){
                calculated_tax_amt = (split_tax * convert_invoice_main_amount)/100;
            }
            $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".estimate_igst_amount").val(0);
            $(this).closest("td").find(".estimate_cgst_amount, .estimate_sgst_amount").val(calculated_tax_amt);
            $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }

    var t2 = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(t2);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t2);*/
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();

    if($("#convert_estimate_subtotal_amount").val()!=0){
        $("#convert_estimate_summary_value").val(2);
    }
});

// Keyup Event for discount rate of estimate level (i.e input box)
$(document).on("keyup", "#convert_estimate_disc_amt", function(event){

      event.preventDefault();
      event.stopImmediatePropagation();

      var a=$(this).closest('tr').find(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
      var split_tax = selected_tax / 2;
      var convert_invoice_main_amount = $("#convert_total_estimate_value").val();
      var calculated_disc = $("#convert_estimate_calculated_disc_amt").val();
      var cur_rate_val = $(this).val();
      var cur_html=$(this);


      var convert_count = 0;
      var convert_count1 = 0;

      if(a!="Select Type")
      {
        if(cur_rate_val)
        {
            var calculated_val = 0;
            var new_cal_amt = 0;
            var amt_after_estimate_discount = 0;
            var calculated_tax_amt = 0;
            if(a=="Percentage")
            {
                var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                // convert_Percentage_validation(cur_html,cur_rate_val);

                if(convert_count == 0)
                {
                    convert_count = convert_Percentage_validation(cur_html,cur_rate_val,convert_count);
                }
            }
            if(a=="Amount")
            {
                var main_amt = $("#convert_total_estimate_value").val();
                // convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));    

                if(convert_count1 == 0)
                {

                    convert_count1 = convert_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt),convert_count1);
                }
            }
        }
        else{
            /*var new_cal = 0;
            if(selected_gst_type!="Select Type"){
                if(selected_gst_type == 'IGST'){
                    new_cal = (selected_tax * convert_invoice_main_amount)/100;
                }
                if(selected_gst_type == 'CGST'){
                    new_cal = (split_tax * convert_invoice_main_amount)/100;
                }
                new_cal = new_cal.toFixed(2);
                $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal);
                $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal);
                //$(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(convert_invoice_main_amount);
            }
            else{
                $(this).closest("td").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
            }
            $(this).closest("tr").find("#convert_estimate_calculated_disc_amt").val(convert_invoice_main_amount);*/
        }
    }
    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();
});

// Click event of delete button icon in a row of label says - Discount (At estimate level)
$(document).on('click','#convert_invoice_Calculate_discounts .convert_invoice_remove_discount',function(){

    $(this).closest("tr").find(".discount_section .convert_invoiceEstimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .convert_invoiceEstimate_Percentage option[value='']").attr('selected','selected');

    var element=$(this).closest("tr");
    element.find(".rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".convert_invoice_main_amount").text("₹ 0000.00");

    var main_amt = $("#convert_total_estimate_value").val();
    var applied_tax = element.next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = element.next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type")
    { //alert("applied_tax ="+applied_tax+" === tax_type ="+tax_type);
        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
            element.next().next().find(".estimate_igst_amount").val(new_cal_amt);
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            element.next().next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(new_cal_amt);
        }
        element.next().find(".convert_invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
        if(element.find(".rate").val()!=""){
          element.find("#convert_estimate_calculated_disc_amt").val(new_cal_amt);
        }
        else{
          element.find("#convert_estimate_calculated_disc_amt").val(0);
        }
        element.next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
    }
    else{
        element.next().find(".convert_invoice_main_amount").text("");
        element.next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.next().next().find(".convert_invoice_main_amount").text("");
        element.next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
        element.find(".convert_invoice_main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
        element.next().next().find("#convert_estimate_calculated_disc_amt").val(0);
    }
    /*var s = total_amount_for_estimate_level_discount_convert();
    calculate_estimate_level_discount_convert(s);
    $("#convert_total_estimate_value").val(0);
    if($("#convert_estimate_calculated_disc_amt").val()){
        s = parseFloat(s) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(s);*/

    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();
});

// total amount calculation
function total_amount_for_estimate_level_discount_convert(amt='', $yesVal='')
{
    // var no=$("#convertEstimateForm .convert_participantRow .main-group").length;
    var no_convert=$("#convert_total_items").val();
    // var total_amt_convert = ($yesVal) ? $("#convert_total_estimate_value").val() : 0;
    var total_amt_convert = 0;
    var discount_amt = 0;
    for(var n=0;n<no_convert;n++)
    {
        var current_convert=$("#convertEstimateForm #convert_invoice_convert_participantTable .convert_participantRow .main-group").eq(n);
        var curr_amt_convert=current_convert.find(".convert_invoice_main_amount").val();
        var discount_amt_convert=current_convert.next().next().find(".calculated_discount").val();
        var curr_rate_val_convert=current_convert.next().next().find(".rate").val();
        var disc_type_convert = current_convert.next().next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');

        if(curr_amt_convert!=0 && disc_type_convert=="" && curr_rate_val_convert=="")
        {   
            total_amt_convert = parseFloat(total_amt_convert) + parseFloat(curr_amt_convert);
        }
        if(curr_amt_convert!=0 && (disc_type_convert=="Percentage" || disc_type_convert=="Amount"))
        {
            if(curr_rate_val_convert===""){
                total_amt_convert = parseFloat(total_amt_convert) + parseFloat(curr_amt_convert);
            }
            else {
                total_amt_convert = parseFloat(total_amt_convert) + parseFloat(discount_amt_convert);
            }
        }
        if(curr_amt_convert==0){
            total_amt_convert = 0;
        }
        /*if(curr_rate_val_convert)
        {
            if(curr_amt_convert)
            {
                if(discount_amt_convert)
                {
                    var disc_type_convert = current.next().next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type_convert == 'Percentage'){
                        discount_amt_convert = curr_amt_convert - discount_amt_convert;
                    }
                    if(disc_type_convert == 'Amount'){
                        discount_amt_convert = (discount_amt_convert!=0) ? discount_amt_convert : curr_amt_convert;
                    }
                    total_amt_convert = parseFloat(total_amt_convert) + parseFloat(discount_amt_convert);
                }
                else
                {
                    total_amt_convert = parseFloat(total_amt_convert) + parseFloat(curr_amt_convert);
                }
            }
            else{
                total_amt_convert = 0;
            }
        }
        else{
            if(curr_amt_convert)
            {
                if(discount_amt_convert)
                {
                    var disc_type_convert = current_convert.next().next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type_convert == 'Percentage'){
                        discount_amt_convert = curr_amt_convert - discount_amt_convert;
                    }
                    if(disc_type_convert == 'Amount'){
                        discount_amt_convert = (discount_amt_convert!=0) ? discount_amt_convert : curr_amt_convert;
                    }
                    total_amt_convert = parseFloat(total_amt_convert) + parseFloat(discount_amt_convert);
                }
                else
                {   
                    total_amt_convert = parseFloat(total_amt_convert) + parseFloat(curr_amt_convert);
                }
            }
            else{
                total_amt_convert = 0;
            }
        }*/
    }
    return total_amt_convert;
}

// Function to get all all item rows main total
function get_all_item_rows_main_total()
{
    var no=$("#convert_total_items").val();
    var rows_total_amt = 0;
    var rows_disc_amt = 0;
    for(var s=0;s<no;s++)
    {
        var current = $("#convertEstimateForm .convert_participantRow .main-group .convert_invoice_main_amount").eq(s).val();

        if(current){
            rows_total_amt = parseFloat(rows_total_amt) + parseFloat(current);
        }
        else{
            rows_total_amt = parseFloat(rows_total_amt) + 0;
        }
    }
    $('input[name^="calculated_discount"]').each(function() {
        rows_disc_amt = parseFloat(rows_disc_amt) + parseFloat($(this).val());
    });
    //alert("rows_total_amt: "+rows_total_amt+" === current: "+current+" === rows_disc_amt: "+rows_disc_amt);
    rows_total_amt = parseFloat(rows_total_amt) - parseFloat(rows_disc_amt);
    return rows_total_amt;
}

// Function calculate estimate level discount
function calculate_estimate_level_discount_convert(total_val, item_level='')
{   
    var element = $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage");
    var a = $("#convert_convert_invoiceEstimate_Percentage_select-selected").text();
    // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $("#convert_Calculate_IGSTandCGST_select-selected").text();
    // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    if(item_level!=""){
        var no = $("#convert_total_items").val();
        var main_total = 0;
        var total_discount_total = 0;
        for(var m=0;m<no;m++){
           var element = $("#convertEstimateForm .convert_participantRow .main-group .convert_invoice_main_amount").eq(m);
           var main_total_amount = element.val();
           main_total = parseFloat(main_total) + parseFloat(main_total_amount);

           var cur_discounted_val = element.closest("tr").next().next().find(".calculated_discount").val();
           total_discount_total = parseFloat(total_discount_total) + parseFloat(cur_discounted_val);

           // var cur_disc_rate = element.closest("tr").next().next().find(".rate").val();
           // total_val = parseFloat(total_val) + parseFloat(cur_discounted_val);
        }
        total_val = main_total - total_discount_total;
        //alert("main_total : "+main_total+" === total_discount_total: "+total_discount_total+" === total_val: "+total_val);

        if(a!="Select Type"){
            var calculated_val = 0;
        }
    }
    else {
        var element = $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage");
        var cur_rate_val = element.closest("tr").find("#convert_estimate_disc_amt").val();

        if($("#convert_estimate_calculated_disc_amt").val() === 0){
            cur_rate_val = total_val;
        }
        // var a=element.closest("#convert_invoice_Calculate_discounts .discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        /*var a = $("#convert_convert_invoiceEstimate_Percentage_select-selected").text();
        
        // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var selected_gst_type = $("#convert_Calculate_IGSTandCGST_select-selected").text();
        // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var selected_tax = element.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
        var split_tax = selected_tax / 2;*/
        /*if(a!="Select Type")
        {
            var calculated_val = 0;
            if(total_val!=0)
            {
                if(a=="Percentage")
                {
                    calculated_val = (cur_rate_val/100) * total_val;
                    if(selected_gst_type != "Select Type"){
                        var new_cal_amt = total_val - calculated_val;
                        if(selected_gst_type == 'IGST'){
                          var new_cal = (selected_tax * new_cal_amt)/100;
                          element.closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                        }
                        if(selected_gst_type == 'CGST'){
                          var new_cal = (split_tax * new_cal_amt)/100;
                          element.closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                        }
                        element.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                        element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    element.closest("tr").find(".convert_invoice_main_amount").text("₹ "+calculated_val.toFixed(2));
                    element.closest("tr").find("#convert_estimate_calculated_disc_amt").val(calculated_val);
                }
                if(a=="Amount")
                {
                    calculated_val = total_val - cur_rate_val;
                    if(selected_gst_type != "Select Type"){
                        if(selected_gst_type == 'IGST'){
                          var new_cal = (selected_tax * calculated_val)/100;
                          element.closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                        }
                        else if(selected_gst_type == 'CGST'){
                          var new_cal = (split_tax * calculated_val)/100;
                          element.closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                        }
                        else{
                            var new_cal = calculated_val;
                        }
                        element.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                        element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    if($("#convert_estimate_disc_amt").val()!=""){
                        var est_disc_amt = $("#convert_estimate_disc_amt").val();
                    }
                    else{
                        var est_disc_amt = "0000";
                    }
                    element.closest("tr").find(".convert_invoice_main_amount").text("₹ "+est_disc_amt+".00");
                    element.closest("tr").find("#convert_estimate_calculated_disc_amt").val(cur_rate_val);
                }
            }
            else{
                $("#convert_estimate_calculated_disc_amt").val(0);
                element.closest("tr").find(".convert_invoice_main_amount").text("");
                element.closest("tr").find(".convert_invoice_main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".convert_invoice_main_amount").text("");
                element.closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                element.closest("tr").next().next().find(".convert_invoice_main_amount").text("");
                element.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
            }
        }*/ 
    }

}

// Function fo calculations on percentage reset
function convert_reset_percentage_validation(cur_html,cur_rate_val,main_amt=''){
    var disc_amt = 0;
    var disc_rate_val = (cur_rate_val > 0 && cur_rate_val < 100) ? cur_rate_val : 0;
    if(main_amt==''){
        var amt_val = cur_html.closest('tr').prev().find("input[name='item_convert_invoice_main_amount[]']").val();
    }
    else{    
        var amt_val = main_amt;
    }
    var drop_val = cur_html.closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = cur_html.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = cur_html.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    
    if(amt_val != ""){
        if(disc_rate_val!=""){
            if(drop_val == "Percentage"){
                disc_amt = (disc_rate_val/100) * amt_val;

                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = amt_val - disc_amt;
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                }
                cur_html.closest('tr').find(".convert_invoice_main_amount").text("");
                cur_html.closest('tr').find(".convert_invoice_main_amount").text("₹ "+disc_amt.toFixed(2));

            }
            if(drop_val == "Amount"){
                disc_amt = parseInt(amt_val) - parseInt(disc_rate_val);

                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                cur_html.closest('tr').find(".convert_invoice_main_amount").text("");
                cur_html.closest('tr').find(".convert_invoice_main_amount").text("₹ "+disc_rate_val+".00");

            }
            cur_html.closest('tr').find(".convert_invoice_main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='"+disc_amt+"'>");
        }
        else
        {   
            if(selected_gst_type!="Select Type"){
                if(disc_rate_val==""){
                    cur_html.closest('tr').find(".convert_invoice_main_amount").text("");  
                    cur_html.closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");  
                }
                if(selected_gst_type == 'IGST'){
                  var new_cal = (selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                  var new_cal = (split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                  cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                }
                cur_html.closest("tr").next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                cur_html.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ "+new_cal.toFixed(2));

            }
            else
            {   
                cur_html.closest("tr").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".convert_invoice_main_amount").text("₹ 0000.00");
                cur_html.closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".convert_invoice_main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
            }
        }
    }

    /*var t1 = total_amount_for_estimate_level_discount_convert(0,0);
    calculate_estimate_level_discount_convert(t1);
    $("#convert_total_estimate_value").val(0);
    if($("#convert_estimate_calculated_disc_amt").val()){
        t1 = parseFloat(t1) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
    }
    $("#convert_total_estimate_value").val(t1);*/

    $("#convert_estimate_summary_value").val(2);
    cal_estimate_level_amts_convert();
}

// Calculate overall estimate summary
function calculate_estimate_summary_convert()
{
    var total_convert_invoice_main_amount = 0;
    // var len = $("#convertEstimateForm .convert_participantRow .main-group").length;
    var len = $("#convert_total_items").val();
    var disc_type = $('#convert_invoice_convert_participantTable .discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
    var convert_invoice_main_amount = 0;
    var total_taxes = 0;
    var total_disc = 0;
    var total_calculated_disc = 0;
    var flag = true;
    for(s=0;s<len;s++){ 
        var current=$("#convertEstimateForm .convert_participantRow .main-group").eq(s);
        var curr_amt=current.find(".convert_invoice_main_amount").val();
        if(curr_amt)
        {
            var disc_type = current.next().next().find(".discount_section .convert_invoiceEstimate_Percentage").val();
            if(disc_type == ''){
                var disc_amt = 0;
            }
            if(disc_type == 'Percentage'){
                var disc_amt = current.next().next().find(".convert_invoice_main_amount .calculated_discount").val();
            }
            else if(disc_type == 'Amount'){
                var disc = current.next().next().find(".convert_invoice_main_amount .calculated_discount").val();
                if(disc!=0){
                    var disc_amt = parseFloat(curr_amt) - parseFloat(disc);
                }
                else {
                    var disc_amt = 0;
                }
            }
            // var disc_amt = current.find(".convert_invoice_main_amount .calculated_discount").val();
            var current1 = $("#convertEstimateForm .convert_participantRow .CGST_TR_section").eq(s);
            var curr_igst= current1.find(".item_igst_amount").val();
            var curr_cgst= current1.find(".item_cgst_amount").val();
            var curr_sgst= current1.find(".item_sgst_amount").val();
            total_taxes  = parseFloat(total_taxes) + parseFloat(curr_igst) + parseFloat(curr_cgst) + parseFloat(curr_sgst);

            convert_invoice_main_amount  = parseFloat(convert_invoice_main_amount) + parseFloat(curr_amt);

            total_calculated_disc = parseFloat(total_calculated_disc) + parseFloat(disc_amt);
        }
    }
    // alert(total_calculated_disc);
    if(flag == true){

        /*if($("#convert_total_estimate_value").val()!=0 && $("#convert_total_estimate_value").val()!=convert_invoice_main_amount){
            var total_disc = parseFloat(convert_invoice_main_amount) - parseFloat($("#convert_total_estimate_value").val());
            var estimate_disc = 0;
        }
        if($("#convert_total_estimate_value").val()===convert_invoice_main_amount){
            var total_disc = parseFloat($("#convert_estimate_calculated_disc_amt").val());
            var estimate_disc = 0;
        }
        else {
            var total_disc = parseFloat($("#convert_estimate_calculated_disc_amt").val());
            var estimate_disc = $("#convertEstimateForm").find("#convert_estimate_calculated_disc_amt").val();
        }*/

        if(total_calculated_disc!=0){
            var total_disc = parseFloat(total_calculated_disc);
        }
        else {
            var total_disc = 0;
        }
        
        if($("#convert_estimate_calculated_disc_amt").val() == ""){
            var estimate_calculated_disc_amt = 0;
        }
        else {
            var estimate_calculated_disc_amt = $("#convert_estimate_calculated_disc_amt").val();
        }
        // var total_disc = parseFloat(convert_invoice_main_amount) - parseFloat($("#convert_total_estimate_value").val());

        var total_disc = parseFloat(convert_invoice_main_amount) - parseFloat($("#convert_total_estimate_value").val());

        var estimate_disc = $("#convert_estimate_calculated_disc_amt").val();
        // var estimate_disc=$("#convertEstimateForm").find("#convert_estimate_calculated_disc_amt").val();
        var estimate_igst=$("#convertEstimateForm #convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val();
        var estimate_cgst=$("#convertEstimateForm #convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val();
        var estimate_sgst=$("#convertEstimateForm #convert_invoice_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val();
        
        total_disc = parseFloat(total_disc) + parseFloat(estimate_disc);
        total_taxes = parseFloat(total_taxes) + parseFloat(estimate_igst) + parseFloat(estimate_cgst) + parseFloat(estimate_sgst);
        
        // alert("convert_invoice_main_amount: "+convert_invoice_main_amount+" = convert_total_estimate_value: "+$("#convert_total_estimate_value").val()+" = estimate_disc: "+estimate_disc+" = estimate_igst: "+estimate_igst+" = estimate_cgst: "+estimate_cgst+" = estimate_sgst: "+estimate_sgst+" = total_disc: "+total_disc);
        // return false;

        var element = $("#convert_estimate_calculation #convert_invoice_main_calculation");
        element.find(".estimate_subtotal").text("");

        if(convert_invoice_main_amount!=0){
            element.find(".estimate_subtotal").text("₹ "+convert_invoice_main_amount.toFixed(2));
        }
        else{
            element.find(".estimate_subtotal").text("₹ 0000.00");
        }
        element.find("#convert_estimate_subtotal_amount").val(convert_invoice_main_amount);
        element.find(".estimate_total_discount").text("");
        
        if(total_disc!=0){
            element.find(".estimate_total_discount").text("₹ "+total_disc.toFixed(2));
        }
        else{
            element.find(".estimate_total_discount").text("₹ 0000.00");
        }
        element.find("#convert_estimate_totaldiscount_amount").val(total_disc);
        element.find(".estimate_total_taxes").text("");

        if(total_taxes!=0){
            element.find(".estimate_total_taxes").text("₹ "+total_taxes.toFixed(2));
        }
        else {
            element.find(".estimate_total_taxes").text("₹ 0000.00");
        }
        element.find("#convert_estimate_totaltaxes_amount").val(total_taxes);

        var gross_total = parseFloat(convert_invoice_main_amount) - parseFloat(total_disc) + parseFloat(total_taxes);
        element.find(".estimate_total_amount").text("");

        if(gross_total!=0){
            element.find(".estimate_total_amount").text("₹ "+gross_total.toFixed(2));
        }
        else {
            element.find(".estimate_total_amount").text("₹ 0000.00");
        }
        element.find("#convert_estimatetotal_amount").val(gross_total);
        $("#convert_estimate_calculation #convert_CalculateBtn").find("#convert_estimate_summary_value").val(1);
        $("#convert_summary_error").closest('.form-group').remove();
    }
    else{
        var element = $("#convert_estimate_calculation #convert_invoice_main_calculation");
        element.find(".estimate_subtotal").text("");
        element.find(".estimate_subtotal").text("₹ 0000.00");
        element.find("#convert_estimate_subtotal_amount").val(0);
        element.find(".estimate_total_discount").text("");
        element.find(".estimate_total_discount").text("₹ 0000.00");
        element.find("#convert_estimate_totaldiscount_amount").val(0);
        element.find(".estimate_total_taxes").text("");
        element.find(".estimate_total_taxes").text("₹ 0000.00");
        element.find("#convert_estimate_totaltaxes_amount").val(0);
        element.find(".estimate_total_amount").text("");
        element.find(".estimate_total_amount").text("₹ 0000.00");
        element.find("#convert_convert_estimatetotal_amount").val(0);
        element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    }
}


$(document).on("change", ".convert_invoice_select_account", function(){
    var sel_id = $('#convert_invoice_select_account  option:selected').data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_single_bankdetails.php?id="+sel_id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {   
                $(".convert_invoice_select_account_main").hide();
                $(".convert_invoice_select_account").hide();
                $("#convert_invoice_select_account-button").hide();
                $(".convert_Invoice_AccountDetails").show();
                $(".convert_Invoice_AccountDetails_Link").show();

                // Bank account holder
                $("#convert_bank_holder_name").remove();
                $("#convert_Holder_name").html("<span><b>A/C Holder Name: </b>"+data.beneficiary_name+"</span>");
                $("#convert_Holder_name").append("<input type='hidden' name='convert_bank_holder_name' id='convert_bank_holder_name' value='"+data.beneficiary_name+"' />");

                // Bank name
                $("#convert_bank_name_fld").remove();
                $("#convert_bank_name").html("<span><b>Bank Name: </b>"+data.bank_name+"</span>");
                $("#convert_bank_name").append("<input type='hidden' name='convert_bank_name' id='convert_bank_name_fld' value='"+data.bank_name+"' />");
                
                // Bank account number
                $("#convert_account_no_fld").remove();
                $("#convert_acc_no").html("<span><b>Account No.: </b>"+data.account_no+"</span>");
                $("#convert_acc_no").append("<input type='hidden' name='convert_account_no' id='convert_account_no_fld' value='"+data.account_no+"' />");
                
                // IFSC Code
                $("#convert_IFSCcode_fld").remove();
                $("#convert_IFSC_Code").html("<span><b>IFSC Code: </b>"+data.ifsc_code+"</span>");
                $("#convert_IFSC_Code").append("<input type='hidden' name='convert_IFSCcode' id='convert_IFSCcode_fld' value='"+data.ifsc_code+"' />");
                
                // Bank account type
                $("#convert_bank_accType_fld").remove();
                $("#convert_accountType").html("<span><b>Account Type: </b>"+data.account_type+"</span>");
                $("#convert_accountType").append("<input type='hidden' name='convert_bank_accType' id='convert_bank_accType_fld' value='"+data.account_type+"' />");

                // Bank UPI
                if(data.upi_id!=""){
                    $("#convert_bank_UPI_fld").remove();
                    $("#convert_UPI").html("<span><b>UPI: </b>"+data.upi_id+"</span>");
                    $("#convert_UPI").append("<input type='hidden' name='convert_bank_UPI' id='convert_bank_UPI_fld' value='"+data.upi_id+"' />");
                }
            }
            else
            {   
                $(".convert_invoice_select_account_main").hide();
                $(".convert_Invoice_AccountDetails").hide();
            }
        }
    });
});

   

$(document).on("click", ".convert_Invoice_AccountDetails_Link", function(){

    $(".convert_Invoice_AccountDetails").hide();
    $(".convert_invoice_select_account_main").show();
    $(".convert_Invoice_AccountDetails_Link").hide();
    // $(".convert_invoice_select_account").show();
    $(".convert_invoice_select_account").customA11ySelect();
    $("#convert_invoice_select_account-button").show();
    $("#convert_invoice_select_account-button").show();
    $(".convert_Invoice_AccountDetails_Link").show();

    get_all_banks_details_convert($("#convert_bill_id").val());


});

// $(document).on("click", ".convert_invoice_select_account_main", function(){
// // alert("hi");
//     get_all_banks_details_convert($("#convert_bill_id").val());

// });

$(document).on("click", ".convert_diff_billing_entity", function(){
// alert("hi");
$(".convert_Invoice_AccountDetails").hide();
$(".convert_invoice_select_account_main").show();
$("#convert_invoice_select_account-button").show();
get_all_banks_details_convert($("#convert_bill_id").val());

});

function get_all_banks_details_convert(id){

    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_all_banks.php?id="+id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data)
            {   
                if(data.total_num == 1)
                {
                    $(".convert_invoice_select_account").hide();
                    $(".convert_Invoice_AccountDetails_Link").hide();
                    $(".convert_invoice_select_account_main").hide();
                    $(".convert_Invoice_AccountDetails").show();

                    // Account holder name
                    $("#convert_bank_holder_name").remove();
                    $("#convert_Holder_name").html("<span><b>A/C Holder Name: </b>"+data.beneficiary_name+"</span>");
                    $("#convert_Holder_name").append("<input type='hidden' name='convert_bank_holder_name' id='convert_bank_holder_name' value='"+data.beneficiary_name+"' />");

                    // Bank name
                    $("#convert_bank_name_fld").remove();
                    $("#convert_bank_name").html("<span><b>Bank Name: </b>"+data.bank_name+"</span>");
                    $("#convert_bank_name").append("<input type='hidden' name='convert_bank_name' id='convert_bank_name_fld' value='"+data.bank_name+"' />");

                    // Bank account number
                    $("#convert_account_no_fld").remove();
                    $("#convert_acc_no").html("<span><b>Account No.: </b>"+data.account_no+"</span>");
                    $("#convert_acc_no").append("<input type='hidden' name='convert_account_no' id='convert_account_no_fld' value='"+data.account_no+"' />");

                    // IFSC Code
                    $("#convert_IFSCcode_fld").remove();
                    $("#convert_IFSC_Code").html("<span><b>IFSC Code: </b>"+data.ifsc_code+"</span>");
                    $("#convert_IFSC_Code").append("<input type='hidden' name='convert_IFSCcode' id='convert_IFSCcode_fld' value='"+data.ifsc_code+"' />");

                    // Bank account type
                    $("#convert_bank_accType_fld").remove();
                    $("#convert_accountType").html("<span><b>Account Type: </b>"+data.account_type+"</span>");
                    $("#convert_accountType").append("<input type='hidden' name='convert_bank_accType' id='convert_bank_accType_fld' value='"+data.account_type+"' />");

                    // Bank UPI
                    if(data.upi_id!=""){
                        $("#convert_bank_UPI_fld").remove();
                        $("#convert_UPI").html("<span><b>UPI: </b>"+data.upi_id+"</span>");
                        $("#convert_UPI").append("<input type='hidden' name='convert_bank_UPI' id='convert_bank_UPI_fld' value='"+data.upi_id+"' />");
                    }
                }
                else if(data.total_num > 1)
                {
                    $("#convert_Holder_name").html("");
                    $(".convert_invoice_select_account").hide();
                    $(".convert_Invoice_AccountDetails_Link").hide();
                    $(".convert_Invoice_AccountDetails").hide();

                    // $(".convert_invoice_select_account").customA11ySelect();
                    $(".convert_invoice_select_account").empty().append('<option value="">Select Account</option>');
                    $(".convert_invoice_select_account_main select").append(data.str_opt);
                    $("#convert_invoice_select_account").customA11ySelect('refresh');
                    $(".convert_invoice_select_account").hide();
                }
                else
                {   
                    $("#convert_invoice_select_account").hide();  
                    $(".convert_invoice_select_account_main").show();
                }
            }
        }
    });
}

//file Upload
$(document).on("change",".convert-custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#convertEstimateForm");
    form_data = new FormData(form_data[0]);
    jQuery.each(jQuery('#file_convert')[0].files, function(i, file) {
        form_data.append('file_convert['+i+']', file);
    });
    form_data.append('methodName', 'convert_file_upload');
    $.ajax({
        type : "POST",
        url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
        dataType : "json",
        data : form_data,
        processData: false,
        contentType: false,
        success: function(data)
        {
            
        }
    });
});

function getconvertFilenames(){
        
        $fileHtml="";
        var files = $('#file_convert').prop("files");
        // console.log(files);
        var names = $.map(files, function(val) { 
        var fileName = val.name
        fileName=fileName.replace(/ /g,"_");  

        var regex = new RegExp("(.*?)\.(jpeg|JPEG|jpg|JPG|png|PNG|doc|DOC|docx|DOCX|xls|XLS|xlsx|XLSX|pdf|PDF|zip|ZIP|rar|RAR|txt|TXT|csv|CSV)$");

        if (!(regex.test(fileName))) {
                /*$.alert({
                    title: 'Alert!',
                    content: "File format of file "+fileName+" not supported",
                    type: 'dark',
                    typeAnimated: true,
                });*/
                $fileHtml= $fileHtml+"<li class='wrongFileFormat'><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span style='color:#ad4846;'>File format not supported</span></div></li>";

                setTimeout(function () {
                    $("li.wrongFileFormat").remove();
                }, 1000);
            }
            else{
                $fileHtml= $fileHtml+"<li><div class='col-xs-6 col-sm-6 col-md-6'>"+fileName+"</div><div class='col-xs-6 col-sm-6 col-md-6'><span class='material-icons-outlined convert_unLinkfile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='convert_unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
            }
        
        });
        $(".convert_filesList").append($fileHtml);
    }

function convert_unLinkfile(event){
    $(event).closest("li").remove();
    var deleteFile = $(event).closest("span").attr("data-name");

    // ------------ Delete file name from hidden field value ----------
    var uploadedFiles = $("#convert_invoice_main_details #selected_files").val();
    var fileArray = uploadedFiles.split(",");
    var newArray = [];
    for(var m =0; m < fileArray.length; m++)
    {
        newArray.push($.trim(fileArray[m]));
    }
    newArray = $.grep(newArray, function(value) {
      return value != deleteFile;
    });
    $("#convert_invoice_main_details #selected_files").val(newArray);
    // ------------ Delete file name from hidden field value ----------
    
    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
        dataType : "json",
        data : { methodName: "delete_current_convert_file", deleteFile: deleteFile},

        success: function(data)
        {
        	$("#file_convert").val('');
        }
    });
}

function convert_deleteAll_unLinkfile(event){
    $("#convert_ToInvoiceModal #filelist .list-unstyled li").remove();
    var deleteFile = $(event).closest("span").attr("data-name");
    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : { methodName: "estimate_deleteFolder"},

        success: function(data)
        {
        }
    });
}

$(document).on("click", "#convert_ToInvoiceModal .close", function(){
    convert_deleteAll_unLinkfile(this);
});

// $(document).on("click","data-action=['Edit_invoice']",function(){
$('.action[data-action=Convert]').unbind().click(function(){
$.ajax({
type : "GET",
url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
dataType : "json",
data : { methodName: "deleteFolder"},

success: function(data)
{
}
});
});


$(document).on("click", ".delete_file", function (e){
    e.stopImmediatePropagation();
    var dataId = $(this).attr("data-id");
            // alert(dataId);
          // if(removeFileCount==12){
             $.confirm({

              title: 'Warning!',
              content: 'Are you sure want to remove file from server!',
              buttons: {
                Yes: function () {
                
                  $.ajax({
                      url: "../../client/res/templates/financial_changes/remove_estimate_file.php?id="+dataId,
                      type: "get", 
                      async: false,
                      success: function(result)
                       {
                          
                            if(result==1)
                             {
                                 $.confirm({
                                  title: 'Success!',
                                    content: 'File removed successfully from server!',
                                    buttons: {
                                      Ok: function () {
                                          // $("#" + dataId).closest(".row").remove();
                                          // $(this).closest('.li').remove();

                                        // return false;
                                        // window.location.reload();\
                                        var elem = document.getElementById(dataId+"1");
                                        elem.parentNode.removeChild(elem);
                                       
                                    }
                                  }
                                 });
                             }
                             else if(result==0)
                             {
                                $.confirm({
                                    title: 'Warning!',
                                    content: 'Failed to remove file!',
                                    buttons: {
                                      Ok: function () {
                                      }
                                    }
                                });
                             }
                       }
                    });
         
                  },
                  No: function () {
           
                  }
                }
         
            });
            // removeFileCount=0;
             // }
            // removeFileCount++;
          });  

function resetHiddenFields_convert()
{
    $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount, #convert_total_estimate_value, #convert_estimate_summary_value, #Selected_disc_hidden_val, #Selected_gst_hidden_val, #convert_estimate_subtotal_amount, #convert_estimate_totaldiscount_amount, #convert_estimate_totaltaxes_amount, #convert_estimatetotal_amount, #convert_estimate_calculated_disc_amt").val(0);
}

function check_qty_rate_convert_invoice(elem)
{   
    var convert_item_rate = $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val();

    var convert_item_qty = $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val();

    var convert_item_main_amt = $(elem).closest(".main-group").find("input[name='convert_item_convert_invoice_main_amount[]']").val();

    var main_amt_cal_convert = parseFloat(convert_item_rate) * parseFloat(convert_item_qty);

    if((convert_item_main_amt!="" && main_amt_cal_convert != convert_item_main_amt) || main_amt_cal_convert == ""){
        $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val("");
        $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val("");
    }
    else if(convert_item_rate == "" || convert_item_rate == "NaN" || convert_item_rate == 0){
        // $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val(1);
        $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val('');
    }
}

function item_rate_change_convert(elem)
{   
    var convert_item_qty = $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val();
    var convert_item_rate = $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val();
    if(convert_item_rate != ""){
        if(convert_item_qty == "" || convert_item_qty == "NaN" || convert_item_qty == 0){
            $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val("");
    }*/
}

function item_qty_change_convert(elem)
{   
    var convert_item_qty = $(elem).closest(".main-group").find("input[name='convert_item_qty[]']").val();
    var convert_item_rate = $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val();
    if(convert_item_qty != ""){
        if(convert_item_rate == "" || convert_item_rate == "NaN" || convert_item_rate == 0){
            $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='convert_item_rate[]']").val("");
    }*/
}

function cal_estimate_level_amts_convert(elem='')
{
    var len_convert = $("#convert_total_items").val();
    var final_total_amt_convert = 0;
    var total_amt_convert = 0;
    var total_disc_convert = 0;

    var amt_after_disc_convert = 0;
    var cal_disc_amt_convert = 0;
    var cal_tax_convert = 0;
    var val_for_tax_convert = 0;
    var new_final_total_amt_convert = 0;
    var new_cal_convert = 0;
    var validation_cnt_convert = 0;
    var disc_rate_convert = 0;
    for(var t=0;t<len_convert;t++)
    {
        var items_main_amt_convert = 0;
        var disc_type_convert = "";
        var gst_type_convert = "";
        var gst_rate_convert = 0;
        var get_db_rate_val = 0;
        var get_db_disctype_val = 0;

        var edit_is_empty = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").find('.convert_invoice_main_amount').eq(t).val();
        if(edit_is_empty == '' || edit_is_empty == 'NaN'){
            total_amt_convert = parseFloat(total_amt_convert) + 0;    
        }
        else {
            total_amt_convert = parseFloat(total_amt_convert) + parseFloat($("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").find('.convert_invoice_main_amount').eq(t).val());
        }
        
        // item_level_discount_convert_calculations(t);
        item_level_discount_convert(t);
        item_level_gst_calculation_convert(t);

        var disc_fld_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount .calculated_discount").eq(t).val();

        total_disc_convert = parseFloat(total_disc_convert) + parseFloat(disc_fld_convert);
    }
    final_total_amt_convert = parseFloat(total_amt_convert) - parseFloat(total_disc_convert);
    $("#convert_total_estimate_value").val(final_total_amt_convert);

    estimate_level_disc_gst_calculations_convert();
}

function item_level_discount_convert(t)
{
   // Calculation discount for each item
    items_main_amt_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").find('.convert_invoice_main_amount').eq(t).val();

    disc_type_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

    disc_rate_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".rate").eq(t).val();

    get_db_rate_val = parseFloat($("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".rate_dbdata").eq(t).val());

    get_db_disctype_val = $("#convert_item_discount_type_dbval"+t).eq(t).val();

    var cur_rate_html = $("#convert_item_discount_rate"+t).eq(t);
    if(disc_type_convert!="")
    {
        var cur_html_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group");
        if(disc_rate_convert!="")
        {
            $("#convertEstimateForm").find("#convert_estimate_calculated_disc_amt").val(disc_rate_convert);
            if(disc_type_convert == "Percentage")
            {
                /*if(disc_rate_convert > 100)
                {   
                    edit_Percentage_validation_estimate(cur_rate_html, disc_rate_convert);
                }*/
                cal_disc_amt_convert = (parseFloat(items_main_amt_convert) * parseFloat(disc_rate_convert))/100;

                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+cal_disc_amt_convert.toFixed(2));

                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+cal_disc_amt_convert+'">');
            }
            if(disc_type_convert == "Amount")
            {
                /*if(disc_rate_convert > items_main_amt_convert)
                {   
                    edit_Amount_validation_estimate(cur_html_convert, disc_rate_convert, parseFloat(items_main_amt_convert));
                }*/
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+parseFloat(disc_rate_convert).toFixed(2));

                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+disc_rate_convert+'">');
            }
        }
        else if(disc_rate_convert == "")
        {
            $("#convertEstimateForm #convert_item_discount_type"+t+"-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");   

            $("#convertEstimateForm #convert_item_discount_type"+t+"-button .custom-a11yselect-text").text(disc_type_convert);

            $("#convertEstimateForm #convert_item_discount_type"+t+"-menu li[data-val='"+disc_type_convert+"']").addClass("custom-a11yselect-focused");
            $("#convertEstimateForm #convert_item_discount_type"+t+"-menu li[data-val='"+disc_type_convert+"']").addClass("custom-a11yselect-selected");

            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");

            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
        }
    }
}

function item_level_gst_calculation_convert(t)
{
    items_main_amt_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").find('.convert_invoice_main_amount').eq(t).val();

    var disc_cal_val_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().find(".convert_invoice_main_amount .calculated_discount").eq(t).val();

    gst_type_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

    gst_rate_convert = $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).attr("data-val");

    // alert("gst_type_convert: "+gst_type_convert+" === gst_rate_convert: "+gst_rate_convert);
    if(gst_type_convert!="")
    {
        if(items_main_amt_convert!=""){
            var val_for_tax_convert = parseFloat(items_main_amt_convert) - parseFloat(disc_cal_val_convert);
        }
        else {
            var val_for_tax_convert = 0;
        }

        if(gst_type_convert == "IGST")
        {
            $("#convertEstimateForm #convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").hide();

            cal_tax_convert = (parseFloat(val_for_tax_convert) * parseInt(gst_rate_convert))/100;

            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount").eq(t).val(cal_tax_convert);
            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_cgst_amount").eq(t).val(0);
            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_sgst_amount").eq(t).val(0);

            $("#convertEstimateForm #convert_invoice_convert_participantTable .convert_participantRow .GST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");

            // alert("IGST cal_tax_convert: "+cal_tax_convert);
            if(cal_tax_convert != 0){
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+cal_tax_convert.toFixed(2));
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+cal_tax_convert.toFixed(2));
            }
            else{
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
            }
        }
        else if(gst_type_convert == "CGST")
        {
            $("#convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").show();

            var split_tax_convert = parseInt(gst_rate_convert) / 2;
            cal_tax_convert = (parseFloat(val_for_tax_convert) * parseFloat(split_tax_convert))/100;

            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount").eq(t).val(0);
            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_cgst_amount").eq(t).val(cal_tax_convert);
            $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_sgst_amount").eq(t).val(cal_tax_convert);

            $("#convertEstimateForm #convert_invoice_convert_participantTable .convert_participantRow .SGST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");

            // alert("CGST cal_tax_convert: "+cal_tax_convert);
            if(cal_tax_convert != 0){
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+cal_tax_convert.toFixed(2));
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ "+cal_tax_convert.toFixed(2));
            }
            else{
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
                $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
            }
        }   
    }
    else {
        $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount,.item_cgst_amount,.item_sgst_amount").eq(t).val(0);

        $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
        $("#convertEstimateForm #convert_invoice_convert_participantTable .main-group").closest("tr").next().next().next().find(".convert_invoice_main_amount").eq(t).text("₹ 0000.00");
    }
}

function estimate_level_disc_gst_calculations_convert()
{
    var new_final_total_amt_convert = $("#convert_total_estimate_value").val();
    var hide_est_disc_or_not_convert = $("#Selected_disc_hidden_val").val();

    // Estimate level discount fields
    var est_selected_disc_type_convert = $("#convert_invoice_Calculate_discounts").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate_convert = parseFloat($("#convert_estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type_convert = $("#convert_invoice_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per_convert = $("#convert_invoice_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax_convert = parseFloat(est_selected_gst_per_convert) / 2;

    var curr_html_convert = $("#convert_estimate_disc_amt");
    $("#convert_estimate_calculated_disc_amt").val(0);

    var convert_count = 0;
    var convert_count1 = 0;

    // If estimate level discount row visible
    if(hide_est_disc_or_not_convert == 0)
    {
        if(est_selected_disc_type_convert != "Select Type")
        {
            if(est_selected_disc_rate_convert && est_selected_disc_rate_convert!="NaN")
            {   
                if(est_selected_disc_type_convert == 'Percentage')
                {   
                    var current = curr_html_convert.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    // convert_Percentage_validation(curr_html_convert, est_selected_disc_rate_convert);

                    if(convert_count == 0)
                    {
                        convert_count = convert_Percentage_validation(curr_html_convert, est_selected_disc_rate_convert,convert_count);
                    }

                    var cal_estimate_disc_convert = (parseFloat(new_final_total_amt_convert) * parseFloat(est_selected_disc_rate_convert))/100;
                    $("#convert_estimate_disc_amt").closest("td").next().find(".convert_invoice_main_amount").text("₹ "+cal_estimate_disc_convert.toFixed(2));
                    $("#convert_estimate_calculated_disc_amt").val(cal_estimate_disc_convert);
                }
                if(est_selected_disc_type_convert == 'Amount')
                {   
                    // convert_Amount_validation(curr_html_convert, est_selected_disc_rate_convert, parseFloat(new_final_total_amt_convert));

                    if(convert_count1 == 0)
                    {

                        convert_count1 = convert_Amount_validation(curr_html_convert, est_selected_disc_rate_convert, parseFloat(new_final_total_amt_convert),convert_count1);
                    }

                    $("#convert_estimate_disc_amt").closest("td").next().find(".convert_invoice_main_amount").text("₹ "+est_selected_disc_rate_convert.toFixed(2));
                    $("#convert_estimate_calculated_disc_amt").val(est_selected_disc_rate_convert);
                }
            }
            else {
                if(est_selected_gst_type_convert != 'Select Type')
                {
                    if(est_selected_gst_type_convert == 'IGST')
                    {
                        $("#convert_SGST_Calculate").hide(); 
                        new_cal_convert = (parseFloat(est_selected_gst_per_convert) * parseFloat(new_final_total_amt_convert))/100;
                        // Values into the hidden fields of igst
                        $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_convert);
                        $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                        $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
                        $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
                    }
                    if(est_selected_gst_type_convert == 'CGST')
                    {
                        $("#convert_SGST_Calculate").show();

                        new_cal_convert = (parseFloat(est_split_tax_convert) * parseFloat(new_final_total_amt_convert))/100;

                        // Values into the hidden fields of cgst & sgst
                        $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
                        $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_convert);
                        $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_convert);
                        $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
                        $("#convert_invoice_Calculate_discounts").find(".SGST_Discount .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
                    }
                }
                else{
                    // $("#convert_estimate_calculated_disc_amt").val(new_final_total_amt_convert);
                    $("#convert_estimate_disc_amt").closest("td").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                    $("#convert_estimate_disc_amt").closest("tr").next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                    $("#convert_estimate_disc_amt").closest("tr").next().next().next().find(".convert_invoice_main_amount").text("₹ 0000.00");
                }
            }
            $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find(".convert_invoice_remove_discount").css("display","inline-block");
        }
        else {
            $("#convert_estimate_disc_amt").val('');
            $("#convert_estimate_calculated_disc_amt").val(0);
            $("#convert_estimate_disc_amt").closest("td").next().find(".convert_invoice_main_amount").text("₹ 0000.00");
            $("#convert_invoice_Calculate_discounts .convert_invoiceEstimate_Percentage").closest("tr").find(".convert_invoice_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type_convert != 'Select Type')
        {
            if(est_selected_gst_type_convert == 'IGST')
            {
                $("#convert_SGST_Calculate").hide(); 
                new_cal_convert = (parseFloat(est_selected_gst_per_convert) * parseFloat(new_final_total_amt_convert))/100;
                // Values into the hidden fields of igst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
            }
            if(est_selected_gst_type_convert == 'CGST')
            {
                $("#convert_SGST_Calculate").show();

                new_cal_convert = (parseFloat(est_split_tax_convert) * parseFloat(new_final_total_amt_convert))/100;

                // Values into the hidden fields of cgst & sgst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
                $("#convert_invoice_Calculate_discounts").find(".SGST_Discount .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
            }
        }
        else{
            $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }

    // If estimate level gst row visible
    var hide_est_gst_or_not_convert = $("#Selected_gst_hidden_val").val();
    if(hide_est_gst_or_not_convert == 0)
    {   
        if(est_selected_gst_type_convert != "Select Type")
        {
            // If estimate level gst type is selected
            if(est_selected_disc_type_convert!="Select Type")
            {   
                if(est_selected_disc_type_convert == "Percentage")
                {
                    if($("#convert_estimate_calculated_disc_amt").val()!="")
                    {
                        if($("#convert_estimate_disc_amt").val()!=""){
                            new_final_total_amt_convert = parseFloat(new_final_total_amt_convert) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
                        }
                        else {
                            new_final_total_amt_convert = parseFloat(new_final_total_amt_convert);
                        }
                    }
                    else {
                        new_final_total_amt_convert = parseFloat(new_final_total_amt_convert);
                    }
                }
                if(est_selected_disc_type_convert == "Amount")
                {
                    new_final_total_amt_convert = parseFloat(new_final_total_amt_convert) - parseFloat($("#convert_estimate_calculated_disc_amt").val());
                }
            }
            else {
                new_final_total_amt_convert = parseFloat(new_final_total_amt_convert);
            }

            if(est_selected_gst_type_convert == 'IGST')
            {   
                $("#convert_SGST_Calculate").hide();

                var new_cal_convert = (parseFloat(est_selected_gst_per_convert) * parseFloat(new_final_total_amt_convert))/100;
                // Values into the hidden fields of igst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type_convert == 'CGST')
            {
                $("#convert_SGST_Calculate").show();  

                var new_cal_convert = (parseFloat(est_split_tax_convert) * parseFloat(new_final_total_amt_convert))/100;
                // Values into the hidden fields of cgst & sgst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".SGST_Discount .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
                $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
            }
        }
        else{
            $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".SGST_Discount .convert_invoice_main_amount").text("₹ 0000.00");
            $("#convert_invoice_Calculate_discounts").find(".CGST_TR_section .convert_invoice_main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type_convert != 'Select Type')
        {
            if(est_selected_gst_type_convert == 'IGST')
            {   
                var new_cal_convert = (parseFloat(est_selected_gst_per_convert) * parseFloat(new_final_total_amt_convert))/100;
                // Values into the hidden fields of igst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type_convert == 'CGST')
            {
                var new_cal_convert = (parseFloat(est_split_tax_convert) * parseFloat(new_final_total_amt_convert))/100;
                // Values into the hidden fields of cgst & sgst
                $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_convert);
                $("#convert_invoice_Calculate_discounts").find(".SGST_Discount .convert_invoice_main_amount").text("₹ "+new_cal_convert.toFixed(2));
            }
        }
        else {
            $("#convert_invoice_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#convert_invoice_Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }
}