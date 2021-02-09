// New Create Estimate Form Script

$(document).on("focus", "#edit_datepicker", function(){

    $("#edit_datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        orientation: "top",
        format: "dd/mm/yyyy"
    })
    // .datepicker('update', new Date());

});

/* Variables */
var p = $("#edit_participants").val();
var row = $(".edit_participantRow");

// var estimate_items_add_row = '<tr class="main-group" style="border-top: 2px solid #ddd;"><td><input type="checkbox"class="checkbox sub_checkbox" onchange="Count_of_selected_checkboxes(this,document.getElementById('+"'check_sub_checkboxes_cnt'"+').value)"></td><td class="sno"><span>1</span></td><td><input name="edit_item_descr[]" id="" type="text" value="" class="form-control item_descr"></td><td><input name="edit_item_hsn[]" id="" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="edit_item_qty[]" id="" type="text" value="" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="edit_item_rate[]" id="" type="text" value="" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input type="text" class="main_amount form-control" name="edit_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><!--<button class="btn btn-danger remove"type="button">Remove</button>--><span class="material-icons-outlined estimate_remove">delete_outline</span></td></tr><script>var q = 0;</script><tr><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount(At item level)</span></td><td class="width_15 discount_section"><select name="edit_item_discount_type[]" id="" class="Estimate_Percentage form-control"><option value="">Select Type</option><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select></td><td class="width_10"><input name="edit_item_discount_rate[]" id="" type="text" value="" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td class="width_15"><span class="main_amount">₹ 0000.00 <input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0" /></span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_discount" style="display: none;">delete_outline</span></td></tr><tr class="CGST_TR_section"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+GST(At item level)</span></td><td class="width_15 GST_section"><select name="edit_item_gst_type[]" id="" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control"><option value="">Select Type</option><option value="IGST">IGST</option><option value="CGST">CGST</option></select></td><td class="width_10 rate_data"><select name="edit_item_gst_discont[]" id="" class="DiscountPer form-control"><option value="0">0%</option><option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option><option value="12">12%</option><option value="18">18%</option><option value="28">28%</option></select><input type="hidden" class="item_igst_amount" name="edit_item_igst_amount[]" value="0" /><input type="hidden" class="item_cgst_amount" name="edit_item_cgst_amount[]" value="0" /><input type="hidden" class="item_sgst_amount" name="edit_item_sgst_amount[]" value="0" /></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount" style="display: none;">delete_outline</span></td></tr><tr id="" class="SGST_Discount" style="display: none;"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span></td><td class="width_15"><input name="SGST" value="SGST" class="SGST form-control"type="text"></td><td class="width_10 rate_data"><!--<select name="edit_item_sgst_discount[]" id="" class="DiscountPer form-control"><option value="">None</option><option value="18%">18%</option><option value="19%">19%</option></select>--></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount">delete_outline</span></td></tr>';

// var check_hidden  = document.getElementById('check_sub_checkboxes_cnt').value;

var estimate_items_add_row = '<tr class="main-group" style="border-top: 2px solid #ddd;"><td><input type="checkbox" class="checkbox sub_checkbox" onchange="Count_of_selected_checkboxes(this,document.getElementById('+"'check_sub_checkboxes_cnt'"+').value)"></td><td class="sno"><span>1</span></td><td><input name="edit_item_descr[]" id="" type="text" value="" class="form-control item_descr"></td><td><input name="edit_item_hsn[]" id="" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="edit_item_qty[]" id="" type="text" value="" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="edit_item_rate[]" id="" type="text" value="" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input type="text" class="main_amount form-control" name="edit_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><!--<button class="btn btn-danger remove"type="button">Remove</button>--><span class="material-icons-outlined estimate_remove">delete_outline</span></td></tr><script>var q = 0;</script><tr><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount(At item level)</span></td><td class="width_15 discount_section"><select name="edit_item_discount_type[]" id="" class="Estimate_Percentage form-control"><option value="">Select Type</option><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select></td><td class="width_10"><input name="edit_item_discount_rate[]" id="" type="text" value="" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td class="width_15"><span class="main_amount">₹ 0000.00 <input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0" /></span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_discount" style="display: none;">delete_outline</span></td></tr><tr class="CGST_TR_section"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+GST(At item level)</span></td><td class="width_15 GST_section"><select name="edit_item_gst_type[]" id="" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control"><option value="">Select Type</option><option value="IGST">IGST</option><option value="CGST">CGST</option></select></td><td class="width_10 rate_data"><select name="edit_item_gst_discont[]" id="" class="DiscountPer form-control"><option value="0">0%</option><option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option><option value="12">12%</option><option value="18">18%</option><option value="28">28%</option></select><input type="hidden" class="item_igst_amount" name="edit_item_igst_amount[]" value="0" /><input type="hidden" class="item_cgst_amount" name="edit_item_cgst_amount[]" value="0" /><input type="hidden" class="item_sgst_amount" name="edit_item_sgst_amount[]" value="0" /></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount" style="display: none;">delete_outline</span></td></tr><tr id="" class="SGST_Discount" style="display: none;"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span></td><td class="width_15"><input name="SGST" value="SGST" class="SGST form-control"type="text"></td><td class="width_10 rate_data"><!--<select name="edit_item_sgst_discount[]" id="" class="DiscountPer form-control"><option value="">None</option><option value="18%">18%</option><option value="19%">19%</option></select>--></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount">delete_outline</span></td></tr>';


/* Functions */
function getP_estimate_edit() {
    p = $("#edit_participants").val();
}

function hideEstimateDateErrorMessage(event)
{
    // alert("Hello inside hide function");
    $(event).removeAttr("style");
    $(event).closest("div").parent().find(".err").remove();
}

function addRow_estimate_edit() {
    $('#edit_estimateModal .edit_participantRow').append(estimate_items_add_row);
}

function removeRow(button) {
    button.closest("tr").remove();
}

/* Doc ready */
$(document).on('click', ".edit_Estimate_add", function (event) {

        event.preventDefault();
        event.stopImmediatePropagation();

        addRow_estimate_edit();
        var i = Number(p) + 1;
        $("#edit_participants").val(i);
        
        var edit_total_items = $("#edit_total_items").val();
        edit_total_items = parseInt(edit_total_items) + 1;
        $("#edit_total_items").val(edit_total_items);

        $("#edit_estimateModal .Estimate_Percentage").customA11ySelect();
        $("#edit_estimateModal .Estimate_IGSTandCGST").customA11ySelect();
        $("#edit_estimateModal .Calculate_IGSTandCGST").customA11ySelect();
        $("#edit_estimateModal .BillingFrom_address").customA11ySelect();
        $("#edit_estimateModal .BillingFrom_gst").customA11ySelect();
        $("#edit_estimateModal .BillingTo_address").customA11ySelect();
        $("#edit_estimateModal .BillingTo_gst").customA11ySelect();
        $("#edit_estimateModal .DiscountPer").customA11ySelect();
       
        var items_selected_gst = $(".edit_participantRow .main-group:first").next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(items_selected_gst!="Select Type" || items_selected_gst!=""){
            // $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
            $("#edit_participantTable .edit_participantRow ").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text(items_selected_gst);
            $("#edit_participantTable .edit_participantRow .CGST_TR_section .estimate_remove_adddiscount").show();

            if(items_selected_gst === 'CGST'){
                $("#edit_participantTable .edit_participantRow .SGST_Discount").show();
            }
            else {
                $("#edit_participantTable .edit_participantRow .SGST_Discount").hide();
            }
        }
        
        if(items_selected_gst =="Select Type")
        {
            $("#edit_participantTable .edit_participantRow .CGST_TR_section .estimate_remove_adddiscount").hide();
        }

        // Disabled item level GST fields if selected billing entity has not GST
        if($("#edit_BillFromAddress_street #edit_billingaddressgstin").val()!="" && $("#edit_BillFromAddress_street #edit_billingaddressgstin").val()==0)
        {
            $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

            $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $("#edit_participantTable .edit_participantRow .GST_section").closest("tr").find(" .invoice_remove_adddiscount").css("display","none");

            $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "opacity":"1", "cursor":"not-allowed","pointer-events":"none"});
        }


    var element = $("#edit_total_items").val();
    $(".edit_participantRow .sno").html("");

    for(var g=0;g<element;g++)
    {
        var s=g+1;
        $(".edit_participantRow .main-group").eq(g).find(".sno").html(s);
    }
    
});

$(document).on("change", "#edit_participants", function () {
    var i = 0;
    p = $("#edit_participants").val();
    var rowCount = $(".edit_participantRow tr").length - 2;
    if (p > rowCount) {
        for (i = rowCount; i < p; i += 1) {
            addRow();
        }
        $("#edit_participantTable #edit_addButtonRow").appendTo(".edit_participantRow");
    } else if (p < rowCount) {}
});

//FOR Serial Number- use ON 
$(document).on("click", ".edit_Estimate_add, .estimate_remove", function(){
    $("#edit_participantTable td.sno").each(function(index,element){                 
        $(element).text(index + 1);
    });
});

$(document).on("click", ".estimateDiffBillingEntity", function(){
    $(".BillingFrom_address_and_gst").show();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFrom_gst_main").hide();
    $("#edit_billfromname").remove();
    $("#edit_BillingFromAddress").hide();
    $("#BillingFromAddress_edit").show();
    $("#BillingFrom_address_and_gst_edit").show();
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
                    $(".BillingFromAddress").show();
                    $("#edit_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#edit_BillFromAddress_address").html("<span>"+data.address+"</span>");
                    $("#edit_BillFromAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#edit_BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#edit_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#edit_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingFromAddress").hide();
                    $(".BillingFrom_address_and_gst").show();
                    $("#edit_BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $("#edit_BillingFrom_addr").customA11ySelect('refresh');

                    $("#edit_billfromname, #edit_billing_address_street, #edit_billing_address_city, #edit_billing_address_state, #edit_billing_address_postal_code, #edit_billingaddressgstin, #edit_billingaddresspanno, #edit_billingemailaddress, #edit_billingphoneno, #edit_billingfrom_udyamno").remove();
                }
                else{
                    $(".BillingFromAddress").show();
                }
            }
        }
    });
    $(".BillingFromAddress").hide();
 });

$(document).on("click", ".estimateDiffGSTNum", function(){
    $(".BillingFrom_address_and_gst").show();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFrom_gst_main").hide();
    $("#edit_billfromname").remove();
    $("#edit_BillingFromAddress").hide();
    $("#BillingFromAddress_edit").show();
    $("#BillingFrom_address_and_gst_edit").show();
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
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".BillingFrom_address_main").hide();
                        $(".BillingFrom_address_and_gst").show();
                        $(".BillingFrom_gst_main").show();
                        $(".BillingFromGSTDetails_dropdown").show();
                        
                        $(".BillingFromAddress").hide();
                        $(".BillingFrom_address_gst").show();
                        
                        $(".BillingFromGSTDetails").hide();
                        $("#edit_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#edit_BillingFrom_gstno").append(data.str_opt);
                        $("#edit_BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#edit_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#edit_BillFromAddress_address").html("<span>"+data.address+"</span>");
                        $("#edit_BillFromAddress_email").html("<span>"+data.email_phone+"</span>");
                        $("#edit_BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#edit_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        $("#edit_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingFromAddress").hide();
                    $(".BillingFrom_address_and_gst").show();
                    $("#edit_BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $("#edit_BillingFrom_addr").customA11ySelect('refresh');
                }
                else{
                    $(".BillingFromAddress").show();
                }
            }
        }
    });
    $(".BillingFromAddress").hide();
 });

$(document).on("click", ".estimateDiffcustomer", function(){
    $(".BillingTo_address_and_gst").show();
    $(".BillingToGSTDetails").hide();
    $(".BillingTo_gst_main").hide();
    $("#edit_billtoname").remove();
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
                if(data.total_num == 1){
                    $(".BillingFromAddress").show();
                    $("#edit_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#edit_BillToAddress_address").html("<span>"+data.address+"</span>");
                    $("#edit_BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#edit_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#edit_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#edit_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#edit_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $("#edit_BillingTo_addr").customA11ySelect('refresh');

                    $("#edit_billtoname, #edit_shipping_address_street, #edit_shipping_address_city, #edit_shipping_address_state, #edit_shipping_address_postal_code, #edit_shippingaddressgstin, #edit_shippingaddresspanno, #edit_shippingaddressemailid, #edit_shippingaddresshphoneno, #edit_billingto_udyamno").remove();
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
    $("#edit_billtoname").remove();
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
                        $("#edit_BillingTo_gstno").append(data.str_opt);
                        $("#edit_BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#edit_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#edit_BillToAddress_address").html("<span>"+data.address+"</span>");
                        $("#edit_BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                        $("#edit_BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#edit_BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        $("#edit_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#edit_BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $("#edit_BillingTo_addr").customA11ySelect('refresh');

                    $("#edit_billtoname, #edit_shipping_address_street, #edit_shipping_address_city, #edit_shipping_address_state, #edit_shipping_address_postal_code, #edit_shippingaddressgstin, #edit_shippingaddresspanno, #edit_shippingaddressemailid, #edit_shippingaddresshphoneno, #edit_billingto_udyamno").remove();
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
    $(".BillingFromCard").show();
    $(".BillingFrom_address_and_gst").hide();
    $(".BillingFromAddress").hide();

    $(".BillingToCard").show();
    $(".BillingTo_address_and_gst").hide();
    $(".BillingToAddress").hide();
});

$(document).on('change','#updateEstimateForm #edit_participantTable .Estimate_IGSTandCGST',function(event){
    event.preventDefault();
    event.stopImmediatePropagation();
    var current=$(this).closest(".edit_participantRow");
    var a=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // Make dropdown option selected when select any
    $("select[name='edit_item_gst_type[]']").each(function(){
        $('option:selected', $("select[name='edit_item_gst_type[]']").val(a)).attr('selected',true).siblings().removeAttr('selected');
    });

    // for CGST
    var current1=current.find(".rate_data");
    var cgst_rate_id=current.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".rate_data .custom-a11yselect-menu li:first button").text();

    var cur_val=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var cur_data_val=$(this).closest(".GST_section").find(".custom-a11yselect-selected").attr('data-val');
    var cur_val_id=$(this).closest(".GST_section").find(".custom-a11yselect-selected").attr('id');

    var except_cur = $("#edit_estimateModal .edit_participantRow .GST_section").not(this);
    except_cur.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
    except_cur.find(".custom-a11yselect-btn .custom-a11yselect-text").text(cur_val);
    except_cur.find(".custom-a11yselect-btn").attr('aria-activedescendant',cur_val_id);
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass('custom-a11yselect-selected custom-a11yselect-focused');
    except_cur.find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='"+cur_data_val+"']").addClass('custom-a11yselect-selected custom-a11yselect-focused');

    if(a=="Select Type")
    {
        $(this).closest(".edit_participantRow ").find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

        $("select[name='edit_item_gst_discont[]']").each(function(){
            $('option:selected', $("select[name='edit_item_gst_discont[]']").val(0)).attr('selected',true).siblings().removeAttr('selected');
        });

        $(this).closest(".edit_participantRow ").find(".CGST_TR_section .estimate_remove_adddiscount").css("display","none");
        $(".edit_participantRow .CGST_TR_section .main_amount ").text('');
        $(".edit_participantRow .CGST_TR_section .main_amount").text('₹ 0000.00');
        $(".edit_participantRow .CGST_TR_section").next().find(".main_amount").text('');
        $(".edit_participantRow .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');

        $("#edit_estimate_items_gst_type_selected").val(0);

        $(".edit_participantRow .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","none");
        
        $(".edit_participantRow .CGST_TR_section").next().hide();

        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        
        $("#edit_Calculate_discounts .CGST_TR_section").show();

        // $("#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

        // $("#edit_Calculate_discounts .CGST_TR_section").next().hide();

        // // Estimate level GST dropdown
        // $("#edit_Calculate_discounts .GST_section ").find(".custom-a11yselect-text").text('');
        // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-text").text('Select Type');
       
        // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_IGSTandCGST_select-option-0');

        // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

        // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        // // Estimate level GST rate dropdown
        
        // $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('');

        // $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('0%');

        // $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_rate-option-0');

        
        // $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        
        // $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        // $("#edit_Calculate_discounts .CGST_TR_section .main_amount ").text('');

        // $("#edit_Calculate_discounts .CGST_TR_section .main_amount").text('₹ 0000.00');
        
        // $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('');
        
        $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');
        // $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');

        reset_edit_estimate_level_gst_details();
    }
    else if(a=='IGST')
    {
        $(".edit_participantRow .CGST_TR_section .estimate_remove_adddiscount").css("display","inline-block");

        $(".edit_participantRow .CGST_TR_section").next().find(".main_amount").text('');
        
        $(".edit_participantRow .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');

        $(".edit_participantRow .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","none");
        
        $(".edit_participantRow .CGST_TR_section").next().hide();

        $("#edit_estimate_items_gst_type_selected").val(1);

        $("#edit_Calculate_discounts .CGST_TR_section").hide();
        
        $("#edit_Calculate_discounts .CGST_TR_section").next().hide();
    }
    else if(a=='CGST')
    {

        $(".edit_participantRow .CGST_TR_section .estimate_remove_adddiscount").css("display","inline-block");
         
        $(".edit_participantRow .CGST_TR_section").next().find(" .estimate_remove_adddiscount").css("display","inline-block");

        $(".edit_participantRow .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","inline-block");
         
        $(".edit_participantRow .CGST_TR_section").next().show();

        $("#edit_estimate_items_gst_type_selected").val(1);

        $("#edit_Calculate_discounts .CGST_TR_section").hide();
        
        $("#edit_Calculate_discounts .CGST_TR_section").next().hide();
    }
    // calculate_estimate_level_discount_edit();
    for_hiding_edit_estimate_level_GST();
    edit_estimate_remove_panel_color();
    cal_estimate_level_amts_edit();

    $("#edit_estimate_summary_value").val(2);
});

//  checkbox section
$(document).on('click','#updateEstimateForm #edit_participantTable .header_checkbox',function(){
    if($(this).prop("checked") == true){
        $("#edit_participantTable .sub_checkbox").prop("checked",true);
        $("#edit_participantTable .header_delete").css("display","inline-block");
        $("#check_sub_checkboxes_cnt").val($("#edit_total_items").val());
    }
    else if($(this).prop("checked") == false){
        $("#edit_participantTable .sub_checkbox").prop("checked",false);
        $("#edit_participantTable .header_delete").css("display","none");
        $("#check_sub_checkboxes_cnt").val(0);

    }       

});
$(document).on('click','#updateEstimateForm #edit_participantTable .sub_checkbox',function(){
    var ele=$(this).closest("#edit_participantTable .edit_participantRow");
    var length=ele.find(".main-group .sub_checkbox:checked").length;
    if(length>=1)
    {
        $("#edit_participantTable .header_delete").css("display","inline-block");
    }
    else
    {
        $("#edit_participantTable .header_delete").css("display","none");
        $("#edit_participantTable .header_checkbox").prop("checked",false); //new change
    }
});



// $(document).ready(function(){

// var sub_count11 = $('#edit_estimateModal .edit_participantRow #check_sub_checkboxes_cnt').val();

// alert($(" #edit_estimateModal #edit_total_items").val());

  function Count_of_selected_checkboxes(ele,n)
  {
    var nn = parseInt(n);
    var no = '';
    var $el = $(ele);
    if ($el.prop('checked')) {
        no = nn + 1; 
      $('#check_sub_checkboxes_cnt').val(no);
    } else {
         no = nn - 1;
      $('#check_sub_checkboxes_cnt').val(no);
    }
    // return no;
 }


$(document).on("click","#updateEstimateForm #edit_participantTable .header_delete",function(){
    
    var r = $(".edit_participantRow .main-group .sub_checkbox:checked").closest("tr");
    // var sub_checkbox_len= $("#check_sub_checkboxes_cnt").val();
    var sub_checkbox_len= $(".edit_participantRow .main-group .sub_checkbox:checked").length;

    // console.log("before "+sub_checkbox_len);
    
    var deleted_row_val = $(".edit_participantRow .main-group .sub_checkbox:checked").closest("tr").find('.main_amount').val();

    // ================ Total number of rows reduces ================
    // var total_rows = $("#edit_total_items").val();
    // var new_row_count = total_rows - sub_checkbox_len;
    // // alert(new_row_count);
    // $("#edit_total_items").val(new_row_count);
    // ================ Total number of rows reduces ================

    var totalItems = $("#edit_total_items").val();

    var before_count = $("#check_sub_checkboxes_cnt").val();
    // var new_otal_tem_count = totalItems - sub_checkbox_len;
    var new_otal_tem_count = totalItems - before_count;
    $("#edit_total_items").val(new_otal_tem_count);
    
    r.next().next().remove();
    r.next().next().remove();
    r.next().next().remove();
    r.remove();

    $("#check_sub_checkboxes_cnt").val(0);

    var sub_checkbox_len1= $(".edit_participantRow .main-group .sub_checkbox:checked").length;


    var current = $("#check_sub_checkboxes_cnt").val();
    
    var element = $("#edit_total_items").val();

    // alert("after "+element);

    
    if(sub_checkbox_len1 == 0)
    {
        $("#edit_participantTable .header_delete").css("display","none");
    }
    
    $(".edit_participantRow .sno").html("");

    for(var g=0;g<element;g++)
    {
        var s=g+1;
        $(".edit_participantRow .main-group").eq(g).find(".sno").html(s);
    }



    // if(element == 0 || current == element || $("#edit_participantTable .header_checkbox").prop("checked") == true)
    if(element == 0 || current == element || $("#edit_participantTable .header_checkbox").prop("checked") == true)
    {
        $('.edit_participantRow').append(estimate_items_add_row);
        $("#edit_total_items").val(1);
        $("#edit_estimateModal .Estimate_Percentage").customA11ySelect();
        $("#edit_participantTable .Estimate_IGSTandCGST").customA11ySelect();
        $("#edit_estimateModal .DiscountPer").customA11ySelect();

        $("#edit_estimateModal #edit_estimate_calculation .edit_estimate_effect").css("display","table-row");   
        $("#edit_estimate_items_discount_selected").val(0);
        $("#edit_estimate_items_gst_type_selected").val(0);
        $("#edit_estimateModal #edit_estimate_calculation .panel-heading ").removeClass("remove-panel-color");
        reset_edit_estimate_level_gst_details();
        reset_edit_estimate_level_discount_details();
    }
    else {
        // var totalItems = $("#edit_total_items").val();
        // var new_otal_tem_count = totalItems - sub_checkbox_len;
        // $("#edit_total_items").val(new_otal_tem_count);
    }
    $("#edit_participantTable .header_checkbox").prop("checked",false); // new change

    if(deleted_row_val){
        var l = parseFloat($("#edit_total_estimate_value").val()) - parseFloat(deleted_row_val);
    }
    else{
        var l = parseFloat($("#edit_total_estimate_value").val());
    }
    /*calculate_estimate_level_discount_edit(l);
    $("#edit_total_estimate_value").val(0);
    $("#edit_total_estimate_value").val(l);*/
    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();

    for_hiding_edit_estimate_level_percentage();
    for_hiding_edit_estimate_level_GST();
    edit_estimate_remove_panel_color();
    // reset_edit_estimate_level_gst_details();
});

// validation for rate
$(document).on('keyup', "#updateEstimateForm .edit_participantRow .rate", function(event) 
{
    event.preventDefault();
    event.stopImmediatePropagation();

    var cur_html=$(this);
    var cur_rate_val = $(this).val();
    var main_amt = cur_html.closest('tr').prev().prev().find('.main_amount').val();
    var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    // if(current=='Percentage')
    // {
    //     edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
    // }
    // else if(current=='Amount')
    // {
    //     edit_Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));
    // }

    var edit_extimate_count = 0;
    var edit_extimate_count1 = 0;

    if(main_amt != '')
    {
        // console.log("not Empty Amount ");

        cur_html.closest("tr").prev().prev().find(".main_amount").closest("td").find(".err").remove();
        cur_html.closest("tr").prev().prev().find(".main_amount").removeAttr('style');

        if(current=='Percentage')
        {
            if(edit_extimate_count == 0)
            {
                edit_extimate_count = edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amt,edit_extimate_count);
            }
        }
        else if(current=='Amount')
        {
            if(edit_extimate_count1 == 0)
            {

                edit_extimate_count1 = edit_Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt),edit_extimate_count1);
            }
        }
    }
    else
    {
        cur_html.closest("tr").prev().prev().find(".main_amount").closest("td").append('<span class="err text-danger">Please enter amount</span>');
        cur_html.closest("tr").prev().prev().find(".main_amount").css('border-color', 'rgb(173, 72, 70)');
        cur_html.val("");
        cur_html.closest("tr").prev().prev().find(".main_amount").focus();
        // $.alert({
        //         title: 'Alert!',
        //         content: 'Please enter Main Amount',
        //         type: 'dark',
        //         typeAnimated: true,
        //         buttons: {
        //             ok: function() { 
        //                 cur_html.val("");
        //                 edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
        //                 // cur_html.blur();
        //                 // cur_html.closest("tr").prev().find(".main_amount").focus();
        //             }
        //         }
        // });

    }

    cal_estimate_level_amts_edit(this);

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
    
});

$(document).on("keyup", "input[name='edit_item_descr[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='edit_item_qty[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");

    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_rate").val('');
        $(this).closest("tr").find(".main_amount").val('');
    }
});

$(document).on("keyup", "input[name='edit_item_rate[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='edit_item_main_amount[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_rate").val('');
        $(this).closest("tr").find(".item_qty").val('');
    }
});

$(document).on("change", "#edit_BillingFrom_addr", function(){
    $("#updateEstimateForm #edit_Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").removeAttr("style");  
    $("#updateEstimateForm .BillingFrom_address_main").find(".err").remove();
});

$(document).on("change", "#edit_BillingTo_addr", function(){
    $("#updateEstimateForm #edit_Address_Details_BillTo").find(".BillingTo_address_main .custom-a11yselect-btn").removeAttr("style");  
    $("#updateEstimateForm .BillingTo_address_main").find(".err").remove();
});

// Validation for percentage greater than 100% or less than 0%
function edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amt,count)
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
    //                 edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
                    edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
function edit_Amount_validation_estimate(cur_html,cur_rate_val,main_amt,count)
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
    //                     edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
    //                     edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
                            edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
                            edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
                            cur_html.focus();
                        }
                    }
                });
            }
        } 
        else if (cur_rate_val!="" && cur_rate_val<0) 
        {
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

/*$(document).on("click", "#FinanceEstimateModal #edit_estimate_main_details .close", function(current){
    var modal_id=$(current).closest(".modal").find("form").attr("id");

    $("#"+modal_id)[0].reset();

    $(".edit_participantRow tr").remove();

    // ============ Code added by Sachin ============
    $("#edit_billfromname").remove();
    $("#edit_billtoname").remove();
    $("#updateEstimateForm .BillingFromCard").removeAttr("style");
    $("#updateEstimateForm .BillingToCard").removeAttr("style");
    $("#edit_Address_Details .BillingFrom_address_and_gst").hide();
    $("#edit_Address_Details_BillTo .BillingTo_address_and_gst").hide();
    // ============ Code added by Sachin ============

    var element=$(".edit_participantRow .main-group").length;

    if(element==0)
    {
        $('.edit_participantRow').append(estimate_items_add);
        $(".Estimate_Percentage,.Estimate_IGSTandCGST,.DiscountPer").customA11ySelect();
    }

    $("#edit_datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
    }).datepicker('update', new Date());

    // for discount
    var Calculate_discount_id=$("#edit_Calculate_discounts .discount_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_discount_text=$("#edit_Calculate_discounts .discount_section .custom-a11yselect-menu li:first button").text();

    var current_row=$("#edit_Calculate_discounts .discount_section");

    ResetDiscount(current_row,Calculate_discount_id,Calculate_discount_text);

    //  for gst

    var Calculate_gst_id=$("#edit_Calculate_discounts .GST_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_text=$("#edit_Calculate_discounts .GST_section .custom-a11yselect-menu li:first button").text();

    var current_gst_row=$("#edit_Calculate_discounts .GST_section ");

    ResetDiscount(current_gst_row,Calculate_gst_id,Calculate_gst_text);

    //  for gst rate

    var Calculate_gst_rate_id=$("#edit_Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_rate_text=$("#edit_Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first button").text();

    var current_gst_rate_row=$("#edit_Calculate_discounts .CGST_TR_section .rate_data ");

    ResetDiscount(current_gst_rate_row,Calculate_gst_rate_id,Calculate_gst_rate_text);

    // for sgst rate

    var Calculate_sgst_rate_id=$("#edit_Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$("#edit_Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$("#edit_Calculate_discounts .SGST_Discount .rate_data ");

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

    $("#edit_Calculate_discounts .SGST_Discount,#edit_Calculate_discounts .estimate_remove_adddiscount,#edit_Calculate_discounts .estimate_remove_discount").hide();
});*/

// BillingFromCard Click event
$(document).on("click", "#updateEstimateForm .BillingFromCard", function(){
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
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".BillingFrom_address_main").hide();
                        $(".BillingFrom_address_and_gst").show();
                        $(".BillingFrom_gst_main").show();
                        $(".BillingFromGSTDetails_dropdown").show();
                        
                        $(".BillingFromAddress").hide();
                        $(".BillingFrom_address_gst").show();
                        
                        $(".BillingFromGSTDetails").hide();
                        $("#edit_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#edit_BillingFrom_gstno").append(data.str_opt);
                        $("#edit_BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#edit_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        if(data.address!=""){
                            $("#edit_BillFromAddress_street").html("<span>"+data.address+"</span>");
                        }

                        if(data.phoneno!=""){
                            $("#edit_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }
                        
                        $("#edit_BillFromAddress_num").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#edit_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        if(data.udyam_no!=""){
                            $("#edit_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }

                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_street' id='edit_billing_address_street' value='"+data.street+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_city' id='edit_billing_address_city' value='"+data.city+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_state' id='edit_billing_address_state' value='"+data.state+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_postal_code' id='edit_billing_address_postal_code' value='"+data.postal_code+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddressgstin' id='edit_billingaddressgstin' value='"+data.gst_num+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddresspanno' id='edit_billingaddresspanno' value='"+data.panno+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddressemailid' id='edit_billingaddressemailid' value='"+data.emailid+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddresshphoneno' id='edit_billingaddresshphoneno' value='"+data.phoneno+"' />");
                        $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingto_udyamno' id='edit_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingFrom_address_and_gst").show();
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $(".BillingFrom_address").customA11ySelect();
                    $(".BillingFromAddress").hide();
                }
                else{
                    $(".BillingFromAddress").show();
                }
            }
        }
    });
    $(".BillingFromAddress").show();
});

// BillingToCard Click event
$(document).on("click", "#updateEstimateForm .BillingToCard", function(){
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
                if(data.total_num == 1)
                {
                    if(data.total_gst > 1)
                    {
                        $(".BillingTo_address_main").hide();
                        $(".BillingTo_address_and_gst").show();
                        $(".BillingTo_gst_main").show();
                        $(".BillingToGSTDetails_dropdown").show();
                        
                        $(".BillingToAddress").hide();
                        $(".BillingTo_address_gst").show();
                        
                        $(".BillingToGSTDetails").hide();
                        $("#edit_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#edit_BillingTo_gstno").append(data.str_opt);
                        $("#edit_BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $("#edit_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#edit_BillToGST_address").html("<span>"+data.address+"</span>");

                        if(data.emailid!="" && data.phoneno!=""){
                            $("#edit_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#edit_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#edit_BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }

                        if(data.gst_num){
                            $("#edit_BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                        }
                        if(data.panno){
                            $("#edit_BillToAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                        }
                        if(data.udyam_registration_no){
                            $("#edit_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                        }
                        // Hidden fields to post the data
                        $("#edit_BillToAddress_name").append("<input type='hidden' name='billfromname' id='edit_billfromname' value='"+data.name+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_street' id='edit_shipping_address_street' value='"+data.street+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_city' id='edit_shipping_address_city' value='"+data.city+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_state' id='edit_shipping_address_state' value='"+data.state+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_postal_code' id='edit_shipping_address_postal_code' value='"+data.postal_code+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddressgstin' id='edit_shippingaddressgstin' value='"+data.gst_num+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddresspanno' id='edit_shippingaddresspanno' value='"+data.panno+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shippingemailaddress' id='edit_shippingemailaddress' value='"+data.emailid+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shippingphoneno' id='edit_shippingphoneno' value='"+data.phoneno+"' />");
                        $("#edit_BillToGST_address").append("<input type='hidden' name='shippingfrom_udyamno' id='edit_shippingfrom_udyamno' value='"+data.udyam_registration_no+"' />");
                    }
                }
                else if(data.total_num > 1){  
                    $(".BillingTo_address_main").show();
                    $(".BillingTo_address_and_gst").show();
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $(".BillingTo_address").customA11ySelect();
                    $(".BillingToAddress").hide();
                }
            }
        }
    });
    $(".BillingToAddress").show();
});

// Scripts for Billed from
$(document).on("change", "#updateEstimateForm #edit_BillingFrom_addr", function(){
    var sel_id = $('#edit_BillingFrom_addr option:selected').data('id');
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
            if(data.total_gst == 1)
            {
                $("#edit_BillingFromAddress").remove();
                $(".BillingFrom_address_main").hide();
                $(".BillingFromAddress").show();

                if(data.total_entities == 1 && data.total_gst_nums > 1){
                    $(".diff_gst_number").show();
                    $(".diff_billing_entity").hide();
                }
                else if(data.total_entities > 1){
                    $(".diff_gst_number").hide();
                    $(".diff_billing_entity").show();
                }
                else if(data.total_entities == 1 && data.total_gst_nums == 1){
                    $(".diff_gst_number").hide();
                    $(".diff_billing_entity").hide();
                }

                $(".BillingFrom_gst_main").hide();
                $(".BillingFrom_gst_main").find(".err").remove();

                $("#edit_BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                $("#edit_BillFromAddress_street").html("<span>"+data.address+"</span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#edit_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#edit_BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#edit_BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                if(data.gst_num){
                    $("#edit_BillFromAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                    // Enabled item level GST fields
                    $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                    // Enabled estimate level GST fields
                    $("#edit_estimateModal #Calculate_discounts .CGST_TR_section").next().show();

                    $("#Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");
                }
                else
                {
                    estimate_disabled_all_gst_fields_edit();
                }

                if(data.panno){
                    $("#edit_BillFromAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                if(data.udyam_registration_no){
                    $("#edit_BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }
                // Hidden fields to post the data
                $("#edit_BillFromAddress_name").append("<input type='hidden' name='billfromname' id='edit_billfromname' value='"+data.name+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_street' id='edit_billing_address_street' value='"+data.street+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_city' id='edit_billing_address_city' value='"+data.city+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_state' id='edit_billing_address_state' value='"+data.state+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billing_address_postal_code' id='edit_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddressgstin' id='edit_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingaddresspanno' id='edit_billingaddresspanno' value='"+data.panno+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingemailaddress' id='edit_billingemailaddress' value='"+data.emailid+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingphoneno' id='edit_billingphoneno' value='"+data.phoneno+"' />");
                $("#edit_BillFromAddress_street").append("<input type='hidden' name='billingfrom_udyamno' id='edit_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else if(data.total_gst > 1)
            {
                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails_dropdown").show();
                $(".BillingFromGSTDetails").hide();
                $("#edit_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#edit_BillingFrom_gstno").append(data.str_opt);
                $("#edit_BillingFrom_gstno").customA11ySelect('refresh');
            }
            else
            {
                $(".BillingFrom_gst_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $(".BillingFromGSTDetails").hide();
                $("#edit_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#edit_BillingFrom_gstno").customA11ySelect('refresh');
            }
         }
         else
         {
            $(".BillingFrom_gst_main").hide();
            $(".BillingFromGSTDetails_dropdown").hide();
            $(".BillingFromGSTDetails").hide();
            $("#edit_BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
            $("#edit_BillingFrom_gstno-menu").customA11ySelect('refresh');
         }
      }
    });
});

function estimate_disabled_all_gst_fields_edit()
{
    // For item level GST type dropdown
    $('option:selected', $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".Calculate_IGSTandCGST").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST type fields plugin
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For item level GST rate dropdown
    $('option:selected', $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".DiscountPer").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST rate fields plugin
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_participantTable .edit_participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For hiding delete icon
    $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".estimate_remove_adddiscount").hide();
    
    // For hiding SGST row
    $("#edit_participantTable .edit_participantRow .SGST_Discount").hide();
    
    // For hiding hidden fields
    $(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    // For label of GST values
    $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".main_amount").html("");
    $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".main_amount").html("₹ 0000.00");

    $("#estimate_summary_value").val(2);

    // Disabled item level GST fields
    $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee","opacity":"1", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
    
    // Disabled estimate level GST fields
    $('option:selected', $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find("#edit_Calculate_IGSTandCGST_select").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For estimate level GST type fields plugin
    $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For estimate level GST rate dropdown
    $('option:selected', $("#edit_Calculate_discounts .CGST_TR_section").find("#edit_Calculate_rate").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For estimate level GST rate field plugin
    $("#edit_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#edit_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For estimate level gst hidden fields
    $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    
    // Hide estimate level SGST row
    $("#edit_Calculate_discounts .SGST_Discount").hide();

    // For estimate level GST values label
    $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").html("");
    $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").html("₹ 0000.00");
    // For estimate level delete icon hide
    $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").hide();

    // For estimate level GST fields disable
    $("#edit_Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});

    $("#edit_estimate_items_gst_type_selected").val(0);
    $("#edit_estimateModal #edit_Calculate_discounts .CGST_TR_section").show();
}

$(document).on("change", "#updateEstimateForm #edit_BillingFrom_gstno", function(){
    var sel_id = $('#edit_BillingFrom_gstno option:selected').data('id');
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
                    $(".diff_gst_number").show();
                    $(".diff_billing_entity").hide();
                }
                else if(data.total_entities > 1){
                    $(".diff_gst_number").hide();
                    $(".diff_billing_entity").show();
                }
                else if(data.total_entities == 1 && data.total_gst_nums == 1){
                    $(".diff_gst_number").hide();
                    $(".diff_billing_entity").hide();
                }
                $("#edit_BillingFromAddress").remove(); 
                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails").show();
                $(".BillingFrom_address_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $("#edit_BillFromGST_name").html("<span><b>"+data.name+"</b></span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#edit_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#edit_BillFromGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#edit_BillFromGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                $("#edit_BillFromGST_street").html("<span>"+data.address+"</span>");
                $("#edit_BillFromGST_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                $("#edit_BillFromGST_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                if(data.udyam_registration_no){
                    $("#BillFromGST_state").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }
                
                // Hidden fields to post the data
                $("#edit_BillFromGST_name").append("<input type='hidden' name='billfromname' id='edit_billfromname' value='"+data.name+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billing_address_street' id='edit_billing_address_street' value='"+data.street+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billing_address_city' id='edit_billing_address_city' value='"+data.city+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billing_address_state' id='edit_billing_address_state' value='"+data.state+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billing_address_postal_code' id='edit_billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billingaddressgstin' id='edit_billingaddressgstin' value='"+data.gst_num+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billingaddresspanno' id='edit_billingaddresspanno' value='"+data.panno+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billingemailaddress' id='edit_billingemailaddress' value='"+data.emailid+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billingphoneno' id='edit_billingphoneno' value='"+data.phoneno+"' />");
                $("#edit_BillFromGST_street").append("<input type='hidden' name='billingfrom_udyamno' id='edit_billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else
            {
                $(".BillingFromGSTDetails").hide();
            }
        }
    });
});

// Scripts for Billed to
$(document).on("change", "#updateEstimateForm #edit_BillingTo_addr", function(){
    var sel_id = $('#edit_BillingTo_addr option:selected').data('id');
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
                    $("#edit_BillingToAddress").remove();
                    $(".BillingTo_address_main").hide();
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToAddress").show();
                    // alert(data.total_accounts+" === "+data.total_gst_nums);
                    if(data.total_accounts == 1 && data.total_gst_nums > 1){
                        $(".diff_customer_gst").show();
                        $(".diff_customer_link").hide();
                    }
                    else if(data.total_accounts > 1){
                        $(".diff_customer_gst").hide();
                        $(".diff_customer_link").show();
                    }
                    else if(data.total_accounts == 1 && data.total_gst_nums == 1){
                        $(".diff_customer_gst").hide();
                        $(".diff_customer_link").hide();
                    }

                    $("#edit_BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#edit_BillToAddress_street").html("<span>"+data.address+"</span>");
                    $("#updateEstimateForm .BillingTo_gst_main").find(".err").remove();

                    if(data.emailid!="" && data.phoneno!=""){
                        $("#edit_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#edit_BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#edit_BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                    }

                    if(data.gst_num){
                        $("#edit_BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                    }
                    if(data.panno){
                        $("#edit_BillToAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                    }
                    if(data.udyam_registration_no!=""){
                        $("#edit_BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                    }
                    // Hidden fields to post the data
                    $("#edit_BillToAddress_name").append("<input type='hidden' name='billtoname' id='edit_billtoname' value='"+data.name+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shipping_address_street' id='shipping_address_street' value='"+data.street+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shipping_address_city' id='shipping_address_city' value='"+data.city+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shipping_address_state' id='shipping_address_state' value='"+data.state+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shipping_address_postal_code' id='shipping_address_postal_code' value='"+data.postal_code+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shippingaddressgstin' id='shippingaddressgstin' value='"+data.gst_num+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shippingaddresspanno' id='shippingaddresspanno' value='"+data.panno+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shippingaddressemailid' id='shippingaddressemailid' value='"+data.emailid+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='shippingaddresshphoneno' id='shippingaddresshphoneno' value='"+data.phoneno+"' />");
                    $("#edit_BillToAddress_street").append("<input type='hidden' name='billingto_udyamno' id='billingto_udyamno' value='"+data.udyam_registration_no+"' />");
                }
                else if(data.total_gst > 1)
                {
                    $(".BillingTo_gst_main").show();
                    $(".BillingToGSTDetails").hide();
                    $(".BillingToGSTDetails_dropdown").show();
                    $("#edit_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#edit_BillingTo_gstno").append(data.str_opt);
                    $("#edit_BillingTo_gstno").customA11ySelect('refresh');
                }
                else
                {
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToGSTDetails_dropdown").hide('refresh');
                    $(".BillingToGSTDetails").hide();
                    $("#edit_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#edit_BillingTo_gstno").customA11ySelect();
                }
            }
            else
            {
                $(".BillingTo_gst_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $(".BillingToGSTDetails").hide();
                $("#edit_BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#edit_BillingTo_gstno").customA11ySelect('refresh');
            }
      }
    });
});

$(document).on("change", "#updateEstimateForm #edit_BillingTo_gstno", function(){
    var sel_id = $('#edit_BillingTo_gstno option:selected').data('id');
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
                $("#BillingToAddress_edit").hide();
                $("#edit_BillingToAddress").remove();
                
                $(".BillingTo_gst_main").show();
                $(".BillingToGSTDetails").show();
                
                if(data.total_accounts == 1 && data.total_gst_nums > 1){
                    $(".diff_customer_gst").show();
                    $(".diff_customer_link").hide();
                }
                else if(data.total_accounts > 1){
                    $(".diff_customer_gst").hide();
                    $(".diff_customer_link").show();
                }
                else if(data.total_accounts == 1 && data.total_gst_nums == 1){
                    $(".diff_customer_gst").hide();
                    $(".diff_customer_link").hide();
                }
                
                $(".BillingTo_address_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $("#edit_BillToGST_name").html("<span><b>"+data.name+"</b></span>");
                $("#edit_BillToGST_address").html("<span>"+data.address+"</span>");
                $("#updateEstimateForm .BillingToGSTDetails_dropdown").find(".err").remove();

                if(data.emailid!="" && data.phoneno!=""){
                    $("#edit_BillToGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#edit_BillToGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#edit_BillToGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }
                $("#edit_BillToGST_gst").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                if(data.panno!=""){
                    $("#edit_BillToGST_pan").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                if(data.udyam_registration_no!=""){
                    $("#edit_BillToGST_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#edit_BillToGST_name").append("<input type='hidden' name='billtoname' id='edit_billtoname' value='"+data.name+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_street' id='edit_shipping_address_street' value='"+data.street+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_city' id='edit_shipping_address_city' value='"+data.city+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_state' id='edit_shipping_address_state' value='"+data.state+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shipping_address_postal_code' id='edit_shipping_address_postal_code' value='"+data.postal_code+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddressgstin' id='edit_shippingaddressgstin' value='"+data.gst_num+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddresspanno' id='edit_shippingaddresspanno' value='"+data.panno+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddressemailid' id='edit_shippingaddressemailid' value='"+data.emailid+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='shippingaddresshphoneno' id='edit_shippingaddresshphoneno' value='"+data.phoneno+"' />");
                $("#edit_BillToGST_address").append("<input type='hidden' name='billingto_udyamno' id='edit_billingto_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else
            {
                $(".BillingToGSTDetails").hide();
            }
        }
    });
});

// On change event of discount type  i.e Percentage or Amount (item level)
$(document).on('change','#updateEstimateForm #edit_participantTable .Estimate_Percentage',function(event){

    event.preventDefault();
    event.stopImmediatePropagation();
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_amt = 0;
    var selected_gst_type = $(this).closest('tr').next().find('.GST_section .custom-a11yselect-btn .custom-a11yselect-text').text();
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    var amt_val = $(this).closest('tr').prev().prev().find("input[name='edit_item_main_amount[]']").val();

    var cur_rate_html=$(this).closest("tr").find(".rate");
    var cur_rate_val=$(this).closest("tr").find(".rate").val(); 

    /*if(a=='Percentage')
    {
        edit_Percentage_validation_estimate(cur_rate_html,cur_rate_val,amt_val);
    }
    else if(a=='Amount')
    {
        edit_Amount_validation_estimate(cur_rate_html, cur_rate_val, parseFloat(amt_val));
    }*/

    var edit_extimate_count = 0;
    var edit_extimate_count1 = 0;

    if(a=='Percentage')
    {
        if(edit_extimate_count == 0)
        {
            edit_extimate_count = edit_Percentage_validation_estimate(cur_rate_html,cur_rate_val,amt_val,edit_extimate_count);
        }
    }
    else if(a=='Amount')
    {
        if(edit_extimate_count1 == 0)
        {

            edit_extimate_count1 = edit_Amount_validation_estimate(cur_rate_html, cur_rate_val, parseFloat(amt_val),edit_extimate_count1);
        }
    }
    
    // Estimate level GST
    var selected_gst_type_estimates = $("#edit_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per_estimates = $("#edit_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var split_tax_estimate = selected_gst_per_estimates / 2;

    var est_val_flag = 0;
    var estimate_value = 0;
    
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
    
    if(a!="Select Type")
    {   
        $("#edit_estimate_calculated_disc_amt, #edit_estimate_disc_amt").val(0);

        $("#edit_Calculate_discounts .discount_section").closest("tr").hide();

        $("#edit_Calculate_discounts").find(".discount_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");


        /*$("#edit_Estimate_Percentage_select-button .custom-a11yselect-text").text('');
        $("#edit_Estimate_Percentage_select-button .custom-a11yselect-text").text('Select Type');
        
        $("#edit_Estimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused");
        $("#edit_Estimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-selected");*/

        $("#edit_Calculate_discounts .discount_section").closest("tr").find('.estimate_remove_adddiscount').hide();
        $("#edit_Calculate_discounts .discount_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#edit_Calculate_discounts .discount_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#edit_Calculate_discounts .discount_section").closest("tr").find('.estimate_sgst_amount').val(0);
        $("#edit_Calculate_discounts .discount_section").closest("tr").find('.main_amount').text("₹ 0000.00");

        $(this).closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        /*var new_cal = 0;
        //var total_disc_amt = $("#edit_estimate_calculated_disc_amt").val();
        if(a=="Percentage")
        {
            var cur_rate_html=$(this).closest("tr").find(".rate");
            var cur_rate_val=$(this).closest("tr").find(".rate").val();
            edit_Percentage_validation(cur_rate_html,cur_rate_val);

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = (cur_rate_val/100) * amt_val;
            }
            else{
                $(this).closest('tr').find(".main_amount").text("");
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
            }
            
            if(selected_gst_type!="Select Type")
            {
                if(selected_gst_type == 'IGST')
                {
                    var amt_after_discount = amt_val - disc_amt;
                    new_cal = (selected_gst_per * amt_after_discount)/100;
                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);

                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST')
                {
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }

                if(selected_gst_per!=0)
                {
                    $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else {
                    $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                }
            }
            else if(selected_gst_type_estimates!="Select Type")
            {
                var amt_after_discount = amt_val - disc_amt;
                if(selected_gst_type_estimates == 'IGST')
                {
                    new_cal = (selected_gst_per_estimates * amt_after_discount)/100;
                    $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);

                    $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#edit_Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(selected_gst_type_estimates == 'CGST'){
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax_estimate * new_cal_amt)/100;
                    $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                    $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                }
                // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(disc_amt);
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                $("#edit_Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else{
                $(this).closest("tr").next().find(".main_amount").text("");
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }
        if(a=="Amount")
        { 
            var cur_rate_val=$(this).closest("tr").find(".rate").val();

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = cur_rate_val;
            }
            else{
                disc_amt = amt_val;
                $(this).closest('tr').find(".main_amount").text("");
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
            }

            if(selected_gst_type != "Select Type")
            {
                if(selected_gst_type == 'IGST'){
                    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var new_cal = (selected_gst_per * disc_amt)/100;

                    if(selected_gst_per!=0)
                    {
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else {
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                    }

                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * disc_amt)/100;

                    if(cur_rate_val!=0){
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else{
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                    }

                    $(this).closest("tr").next().find(".item_igst_amount").val(0);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }
            }
            else if(selected_gst_type_estimates != "Select Type"){
                if(disc_amt == 0) disc_amt = amt_val;
                if(selected_gst_type_estimates == 'IGST'){
                    var new_cal = (selected_gst_per_estimates * disc_amt)/100;
                    $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);

                    $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#edit_Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
                }
                if(selected_gst_type_estimates == 'CGST'){
                    var new_cal = (split_tax_estimate * disc_amt)/100;
                    $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                    $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                }
                // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val);
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                $("#edit_Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else{
                $(this).closest("tr").next().find(".main_amount").text("");
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }  
        $(this).closest('tr').find(".main_amount").text("");
        if(a=="Amount"){
            if(cur_rate_val){
                $(this).closest('tr').find(".main_amount").text("₹ "+cur_rate_val+".00");
            }
            else{
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
            }
            $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+cur_rate_val+"'>");
        }
        if(a=="Percentage"){
            if(cur_rate_val){
                $(this).closest('tr').find(".main_amount").text("₹ "+disc_amt.toFixed(2));
            }
            else {
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').next().find(".main_amount").text("₹ 0000.00");
            }
            $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+disc_amt+"'>");
        }*/

        $("#edit_estimate_items_discount_selected").val(1);

    }
    else
    {
        $("#edit_estimate_items_discount_selected").val(0);
        var new_cal = 0;
        /*if(selected_gst_type!="Select Type"){
            if(selected_gst_type == 'IGST'){
                new_cal = (selected_gst_per * amt_val)/100;
                $(this).closest("tr").find(".item_igst_amount").val(new_cal);
            }
            if(selected_gst_type == 'CGST'){
                new_cal = (split_tax * amt_val)/100;
                $(this).closest("tr").find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal);            
        }
        else if(selected_gst_type_estimates != "Select Type"){
            var cal_amt = parseFloat($("#edit_total_estimate_value").val()) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
            if(selected_gst_type_estimates == 'IGST'){
                new_cal = (selected_gst_per_estimates * cal_amt)/100;
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
            }
            if(selected_gst_type_estimates == 'CGST'){
                new_cal = (split_tax_estimate * cal_amt)/100;
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
            }
            new_cal = new_cal.toFixed(2);
            $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
            $("#edit_Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $(this).closest("tr").find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
        }*/
        /*$(this).closest('tr').find(".main_amount .calculated_discount").remove();*/
        $(this).closest('tr').find(".main_amount").text("") ;
        $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".estimate_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");

        // If any items discount dropdown selected as Select Type then show database record if present
        $("#edit_Calculate_discounts .discount_section").closest("tr").show();
        if($("#hidden_estimate_discount_type").val() != '' || $("#hidden_estimate_discount_type").val() != "Select Type"){
            var discounttypeVal = $("#hidden_estimate_discount_type").val();
            $("#edit_Estimate_Percentage_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $("#edit_Estimate_Percentage_select-button .custom-a11yselect-text").text(discounttypeVal);
            $("#edit_Estimate_Percentage_select-menu li[data-val='"+discounttypeVal+"']").addClass("custom-a11yselect-focused");
            $("#edit_Estimate_Percentage_select-menu li[data-val='"+discounttypeVal+"']").addClass("custom-a11yselect-selected");
        }
        if($("#hidden_estimate_discount_rate").val()!="" || $("#hidden_estimate_discount_rate").val()!=0){
            // $("#edit_estimate_disc_amt").removeAttr("value");
            // $("#edit_estimate_disc_amt").attr("value", $("#hidden_estimate_discount_rate").val());
            $("#edit_estimate_disc_amt").val($("#hidden_estimate_discount_rate").val());
            $("#edit_estimate_calculated_disc_amt").attr("value", $("#hidden_estimate_discount_rate").val());
            var show_val = $("#edit_estimate_calculated_disc_amt").val();
            $("#edit_Calculate_discounts .discount_section").closest("tr").find('.main_amount').text("₹ "+show_val+".00");
            estimate_value = parseFloat($("#edit_total_estimate_value").val()) - parseFloat($("#hidden_estimate_discount_rate").val());
            est_val_flag = 1;
        }

        reset_edit_estimate_level_discount_details();
        
        
    }
    /*var t = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(t, 1);
    $("#edit_total_estimate_value").val(0);
    if(est_val_flag == 0){
        if($("#edit_estimate_calculated_disc_amt").val()){
            t = parseFloat(t) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
        } alert("Hello: "+t);
        $("#edit_total_estimate_value").val(t);
    }
    else {
        if($("#edit_estimate_calculated_disc_amt").val()){
            estimate_value = parseFloat(estimate_value) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
        }
        $("#edit_total_estimate_value").val(estimate_value);
    }*/
    for_hiding_edit_estimate_level_percentage();
    edit_estimate_remove_panel_color();

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit(this);
});

// Remove color when for any item both discount & gst is selected
function edit_estimate_remove_panel_color()
{
    // alert("hehehe");
    var items_selected_disc = $("#edit_estimate_items_discount_selected").val();
    var items_selected_gst = $("#edit_estimate_items_gst_type_selected").val();
    if(items_selected_disc == 1 && items_selected_gst == 1){
        $("#edit_estimateModal #edit_estimate_calculation .panel-heading").addClass("remove-panel-color");
    }
    else
    {
        $("#edit_estimateModal #edit_estimate_calculation .panel-heading").removeClass("remove-panel-color");

    }
}

// On change event of GST type (item level)
$(document).on("change", "#updateEstimateForm #edit_participantTable .Estimate_IGSTandCGST", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();

    var a = $(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type")
    {
        $("#edit_Calculate_discounts .CGST_TR_section").hide();
        $("#edit_Calculate_discounts .CGST_TR_section").find('.estimate_remove_adddiscount').hide();
        $("#edit_Calculate_discounts .SGST_Discount").hide();
        $("#edit_Calculate_discounts .SGST_Discount").find('.estimate_remove_adddiscount').hide();

        $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_sgst_amount').val(0);

        $("#edit_Calculate_discounts .CGST_TR_section").find('.main_amount').text("₹ 0000.00");
        $("#edit_Calculate_discounts .CGST_TR_section").find('.main_amount').text("");
        $("#edit_Calculate_discounts .SGST_Discount").find('.main_amount').text("");
        $("#edit_Calculate_discounts .SGST_Discount").find('.main_amount').text("₹ 0000.00");

        $("#edit_items_selected_gst_type").val("");
        $("#edit_items_selected_gst_type").val(a);

        // $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
        // $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text(a);
        // $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        // $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-menu li[data-val='"+a+"']").addClass("custom-a11yselect-focused custom-a11yselect-selected");
        
        var element=$("#edit_Calculate_discounts .CGST_TR_section");
       
        // Estimate level GST dropdown
        $("#edit_Calculate_discounts .CGST_TR_section .GST_section ").find(".custom-a11yselect-text").text('');

        $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-text").text('Select Type');
       
        $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_IGSTandCGST_select-option-0');

        $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

        $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        $("#edit_Calculate_discounts .CGST_TR_section .main_amount").text("₹ 0000.00");
        $("#edit_Calculate_discounts .CGST_TR_section ").next().find(".main_amount").text("₹ 0000.00");

        // Estimate level GST rate dropdown
        $("#edit_Calculate_discounts .CGST_TR_section #edit_Calculate_rate-button .custom-a11yselect-text").text('');
        $("#edit_Calculate_discounts .CGST_TR_section #edit_Calculate_rate-button .custom-a11yselect-text").text('0%');
        $("#edit_Calculate_discounts .CGST_TR_section  .rate_data #edit_Calculate_rate-button").attr('aria-activedescendant','edit_Calculate_rate-option-0');

        $("#edit_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#edit_Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        var curr_tax = $(this).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        // var main_amount = 0;
        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;

        // var len = $("#edit_participantTable .edit_participantRow .main-group").length;
        var len = $("#edit_total_items").val();
        var main_amount = 0;
        for(var s=0;s<len;s++)
        {
            var n = $(this).closest("#edit_participantTable .edit_participantRow").find(".main-group").eq(s);
            var curr_tax = n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
            if(m == 'IGST'){
                $("#edit_participantTable .edit_participantRow .SGST_Discount").hide();

                main_amount = n.find(".main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
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
                n.next().next().next().find(".main_amount").text("");
                if(curr_tax!=0){
                    n.next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                }
                else {
                    n.next().next().next().find(".main_amount").text("₹ 0000.00");
                }
                n.next().next().next().find(".item_cgst_amount").val(0);
                n.next().next().next().find(".item_sgst_amount").val(0);
                n.next().next().next().find(".item_igst_amount").val(calculated_tax_amt);
            }
            if(m == 'CGST'){
                $("#edit_participantTable .edit_participantRow .SGST_Discount").show();

                main_amount = n.find(".main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().next().find(".calculated_discount").val();
                var split_tax = curr_tax / 2;
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
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
                // alert("1. main_amount: "+main_amount+" === curr_tax: "+curr_tax+" === calculated_disc: "+calculated_disc+" === disc_type: "+disc_type+" === calculated_tax_amt: "+calculated_tax_amt);

                if(curr_tax!=0){
                    n.next().next().next().find(".main_amount").text("");
                    n.next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                    n.next().next().next().next().find(".main_amount").text("");
                    n.next().next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                }
                else {
                    n.next().next().next().find(".main_amount").text("");
                    n.next().next().next().find(".main_amount").text("₹ 0000.00");
                    n.next().next().next().next().find(".main_amount").text("");
                    n.next().next().next().next().find(".main_amount").text("₹ 0000.00");
                }

                n.next().next().next().find(".item_cgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_sgst_amount").val(calculated_tax_amt);
                n.next().next().next().find(".item_igst_amount").val(0);
            }
            n.next().next().next().find(".estimate_remove_adddiscount").show();
        }

        $("#edit_estimate_items_gst_type_selected").val(1);

    }
    else{
        $("#edit_estimate_items_gst_type_selected").val(0);

        $("#participantTable .CGST_TR_section").closest("tr").find('.item_igst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_cgst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_sgst_amount').val(0);

        var element=$("#edit_Calculate_discounts .CGST_TR_section").closest("tr");
        // First GST rate field
        var element1=element.find(".rate_data");
        var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
        var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

        // for CGST field
        var element2=element.find(".GST_section");
        element.find(".main_amount").text("₹ 0000.00");
        var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
        var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
        ResetDiscount(element2,cur_id,cur_text);

        $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("");
        $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
        $("#edit_participantTable .edit_participantRow .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        var len = $("#edit_total_items").val();
        for(var m=0;m<len;m++){
            $("#edit_participantTable .edit_participantRow .SGST_Discount").hide();

            var n = $(this).closest("#edit_participantTable .edit_participantRow").find(".main-group").eq(m);
            // console.log(n.next().next().find(".item_cgst_amount").html());
            n.next().next().next().find(".item_cgst_amount").val(0);
            n.next().next().next().find(".item_sgst_amount").val(0);
            n.next().next().next().find(".item_igst_amount").val(0);

            n.next().next().find(".estimate_remove_adddiscount").hide();
        }

        $(this).closest("tr").find(".main_amount").text("");
        $(this).closest("tr").find(".main_amount").text("₹ 0000.00"); 
        $(this).closest("tr").next().find(".main_amount").text("");
        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
        //$("#Calculate_IGSTandCGST_select").closest("tr").show();
        $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
        $("#edit_Calculate_discounts .SGST_Discount").closest("tr").show();

        // Estimate level Discount dropdown
        $("#edit_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('');
        $("#edit_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text('Select Type');
        $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        $("#edit_Calculate_discounts .SGST_Discount").hide();
        
        // Estimate level Discount rate dropdown
        $("#edit_Calculate_rate-button .custom-a11yselect-text").text('');
        $("#edit_Calculate_rate-button .custom-a11yselect-text").text('0%');
        $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
        if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
            var gsttypeVal = ($("#hidden_estimate_gst_type").val()!="") ? $("#hidden_estimate_gst_type").val() : "Select Type";
            if(gsttypeVal == 'CGST'){
                $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
                $("#edit_SGST_Calculate").show();
                var cgst = $("#hidden_estimate_cgst_amt").val();
                var sgst = $("#hidden_estimate_sgst_amt").val();
                var cgst_label = $("#hidden_estimate_cgst_label").val();
                var sgst_label = $("#hidden_estimate_sgst_label").val();
                $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").text("₹ "+cgst_label);
                $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+sgst_label);

                $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
                $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
                $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
                $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".estimate_remove_adddiscount").show();
            }
            else {
                $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
                $("#edit_SGST_Calculate").hide();
                var igst_label = $("#hidden_estimate_igst_label").val();
                var igst = $("#hidden_estimate_igst_amt").val();
                $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+igst_label);

                $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
                // $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
            }
            $("#edit_Calculate_IGSTandCGST_select-selected").text('');
            $("#edit_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
        }
        if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
            var gstrateVal = $("#hidden_estimate_gst_rate").val();
            $("#edit_Calculate_rate-selected").text('');
            $("#edit_Calculate_rate-selected").text(gstrateVal+"%");
            $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
            $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
        }
        // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 

        $("#edit_items_selected_gst_type").val("");
    }
    for_hiding_edit_estimate_level_GST();
    edit_estimate_remove_panel_color();
});

// On change event of GST rate (item level)
$(document).on("change", "#updateEstimateForm #edit_participantTable .DiscountPer", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();
    
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type")
    {
        // var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount = 0;
        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;
        
        var len = $("#edit_total_items").val();
        for(var s=0;s<len;s++)
        {
            var n = $(this).closest("#edit_participantTable .edit_participantRow").find(".main-group").eq(s);
            var curr_tax = n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();

            if(a == 'IGST')
            {
                $("#edit_participantTable .edit_participantRow .SGST_Discount").hide();

                main_amount = n.find(".main_amount").val();
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
                $("#edit_participantTable .edit_participantRow .SGST_Discount").show();

                main_amount = n.find(".main_amount").val();
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
            n.next().next().next().find(".main_amount").text("");
            n.next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            n.next().next().next().next().find(".main_amount").text("");
            n.next().next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }*/

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();
});

// Remove button clicked in front of amount (item level)
$(document).on('click','#edit_estimateModal .edit_participantRow .estimate_remove',function(){
    // alert("hehehe");
    
    var checked = $(this).closest("tr").find(".sub_checkbox");

    var no = $("#check_sub_checkboxes_cnt").val();

    if(checked.prop("checked"))
    {
        $("#check_sub_checkboxes_cnt").val(no - 1 );
    }

    var main_len = $('#edit_total_items').val();

    var ele = $(this).closest("tr");
    ele.next().next().remove(); // for discount
    ele.next().next().remove(); // for CGST
    ele.next().next().remove(); // for sgst
    ele.remove(); // for main item desc

    var cur_len = main_len-1 ;

    $('#edit_total_items').val(cur_len);

    var main_length = $('#edit_total_items').val();

    // console.log("main_length "+main_length);
    
    for(var g=0;g<main_length;g++)
    {
        var s=g+1;
        $(".edit_participantRow .main-group").eq(g).find(".sno").html(s);
        // console.log("main_length "+g);

    }

    if(cur_len == 0)
    {
        $(".edit_participantRow").append(estimate_items_add_row);
        $("#edit_estimateModal .Estimate_Percentage").customA11ySelect();
        $("#edit_estimateModal .Estimate_IGSTandCGST").customA11ySelect();
        $("#edit_estimateModal .DiscountPer").customA11ySelect();
        reset_edit_estimate_level_discount_details();
        reset_edit_estimate_level_gst_details();

        $('#edit_total_items').val(1);
    }

    

    var len = $("#check_sub_checkboxes_cnt").val();
    // alert(len);
    
    if(len == 0)
    {
        $("#edit_estimateModal .header_delete").css("display","none");
        $("#edit_estimateModal .header_checkbox").prop("checked",false);
    }


    for_hiding_edit_estimate_level_percentage();
    for_hiding_edit_estimate_level_GST();
    edit_estimate_remove_panel_color();


    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();

    // $(this).closest("tr").find("input").val("");
    // var len = $("#edit_participantTable .edit_participantRow .main-group").length;
    // var len_edit = $("#edit_total_items").val();

    // for(k=0;k<len_edit;k++)
    // {
    //     if($("#edit_total_items").val()!=1){
    //         var row_element = $(this).closest("tr").eq(k);
    //         row_element.next().next().next().next().remove();
    //         row_element.next().next().next().find(".CGST_TR_section").remove();
    //         row_element.next().next().remove();
    //         row_element.next().remove();
    //         row_element.remove();

    //     }
    //     else{

    //         $("#edit_estimateModal .sub_checkbox").prop("checked",false);

    //         var element = $(this).closest("tr").eq(k).next();
    //         element.next().find(".rate").val("");
    //         var id=element.next().find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=element.next().find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element,id,text_msg);

    //         element.next().next().find("input").val("");
    //         element.next().next().find(".main_amount .calculated_discount").val(0);
    //         element.next().next().find(".main_amount").text("₹ 0000.00");
    //         element.next().next().find(".estimate_remove_discount").hide();
    //         element.next().next().next().find(".estimate_remove_adddiscount").hide();
    //         element.next().next().next().next().find(".estimate_remove_adddiscount").hide();

    //         element.next().next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    //         // First GST rate field
    //         var element1=element.next().next().find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         // for CGST field
    //         var element2=element.next().next().find(".GST_section");
    //         element.next().find(".main_amount").text("₹ 0000.00");
    //         var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element2,cur_id,cur_text);

    //         // for hide sgst row
    //         // element.next().next().next().hide();
    //     }
    // }
    // if(len_edit > 1){
    //     len_edit = len_edit - 1;
    //     $("#edit_total_items").val(len_edit);

    //     for(var g=0;g<len_edit;g++)
    //     {
    //         var s=g+1;
    //         $(".edit_participantRow .main-group").eq(g).find(".sno").html(s);
    //     }
    // }
    // $("#edit_items_selected_gst_type").val('');
    // $("#edit_edit_Calculate_discounts .discount_section").closest("tr").show();

    // var s = total_amount_for_estimate_level_discount_edit();
    // if(s){
    //     calculate_estimate_level_discount_edit(s);
    //     $("#edit_total_estimate_value").val(0);
    //     if($("#edit_estimate_calculated_disc_amt").val()){
    //         s = parseFloat(s) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    //     }
    //     $("#edit_total_estimate_value").val(s);
    // }
    // else{
    //     var estimate_element = $("#edit_Calculate_discounts");
    //     if(len_edit == 1){
    //         // Estimate level discount row reset
    //         $("#edit_estimate_disc_amt").val("");
    //         estimate_element.find(".main_amount").text("₹ 0000.00");
    //         var id=estimate_element.find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=estimate_element.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(estimate_element,id,text_msg);

    //         var element1=estimate_element.find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         //for hide sgst row
    //         estimate_element.find("#SGST_Calculate").hide();
    //         $("#edit_total_estimate_value, #edit_estimate_subtotal_amount, #edit_estimate_totaldiscount_amount, #edit_estimate_totaltaxes_amount, #edit_estimatetotal_amount").val(0);
    //         //$(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    //     else{
    //         var k = get_all_item_rows_main_total();
    //         calculate_estimate_level_discount_edit(k);
    //         $("#edit_total_estimate_value").val(0);
    //         $("#edit_total_estimate_value").val(k);
    //         //$(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    // }


    

});



function reset_edit_estimate_level_gst_details()
{
    $("#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

    $("#edit_Calculate_discounts .CGST_TR_section").next().hide();

    // Estimate level GST dropdown
    $("#edit_Calculate_discounts .GST_section ").find(".custom-a11yselect-text").text('');
    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-text").text('Select Type');
   
    // alert("success"+$("#edit_Calculate_discounts .GST_section .custom-a11yselect-text").text());
    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_IGSTandCGST_select-option-0');

    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // Estimate level GST rate dropdown
    
    $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('');

    $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('0%');

    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_rate-option-0');

    
    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    
    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#edit_Calculate_discounts .CGST_TR_section .main_amount ").text('');

    $("#edit_Calculate_discounts .CGST_TR_section .main_amount").text('₹ 0000.00');
    
    $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('');
    
    $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');

    $("#edit_Calculate_discounts .GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $("#edit_Calculate_discounts .GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $("#edit_Calculate_discounts .rate_data .DiscountPer option").removeAttr('selected');
    $("#edit_Calculate_discounts .rate_data .DiscountPer option[value='0']").attr('selected','selected');
}


function for_hiding_edit_estimate_level_GST()
{
    var len = $("#edit_total_items").val();
    var flag = 0 ;
    var arrr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".edit_participantRow .main-group").eq(v).next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arrr.push(selected_type) ;
          // console.log(selected_type);
        }

        
    }

    if(arrr.length == 0)
    {
        $("#edit_Calculate_discounts .CGST_TR_section").show();
        $("#edit_estimate_items_gst_type_selected").val(0);
    }
    else
    {
        $("#edit_Calculate_discounts .CGST_TR_section").hide();
        $("#edit_estimate_items_gst_type_selected").val(1);

    }
}

function for_hiding_edit_estimate_level_percentage()
{
    // var len = $(".edit_participantRow .main-group").length;
    var len = $("#edit_total_items").val();
    var flag = 0 ;
    var arr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".edit_participantRow .main-group").eq(v).next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arr.push(selected_type) ;
        }

        // console.log(selected_type);
        
    }
    // console.log(arr.length);
    if(arr.length == 0)
    {
        $("#edit_Calculate_discounts .discount_section").closest("tr").show();
        $("#edit_estimate_items_discount_selected").val(0);
        // reset_edit_estimate_level_discount_details();
    }
    else
    {
        $("#edit_Calculate_discounts .discount_section").closest("tr").hide();
        $("#edit_estimate_items_discount_selected").val(1);

    }
}

// Remove button clicked in front of SGST
$(document).on('click','#updateEstimateForm .SGST_Discount .estimate_remove_adddiscount',function(){
    // alert("hehehehe");

    $(".edit_participantRow").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(".edit_participantRow").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(".edit_participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".edit_participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');


    var len = $("#edit_participantTable .edit_participantRow .main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#edit_participantTable .edit_participantRow").find(".SGST_Discount").eq(k);
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

        // element.find(".main_amount").text("");
        // element.find(".main_amount").text("₹ 0000.00");
        // element.next().find(".main_amount").text("");
        // element.next().find(".main_amount").text("₹ 0000.00");

        element.prev().find(".item_igst_amount").val(0);
        element.prev().find(".item_cgst_amount").val(0);
        element.prev().find(".item_sgst_amount").val(0);

        element.find(".estimate_remove_adddiscount").css("display","none");
        
        // 5 oct 2020

        element.prev().find(".estimate_remove_adddiscount").css("display","none");

        $(this).closest(".edit_participantRow").find(".CGST_TR_section .main_amount").text("");
        $(this).closest(".edit_participantRow").find(".CGST_TR_section .main_amount").text("₹ 0000.00");
        $(this).closest(".edit_participantRow ").find(".CGST_TR_section").next().find(".main_amount").text("");
        $(this).closest(".edit_participantRow ").find(".CGST_TR_section").next().find(".main_amount").text("₹ 0000.00");
    }
    $("#edit_items_selected_gst_type").val("");
    $("#edit_estimate_summary_value").val(2);
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

        $("#edit_Calculate_discounts .CGST_TR_section").show();

        reset_edit_estimate_level_gst_details();
       
     //    $("#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

     //    $("#edit_Calculate_discounts .CGST_TR_section").next().hide();
     // // Estimate level GST dropdown
     //    $("#edit_Calculate_discounts .GST_section ").find(".custom-a11yselect-text").text('');
     //    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-text").text('Select Type');
       
     //    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_IGSTandCGST_select-option-0');

     //    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

     //    $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

     //    // Estimate level GST rate dropdown
        
     //    $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('');

     //    $("#edit_Calculate_discounts .rate_data .custom-a11yselect-text").text('0%');

     //    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_rate-option-0');

        
     //    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        
     //    $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

     //    $("#edit_Calculate_discounts .CGST_TR_section .main_amount ").text('');

     //    $("#edit_Calculate_discounts .CGST_TR_section .main_amount").text('₹ 0000.00');
        
     //    $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('');
        
     //    $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');
    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    // if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
    //     var gsttypeVal = $("#hidden_estimate_gst_type").val();
    //     if(gsttypeVal == 'CGST'){
    //         $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#edit_SGST_Calculate").show();
    //         var cgst = $("#hidden_estimate_cgst_amt").val();
    //         var sgst = $("#hidden_estimate_sgst_amt").val();
    //         var cgst_label = $("#hidden_estimate_cgst_label").val();
    //         var sgst_label = $("#hidden_estimate_sgst_label").val();
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").text("₹ "+cgst_label);
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+sgst_label);

    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".estimate_remove_adddiscount").show();
    //     }
    //     else {
    //         $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#edit_SGST_Calculate").hide();
    //         var igst_label = $("#hidden_estimate_igst_label").val();
    //         var igst = $("#hidden_estimate_igst_amt").val();
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+igst_label);

    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
    //     }
    //     if(gsttypeVal!=""){
    //         $("#edit_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
    //     }
    //     else
    //     {
    //         $("#edit_Calculate_IGSTandCGST_select-selected").text('');
    //         $("#edit_Calculate_IGSTandCGST_select-selected").text('Select Type');
    //         $("#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

    //     }
    //     $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
    //     $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    // }
    // if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
    //     var gstrateVal = $("#hidden_estimate_gst_rate").val();
    //     $("#edit_Calculate_rate-selected").text(gstrateVal+"%");
    //     $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
    //     $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    // }
    // ========== If any items GST dropdown selected as Select Type then show database record if present ==========

    // reset
    $("#edit_estimate_items_gst_type_selected").val(0);

    edit_estimate_remove_panel_color();
});

// Remove button clicked in front of discount (item level)
$(document).on('click','#updateEstimateForm #edit_participantTable .estimate_remove_discount',function(){
    var element=$(this).closest("tr");
    var disc_rate = element.find(".rate").val("");
    var id = element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg = element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".main_amount").text("₹ 0000.00");

    var main_amt = $(this).closest("tr").prev().find(".main_amount").val();
    var applied_tax = $(this).closest("tr").next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = $(this).closest("tr").next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;

    // $('option:selected', $(this).closest("tr").find(".Estimate_Percentage").val(text_msg)).attr('selected',true).siblings().removeAttr('selected');

    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").first().attr('selected','selected');


    if(tax_type!="Select Type")
    {
        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            $(this).closest('tr').next().next().find(".main_amount").text("₹ "+new_cal_amt.toFixed(2));
        }
        if(disc_rate!=""){
            $(this).closest('tr').next().find(".main_amount").text("₹ "+new_cal_amt.toFixed(2));
        }
        else {
            $(this).closest('tr').next().next().find(".main_amount").text("₹ 0000.00");
        }
        element.find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
    }
    else{
        element.next().find(".main_amount").text("");
        element.next().find(".main_amount").text("₹ 0000.00");
        element.next().next().find(".main_amount").text("");
        element.next().next().find(".main_amount").text("₹ 0000.00");
        element.find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");

        $("#edit_estimate_calculation #edit_Calculate_IGSTandCGST_select-selected").text("Select Type");
    }

    // cleared Estimate level discount dropdown
    $("#edit_Calculate_discounts .discount_section ").find(".custom-a11yselect-text").text('');
    $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-text").text('Select Type');
    // reset_edit_estimate_level_discount_details();

    // // cleared Estimate level discount dropdown
    // $("#edit_Calculate_discounts .discount_section ").find(".custom-a11yselect-text").text('');
    // $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-text").text('Select Type');
   
    // $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Estimate_Percentage_select-option-0');

    // $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    // $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // $("#edit_Calculate_discounts .discount_section").closest("tr").find(".estimate_remove_discount").css("display","none");

    

    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    // if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
    //     var gsttypeVal = $("#hidden_estimate_gst_type").val();
    //     if(gsttypeVal == 'CGST'){
    //         $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#edit_SGST_Calculate").show();
    //         var cgst = $("#hidden_estimate_cgst_amt").val();
    //         var sgst = $("#hidden_estimate_sgst_amt").val();
    //         var cgst_label = $("#hidden_estimate_cgst_label").val();
    //         var sgst_label = $("#hidden_estimate_sgst_label").val();
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").text("₹ "+cgst_label);
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+sgst_label);

    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".estimate_remove_adddiscount").show();
    //     }
    //     else {
    //         $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
    //         $("#edit_SGST_Calculate").hide();
    //         var igst_label = $("#hidden_estimate_igst_label").val();
    //         var igst = $("#hidden_estimate_igst_amt").val();
    //         $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+igst_label);

    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
    //         $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
    //     }
    //     $("#edit_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
    //     $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
    //     $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    // }
    // if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
    //     var gstrateVal = $("#hidden_estimate_gst_rate").val();
    //     $("#edit_Calculate_rate-selected").text(gstrateVal+"%");
    //     $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
    //     $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    // }

    /*var s = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(s);
    $("#edit_total_estimate_value").val(0);
    if($("#edit_estimate_calculated_disc_amt").val()){
        s = parseFloat(s) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(s);*/

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();

    //  for reset 
    $("#edit_estimate_items_discount_selected").val(0);
    reset_edit_estimate_level_discount_details();
    for_hiding_edit_estimate_level_percentage();
    edit_estimate_remove_panel_color();

});


function reset_edit_estimate_level_discount_details()
{
    // cleared Estimate level discount dropdown
    $("#edit_Calculate_discounts .discount_section ").find(".custom-a11yselect-text").text('');
    $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-text").text('Select Type');
   
    $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Estimate_Percentage_select-option-0');

    $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    $("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#edit_Calculate_discounts .discount_section").closest("tr").find(".estimate_remove_discount").css("display","none");

    $("#edit_Calculate_discounts .discount_section").closest("tr").find(".main_amount").text('');

    $("#edit_Calculate_discounts .discount_section").closest("tr").find("#edit_estimate_disc_amt").val('');
    
    $("#edit_Calculate_discounts .discount_section").closest("tr").find(".main_amount").text("₹ 0000.00");

    $("#edit_Calculate_discounts .discount_section .Estimate_Percentage option").removeAttr('selected');
    
    $("#edit_Calculate_discounts .discount_section .Estimate_Percentage option[value='Select Type']").attr('selected','selected');

}


// Remove button clicked in front of CGST (item level)
$(document).on('click','#updateEstimateForm #edit_participantTable .CGST_TR_section .estimate_remove_adddiscount',function(){

    $(".edit_participantRow").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(".edit_participantRow").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(".edit_participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".edit_participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    $("#edit_estimate_summary_value").val(2);

    var len = $("#edit_participantTable .edit_participantRow .main-group").length;
    for(k=0;k<len;k++)
    {
        var element = $(this).closest("#updateEstimateForm #edit_participantTable .edit_participantRow").find(".CGST_TR_section").eq(k);
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
        element.next().find(".main_amount").text("");
        element.next().find(".main_amount").text("₹ 0000.00");

        element.find(".item_igst_amount").val(0);
        element.find(".item_cgst_amount").val(0);
        element.find(".item_sgst_amount").val(0);

        $(this).css("display","none");
        //  5 oct 2020

        element.find(".estimate_remove_adddiscount").css("display","none");
    }
    $("#edit_items_selected_gst_type").val("");
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

    $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();

    reset_edit_estimate_level_gst_details();

    // $("#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

    // // Estimate level GST dropdown
    // $("#edit_Calculate_discounts .GST_section ").find(".custom-a11yselect-text").text('');
    // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-text").text('Select Type');
   
    // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','edit_Calculate_IGSTandCGST_select-option-0');

    // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    // $("#edit_Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // $("#edit_Calculate_discounts .SGST_Discount").hide();

    // // Estimate level GST rate dropdown
    // $("#edit_Calculate_rate-button .custom-a11yselect-text").text('0%');
    // $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    // $("#edit_Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // $("#edit_Calculate_discounts .CGST_TR_section .main_amount ").text('');

    // $("#edit_Calculate_discounts .CGST_TR_section .main_amount").text('₹ 0000.00');
    
    // $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('');
    
    // $("#edit_Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00')

    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 
    /*if($("#hidden_estimate_gst_type").val() != '' || $("#hidden_estimate_gst_type").val() != "Select Type"){
        var gsttypeVal = $("#hidden_estimate_gst_type").val();
        if(gsttypeVal == 'CGST'){
            $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#edit_SGST_Calculate").show();
            var cgst = $("#hidden_estimate_cgst_amt").val();
            var sgst = $("#hidden_estimate_sgst_amt").val();
            var cgst_label = $("#hidden_estimate_cgst_label").val();
            var sgst_label = $("#hidden_estimate_sgst_label").val();
            $("#edit_Calculate_discounts .CGST_TR_section").find(".main_amount").text("₹ "+cgst_label);
            $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+sgst_label);

            $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val(cgst);
            $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val(sgst);
            $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
            $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".estimate_remove_adddiscount").show();
        }
        else {
            $("#edit_Calculate_discounts .CGST_TR_section").closest("tr").show();
            $("#edit_SGST_Calculate").hide();
            var igst_label = $("#hidden_estimate_igst_label").val();
            var igst = $("#hidden_estimate_igst_amt").val();
            $("#edit_Calculate_discounts #edit_SGST_Calculate").find(".main_amount").text("₹ "+igst_label);

            $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val(igst);
            $("#edit_Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").show();
        }
        $("#edit_Calculate_IGSTandCGST_select-selected").text(gsttypeVal);
        $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-focused");
        $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='"+gsttypeVal+"']").addClass("custom-a11yselect-selected");
    }
    if($("#hidden_estimate_gst_rate").val()!="" || $("#hidden_estimate_gst_rate").val()!=0){
        var gstrateVal = $("#hidden_estimate_gst_rate").val();
        $("#edit_Calculate_rate-selected").text(gstrateVal+"%");
        $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-focused");
        $("#edit_Calculate_rate_select-menu li[data-val='"+gstrateVal+"']").addClass("custom-a11yselect-selected");
    }*/
    // ========== If any items GST dropdown selected as Select Type then show database record if present ========== 


    //  for reset
    $("#edit_estimate_items_gst_type_selected").val(0);
    edit_estimate_remove_panel_color();
});

// Calculation on estimate form
$(document).on("keyup", "#updateEstimateForm #edit_participantTable input[name='edit_item_qty[]']", function(e){
    
    item_qty_change_edit(this);

    var qty_val = $(this).val();
    var amt = 0;

    // Estimate level GST
    var est_selected_gst_type = $("#edit_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#edit_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    var rate_val = $(this).closest('.main-group').find("input[name='edit_item_rate[]']").val();
    if(rate_val == ""){
        $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(qty_val);
    }
    if(rate_val != ""){
        if(qty_val == ""){
          $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(rate_val);
          amt = rate_val;
        }
        else
        {
          amt = qty_val * rate_val;
          $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(amt);
        }
        // calculate_gst_amount_on_qty_rate_change_edit($(this), amt);
    }
    /*var t2 = total_amount_for_estimate_level_discount_edit(amt);
    calculate_estimate_level_discount_edit(t2);

    if(est_selected_gst_type != "Select Type")
    {
        // var new_cal_amt = amt_val - disc_amt;
        if(est_selected_gst_type == 'IGST')
        {
          var new_cal = (est_selected_gst_per * t2)/100;
          // Values into the hidden fields of igst
          $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
          $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (est_split_tax * t2)/100;
            // Values into the hidden fields of cgst & sgst
            $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
            $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(disc_amt);
        // $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
    }

    if($("#edit_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t2);*/

    cal_estimate_level_amts_edit();

    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").closest("td").find(".err").remove("");
    
    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#updateEstimateForm #edit_participantTable input[name='edit_item_rate[]']", function(){
    
    item_rate_change_edit(this);

    var rate_val = $(this).val();
    var qty_val = $(this).closest('.main-group').find("input[name='edit_item_qty[]']").val();
    var amt = 0;

    // Estimate level GST
    var est_selected_gst_type = $("#edit_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#edit_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    if(qty_val == ""){
        $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(rate_val);
    }
    if(qty_val != ""){
        if(rate_val == ""){
            $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(qty_val);
        }
        else if(rate_val != "")
        {
            if(rate_val){
                amt = qty_val * rate_val;
            }
            else{
                amt = qty_val;
            }
            $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").val(amt);
        }
        // calculate_gst_amount_on_qty_rate_change_edit($(this), amt);
    }

    /*var t3 = total_amount_for_estimate_level_discount_edit(amt);
    calculate_estimate_level_discount_edit(t3);

    if(est_selected_gst_type != "Select Type")
    {
        // var new_cal_amt = amt_val - disc_amt;
        if(est_selected_gst_type == 'IGST')
        {
          var new_cal = (est_selected_gst_per * t3)/100;
          // Values into the hidden fields of igst
          $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
          $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (est_split_tax * t3)/100;
            // Values into the hidden fields of cgst & sgst
            $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
            $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        // $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
    }

    if($("#edit_estimate_calculated_disc_amt").val()){
        t3 = parseFloat(t3) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t3);*/

    cal_estimate_level_amts_edit();

    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#updateEstimateForm #edit_participantTable .main_amount", function(){
    /*var amt = parseFloat($(this).val());
    calculate_gst_amount_on_qty_rate_change_edit($(this), amt);
    var s = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(s);
    $("#edit_total_estimate_value").val(0);
    $("#edit_total_estimate_value").val(s);*/

    var disc_rate_val = $(this).closest("tr").next().find(".rate").val();
    var disc_type_val = $(this).closest("tr").next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    
    if(!disc_rate_val && disc_type_val!="Select Type"){
        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
        $(this).closest('tr').next().find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
    }

    /*var amt = $(this).val();
    $("#edit_total_estimate_value").val(parseFloat(amt));
    if(amt != ""){
        calculate_gst_amount_on_qty_rate_change_edit($(this), amt);
    }
    var s = 'amount_change';
    var t3 = total_amount_for_estimate_level_discount_edit(amt, 1, s, disc_rate_val);
    calculate_estimate_level_discount_edit(t3);

    if($("#edit_estimate_calculated_disc_amt").val()){
        t3 = parseFloat(t3) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t3);*/

    check_qty_rate_edit(this);
    cal_estimate_level_amts_edit();

    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='edit_item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

/*$(document).on("keyup", "#edit_estimateModal #edit_participantTable .rate", function(){
    
    var disc_amt = 0;
    var disc_rate_val = $(this).val();
    var amt_val = $(this).closest('tr').prev().prev().find("input[name='edit_item_main_amount[]']").val();
    var drop_val = $(this).closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;

    // Estimate level GST
    var selected_gst_type_estimates = $("#edit_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per_estimates = $("#edit_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var split_tax_estimate = selected_gst_per_estimates / 2;

    cal_estimate_level_amts_edit(this);

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});*/

// Create estimate form validation
$(document).on("click", "#update_estimateBTN_new", function(event){
    // $('#updateEstimateForm').submit(function(event)
    // {   
        event.preventDefault();
        event.stopImmediatePropagation();

        var flag = true;
        // alert($('#edit_billfromname').length);
        // alert($('#edit_billtoname').length);
        if($('#edit_billfromname').length === 0)
        {
            var chk_fromaddr_element = $("#updateEstimateForm .BillingFrom_address_and_gst").find(".BillingFrom_address_main");
            var chk_fromaddr_element_val = chk_fromaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_fromgst_element = $("#updateEstimateForm .BillingFrom_address_and_gst").find(".BillingFrom_gst_main");
            var chk_fromgst_element_val = chk_fromgst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();

            var fromaddress_elem_val = check_dropdown_value_for_validation(chk_fromaddr_element_val);

            if(fromgst_elem_val == 'Select')
            {
                chk_fromaddr_element_val = 'Select Billing Entity';
            }

            var fromgst_elem_val = '';
            if(chk_fromgst_element.is(":visible")){
                fromgst_elem_val = check_dropdown_value_for_validation(chk_fromgst_element_val);
            }
            
            if(fromgst_elem_val == 'Select')
            {
                chk_fromgst_element_val = 'Select GSTIN';
            }
            
            if(chk_fromaddr_element.is(":visible") && chk_fromaddr_element_val=="Select Billing Entity")
            {
                $("#updateEstimateForm .BillingFrom_address_main").find(".err").remove();
                $("#updateEstimateForm #edit_Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#updateEstimateForm .BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");
            }
            if(chk_fromgst_element.is(":visible") && chk_fromgst_element_val=="Select GSTIN")
            {
                $("#updateEstimateForm .BillingFromGSTDetails_dropdown").find(".err").remove();
                $("#updateEstimateForm #edit_Address_Details").find(".BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $("#updateEstimateForm .BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_fromaddr_element.is(":visible") && !chk_fromgst_element.is(":visible"))
            {
                $(".BillingFromCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else if($('#updateEstimateForm input[name="estimate_date"]').val() == "")
        {
            $('input[name="estimate_date"]').closest("div").parent().find(".err").remove();
            $('input[name="estimate_date"]').css('border-color', '#ad4846');
            $('input[name="estimate_date"]').closest("div").parent().append("<span class='err text-danger'>Please enter estimate date</span>");
            flag = false;
        }
        else if($('#edit_billtoname').length === 0)
        {
            var chk_toaddr_element = $("#updateEstimateForm .BillingTo_address_and_gst").find(".BillingTo_address_main");

            var chk_toaddr_element_val = chk_toaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            // alert(chk_toaddr_element_val);
            var chk_togst_element = $("#updateEstimateForm .BillingTo_address_and_gst").find(".BillingTo_gst_main");
            var chk_togst_element_val = chk_togst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();

            var toaddress_elem_val = check_dropdown_value_for_validation(chk_toaddr_element_val);
            // alert("Inside "+toaddress_elem_val);
            if(toaddress_elem_val == 'Select')
            {
                chk_toaddr_element_val = 'Select Customer';
            }
            
            if(chk_togst_element.is(":visible")){
                var togst_elem_val = check_dropdown_value_for_validation(chk_togst_element_val);
            }
            
            if(togst_elem_val == 'Select')
            {
                chk_togst_element_val = 'Select GSTIN';
            }
            
            if(chk_toaddr_element.is(":visible") && chk_toaddr_element_val=="Select Customer")
            {
                $("#updateEstimateForm .BillingTo_address_main").find(".err").remove();
                $("#updateEstimateForm #edit_Address_Details_BillTo").find(".BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $("#updateEstimateForm .BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");
            }
            if(chk_togst_element.is(":visible") && chk_togst_element_val=="Select GSTIN")
            {
                $("#updateEstimateForm .BillingToGSTDetails_dropdown").find(".err").remove();
                $("#updateEstimateForm #edit_Address_Details_BillTo").find(".BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');  
                $("#updateEstimateForm .BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_toaddr_element.is(":visible") && !chk_togst_element.is(":visible"))
            {
                $(".BillingToCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else {
            var len = $("#edit_total_items").val();
            $(".err").remove();
            for(var s=0;s<len;s++)
            {
                var current=$("#edit_estimate_main_details .main-group").eq(s);
                if(current.find("input[name='edit_item_descr[]']").val() == '')
                {
                    current.find(".item_descr").closest("td").find(".err").remove();
                    current.find(".item_descr").css('border-color', '#ad4846');
                    current.find(".item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                    $("#edit_estimateModal").animate({ 
                        scrollTop:  $("input[name='edit_item_descr[]']").offset().top 
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
                if(current.find("input[name='edit_item_main_amount[]']").val() == '')
                {
                    current.find("input[name='edit_item_main_amount[]']").closest("td").find(".err").remove();
                    current.find("input[name='edit_item_main_amount[]']").css('border-color', '#ad4846');
                    current.find("input[name='edit_item_main_amount[]']").closest("td").append("<span class='err text-danger'>Please enter amount</span>");

                    $("#edit_estimateModal").animate({ 
                        scrollTop:  $("input[name='edit_item_main_amount[]']").offset().top 
                    }, 100);
                    
                    flag = false;
                }
            }
        }
        
        if(flag == false){
          return false;
        }
        else{
            $("#update_estimateBTN_new").attr("disabled", "disabled");
            
            var edit_estimate_summary_value = $("#edit_estimate_summary_value").val();
            var flag1 = true;
            $("#edit_summary_error").closest('.form-group').remove();
            var sectionOffset = $('#edit_CalculateBtn').offset();
            if(edit_estimate_summary_value == 0){
                $("<div class='form-group'><span id='edit_summary_error' style='color:#ad4846;'> Calculate estimate summary</span></div>").insertAfter("#edit_CalculateBtn .form-group");
                
                $("#edit_estimateModal").animate({ 
                    scrollTop:  $("#edit_CalculateBtn").offset().top 
                }, 100);
                
                flag1 = false;
            }
            else if(edit_estimate_summary_value == 2){
                $("<div class='form-group'><span id='edit_summary_error' style='color:#ad4846;'> Please recalculate estimate summary</span></div>").insertAfter("#edit_CalculateBtn .form-group");
                
                $("#edit_estimateModal").animate({ 
                    scrollTop:  $("#edit_CalculateBtn").offset().top 
                }, 100);

                flag1 = false;
            }

            if(flag1 == false){
                return false;
            }
            else{
                var formdata= $('#updateEstimateForm');
                var newFileEditEstFlag = 0;
                form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#edit_estimate_attachment')[0].files, function(i, file) {
                    form.append('attachment['+i+']', file);
                    newFileEditEstFlag = 1;
                });

                if(newFileEditEstFlag)
                {
                    $("#edit_estimateModal .email-blur-effect, #edit_estimateModal .email-loader").show();
                }
                  
                $.ajax({
                    type    : "POST",
                    url     : "../../client/res/templates/financial_changes/update_estimate.php",
                    dataType  : "json",
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data)
                    {
                        if(data.status == "true")
                        {
                            if(newFileEditEstFlag)
                            {
                                $("#edit_estimateModal .email-blur-effect, #edit_estimateModal .email-loader").hide();
                            }
                            $.confirm({
                                title: 'Success!',
                                content: data.msg,
                                buttons: {
                                    Ok: function () {
                                        $('button[data-action="reset"]').trigger('click');
                                        //$(function (){
                                            //$('#edit_estimate_main_details').modal('toggle');
                                            $('#edit_estimateModal').modal('hide');
                                        //});
                                        $('#updateEstimateForm')[0].reset();
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

function check_dropdown_value_for_validation(str)
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
$(document).on('click','#edit_Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount',function(){
    

    $(this).closest("tr").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(this).closest("tr").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');


    $("#edit_estimate_summary_value").val(2);

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

    element.find(".main_amount").text("");
    element.find(".main_amount").text("₹ 0000.00");
    element.next().find(".main_amount").text("");
    element.next().find(".main_amount").text("₹ 0000.00");
    element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#edit_Calculate_discounts .SGST_Discount .estimate_remove_adddiscount',function(){


    $(this).closest("tr").prev().find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").prev().find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

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

    element.prev().find(".main_amount").text("");
    element.prev().find(".main_amount").text("₹ 0000.00");
    element.find(".main_amount").text("");
    element.find(".main_amount").text("₹ 0000.00");
    element.prev().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations of gst on item qunatity or rate change
function calculate_gst_amount_on_qty_rate_change_edit(element, amt)
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
                    element.closest("tr").next().next().find(".main_amount").text("");
                    element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".main_amount").text("");
                    element.closest("tr").next().next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".main_amount").text("");
                element.closest("tr").next().find(".main_amount").text("₹ "+cal_disc_amt.toFixed(2));
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
                    element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".main_amount").text("₹ "+disc_rate+".00");
            }
            element.closest("tr").next().find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+cal_disc_amt+"'>");
        }
        else{
            var a=$("#edit_Calculate_discounts .Estimate_Percentage").closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_gst_type = $("#edit_Calculate_discounts .Estimate_Percentage").closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_tax = $("#edit_Calculate_discounts .Estimate_Percentage").closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
            var split_tax = selected_tax / 2;
            var total_val=$("#edit_total_estimate_value").val();
            var cur_rate_val=$("#edit_estimate_disc_amt").val();
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
                    $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
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
                    $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find("#edit_estimate_calculated_disc_amt").val(calculated_val);
            calculated_val = calculated_val.toFixed(2);
            $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find(".main_amount").text("");
            $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find(".main_amount").text("₹ "+calculated_val);
            //$("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        }
    }
    else{
        element.closest('tr').next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
        element.closest('tr').next().find(".main_amount").text("");
        element.closest('tr').next().find(".main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().find(".main_amount").text("");
        element.closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
        element.closest("tr").next().next().next().find(".main_amount").text("");
        element.closest("tr").next().next().next().find(".main_amount").text("₹ 0000.00");
    }
}

// Change event of estimate level discount type i.e. Percentage or Amount
$(document).on("change", "#edit_Calculate_discounts .Estimate_Percentage", function(event){
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    event.preventDefault();
    event.stopImmediatePropagation();

    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest("tr").next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;
    var total_val = $("#edit_total_estimate_value").val();
    var cur_rate_val = $("#edit_estimate_disc_amt").val();

    var cur_rate_html=$(this).closest("tr").find("#edit_estimate_disc_amt");
    // var cur_rate_val=$(this).closest("tr").find("#edit_estimate_disc_amt").val();
    
    var edit_extimate_count = 0;
    var edit_extimate_count1 = 0;

    if(a=='Percentage')
    {
        if(edit_extimate_count == 0)
        {
            edit_extimate_count = edit_Percentage_validation_estimate(cur_rate_html,cur_rate_val,total_val,edit_extimate_count);
        }
    }
    else if(a=='Amount')
    {
        if(edit_extimate_count1 == 0)
        {

            edit_extimate_count1 = edit_Amount_validation_estimate(cur_rate_html, cur_rate_val, parseFloat(total_val),edit_extimate_count1);
        }
    }

    /*if(a!="Select Type")
    {   
        var calculated_val = 0;
        if(a=="Percentage")
        {  
            var cur_rate_html=$(this).closest("tr").find("#edit_estimate_disc_amt");
            var cur_rate_val=$(this).closest("tr").find("#edit_estimate_disc_amt").val();
            edit_Percentage_validation_estimate(cur_rate_html,cur_rate_val);

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
                $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            // $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(calculated_val);
            $(this).closest("tr").find(".main_amount").text("");
            $(this).closest("tr").find(".main_amount").text("₹ "+calculated_val.toFixed(2));
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
                $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            // $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find(".main_amount").text("");
            if(cur_rate_val!=""){
                cur_rate_val = cur_rate_val;
            }
            else { 
                cur_rate_val = '0000';
            }
            $(this).closest("tr").find(".main_amount").text("₹ "+cur_rate_val+".00");
        }
        calculated_val = calculated_val.toFixed(2);
        $(this).closest("tr").find(".estimate_remove_discount").css("display","inline-block");
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
            $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal);            
        }
        $(this).closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
        $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(0);
        $(this).closest('tr').find(".main_amount .calculated_discount").val(0);
        $(this).closest('tr').find(".main_amount").text("");
        $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".estimate_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");          
    }

    var t2 = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(t2);
    if($("#edit_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t2);*/

    cal_estimate_level_amts_edit();

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

// Change event of estimate level type i.e CGST or IGST
$(document).on("change", "#edit_Calculate_discounts .Estimate_IGSTandCGST", function(){

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var current=$(this).closest("tr");
    var a=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // for CGST
    var current1=current.find(".rate_data");
    var cgst_rate_id=current.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".rate_data .custom-a11yselect-menu li:first button").text();
    
    //  for SGST
    var current2=current.next().find(".rate_data");
    var sgst_rate_id=current.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var sgst_rate_text=current.next().find(".rate_data .custom-a11yselect-menu li:first button").text();

    var main_amount = $("#edit_total_estimate_value").val();
    var calculated_disc = $("#edit_estimate_calculated_disc_amt").val();
    var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
    var curr_tax = $(this).closest("tr").find(".rate_data .custom-a11yselect-menu  .custom-a11yselect-selected").attr("data-val");
    var split_tax = curr_tax / 2;
    var calculated_tax_amt = 0;

    if(a=="Select Type")
    {
        $(this).closest("tr").find(".estimate_remove_adddiscount").css("display","none");
        $(this).closest("tr").next().hide();

        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $(this).closest("td").next().find(".main_amount").text("");
        $(this).closest("td").next().find(".main_amount").text("₹ 0000.00");
        $(this).closest("td").next().next().find(".main_amount").text("");
        $(this).closest("td").next().next().find(".main_amount").text("₹ 0000.00");
        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");

        $(this).closest('td').next().find(".estimate_igst_amount").val(0);
        $(this).closest('td').next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
    }
    else if(a=='IGST')
    {
        $(this).closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().hide();
        // $("#edit_Calculate_discounts .estimate_remove_discount").show();
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);
    }
    else if(a=='CGST')
    {
        $(this).closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().find(".estimate_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().show();
    }

    /* var t2 = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(t2);
    if($("#edit_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t2);*/

    cal_estimate_level_amts_edit();

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

// Change event of discount rate i.e 0%, 1% ..... 18% etc
$(document).on("change", "#updateEstimateForm #edit_Calculate_discounts .DiscountPer", function(){
    
    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type")
    {
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount = $("#edit_total_estimate_value").val();
        var calculated_disc = $("#edit_estimate_calculated_disc_amt").val();
        var disc_type = $(this).closest("td").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
    }

    /*var t2 = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(t2);
    if($("#edit_estimate_calculated_disc_amt").val()){
        t2 = parseFloat(t2) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t2);*/

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();

    if($("#edit_estimate_subtotal_amount").val()!=0){
        $("#edit_estimate_summary_value").val(2);
    }
});

// Keyup Event for discount rate of estimate level (i.e input box)
$(document).on("keyup", "#edit_estimate_disc_amt", function(event){
      event.preventDefault();
      event.stopImmediatePropagation();


      var a=$(this).closest('tr').find(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
      var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
      var split_tax = selected_tax / 2;
      var main_amount = $("#edit_total_estimate_value").val();
      var calculated_disc = $("#edit_estimate_calculated_disc_amt").val();
      var cur_rate_val = $(this).val();
      var cur_html=$(this);

      var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
       // if(current=='Percentage')
       // {
       //      edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amount);
       // }
       // else if(current=='Amount')
       // {
       //      edit_Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amount));
       // }

    var edit_extimate_count = 0;
    var edit_extimate_count1 = 0;

    if(main_amount != '')
    {
        // console.log("not Empty Amount ");

        // if(current=='Percentage')
        // {
        //     edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amount);
        // }
        // else if(current=='Amount')
        // {
        //     edit_Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amount));
        // }

        if(current=='Percentage')
        {
            if(edit_extimate_count == 0)
            {
                edit_extimate_count = edit_Percentage_validation_estimate(cur_html,cur_rate_val,main_amount,edit_extimate_count);
            }
        }
        else if(current=='Amount')
        {
            if(edit_extimate_count1 == 0)
            {

                edit_extimate_count1 = edit_Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amount),edit_extimate_count1);
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
                        edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amount);
                        // cur_html.blur();
                        // cur_html.closest("tr").prev().find(".main_amount").focus();
                    }
                }
        });

    }


      /*if(a!="Select Type")
      {
        if(cur_rate_val){
            var calculated_val = 0;
            var new_cal_amt = 0;
            var amt_after_estimate_discount = 0;
            var calculated_tax_amt = 0;
            if(a=="Percentage")
            {
                var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                edit_Percentage_validation(cur_html,cur_rate_val);
                
                calculated_val = (cur_rate_val/100) * main_amount;
                if(selected_gst_type && selected_gst_type != "Select Type"){
                    var new_cal_amt = main_amount - calculated_val;
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * new_cal_amt)/100;
                        $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * new_cal_amt)/100;
                        $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                    }
                    $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_val.toFixed(2));
                $(this).closest("td").find("#edit_estimate_calculated_disc_amt").val(calculated_val);
            }
            if(a=="Amount")
            {
                var main_amt = $("#edit_total_estimate_value").val();
                Amount_validation(cur_html, cur_rate_val, parseFloat(main_amt));    

                calculated_val = main_amount - cur_rate_val;
                if(selected_gst_type && selected_gst_type != "Select Type"){
                  if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);  
                  }
                  if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                  }
                  $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                  $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".main_amount").text("₹ "+cur_rate_val+'.00');
                $(this).closest("td").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val+'.00');
            }
            if(selected_gst_type=="Select Type")
            {
                calculated_val = calculated_val;
                $(this).closest("tr").find(".main_amount").text("");
                if(a == 'Percentage'){
                    $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(calculated_val);
                    calculated_val = calculated_val.toFixed(2);
                    $(this).closest("tr").find(".main_amount").text("₹ "+calculated_val);
                }
                if(a == 'Amount'){
                    $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val);
                    $(this).closest("tr").find(".main_amount").text("₹ "+cur_rate_val+".00");
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
                $(this).closest("td").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal);
                $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal);
                //$(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(main_amount);
            }
            else{
                $(this).closest("td").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
            }
            $(this).closest("tr").find("#edit_estimate_calculated_disc_amt").val(main_amount);
        }
    }*/
    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();
});

// Click event of delete button icon in a row of label says - Discount (At estimate level)
$(document).on('click','#edit_Calculate_discounts .estimate_remove_discount',function(){
    
    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .Estimate_Percentage option[value='Select Type']").attr('selected','selected');    

    var element=$(this).closest("tr");
    element.find(".rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);

    $(this).css("display","none");
    element.find(".main_amount").text("₹ 0000.00");

    var main_amt = $("#edit_total_estimate_value").val();
    var applied_tax = element.next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = element.next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type")
    {
        if(tax_type == 'IGST'){
            new_cal_amt = (main_amt * applied_tax)/100;
            element.next().next().find(".estimate_igst_amount").val(new_cal_amt);
        }
        if(tax_type == 'CGST'){
            new_cal_amt = (main_amt * split_tax)/100;
            element.next().next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(new_cal_amt);
        }
        element.next().find(".main_amount").text("₹ "+new_cal_amt.toFixed(2));
        if(element.find(".rate").val()!=""){
          element.find("#edit_estimate_calculated_disc_amt").val(new_cal_amt);
        }
        else{
          element.find("#edit_estimate_calculated_disc_amt").val(0);
        }
        element.next().next().find(".main_amount").text("₹ "+new_cal_amt.toFixed(2));
    }
    else{
        element.next().find(".main_amount").text("");
        element.next().find(".main_amount").text("₹ 0000.00");
        element.next().next().find(".main_amount").text("");
        element.next().next().find(".main_amount").text("₹ 0000.00");
        element.find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
        element.next().next().find("#edit_estimate_calculated_disc_amt").val(0);
    }
    /*var s = total_amount_for_estimate_level_discount_edit();
    calculate_estimate_level_discount_edit(s);
    $("#edit_total_estimate_value").val(0);
    if($("#edit_estimate_calculated_disc_amt").val()){
        s = parseFloat(s) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(s);*/

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();
});

// total amount calculation
function total_amount_for_estimate_level_discount_edit(amt='', $yesVal='', param='', disc_rate_val='')
{
    // var no_edit=$("#updateEstimateForm .edit_participantRow .main-group").length;
    var no_edit=$("#edit_total_items").val();
    // var total_amt_edit = ($yesVal) ? $("#edit_total_estimate_value").val() : 0;
    var total_amt_edit = 0;
    var discount_amt = 0;
    for(var n=0;n<no_edit;n++)
    {
        var current_edit = $("#updateEstimateForm #edit_participantTable .edit_participantRow .main-group").eq(n);
        var curr_amt_edit = current_edit.find(".main_amount").val();
        var discount_amt_edit = current_edit.next().next().find(".calculated_discount").val();
        var curr_rate_val_edit = current_edit.next().next().find(".rate").val();
        var disc_type_edit = current_edit.next().next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');

        if(curr_amt_edit!=0 && disc_type_edit=="" && curr_rate_val_edit=="")
        {   
            total_amt_edit = parseFloat(total_amt_edit) + parseFloat(curr_amt_edit);
        }
        if(curr_amt_edit!=0 && (disc_type_edit=="Percentage" || disc_type_edit=="Amount"))
        {
            if(curr_rate_val_edit===""){
                total_amt_edit = parseFloat(total_amt_edit) + parseFloat(curr_amt_edit);
            }
            else {
                total_amt_edit = parseFloat(total_amt_edit) + parseFloat(discount_amt_edit);
            }
        }
        if(curr_amt_edit==0){
            total_amt_edit = 0;
        }

        /*if(curr_rate_val_edit)
        {
            if(curr_amt_edit)
            {
                if(discount_amt_edit)
                {
                    var disc_type = current_edit.next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt = curr_amt_edit - discount_amt_edit;
                    }
                    if(disc_type == 'Amount'){
                        discount_amt = (discount_amt_edit!=0) ? discount_amt_edit : curr_amt_edit;
                    }
                    total_amt_edit = parseFloat(total_amt_edit) + parseFloat(discount_amt_edit);
                }
                else
                {
                    total_amt_edit = parseFloat(total_amt_edit) + parseFloat(curr_amt_edit);
                }
            }
            else{
                total_amt_edit = 0;
            }
        }
        else{
            if(curr_amt_edit)
            {
                if(discount_amt_edit)
                {
                    var disc_type = current_edit.next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt_edit = curr_amt_edit - discount_amt_edit;
                    }
                    if(disc_type == 'Amount'){
                        discount_amt_edit = (discount_amt_edit!=0) ? discount_amt_edit : curr_amt_edit;
                    }
                    total_amt_edit = parseFloat(total_amt_edit) + parseFloat(discount_amt_edit);
                }
                else
                {
                    total_amt_edit = parseFloat(total_amt_edit) + parseFloat(curr_amt_edit);
                }
            }
            else{
                total_amt_edit = 0;
            }
        }*/
    }
    return total_amt_edit;
}

// Function to get all all item rows main total
function get_all_item_rows_main_total()
{
    var no=$("#edit_total_items").val();
    var rows_total_amt = 0;
    var rows_disc_amt = 0;
    for(var s=0;s<no;s++)
    {
        var current = $("#updateEstimateForm .edit_participantRow .main-group .main_amount").eq(s).val();

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
function calculate_estimate_level_discount_edit(total_val, item_level='')
{   
    var element = $("#edit_Calculate_discounts .Estimate_Percentage");
    var a = $("#edit_Estimate_Percentage_select-selected").text();
    // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $("#edit_Calculate_IGSTandCGST_select-selected").text();
    // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    if(item_level!=""){
        var no = $("#edit_total_items").val();
        var main_total = 0;
        var total_discount_total = 0;
        for(var m=0;m<no;m++){
           var element = $("#updateEstimateForm .edit_participantRow .main-group .main_amount").eq(m);
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
        var element = $("#edit_Calculate_discounts .Estimate_Percentage");
        var cur_rate_val = element.closest("tr").find("#edit_estimate_disc_amt").val();

        if($("#edit_estimate_calculated_disc_amt").val() === 0){
            cur_rate_val = total_val;
        }
        // var a=element.closest("#edit_Calculate_discounts .discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        /*var a = $("#edit_Estimate_Percentage_select-selected").text();
        
        // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var selected_gst_type = $("#edit_Calculate_IGSTandCGST_select-selected").text();
        // var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var selected_tax = element.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
        var split_tax = selected_tax / 2;*/
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
                          element.closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                        }
                        if(selected_gst_type == 'CGST'){
                          var new_cal = (split_tax * new_cal_amt)/100;
                          element.closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                        }
                        element.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    element.closest("tr").find(".main_amount").text("₹ "+calculated_val.toFixed(2));
                    element.closest("tr").find("#edit_estimate_calculated_disc_amt").val(calculated_val);
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
                        element.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    if($("#edit_estimate_disc_amt").val()!=""){
                        var est_disc_amt = $("#edit_estimate_disc_amt").val();
                    }
                    else{
                        var est_disc_amt = "0000";
                    }
                    element.closest("tr").find(".main_amount").text("₹ "+est_disc_amt+".00");
                    element.closest("tr").find("#edit_estimate_calculated_disc_amt").val(cur_rate_val);
                }
            }
            else{
                $("#edit_estimate_calculated_disc_amt").val(0);
                element.closest("tr").find(".main_amount").text("");
                element.closest("tr").find(".main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".main_amount").text("");
                element.closest("tr").next().find(".main_amount").text("₹ 0000.00");
                element.closest("tr").next().next().find(".main_amount").text("");
                element.closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
            }
        } 
    }
}

// Function fo calculations on percentage reset
function edit_reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt='')
{
    var disc_amt = 0;
    var amt_val = 0;
    var disc_rate_val = (cur_rate_val > 0 && cur_rate_val < 100) ? cur_rate_val : 0;
    // alert("main_amt: "+main_amt);
    if(main_amt==''){
        amt_val = cur_html.closest('tr').prev().find("input[name='item_main_amount[]']").val();
    }
    else{    
        amt_val = main_amt;
    }
    var drop_val = cur_html.closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = cur_html.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = cur_html.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    
    // alert("drop_val: "+drop_val+" === selected_gst_type: "+selected_gst_type+" === selected_gst_per: "+selected_gst_per+" === split_tax: "+split_tax);
    if(amt_val != "")
    {
        if(disc_rate_val!="")
        {
            if(drop_val == "Percentage")
            {
                disc_amt = (disc_rate_val/100) * amt_val;

                if(selected_gst_type != "Select Type")
                {
                    var new_cal_amt = amt_val - disc_amt;
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      var new_cal = (split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                cur_html.closest('tr').find(".main_amount").text("");
                cur_html.closest('tr').find(".main_amount").text("₹ "+disc_amt.toFixed(2));

            }
            if(drop_val == "Amount")
            {   
                disc_amt = parseInt(amt_val) - parseInt(disc_rate_val);

                if(selected_gst_type != "Select Type")
                {
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      var new_cal = (split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }
                    cur_html.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    cur_html.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                cur_html.closest('tr').find(".main_amount").text("");
                cur_html.closest('tr').find(".main_amount").text("₹ "+disc_rate_val+".00");

            }
            cur_html.closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='"+disc_amt+"'>");
        }
        else
        {   
            var new_cal = 0;  
            if(selected_gst_type!="Select Type")
            {   
                if(disc_rate_val==""){
                    cur_html.closest('tr').find(".main_amount").text("");  
                    cur_html.closest('tr').find(".main_amount").text("₹ 0000.00");  
                }
                // alert("selected_gst_per: "+selected_gst_per+" === selected_gst_type: "+selected_gst_type+" === split_tax: "+split_tax+" === amt_val: "+amt_val);
                if(selected_gst_type == 'IGST')
                {
                  new_cal = (selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST')
                {
                  new_cal = (split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  cur_html.closest("tr").next().find(".item_cgst_amount").val(new_cal);
                  cur_html.closest("tr").next().find(".item_sgst_amount").val(new_cal);
                }
                cur_html.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                cur_html.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else
            { 
                // alert("2. Else case");     
                cur_html.closest("tr").next().find(".main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".main_amount").text("₹ 0000.00");
                cur_html.closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
            }
        }
    }

    /*var t1 = total_amount_for_estimate_level_discount_edit(0,0);
    calculate_estimate_level_discount_edit(t1);
    $("#edit_total_estimate_value").val(0);
    if($("#edit_estimate_calculated_disc_amt").val()){
        t1 = parseFloat(t1) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
    }
    $("#edit_total_estimate_value").val(t1);*/

    $("#edit_estimate_summary_value").val(2);
    cal_estimate_level_amts_edit();
}

// Calculate overall estimate summary
function calculate_estimate_summary_edit()
{
    var total_main_amount = 0;
    // var len = $("#updateEstimateForm .edit_participantRow .main-group").length;
    var len = $("#edit_total_items").val();
    var disc_type = $('#edit_participantTable .discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
    var main_amount = 0;
    var total_taxes = 0;
    var total_disc = 0;
    var total_calculated_disc = 0;
    var flag = true;
    for(s=0;s<len;s++)
    { 
        var disc_amt = 0;
        var current=$("#updateEstimateForm .edit_participantRow .main-group").eq(s);
        var curr_amt=current.find(".main_amount").val();
        if(curr_amt)
        {
            var disc_type = current.next().next().find(".discount_section .Estimate_Percentage").val();
            if(disc_type == 'Percentage'){
                disc_amt = current.next().next().find(".main_amount .calculated_discount").val();
            }
            else if(disc_type == 'Amount'){
                disc_amt = current.next().next().find(".main_amount .calculated_discount").val();
                /*if(disc!=0){
                    var disc_amt = parseFloat(curr_amt) - parseFloat(disc);
                }
                else {
                    var disc_amt = 0;
                }*/
            }
            else {
                disc_amt = 0;
            }

            // var disc_amt = current.find(".main_amount .calculated_discount").val();
            var current1 = $("#updateEstimateForm .edit_participantRow .CGST_TR_section").eq(s);
            var curr_igst= current1.find(".item_igst_amount").val();
            var curr_cgst= current1.find(".item_cgst_amount").val();
            var curr_sgst= current1.find(".item_sgst_amount").val();
            total_taxes  = parseFloat(total_taxes) + parseFloat(curr_igst) + parseFloat(curr_cgst) + parseFloat(curr_sgst);

            main_amount  = parseFloat(main_amount) + parseFloat(curr_amt);

            total_calculated_disc = parseFloat(total_calculated_disc) + parseFloat(disc_amt);
            // alert("After = total_calculated_disc: "+total_calculated_disc+" === disc_amt: "+disc_amt);
        }
    }
    // alert(total_calculated_disc);
    if(flag == true){

        /*if($("#edit_total_estimate_value").val()!=0 && $("#edit_total_estimate_value").val()!=main_amount){
            var total_disc = parseFloat(main_amount) - parseFloat($("#edit_total_estimate_value").val());
            var estimate_disc = 0;
        }
        if($("#edit_total_estimate_value").val()===main_amount){
            var total_disc = parseFloat($("#edit_estimate_calculated_disc_amt").val());
            var estimate_disc = 0;
        }
        else {
            var total_disc = parseFloat($("#edit_estimate_calculated_disc_amt").val());
            var estimate_disc = $("#updateEstimateForm").find("#edit_estimate_calculated_disc_amt").val();
        }*/
        if(total_calculated_disc!=0){
            var total_disc = parseFloat(total_calculated_disc);
        }
        else {
            var total_disc = 0;
        }
        
        var total_disc = parseFloat(main_amount) - parseFloat($("#edit_total_estimate_value").val());
        // var estimate_disc = estimate_calculated_disc_amt;

        /*if($("#Calculate_IGSTandCGST_select").val() === '')
        {
            var estimate_disc = 0;
            $("#edit_estimate_calculated_disc_amt").val(0);
        }
        else {
            var estimate_disc = $("#updateEstimateForm").find("#edit_estimate_calculated_disc_amt").val();
        }*/
        var estimate_disc = $("#updateEstimateForm").find("#edit_estimate_calculated_disc_amt").val();
        var estimate_igst=$("#updateEstimateForm #edit_Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val();
        var estimate_cgst=$("#updateEstimateForm #edit_Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val();
        var estimate_sgst=$("#updateEstimateForm #edit_Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val();
        
        total_disc = parseFloat(total_disc) + parseFloat(estimate_disc);
        total_taxes = parseFloat(total_taxes) + parseFloat(estimate_igst) + parseFloat(estimate_cgst) + parseFloat(estimate_sgst);

        var element = $("#edit_estimate_calculation #edit_main_calculation");
        element.find(".estimate_subtotal").text("");

        if(main_amount!=0){
            element.find(".estimate_subtotal").text("₹ "+main_amount.toFixed(2));
        }
        else{
            element.find(".estimate_subtotal").text("₹ 0000.00");
        }
        element.find("#edit_estimate_subtotal_amount").val(main_amount);
        element.find(".estimate_total_discount").text("");
        
        if(total_disc!=0){
            element.find(".estimate_total_discount").text("₹ "+total_disc.toFixed(2));
        }
        else{
            element.find(".estimate_total_discount").text("₹ 0000.00");
        }
        element.find("#edit_estimate_totaldiscount_amount").val(total_disc);
        element.find(".estimate_total_taxes").text("");

        if(total_taxes!=0){
            element.find(".estimate_total_taxes").text("₹ "+total_taxes.toFixed(2));
        }
        else {
            element.find(".estimate_total_taxes").text("₹ 0000.00");
        }
        element.find("#edit_estimate_totaltaxes_amount").val(total_taxes);

        var gross_total = parseFloat(main_amount) - parseFloat(total_disc) + parseFloat(total_taxes);

        element.find(".estimate_total_amount").text("");

        if(gross_total!=0){
            element.find(".estimate_total_amount").text("₹ "+gross_total.toFixed(2));
        }
        else {
            element.find(".estimate_total_amount").text("₹ 0000.00");
        }
        element.find("#edit_estimatetotal_amount").val(gross_total);
        $("#edit_estimate_calculation #edit_CalculateBtn").find("#edit_estimate_summary_value").val(1);
        $("#edit_summary_error").closest('.form-group').remove();
    }
    else{
        var element = $("#edit_estimate_calculation #edit_main_calculation");
        element.find(".estimate_subtotal").text("");
        element.find(".estimate_subtotal").text("₹ 0000.00");
        element.find("#edit_estimate_subtotal_amount").val(0);
        element.find(".estimate_total_discount").text("");
        element.find(".estimate_total_discount").text("₹ 0000.00");
        element.find("#edit_estimate_totaldiscount_amount").val(0);
        element.find(".estimate_total_taxes").text("");
        element.find(".estimate_total_taxes").text("₹ 0000.00");
        element.find("#edit_estimate_totaltaxes_amount").val(0);
        element.find(".estimate_total_amount").text("");
        element.find(".estimate_total_amount").text("₹ 0000.00");
        element.find("#edit_edit_estimatetotal_amount").val(0);
        element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    }
}

//file upload
$(document).on("change",".edit-estimate-custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#updateEstimateForm");
    form_data = new FormData(form_data[0]);
    jQuery.each(jQuery('#edit_estimate_attachment')[0].files, function(i, file) {
        form_data.append('attachment['+i+']', file);
    });
    form_data.append('methodName', 'estimate_edit_file_upload');
    $.ajax({
        type : "POST",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : form_data,
        processData: false,
        contentType: false,
        success: function(data)
        {
            
        }
    });
});

function getedit_estimateFilenames(){
        
        $fileHtml="";
        var files = $('#edit_estimate_attachment').prop("files");
        // console.log(files);
        var names = $.map(files, function(val) { 
            var fileName = val.name;
            fileName=fileName.replace(/ /g,"_");  

            var regex = new RegExp("(.*?)\.(jpeg|JPEG|jpg|JPG|png|PNG|doc|DOC|docx|DOCX|xls|XLS|xlsx|XLSX|pdf|PDF|zip|ZIP|rar|RAR|txt|TXT|csv|CSV)$");

            if (!(regex.test(fileName))) {
                /*$.alert({
                    title: 'Alert!',
                    content: "File format of file "+fileName+" not supported",
                    type: 'dark',
                    typeAnimated: true,
                });*/
                $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span style='color:#ad4846;'>File format not supported</span></div></li>";
            }
            else{
                $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span class='material-icons-outlined editestimate_unLinkfile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='editestimate_unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
            }
        
        });
        $(".edit_estimate_filesList").append($fileHtml);
    }

function editestimate_unLinkfile(event){
    $(event).closest("li").remove();
    var deleteFile = $(event).closest("span").attr("data-name");
    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : { methodName: "estimate_delete_current_file", deleteFile: deleteFile},
        success: function(data)
        {
            $("#edit_estimate_attachment").val('');
        }
    });
}

function editestimate_unLinkAllfile(event){
    $("#edit_estimateModal #filelist .list-unstyled li").remove();
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

$(document).on("click", "#edit_estimateModal .edit_close", function(){
    editestimate_unLinkAllfile(this);
});


// $(document).on("click","data-action=['Edit_invoice']",function(){
$('.action[data-action=Edit_estimate]').unbind().click(function(){
$.ajax({
type : "GET",
url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
dataType : "json",
data : { methodName: "estimate_deleteFolder"},

success: function(data)
{
}
});
})


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


function resetHiddenFields_edit()
{
    $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount, #edit_total_estimate_value, #edit_estimate_summary_value, #edit_estimate_items_discount_selected, #edit_estimate_items_gst_type_selected, #edit_estimate_subtotal_amount, #edit_estimate_totaldiscount_amount, #edit_estimate_totaldiscount_amount, #edit_estimatetotal_amount, #edit_estimate_calculated_disc_amt").val(0);
}

function check_qty_rate_edit(elem){
    var edit_item_rate = $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val();
    var edit_item_qty = $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val();
    var edit_item_main_amt = $(elem).closest(".main-group").find("input[name='edit_item_main_amount[]']").val();

    var main_amt_cal = parseFloat(edit_item_rate) * parseFloat(edit_item_qty);

    if((edit_item_main_amt!="" && main_amt_cal != edit_item_main_amt) || main_amt_cal == ""){
        $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val("");
        $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val("");
    }
    else if(edit_item_rate == "" || edit_item_rate == "NaN" || edit_item_rate == 0){
        // $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val(1);
        $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val('');
    }
}

function item_rate_change_edit(elem)
{   
    var edit_item_qty = $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val();
    var edit_item_rate = $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val();
    if(edit_item_rate != ""){
        if(edit_item_qty == "" || edit_item_qty == "NaN" || edit_item_qty == 0){
            $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val("");
    }*/
}

function item_qty_change_edit(elem)
{   
    var edit_item_qty = $(elem).closest(".main-group").find("input[name='edit_item_qty[]']").val();
    var edit_item_rate = $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val();
    if(edit_item_qty != ""){
        if(edit_item_rate == "" || edit_item_rate == "NaN" || edit_item_rate == 0){
            $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='edit_item_rate[]']").val("");
    }*/
}

function cal_estimate_level_amts_edit(elem='')
{
    var len_edit = $("#edit_total_items").val();
    var final_total_amt_edit = 0;
    var total_amt_edit = 0;
    var total_disc_edit = 0;

    var amt_after_disc_edit = 0;
    var cal_disc_amt_edit = 0;
    var cal_tax_edit = 0;
    var val_for_tax_edit = 0;
    var new_final_total_amt_edit = 0;
    var new_cal_edit = 0;
    var validation_cnt_edit = 0;
    var disc_rate_edit = 0;
    for(var t=0;t<len_edit;t++)
    {
        var items_main_amt_edit = 0;
        var disc_type_edit = "";
        var gst_type_edit = "";
        var gst_rate_edit = 0;
        var get_db_rate_val = 0;
        var get_db_disctype_val = 0;

        var edit_is_empty = $("#updateEstimateForm #edit_participantTable .main-group").find('.main_amount').eq(t).val();
        if(edit_is_empty == '' || edit_is_empty == 'NaN'){
            total_amt_edit = parseFloat(total_amt_edit) + 0;    
        }
        else {
            total_amt_edit = parseFloat(total_amt_edit) + parseFloat($("#updateEstimateForm #edit_participantTable .main-group").find('.main_amount').eq(t).val());
        }

        disc_type_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();
        
        // item_level_discount_calculations(t);
        item_level_discount(t);
        item_level_gst_calculation(t);

        var disc_fld_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount .calculated_discount").eq(t).val();

        total_disc_edit = parseFloat(total_disc_edit) + parseFloat(disc_fld_edit);
    }
    final_total_amt_edit = parseFloat(total_amt_edit) - parseFloat(total_disc_edit);
    $("#edit_total_estimate_value").val(final_total_amt_edit);

    estimate_level_disc_gst_calculations();
}

function item_level_discount(t)
{
   // Calculation discount for each item
    items_main_amt_edit = $("#updateEstimateForm #edit_participantTable .main-group").find('.main_amount').eq(t).val();

    disc_type_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

    disc_rate_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".rate").eq(t).val();

    get_db_rate_val = parseFloat($("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".rate_dbdata").eq(t).val());

    get_db_disctype_val = $("#edit_item_discount_type_dbval"+t).eq(t).val();

    var cur_rate_html = $("#edit_item_discount_rate"+t).eq(t);
    if(disc_type_edit!="Select Type")
    {
        var cur_html_edit = $("#updateEstimateForm #edit_participantTable .main-group");
        if(disc_rate_edit!="")
        {
            $("#updateEstimateForm").find("#edit_estimate_calculated_disc_amt").val(disc_rate_edit);
            if(disc_type_edit == "Percentage")
            {
                /*if(disc_rate_edit > 100)
                {   
                    edit_Percentage_validation_estimate(cur_rate_html, disc_rate_edit);
                }*/
                cal_disc_amt_edit = (parseFloat(items_main_amt_edit) * parseFloat(disc_rate_edit))/100;

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ "+cal_disc_amt_edit.toFixed(2));

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+cal_disc_amt_edit+'">');
            }
            if(disc_type_edit == "Amount")
            {   
                /*if(disc_rate_edit > items_main_amt_edit)
                {   
                    edit_Amount_validation_estimate(cur_html_edit, disc_rate_edit, parseFloat(items_main_amt_edit));
                }*/
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ "+parseFloat(disc_rate_edit).toFixed(2));

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+disc_rate_edit+'">');
            }
        }
        else if(disc_rate_edit == "")
        {
            $("#updateEstimateForm #edit_item_discount_type"+t+"-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");   

            $("#updateEstimateForm #edit_item_discount_type"+t+"-button .custom-a11yselect-text").text(disc_type_edit);

            $("#updateEstimateForm #edit_item_discount_type"+t+"-menu li[data-val='"+disc_type_edit+"']").addClass("custom-a11yselect-focused");
            $("#updateEstimateForm #edit_item_discount_type"+t+"-menu li[data-val='"+disc_type_edit+"']").addClass("custom-a11yselect-selected");

            $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ 0000.00");

            $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
        }
    }
}

function item_level_gst_calculation(t)
{   
    items_main_amt_edit = $("#updateEstimateForm #edit_participantTable .main-group").find('.main_amount').eq(t).val();

    disc_cal_val_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".calculated_discount").eq(t).val();

    disc_type_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

    disc_rate_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().find(".rate").eq(t).val();
    
    gst_type_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

    //gst_rate_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).attr("data-val");
    gst_rate_edit = $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").eq(t).next().next().next().find(".DiscountPer option:selected").val();

    // alert("gst_type_edit: "+gst_type_edit+" === gst_rate_edit: "+gst_rate_edit);
    if(gst_type_edit!="Select Type")
    {
        if(items_main_amt_edit!=""){
            var val_for_tax_edit = parseFloat(items_main_amt_edit) - parseFloat(disc_cal_val_edit);
        }
        else {
            var val_for_tax_edit = 0;
        }

        if(gst_type_edit == "IGST")
        {
            $("#updateEstimateForm #edit_participantTable .edit_participantRow .SGST_Discount").hide();
            if(gst_rate_edit!=0)
            {
                cal_tax_edit = (parseFloat(val_for_tax_edit) * parseInt(gst_rate_edit))/100;

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount").eq(t).val(cal_tax_edit);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_cgst_amount").eq(t).val(0);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_sgst_amount").eq(t).val(0);

                $("#updateEstimateForm #edit_participantTable .edit_participantRow .SGST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");

                if(cal_tax_edit === 0){
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                }
                else{
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ "+cal_tax_edit.toFixed(2));
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ "+cal_tax_edit.toFixed(2));
                }
            }
        }
        if(gst_type_edit == "CGST")
        {   
            $("#participantTable .participantRow .SGST_Discount").show();
            if(gst_rate_edit!=0)
            {
                var split_tax = parseInt(gst_rate_edit) / 2;
                cal_tax_edit = (parseFloat(val_for_tax_edit) * parseFloat(split_tax))/100;

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount").eq(t).val(0);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_cgst_amount").eq(t).val(cal_tax_edit);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_sgst_amount").eq(t).val(cal_tax_edit);

                $("#updateEstimateForm #edit_participantTable .edit_participantRow .SGST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");

                if(cal_tax_edit === 0){
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                }
                else{
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ "+cal_tax_edit.toFixed(2));
                    $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ "+cal_tax_edit.toFixed(2));
                }
            }
            else {
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");

                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount").eq(t).val(0);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_cgst_amount").eq(t).val(0);
                $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_sgst_amount").eq(t).val(0);
            }
        }   
    }
    else {
        $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".rate_data .item_igst_amount,.item_cgst_amount,.item_sgst_amount").eq(t).val(0);

        $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
        $("#updateEstimateForm #edit_participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
    }
}

function estimate_level_disc_gst_calculations()
{
    var new_final_total_amt_edit = $("#edit_total_estimate_value").val();
    var hide_est_disc_or_not_edit = $("#edit_estimate_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type_edit = $("#edit_Calculate_discounts").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate_edit = parseFloat($("#edit_estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type_edit = $("#edit_Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    var est_selected_gst_per_edit = $("#edit_Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax_edit = parseFloat(est_selected_gst_per_edit) / 2;

    var curr_html_edit = $("#edit_estimate_disc_amt");
    $("#edit_estimate_calculated_disc_amt").val(0);
    // If estimate level discount row visible
    if(hide_est_disc_or_not_edit == 0)
    {
        if(est_selected_disc_type_edit != "Select Type")
        {
            if(est_selected_disc_rate_edit && est_selected_disc_rate_edit!="NaN")
            {   
                if(est_selected_disc_type_edit == 'Percentage')
                {   
                    var current = curr_html_edit.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    edit_Percentage_validation_estimate(curr_html_edit, est_selected_disc_rate_edit);

                    var cal_estimate_disc_edit = (parseFloat(new_final_total_amt_edit) * parseFloat(est_selected_disc_rate_edit))/100;
                    
                    $("#edit_estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+cal_estimate_disc_edit.toFixed(2));
                    $("#edit_estimate_calculated_disc_amt").val(cal_estimate_disc_edit);
                }
                if(est_selected_disc_type_edit == 'Amount')
                {   
                    edit_Amount_validation_estimate(curr_html_edit, est_selected_disc_rate_edit, parseFloat(new_final_total_amt_edit));

                    $("#edit_estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+est_selected_disc_rate_edit.toFixed(2));
                    $("#edit_estimate_calculated_disc_amt").val(est_selected_disc_rate_edit);
                }
            }
            else {
                if(est_selected_gst_type_edit != 'Select Type')
                {
                    if(est_selected_gst_type_edit == 'IGST')
                    {   
                        new_cal_edit = (parseFloat(est_selected_gst_per_edit) * parseFloat(new_final_total_amt_edit))/100;
                        // Values into the hidden fields of igst
                        $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_edit);
                        $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                        $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
                        $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
                    }
                    if(est_selected_gst_type_edit == 'CGST')
                    {
                        new_cal_edit = (parseFloat(est_split_tax_edit) * parseFloat(new_final_total_amt_edit))/100;

                        // Values into the hidden fields of cgst & sgst
                        $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
                        $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_edit);
                        $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_edit);
                        $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal_edit.toFixed(2));
                        $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
                    }
                }
                else{
                    // $("#edit_estimate_calculated_disc_amt").val(new_final_total_amt_edit);
                    $("#edit_estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
                    $("#edit_estimate_disc_amt").closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                    $("#edit_estimate_disc_amt").closest("tr").next().next().next().find(".main_amount").text("₹ 0000.00");
                }
            }
            $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        }
        else {
            $("#edit_estimate_disc_amt").val('');
            $("#edit_estimate_calculated_disc_amt").val(0);
            $("#edit_estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
            $("#edit_Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type_edit != 'Select Type')
        {
            if(est_selected_gst_type_edit == 'IGST')
            {   
                new_cal_edit = (parseFloat(est_selected_gst_per_edit) * parseFloat(new_final_total_amt_edit))/100;
                // Values into the hidden fields of igst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
            }
            if(est_selected_gst_type_edit == 'CGST')
            {
                new_cal_edit = (parseFloat(est_split_tax_edit) * parseFloat(new_final_total_amt_edit))/100;

                // Values into the hidden fields of cgst & sgst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal_edit.toFixed(2));
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
            }
        }
        else{
            $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }

    // If estimate level gst row visible
    var hide_est_gst_or_not_edit = $("#edit_estimate_items_gst_type_selected").val();
    if(hide_est_gst_or_not_edit == 0)
    {   
        if(est_selected_gst_type_edit != "Select Type")
        {
            // If estimate level gst type is selected
            if(est_selected_disc_type_edit!="Select Type")
            {   
                if(est_selected_disc_type_edit == "Percentage")
                {
                    if($("#edit_estimate_calculated_disc_amt").val()!="")
                    {
                        if($("#edit_estimate_disc_amt").val()!=""){
                            new_final_total_amt_edit = parseFloat(new_final_total_amt_edit) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
                        }
                        else {
                            new_final_total_amt_edit = parseFloat(new_final_total_amt_edit);
                        }
                    }
                    else {
                        new_final_total_amt_edit = parseFloat(new_final_total_amt_edit);
                    }
                }
                if(est_selected_disc_type_edit == "Amount")
                {
                    new_final_total_amt_edit = parseFloat(new_final_total_amt_edit) - parseFloat($("#edit_estimate_calculated_disc_amt").val());
                }
            }
            else {
                new_final_total_amt_edit = parseFloat(new_final_total_amt_edit);
            }

            if(est_selected_gst_type_edit == 'IGST')
            {   
                var new_cal_edit = (parseFloat(est_selected_gst_per_edit) * parseFloat(new_final_total_amt_edit))/100;
                // Values into the hidden fields of igst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
            }
            if(est_selected_gst_type_edit == 'CGST')
            {   
                var new_cal_edit = (parseFloat(est_split_tax_edit) * parseFloat(new_final_total_amt_edit))/100;
                // Values into the hidden fields of cgst & sgst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal_edit.toFixed(2));
                $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal_edit.toFixed(2));
            }

            $("#estimate_items_discount_selected").val(new_cal_edit);
            $("#estimate_items_gst_type_selected").val(new_cal_edit);
        }
        else{
            $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
            $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ 0000.00");
            $("#edit_Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type_edit != 'Select Type')
        {
            if(est_selected_gst_type_edit == 'IGST')
            {   
                var new_cal_edit = (parseFloat(est_selected_gst_per_edit) * parseFloat(new_final_total_amt_edit))/100;
                // Values into the hidden fields of igst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type_edit == 'CGST')
            {
                var new_cal_edit = (parseFloat(est_split_tax_edit) * parseFloat(new_final_total_amt_edit))/100;
                // Values into the hidden fields of cgst & sgst
                $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(new_cal_edit);
                $("#edit_Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal_edit.toFixed(2));
            }
        }
        else {
            $("#edit_Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#edit_Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }
}