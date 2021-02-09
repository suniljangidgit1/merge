// New Create Invoice Form Script

// $("#invoice_datepicker").datepicker({ 
//     autoclose: true, 
//     todayHighlight: true,

// }).datepicker('update', new Date());

$("#save_invoice_BTN_new").removeAttr("disabled");

/* Variables */
var p = $("#invoice_participants").val();
var row = $(".invoice_participantRow");

var invoice_items_add = '<tr class="invoice_main-group" style="border-top: 2px solid #ddd;"><td><input type="checkbox"class="checkbox invoice_sub_checkbox"></td><td class="invoice_sno"><span>1</span></td><td><input name="invoice_item_descr[]" id="" type="text" value="" class="form-control invoice_item_descr"></td><td><input name="invoice_item_hsn[]" id="" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="invoice_item_qty[]" id="" type="text" value="" class="form-control invoice_item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="invoice_item_rate[]" id="" type="text" value="" class="form-control invoice_item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input type="text" class="invoice_main_amount form-control" name="invoice_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><!--<button class="btn btn-danger remove"type="button">Remove</button>--><span class="material-icons-outlined Invoice_remove">delete_outline</span></td></tr><tr><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount(At item level)</span></td><td class="width_15 invoice_discount_section"><select name="invoice_item_discount_type[]" id="" class="Invoice_Percentage form-control"><option value="" selected="selected">Select Type</option><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select></td><td class="width_10"><input name="invoice_item_discount_rate[]" id="" type="text" value="" class="form-control invoice_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined invoice_remove_discount" style="display: none;">delete_outline</span></td></tr><tr class="invoice_CGST_TR_section"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+GST(At item level)</span></td><td class="width_15 invoice_GST_section"><select name="invoice_item_gst_type[]" id="" class="Invoice_IGSTandCGST common_Invoice_IGSTandCGST form-control"><option value="" selected="selected">Select Type</option><option value="IGST">IGST</option><option value="CGST">CGST</option></select></td><td class="width_10 invoice_rate_data"><select name="invoice_item_gst_discont[]" id="" class="invoice_DiscountPer form-control"><option value="0" selected="selected">0%</option><option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option><option value="12">12%</option><option value="18">18%</option><option value="28">28%</option></select><input type="hidden" class="invoice_item_igst_amount" name="invoice_item_igst_amount[]" value="0" /><input type="hidden" class="invoice_item_cgst_amount" name="invoice_item_cgst_amount[]" value="0" /><input type="hidden" class="invoice_item_sgst_amount" name="invoice_item_sgst_amount[]" value="0" /></td><td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount" style="display: none;">delete_outline</span></td></tr><tr id="" class="invoice_SGST_Discount" style="display: none;"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span></td><td class="width_15"><input name="invoice_SGST" value="SGST" class="invoice_SGST form-control"type="text"></td><td class="width_10 invoice_rate_data"><!--<select name="invoice_item_sgst_discount[]" id="" class="invoice_DiscountPer form-control"><option value="">None</option><option value="18%">18%</option><option value="19%">19%</option></select>--></td><td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount">delete_outline</span></td></tr>';

/* Functions */
function getP() {
    p = $("#invoice_participants").val();
}

function addRow() {
    $('.invoice_participantRow').append(invoice_items_add);
}

function removeRow(button) {
    button.closest("tr").remove();
}

/* Doc ready */
$(document).on('click', "#FinanceInvoiceModal .Invoice_add", function (event) {

    event.preventDefault();
    event.stopImmediatePropagation();

    getP();
    //if ($("#invoice_participantTable tr").length < 17) {
        addRow();
        var i = Number(p) + 1;
        $("#invoice_participants").val(i);

        var total_items = $("#invoice_total_items").val();
        total_items = parseInt(total_items) + 1;
        $("#invoice_total_items").val(total_items);

        $(".Invoice_Percentage").customA11ySelect();
        $(".Invoice_IGSTandCGST").customA11ySelect();
        $(".invoice_Calculate_IGSTandCGST").customA11ySelect();
        $(".invoice_BillingFrom_address").customA11ySelect();
        $(".invoice_BillingFrom_gst").customA11ySelect();
        $(".invoice_BillingTo_address").customA11ySelect();
        $(".invoice_BillingTo_gst").customA11ySelect();
        $(".invoice_DiscountPer").customA11ySelect();

        // var items_selected_gst = $("#invoice_items_selected_gst_type").val();
        // if(items_selected_gst!=""){
        //     $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text(items_selected_gst);
        //     if(items_selected_gst == 'CGST'){
        //         $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".invoice_remove_adddiscount").show(); 
        //         $("#invoice_participantTable .invoice_participantRow .invoice_SGST_Discount").show();
        //     }
        //     else {
        //         $("#invoice_participantTable .invoice_participantRow .invoice_SGST_Discount").hide();
        //     }
        // }


        var items_selected_gst = $("#invoice_participantTable .invoice_participantRow .invoice_main-group:first").next().next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var seleted_type = $("#invoice_participantTable .invoice_participantRow .invoice_main-group:first").next().next().find(".invoice_GST_section .custom-a11yselect-selected").text();
        var seleted_type_id = $("#invoice_participantTable .invoice_participantRow .invoice_main-group:first").next().next().find(".invoice_GST_section .custom-a11yselect-selected").attr('id');


        $("#invoice_participantTable .invoice_participantRow .invoice_GST_section ").find(".custom-a11yselect-btn").attr("aria-activedescendant",seleted_type_id);
        $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").find(".custom-a11yselect-text").text(seleted_type);
        // alert(seleted_type+" "+seleted_type_id);
        $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        
        if(seleted_type!='Select Type')
        {
            $("select[name='invoice_item_gst_type[]']").each(function(){
                $('option:selected', $("select[name='invoice_item_gst_type[]']").val(seleted_type)).attr('selected',true).siblings().removeAttr('selected');
            });

            if(seleted_type == 'CGST')
            {
                $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").closest("tr").next().show();
                $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").closest("tr").next().find(".invoice_remove_adddiscount").css("display","inline-block");
            }
            $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").find(".custom-a11yselect-option[data-val='"+seleted_type+"']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
            $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").closest("tr").find(" .invoice_remove_adddiscount").css("display","inline-block");
        }
        else
        {
            $("select[name='invoice_item_gst_type[]']").each(function(){
                $('option:selected', $("select[name='invoice_item_gst_type[]']").val("")).attr('selected',true).siblings().removeAttr('selected');
            });

            $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");
        }

        // Disabled item level GST fields if selected billing entity has not GST
        if($("#invoice_billingaddressgstin").val()!="" && $("#invoice_billingaddressgstin").val()==0)
        {
            $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

            $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $("#invoice_participantTable .invoice_participantRow .invoice_GST_section").closest("tr").find(" .invoice_remove_adddiscount").css("display","none");

            $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "opacity":"1", "cursor":"not-allowed","pointer-events":"none"});
        }

    //}
    $(this).closest("tr").appendTo(".invoice_participantRow");
    if ($(".invoice_participantRow tr").length === 2) {
        $(".Invoice_remove").hide();
    } else {
        $(".Invoice_remove").show();
    }

    $("#invoice_participantTable .invoice_participantRow .invoice_main-group").last().next().next().find(".invoice_GST_section option[value='"+seleted_type+"']").attr("selected", "selected");

    var element1=$(".invoice_participantRow .invoice_main-group").length;
    $(".invoice_participantRow .invoice_sno").html("");
    for(var g=0;g<element1;g++)
    {
        var s=g+1;
        $(".invoice_participantRow .invoice_main-group").eq(g).find(".invoice_sno").html(s);
    }

});

$(document).on("change", "#invoice_participants", function () {
    var i = 0;
    p = $("#invoice_participants").val();
    var rowCount = $(".invoice_participantRow tr").length - 2;
    if (p > rowCount) {
        for (i = rowCount; i < p; i += 1) {
            addRow();
        }
        $("#invoice_participantTable #invoice_addButtonRow").appendTo(".invoice_participantRow");
    } else if (p < rowCount) {}
});

//FOR Serial Number- use ON 
$(document).on("click", ".Invoice_add, .Invoice_remove", function(){
    $("td.invoice_sno").each(function(index,element){                 
        $(element).text(index + 1); 
    });
});

$(document).on("click", ".invoice_DiffBillingEntity", function(){
    $(".invoice_BillingFrom_address_and_gst").show();
    $(".invoice_BillingFromGSTDetails").hide();
    $(".invoice_BillingFrom_gst_main").hide();
    $("#invoice_billfromname").remove();
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
                $(".invoice_BillingFrom_address_main").show();
                if(data.total_num == 1){
                    $(".invoice_BillingFromAddress").show();
                    $("#invoice_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#invoice_BillFromAddress_address").html("<span>"+data.address+"</span>");

                    if(data.emailid!="" && data.phoneno!=""){
                        $("#invoice_BillFromAddress_gst").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#invoice_BillFromAddress_gst").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#invoice_BillFromAddress_gst").html("<span>"+data.phoneno+"</span>");
                    }

                    // $("#invoice_BillFromAddress_email").html("<span>"+data.email_phone+"</span>");

                    if(data.gst_num!=""){
                        $("#invoice_BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    }

                    if(data.pan_num!=""){
                        $("#invoice_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    }

                    if(data.udyam_no!=""){
                        $("#invoice_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){

                    $(".invoice_BillingFromAddress").hide();
                    $(".invoice_BillingFrom_address_and_gst").show();
                    $("#invoice_BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".invoice_BillingFrom_address_main select").append(data.str_opt);
                    $("#invoice_BillingFrom_addr").customA11ySelect('refresh');
                }
                else{
                    $(".invoice_BillingFromAddress").show();
                }
            }
        }
    });
    $(".invoice_BillingFromAddress").hide();
 });

$(document).on("click", ".invoice_DiffGSTNum", function(){
    $(".invoice_BillingFrom_address_and_gst").show();
    $(".invoice_BillingFromGSTDetails").hide();
    $(".invoice_BillingFrom_gst_main").hide();
    $("#invoice_billfromname").remove();
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
                $(".invoice_BillingFrom_address_main").show();
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".invoice_BillingFrom_address_main").hide();
                        $(".invoice_BillingFrom_address_and_gst").show();
                        $(".invoice_BillingFrom_gst_main").show();
                        $(".invoice_BillingFromGSTDetails_dropdown").show();
                        
                        $(".invoice_BillingFromAddress").hide();
                        $(".invoice_BillingFrom_address_gst").show();
                        
                        $(".invoice_BillingFromGSTDetails").hide();
                        $("#invoice_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#invoice_BillingFrom_gstno").append(data.str_opt);
                        $("#invoice_BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".invoice_BillingFromAddress").show();
                        $("#invoice_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#invoice_BillFromAddress_address").html("<span>"+data.address+"</span>");

                        if(data.emailid!="" && data.phoneno!=""){
                            $("#invoice_BillFromAddress_email").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#invoice_BillFromAddress_email").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#invoice_BillFromAddress_email").html("<span>"+data.phoneno+"</span>");
                        }
                        // $("#invoice_BillFromAddress_email").html("<span>"+data.email_phone+"</span>");

                        if(data.gst_num!=""){
                            $("#invoice_BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        }

                        if(data.pan_num!=""){
                            $("#invoice_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }

                        if(data.udyam_no!=""){
                            $("#invoice_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }
                    }
                }
                else if(data.total_num > 1){

                    $(".invoice_BillingFromAddress").hide();
                    $(".invoice_BillingFrom_address_and_gst").show();
                    $("#invoice_BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".invoice_BillingFrom_address_main select").append(data.str_opt);
                    $("#invoice_BillingFrom_addr").customA11ySelect('refresh');
                }
                else{
                    $(".invoice_BillingFromAddress").show();
                }
            }
        }
    });
    $(".invoice_BillingFromAddress").hide();
 });

$(document).on("click", ".invoice_Diffcustomer", function(){
    $(".invoice_BillingTo_address_and_gst").show();
    $(".invoice_BillingToGSTDetails").hide();
    $(".invoice_BillingTo_gst_main").hide();
    $("#invoice_billtoname").remove();
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
                $(".invoice_BillingTo_address_main").show();
                if(data.total_num == 1)
                {
                    $(".invoice_BillingFromAddress").show();
                    $("#invoice_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#invoice_BillToAddress_address").html("<span>"+data.address+"</span>");
                    $("#invoice_BillToAddress_email").html("<span>"+data.email_phone+"</span>");

                    if(data.gst_num!=""){
                        $("#invoice_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    }
                    
                    if(data.pan_num!=""){
                        $("#invoice_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    }

                    if(data.udyam_no!=""){
                        $("#invoice_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".invoice_BillingToAddress").hide();
                    $(".invoice_BillingTo_address_and_gst").show();
                    $("#invoice_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".invoice_BillingTo_address_main select").append(data.str_opt);
                    $("#invoice_BillingTo_addr").customA11ySelect('refresh');
                }
                else{
                    $(".invoice_BillingToAddress").show();
                }
            }
        }
    });
    $(".invoice_BillingToAddress").hide();
});

$(document).on("click", ".invoiceDiffcustomergst", function(){
    $(".invoice_BillingTo_address_and_gst").show();
    $(".invoice_BillingToGSTDetails").hide();
    $(".invoice_BillingTo_gst_main").hide();
    $("#invoice_billtoname").remove();
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
                $(".invoice_BillingTo_address_main").show();
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".invoice_BillingTo_address_main").hide();
                        $(".invoice_BillingTo_address_and_gst").show();
                        $(".invoice_BillingTo_gst_main").show();
                        $(".invoice_BillingToGSTDetails_dropdown").show();
                        
                        $(".invoice_BillingToAddress").hide();
                        $(".invoice_BillingTo_address_gst").show();
                        
                        $(".invoice_BillingToGSTDetails").hide();
                        $("#invoice_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#invoice_BillingTo_gstno").append(data.str_opt);
                        $("#invoice_BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".invoice_BillingFromAddress").show();
                        $("#invoice_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#invoice_BillToAddress_address").html("<span>"+data.address+"</span>");
                        $("#invoice_BillToAddress_email").html("<span>"+data.email_phone+"</span>");

                        if(data.gst_num!=""){
                            $("#invoice_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        }

                        if(data.pan_num!=""){
                            $("#invoice_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }

                        if(data.udyam_no!=""){
                            $("#invoice_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }
                    }
                }
                else if(data.total_num > 1){
                    $(".invoice_BillingToAddress").hide();
                    $(".invoice_BillingTo_address_and_gst").show();
                    $("#invoice_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".invoice_BillingTo_address_main select").append(data.str_opt);
                    $("#invoice_BillingTo_addr").customA11ySelect('refresh');
                }
                else{
                    $(".invoice_BillingToAddress").show();
                }
            }
        }
    });
    $(".invoice_BillingToAddress").hide();
});

 $(document).on("click", "#create_invoice", function(){
    $(".invoice_BillingFromCard").show();
    $(".invoice_BillingFrom_address_and_gst").hide();
    $(".invoice_BillingFromAddress").hide();

    $(".invoice_BillingToCard").show();
    $(".invoice_BillingTo_address_and_gst").hide();
    $(".invoice_BillingToAddress").hide();
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").show();
    // $("#invoiceForm")[0].reset();
 });

$(document).on('change','.invoice_participantRow .Invoice_IGSTandCGST',function(){

    var current=$(this).closest(".invoice_participantRow");
    var cur_val=$(this).closest(".invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // alert("cur_val: "+cur_val);

    // Make dropdown option selected when select any
    $("select[name='invoice_item_gst_type[]']").each(function(){
        $('option:selected', $("select[name='invoice_item_gst_type[]']").val(cur_val)).attr('selected',true).siblings().removeAttr('selected');
    });

    var cur_data_val=$(this).closest(".invoice_GST_section").find(".custom-a11yselect-selected").attr('data-val');
    var cur_val_id=$(this).closest(".invoice_GST_section").find(".custom-a11yselect-selected").attr('id');

    var except_cur = $("#FinanceInvoiceModal .invoice_participantRow .invoice_GST_section").not(this);
    except_cur.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
    except_cur.find(".custom-a11yselect-btn .custom-a11yselect-text").text(cur_val);
    except_cur.find(".custom-a11yselect-btn").attr('aria-activedescendant',cur_val_id);
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='"+cur_data_val+"']").addClass('custom-a11yselect-selected custom-a11yselect-focused');

    // for CGST
    var current1=current.find(".invoice_rate_data");
    var cgst_rate_id=current.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();

    //  for SGST
    var current2=current.next().find(".invoice_rate_data");
    var sgst_rate_id=current.next().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var sgst_rate_text=current.next().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();

    if(cur_val == "Select Type")
    {
        // Make dropdown option selected when select any
        $("select[name='invoice_item_gst_type[]']").each(function(){
            $('option:selected', $("select[name='invoice_item_gst_type[]']").val('')).attr('selected',true).siblings().removeAttr('selected');
        });

        // Make dropdown option selected when select any
        $("select[name='invoice_item_gst_discont[]']").each(function(){
            $('option:selected', $("select[name='invoice_item_gst_discont[]']").val(0)).attr('selected',true).siblings().removeAttr('selected');
        });


        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","none");
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section").next().hide();

        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_main_amount').text('');
        $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_main_amount').text('₹ 0000.00');
        $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('');
        $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('₹ 0000.00');
    }
    else if(cur_val=='IGST')
    {
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section").next().hide();
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);
        $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('₹ 0000.00');
    }
    else if(cur_val=='CGST')
    {
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section").next().find(".invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal .invoice_participantRow .invoice_CGST_TR_section").next().show();
    }


});

//  checkbox section
$(document).on('click','.invoice_header_checkbox',function(){
    if($(this).prop("checked") == true){
        $(".invoice_sub_checkbox").prop("checked",true);
        $(".invoice_header_delete").css("display","inline-block");
    }
    else if($(this).prop("checked") == false){
        $(".invoice_sub_checkbox").prop("checked",false);
        $(".invoice_header_delete").css("display","none");
    }       
});
$(document).on('click','.invoice_sub_checkbox',function(){
    var ele=$(this).closest(".invoice_participantRow");
    var length=ele.find(".invoice_main-group .invoice_sub_checkbox:checked").length;
    if(length>=1)
    {
        $(".invoice_header_delete").css("display","inline-block");
    }
    else
    {
        $(".invoice_header_delete").css("display","none");
        $(".invoice_header_checkbox").prop("checked",false); //new change
    }
});
$(document).on("click",".invoice_header_delete",function(){
    var r=$(".invoice_participantRow .invoice_main-group .invoice_sub_checkbox:checked").closest("tr");

    var deleted_row_val = $(".invoice_participantRow .invoice_main-group .invoice_sub_checkbox:checked").closest("tr").find('.main_amount').val();
    
    r.next().remove();
    r.next().remove();
    r.next().remove();
    r.remove();
    var current=$(".invoice_participantRow .invoice_main-group .invoice_sub_checkbox:checked").length;
    var element=$(".invoice_participantRow .invoice_main-group").length;
    if(current==0)
    {
        $(".invoice_header_delete").css("display","none");
    }
    
    if(element == 0)
    {
        $('.invoice_participantRow').append(invoice_items_add);
        $(".Invoice_Percentage").customA11ySelect();
        $(".Invoice_IGSTandCGST").customA11ySelect();
        $(".invoice_DiscountPer").customA11ySelect();
        cleared_createInvoice_estimate_level_discount_details();
        cleared_createInvoice_estimate_level_gst_details();
    }
    var element1=$(".invoice_participantRow .invoice_main-group").length;

    $(".invoice_participantRow .invoice_sno").html("");
    for(var g=0;g<element1;g++)
    {
        var s=g+1;
        $(".invoice_participantRow .invoice_main-group").eq(g).find(".invoice_sno").html(s);
    }

    $(".invoice_header_checkbox").prop("checked",false); // new change

    if(deleted_row_val){
        var l = parseFloat($("#total_invoice_value").val()) - parseFloat(deleted_row_val);
    }
    else{
        var l = parseFloat($("#total_invoice_value").val());
    }
    calculate_invoice_level_discount(l);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(l);

    for_hiding_invoice_level_percentage();
    for_hiding_invoice_level_GST();
    invoice_remove_panel_color();
});

// validation for rate
$(document).on('keyup', ".invoice_participantRow .invoice_rate", function() 
{
    var cur_html=$(this);
    var cur_rate_val = $(this).val();
    var current=cur_html.closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    // if(current=='Percentage')
    // {
    //     Invoice_Percentage_validation(cur_html,cur_rate_val);
    // }
    // else if(current=='Amount')
    // {
    //     var main_amt = cur_html.closest('tr').prev().find('.invoice_main_amount').val();
    //     Invoice_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
    // }

    var main_amt = cur_html.closest('tr').prev().find('.invoice_main_amount').val();

    if(main_amt != '')
    {
        // console.log("not Empty Amount ");

        cur_html.closest("tr").prev().find(".invoice_main_amount").closest("td").find(".err").remove();
        cur_html.closest("tr").prev().find(".invoice_main_amount").removeAttr('style');

        if(current=='Percentage')
        {
            Invoice_Percentage_validation(cur_html,cur_rate_val);
        }
        else if(current=='Amount')
        {
            Invoice_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));
        }
    }
    else
    {
        // console.log("Empty Amount ");

        cur_html.closest("tr").prev().find(".invoice_main_amount").closest("td").append('<span class="err text-danger">Please enter amount</span>');
        cur_html.closest("tr").prev().find(".invoice_main_amount").css('border-color', 'rgb(173, 72, 70)');
        cur_html.val("");
        cur_html.closest("tr").prev().find(".invoice_main_amount").focus();
        // $.alert({
        //         title: 'Alert!',
        //         content: 'Please enter Main Amount',
        //         type: 'dark',
        //         typeAnimated: true,
        //         buttons: {
        //             ok: function() { 
        //                 cur_html.val("");
        //                  invoice_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
        //                 cur_html.blur();
        //                 cur_html.closest("tr").prev().find(".main_amount").focus();
        //             }
        //         }
        //  });

    }

});

$(document).on("keyup", "#invoice_number", function(){
    $(this).removeAttr("style");
    $(this).closest("div").find(".err").remove("");
});

$(document).on("keyup", "input[name='invoice_item_descr[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='invoice_item_qty[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");

    if($(this).val() == '')
    {
        $(this).closest("tr").find(".invoice_item_rate").val('');
        $(this).closest("tr").find(".invoice_main_amount").val('');
    }
});

$(document).on("keyup", "input[name='invoice_item_rate[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='invoice_item_main_amount[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");

    if($(this).val() == '')
    {
        $(this).closest("tr").find(".invoice_item_rate").val('');
        $(this).closest("tr").find(".invoice_item_qty").val('');
    }
});

$(document).on("change", "#invoice_BillingFrom_addr", function(){
    $("#invoiceForm #invoice_Address_Details").find(".invoice_BillingFrom_address_main .custom-a11yselect-btn").removeAttr("style");  
    $(".invoice_BillingFrom_address_main").find(".err").remove();
});

$(document).on("change", "#invoice_BillingTo_addr", function(){
    $("#invoiceForm #invoice_Address_Details_BillTo").find(".invoice_BillingTo_address_main .custom-a11yselect-btn").removeAttr("style");  
    $(".invoice_BillingTo_address_main").find(".err").remove();
});

// Validation for percentage greater than 100% or less than 0%
function Invoice_Percentage_validation(cur_html,cur_rate_val)
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
                    invoice_reset_percentage_validation(cur_html,cur_rate_val);
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
}

// Validation for percentage greater than or less than item's amount
function Invoice_Amount_validation(cur_html,cur_rate_val,main_amt)
{

    // alert("heheh"+cur_rate_val+" "+main_amt);
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
                        invoice_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
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
                        invoice_reset_percentage_validation(cur_html,cur_rate_val,main_amt);
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
}

/*$(document).on("click", "#FinanceEstimateModal #estimate_main_details .close", function(current){
    var modal_id=$(current).closest(".modal").find("form").attr("id");

    $("#"+modal_id)[0].reset();

    $(".participantRow tr").remove();

    // ============ Code added by Sachin ============
    $("#billfromname").remove();
    $("#billtoname").remove();
    $("#invoiceForm .BillingFromCard").removeAttr("style");
    $("#invoiceForm .BillingToCard").removeAttr("style");
    $("#Address_Details .BillingFrom_address_and_gst").hide();
    $("#Address_Details_BillTo .BillingTo_address_and_gst").hide();
    // ============ Code added by Sachin ============

    var element=$(".participantRow .main-group").length;

    if(element==0)
    {
        $('.participantRow').append(invoice_items_add);
        $(".Invoice_Percentage,.Estimate_IGSTandCGST,.DiscountPer").customA11ySelect();
    }

    $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
    }).datepicker('update', new Date());

    // for discount
    var Calculate_discount_id=$("#Calculate_discounts .discount_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_discount_text=$("#Calculate_discounts .discount_section .custom-a11yselect-menu li:first button").text();

    var current_row=$("#Calculate_discounts .discount_section");

    ResetDiscount(current_row,Calculate_discount_id,Calculate_discount_text);

    //  for gst

    var Calculate_gst_id=$("#Calculate_discounts .GST_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_text=$("#Calculate_discounts .GST_section .custom-a11yselect-menu li:first button").text();

    var current_gst_row=$("#Calculate_discounts .GST_section ");

    ResetDiscount(current_gst_row,Calculate_gst_id,Calculate_gst_text);

    //  for gst rate

    var Calculate_gst_rate_id=$("#Calculate_discounts .invoice_CGST_TR_section .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_rate_text=$("#Calculate_discounts .invoice_CGST_TR_section .rate_data .custom-a11yselect-menu li:first button").text();

    var current_gst_rate_row=$("#Calculate_discounts .invoice_CGST_TR_section .rate_data ");

    ResetDiscount(current_gst_rate_row,Calculate_gst_rate_id,Calculate_gst_rate_text);

    // for sgst rate

    var Calculate_sgst_rate_id=$("#Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$("#Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$("#Calculate_discounts .SGST_Discount .rate_data ");

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

    $("#Calculate_discounts .SGST_Discount,#Calculate_discounts .estimate_remove_adddiscount,#Calculate_discounts .estimate_remove_discount").hide();
});*/

// BillingFromCard Click event
$(document).on("click", ".invoice_BillingFromCard", function(){
    $(this).hide();
    $(".invoice_BillingFromGSTDetails").hide();
    $(".invoice_BillingFromGSTDetails_dropdown").hide();
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
                $(".invoice_BillingFrom_address_main").show()  
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".invoice_BillingFrom_address_and_gst").show();
                        $(".invoice_BillingFrom_address_main").hide();
                        $(".invoice_BillingFrom_gst_main").show();
                        $(".invoice_BillingFromGSTDetails_dropdown").show();
                        
                        $(".invoice_BillingFromAddress").hide();
                        $(".invoice_BillingFrom_address_gst").show();
                        
                        $(".invoice_BillingFromGSTDetails").hide();
                        $("#invoice_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#invoice_BillingFrom_gstno").append(data.str_opt);
                        $("#invoice_BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".invoice_BillingFromAddress").show();
                        $("#invoice_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#invoice_BillFromAddress_street").html("<span>"+data.address+"</span>");

                        if(data.emailid!="" && data.phoneno!=""){
                            $("#invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#invoice_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }
                        // $("#invoice_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");

                        if(data.gst_num!=""){
                            $("#invoice_BillFromAddress_num").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        }
                        if(data.pan_num!=""){
                            $("#invoice_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }

                        if(data.udyam_no!=""){
                            $("#invoice_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }

                        $("#invoice_billing_address_street").remove();
                        $("#invoice_billing_address_city").remove();
                        $("#invoice_billing_address_state").remove();
                        $("#invoice_billing_address_postal_code").remove();
                        $("#invoice_billingaddressgstin").remove();
                        $("#invoice_billingaddresspanno").remove();
                        $("#invoice_billingemailaddress").remove();
                        $("#invoice_billingphoneno").remove();
                        $("#bill_id").remove();
                        $("#invoice_billingfrom_udyamno").remove();

                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_street' id='billing_address_street' value='"+data.street+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billfromname' id='invoice_billfromname' value='"+data.name+"' />");

                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='bill_id' id='bill_id' value='"+data.billing_entity_id+"' />");

                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_city' id='billing_address_city' value='"+data.city+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_state' id='billing_address_state' value='"+data.state+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_postal_code' id='billing_address_postal_code' value='"+data.postal_code+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingaddressgstin' id='billingaddressgstin' value='"+data.gst_num+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingaddresspanno' id='billingaddresspanno' value='"+data.pan_num+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingemailaddress' id='billingaddressemailid' value='"+data.emailid+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingphoneno' id='billingaddresshphoneno' value='"+data.phoneno+"' />");
                        $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingfrom_udyamno' id='billingto_udyamno' value='"+data.udyam_no+"' />");

                        get_all_banks_details_data(data.billing_entity_id);
                    }
                }
                else if(data.total_num > 1){
                    $(".invoice_BillingFrom_address_and_gst").show();
                    $(".invoice_BillingFrom_address_main select").append(data.str_opt);

                    $(".invoice_BillingFrom_address").empty().append('<option value="">Select Billing Entity</option>');
                    $(".invoice_BillingFrom_address").append(data.str_opt);
                    $(".invoice_BillingFrom_address").customA11ySelect('refresh');

                    $(".invoice_BillingFromAddress").hide();
                }
                else{
                    $(".BillingFromAddress").show();
                }
            }
            else {
                $.alert({
                    title: 'Alert!',
                    content: 'Please enter billing entity first',
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        ok: function() {
                            $("#invoice_Address_Details .invoice_BillingFromCard").show();
                            $("#invoice_Address_Details .invoice_BillingFromCard").css("border-color", '#ad4846');
                        }
                    }
                });
            }
        }
    });
    //$(".invoice_BillingFromAddress").show();
});

// BillingToCard Click event
$(document).on("click", ".invoice_BillingToCard", function(){
    $(this).hide();
    $(".invoice_BillingToGSTDetails").hide();
    $(".invoice_BillingToGSTDetails_dropdown").hide();
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
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".invoice_BillingTo_address_main").hide();
                        $(".invoice_BillingTo_address_and_gst").show();
                        $(".invoice_BillingTo_gst_main").show();
                        $(".invoice_BillingToGSTDetails_dropdown").show();
                        
                        $(".invoice_BillingToAddress").hide();
                        $(".invoice_BillingTo_address_gst").show();
                        
                        $(".invoice_BillingToGSTDetails").hide();
                        $("#invoice_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#invoice_BillingTo_gstno").append(data.str_opt);
                        $("#invoice_BillingTo_gstno").customA11ySelect('refresh');   
                    }
                    else {
                        $(".invoice_BillingToAddress").show();

                        $("#invoice_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");

                        $("#invoice_BillToAddress_street").html("");
                        if(data.address!=""){
                            $("#invoice_BillToAddress_street").html("<span>"+data.address+"</span>");
                        }

                        $("#invoice_BillToAddress_email_phone").html("");
                        if(data.emailid!="" && data.phoneno!=""){
                            $("#invoice_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#invoice_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#invoice_BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }

                        $("#invoice_BillToAddress_num").html("");
                        if(data.gst_num!=""){
                            $("#invoice_BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                        }

                        $("#invoice_BillToAddress_panno").html("");
                        if(data.pan_num!=""){
                            $("#invoice_BillToAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }
                        $("#invoice_BillToAddress_udyam").html("");
                        if(data.udyam_no!=""){
                            $("#invoice_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }

                        $("#invoice_billtoname").remove();
                        $("#bill_id").remove();
                        $("#invoice_shipping_address_street").remove();
                        $("#invoice_shipping_address_city").remove();
                        $("#invoice_shipping_address_state").remove();
                        $("#invoice_shipping_address_postal_code").remove();
                        $("#invoice_shippingaddressgstin").remove();
                        $("#invoice_shippingaddresspanno").remove();
                        $("#invoice_shippingaddressemailid").remove();
                        $("#invoice_shippingaddresshphoneno").remove();
                        $("#invoice_billingto_udyamno").remove();

                        // Hidden fields to post the data
                        $("#invoice_BillToAddress_name").append("<input type='hidden' name='invoice_billtoname' id='invoice_billtoname' value='"+data.name+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='bill_id' id='bill_id' />");
                        $("#bill_id").val(data.billing_entity_id);
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_street' id='invoice_billing_address_street' value='"+data.street+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_city' id='invoice_billing_address_city' value='"+data.city+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_state' id='invoice_billing_address_state' value='"+data.state+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_postal_code' id='invoice_billing_address_postal_code' value='"+data.postal_code+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddressgstin' id='invoice_billingaddressgstin' value='"+data.gst_num+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddresspanno' id='invoice_billingaddresspanno' value='"+data.panno+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddressemailid' id='invoice_billingemailaddress' value='"+data.emailid+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddresshphoneno' id='invoice_billingphoneno' value='"+data.phoneno+"' />");
                        $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_billingto_udyamno' id='invoice_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");

                        get_all_banks_details_data(data.billing_entity_id);        
                    }
                }
                else if(data.total_num > 1){  
                    $(".invoice_BillingTo_address_main").show();
                    $(".invoice_BillingTo_address_and_gst").show();
                    $(".invoice_BillingTo_address_main select").append(data.str_opt);
                    $(".invoice_BillingTo_address").customA11ySelect();
                    $(".invoice_BillingToAddress").hide();
                }
            }
            else {
                $.alert({
                    title: 'Alert!',
                    content: 'Please enter account first',
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        ok: function() {
                            $("#invoice_Address_Details_BillTo .invoice_BillingToCard").show();
                            $("#invoice_Address_Details_BillTo .invoice_BillingToCard").css("border-color", '#ad4846');
                        }
                    }
                });
            }
        }
    });
    //$(".invoice_BillingToAddress").show();
});

// Scripts for Billed from
$(document).on("change", "#invoice_BillingFrom_addr", function(){
    var sel_id = $('#invoice_BillingFrom_addr option:selected').data('id');
    $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/financial_changes/get_all_billing_entities_gst.php?entity_id='"+encodeURI(sel_id)+"'",
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data)
         {
            $(".invoice_BillingFrom_gst_main").find(".err").remove();  
            if(data.total_gst == 1)
            {
                $(".invoice_BillingFrom_address_main").hide();
                $(".invoice_BillingFrom_gst_main").hide();
                $(".invoice_BillingFromAddress").show();
                
                if(data.total_entities == 1 && data.total_gst_nums > 1){
                    $(".invoice_diff_gst_number").show();
                    $(".invoice_diff_billing_entity").hide();
                }
                else if(data.total_entities > 1){
                    $(".invoice_diff_gst_number").hide();
                    $(".invoice_diff_billing_entity").show();
                }
                else if(data.total_entities == 1 && data.total_gst_nums == 1){
                    $(".invoice_diff_gst_number").hide();
                    $(".invoice_diff_billing_entity").hide();
                }

                $("#invoice_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                $("#invoice_BillFromAddress_street").html("<span>"+data.address+"</span>");

                $("#invoice_BillFromAddress_email_phone").html("");
                if(data.emailid!="" && data.phoneno!=""){
                    $("#invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#invoice_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#invoice_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                $("#invoice_BillFromAddress_num").html("");
                if(data.gst_num!="")
                {   
                    $("#invoice_BillFromAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                    // Enabled item level GST fields
                    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                    // Enabled invoice level GST fields
                    $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").show();

                    $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");
                }
                else
                {
                    invoice_disabled_all_gst_fields();
                }

                $("#invoice_BillFromAddress_panno").html("");
                if(data.panno!=""){
                    $("#invoice_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                $("#invoice_BillFromAddress_udyam").html("");
                if(data.udyam_registration_no!=""){
                    $("#invoice_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#no_bank_details").remove();
                $("#invoice_billfromname").remove();
                $("#bill_id").remove();
                $("#invoice_billing_address_street").remove();
                $("#invoice_billing_address_city").remove();
                $("#invoice_billing_address_state").remove();
                $("#invoice_billing_address_postal_code").remove();
                $("#invoice_billingaddressgstin").remove();
                $("#invoice_billingaddresspanno").remove();
                $("#invoice_billingemailaddress").remove();
                $("#invoice_billingphoneno").remove();
                $("#invoice_billingfrom_udyamno").remove();

                // Hidden fields to post the data
                // alert(data.billing_entity_id);
                $("#invoice_BillFromAddress_name").append("<input type='hidden' name='invoice_billfromname' id='invoice_billfromname' value='"+data.name+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='bill_id' id='bill_id' />");
                $("#bill_id").val(data.billing_entity_id);
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_street' id='invoice_billing_address_street' value='"+data.street+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_city' id='invoice_billing_address_city' value='"+data.city+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_state' id='invoice_billing_address_state' value='"+data.state+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billing_address_postal_code' id='invoice_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingaddressgstin' id='invoice_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingaddresspanno' id='invoice_billingaddresspanno' value='"+data.panno+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingemailaddress' id='invoice_billingemailaddress' value='"+data.emailid+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingphoneno' id='invoice_billingphoneno' value='"+data.phoneno+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='invoice_billingfrom_udyamno' id='invoice_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");

                get_all_banks_details_data(data.billing_entity_id);
            }
            else if(data.total_gst > 1)
            {
                $("#invoice_bank_holder_name").remove();
                $("#invoice_bank_name_fld").remove();
                $("#invoice_account_no_fld").remove();
                $("#invoice_IFSCcode_fld").remove();
                $("#invoice_bank_accType_fld").remove();
                $("#invoice_bank_UPI_fld").remove();

                $(".invoice_BillingFrom_gst_main").show();
                $(".invoice_BillingFromGSTDetails_dropdown").show();
                $(".invoice_BillingFromGSTDetails").hide();
                $("#invoice_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#invoice_BillingFrom_gstno").append(data.str_opt);
                $("#invoice_BillingFrom_gstno").customA11ySelect('refresh');
            }
            else
            {
                $(".invoice_BillingFrom_gst_main").hide();
                $(".invoice_BillingFromGSTDetails_dropdown").hide();
                $(".invoice_BillingFromGSTDetails").hide();
                $("#invoice_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#BillingFrom_gstno").customA11ySelect('refresh');
            }
         }
         else
         {
            $(".invoice_BillingFrom_gst_main").hide();
            $(".invoice_BillingFromGSTDetails_dropdown").hide();
            $(".invoice_BillingFromGSTDetails").hide();
            $("#invoice_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
            $("#invoice_BillingFrom_gstno-menu").customA11ySelect('refresh');
         }
      }
    });
});

function invoice_disabled_all_gst_fields()
{
    // For item level GST type dropdown
    $('option:selected', $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".Invoice_IGSTandCGST").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST type fields plugin
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For item level GST rate dropdown
    $('option:selected', $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".invoice_DiscountPer").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST rate fields plugin
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected  custom-a11yselect-focused");
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For hiding delete icon
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".invoice_remove_adddiscount").hide();
    
    // For hiding SGST row
    $("#invoice_participantTable .invoice_participantRow .invoice_SGST_Discount").hide();
    
    // For hiding hidden fields
    $(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);

    // For label of GST values
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".invoice_main_amount").html("");
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".invoice_main_amount").html("₹ 0000.00");

    $("#invoice_summary_value").val(2);

    // Disabled item level GST fields
    $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee","opacity":"1", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
    
    // Disabled invoice level GST fields
    $('option:selected', $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_GST_section").find("#invoice_Calculate_IGSTandCGST_select").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For invoice level GST type fields plugin
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For invoice level GST rate dropdown
    $('option:selected', $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find("#invoice_Calculate_rate").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For invoice level GST rate field plugin
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For invoice level gst hidden fields
    $(".invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    
    // Hide invoice level SGST row
    $("#invoice_Calculate_discounts .invoice_SGST_Discount").hide();

    // For invoice level GST values label
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_main_amount").html("");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_main_amount").html("₹ 0000.00");
    // For invoice level delete icon hide
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_remove_adddiscount").hide();

    // For invoice level GST fields disable
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});

    $("#invoice_items_gst_type_selected").val(0);
    $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").show();
}

$(document).on("change", "#invoice_BillingFrom_gstno", function(){
    var sel_id = $('#invoice_BillingFrom_gstno option:selected').data('id');
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
                if(data.total_entities == 1 && data.total_gst_nums > 1){
                    $(".invoice_diff_gst_number").show();
                    $(".invoice_diff_billing_entity").hide();
                }
                else if(data.total_entities > 1){
                    $(".invoice_diff_gst_number").hide();
                    $(".invoice_diff_billing_entity").show();
                }
                else if(data.total_entities == 1 && data.total_gst_nums == 1){
                    $(".invoice_diff_gst_number").hide();
                    $(".invoice_diff_billing_entity").hide();
                }

                // $(".invoice_diff_billing_entity").show();
                $(".invoice_BillingFrom_gst_main").show();
                $(".invoice_BillingFromGSTDetails").show();
                $(".invoice_BillingFrom_address_main").hide();
                $(".invoice_BillingFromGSTDetails_dropdown").hide();
                $("#invoice_BillFromGST_name").html("<span><b>"+data.name+"</b></span>");

                $("#invoice_BillFromGST_email_phone").html("");
                if(data.emailid!="" && data.phoneno!=""){
                    $("#invoice_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#invoice_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#invoice_BillFromGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                $("#invoice_BillFromGST_street").html("<span>"+data.address+"</span>");

                // Enabled item level GST fields
                $("#invoice_participantTable .invoice_participantRow .invoice_CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                // Enabled invoice level GST fields
                $("#invoice_Calculate_discounts .invoice_CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                /*$("#invoice_items_gst_type_selected").val(0);
                $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").show();*/


                $("#invoice_BillFromGST_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                $("#invoice_BillFromGST_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");

                $("#invoice_BillFromGST_state").html("");
                if(data.udyam_registration_no!=""){
                    $("#invoice_BillFromGST_state").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }
                
                $("#invoice_billfromname").remove();
                $("#bill_id").remove();
                $("#invoice_billing_address_street").remove();
                $("#invoice_billing_address_city").remove();
                $("#invoice_billing_address_state").remove();
                $("#invoice_billing_address_postal_code").remove();
                $("#invoice_billingaddressgstin").remove();
                $("#invoice_billingaddresspanno").remove();
                $("#invoice_billingemailaddress").remove();
                $("#invoice_billingphoneno").remove();
                $("#invoice_billingfrom_udyamno").remove();

                // Hidden fields to post the data
                $("#invoice_BillFromGST_name").append("<input type='hidden' name='invoice_billfromname' id='invoice_billfromname' value='"+data.name+"' />");
                $("#invoice_BillFromAddress_street").append("<input type='hidden' name='bill_id' id='bill_id' />");
                $("#bill_id").val(data.billing_entity_id);
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billing_address_street' id='invoice_billing_address_street' value='"+data.street+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billing_address_city' id='invoice_billing_address_city' value='"+data.city+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billing_address_state' id='invoice_billing_address_state' value='"+data.state+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billing_address_postal_code' id='invoice_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billingaddressgstin' id='invoice_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billingaddresspanno' id='invoice_billingaddresspanno' value='"+data.panno+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billingemailaddress' id='invoice_billingemailaddress' value='"+data.emailid+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billingphoneno' id='invoice_billingphoneno' value='"+data.phoneno+"' />");
                $("#invoice_BillFromGST_street").append("<input type='hidden' name='invoice_billingfrom_udyamno' id='invoice_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");

                if(data.total_bank_details > 0)
                {
                    $("#BankInvoice_Details .invoice_select_account_main").show();
                    $("#BankInvoice_Details .Invoice_AccountDetails").hide();
                    $("#BankInvoice_Details .Invoice_AccountDetails .Invoice_AccountDetails_Link").show();

                    get_all_banks_details_data(data.billing_entity_id);
                }
                else {
                    $("#BankInvoice_Details .invoice_select_account_main").hide();
                    $("#BankInvoice_Details .Invoice_AccountDetails").show();
                    $("#BankInvoice_Details .Invoice_AccountDetails .Invoice_AccountDetails_Link").hide();
                    $("#Holder_name").html("");
                    $("#bank_name").html("");
                    $("#acc_no").html("");
                    $("#IFSC_Code").html("");
                    $("#accountType").html("");
                    $("#UPI").html("");
                    $("#Holder_name").html('<span><b>No bank details available</span>');
                    $("#Holder_name").append('<input type="hidden" name="no_bank_details" id="no_bank_details" value="No bank details available" />');

                    // $("#invoice_select_account").empty().append('<option value="">Select Account</option>');
                    // $("#invoice_select_account").append(data.str_opt);
                    // $("#invoice_select_account").customA11ySelect('refresh');
                }
            }
            else
            {
                $(".invoice_BillingFromGSTDetails").hide();
            }
        }
    });
});

// Scripts for Billed to
$(document).on("change", "#invoice_BillingTo_addr", function(){
    var sel_id = $('#invoice_BillingTo_addr option:selected').data('id');
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
                $(".BillingTo_gst_main").find(".err").remove();
                if(data.total_gst == 1)
                {
                    $(".invoice_BillingTo_address_main").hide();
                    $(".invoice_BillingTo_gst_main").hide();
                    $(".invoice_BillingToAddress").show();

                    if(data.total_accounts == 1 && data.total_gst_nums > 1){
                        $(".invoice_diff_customer_gst").show();
                        $(".invoice_diff_customer_link").hide();
                    }
                    else if(data.total_accounts > 1){
                        $(".invoice_diff_customer_gst").hide();
                        $(".invoice_diff_customer_link").show();
                    }
                    else if(data.total_accounts == 1 && data.total_gst_nums == 1){
                        $(".invoice_diff_customer_gst").hide();
                        $(".invoice_diff_customer_link").hide();
                    }

                    // $(".invoice_diff_customer_link").show();
                    $("#invoice_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#invoice_BillToAddress_street").html("<span>"+data.address+"</span>");

                    $("#invoice_BillToAddress_email_phone").html("");
                    if(data.emailid!="" && data.phoneno!=""){
                        $("#invoice_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#invoice_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#invoice_BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                    }

                    $("#invoice_BillToAddress_num").html("");
                    if(data.gst_num){
                        $("#invoice_BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                    }

                    $("#invoice_BillToAddress_panno").html("");
                    if(data.panno){
                        $("#invoice_BillToAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                    }

                    $("#invoice_BillToAddress_udyam").html("");
                    if(data.udyam_registration_no!=""){
                        $("#invoice_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                    }

                    $("#invoice_billtoname").remove();
                    $("#invoice_shipping_address_street").remove();
                    $("#invoice_shipping_address_city").remove();
                    $("#invoice_shipping_address_state").remove();
                    $("#invoice_shipping_address_postal_code").remove();
                    $("#invoice_shippingaddressgstin").remove();
                    $("#invoice_shippingaddresspanno").remove();
                    $("#invoice_shippingaddressemailid").remove();
                    $("#invoice_shippingaddresshphoneno").remove();
                    $("#invoice_billingto_udyamno").remove();

                    // Hidden fields to post the data
                    $("#invoice_BillToAddress_name").append("<input type='hidden' name='invoice_billtoname' id='invoice_billtoname' value='"+data.name+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_street' id='invoice_shipping_address_street' value='"+data.street+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_city' id='invoice_shipping_address_city' value='"+data.city+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_state' id='invoice_shipping_address_state' value='"+data.state+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shipping_address_postal_code' id='invoice_shipping_address_postal_code' value='"+data.postal_code+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddressgstin' id='invoice_shippingaddressgstin' value='"+data.gst_num+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddresspanno' id='invoice_shippingaddresspanno' value='"+data.panno+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddressemailid' id='invoice_shippingaddressemailid' value='"+data.emailid+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_shippingaddresshphoneno' id='invoice_shippingaddresshphoneno' value='"+data.phoneno+"' />");
                    $("#invoice_BillToAddress_street").append("<input type='hidden' name='invoice_billingto_udyamno' id='invoice_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
                }
                else if(data.total_gst > 1)
                {
                    $(".invoice_BillingTo_gst_main").show();
                    $(".invoice_BillingToGSTDetails").hide();
                    $(".invoice_BillingToGSTDetails_dropdown").show();
                    $("#invoice_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#invoice_BillingTo_gstno").append(data.str_opt);
                    $("#invoice_BillingTo_gstno").customA11ySelect('refresh');
                }
                else
                {
                    $(".invoice_BillingTo_gst_main").hide();
                    $(".invoice_BillingToGSTDetails_dropdown").hide('refresh');
                    $(".invoice_BillingToGSTDetails").hide();
                    $("#invoice_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#invoice_BillingTo_gstno").customA11ySelect();
                }
            }
            else
            {
                $(".invoice_BillingTo_gst_main").hide();
                $(".invoice_BillingToGSTDetails_dropdown").hide();
                $(".invoice_BillingToGSTDetails").hide();
                $("#invoice_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#invoice_BillingTo_gstno").customA11ySelect('refresh');
            }
      }
    });
});

$(document).on("change", "#invoice_BillingTo_gstno", function(){
    var sel_id = $('#invoice_BillingTo_gstno option:selected').data('id');
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
                $(".invoice_BillingTo_gst_main").show();
                $(".invoice_BillingToGSTDetails").show();
                
                if(data.total_accounts == 1 && data.total_gst_nums > 1){
                    $(".invoice_diff_customer_gst").show();
                    $(".invoice_diff_customer_link").hide();
                }
                else if(data.total_accounts > 1){
                    $(".invoice_diff_customer_gst").hide();
                    $(".invoice_diff_customer_link").show();
                }
                else if(data.total_accounts == 1 && data.total_gst_nums == 1){
                    $(".invoice_diff_customer_gst").hide();
                    $(".invoice_diff_customer_link").hide();
                }
                
                $(".invoice_BillingTo_address_main").hide();
                $(".invoice_BillingToGSTDetails_dropdown").hide();
                $("#invoice_BillToGST_name").html("<span><b>"+data.name+"</b></span>");
                $("#invoice_BillToGST_address").html("<span>"+data.address+"</span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#invoice_BillToGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#invoice_BillToGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#invoice_BillToGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }
                $("#invoice_BillToGST_gst").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                if(data.panno!=""){
                    $("#invoice_BillToGST_pan").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                if(data.udyam_registration_no!=""){
                    $("#invoice_BillToGST_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#invoice_billtoname").remove();
                $("#invoice_shipping_address_street").remove();
                $("#invoice_shipping_address_city").remove();
                $("#invoice_shipping_address_state").remove();
                $("#invoice_shipping_address_postal_code").remove();
                $("#invoice_shippingaddressgstin").remove();
                $("#invoice_shippingaddresspanno").remove();
                $("#invoice_shippingaddressemailid").remove();
                $("#invoice_shippingaddresshphoneno").remove();
                $("#invoice_billingto_udyamno").remove();

                $("#invoice_BillToGST_name").append("<input type='hidden' name='invoice_billtoname' id='invoice_billtoname' value='"+data.name+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shipping_address_street' id='invoice_shipping_address_street' value='"+data.street+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shipping_address_city' id='invoice_shipping_address_city' value='"+data.city+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shipping_address_state' id='invoice_shipping_address_state' value='"+data.state+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shipping_address_postal_code' id='invoice_shipping_address_postal_code' value='"+data.postal_code+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shippingaddressgstin' id='invoice_shippingaddressgstin' value='"+data.gst_num+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shippingaddresspanno' id='invoice_shippingaddresspanno' value='"+data.panno+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shippingaddressemailid' id='invoice_shippingaddressemailid' value='"+data.emailid+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_shippingaddresshphoneno' id='invoice_shippingaddresshphoneno' value='"+data.phoneno+"' />");
                $("#invoice_BillToGST_address").append("<input type='hidden' name='invoice_billingto_udyamno' id='invoice_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else
            {
                $(".invoice_BillingToGSTDetails").hide();
            }
        }
    });
});


function cleared_createInvoice_estimate_level_discount_details()
{
    // Estimate level discount dropdown
    $("#invoice_Calculate_discounts .invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text('');

    $("#invoice_Calculate_discounts .invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text('Select Type');

    $("#invoice_Calculate_discounts .invoice_discount_section .custom-a11yselect-btn").attr("aria-activedescendant","Invoice_Percentage_select-option-0");

    $("#invoice_Calculate_discounts .invoice_discount_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts .invoice_discount_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts #invoice_disc_amt").val('');

    $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find(".invoice_main_amount ").text('');

    $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find(".invoice_main_amount").text('₹ 0000.00');
    
    $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find(".invoice_remove_discount").hide();
    

}


function cleared_createInvoice_estimate_level_gst_details()
{
    // alert("yes");
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_remove_adddiscount").hide();

    // Estimate level GST dropdown
    $("#invoice_Calculate_discounts .invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text('Select Type');

    $("#invoice_Calculate_discounts .invoice_GST_section .custom-a11yselect-btn").attr("aria-activedescendant","invoice_Calculate_IGSTandCGST_select-option-0");

    $("#invoice_Calculate_discounts .invoice_GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts .invoice_GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts .invoice_SGST_Discount").hide();

    // Estimate level GST rate dropdown
    $("#invoice_Calculate_discounts .invoice_rate_data .custom-a11yselect-btn .custom-a11yselect-text").text('0%');

    $("#invoice_Calculate_discounts .invoice_rate_data .custom-a11yselect-btn").attr("aria-activedescendant","invoice_Calculate_rate-option-0");

    $("#invoice_Calculate_discounts .invoice_rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts .invoice_rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_main_amount ").text('');

    $("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_main_amount").text('₹ 0000.00');
    
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").next().find(".invoice_main_amount").text('');
    
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").next().find(".invoice_main_amount").text('₹ 0000.00');
    
    $("#invoice_Calculate_discounts .invoice_GST_section .Invoice_IGSTandCGST option").removeAttr('selected');
    $("#invoice_Calculate_discounts .invoice_GST_section .Invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $("#invoice_Calculate_discounts .invoice_rate_data .invoice_DiscountPer option").removeAttr('selected');
    $("#invoice_Calculate_discounts .invoice_rate_data .invoice_DiscountPer option[value='0']").attr('selected','selected');

}

// On change event of discount type  i.e Percentage or Amount (item level)
$(document).on('change','#invoice_participantTable .Invoice_Percentage',function(){
    // alert("in per");

    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');


    var a=$(this).closest(".invoice_discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_amt = 0;
    var selected_gst_type = $(this).closest('tr').next().find('.invoice_GST_section .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var selected_gst_per = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    var amt_val = $(this).closest('tr').prev().find("input[name='invoice_item_main_amount[]']").val();


    var cur_rate_html=$(this).closest("tr").find(".invoice_rate");
    var cur_rate_val=$(this).closest("tr").find(".invoice_rate").val();
    if(a=='Percentage')
    {
        Invoice_Percentage_validation(cur_rate_html,cur_rate_val);
    }
    else if(a=='Amount')
    {
        // var main_amt = cur_rate_html.closest('tr').prev().find('.main_amount').val();
        Invoice_Amount_validation(cur_rate_html, cur_rate_val, parseFloat(amt_val));
    }


    if(a!="Select Type")
    {
        $("#invoice_calculated_disc_amt, #invoice_disc_amt").val(0);

        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").hide();

        $("#invoice_Calculate_discounts").find(".invoice_discount_section").find(".invoice_custom-a11yselect-option").removeClass("invoice_custom-a11yselect-selected invoice_custom-a11yselect-focused");
        $("#Invoice_Percentage_select-button .custom-a11yselect-text").text('Select Type');
        
        $("#Invoice_Percentage_select-menu li[data-val='']").addClass("invoice_custom-a11yselect-focused");
        $("#Invoice_Percentage_select-menu li[data-val='']").addClass("invoice_custom-a11yselect-selected");

        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find('.invoice_remove_adddiscount').hide();
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find('.invoice_igst_amount').val(0);
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find('.invoice_cgst_amount').val(0);
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find('.invoice_sgst_amount').val(0);
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").find('.invoice_main_amount').text("₹ 0000.00");

        $(this).closest("tr").find(".invoice_remove_discount").css("display","inline-block");
        
        /*var new_cal = 0;
        if(a=="Percentage")
        {
          var cur_rate_html=$(this).closest("tr").find(".invoice_rate");
          var cur_rate_val=$(this).closest("tr").find(".invoice_rate").val();
          Percentage_validation(cur_rate_html,cur_rate_val);

            if(amt_val != ""){
                disc_amt = (cur_rate_val/100) * amt_val;
            }
            else{
                $(this).closest('tr').find(".invoice_main_amount").text("");
                $(this).closest('tr').find(".invoice_main_amount").text("₹0000.00");
            }

            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var amt_after_discount = amt_val - disc_amt;
                    new_cal = (selected_gst_per * amt_after_discount)/100;
                    $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".invoice_item_cgst_amount, .invoice_item_sgst_amount").val(new_cal);
                }
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else{
                $(this).closest("tr").next().find(".invoice_main_amount").text("");
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
            }
        }
        if(a=="Amount")
        { 
            var cur_rate_val=$(this).closest("tr").find(".invoice_rate").val();

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = amt_val - cur_rate_val;
            }
            else{
                $(this).closest('tr').find(".invoice_main_amount").text("");
                $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
            }

            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var selected_gst_per = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var new_cal = (selected_gst_per * disc_amt)/100;
                    $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                    $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                    $(this).closest("tr").next().find(".invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var selected_gst_per = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var split_tax = selected_gst_per / 2;
                    var new_cal = (split_tax * disc_amt)/100;
                    $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                    $(this).closest("tr").next().find(".invoice_item_igst_amount").val(0);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }
            }
            else{
                $(this).closest("tr").next().find(".invoice_main_amount").text("");
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
            }
        }  
        $(this).closest('tr').find(".invoice_main_amount").text("");
        if(a=="Amount"){
            if(cur_rate_val){
                $(this).closest('tr').find(".invoice_main_amount").text("₹ "+cur_rate_val+".00");
            }
            else{
                $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
            }
        }
        if(a=="Percentage"){
            $(this).closest('tr').find(".invoice_main_amount").text("₹ "+disc_amt.toFixed(2));
        }
        $(this).closest('tr').find(".invoice_main_amount").append("<input type='hidden' name='invoice_calculated_discount[]' class='invoice_calculated_discount' value='"+disc_amt+"'>");*/

        $("#invoice_items_discount_selected").val(1);
    }
    else
    {

        cleared_createInvoice_estimate_level_discount_details();

        $("#invoice_items_discount_selected").val(0);

        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").show();

        var new_cal = 0;
        if(selected_gst_type!="Select Type"){
            if(selected_gst_type == 'IGST'){
                new_cal = (selected_gst_per * amt_val)/100;
                $(this).closest("tr").find(".invoice_item_igst_amount").val(new_cal);
            }
            if(selected_gst_type == 'CGST'){
                new_cal = (split_tax * amt_val)/100;
                $(this).closest("tr").find(".invoice_item_cgst_amount, .invoice_item_sgst_amount").val(new_cal);
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal);            
        }
        else{
            $(this).closest("tr").find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
        }
        $(this).closest('tr').find(".invoice_main_amount .invoice_calculated_discount").remove();
        $(this).closest('tr').find(".invoice_main_amount").text("");
        $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".invoice_remove_discount").css("display","none");
        $(this).closest("tr").find(".invoice_rate").val("");
    }
    /*var t = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(t);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(t);*/


    for_hiding_invoice_level_percentage();

    // Remove color when for any item both discount & gst is selected
    invoice_remove_panel_color();
    cal_invoice_level_amts();
});


function invoice_remove_panel_color()
{
// Remove color when for any item both discount & gst is selected
var items_inv_selected_disc = $("#invoice_items_discount_selected").val();
var items_inv_selected_gst = $("#invoice_items_gst_type_selected").val();
if(items_inv_selected_disc==1 && items_inv_selected_gst==1){
    $("#FinanceInvoiceModal #invoice_calculation").find(".panel-heading").addClass("remove-panel-color");
}
else
{
  $("#FinanceInvoiceModal #invoice_calculation").find(".panel-heading").removeClass("remove-panel-color");
}
}


// On change event of GST type (item level)
$(document).on("change", "#invoice_participantTable .Invoice_IGSTandCGST", function(){

    var a = $(this).closest(".invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
    // Make dropdown option selected when select any
    $("select[name='invoice_item_gst_type[]']").each(function(){
        $('option:selected', $("select[name='invoice_item_gst_type[]']").val(a)).attr('selected',true).siblings().removeAttr('selected');
    });

    if(a!="Select Type")
    {
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").hide();
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").find('.invoice_remove_adddiscount').hide();
        $("#invoice_Calculate_discounts #invoice_SGST_Calculate").closest("tr").hide();
        $("#invoice_Calculate_discounts .invoice_SGST_Discount").closest("tr").find('.invoice_remove_adddiscount').hide();

        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").find('.invoice_igst_amount').val(0);
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").find('.invoice_cgst_amount').val(0);
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").find('.invoice_sgst_amount').val(0);

        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").find('.invoice_main_amount').text("₹ 0000.00");
        $("#invoice_Calculate_discounts .invoice_SGST_Discount").closest("tr").find('.invoice_main_amount').text("₹ 0000.00");

        $("#invoice_items_selected_gst_type").val("");
        $("#invoice_items_selected_gst_type").val(a);

        $("#invoice_participantTable .invoice_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text(a);
        $("#invoice_participantTable .invoice_participantRow .GST_section").find(".custom-a11yselect-menu li").removeClass("invoice_custom-a11yselect-focused invoice_custom-a11yselect-selected");
        $("#invoice_participantTable .invoice_participantRow .GST_section").find(".custom-a11yselect-menu li[data-val='"+a+"']").addClass("invoice_custom-a11yselect-focused invoice_custom-a11yselect-selected");
        
        var element=$("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr");
        // First GST rate field
        var element1=element.find(".invoice_rate_data");
        var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

        // for CGST field
        var element2=element.find(".invoice_GST_section");
        element.find(".invoice_main_amount").text("₹ 0000.00");
        var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
        var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        //var curr_tax = $(this).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        // var main_amount = 0;
        /*var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;

        var len = $("#invoice_participantTable .invoice_participantRow .invoice_main-group").length;
        var main_amount = 0;
        for(var s=0;s<len;s++){
            var n = $(this).closest("#invoice_participantTable .invoice_participantRow").find(".invoice_main-group").eq(s);
            var curr_tax = n.next().next().find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().find(".invoice_GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
            if(m == 'IGST'){
                $("#invoice_participantTable .invoice_participantRow .invoice_SGST_Discount").hide();

                main_amount = n.find(".invoice_main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().find(".invoice_calculated_discount").val();
                var disc_type = n.next().find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type"){
                    if(disc_type == 'Percentage'){
                        amt_after_discount = main_amount - calculated_disc;
                        calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (curr_tax * calculated_disc)/100;
                    }
                }
                else{
                    calculated_tax_amt = (curr_tax * main_amount)/100;
                }
                n.next().next().find(".invoice_main_amount").text("");
                n.next().next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().find(".invoice_item_cgst_amount").val(0);
                n.next().find(".invoice_item_sgst_amount").val(0);
                n.next().find(".invoice_item_igst_amount").val(calculated_tax_amt);
            }
            if(m == 'CGST'){
                $("#invoice_participantTable .invoice_participantRow .invoice_SGST_Discount").show();

                main_amount = n.find(".invoice_main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().find(".invoice_calculated_discount").val();
                var split_tax = curr_tax / 2;
                var disc_type = n.next().find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type"){
                    if(disc_type == 'Percentage'){
                        amt_after_discount = main_amount - calculated_disc;
                        calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    }
                    if(disc_type == 'Amount'){
                        calculated_tax_amt = (split_tax * calculated_disc)/100;
                    }
                }
                else{
                    calculated_tax_amt = (split_tax * main_amount)/100;
                }
                n.next().next().find(".invoice_main_amount").text("");
                n.next().next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().next().next().find(".invoice_main_amount").text("");
                n.next().next().next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                n.next().find(".invoice_item_cgst_amount").val(calculated_tax_amt);
                n.next().find(".invoice_item_sgst_amount").val(calculated_tax_amt);
                n.next().find(".invoice_item_igst_amount").val(0);
            }
            n.next().next().find(".invoice_remove_adddiscount").show();
        }*/
        

        /*if(a == 'IGST'){ console.log("IGST selected");
            $("#participantTable .participantRow .SGST_Discount").hide();

            main_amount = $(this).closest('tr').prev().prev().find(".main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".calculated_discount").val();
            var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                }
                if(disc_type == 'Amount'){
                    calculated_tax_amt = (curr_tax * calculated_disc)/100;
                }
            }
            else{
                calculated_tax_amt = (curr_tax * main_amount)/100;
            }
            $(this).closest("td").next().find(".main_amount").text("");
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
            $(this).closest("td").next().next().find(".main_amount").text("");
            $(this).closest("td").next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
            $(this).closest("td").next().find(".item_cgst_amount").val(0);
            $(this).closest("td").next().find(".item_sgst_amount").val(0);
            $(this).closest("td").next().find(".item_igst_amount").val(calculated_tax_amt);
        }
        if(a == 'CGST'){ console.log("CGST selected");
            $("#participantTable .participantRow .SGST_Discount").show();

            main_amount = $(this).closest('tr').prev().prev().find(".main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".calculated_discount").val();
            
            var split_tax = curr_tax / 2;
            
            var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * amt_after_discount)/100;
                }
                if(disc_type == 'Amount'){
                    calculated_tax_amt = (split_tax * calculated_disc)/100;
                }
            }
            else{
                calculated_tax_amt = (split_tax * main_amount)/100;
            }
            $(this).closest("td").next().find(".main_amount").text("");
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").next().next().find(".main_amount").text("");
            $(this).closest("td").next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            
            $(this).closest('td').next().find(".item_igst_amount").val(0);
            $(this).closest('td').next().find(".item_cgst_amount").val(calculated_tax_amt);
            $(this).closest('td').next().find(".item_sgst_amount").val(calculated_tax_amt);
        }*/

        $("#invoice_items_gst_type_selected").val(1);
    }
    else{
        $("#invoice_items_gst_type_selected").val(0);

        $("#invoice_participantTable .invoice_CGST_TR_section").closest("tr").find('.invoice_item_igst_amount').val(0);
        $("#invoice_participantTable .invoice_CGST_TR_section").closest("tr").find('.invoice_item_cgst_amount').val(0);
        $("#invoice_participantTable .invoice_CGST_TR_section").closest("tr").find('.invoice_item_sgst_amount').val(0);

        /*$(this).closest("tr").find(".invoice_main_amount").text("");
        $(this).closest("tr").find(".invoice_main_amount").text("₹ 0000.00"); 
        $(this).closest("tr").next().find(".invoice_main_amount").text("");
        $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");*/
        //$("#Calculate_IGSTandCGST_select").closest("tr").show();
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").show();
        $("#invoice_items_selected_gst_type").val("");
        cleared_createInvoice_estimate_level_gst_details();
    }

    // Remove color when for any item both discount & gst is selected
    invoice_remove_panel_color();
    cal_invoice_level_amts();
});

// On change event of GST rate (item level)
$(document).on("change", "#invoice_participantTable .invoice_DiscountPer", function(){

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type"){
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount = 0;
        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;
        if(a == 'IGST'){
            main_amount = $(this).closest('tr').prev().prev().find(".invoice_main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".invoice_calculated_discount").val();
            var disc_type = $(this).closest("tr").prev().find(".invoice_discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                }
                if(disc_type == 'Amount'){
                    calculated_tax_amt = (curr_tax * calculated_disc)/100;
                }
            }
            else{
                calculated_tax_amt = (curr_tax * main_amount)/100;
            }
            $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".invoice_item_cgst_amount").val(0);
            $(this).closest("td").find(".invoice_item_sgst_amount").val(0);
            $(this).closest("td").find(".invoice_item_igst_amount").val(calculated_tax_amt);
        }
        if(a == 'CGST'){
            main_amount = $(this).closest('tr').prev().prev().find(".invoice_main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".invoice_calculated_discount").val();
            
            var split_tax = curr_tax / 2;
            
            var disc_type = $(this).closest("tr").prev().find(".invoice_discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * amt_after_discount)/100;
                }
                if(disc_type == 'Amount'){
                    calculated_tax_amt = (split_tax * calculated_disc)/100;
                }
            }
            else{
                calculated_tax_amt = (split_tax * main_amount)/100;
            }
            $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".invoice_item_igst_amount").val(0);
            $(this).closest("td").find(".invoice_item_cgst_amount").val(calculated_tax_amt);
            $(this).closest("td").find(".invoice_item_sgst_amount").val(calculated_tax_amt);
            $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }

    $("#invoice_summary_value").val(2);
    cal_invoice_level_amts();
});

// Remove button clicked in front of amount (item level)
$(document).on('click','#invoice_participantTable .Invoice_remove',function(){
  
    var before_dlt_len = $("#invoice_participantTable .invoice_participantRow .invoice_main-group").length;

    var row_element = $(this).closest("tr");
    row_element.next().remove();
    row_element.next().remove();
    row_element.next().remove();
    row_element.remove();
    $("#invoice_total_items").val(before_dlt_len - 1);

    var len = $("#invoice_participantTable .invoice_participantRow .invoice_main-group").length;

    if(len == 0)
    {
        $('.invoice_participantRow').append(invoice_items_add);
        $(".Invoice_Percentage").customA11ySelect();
        $(".Invoice_IGSTandCGST").customA11ySelect();
        $(".invoice_DiscountPer").customA11ySelect();
        $("#invoice_total_items").val(1);
        cleared_createInvoice_estimate_level_discount_details();
        cleared_createInvoice_estimate_level_gst_details();
    }
    
    for(var g=0;g<len;g++)
    {
        var s=g+1;
        $(".invoice_participantRow .invoice_main-group").eq(g).find(".invoice_sno").html(s);
    }

    for_hiding_invoice_level_percentage();
    for_hiding_invoice_level_GST();
    invoice_remove_panel_color();
    $("#invoice_summary_value").val(2);
    cal_invoice_level_amts();

    // $(this).closest("tr").find("input").val("");
    // for(k=0;k<len;k++){
    //     if($("#invoice_total_items").val()!=1){
    //         var row_element = $(this).closest("tr").eq(k);
    //         row_element.next().next().next().remove();
    //         row_element.next().next().remove();
    //         row_element.next().remove();
    //         row_element.remove();
    //     }
    //     else {
    //         var element = $(this).closest("tr").eq(k).next();
    //         element.find(".invoice_rate").val("");
    //         var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element,id,text_msg);

    //         element.next().find("input").val("");
    //         element.next().find(".invoice_main_amount .invoice_calculated_discount").val(0);
    //         element.next().find(".invoice_main_amount").text("₹ 0000.00");
    //         element.next().find(".invoice_remove_discount").hide();
    //         element.next().next().find(".invoice_remove_adddiscount").hide();
    //         element.next().next().next().find(".invoice_remove_adddiscount").hide();

    //         $(this).closest("tr").next().find("input").val("");
    //         $(this).closest("tr").next().find(".invoice_main_amount .invoice_calculated_discount").val(0);
    //         $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
    //         $(this).closest("tr").next().find(".invoice_remove_discount").hide();
    //         $(this).closest("tr").next().next().find(".invoice_remove_adddiscount").hide();
    //         $(this).closest("tr").next().next().next().find(".invoice_remove_adddiscount").hide();
    //         $(this).closest("tr").next().next().find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);

    //         // First GST rate field
    //         var element1=element.next().find(".invoice_rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         // for CGST field
    //         var element2=element.next().find(".invoice_GST_section");
    //         element.next().find(".invoice_main_amount").text("₹ 0000.00");
    //         var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element2,cur_id,cur_text);

    //         //for hide sgst row
    //         element.next().next().hide();
    //     }
    // }
    // if(len > 1){
    //     len = len - 1;
    //     $("#invoice_total_items").val(len);

    //     for(var g=0;g<len;g++)
    //     {
    //         var s=g+1;
    //         $(".invoice_participantRow .invoice_main-group").eq(g).find(".invoice_sno").html(s);
    //     }
    // }
    // $("#invoice_items_selected_gst_type").val('');
    // $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").show();

    // var s = invoice_total_amount_for_invoice_level_discount();
    // if(s){
    //     calculate_invoice_level_discount(s);
    //     $("#total_invoice_value").val(0);
    //     $("#total_invoice_value").val(s);
    // }
    // else{
    //     var no=$("#invoiceForm .invoice_participantRow .invoice_main-group").length;
    //     var estimate_element = $("#invoice_Calculate_discounts");
    //     if(no == 1){
    //         // Estimate level discount row reset
    //         $("#invoice_disc_amt").val("");
    //         estimate_element.find(".invoice_main_amount").text("₹ 0000.00");
    //         var id=estimate_element.find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=estimate_element.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(estimate_element,id,text_msg);

    //         var element1=estimate_element.find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         //for hide sgst row
    //         estimate_element.find("#invoice_SGST_Calculate").hide();
    //         $("#invoice_total_estimate_value, #invoice_subtotal_amount, #invoice_totaldiscount_amount, #invoice_totaltaxes_amount, #invoicetotal_amount").val(0);
    //         $(".invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    //     }
    //     else{
    //         var k = invoice_get_all_item_rows_main_total();
    //         calculate_invoice_level_discount(k);
    //         $("#total_invoice_value").val(0);
    //         $("#total_invoice_value").val(k);
    //         $(".invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    //     }
    // }
});



function for_hiding_invoice_level_percentage()
{
    var len = $(".invoice_participantRow .invoice_main-group").length;
    var flag = 0 ;
    var arr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".invoice_participantRow .invoice_main-group").eq(v).next().find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arr.push(selected_type) ;
        }

        
    }

    if(arr.length == 0)
    {
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").show();
        $("#invoice_items_discount_selected").val(0);
        // cleared_createInvoice_estimate_level_discount_details();
    }
    else
    {
        $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").hide();
        $("#invoice_items_discount_selected").val(1);

    }
}


function for_hiding_invoice_level_GST()
{
    var len = $(".invoice_participantRow .invoice_main-group").length;
    var flag = 0 ;
    var arrr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".invoice_participantRow .invoice_main-group").eq(v).next().next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arrr.push(selected_type) ;
          // console.log(selected_type);
        }

        
    }

    if(arrr.length == 0)
    {
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").show();
        $("#invoice_items_gst_type_selected").val(0);
    }
    else
    {
        $("#invoice_Calculate_discounts .invoice_CGST_TR_section").hide();
        $("#invoice_items_gst_type_selected").val(1);

    }
}

// Remove button clicked in front of SGST
$(document).on('click','.invoice_SGST_Discount .invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").prev().find(".Invoice_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").prev().find(".invoice_DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(".invoice_participantRow").find(".invoice_GST_section .Invoice_IGSTandCGST option").removeAttr('selected');
    $(".invoice_participantRow").find(".invoice_GST_section .Invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(".invoice_participantRow").find(".invoice_rate_data .invoice_DiscountPer option").removeAttr('selected');
    $(".invoice_participantRow").find(".invoice_rate_data .invoice_DiscountPer option[value='0']").attr('selected','selected');
    
    var len = $("#invoice_participantTable .invoice_participantRow .invoice_main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#invoice_participantTable .invoice_participantRow").find(".invoice_SGST_Discount").eq(k);
        var current=element.prev().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(current == 'CGST'){
            element.css("display","none");
            // for rate select field of SGST
            var element1=element.find(".invoice_rate_data");
            var sgst_rate_id=element.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
            var sgst_rate_text=element.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
            ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
        }
        // for CGST select field
        var element2=element.prev().find(".invoice_GST_section");
        var cur_id=element.prev().find(".invoice_GST_section .custom-a11yselect-menu li:first").attr("id");
        var cur_text=element.prev().find(".invoice_GST_section .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        // for rate select field of GST
        var element3=element.prev().find(".invoice_rate_data");
        var cgst_rate_id=element.prev().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element.prev().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

        // element.find(".invoice_main_amount").text("");
        // element.find(".invoice_main_amount").text("₹ 0000.00");
        // element.next().find(".invoice_main_amount").text("");
        // element.next().find(".invoice_main_amount").text("₹ 0000.00");

        element.prev().find(".invoice_item_igst_amount").val(0);
        element.prev().find(".invoice_item_cgst_amount").val(0);
        element.prev().find(".invoice_item_sgst_amount").val(0);

        // element.find(".invoice_remove_adddiscount").css("display","none");
    }
    $("#invoice_items_selected_gst_type").val("");
    $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_remove_adddiscount').css("display","none");
    $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_main_amount').text('');
    $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_main_amount').text('₹ 0000.00');
    $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('');
    $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('₹ 0000.00');

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

    element.find(".estimate_remove_adddiscount").css("display","none");*/

    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").show();

    $("#invoice_summary_value").val(2);
    $("#invoice_items_gst_type_selected").val(0);
    invoice_remove_panel_color();
});

// Remove button clicked in front of discount (item level)
$(document).on('click','#invoice_participantTable .invoice_remove_discount',function(){
    var element=$(this).closest("tr");
    var disc_rate = element.find(".invoice_rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".invoice_main_amount").text("₹ 0000.00");

    $(this).closest("tr").find(".invoice_discount_section .Invoice_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".invoice_discount_section .Invoice_Percentage option").first().attr('selected','selected');

    var main_amt = $(this).closest("tr").prev().find(".invoice_main_amount").val();
    var applied_tax = $(this).closest("tr").next().find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = $(this).closest("tr").next().find(".invoice_GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type"){
        // $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").show();

        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            $(this).closest('tr').next().next().find(".invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
        }
        if(disc_rate!=""){
            $(this).closest('tr').next().find(".invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
        }
        else {
            $(this).closest('tr').next().next().find(".invoice_main_amount").text("₹ 0000.00");
        }
        element.find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='0'>");
    }
    else{
        element.next().find(".invoice_main_amount").text("");
        element.next().find(".invoice_main_amount").text("₹ 0000.00");
        element.next().next().find(".invoice_main_amount").text("");
        element.next().next().find(".invoice_main_amount").text("₹ 0000.00");
        element.find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='0'>");
        // $("#invoice_Calculate_discounts .invoice_discount_section").closest("tr").hide();
    }
    $("#invoice_disc_amt").val('');
    $("#invoice_calculated_disc_amt").val(0);
    /*var s = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(s);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(s);*/
    $("#invoice_summary_value").val(2);
    cal_invoice_level_amts();

    $("#invoice_items_discount_selected").val(0);
    cleared_createInvoice_estimate_level_discount_details();
    for_hiding_invoice_level_percentage();
    invoice_remove_panel_color();

});

// Remove button clicked in front of CGST (item level)
$(document).on('click','#invoice_participantTable .invoice_CGST_TR_section .invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".Invoice_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").find(".invoice_DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(".invoice_participantRow").find(".invoice_GST_section .Invoice_IGSTandCGST option").removeAttr('selected');
    $(".invoice_participantRow").find(".invoice_GST_section .Invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(".invoice_participantRow").find(".invoice_rate_data .invoice_DiscountPer option").removeAttr('selected');
    $(".invoice_participantRow").find(".invoice_rate_data .invoice_DiscountPer option[value='0']").attr('selected','selected');
    
    var len = $("#invoice_participantTable .invoice_participantRow .invoice_main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#invoice_participantTable .invoice_participantRow").find(".invoice_CGST_TR_section").eq(k);
        var current=element.find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(current == 'CGST'){
            element.next().css("display","none");
            // for rate select field of SGST
            var element1=element.next().find(".invoice_rate_data");
            var sgst_rate_id=element.next().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
            var sgst_rate_text=element.next().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
            ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
        }
        // for select gst field
        var element2=element.find(".invoice_GST_section");
        var cur_id=element.find(".invoice_GST_section .custom-a11yselect-menu li:first").attr("id");
        var cur_text=element.find(".invoice_GST_section .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        var element3=element.find(".invoice_rate_data");
        var cgst_rate_id=element.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

        element.find(".invoice_main_amount").text("");
        element.find(".invoice_main_amount").text("₹ 0000.00");
        element.next().find(".invoice_main_amount").text("");
        element.next().find(".invoice_main_amount").text("₹ 0000.00");

        element.find(".invoice_item_igst_amount").val(0);
        element.find(".invoice_item_cgst_amount").val(0);
        element.find(".invoice_item_sgst_amount").val(0);

        // $(this).css("display","none");

    }
    $('#FinanceInvoiceModal .invoice_CGST_TR_section .invoice_remove_adddiscount').css("display","none");
    $("#invoice_items_gst_type_selected").val(0);

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

    element.find(".main_amount").text("");
    element.find(".main_amount").text("₹ 0000.00");
    element.next().find(".main_amount").text("");
    element.next().find(".main_amount").text("₹ 0000.00");
    
    $(this).css("display","none");
    */
    $("#invoice_summary_value").val(2);
    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").show();
    $("#invoice_items_gst_type_selected").val(0);
    // cal_invoice_level_amts();
});

// Calculation on estimate form
$(document).on("keyup", "#invoiceForm #invoice_participantTable .invoice_item_qty", function(e){
    
    invoice_item_qty_change(this);

    var qty_val = $(this).val();
    // alert(qty_val);
    var amt = 0;
    var rate_val = $(this).closest('.invoice_main-group').find("input[name='invoice_item_rate[]']").val();
    if(rate_val == "" ){
        $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(qty_val);
        amt = qty_val;
    }
    if(rate_val != ""){
        if(qty_val == ""){
          $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(rate_val);
          amt = rate_val;
        }
        else
        {
          amt = qty_val * rate_val;
          $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(amt);
        }
        //$("#total_estimate_value").val(amt);
    }
    // invoice_calculate_gst_amount_on_qty_rate_change($(this), amt);

    /*var t2 = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(t2);
    $("#total_invoice_value").val(t2);*/

    cal_invoice_level_amts();

    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").removeAttr("style");
    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").closest("td").find(".err").remove("");
    
    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

$(document).on("keyup", "#invoiceForm #invoice_participantTable input[name='invoice_item_rate[]']", function(){
    
    invoice_item_rate_change(this);
    var rate_val = $(this).val();
    var qty_val = $(this).closest('.invoice_main-group').find("input[name='invoice_item_qty[]']").val();
    var amt = 0;

    if(qty_val == ""){
        $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(rate_val);
        amt = rate_val;
    }
    if(qty_val != ""){
        if(rate_val == ""){
            $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(qty_val);
            amt = qty_val;
        }
        else if(rate_val != "")
        {
            amt = qty_val * rate_val;
            $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").val(amt);
        }
    }
    cal_invoice_level_amts();

    /*invoice_calculate_gst_amount_on_qty_rate_change($(this), amt);
    var t3 = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(t3);
    $("#total_invoice_value").val(t3);*/

    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").removeAttr("style");
    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

$(document).on("keyup", "#invoice_participantTable .invoice_main_amount", function(){
    /*var amt = parseFloat($(this).val());
    invoice_calculate_gst_amount_on_qty_rate_change($(this), amt);
    var s = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(s);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(s);*/
    var amt = $(this).val();
    $("#total_invoice_value").val(parseFloat(amt));
    if(amt != ""){
        invoice_calculate_gst_amount_on_qty_rate_change($(this), amt);
    }
    var t3 = invoice_total_amount_for_invoice_level_discount();
    // calculate_invoice_level_discount(t3);
    // $("#total_invoice_value").val(t3);

    invoice_check_qty_rate(this);
    cal_invoice_level_amts();

    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").removeAttr("style");
    $(this).closest('.invoice_main-group').find("input[name='invoice_item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

$(document).on("keyup", "input[name='invoice_item_discount_rate[]']", function(){
    var disc_amt = 0;
    var disc_rate_val = $(this).val();
    var amt_val = $(this).closest('tr').prev().find("input[name='invoice_item_main_amount[]']").val();
    var drop_val = $(this).closest('tr').find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;

    // Estimate level GST
    var est_selected_gst_type = $("#invoice_Calculate_discounts").find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#invoice_Calculate_discounts").find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var est_split_tax = est_selected_gst_per / 2;
    
    /*if(amt_val != ""){
        if(disc_rate_val!=""){
            if(drop_val == "Percentage"){
                disc_amt = (disc_rate_val/100) * amt_val;

                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = amt_val - disc_amt;
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $(this).closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                      $(this).closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                    }
                    $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(est_selected_gst_type != "Select Type"){
                    var new_cal_amt = amt_val - disc_amt;
                    if(est_selected_gst_type == 'IGST'){
                      var new_cal = (est_selected_gst_per_estimates * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                    }
                    if(est_selected_gst_type == 'CGST'){
                      var new_cal = (est_split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                      $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                    }
                    // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(disc_amt);
                    $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#invoice_Calculate_discounts").find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest('tr').find(".invoice_main_amount").text("");
                $(this).closest('tr').find(".invoice_main_amount").text("₹ "+disc_amt.toFixed(2));

            }
            if(drop_val == "Amount"){
                disc_amt = parseInt(amt_val) - parseInt(disc_rate_val);

                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $(this).closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                      $(this).closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                    }
                    $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(est_selected_gst_type != "Select Type"){
                    if(est_selected_gst_type == 'IGST'){
                      var new_cal = (est_selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                    }
                    else if(est_selected_gst_type == 'CGST'){
                      var new_cal = (est_split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                    }
                    else {
                        var new_val = 0;
                    }
                    // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(disc_rate_val);
                    $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#invoice_Calculate_discounts").find("#invoice_SGST_Calculate .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest('tr').find(".invoice_main_amount").text("");
                $(this).closest('tr').find(".invoice_main_amount").text("₹ "+disc_rate_val+".00");

            }
            $(this).closest('tr').find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='"+disc_amt+"'>");
        }
        else
        {   
            if(selected_gst_type!="Select Type"){
                if(disc_rate_val==""){
                    $(this).closest('tr').find(".invoice_main_amount").text("");  
                    $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");  
                }
                if(selected_gst_type == 'IGST'){
                  var new_cal = (selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                  var new_cal = (split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  $(this).closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                  $(this).closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                }
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));

            }
            if(est_selected_gst_type!="Select Type"){
                if(disc_rate_val==""){
                    $(this).closest('tr').find(".invoice_main_amount").text("");  
                    $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");  
                }
                if(est_selected_gst_type == 'IGST'){
                  var new_cal = (est_selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  $(this).closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                  $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                }
                if(est_selected_gst_type == 'CGST'){
                  var new_cal = (est_split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  $(this).closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                  $(this).closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);

                  $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                  $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                }
                $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                $("#invoice_Calculate_discounts").find("#invoice_edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else
            {   
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='0'>");
                $(this).closest("tr").next().find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
            }
        }
    }*/

    cal_invoice_level_amts();

    /*var t1 = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(t1);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(t1);*/

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

$(document).on("click", "#save_invoice_BTN_new", function(event){
    // $('#invoiceForm').submit(function(event)
    // {   
        event.preventDefault();
        event.stopImmediatePropagation();
        $(".invoice_filesList").empty();
        var flag = true;

        // alert($('#invoice_billtoname').length);

        if($('#invoice_billfromname').length == 0)
        {
            var chk_fromaddr_element = $(".invoice_BillingFrom_address_and_gst").find(".invoice_BillingFrom_address_main");
            var chk_fromaddr_element_val = chk_fromaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_fromgst_element = $(".invoice_BillingFrom_address_and_gst").find(".invoice_BillingFrom_gst_main");
            var chk_fromgst_element_val = chk_fromgst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            
            if(chk_fromaddr_element.is(":visible") && chk_fromaddr_element_val=="Select Billing Entity")
            {
                $(".invoice_BillingFrom_address_main").find(".err").remove();
                $("#invoiceForm #invoice_Address_Details").find(".invoice_BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $("#invoice_BillingFrom_addr").css('border-color', '#ad4846');
                $(".invoice_BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");  
            }

            if(chk_fromgst_element.is(":visible") && chk_fromgst_element_val=="Select GSTIN")
            {
                $(".invoice_BillingFromGSTDetails_dropdown").find(".err").remove();
                $("#invoiceForm #invoice_Address_Details").find(".invoice_BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $(".invoice_BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_fromaddr_element.is(":visible") && !chk_fromgst_element.is(":visible"))
            {
                $(".invoice_BillingFromCard").css('border-color', '#ad4846');
            }

            flag = false;
        }
        else if($('#invoice_number').val() == "")
        {
            $("#invoice_number").closest("div").find(".err").remove();
            $("#invoice_number").css('border-color', '#ad4846');
            $("#invoice_number").closest("div").append("<span class='err text-danger'>Please enter invoice number</span>");
            flag = false;
        }
        else if($('#invoice_date').val() == "")
        {
            $('#invoice_date').closest("div").parent().find(".err").remove();
            $('#invoice_date').css('border-color', '#ad4846');
            $('#invoice_date').closest("div").parent().append("<span class='err text-danger'>Please enter invoice date</span>");
            flag = false;
        }
        else if($('#invoice_billtoname').length == 0)
        {
            var chk_toaddr_element = $(".invoice_BillingTo_address_and_gst").find(".invoice_BillingTo_address_main");
            var chk_toaddr_element_val = chk_toaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_togst_element = $(".invoice_BillingTo_address_and_gst").find(".invoice_BillingTo_gst_main");
            var chk_togst_element_val = chk_togst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            
            if(chk_toaddr_element.is(":visible") && chk_toaddr_element_val=="Select Customer")
            {
                $(".invoice_BillingTo_address_main").find(".err").remove();
                $("#invoiceForm #invoice_Address_Details_BillTo").find(".invoice_BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $(".invoice_BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");
            }
            if(chk_togst_element.is(":visible") && chk_togst_element_val=="Select GSTIN")
            {
                $(".invoice_BillingToGSTDetails_dropdown").find(".err").remove();
                $("#invoiceForm #invoice_Address_Details_BillTo").find(".invoice_BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $(".invoice_BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_toaddr_element.is(":visible") && !chk_togst_element.is(":visible"))
            {
                $(".invoice_BillingToCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else{
            var len = $("#Invoice_main_details .invoice_main-group").length;
            $(".err").remove();
            for(var s=0;s<len;s++)
            {
                var current=$("#Invoice_main_details .invoice_main-group").eq(s);
                if(current.find("input[name='invoice_item_descr[]']").val() == '')
                {
                    current.find(".invoice_item_descr").closest("td").find(".err").remove();
                    current.find(".invoice_item_descr").css('border-color', '#ad4846');
                    current.find(".invoice_item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                    $("#FinanceInvoiceModal").animate({ 
                        scrollTop:  $("input[name='invoice_item_descr[]']").offset().top 
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
                if(current.find("input[name='invoice_item_main_amount[]']").val() == '')
                {
                    current.find("input[name='invoice_item_main_amount[]']").closest("td").find(".err").remove();
                    current.find("input[name='invoice_item_main_amount[]']").css('border-color', '#ad4846');
                    current.find("input[name='invoice_item_main_amount[]']").closest("td").append("<span class='err text-danger'>Please enter amount</span>");

                    $("#FinanceInvoiceModal").animate({ 
                        scrollTop:  $("input[name='invoice_item_main_amount[]']").offset().top 
                    }, 100);
                    
                    flag = false;
                }
            }
        }

        if(flag == false){
          return false;
        }
        else{
            var estimate_summary_value = $("#invoice_summary_value").val();
            // alert(estimate_summary_value);
            var flag1 = true;
            $("#invoice_summary_error").closest('.form-group').remove();
            var sectionOffset = $('#invoice_CalculateBtn').offset();
            if(estimate_summary_value == 0){
                $("<div class='form-group'><span id='invoice_summary_error' style='color:#ad4846;'> Please calculate invoice summary</span></div>").insertAfter("#invoice_CalculateBtn .form-group");
                
                $("#FinanceInvoiceModal").animate({ 
                    scrollTop:  $("#invoice_CalculateBtn").offset().top 
                }, 100);
                
                flag1 = false;
            }
            else if(estimate_summary_value == 2){
                $("<div class='form-group'><span id='invoice_summary_error' style='color:#ad4846;'> Please recalculate invoice summary</span></div>").insertAfter("#invoice_CalculateBtn .form-group");
                
                $("#FinanceInvoiceModal").animate({ 
                    scrollTop:  $("#invoice_CalculateBtn").offset().top 
                }, 100);

                flag1 = false;
            }

            if(flag1 == false){
                return false;
            }
            else{
                $("#save_invoice_BTN_new").attr("disabled", "disabled");
                
                var formdata= $('#invoiceForm');
                var newInvFileFlag = 0;
                form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#invoice_attachment')[0].files, function(i, file) {
                    form.append('invoice_attachment['+i+']', file);
                    newInvFileFlag = 1;
                });

                if(newInvFileFlag)
                {
                    $("#FinanceInvoiceModal .email-blur-effect, #FinanceInvoiceModal .email-loader").show();
                }

                $.ajax({
                    type    : "POST",
                    url     : "../../client/res/templates/financial_changes/save_invoice.php",
                    dataType  : "json",
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data)
                    {
                        if(data.status == "true")
                        {
                            if(newInvFileFlag)
                            {
                                $("#FinanceInvoiceModal .email-blur-effect, #FinanceInvoiceModal .email-loader").hide();
                            }

                            $.confirm({
                                title: 'Success!',
                                content: data.msg,
                                buttons: {
                                    Ok: function () {
                                        $('button[data-action="reset"]').trigger('click');
                                        //$(function (){
                                            //$('#estimate_main_details').modal('toggle');
                                        $('#FinanceInvoiceModal').modal('hide');
                                        //});
                                        $('#invoiceForm')[0].reset();
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



// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', this).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").find(".invoice_DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".invoice_GST_section .Invoice_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").find(".invoice_GST_section .Invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").find(".invoice_rate_data .invoice_DiscountPer option").removeAttr('selected');
    $(this).closest("tr").find(".invoice_rate_data .invoice_DiscountPer option[value='0']").attr('selected','selected');

    var element=$(this).closest("tr");

    var current=element.find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    if(current=="CGST")
    {
        element.next().css("display","none");

        // for rate select field of SGST
        var element1=element.next().find(".invoice_rate_data");
        var sgst_rate_id=element.next().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.next().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }

    // for select gst field
    var element2=element.find(".invoice_GST_section");

    var cur_id=element.find(".invoice_GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.find(".invoice_GST_section .custom-a11yselect-menu li:first button").text();

    ResetDiscount(element2,cur_id,cur_text);

    var element3=element.find(".invoice_rate_data");
    var cgst_rate_id=element.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.find(".invoice_main_amount").text("");
    element.find(".invoice_main_amount").text("₹ 0000.00");
    element.next().find(".invoice_main_amount").text("");
    element.next().find(".invoice_main_amount").text("₹ 0000.00");
    element.find(".invoice_rate_data .invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#invoice_Calculate_discounts .invoice_SGST_Discount .invoice_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").prev().find(".Invoice_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").prev().find(".invoice_DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").prev().find(".invoice_GST_section .Invoice_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").prev().find(".invoice_GST_section .Invoice_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").prev().find(".invoice_rate_data .invoice_DiscountPer option").removeAttr('selected');
    $(this).closest("tr").prev().find(".invoice_rate_data .invoice_DiscountPer option[value='0']").attr('selected','selected');

    var element=$(this).closest("tr");

    var current=element.prev().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    if(current=="CGST")
    {
        element.css("display","none");
        // for rate select field of SGST
        var element1=element.find(".invoice_rate_data");
        var sgst_rate_id=element.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
        var sgst_rate_text=element.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,sgst_rate_id,sgst_rate_text);
    }
    // for select gst field
    var element2=element.prev().find(".invoice_GST_section");
    var cur_id=element.prev().find(".invoice_GST_section .custom-a11yselect-menu li:first").attr("id");
    var cur_text=element.prev().find(".invoice_GST_section .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element2,cur_id,cur_text);

    var element3=element.prev().find(".invoice_rate_data");
    var cgst_rate_id=element.prev().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=element.prev().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
    ResetDiscount(element3,cgst_rate_id,cgst_rate_text);

    element.prev().find(".invoice_main_amount").text("");
    element.prev().find(".invoice_main_amount").text("₹ 0000.00");
    element.find(".invoice_main_amount").text("");
    element.find(".invoice_main_amount").text("₹ 0000.00");
    element.prev().find(".invoice_rate_data .invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations of gst on item qunatity or rate change
function invoice_calculate_gst_amount_on_qty_rate_change(element, amt)
{
    
    cal_invoice_level_amts();

    /*var disc_type = element.closest("tr").next().find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var disc_rate = element.closest("tr").next().find(".invoice_rate").val();
    var selected_gst_type = element.closest('tr').next().next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
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
                    element.closest("tr").next().next().find(".invoice_main_amount").text("");
                    element.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".invoice_main_amount").text("");
                    element.closest("tr").next().next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".invoice_main_amount").text("");
                element.closest("tr").next().find(".invoice_main_amount").text("₹ "+cal_disc_amt.toFixed(2));
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
                    element.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".invoice_main_amount").text("₹ "+disc_rate+".00");
            }
            element.closest("tr").next().find(".invoice_main_amount").append("<input type='hidden' name='invoice_calculated_discount[]' class='invoice_calculated_discount' value='"+cal_disc_amt+"'>");
        }
        else{
            var a=$("#invoice_Calculate_discounts .Invoice_Percentage ").closest(".invoice_discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_gst_type = $("#invoice_Calculate_discounts .Invoice_Percentage").closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_tax = $("#invoice_Calculate_discounts .Invoice_Percentage ").closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
            var split_tax = selected_tax / 2;
            var total_val=$("#total_invoice_value").val();
            var cur_rate_val=$("#invoice_disc_amt").val();
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
                    $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
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
                    $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find("#invoice_calculated_disc_amt").val(calculated_val);
            calculated_val = calculated_val.toFixed(2);
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find(".invoice_main_amount").text("");
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find(".invoice_main_amount").text("₹ "+calculated_val);
            //$("#Calculate_discounts .Invoice_Percentage").closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        }
    }
    else{
        element.closest('tr').next().find(".invoice_item_igst_amount, .invoice_item_cgst_amount, .invoice_item_sgst_amount").val(0);
        element.closest('tr').next().find(".invoice_main_amount").text("");
        element.closest('tr').next().find(".invoice_main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().find(".invoice_main_amount").text("");
        element.closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().next().find(".invoice_main_amount").text("");
        element.closest("tr").next().next().next().find(".invoice_main_amount").text("₹ 0000.00");
    }*/
}

// Change event of invoice level discount type i.e. Percentage or Amount
$(document).on("change", "#invoice_Calculate_discounts .Invoice_Percentage", function(){
    var a=$(this).closest(".invoice_discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;
    // alert(a);
    var total_val = $("#total_invoice_value").val();
    var cur_rate_val = $("#invoice_disc_amt").val();

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*if(a!="Select Type")
    {
        var calculated_val = 0;
        if(a=="Percentage")
        {
            calculated_val = (cur_rate_val/100) * total_val;
            if(selected_gst_type != "Select Type"){
                var new_cal_amt = total_val - calculated_val;
                if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".invoice_rate_data .invoice_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".invoice_rate_data .invoice_cgst_amount, .invoice_sgst_amount").val(new_cal);
                }
                if(selected_gst_type == 'Select Type'){
                    var new_cal = calculated_val;
                }
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $(this).closest("tr").find("#invoice_calculated_disc_amt").val(calculated_val);
            $(this).closest("tr").find(".invoice_main_amount").text("");
            $(this).closest("tr").find(".invoice_main_amount").text("₹ "+calculated_val.toFixed(2));
        }
        if(a=="Amount")
        {
            calculated_val = total_val - cur_rate_val;
            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".invoice_rate_data .invoice_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".invoice_rate_data .invoice_cgst_amount, .invoice_sgst_amount").val(new_cal);
                }
                if(selected_gst_type == 'Select Type'){
                    var new_cal = calculated_val;
                }
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal);
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal);
            }
            $(this).closest("tr").find("#invoice_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find(".invoice_main_amount").text("");
            cur_rate_val = (cur_rate_val) ? cur_rate_val : '0000';
            $(this).closest("tr").find(".invoice_main_amount").text("₹ "+cur_rate_val+".00");
        }
        calculated_val = calculated_val.toFixed(2);
        $(this).closest("tr").find(".invoice_remove_discount").css("display","inline-block");
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
            if(selected_gst_type == 'Select Type'){
                var new_cal = total_val;
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal);            
        }
        $(this).closest("tr").next().find(".invoice_rate_data .invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
        $(this).closest("tr").find("#invoice_calculated_disc_amt").val(0);
        $(this).closest('tr').find(".invoice_main_amount .invoice_calculated_discount").val(0);
        $(this).closest('tr').find(".invoice_main_amount").text("");
        $(this).closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".invoice_remove_discount").css("display","none");
        $(this).closest("tr").find(".invoice_rate").val("");          
    }*/

    cal_invoice_level_amts();

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

// Change event of estimate level type i.e CGST or IGST
$(document).on("change", "#invoice_Calculate_discounts .Invoice_IGSTandCGST", function(){
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var current=$(this).closest("tr");
    var a=$(this).closest(".invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // for CGST
    var current1=current.find(".invoice_rate_data");
    var cgst_rate_id=current.find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();
    
    //  for SGST
    var current2=current.next().find(".invoice_rate_data");
    var sgst_rate_id=current.next().find(".invoice_rate_data .custom-a11yselect-menu li:first").attr("id");
    var sgst_rate_text=current.next().find(".invoice_rate_data .custom-a11yselect-menu li:first button").text();

    var main_amount = $("#total_invoice_value").val();
    var calculated_disc = $("#invoice_calculated_disc_amt").val();
    var disc_type = $(this).closest("tr").prev().find(".invoice_discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
    var curr_tax = $(this).closest("tr").find(".invoice_rate_data .custom-a11yselect-menu  .custom-a11yselect-selected").attr("data-val");
    var split_tax = curr_tax / 2;
    var calculated_tax_amt = 0;

    if(a=="Select Type")
    {
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","none");
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").next().hide();
        
        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $('#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_main_amount').text('');
        $('#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_main_amount').text('₹ 0000.00');
        $('#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('');
        $('#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('₹ 0000.00');
    }
    else if(a == 'IGST')
    {
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").next().hide();
        $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('');
        $('#FinanceInvoiceModal .invoice_CGST_TR_section').next().find('.invoice_main_amount').text('₹ 0000.00');
    }
    else if(a == 'CGST')
    {
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").show();
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").next().find(".invoice_remove_adddiscount").css("display","inline-block");
        $("#FinanceInvoiceModal #invoice_Calculate_discounts .invoice_CGST_TR_section").next().show();
    }
    cal_invoice_level_amts();

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

// Change event of discount rate i.e 0%, 1% ..... 18% etc
$(document).on("change", "#invoice_Calculate_discounts .invoice_DiscountPer", function(){
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type"){
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount_dis = $("#invoice_calculated_disc_amt").val();
        var main_amount1 = $("#total_invoice_value").val();
        var main_amount = main_amount1-main_amount_dis;
        var calculated_disc = $("#invoice_calculated_disc_amt").val();
        var disc_type = $(this).closest("td").prev().find(".invoice_discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
        
        var split_tax = curr_tax / 2;
        var amt_after_estimate_discount = 0;
        var calculated_tax_amt = 0;

        // alert("a: "+a+" === curr_tax: "+curr_tax+" === main_amount: "+main_amount+" === calculated_disc: "+calculated_disc+" === disc_type: "+disc_type+" === split_tax: "+split_tax);

        if(a == 'IGST'){
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_estimate_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * amt_after_estimate_discount)/100;
                }
                if(disc_type == 'Amount'){
                    main_amount = main_amount - calculated_disc;
                    calculated_tax_amt = (curr_tax * main_amount)/100;
                }
            }
            if(disc_type==""){
                calculated_tax_amt = (curr_tax * main_amount)/100;
                // alert("Else case: "+calculated_tax_amt);
            }
            $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".invoice_cgst_amount, .invoice_sgst_amount").val(0);
            $(this).closest("td").find(".invoice_igst_amount").val(calculated_tax_amt);
        }
        if(a == 'CGST'){
            if(disc_type!="Select Type"){
                if(disc_type == 'Percentage'){
                    amt_after_estimate_discount = main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * amt_after_estimate_discount)/100;
                }
                if(disc_type == 'Amount'){
                    main_amount = main_amount - calculated_disc;
                    calculated_tax_amt = (split_tax * main_amount)/100;
                }
            }
            if(disc_type==""){
                calculated_tax_amt = (split_tax * main_amount)/100;
            }
            $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".invoice_igst_amount").val(0);
            $(this).closest("td").find(".invoice_cgst_amount, .invoice_sgst_amount").val(calculated_tax_amt);
            $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }*/

    cal_invoice_level_amts();

    if($("#invoice_subtotal_amount").val()!=0){
        $("#invoice_summary_value").val(2);
    }
});

// Keyup Event for discount rate of estimate level (i.e input box)
$(document).on("keyup", "#invoice_disc_amt", function(){
      var a=$(this).closest('tr').find(".invoice_discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_gst_type = $(this).closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_tax = $(this).closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
      var split_tax = selected_tax / 2;
      var main_amount = $("#total_invoice_value").val();
      var calculated_disc = $("#invoice_calculated_disc_amt").val();
      var cur_rate_val = $(this).val();
      var cur_html=$(this);

      /*if(a!="Select Type")
      {
        if(cur_rate_val){
            var calculated_val = 0;
            var new_cal_amt = 0;
            var amt_after_estimate_discount = 0;
            var calculated_tax_amt = 0;
            if(a=="Percentage")
            {
                var current=cur_html.closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                Percentage_validation(cur_html,cur_rate_val);
                
                calculated_val = (cur_rate_val/100) * main_amount;
                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = main_amount - calculated_val;
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * new_cal_amt)/100;
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * new_cal_amt)/100;
                    }
                    $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+calculated_val.toFixed(2));
                $(this).closest("td").find("#invoice_calculated_disc_amt").val(calculated_val);
            }
            if(a=="Amount")
            {
                var main_amt = $("#total_invoice_value").val();
                Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));    

                calculated_val = main_amount - cur_rate_val;
                if(selected_gst_type != "Select Type"){
                  if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * calculated_val)/100;  
                  }
                  if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * calculated_val)/100;
                  }
                  $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                  $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".invoice_main_amount").text("₹ "+cur_rate_val);
                $(this).closest("td").find("#invoice_calculated_disc_amt").val(cur_rate_val);
            }
            if(selected_gst_type=="Select Type")
            {
                calculated_val = calculated_val;
                $(this).closest("tr").find(".invoice_main_amount").text("");
                if(a == 'Percentage'){
                    $(this).closest("tr").find("#invoice_calculated_disc_amt").val(calculated_val);
                    calculated_val = calculated_val.toFixed(2);
                    $(this).closest("tr").find(".invoice_main_amount").text("₹ "+calculated_val);
                }
                if(a == 'Amount'){
                    $(this).closest("tr").find("#invoice_calculated_disc_amt").val(cur_rate_val);
                    $(this).closest("tr").find(".invoice_main_amount").text("₹ "+cur_rate_val+".00");
                }
            }
        }
        else{
            var new_cal = 0;
            if(selected_gst_type!="Select Type"){
                if(selected_gst_type == 'IGST'){
                    new_cal = (selected_tax * main_amount)/100;
                }
                if(selected_gst_type == 'CGST'){
                    new_cal = (split_tax * main_amount)/100;
                }
                new_cal = new_cal.toFixed(2);
                $(this).closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal);
                $(this).closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal);
                //$(this).closest("tr").find("#estimate_calculated_disc_amt").val(main_amount);
            }
            else{
                $(this).closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
            }
            $(this).closest("tr").find("#invoice_calculated_disc_amt").val(main_amount);
        }
    } */

     if(main_amount != '')
    {
        // console.log("not Empty Amount ");

        if(a=='Percentage')
        {
            Invoice_Percentage_validation(cur_html,cur_rate_val);
        }
        else if(a=='Amount')
        {
            Invoice_Amount_validation(cur_html, cur_rate_val, parseFloat(main_amount));
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
                         invoice_reset_percentage_validation(cur_html,cur_rate_val,main_amount);
                        // cur_html.closest("tr").prev().find(".main_amount").focus();
                        // cur_html.blur();
                    }
                }
         });

    }

    cal_invoice_level_amts(); 
});

// Click event of delete button icon in a row of label says - Discount (At estimate level)
$(document).on('click','#invoice_Calculate_discounts .invoice_remove_discount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".Invoice_Percentage")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".invoice_discount_section .Invoice_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".invoice_discount_section .Invoice_Percentage option[value='']").attr('selected','selected');

    var element=$(this).closest("tr");
    element.find(".rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".invoice_main_amount").text("₹ 0000.00");

    var main_amt = $("#total_invoice_value").val();
    var applied_tax = element.next().find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = element.next().find(".invoice_GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type"){ //alert("applied_tax ="+applied_tax+" === tax_type ="+tax_type);
        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
            element.next().next().find(".invoice_igst_amount").val(new_cal_amt);
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            element.next().next().find(".invoice_cgst_amount, .invoice_sgst_amount").val(new_cal_amt);
        }
        element.next().find(".invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
        if(element.find(".invoice_rate").val()!=""){
          element.find("#invoice_calculated_disc_amt").val(new_cal_amt);
        }
        else{
          element.find("#invoice_calculated_disc_amt").val(0);
        }
        element.next().next().find(".invoice_main_amount").text("₹ "+new_cal_amt.toFixed(2));
    }
    else{
        element.next().find(".invoice_main_amount").text("");
        element.next().find(".invoice_main_amount").text("₹ 0000.00");
        element.next().next().find(".invoice_main_amount").text("");
        element.next().next().find(".invoice_main_amount").text("₹ 0000.00");
        element.find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='0'>");
        element.next().next().find("#invoice_calculated_disc_amt").val(0);
    }
    /*var s = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(s);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(s);*/
    $("#invoice_summary_value").val(2);
    cal_invoice_level_amts();
});

// total amount calculation
function invoice_total_amount_for_invoice_level_discount()
{
    // var no=$("#invoiceForm .participantRow .main-group").length;
    var no=$("#invoice_total_items").val();
    var total_amt = 0;
    var discount_amt = 0;
    for(var n=0;n<no;n++)
    {
        var current=$("#invoiceForm #invoice_participantTable .invoice_participantRow .invoice_main-group").eq(n);
        var curr_amt=current.find(".invoice_main_amount").val();
        var discount_amt = current.next().find(".invoice_calculated_discount").val();
        var curr_rate_val = current.find(".invoice_item_rate").val();
        var disc_type = current.next().find('.invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');

        if(curr_rate_val)
        {
            if(curr_amt)
            {
                if(discount_amt)
                {
                    var disc_type = current.next().find('.invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt = curr_amt - discount_amt;
                    }
                    if(disc_type == 'Amount'){
                        discount_amt = (discount_amt!=0) ? discount_amt : curr_amt;
                    }
                    total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                }
                else
                {
                    total_amt = parseFloat(total_amt) + parseFloat(curr_amt);
                }
            }
            else{
                total_amt = 0;
            }
        }
        else{
            if(curr_amt)
            {
                if(discount_amt)
                {
                    var disc_type = current.next().find('.invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt = curr_amt - discount_amt;
                    }
                    if(disc_type == 'Amount'){
                        discount_amt = (discount_amt!=0) ? discount_amt : curr_amt;
                    }
                    total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                }
                else
                {
                    total_amt = parseFloat(total_amt) + parseFloat(curr_amt);
                }
            }
            else{
                total_amt = 0;
            }
        }
    }
    return total_amt;
}


// Function to get all all item rows main total
function invoice_get_all_item_rows_main_total()
{
    var no=$("#invoiceForm .invoice_participantRow .invoice_main-group").length;
    var rows_total_amt = 0;
    var rows_disc_amt = 0;
    var inps  = $("input[name='invoice_calculated_discount[]']");
    var n = $("input[name='invoice_calculated_discount[]']").length;
    for(var s=0;s<no;s++)
    {
        var current = $("#invoiceForm .invoice_participantRow .invoice_main-group .invoice_main_amount").eq(s).val();
        if(current){
            rows_total_amt = parseFloat(rows_total_amt) + parseFloat(current);
        }
        else{
            rows_total_amt = parseFloat(rows_total_amt) + 0;
        }
    }
    $('input[name^="invoice_calculated_discount"]').each(function() {
        rows_disc_amt = parseFloat(rows_disc_amt) + parseFloat($(this).val());
    });
    rows_total_amt = parseFloat(rows_total_amt) - parseFloat(rows_disc_amt);
    return rows_total_amt;
}

// Function calculate invoice level discount
function calculate_invoice_level_discount(total_val)
{
    var element = $("#invoice_Calculate_discounts .Invoice_Percentage");
    var cur_rate_val = element.closest("tr").find("#invoice_disc_amt").val();
    var a=element.closest(".invoice_discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = element.closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    if(a!="Select Type"){
        var calculated_val = 0;
        if(total_val!=0){
            if(a=="Percentage")
            {
                calculated_val = (cur_rate_val/100) * total_val;
                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = total_val - calculated_val;
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_tax * new_cal_amt)/100;
                      element.closest("tr").next().find(".invoice_rate_data .invoice_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * new_cal_amt)/100;
                      element.closest("tr").next().find(".invoice_rate_data .invoice_cgst_amount, .invoice_sgst_amount").val(new_cal);
                    }
                    element.closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").find(".invoice_main_amount").text("₹ "+calculated_val.toFixed(2));
                element.closest("tr").find("#invoice_calculated_disc_amt").val(calculated_val);
            }
            if(a=="Amount")
            {
                calculated_val = total_val - cur_rate_val;
                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_tax * calculated_val)/100;
                      element.closest("tr").next().find(".invoice_rate_data .invoice_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * calculated_val)/100;
                      element.closest("tr").next().find(".invoice_rate_data .invoice_cgst_amount, .invoice_sgst_amount").val(new_cal);
                    }
                    element.closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").find(".invoice_main_amount").text("₹ "+cur_rate_val+".00");
                element.closest("tr").find("#invoice_calculated_disc_amt").val(cur_rate_val);
            }
        }
        else{
            $("#invoice_calculated_disc_amt").val(0);
            element.closest("tr").find(".invoice_main_amount").text("");
            element.closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
            element.closest("tr").next().find(".invoice_main_amount").text("");
            element.closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
            element.closest("tr").next().next().find(".invoice_main_amount").text("");
            element.closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
            element.closest("tr").next().find(".invoice_rate_data .invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
        }
    } 
}

// Function fo calculations on percentage reset
function invoice_reset_percentage_validation(cur_html,cur_rate_val,main_amt=''){
    var disc_amt = 0;
    var disc_rate_val = (cur_rate_val > 0 && cur_rate_val < 100) ? cur_rate_val : 0;
    if(main_amt==''){
        var amt_val = cur_html.closest('tr').prev().find("input[name='invoice_item_main_amount[]']").val();
    }
    else{    
        var amt_val = main_amt;
    }
    var drop_val = cur_html.closest('tr').find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = cur_html.closest('tr').next().find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = cur_html.closest('tr').next().find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    
    /*if(amt_val != "")
    {
        if(disc_rate_val!="")
        {
            if(drop_val == "Percentage")
            {
                disc_amt = (disc_rate_val/100) * amt_val;

                if(selected_gst_type != "Select Type")
                {
                    var new_cal_amt = amt_val - disc_amt;
                    if(selected_gst_type == 'IGST')
                    {
                      var new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      var new_cal = (split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));

                }
                cur_html.closest('tr').find(".invoice_main_amount").text("");
                cur_html.closest('tr').find(".invoice_main_amount").text("₹ "+disc_amt.toFixed(2));

            }
            if(drop_val == "Amount")
            {
                disc_amt = parseInt(amt_val) - parseInt(disc_rate_val);

                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                cur_html.closest('tr').find(".invoice_main_amount").text("");
                cur_html.closest('tr').find(".invoice_main_amount").text("₹ "+disc_rate_val+".00");

            }
            cur_html.closest('tr').find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='"+disc_amt+"'>");
        }
        else
        {   
            if(selected_gst_type!="Select Type"){
                if(disc_rate_val==""){
                    cur_html.closest('tr').find(".invoice_main_amount").text("");  
                    cur_html.closest('tr').find(".invoice_main_amount").text("₹ 0000.00");  
                }
                if(selected_gst_type == 'IGST'){
                  var new_cal = (selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  cur_html.closest("tr").next().find(".invoice_item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                  var new_cal = (split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  cur_html.closest("tr").next().find(".invoice_item_cgst_amount").val(new_cal);
                  cur_html.closest("tr").next().find(".invoice_item_sgst_amount").val(new_cal);
                }
                if(disc_rate_val!=0){
                    cur_html.closest("tr").next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else {
                    cur_html.closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                    cur_html.closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
                }
            }
            else
            {   
                cur_html.closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".invoice_main_amount").text("₹ 0000.00");
                cur_html.closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".invoice_main_amount").append("<input name='invoice_calculated_discount[]' type='hidden' class='invoice_calculated_discount' value='0'>");
            }
        }
    }*/

    /*var t1 = invoice_total_amount_for_invoice_level_discount();
    calculate_invoice_level_discount(t1);
    $("#total_invoice_value").val(0);
    $("#total_invoice_value").val(t1);*/
    if($("#invoice_calculated_disc_amt").val()){
        $("#invoice_calculated_disc_amt").val(0);
    }

    cal_invoice_level_amts();
}

// Calculate overall invoice summary
function calculate_invoice_summary()
{
    var total_main_amount = 0;
    // var len = $("#invoiceForm .invoice_participantRow .invoice_main-group").length;
    var len = $("#invoiceForm .invoice_participantRow .invoice_main-group").length;
    var disc_type = $('#invoice_participantTable .invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
    var main_amount = 0;
    var total_taxes = 0;
    var total_disc = 0;
    var total_calculated_disc = 0;
    var flag = true;
    for(s=0;s<len;s++){
        var current=$("#invoiceForm .invoice_participantRow .invoice_main-group").eq(s);
        var curr_amt=current.find(".invoice_main_amount").val();
        if(curr_amt)
        {
            var disc_type = current.next().find(".invoice_discount_section .Invoice_Percentage").val();
            if(disc_type == ''){
                var disc_amt = 0;
            }
            if(disc_type == 'Percentage'){
                var disc_amt = current.next().find(".invoice_main_amount .invoice_calculated_discount").val();
            }
            if(disc_type == 'Amount'){
                var disc = current.next().find(".invoice_main_amount .invoice_calculated_discount").val();
                if(disc!=0){
                    var disc_amt = parseFloat(curr_amt) - parseFloat(disc);
                }
                else {
                    var disc_amt = 0;
                }
            }

            var current1=$("#invoiceForm .invoice_participantRow .invoice_CGST_TR_section").eq(s);
            var curr_igst=current1.find(".invoice_item_igst_amount").val();
            var curr_cgst=current1.find(".invoice_item_cgst_amount").val();
            var curr_sgst=current1.find(".invoice_item_sgst_amount").val();
            total_taxes = parseFloat(total_taxes) + parseFloat(curr_igst) + parseFloat(curr_cgst) + parseFloat(curr_sgst);

            main_amount = parseFloat(main_amount) + parseFloat(curr_amt);

            total_calculated_disc = parseFloat(total_calculated_disc) + parseFloat(disc_amt);
        }
        /*else{
            //main_amount = parseFloat(main_amount) + parseFloat($("#invoiceForm .participantRow .main-group").find(".main_amount").val());
            flag = false;
        }*/
    }
    // alert("total_disc: "+total_disc+" === total_calculated_disc: "+total_calculated_disc);
    if(flag == true){
        /*if($("#total_estimate_value").val()!=0 && $("#total_estimate_value").val()!=main_amount){
            var total_disc = parseFloat(main_amount) - parseFloat($("#total_estimate_value").val());
            var estimate_disc = 0;
        }
        if($("#total_estimate_value").val()===main_amount){
            var total_disc = parseFloat($("#estimate_calculated_disc_amt").val());
            var estimate_disc = 0;
        }
        else {
            var total_disc = parseFloat($("#estimate_calculated_disc_amt").val());
            var estimate_disc = $("#invoiceForm").find("#estimate_calculated_disc_amt").val();
        }*/

        if(total_calculated_disc!=0){
            var total_disc = parseFloat(total_calculated_disc);
        }
        else {
            var total_disc = 0;
        }

        var total_disc = parseFloat(main_amount) - parseFloat($("#total_invoice_value").val());
        var estimate_disc = $("#invoiceForm #invoice_Calculate_discounts").find("#invoice_calculated_disc_amt").val();
        var estimate_igst = $("#invoiceForm #invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_igst_amount").val();
        var estimate_cgst = $("#invoiceForm #invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_cgst_amount").val();
        var estimate_sgst = $("#invoiceForm #invoice_Calculate_discounts .invoice_CGST_TR_section").find(".invoice_sgst_amount").val();

        total_disc = parseFloat(total_disc) + parseFloat(estimate_disc);
        total_taxes = parseFloat(total_taxes) + parseFloat(estimate_igst) + parseFloat(estimate_cgst) + parseFloat(estimate_sgst);

        var element = $("#invoice_calculation #invoice_main_calculation");
        element.find(".invoice_subtotal").text("");
        if(main_amount!=0){
            element.find(".invoice_subtotal").text("₹ "+main_amount.toFixed(2));
        }
        else{
            element.find(".invoice_subtotal").text("₹ 0000.00");
        }
        element.find("#invoice_subtotal_amount").val(main_amount);
        element.find(".invoice_total_discount").text("");
        if(total_disc!=0){
            element.find(".invoice_total_discount").text("₹ "+total_disc.toFixed(2));
        }
        else {
            element.find(".invoice_total_discount").text("₹ 0000.00");
        }
        element.find("#invoice_totaldiscount_amount").val(total_disc);
        element.find(".invoice_total_taxes").text("");
        if(total_taxes!=0){
            element.find(".invoice_total_taxes").text("₹ "+total_taxes.toFixed(2));
        }
        else {
            element.find(".invoice_total_taxes").text("₹ 0000.00");
        }
        element.find("#invoice_totaltaxes_amount").val(total_taxes);

        var gross_total = parseFloat(main_amount) - parseFloat(total_disc) + parseFloat(total_taxes);
        element.find(".invoice_total_amount").text("");
        if(gross_total!=0){
            element.find(".invoice_total_amount").text("₹ "+gross_total.toFixed(2));
        }
        else {
            element.find(".invoice_total_amount").text("₹ 0000.00");
        }
        element.find("#invoicetotal_amount").val(gross_total);
        $("#invoice_calculation #invoice_CalculateBtn").find("#invoice_summary_value").val(1);
        $("#invoice_summary_error").closest('.form-group').remove();
    }
    else{
        var element = $("#invoice_calculation #main_calculation");
        element.find(".invoice_subtotal").text("");
        element.find(".invoice_subtotal").text("₹ 0000.00");
        element.find("#invoice_subtotal_amount").val(0);
        element.find(".invoice_total_discount").text("");
        element.find(".invoice_total_discount").text("₹ 0000.00");
        element.find("#invoice_totaldiscount_amount").val(0);
        element.find(".invoice_total_taxes").text("");
        element.find(".invoice_total_taxes").text("₹ 0000.00");
        element.find("#invoice_totaltaxes_amount").val(0);
        element.find(".invoice_total_amount").text("");
        element.find(".invoice_total_amount").text("₹ 0000.00");
        element.find("#invoicetotal_amount").val(0);
        element.find(".invoice_rate_data .invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount").val(0);
    }
}


 function get_all_banks_details_data(id){

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
                    $(".invoice_select_account").hide();
                    $(".Invoice_AccountDetails_Link").hide();
                    $(".invoice_select_account_main").hide();
                    $(".Invoice_AccountDetails").show();

                    // Account holder name
                    $("#invoice_bank_holder_name").remove();
                    $("#Holder_name").html("<span><b>A/C Holder Name: </b>"+data.beneficiary_name+"</span>");
                    $("#Holder_name").append("<input type='hidden' name='invoice_bank_holder_name' id='invoice_bank_holder_name' value='"+data.beneficiary_name+"' />");

                    // Bank name
                    $("#invoice_bank_name_fld").remove();
                    $("#bank_name").html("<span><b>Bank Name: </b>"+data.bank_name+"</span>");
                    $("#bank_name").append("<input type='hidden' name='invoice_bank_name' id='invoice_bank_name_fld' value='"+data.bank_name+"' />");

                    // Bank account number
                    $("#invoice_account_no_fld").remove();
                    $("#acc_no").html("<span><b>Account No.: </b>"+data.account_no+"</span>");
                    $("#acc_no").append("<input type='hidden' name='invoice_account_no' id='invoice_account_no_fld' value='"+data.account_no+"' />");

                    // IFSC Code
                    $("#invoice_IFSCcode_fld").remove();
                    $("#IFSC_Code").html("<span><b>IFSC Code: </b>"+data.ifsc_code+"</span>");
                    $("#IFSC_Code").append("<input type='hidden' name='invoice_IFSCcode' id='invoice_IFSCcode_fld' value='"+data.ifsc_code+"' />");

                    // Bank account type
                    $("#invoice_bank_accType_fld").remove();
                    $("#accountType").html("<span><b>Account Type: </b>"+data.account_type+"</span>");
                    $("#accountType").append("<input type='hidden' name='invoice_bank_accType' id='invoice_bank_accType_fld' value='"+data.account_type+"' />");

                    // Bank UPI
                    if(data.upi_id!=""){
                        $("#invoice_bank_UPI_fld").remove();
                        $("#UPI").html("<span><b>UPI: </b>"+data.upi_id+"</span>");
                        $("#UPI").append("<input type='hidden' name='invoice_bank_UPI' id='invoice_bank_UPI_fld' value='"+data.upi_id+"' />");
                    }

                    $("#no_bank_details").remove();
                }
                else if(data.total_num > 1)
                {
                    $(".invoice_select_account").customA11ySelect();
                    $("#invoice_select_account").empty().append('<option value="">Select Account</option>');
                    $(".invoice_select_account_main select").append(data.str_opt);
                    $("#invoice_select_account").customA11ySelect('refresh');
                    $(".invoice_select_account").hide();
                }
                else
                {
                    $(".invoice_select_account_main").show();
                }
            }
        }
    });
}


$(document).on("change", ".invoice_select_account", function(){
    var sel_id = $('#invoice_select_account  option:selected').data('id');
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
                $(".invoice_select_account_main").show();
                $(".Invoice_AccountDetails").show();
                $(".invoice_select_account").hide();
                $("#invoice_select_account-button").hide();

                // Bank account holder
                $("#bank_holder_name").remove();
                $("#Holder_name").html("<span><b>A/C Holder Name: </b>"+data.beneficiary_name+"</span>");
                $("#Holder_name").append("<input type='hidden' name='invoice_bank_holder_name' id='bank_holder_name' value='"+data.beneficiary_name+"' />");

                // Bank name
                $("#bank_name_fld").remove();
                $("#bank_name").html("<span><b>Bank Name: </b>"+data.bank_name+"</span>");
                $("#bank_name").append("<input type='hidden' name='invoice_bank_name' id='bank_name_fld' value='"+data.bank_name+"' />");

                // Bank account number
                $("#account_no_fld").remove();
                $("#acc_no").html("<span><b>Account No.: </b>"+data.account_no+"</span>");
                $("#acc_no").append("<input type='hidden' name='invoice_account_no' id='account_no_fld' value='"+data.account_no+"' />");

                // IFSC Code
                $("#IFSCcode_fld").remove();
                $("#IFSC_Code").html("<span><b>IFSC Code: </b>"+data.ifsc_code+"</span>");
                $("#IFSC_Code").append("<input type='hidden' name='invoice_IFSCcode' id='IFSCcode_fld' value='"+data.ifsc_code+"' />");

                // Bank account type
                $("#bank_accType_fld").remove();
                $("#accountType").html("<span><b>Account Type: </b>"+data.account_type+"</span>");
                $("#accountType").append("<input type='hidden' name='invoice_bank_accType' id='bank_accType_fld' value='"+data.account_type+"' />");
            
                // Bank UPI
                if(data.upi_id!=""){
                    $("#bank_UPI_fld").remove();
                    $("#UPI").html("<span><b>UPI: </b>"+data.upi_id+"</span>");
                    $("#UPI").append("<input type='hidden' name='invoice_bank_UPI' id='bank_UPI_fld' value='"+data.upi_id+"' />");
                }

                $("#no_bank_details").remove();
            }
            else
            {
                $(".invoice_select_account_main").hide();
                 $(".Invoice_AccountDetails").hide();
            }
        }
    });
});

$(document).on("click", ".Invoice_AccountDetails_Link", function(){

    $(".Invoice_AccountDetails").hide();
    // $(".invoice_select_account_main").hide();
    $(".Invoice_AccountDetails_Link").hide();
    // $(".invoice_select_account").show();
    $("#invoice_select_account-button").show();

    get_all_banks_details_data($("#bill_id").val());
    $(".Invoice_AccountDetails_Link").show();

});

$(document).on("click", ".invoice_diff_billing_entity", function(){
    $(".Invoice_AccountDetails").hide();
    // $(".invoice_select_account_main").show();
    $("#invoice_select_account-button").show();
    // $("#invoice_select_account").customA11ySelect('refresh');
    get_all_banks_details_data($("#bill_id").val());
    $(".Invoice_AccountDetails_Link").show();

});

 //File attchment

$(document).on("change",".custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#invoiceForm");
    form_data = new FormData(form_data[0]);
    jQuery.each(jQuery('#invoice_attachment')[0].files, function(i, file) {
        form_data.append('invoice_attachment['+i+']', file);
    });
    form_data.append('methodName', 'create_file_upload');
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

function getFilenames(){
        
    $fileHtml="";
    var files = $('#invoice_attachment').prop("files");
   // console.log(files);
    var names = $.map(files, function(val) { 
        var fileName = val.name;
        fileName=fileName.replace(/ /g,"_"); 

        var regex = new RegExp("(.*?)\.(jpeg|JPEG|jpg|JPG|png|PNG|doc|DOC|docx|DOCX|xls|XLS|xlsx|XLSX|pdf|PDF|zip|ZIP|rar|RAR|pdf|PDF|txt|TXT|csv|CSV)$");

        if (!(regex.test(fileName))){
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
            $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span class='material-icons-outlined unlinkFile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
        }
    });
    $(".invoice_filesList").append($fileHtml);
}

function unLinkfile(event){
    $(event).closest("li").remove();
    var deleteInvoiceFile = $(event).closest("span").attr("data-name");

    // ------------ Delete file name from hidden field value ----------
    var uploadedFiles = $("#Invoice_main_details #selected_files").val();
    var fileArray = uploadedFiles.split(",");
    var newInvoiceArray = [];
    for(var m =0; m < fileArray.length; m++)
    {
        newInvoiceArray.push($.trim(fileArray[m]));
    }
    newInvoiceArray = $.grep(newInvoiceArray, function(invoiceValue) {
      return invoiceValue != deleteInvoiceFile;
    });
    $("#Invoice_main_details #selected_files").val(newInvoiceArray);
    // ------------ Delete file name from hidden field value ----------

    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
        dataType : "json",
        data : { methodName: "delete_current_file", deleteFile: deleteInvoiceFile},

        success: function(data)
        {
            $("#invoice_attachment").val('');
        }
    });
}

function unlink_allInvoiceFiles(event)
{
    $("#invoiceForm .invoice_filesList li").remove();
    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
        dataType : "json",
        data : { methodName: "deleteFolder"},
        success: function(data)
        {
        }
    });
}

$(document).on("click", "#FinanceInvoiceModal #Invoice_main_details .close", function(){
    unlink_allInvoiceFiles(this);
});

$(document).on("click","#create_invoice",function(){
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



$(document).on("click", "#previewInvoice", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();

    var flag = true;

    if($('#invoice_billfromname').length == 0)
    {
        var chk_fromaddr_element = $(".invoice_BillingFrom_address_and_gst").find(".invoice_BillingFrom_address_main");
        var chk_fromaddr_element_val = chk_fromaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        var chk_fromgst_element = $(".invoice_BillingFrom_address_and_gst").find(".invoice_BillingFrom_gst_main");
        var chk_fromgst_element_val = chk_fromgst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        
        if(chk_fromaddr_element.is(":visible") && chk_fromaddr_element_val=="Select Billing Entity")
        {
            $(".invoice_BillingFrom_address_main").find(".err").remove(); 
            $("#invoiceForm #invoice_Address_Details").find(".invoice_BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
            $("#invoice_BillingFrom_addr").css('border-color', '#ad4846');
            $(".invoice_BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");  
        }

        if(chk_fromgst_element.is(":visible") && chk_fromgst_element_val=="Select GSTIN")
        {
            $(".invoice_BillingFromGSTDetails_dropdown").find(".err").remove();
            $("#invoiceForm #invoice_Address_Details").find(".invoice_BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
            $(".invoice_BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
        }
        if(!chk_fromaddr_element.is(":visible") && !chk_fromgst_element.is(":visible")){
            $(".invoice_BillingFromCard").css('border-color', '#ad4846');
        }

        flag = false;
    }
    else if($('#invoice_number').val() == "")
    {
        $("#invoice_number").closest("div").find(".err").remove();
        $("#invoice_number").css('border-color', '#ad4846');
        $("#invoice_number").closest("div").append("<span class='err text-danger'>Please enter invoice number</span>");
        flag = false;
    }
    else if($('#invoice_date').val() == "")
    {
        $('#invoice_date').closest("div").parent().find(".err").remove();
        $('#invoice_date').css('border-color', '#ad4846');
        $('#invoice_date').closest("div").parent().append("<span class='err text-danger'>Please enter invoice date</span>");
        flag = false;
    }
    else if($('#invoice_billtoname').length == 0)
    {
        var chk_toaddr_element = $(".invoice_BillingTo_address_and_gst").find(".invoice_BillingTo_address_main");
        var chk_toaddr_element_val = chk_toaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        var chk_togst_element = $(".invoice_BillingTo_address_and_gst").find(".invoice_BillingTo_gst_main");
        var chk_togst_element_val = chk_togst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        
        if(chk_toaddr_element.is(":visible") && chk_toaddr_element_val=="Select Customer")
        {
            $(".invoice_BillingTo_address_main").find(".err").remove();
            $("#invoiceForm #invoice_Address_Details_BillTo").find(".invoice_BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
            $(".invoice_BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");
        }
        if(chk_togst_element.is(":visible") && chk_togst_element_val=="Select GSTIN")
        {
            $(".invoice_BillingToGSTDetails_dropdown").find(".err").remove();
            $("#invoiceForm #invoice_Address_Details_BillTo").find(".invoice_BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
            $(".invoice_BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
        }
        if(!chk_toaddr_element.is(":visible") && !chk_togst_element.is(":visible"))
        {
            $(".invoice_BillingToCard").css('border-color', '#ad4846');
        }
        flag = false;
    }
    else{
        var len = $("#Invoice_main_details .invoice_main-group").length;
        $(".err").remove();
        for(var s=0;s<len;s++)
        {
            var current=$("#Invoice_main_details .invoice_main-group").eq(s);
            if(current.find("input[name='invoice_item_descr[]']").val() == '')
            {
                current.find(".invoice_item_descr").closest("td").find(".err").remove();
                current.find(".invoice_item_descr").css('border-color', '#ad4846');
                current.find(".invoice_item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                $("#FinanceInvoiceModal").animate({ 
                    scrollTop:  $("input[name='invoice_item_descr[]']").offset().top 
                }, 1000);

                flag = false; 
            }
            if(current.find("input[name='invoice_item_main_amount[]']").val() == '')
            {
                current.find("input[name='invoice_item_main_amount[]']").closest("td").find(".err").remove();
                current.find("input[name='invoice_item_main_amount[]']").css('border-color', '#ad4846');
                current.find("input[name='invoice_item_main_amount[]']").closest("td").append("<span class='err text-danger'>Amount required</span>");

                $("#FinanceInvoiceModal").animate({ 
                    scrollTop:  $("input[name='invoice_item_main_amount[]']").offset().top 
                }, 1000);
                
                flag = false;
            }
        }
    }

    if(flag == false)
    {
      return false;
    }
    else{
        var estimate_summary_value = $("#invoice_summary_value").val();
        var flag1 = true;
        $("#invoice_summary_error").closest('.form-group').remove();
        var sectionOffset = $('#invoice_CalculateBtn').offset();
        if(estimate_summary_value == 0){
            $("<div class='form-group'><span id='invoice_summary_error' style='color:#ad4846;'> Please calculate invoice summary</span></div>").insertAfter("#invoice_CalculateBtn .form-group");
            
            $("#FinanceInvoiceModal").animate({ 
                scrollTop:  $("#invoice_CalculateBtn").offset().top 
            }, 100);
            
            flag1 = false;
        }
        else if(estimate_summary_value == 2){
            $("<div class='form-group'><span id='invoice_summary_error' style='color:#ad4846;'> Please recalculate invoice summary</span></div>").insertAfter("#invoice_CalculateBtn .form-group");
            
            $("#FinanceInvoiceModal").animate({ 
                scrollTop:  $("#invoice_CalculateBtn").offset().top 
            }, 100);

            flag1 = false;
        }

        if(flag1 == false){
            return false;
        }
        else{
            var formdata= $('#invoiceForm');
            var newFilePrevInvFlag = 0;
            form      = new FormData(formdata[0]);
            jQuery.each(jQuery('#invoice_attachment')[0].files, function(i, file) {
                form.append('invoice_attachment['+i+']', file);
                newFilePrevInvFlag = 1;
            });

            /*if(newFilePrevInvFlag)
            {
                $("#FinanceInvoiceModal .email-blur-effect, #FinanceInvoiceModal .email-loader").show();
            }*/

            $.ajax({
                type    : "POST",
                url     : "../../client/res/templates/financial_changes/previewInvoice.php",
                dataType  : "json",
                processData: false,
                contentType: false,
                data: form,
                success: function(data)
                {
                    /*if(newFilePrevInvFlag)
                    {
                        $("#FinanceInvoiceModal .email-blur-effect, #FinanceInvoiceModal .email-loader").hide();
                    }*/
                    $("#InvoicePrviewModel").html(data).modal('show');
                }
            });
        }
    }
});

function invoice_resetHiddenFields()
{
    $(".invoice_igst_amount, .invoice_cgst_amount, .invoice_sgst_amount, #total_invoice_value, #invoice_summary_value, #invoice_items_discount_selected, #invoice_items_gst_type_selected, #invoice_subtotal_amount, #invoice_totaldiscount_amount, #invoice_totaldiscount_amount, #invoicetotal_amount, #invoice_calculated_disc_amt").val(0);
}

function invoice_check_qty_rate(elem)
{
    var item_rate = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val();
    var item_qty = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_qty[]']").val();
    var item_main_amt = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_main_amount[]']").val();

    var main_amt_cal = parseFloat(item_rate) * parseFloat(item_qty);
    if((item_main_amt!="" && main_amt_cal != item_main_amt) || main_amt_cal == ""){
        $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val("");
        $(elem).closest(".invoice_main-group").find("input[name='invoice_item_qty[]']").val("");
    }
    else if(item_rate == "" || item_rate == "NaN" || item_rate == 0){
        $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val('');
        // $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val(1);
    }
}

function cal_invoice_level_amts()
{
    var len = $("#invoice_total_items").val();
    var final_total_amt = 0;
    var total_amt = 0;
    var total_disc = 0;

    var amt_after_disc = 0;
    var cal_disc_amt = 0;
    var cal_tax = 0;
    var cal_tax = 0;
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;
    var validation_cnt = 0;
    for(var t=0;t<len;t++)
    {
        var is_empty = $("#invoiceForm #invoice_participantTable .invoice_main-group").find('.invoice_main_amount').eq(t).val();
        if(is_empty == '' || is_empty == 'NaN'){
            total_amt = parseFloat(total_amt) + 0;    
        }
        else {
            total_amt = parseFloat(total_amt) + parseFloat($("#invoiceForm #invoice_participantTable .invoice_main-group").find('.invoice_main_amount').eq(t).val());
        }

        // Calculation discount for each item
        var items_main_amt = $("#invoiceForm #invoice_participantTable .invoice_main-group").find('.invoice_main_amount').eq(t).val();

        var disc_type = $("#invoiceForm #invoice_participantTable .invoice_main-group").next("tr").find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

        var disc_rate = $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_rate").eq(t).val();

        var gst_type = $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_GST_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

        var gst_rate = $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).attr("data-val");

        // alert("items_main_amt: "+items_main_amt+" === disc_type: "+disc_type+" === disc_rate: "+disc_rate+" === gst_type: "+gst_type+" === gst_rate: "+gst_rate);
        // =========== Code for item level discount calculations starts ==========
        if(disc_type!="Select Type")
        {
            var cur_html = $("#invoiceForm #invoice_participantTable .invoice_main-group");
            var cur_rate_html = $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".rate").eq(t);

            var current = cur_html.closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            if(disc_rate!="")
            {   
                if(disc_type == "Percentage")
                {
                    // Percentage_validation(cur_rate_html, disc_rate);

                    cal_disc_amt = (parseFloat(items_main_amt) * parseFloat(disc_rate))/100;

                    $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).text("₹ "+cal_disc_amt.toFixed(2));

                    $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+cal_disc_amt+'">');
                }
                if(disc_type == "Amount")
                {
                    var main_amt = $("#invoiceForm #invoice_participantTable .invoice_main-group").find('.invoice_main_amount').eq(t).val();
                        // Amount_validation(cur_html, disc_rate, parseFloat(main_amt));

                    $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).text("₹ "+parseFloat(disc_rate).toFixed(2));

                    $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+disc_rate+'">');
                }
            }
            else {
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");

                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');
            }
        }
        else{
            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");

            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount .invoice_calculated_discount").eq(t).remove();

            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().find(".invoice_main_amount").eq(t).append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');
        }
        // =========== Code for item level discount calculations ends ==========
        
        var disc_cal_val = $("#invoiceForm #invoice_participantTable .invoice_main-group").next("tr").find(".invoice_calculated_discount").eq(t).val();
        
        // =========== Code for item gst calculations starts ==========
        if(gst_type!="")
        {
            if(items_main_amt!=""){
                var val_for_tax = parseFloat(items_main_amt) - parseFloat(disc_cal_val);
            }
            else {
                var val_for_tax = 0;
            }
            if(gst_type == "IGST")
            {
                $("#invoiceForm #invoice_participantTable .participantRow .invoice_SGST_Discount").hide();

                cal_tax = (parseFloat(val_for_tax) * parseInt(gst_rate))/100;

                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_igst_amount").eq(t).val(cal_tax);
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_cgst_amount").eq(t).val(0);
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_sgst_amount").eq(t).val(0);

                $("#invoice_participantTable .participantRow .invoice_GST_Discount").closest("tr").find(".invoice_remove_adddiscount").css("display","inline-block");
            }
            if(gst_type == "CGST")
            {
                $("#invoiceForm #invoice_participantTable .participantRow .invoice_SGST_Discount").show();

                var split_tax = parseInt(gst_rate) / 2;
                cal_tax = (parseFloat(val_for_tax) * parseFloat(split_tax))/100;

                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_igst_amount").eq(t).val(0);
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_cgst_amount").eq(t).val(cal_tax);
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_sgst_amount").eq(t).val(cal_tax);

                $("#invoice_participantTable .participantRow .invoice_SGST_Discount").closest("tr").find(".invoice_remove_adddiscount").css("display","inline-block");
            }
            if(cal_tax===0){
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");
            }
            else{
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_main_amount").eq(t).text("₹ "+cal_tax.toFixed(2));
                $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().next().find(".invoice_main_amount").eq(t).text("₹ "+cal_tax.toFixed(2));
            }
        }
        else {
            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_rate_data .invoice_item_igst_amount,.invoice_item_cgst_amount,.invoice_item_sgst_amount").eq(t).val(0);

            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");
            $("#invoiceForm #invoice_participantTable .invoice_main-group").closest("tr").next().next().find(".invoice_main_amount").eq(t).text("₹ 0000.00");
        }
        // =========== Code for item gst calculations ends ==========

        var disc_fld = $("#invoiceForm #invoice_participantTable .invoice_main-group").next("tr").find(".invoice_main_amount .invoice_calculated_discount").eq(t).val();

        total_disc = parseFloat(total_disc) + parseFloat(disc_fld);
    }
    final_total_amt = parseFloat(total_amt) - parseFloat(total_disc);

    $("#total_invoice_value").val(final_total_amt);

    var t = $("#total_invoice_value").val();
    var hide_est_disc_or_not = $("#invoice_items_discount_selected").val();

    // Invoice level discount fields
    var est_selected_disc_type = $("#invoice_Calculate_discounts").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#invoice_disc_amt").val());

    // Invoice level GST fields
    var est_selected_gst_type = $("#invoice_Calculate_discounts").find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#invoice_Calculate_discounts").find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#invoice_disc_amt");
    $("#invoice_calculated_disc_amt").val(0);
    // If invoice level discount row visible
    if(hide_est_disc_or_not == 0)
    {
        if(est_selected_disc_type != "Select Type")
        {
            if(est_selected_disc_rate && est_selected_disc_rate!="NaN")
            {   
                if(est_selected_disc_type == 'Percentage')
                {   
                    var current = curr_html.closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    // Invoice_Percentage_validation(curr_html, est_selected_disc_rate);

                    var cal_estimate_disc = (parseFloat(t) * parseFloat(est_selected_disc_rate))/100;
                    $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ "+cal_estimate_disc.toFixed(2));
                    $("#invoice_calculated_disc_amt").val(cal_estimate_disc);
                }
                if(est_selected_disc_type == 'Amount')
                {   
                    // Invoice_Amount_validation(curr_html, est_selected_disc_rate, parseFloat(t));

                    $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ "+est_selected_disc_rate.toFixed(2));
                    $("#invoice_calculated_disc_amt").val(est_selected_disc_rate);
                }
            }
            else {
                if(est_selected_gst_type != 'Select Type')
                {
                    if(est_selected_gst_type == 'IGST')
                    {   
                        new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                        // Values into the hidden fields of igst
                        $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                        $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                        $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);

                    }
                    if(est_selected_gst_type == 'CGST')
                    {
                        new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                        // Values into the hidden fields of cgst & sgst
                        $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                        $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                        $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                        $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else{
                    $("#invoice_calculated_disc_amt").val(t);
                    $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
                    $("#invoice_disc_amt").closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
                    $("#invoice_disc_amt").closest("tr").next().next().next().find(".invoice_main_amount").text("₹ 0000.00");
                }
            }
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find(".invoice_remove_discount").css("display","inline-block");
        }
        else {
            $("#invoice_disc_amt").val('');
            $("#invoice_calculated_disc_amt").val(0);
            $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find(".invoice_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);

            }
            if(est_selected_gst_type == 'CGST')
            {
                new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
        }
    }

    // invoice_level_discount_change(final_total_amt);

    // If invoice level gst row visible
    var hide_est_gst_or_not = $("#invoice_items_gst_type_selected").val();
    if(hide_est_gst_or_not == 0)
    {   
        if(est_selected_gst_type != "Select Type")
        {
            // If invoice level gst type is selected
            if(est_selected_disc_type!="Select Type")
            {   
                if(est_selected_disc_type == "Percentage"){
                    if($("#invoice_calculated_disc_amt").val()!="")
                    {
                        if($("#invoice_disc_amt").val()!=""){
                            new_final_total_amt = parseFloat(t) - parseFloat($("#invoice_calculated_disc_amt").val());
                        }
                        else {
                            new_final_total_amt = parseFloat(t);
                        }
                    }
                    else {
                        new_final_total_amt = parseFloat(t);
                    }
                }
                if(est_selected_disc_type == "Amount")
                {
                    new_final_total_amt = parseFloat(t) - parseFloat($("#invoice_calculated_disc_amt").val());
                }
            }
            else {
                new_final_total_amt = parseFloat(t);
            }

            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ 0000.00");
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
        }
        else {
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
        }
    }

    // invoice_level_gst_change(final_total_amt);
}

function invoice_item_rate_change(elem)
{   
    var invoice_item_qty = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_qty[]']").val();
    var invoice_item_rate = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val();
    if(invoice_item_rate != ""){
        if(invoice_item_qty == "" || invoice_item_qty == "NaN" || invoice_item_qty == 0){
            $(elem).closest(".invoice_main-group").find("input[name='invoice_item_qty[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".invoice_main-group").find("input[name='item_qty[]']").val("");
    }*/
}

function invoice_item_qty_change(elem)
{
    var invoice_item_qty = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_qty[]']").val();
    var invoice_item_rate = $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val();
    if(invoice_item_qty != ""){
        if(invoice_item_rate == "" || invoice_item_rate == "NaN" || invoice_item_rate == 0){
            $(elem).closest(".invoice_main-group").find("input[name='invoice_item_rate[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".invoice_main-group").find("input[name='item_rate[]']").val("");
    }*/
}

function invoice_item_discount_type_change(elem)
{
    var invoice_main_amount = $(elem).closest("tr").prev().find(".invoice_main_amount").val();
    var disc_type = $(elem).closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_rate = $(elem).closest("tr").find(".rate").val();
    var calculated_disc = 0;

    if(disc_type!="Select Type")
    {
        if(disc_rate!="")
        {
            if(disc_type == "Percentage")
            {
                calculated_disc = (parseFloat(invoice_main_amount) * parseFloat(disc_rate))/100;
                $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+calculated_disc.toFixed(2));
                $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+calculated_disc+'">');
            }
            if(disc_type == "Amount")
            {   
                $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+parseFloat(disc_rate).toFixed(2));
                calculated_disc = parseFloat(invoice_main_amount) - parseFloat(disc_rate);
                $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+disc_rate+'">');
            }
        }
        else {
            $(elem).closest("tr").find(".invoice_main_amount").text('₹ 0000.00');
            $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');
        }
        $("#invoice_items_discount_selected").val(1);
    }
    else {
        $(elem).closest("tr").find(".invoice_main_amount").text('₹ 0000.00');
        $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');

        $("#invoice_items_discount_selected").val(0);
    }
}

function invoice_item_discount_rate_change(elem)
{
    var invoice_main_amount = $(elem).closest("tr").prev().find(".invoice_main_amount").val();
    var disc_type = $(elem).closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_rate = $(elem).val();
    var calculated_disc = 0;
    if(disc_type!="Select Type")
    {
        if(disc_rate!="")
        {
            if(disc_type == "Percentage")
            {
                calculated_disc = (parseFloat(invoice_main_amount) * parseFloat(disc_rate))/100;
                $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+calculated_disc.toFixed(2));
                $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+calculated_disc+'">');
            }
            if(disc_type == "Amount")
            {
                calculated_disc = parseFloat(disc_rate);
                $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+parseFloat(disc_rate).toFixed(2));
                $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="'+disc_rate+'">');
            }
            $("#invoice_items_discount_selected").val(1);
        }
        else {
            $(elem).closest("tr").find(".invoice_main_amount").text('₹ 0000.00');
            $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');
            $(elem).closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
            $(elem).closest("tr").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("tr").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");
        }
    }
    else {
        $(elem).closest("tr").find(".invoice_main_amount").text('₹ 0000.00');
        $(elem).closest("tr").find(".invoice_main_amount").append('<input type="hidden" name="invoice_calculated_discount[]" class="invoice_calculated_discount" value="0">');
        $(elem).closest("tr").find(".invoice_main_amount .invoice_calculated_discount").val(0);
        $(elem).closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
        $(elem).closest("tr").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("tr").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $("#invoice_items_discount_selected").val(0);

    }
}

function invoice_item_gst_type_change(elem)
{
    var invoice_main_amount = $(elem).closest("tr").prev().prev().find(".invoice_main_amount").val();

    var cal_disc_amt = $(elem).closest("tr").prev().find(".invoice_main_amount .invoice_calculated_discount").val();
    
    var disc_type = $(elem).closest("tr").prev().find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected .custom-a11yselect-focused").text();

    var disc_rate = $(elem).closest("tr").prev().find(".rate").val();

    var gst_type = $(elem).closest(".invoice_GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    var gst_rate = $(elem).closest("tr").find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val"); 
    
    var gst_cal = 0;
    var splitted_tax = 0;
    if(invoice_main_amount!="")
    {
        if(gst_type!="Select Type")
        {
            var cal_gst = 0;
            gst_cal = parseFloat(invoice_main_amount) - parseFloat(cal_disc_amt);
            if(gst_type == 'IGST')
            {
                $("#invoiceForm #invoice_participantTable .participantRow .invoice_SGST_Discount").hide();
                cal_gst = (parseFloat(gst_cal) * parseFloat(gst_rate))/100;
                $(elem).closest("td").next().find(".invoice_item_igst_amount").val(cal_gst);
                $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(0);
                $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(0);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
            if(gst_type == 'CGST'){
                $("#invoiceForm #invoice_participantTable .participantRow .invoice_SGST_Discount").show();
                splitted_tax = gst_rate/2;
                cal_gst = (parseFloat(gst_cal) * parseFloat(splitted_tax))/100;
                $(elem).closest("td").next().find(".invoice_item_igst_amount").val(0);
                $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(cal_gst);
                $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(cal_gst);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
                    $(elem).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                    $(elem).closest("tr").next().find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
        } 
        else {
            $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
            $(elem).closest("td").next().find(".invoice_item_igst_amount").val(0);
            $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(0);
            $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(0);
        }
    }
    else {
        $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
        $(elem).closest("td").next().find(".invoice_item_igst_amount").val(0);
        $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(0);
        $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(0);
    } 
}

function invoice_item_gst_rate_change(elem)
{
    var invoice_main_amount = $(elem).closest("tr").prev().prev().find(".invoice_main_amount").val();

    var cal_disc_amt = $(elem).closest("tr").prev().find(".invoice_main_amount .invoice_calculated_discount").val();
    
    var disc_type = $(elem).closest("tr").prev().find(".invoice_discount_section .custom-a11yselect-menu .custom-a11yselect-selected .custom-a11yselect-focused").text();

    var disc_rate = $(elem).closest("tr").prev().find(".rate").val();

    var gst_type = $(elem).closest("tr").find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    var gst_rate = $(elem).closest("tr").find(".invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");

    var gst_cal = 0;
    var splitted_tax = 0;
    if(invoice_main_amount!="")
    {
        if(gst_type!="Select Type")
        {
            var cal_gst = 0;
            gst_cal = parseFloat(invoice_main_amount) - parseFloat(cal_disc_amt);
            if(gst_type == 'IGST')
            {
                cal_gst = (parseFloat(gst_cal) * parseFloat(gst_rate))/100;
                $(elem).closest("td").find(".invoice_item_igst_amount").val(cal_gst);
                $(elem).closest("td").find(".invoice_item_cgst_amount").val(0);
                $(elem).closest("td").find(".invoice_item_sgst_amount").val(0);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
            if(gst_type == 'CGST'){
                splitted_tax = gst_rate/2;
                cal_gst = (parseFloat(gst_cal) * parseFloat(splitted_tax))/100;
                $(elem).closest("td").find(".invoice_item_igst_amount").val(0);
                $(elem).closest("td").find(".invoice_item_cgst_amount").val(cal_gst);
                $(elem).closest("td").find(".invoice_item_sgst_amount").val(cal_gst);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
                    $(elem).closest("tr").next().find(".invoice_main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                    $(elem).closest("tr").next().find(".invoice_main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
        } 
        else {
            $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
            $(elem).closest("td").next().find(".invoice_item_igst_amount").val(0);
            $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(0);
            $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(0);
        }
    }
    else {
        $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("tr").find(".invoice_main_amount").text("₹ 0000.00");
        $(elem).closest("td").next().find(".invoice_item_igst_amount").val(0);
        $(elem).closest("td").next().find(".invoice_item_cgst_amount").val(0);
        $(elem).closest("td").next().find(".invoice_item_sgst_amount").val(0);
    }
}

function invoice_level_discount_change(final_total_amt)
{
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;

    var t = $("#invoice_total_estimate_value").val();
    var hide_est_disc_or_not = $("#invoice_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type = $("#invoice_Calculate_discounts").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type = $("#invoice_Calculate_discounts").find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#invoice_Calculate_discounts").find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#invoice_disc_amt");

    // If estimate level discount row visible
    if(hide_est_disc_or_not == 0)
    {
        if(est_selected_disc_type != "Select Type")
        {
            if(est_selected_disc_rate && est_selected_disc_rate!="NaN")
            {   
                if(est_selected_disc_type == 'Percentage')
                {   
                    var current = curr_html.closest("tr").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    Invoice_Percentage_validation(curr_html, est_selected_disc_rate);

                    var cal_estimate_disc = (parseFloat(t) * parseFloat(est_selected_disc_rate))/100;
                    $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ "+cal_estimate_disc.toFixed(2));
                    $("#invoice_calculated_disc_amt").val(cal_estimate_disc);
                }
                if(est_selected_disc_type == 'Amount')
                {   
                    Invoice_Amount_validation(curr_html, est_selected_disc_rate, parseFloat(t));

                    $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ "+est_selected_disc_rate.toFixed(2));
                    $("#invoice_calculated_disc_amt").val(est_selected_disc_rate);
                }
            }
            else {
                $("#invoice_calculated_disc_amt").val(t);
                $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
                $("#invoice_disc_amt").closest("tr").next().next().find(".invoice_main_amount").text("₹ 0000.00");
                $("#invoice_disc_amt").closest("tr").next().next().next().find(".invoice_main_amount").text("₹ 0000.00");
            }
            $("#invoice_Calculate_discounts .Invoice_Percentage").closest("tr").find(".invoice_remove_discount").css("display","inline-block");
        }
        else {
            $("#invoice_disc_amt").closest("td").next().find(".invoice_main_amount").text("₹ 0000.00");
            $(this).closest("tr").find(".invoice_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);

            }
            if(est_selected_gst_type == 'CGST')
            {
                new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
        }
    }
}

function invoice_level_gst_change(final_total_amt)
{   
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;

    var t = $("#invoice_total_estimate_value").val();
    var hide_est_disc_or_not = $("#invoice_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type = $("#invoice_Calculate_discounts").find(".invoice_discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#invoice_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type = $("#invoice_Calculate_discounts").find(".invoice_GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#invoice_Calculate_discounts").find('.invoice_rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#invoice_disc_amt");

    // If estimate level gst row visible
    var hide_est_gst_or_not = $("#invoice_items_gst_type_selected").val();
    if(hide_est_gst_or_not == 0)
    {   
        if(est_selected_gst_type != "Select Type")
        {      
            // If estimate level gst type is selected
            if(est_selected_disc_type!="")
            {   
                if(est_selected_disc_type == "Percentage"){
                    if($("#invoice_calculated_disc_amt").val()!="")
                    {
                        if($("#invoice_disc_amt").val()!=""){
                            new_final_total_amt = parseFloat(t) - parseFloat($("#invoice_calculated_disc_amt").val());
                        }
                        else {
                            new_final_total_amt = parseFloat(t);
                        }
                    }
                    else {
                        new_final_total_amt = parseFloat(t);
                    }
                }
                if(est_selected_disc_type == "Amount")
                {
                    new_final_total_amt = parseFloat(t) - parseFloat($("#invoice_calculated_disc_amt").val());
                }
            }

            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
                $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
                $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ 0000.00");
            $("#invoice_Calculate_discounts").find(".invoice_CGST_TR_section .invoice_main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type == 'IGST')
        {   
            var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
            // Values into the hidden fields of igst
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(new_cal);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
            // Values into the hidden fields of cgst & sgst
            $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
            $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(new_cal);
            $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(new_cal);
            $("#invoice_Calculate_discounts").find(".invoice_SGST_Discount .invoice_main_amount").text("₹ "+new_cal.toFixed(2));
        }
        $("#invoice_Calculate_discounts").find(".invoice_igst_amount").val(0);
        $("#invoice_Calculate_discounts").find(".invoice_cgst_amount").val(0);
        $("#invoice_Calculate_discounts").find(".invoice_sgst_amount").val(0);
    }
}
