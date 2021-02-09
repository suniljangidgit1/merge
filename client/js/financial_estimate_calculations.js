// New Create Estimate Form Script

// $(".estimate_datepicker input").datepicker({ 
//     autoclose: true, 
//     todayHighlight: true,
//     orientation: "top",
//     format: "dd/mm/yyyy"
// }).datepicker('update', new Date());

/* Variables */
var p = $("#participants").val();
var row = $(".participantRow");

var estimate_items_add = '<tr class="main-group" style="border-top: 2px solid #ddd;"><td><input type="checkbox"class="checkbox sub_checkbox"></td><td class="sno"><span>1</span></td><td><input name="item_descr[]" id="" type="text" value="" class="form-control item_descr"></td><td><input name="item_hsn[]" id="" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="item_qty[]" id="" type="text" value="" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input name="item_rate[]" id="" type="text" value="" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><input type="text" class="main_amount form-control" name="item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td><!--<button class="btn btn-danger remove"type="button">Remove</button>--><span class="material-icons-outlined estimate_remove">delete_outline</span></td></tr><tr><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount(At item level)</span></td><td class="width_15 discount_section"><select name="item_discount_type[]" id="" class="Estimate_Percentage form-control"><option value="" selected="selected">Select Type</option><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select></td><td class="width_10"><input name="item_discount_rate[]" id="" type="text" value="" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td><td class="width_15"><span class="main_amount">₹ 0000.00 <input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0"></span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_discount" style="display: none;">delete_outline</span></td></tr><tr class="CGST_TR_section"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+GST(At item level)</span></td><td class="width_15 GST_section"><select name="item_gst_type[]" id="" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control"><option value="" selected="selected">Select Type</option><option value="IGST">IGST</option><option value="CGST">CGST</option></select></td><td class="width_10 rate_data"><select name="item_gst_discont[]" id="" class="DiscountPer form-control"><option value="0" selected="selected">0%</option><option value="1">1%</option><option value="2">2%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option><option value="12">12%</option><option value="18">18%</option><option value="28">28%</option></select><input type="hidden" class="item_igst_amount" name="item_igst_amount[]" value="0" /><input type="hidden" class="item_cgst_amount" name="item_cgst_amount[]" value="0" /><input type="hidden" class="item_sgst_amount" name="item_sgst_amount[]" value="0" /></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount" style="display: none;">delete_outline</span></td></tr><tr id="" class="SGST_Discount" style="display: none;"><td></td><td></td><td></td><td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span></td><td class="width_15"><input name="SGST" value="SGST" class="SGST form-control"type="text"></td><td class="width_10 rate_data"><!--<select name="item_sgst_discount[]" id="" class="DiscountPer form-control"><option value="">None</option><option value="18%">18%</option><option value="19%">19%</option></select>--></td><td class="width_15"><span class="main_amount">₹ 0000.00</span></td><td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount">delete_outline</span></td></tr>';

/* Functions */
function getP_estimate() {
    p = $("#participants").val();
}

function addRow_estimate() {
    $('.participantRow').append(estimate_items_add);
}

function removeRow(button) {
    button.closest("tr").remove();
}

/* Doc ready */
$(document).on('click', "#FinanceEstimateModal .Estimate_add", function (event) {
    // alert("Hehehehe");

    event.preventDefault();
    event.stopImmediatePropagation();

    getP_estimate();
    //if ($("#participantTable tr").length < 17) {
        addRow_estimate();
        var i = Number(p) + 1;
        $("#participants").val(i);

        var total_items = $("#total_items").val();
        total_items = parseInt(total_items) + 1;
        $("#total_items").val(total_items);

        $(".Estimate_Percentage").customA11ySelect();
        $(".Estimate_IGSTandCGST").customA11ySelect();
        $(".Calculate_IGSTandCGST").customA11ySelect();
        $(".BillingFrom_address").customA11ySelect();
        $(".BillingFrom_gst").customA11ySelect();
        $(".BillingTo_address").customA11ySelect();
        $(".BillingTo_gst").customA11ySelect();
        $(".DiscountPer").customA11ySelect();

        // $("#FinanceEstimateModal .participantRow .main-group").last().next().find(".Estimate_Percentage option:first-child").attr("selected", true);
        
        var items_selected_gst = $("#participantTable .participantRow .main-group:first").next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        var seleted_type = $("#participantTable .participantRow .main-group:first").next().next().find(".GST_section .custom-a11yselect-selected").text();
        var seleted_type_id = $("#participantTable .participantRow .main-group:first").next().next().find(".GST_section .custom-a11yselect-selected").attr('id');

        // $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

        $("#participantTable .participantRow .GST_section ").find(".custom-a11yselect-btn").attr("aria-activedescendant",seleted_type_id);
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-text").text(seleted_type);
        // alert(seleted_type+" "+seleted_type_id);
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");

        $("select[name='item_gst_type[]']").each(function(){
            $('option:selected', $("select[name='item_gst_type[]']").val(seleted_type)).attr('selected',true).siblings().removeAttr('selected');
        });
        if(seleted_type!='Select Type')
        {
            if(seleted_type == 'CGST')
            {
                $("#participantTable .participantRow .GST_section").closest("tr").next().show();
                $("#participantTable .participantRow .GST_section").closest("tr").next().find(".estimate_remove_adddiscount").css("display","inline-block");
            }
            $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-option[data-val='"+seleted_type+"']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
            $("#participantTable .participantRow .GST_section").closest("tr").find(" .estimate_remove_adddiscount").css("display","inline-block");
            $("#participantTable .participantRow .GST_section").find(".Estimate_IGSTandCGST").val(seleted_type);
        }
        else
        {
            $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");
        }


        // Disabled item level GST fields if selected billing entity has not GST
        if($("#billingaddressgstin").val()!="" && $("#billingaddressgstin").val()==0)
        {
            $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $("#participantTable .participantRow .GST_section").closest("tr").find(" .invoice_remove_adddiscount").css("display","none");

            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "opacity":"1", "cursor":"not-allowed","pointer-events":"none"});
        }

        // var items_selected_gst = $("#items_selected_gst_type").val();
        // if(items_selected_gst!=""){
        //     $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text(items_selected_gst);
        //     if(items_selected_gst == 'CGST'){
        //         $("#participantTable .participantRow .CGST_TR_section").find(".estimate_remove_adddiscount").show(); 
        //         $("#participantTable .participantRow .SGST_Discount").show();
        //     }
        //     else {
        //         $("#participantTable .participantRow .SGST_Discount").hide();
        //     }
        // }
    //}

        // Disabled item level GST fields if selected billing entity has not GST
        if($("#billingaddressgstin").val()!="" && $("#billingaddressgstin").val()==0)
        {
            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css("background-color", "#eee");
            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css("opacity", "1");
            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css("cursor", "not-allowed");
            $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css("pointer-events", "none");
        }

    $(this).closest("tr").appendTo(".participantRow");
    if ($(".participantRow tr").length === 2) {
        $(".estimate_remove").hide();
    } else {
        $(".estimate_remove").show();
    }

    $("#participantTable .participantRow .main-group").last().next().next().find(".GST_section option[value='"+seleted_type+"']").attr("selected", "selected");


    var element=$(".participantRow .main-group").length;
    $(".participantRow .sno").html("");
    for(var g=0;g<element;g++)
    {
        var s=g+1;
        $(".participantRow .main-group").eq(g).find(".sno").html(s);
    }


});

$(document).on("change", "#participants", function () {
    var i = 0;
    p = $("#participants").val();
    var rowCount = $(".participantRow tr").length - 2;
    if (p > rowCount) {
        for (i = rowCount; i < p; i += 1) {
            addRow_estimate();
        }
        $("#participantTable #addButtonRow").appendTo(".participantRow");
    } else if (p < rowCount) {}
});

//FOR Serial Number- use ON 
$(document).on("click", ".Estimate_add, .estimate_remove", function(){
    $("td.sno").each(function(index,element){                 
        $(element).text(index + 1); 
    });
});

$(document).on("click", ".estimateDiffBillingEntity", function(){
    $(".BillingFrom_address_and_gst").show();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFrom_gst_main").hide();
    $("#billfromname").remove();
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
                    $("#BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#BillFromAddress_address").html("<span>"+data.address+"</span>");
                    $("#BillFromAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingFromAddress").hide();
                    $(".BillingFrom_address_and_gst").show();
                    $("#BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $("#BillingFrom_addr").customA11ySelect('refresh');
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
    $(".BillingFromGSTDetails_dropdown").hide();
    $(".BillingFromGSTDetails").hide();
    $(".BillingFrom_gst_main").hide();
    $("#billfromname").remove();
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
                        $("#BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#BillingFrom_gstno").append(data.str_opt);
                        $("#BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#BillFromAddress_address").html("<span>"+data.address+"</span>");
                        $("#BillFromAddress_email").html("<span>"+data.email_phone+"</span>");
                        $("#BillFromAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        $("#BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingFromAddress").hide();
                    $(".BillingFrom_address_and_gst").show();
                    $("#BillingFrom_addr").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $("#BillingFrom_addr").customA11ySelect('refresh');
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
    $("#billtoname").remove();
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
                    $("#BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#BillToAddress_address").html("<span>"+data.address+"</span>");
                    $("#BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                    $("#BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                    $("#BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                    $("#BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $("#BillingTo_addr").customA11ySelect('refresh');
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
    $("#billtoname").remove();
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
                        $(".BillingTo_address_main").hide();
                        $(".BillingTo_address_and_gst").show();
                        $(".BillingTo_gst_main").show();
                        $(".BillingToGSTDetails_dropdown").show();
                        
                        $(".BillingToAddress").hide();
                        $(".BillingTo_address_gst").show();
                        
                        $(".BillingToGSTDetails").hide();
                        $("#BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#BillingTo_gstno").append(data.str_opt);
                        $("#BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {    
                        $(".BillingToAddress").show();
                        $("#BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        $("#BillToAddress_address").html("<span>"+data.address+"</span>");
                        $("#BillToAddress_email").html("<span>"+data.email_phone+"</span>");
                        $("#BillToAddress_gst").html("<span><b>GST No.: </b>"+data.gst_num+"</span>");
                        $("#BillToAddress_pan").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        $("#BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingToAddress").hide();
                    $(".BillingTo_address_and_gst").show();
                    $("#BillingTo_addr").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    $("#BillingTo_addr").customA11ySelect('refresh');
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
    $("#Calculate_discounts .CGST_TR_section").closest("tr").show();
    $("#estimateForm")[0].reset();
 });

$(document).on('change','#Calculate_discounts .Estimate_IGSTandCGST',function(){

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("td").next().find(".DiscountPer")).attr('selected',true).siblings().removeAttr('selected');

    var current=$(this).closest(".participantRow");
    var a=$(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    // for CGST
    var current1=current.find(".rate_data");
    var cgst_rate_id=current.find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var cgst_rate_text=current.find(".rate_data .custom-a11yselect-menu li:first button").text();

    //  for SGST
    var current2=current.next().find(".rate_data");
    var sgst_rate_id=current.next().find(".rate_data .custom-a11yselect-menu li:first").attr("id");
    var sgst_rate_text=current.next().find(".rate_data .custom-a11yselect-menu li:first button").text();

    if(a == "Select Type")
    {
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").css("display","none");
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").next().hide();
        
        ResetDiscount(current1,cgst_rate_id,cgst_rate_text);
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        $('#FinanceEstimateModal #Calculate_discounts .CGST_TR_section .main_amount').text('');
        $('#FinanceEstimateModal #Calculate_discounts .CGST_TR_section .main_amount').text('₹ 0000.00');
        $('#FinanceEstimateModal #Calculate_discounts .CGST_TR_section').next().find('.main_amount').text('');
        $('#FinanceEstimateModal #Calculate_discounts .CGST_TR_section').next().find('.main_amount').text('₹ 0000.00');
    }
    else if(a == 'IGST')
    {
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").css("display","inline-block");
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").next().hide();
        $('#FinanceEstimateModal .CGST_TR_section').next().find('.main_amount').text('');
        $('#FinanceEstimateModal .CGST_TR_section').next().find('.main_amount').text('₹ 0000.00');
    }
    else if(a == 'CGST')
    {   
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").css("display","inline-block");
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").show();
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","inline-block");
        $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").next().show();
    }
    //calculate_estimate_level_discount($("#total_estimate_value").val());
    // for_hiding_estimate_level_GST();
    // create_estimate_remove_panel_color();
    cal_estimate_level_amts();
});

//  checkbox section
$(document).on('click','.header_checkbox',function(){
    if($(this).prop("checked") == true){
        $(".sub_checkbox").prop("checked",true);
        $(".header_delete").css("display","inline-block");
    }
    else if($(this).prop("checked") == false){
        $(".sub_checkbox").prop("checked",false);
        $(".header_delete").css("display","none");
    }       
});
$(document).on('click','.sub_checkbox',function(){
    var ele=$(this).closest(".participantRow");
    var main_group_len = ele.find(".main-group").length;
    var length=ele.find(".main-group .sub_checkbox:checked").length;
    if(length>=1)
    {
        $(".header_delete").css("display","inline-block");
    }
    else
    {
        $(".header_delete").css("display","none");
        $(".header_checkbox").prop("checked",false); //new change
    }

});


function reset_estimate_level_gst_details()
{
    $("#Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount").hide();

    $("#Calculate_discounts .CGST_TR_section").next().hide();

    // Estimate level GST dropdown
    $("#Calculate_discounts .GST_section ").find(".custom-a11yselect-text").text('');
    $("#Calculate_discounts .GST_section").find(".custom-a11yselect-text").text('Select Type');
   
    // alert("success"+$("#Calculate_discounts .GST_section .custom-a11yselect-text").text());
    $("#Calculate_discounts .GST_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','Calculate_IGSTandCGST_select-option-0');

    $("#Calculate_discounts .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#Calculate_discounts .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    // Estimate level GST rate dropdown
    
    $("#Calculate_discounts .rate_data .custom-a11yselect-text").text('');

    $("#Calculate_discounts .rate_data .custom-a11yselect-text").text('0%');

    $("#Calculate_discounts .rate_data").find(".custom-a11yselect-btn").attr('aria-activedescendant','Calculate_rate-option-0');

    
    $("#Calculate_discounts .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
    
    $("#Calculate_discounts .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#Calculate_discounts .CGST_TR_section .main_amount ").text('');

    $("#Calculate_discounts .CGST_TR_section .main_amount").text('₹ 0000.00');
    
    $("#Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('');
    
    $("#Calculate_discounts .CGST_TR_section").next().find(".main_amount").text('₹ 0000.00');

    $("#Calculate_discounts .GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $("#Calculate_discounts .GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $("#Calculate_discounts .rate_data .DiscountPer option").removeAttr('selected');
    $("#Calculate_discounts .rate_data .DiscountPer option[value='0']").attr('selected','selected');
}


$(document).on("click","#estimateForm .header_delete",function(){
    var r=$(".participantRow .main-group .sub_checkbox:checked").closest("tr");
    var main_group_len=$(".participantRow .main-group").length;
    var sub_checkbox_len=$(".participantRow .main-group .sub_checkbox:checked").length;
    // console.log(main_group_len+" "+sub_checkbox_len);
    var deleted_row_val = $(".participantRow .main-group .sub_checkbox:checked").closest("tr").find('.main_amount').val();
    
    r.next().remove();
    r.next().remove();
    r.next().remove();
    r.remove();
    var current=$(".participantRow .main-group .sub_checkbox:checked").length;
    var element=$(".participantRow .main-group").length;
    if(current==0)
    {
        $(".header_delete").css("display","none");
    }
    $(".participantRow .sno").html("");
    for(var g=0;g<element;g++)
    {
        var s=g+1;
        $(".participantRow .main-group").eq(g).find(".sno").html(s);
    }
    if(element==0)
    {
        $('.participantRow').append(estimate_items_add);
        $("#total_items").val(1);
        $(".Estimate_Percentage").customA11ySelect();
        $(".Estimate_IGSTandCGST").customA11ySelect();
        $(".DiscountPer").customA11ySelect();
        reset_estimate_level_discount_details();
        reset_estimate_level_gst_details();
    }
    else {
        var totalItems = $("#total_items").val();
        var new_otal_tem_count = totalItems - sub_checkbox_len;
        $("#total_items").val(new_otal_tem_count);
    }
    if($(".header_checkbox").prop("checked") == true || main_group_len == sub_checkbox_len)
    {
     $("#FinanceEstimateModal #estimate_calculation #Calculate_discounts .estimate_effect").css("display","table-row");   
     $("#estimate_items_discount_selected").val(0);
     $("#estimate_items_gst_type_selected").val(0);
     $("#FinanceEstimateModal #estimate_calculation .panel-heading ").removeClass("remove-panel-color");
    }

    
    $(".header_checkbox").prop("checked",false); // new change

    if(deleted_row_val){
        var l = parseFloat($("#total_estimate_value").val()) - parseFloat(deleted_row_val);
    }
    else{
        var l = parseFloat($("#total_estimate_value").val());
    }
    /*calculate_estimate_level_discount(l);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(l);*/
    $("#estimate_summary_value").val(2);
    cal_estimate_level_amts();

    for_hiding_estimate_level_percentage();
    for_hiding_estimate_level_GST();
    create_estimate_remove_panel_color();
});

// validation for rate
// $(document).on('keyup', ".participantRow .rate", function() 
// {
//     var cur_html=$(this);
//     var cur_rate_val = $(this).val();
//     var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
//     if(current=='Percentage')
//     {
//         Percentage_validation_estimate(cur_html,cur_rate_val);
//     }
//     else if(current=='Amount')
//     {
//         var main_amt = cur_html.closest('tr').prev().find('.main_amount').val();
//         Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));
//     }
// });


$(document).on('keyup', ".participantRow .rate", function() 
{
    var cur_html=$(this);
    var cur_rate_val = $(this).val();
    var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var main_amt = cur_html.closest('tr').prev().find('.main_amount').val();
    // if(current=='Percentage')
    // {
    //     Percentage_validation_estimate(cur_html,cur_rate_val);
    // }
    // else if(current=='Amount')
    // {
    //     Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));
    // }

    cur_html.closest("tr").prev().find(".main_amount").closest("td").find(".err").remove();
    cur_html.closest("tr").prev().find(".main_amount").removeAttr('style');

    if(main_amt != '')
    {
        if(current=='Percentage')
        {
            Percentage_validation_estimate(cur_html,cur_rate_val);
        }
        else if(current=='Amount')
        {
            Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));
        }
    }
    else
    {
        cur_html.closest("tr").prev().find(".main_amount").closest("td").append('<span class="err text-danger">Please enter amount</span>');
        cur_html.closest("tr").prev().find(".main_amount").css('border-color', 'rgb(173, 72, 70)');
        cur_html.val("");
        cur_html.closest("tr").prev().find(".main_amount").focus();

         // $.alert({
         //        title: 'Alert!',
         //        content: 'Please enter Main Amount',
         //        type: 'dark',
         //        typeAnimated: true,
         //        buttons: {
         //            ok: function() { 
         //                cur_html.val("");
         //                reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
         //                // cur_html.closest("tr").prev().find(".main_amount").focus();
         //                // cur_html.blur();
         //            }
         //        }
         // });

     }


});


// validation for percentage/amount discount
$(document).on('change', ".participantRow .Estimate_Percentage", function() 
{
    var cur_rate_html=$(this).closest("td").next().find(".rate");
    var cur_rate_val = $(this).closest("td").next().find(".rate").val();
    var current=cur_rate_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    if(current=='Percentage')
    {
        Percentage_validation_estimate(cur_rate_html,cur_rate_val);
    }
    else if(current=='Amount')
    {
        var main_amt = cur_rate_html.closest('tr').prev().find('.main_amount').val();
        Amount_validation_estimate(cur_rate_html, cur_rate_val, parseFloat(main_amt));
    }
});

// validation for percentage/amount discount
$(document).on('change', "#Calculate_discounts .Estimate_Percentage", function() 
{
    var cur_rate_html=$(this).closest("td").next().find(".rate");
    var cur_rate_val = $(this).closest("td").next().find(".rate").val();
    var current=cur_rate_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    if(current=='Percentage')
    {
        Percentage_validation_estimate(cur_rate_html,cur_rate_val);
    }
    else if(current=='Amount')
    {
        var main_amt = cur_rate_html.closest('tr').prev().find('.main_amount').val();
        Amount_validation_estimate(cur_rate_html, cur_rate_val, parseFloat(main_amt));
    }
});

$(document).on("keyup", "#estimate_number", function(){
    $(this).removeAttr("style");
    $(this).closest("div").find(".err").remove("");
});

$(document).on("keyup", "input[name='item_descr[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='item_qty[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");

    // alert("hey");

    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_rate").val('');
        $(this).closest("tr").find(".main_amount").val('');
    }
});

$(document).on("keyup", "input[name='item_rate[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
});

$(document).on("keyup", "input[name='item_main_amount[]']", function(){
    $(this).removeAttr("style");
    $(this).closest("td").find(".err").remove("");
    if($(this).val() == '')
    {
        $(this).closest("tr").find(".item_rate").val('');
        $(this).closest("tr").find(".item_qty").val('');
    }
});

$(document).on("change", "#BillingFrom_addr", function(){
    $("#estimateForm #Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").removeAttr("style");
    $(".BillingFrom_address_main").find(".err").remove();  
});

$(document).on("change", "#BillingTo_addr", function(){
    $("#estimateForm #Address_Details_BillTo").find(".BillingTo_address_main .custom-a11yselect-btn").removeAttr("style");
    $(".BillingTo_address_main").find(".err").remove();
});

// Validation for percentage greater than 100% or less than 0%
function Percentage_validation_estimate(cur_html,cur_rate_val)
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
                    reset_percentage_validation_estimate(cur_html,cur_rate_val);
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
                    reset_percentage_validation_estimate(cur_html,cur_rate_val);
                    cur_html.focus();
                }
            }
        });
    }
}

// Validation for percentage greater than or less than item's amount
function Amount_validation_estimate(cur_html,cur_rate_val,main_amt)
{
    if (cur_rate_val!="" && cur_rate_val > main_amt) {
        if(main_amt!=0){
            $.alert({
                title: 'Alert!',
                content: 'Discount amount must be less than '+main_amt+'.',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    ok: function() { 
                        cur_html.val("");
                        reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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
                        reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt);
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

// BillingFromCard Click event
$(document).on("click", ".BillingFromCard", function(){
    $(this).hide();
    $(".BillingFromAddress").hide();
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
                        $("#BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#BillingFrom_gstno").append(data.str_opt);
                        $("#BillingFrom_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingFromAddress").show();
                        $("#BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                        
                        $("#BillFromAddress_street").html("");
                        if(data.address!=""){
                            $("#BillFromAddress_street").html("<span>"+data.address+"</span>");
                        }

                        $("#BillFromAddress_email_phone").html("");
                        if(data.emailid!="" && data.phoneno!=""){
                            $("#BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }

                        // $("#BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");

                        $("#BillFromAddress_num").html("");
                        if(data.gst_num!=""){
                            $("#BillFromAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                        }

                        $("#BillFromAddress_panno").html("");
                        if(data.pan_num!=""){
                            $("#BillFromAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }

                        $("#BillFromAddress_udyam").html("");
                        if(data.udyam_no!=""){
                            $("#BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }

                        $("#billing_address_street").remove();
                        $("#billing_address_city").remove();
                        $("#billing_address_state").remove();
                        $("#billing_address_postal_code").remove();
                        $("#billingaddressgstin").remove();
                        $("#billingaddresspanno").remove();
                        $("#billingemailaddress").remove();
                        $("#billingphoneno").remove();
                        $("#billingfrom_udyamno").remove();

                        $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_street' id='billing_address_street' value='"+data.street+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billfromname' id='billfromname' value='"+data.name+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_city' id='billing_address_city' value='"+data.city+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_state' id='billing_address_state' value='"+data.state+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_postal_code' id='billing_address_postal_code' value='"+data.postal_code+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billingaddressgstin' id='billingaddressgstin' value='"+data.gst_num+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billingaddresspanno' id='billingaddresspanno' value='"+data.pan_num+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billingaddressemailid' id='billingaddressemailid' value='"+data.emailid+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billingaddresshphoneno' id='billingaddresshphoneno' value='"+data.phoneno+"' />");
                        $("#BillFromAddress_street").append("<input type='hidden' name='billingfrom_udyamno' id='billingfrom_udyamno' value='"+data.udyam_no+"' />");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingFrom_address_and_gst").show();
                    $(".BillingFrom_address").empty().append('<option value="">Select Billing Entity</option>');
                    $(".BillingFrom_address_main select").append(data.str_opt);
                    $(".BillingFrom_address").customA11ySelect("refresh");
                    $(".BillingFromAddress").hide();
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
                            $("#Address_Details .BillingFromCard").show();
                            $("#Address_Details .BillingFromCard").css("border-color", '#ad4846');
                        }
                    }
                });
            }
        }
    });
    //$(".BillingFromAddress").show();
});

// BillingToCard Click event
$(document).on("click", ".BillingToCard", function(){
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
                        $("#BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                        $("#BillingTo_gstno").append(data.str_opt);
                        $("#BillingTo_gstno").customA11ySelect('refresh');
                    }
                    else {
                        $(".BillingToAddress").show();
                        $("#BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                        
                        $("#BillToAddress_street").html("");
                        if(data.address!=""){
                            $("#BillToAddress_street").html("<span>"+data.address+"</span>");
                        }

                        $("#BillToAddress_email_phone").html("");
                        if(data.emailid!="" && data.phoneno!=""){
                            $("#BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                        }
                        else if(data.emailid!=""){
                            $("#BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                        }
                        else if(data.phoneno!=""){
                            $("#BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                        }

                        $("#BillToAddress_num").html("");
                        if(data.gst_num!=""){
                            $("#BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                        }

                        $("#BillToAddress_panno").html("");
                        if(data.pan_num!=""){
                            $("#BillToAddress_panno").html("<span><b>PAN: </b>"+data.pan_num+"</span>");
                        }

                        $("#BillToAddress_udyam").html("");
                        if(data.udyam_no!=""){
                            $("#BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_no+"</span>");
                        }

                        $("#shipping_address_street").remove();
                        $("#shipping_address_city").remove();
                        $("#shipping_address_state").remove();
                        $("#shipping_address_postal_code").remove();
                        $("#shippingaddressgstin").remove();
                        $("#shippingaddresspanno").remove();
                        $("#shippingaddressemailid").remove();
                        $("#shippingaddresshphoneno").remove();
                        $("#billingto_udyamno").remove();

                        $("#BillToAddress_name").append("<input type='hidden' name='billtoname' id='billtoname' value='"+data.name+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_street' id='shipping_address_street' value='"+data.street+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_city' id='shipping_address_city' value='"+data.city+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_state' id='shipping_address_state' value='"+data.state+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_postal_code' id='shipping_address_postal_code' value='"+data.postal_code+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shippingaddressgstin' id='shippingaddressgstin' value='"+data.gst_num+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shippingaddresspanno' id='shippingaddresspanno' value='"+data.pan_num+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shippingaddressemailid' id='shippingaddressemailid' value='"+data.emailid+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='shippingaddresshphoneno' id='shippingaddresshphoneno' value='"+data.phoneno+"' />");
                        $("#BillToAddress_street").append("<input type='hidden' name='billingto_udyamno' id='billingto_udyamno' value='"+data.udyam_no+"' />");
                    }
                }
                else if(data.total_num > 1){
                    $(".BillingTo_address_main").show();
                    $(".BillingTo_address_and_gst").show();
                    $(".BillingTo_address").empty().append('<option value="">Select Customer</option>');
                    $(".BillingTo_address_main select").append(data.str_opt);
                    // $(".BillingTo_address").customA11ySelect();
                    $(".BillingTo_address").customA11ySelect("refresh");

                    $(".BillingToAddress").hide();
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
                            $("#Address_Details_BillTo .BillingToCard").show();
                            $("#Address_Details_BillTo .BillingToCard").css("border-color", '#ad4846');
                        }
                    }
                });
            }
        }
    });
    $(".BillingToAddress").show();
});

// Scripts for Billed from
$(document).on("change", "#BillingFrom_addr", function(){
    var sel_id = $('#BillingFrom_addr option:selected').data('id');
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
            $(".BillingFrom_gst_main").find(".err").remove();  
            if(data.total_gst == 1)
            {   
                $(".BillingFrom_address_main").hide();
                $(".BillingFrom_gst_main").hide();
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

                $("#BillFromAddress_name").html("<span><b>"+data.name+"</b></span>");
                if(data.address!=""){
                    $("#BillFromAddress_street").html("<span>"+data.address+"</span>");
                }
                $("#BillFromAddress_email_phone").html("");
                if(data.emailid!="" && data.phoneno!=""){
                    $("#BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#BillFromAddress_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#BillFromAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                }
                
                $("#BillFromAddress_num").html("");
                if(data.gst_num)
                {
                    $("#BillFromAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                    // Enabled item level GST fields
                    $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                    // Enabled invoice level GST fields
                    $("#FinanceEstimateModal #Calculate_discounts .CGST_TR_section").next().show();

                    $("#Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");
                }
                else
                {
                    estimate_disabled_all_gst_fields();
                }

                $("#BillFromAddress_panno").html("");
                if(data.panno!=""){
                    $("#BillFromAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }
                $("#BillFromAddress_udyam").html("");
                if(data.udyam_registration_no!=""){
                    $("#BillFromAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#billing_address_street").remove();
                $("#billing_address_city").remove();
                $("#billing_address_state").remove();
                $("#billing_address_postal_code").remove();
                $("#billingaddressgstin").remove();
                $("#billingaddresspanno").remove();
                $("#billingemailaddress").remove();
                $("#billingphoneno").remove();
                $("#billingfrom_udyamno").remove();
                $("#total_gst_count").remove();

                // Hidden fields to post the data
                $("#BillFromAddress_name").append("<input type='hidden' name='billfromname' id='billfromname' value='"+data.name+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_street' id='billing_address_street' value='"+data.street+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_city' id='billing_address_city' value='"+data.city+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_state' id='billing_address_state' value='"+data.state+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billing_address_postal_code' id='billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billingaddressgstin' id='billingaddressgstin' value='"+data.gst_num+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billingaddresspanno' id='billingaddresspanno' value='"+data.panno+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billingemailaddress' id='billingemailaddress' value='"+data.emailid+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billingphoneno' id='billingphoneno' value='"+data.phoneno+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='billingfrom_udyamno' id='billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");
                $("#BillFromAddress_street").append("<input type='hidden' name='total_gst_count' id='total_gst_count' value='"+data.total_gst_nums+"' />");

                if(data.total_gst_nums == 0){
                    $("select[name='item_gst_type[]']").each(function(){
                        // alert("Inside each loop");
                        $("select[name='item_gst_type[]']").attr("readonly", "readonly"); 
                    });
                }
            }
            else if(data.total_gst > 1)
            {
                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails_dropdown").show();
                $(".BillingFromGSTDetails").hide();
                $("#BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#BillingFrom_gstno").append(data.str_opt);
                $("#BillingFrom_gstno").customA11ySelect('refresh');
            }
            else
            {
                $(".BillingFrom_gst_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $(".BillingFromGSTDetails").hide();
                $("#BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#BillingFrom_gstno").customA11ySelect('refresh');
            }
         }
         else
         {
            $(".BillingFrom_gst_main").hide();
            $(".BillingFromGSTDetails_dropdown").hide();
            $(".BillingFromGSTDetails").hide();
            $("#BillingFrom_gstno").empty().append('<option value="">Select GSTIN</option>');
            $("#BillingFrom_gstno-menu").customA11ySelect('refresh');
         }
      }
    });
});

function estimate_disabled_all_gst_fields()
{
    // For item level GST type dropdown
    $('option:selected', $("#participantTable .participantRow .CGST_TR_section").find(".Estimate_IGSTandCGST").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST type fields plugin
    $("#participantTable .participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#participantTable .participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#participantTable .participantRow .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For item level GST rate dropdown
    $('option:selected', $("#participantTable .participantRow .CGST_TR_section").find(".invoice_DiscountPer").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For item level GST rate fields plugin
    $("#participantTable .participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#participantTable .participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected  custom-a11yselect-focused");
    $("#participantTable .participantRow .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For hiding delete icon
    $("#participantTable .participantRow .CGST_TR_section").find(".estimate_remove_adddiscount").hide();
    
    // For hiding SGST row
    $("#participantTable .participantRow .SGST_Discount").hide();
    
    // For hiding hidden fields
    $(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    // For label of GST values
    $("#participantTable .participantRow .CGST_TR_section").find(".main_amount").html("");
    $("#participantTable .participantRow .CGST_TR_section").find(".main_amount").html("₹ 0000.00");

    $("#estimate_summary_value").val(2);

    // Disabled item level GST fields
    $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee","opacity":"1", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
    
    // Disabled estimate level GST fields
    $('option:selected', $("#Calculate_discounts .CGST_TR_section .GST_section").find("#Calculate_IGSTandCGST_select").val("")).attr('selected',true).siblings().removeAttr('selected');

    // For estimate level GST type fields plugin
    $("#Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#Calculate_discounts .CGST_TR_section .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");

    // For estimate level GST rate dropdown
    $('option:selected', $("#Calculate_discounts .CGST_TR_section").find("#Calculate_rate").val(0)).attr('selected',true).siblings().removeAttr('selected');

    // For estimate level GST rate field plugin
    $("#Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-menu li[data-val='0']").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    $("#Calculate_discounts .CGST_TR_section .rate_data").find(".custom-a11yselect-btn .custom-a11yselect-text").text("0%");

    // For estimate level gst hidden fields
    $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    
    // Hide estimate level SGST row
    $("#Calculate_discounts .SGST_Discount").hide();

    // For estimate level GST values label
    $("#Calculate_discounts .CGST_TR_section").find(".main_amount").html("");
    $("#Calculate_discounts .CGST_TR_section").find(".main_amount").html("₹ 0000.00");
    // For estimate level delete icon hide
    $("#Calculate_discounts .CGST_TR_section").find(".estimate_remove_adddiscount").hide();

    // For estimate level GST fields disable
    $("#Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
}

$(document).on("change", "#BillingFrom_gstno", function(){
    var sel_id = $('#BillingFrom_gstno option:selected').data('id');
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

                $(".BillingFrom_gst_main").show();
                $(".BillingFromGSTDetails").show();
                $(".BillingFrom_address_main").hide();
                $(".BillingFromGSTDetails_dropdown").hide();
                $("#BillFromGST_name").html("<span><b>"+data.name+"</b></span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#BillFromGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#BillFromGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#BillFromGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }

                $("#BillFromGST_street").html("<span>"+data.address+"</span>");

                // Enabled item level GST fields
                $("#participantTable .participantRow .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                // Enabled invoice level GST fields
                $("#Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").removeAttr("style");

                $("#BillFromGST_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                $("#BillFromGST_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                if(data.udyam_registration_no){
                    $("#BillFromGST_state").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#billing_address_street").remove();
                $("#billing_address_city").remove();
                $("#billing_address_state").remove();
                $("#billing_address_postal_code").remove();
                $("#billingaddressgstin").remove();
                $("#billingaddresspanno").remove();
                $("#billingemailaddress").remove();
                $("#billingphoneno").remove();
                $("#billingfrom_udyamno").remove();
                $("#total_gst_count").remove();

                // Hidden fields to post the data
                $("#BillFromGST_name").append("<input type='hidden' name='billfromname' id='billfromname' value='"+data.name+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billing_address_street' id='billing_address_street' value='"+data.street+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billing_address_city' id='billing_address_city' value='"+data.city+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billing_address_state' id='billing_address_state' value='"+data.state+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billing_address_postal_code' id='billing_address_postal_code' value='"+data.postal_code+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billingaddressgstin' id='billingaddressgstin' value='"+data.gst_num+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billingaddresspanno' id='billingaddresspanno' value='"+data.panno+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billingemailaddress' id='billingemailaddress' value='"+data.emailid+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billingphoneno' id='billingphoneno' value='"+data.phoneno+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='billingfrom_udyamno' id='billingfrom_udyamno' value='"+data.udyam_registration_no+"' />");
                $("#BillFromGST_street").append("<input type='hidden' name='total_gst_count' id='total_gst_count' value='"+data.total_gst_nums+"' />");

                if(data.total_gst_nums == 0){
                    $("select[name='item_gst_type[]']").each(function(){
                       $(this).attr("readonly", true); 
                    });
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
$(document).on("change", "#BillingTo_addr", function(){
    var sel_id = $('#BillingTo_addr option:selected').data('id');
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
                    $(".BillingTo_address_main").hide();
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToAddress").show();
                    
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
                    
                    $("#BillToAddress_name").html("<span><b>"+data.name+"</b></span>");
                    $("#BillToAddress_street").html("<span>"+data.address+"</span>");
                    
                    if(data.emailid!="" && data.phoneno!=""){
                        $("#BillToAddress_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                    }
                    else if(data.emailid!=""){
                        $("#BillToAddress_email_phone").html("<span>"+data.emailid+"</span>");
                    }
                    else if(data.phoneno!=""){
                        $("#BillToAddress_email_phone").html("<span>"+data.phoneno+"</span>");
                    }

                    $("#BillToAddress_num").html("");
                    if(data.gst_num){
                        $("#BillToAddress_num").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");
                    }
                    if(data.panno){
                        $("#BillToAddress_panno").html("<span><b>PAN: </b>"+data.panno+"</span>");
                    }
                    if(data.udyam_registration_no!=""){
                        $("#BillToAddress_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                    }

                    $("#shipping_address_street").remove();
                    $("#shipping_address_city").remove();
                    $("#shipping_address_state").remove();
                    $("#shipping_address_postal_code").remove();
                    $("#shippingaddressgstin").remove();
                    $("#shippingaddresspanno").remove();
                    $("#shippingaddressemailid").remove();
                    $("#shippingaddresshphoneno").remove();
                    $("#billingto_udyamno").remove();

                    // Hidden fields to post the data
                    $("#BillToAddress_name").append("<input type='hidden' name='billtoname' id='billtoname' value='"+data.name+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_street' id='shipping_address_street' value='"+data.street+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_city' id='shipping_address_city' value='"+data.city+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_state' id='shipping_address_state' value='"+data.state+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shipping_address_postal_code' id='shipping_address_postal_code' value='"+data.postal_code+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shippingaddressgstin' id='shippingaddressgstin' value='"+data.gst_num+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shippingaddresspanno' id='shippingaddresspanno' value='"+data.panno+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shippingaddressemailid' id='shippingaddressemailid' value='"+data.emailid+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='shippingaddresshphoneno' id='shippingaddresshphoneno' value='"+data.phoneno+"' />");
                    $("#BillToAddress_street").append("<input type='hidden' name='billingto_udyamno' id='billingto_udyamno' value='"+data.udyam_registration_no+"' />");
                }
                else if(data.total_gst > 1)
                {
                    $(".BillingTo_gst_main").show();
                    $(".BillingToGSTDetails").hide();
                    $(".BillingToGSTDetails_dropdown").show();
                    $("#BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#BillingTo_gstno").append(data.str_opt);
                    $("#BillingTo_gstno").customA11ySelect('refresh');
                }
                else
                {
                    $(".BillingTo_gst_main").hide();
                    $(".BillingToGSTDetails_dropdown").hide('refresh');
                    $(".BillingToGSTDetails").hide();
                    $("#BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                    $("#BillingTo_gstno").customA11ySelect();
                }
            }
            else
            {
                $(".BillingTo_gst_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $(".BillingToGSTDetails").hide();
                $("#BillingTo_gstno").empty().append('<option value="">Select GSTIN</option>');
                $("#BillingTo_gstno").customA11ySelect('refresh');
            }
      }
    });
});

$(document).on("change", "#BillingTo_gstno", function(){
    var sel_id = $('#BillingTo_gstno option:selected').data('id');
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
                
                $(".BillingTo_gst_main").find(".err").remove();
                
                $(".BillingTo_address_main").hide();
                $(".BillingToGSTDetails_dropdown").hide();
                $("#BillToGST_name").html("<span><b>"+data.name+"</b></span>");
                $("#BillToGST_address").html("<span>"+data.address+"</span>");

                if(data.emailid!="" && data.phoneno!=""){
                    $("#BillToGST_email_phone").html("<span>"+data.emailid+"</span>, <span>"+data.phoneno+"</span>");
                }
                else if(data.emailid!=""){
                    $("#BillToGST_email_phone").html("<span>"+data.emailid+"</span>");
                }
                else if(data.phoneno!=""){
                    $("#BillToGST_email_phone").html("<span>"+data.phoneno+"</span>");
                }
                $("#BillToGST_gst").html("<span><b>GSTIN: </b>"+data.gst_num+"</span>");

                if(data.panno!=""){
                    $("#BillToGST_pan").html("<span><b>PAN: </b>"+data.panno+"</span>");
                }

                if(data.udyam_registration_no!=""){
                    $("#BillToGST_udyam").html("<span><b>UDYAM REGISTRATION NO.: </b>"+data.udyam_registration_no+"</span>");
                }

                $("#BillToGST_name").append("<input type='hidden' name='billtoname' id='billtoname' value='"+data.name+"' />");
                $("#shipping_address_street").remove();
                $("#shipping_address_city").remove();
                $("#shipping_address_state").remove();
                $("#shipping_address_postal_code").remove();
                $("#shippingaddressgstin").remove();
                $("#shippingaddresspanno").remove();
                $("#shippingaddressemailid").remove();
                $("#shippingaddresshphoneno").remove();
                $("#billingto_udyamno").remove();
                
                $("#BillToGST_address").append("<input type='hidden' name='shipping_address_street' id='shipping_address_street' value='"+data.street+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shipping_address_city' id='shipping_address_city' value='"+data.city+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shipping_address_state' id='shipping_address_state' value='"+data.state+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shipping_address_postal_code' id='shipping_address_postal_code' value='"+data.postal_code+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shippingaddressgstin' id='shippingaddressgstin' value='"+data.gst_num+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shippingaddresspanno' id='shippingaddresspanno' value='"+data.panno+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shippingaddressemailid' id='shippingaddressemailid' value='"+data.emailid+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='shippingaddresshphoneno' id='shippingaddresshphoneno' value='"+data.phoneno+"' />");
                $("#BillToGST_address").append("<input type='hidden' name='billingto_udyamno' id='billingto_udyamno' value='"+data.udyam_registration_no+"' />");
            }
            else
            {
                $(".BillingToGSTDetails").hide();
            }
        }
    });
});

// On change event of discount type  i.e Percentage or Amount (item level)
$(document).on('change','#estimateForm #participantTable .Estimate_Percentage',function(){

    // item_discount_type_change(this);
    
    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_amt = 0;
    var selected_gst_type = $(this).closest('tr').next().find('.GST_section .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;
    var amt_val = $(this).closest('tr').prev().find("input[name='item_main_amount[]']").val();

    // Estimate level GST
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var est_split_tax = est_selected_gst_per / 2;

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    if(a!="Select Type")
    {
        // $("#estimate_calculated_disc_amt, #estimate_disc_amt").val(0);

        // $("#Calculate_discounts .discount_section").closest("tr").hide();

        for_hiding_estimate_level_percentage();

        $("#Calculate_discounts").find(".discount_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $("#Estimate_Percentage_select-button .custom-a11yselect-text").text('Select Type');
        
        $("#Estimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused");
        $("#Estimate_Percentage_select-menu li[data-val='Select Type']").addClass("custom-a11yselect-selected");

        $("#Calculate_discounts .discount_section").closest("tr").find('.estimate_remove_adddiscount').hide();
        $("#Calculate_discounts .discount_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#Calculate_discounts .discount_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#Calculate_discounts .discount_section").closest("tr").find('.estimate_sgst_amount').val(0);
        $("#Calculate_discounts .discount_section").closest("tr").find('.main_amount').text("₹ 0000.00");

        $(this).closest("tr").find(".estimate_remove_discount").css("display","inline-block");

        /*var cur_rate_html=$(this).closest("tr").find(".rate");
        var cur_rate_val=$(this).closest("tr").find(".rate").val();
        var new_cal = 0;
        if(a=="Percentage")
        {
            var cur_rate_html=$(this).closest("tr").find(".rate");
            var cur_rate_val=$(this).closest("tr").find(".rate").val();
            Percentage_validation_estimate(cur_rate_html,cur_rate_val);

            if(amt_val != ""){
                disc_amt = (cur_rate_val/100) * amt_val;
            }
            else{
                $(this).closest('tr').find(".main_amount").text("");
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
            }

            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    var amt_after_discount = amt_val - disc_amt;
                    new_cal = (selected_gst_per * amt_after_discount)/100;
                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);

                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var new_cal_amt = amt_val - disc_amt;
                    new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".item_igst_amount").val(0);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }

                if(selected_gst_per!=0){
                    $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else {
                    $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                }
            }
            else{
                $(this).closest("tr").next().find(".main_amount").text("");
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");

                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }
        if(a=="Amount")
        { 
            var cur_rate_val = $(this).closest("tr").find(".rate").val();

            if(amt_val != "" && cur_rate_val != ""){
                disc_amt = amt_val - cur_rate_val;
            }
            else{
                $(this).closest('tr').find(".main_amount").text("");
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
            }

            if(selected_gst_type != "Select Type")
            {
                if(selected_gst_type == 'IGST')
                {
                    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var new_cal = (selected_gst_per * disc_amt)/100;

                    if(selected_gst_per!=0){
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else {
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                    }

                    $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(0);
                }
                if(selected_gst_type == 'CGST'){
                    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
                    var split_tax = selected_gst_per / 2;
                    var new_cal = (split_tax * disc_amt)/100;

                    if(selected_gst_per!=0){
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else {
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00"); 
                    }
                    $(this).closest("tr").next().find(".item_igst_amount").val(0);
                    $(this).closest("tr").next().find(".item_cgst_amount, .item_sgst_amount").val(new_cal);
                }
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
                $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+cur_rate_val+"'>");
            }
            else{
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='0'>");
            }
        }
        if(a=="Percentage"){
            if(cur_rate_val){
                $(this).closest('tr').find(".main_amount").text("₹ "+disc_amt.toFixed(2));
                $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+disc_amt+"'>");
            }
            else {
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').next().find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='0'>");
            }
        }*/

        $("#estimate_items_discount_selected").val(1);
    }
    else
    {   
        $("#estimate_items_discount_selected").val(0);

        $("#Calculate_discounts .discount_section").closest("tr").show();
        $("#Calculate_discounts .discount_section").closest("tr").find(".main_amount").text("₹ 0000.00");
        // $("#Calculate_discounts .discount_section").closest("tr").show();
        reset_estimate_level_discount_details();
        for_hiding_estimate_level_percentage();

        /*var new_cal = 0;
        if(selected_gst_type!="Select Type")
        {
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
        else{
            $(this).closest("tr").find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
        }*/
        /*$(this).closest('tr').find(".main_amount .calculated_discount").val(0);
        $(this).closest('tr').find(".main_amount").text("");
        $(this).closest('tr').find(".main_amount").text("₹ 0000.00");*/
        $(this).closest("tr").find(".estimate_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");
    }

    // item_discount_type_change();    
    // item_discount_rate_change();    

    // Remove color when for any item both discount & gst is selected
    create_estimate_remove_panel_color();
    cal_estimate_level_amts();
    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
    // estimate_level_discount_change();
    // estimate_level_gst_change();

    /*var t = total_amount_for_estimate_level_discount();
    calculate_estimate_level_discount(t);*/

    /*var t = $("#total_estimate_value").val();
    if(est_selected_gst_type != "Select Type")
    {   // If estimate level gst type is selected
        if(est_selected_gst_type == 'IGST'){
            var new_cal = (est_selected_gst_per * t)/100;
            // Values into the hidden fields of igst
            $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
        }
        if(est_selected_gst_type == 'CGST'){
            var new_cal = (est_split_tax * t)/100;
            // Values into the hidden fields of cgst & sgst
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
    }*/

    // $("#total_estimate_value").val(0);
    // $("#total_estimate_value").val(t);

});

function for_hiding_estimate_level_percentage()
{
    var len = $(".participantRow .main-group").length;
    var flag = 0 ;
    var arr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".participantRow .main-group").eq(v).next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arr.push(selected_type) ;
        }

        
    }

    if(arr.length == 0)
    {
        $("#Calculate_discounts .discount_section").closest("tr").show();
        $("#estimate_items_discount_selected").val(0);
        // reset_estimate_level_discount_details();
    }
    else
    {   
        $("#Calculate_discounts .discount_section").closest("tr").hide();
        $("#estimate_items_discount_selected").val(1);

    }
}


function for_hiding_estimate_level_GST()
{
    var len = $(".participantRow .main-group").length;
    var flag = 0 ;
    var arrr = [];
    for(var v=0 ; v<len ; v++)
    {
        var selected_type = $(".participantRow .main-group").eq(v).next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(selected_type != 'Select Type')
        {

          arrr.push(selected_type) ;
          // console.log(selected_type);
        }

        
    }

    if(arrr.length == 0)
    {
        $("#Calculate_discounts .CGST_TR_section").show();
        $("#estimate_items_gst_type_selected").val(0);
    }
    else
    {   
        $("#Calculate_discounts .CGST_TR_section").hide();
        $("#estimate_items_gst_type_selected").val(1);

    }
}



// Remove color when for any item both discount & gst is selected
function create_estimate_remove_panel_color()
{
    var items_est_selected_disc = $("#estimate_items_discount_selected").val();
    var items_est_selected_gst = $("#estimate_items_gst_type_selected").val();
    if(items_est_selected_disc==1 && items_est_selected_gst==1){
    $("#FinanceEstimateModal #estimate_calculation .panel-heading").addClass("remove-panel-color");
    }
    else
    {
    $("#FinanceEstimateModal #estimate_calculation .panel-heading").removeClass("remove-panel-color");

    }
}

// On change event of GST type (item level)
$(document).on("change", "#participantTable .Estimate_IGSTandCGST", function(){
    
    var a_blank;

    // item_gst_type_change(this);
    var a = $(this).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    
    if(a=="Select Type"){
        a_blank = "";
    }
    else {
        a_blank = a;
    }
    
    // Make dropdown option selected when select any
    $("select[name='item_gst_type[]']").each(function(){
        $('option:selected', $("select[name='item_gst_type[]']").val(a_blank)).attr('selected',true).siblings().removeAttr('selected');
    });
    
    if(a!="Select Type")
    {
        $("#Calculate_discounts .CGST_TR_section").closest("tr").hide();
        $("#Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_remove_adddiscount').hide();
        $("#Calculate_discounts #SGST_Calculate").closest("tr").hide();
        $("#Calculate_discounts .SGST_Discount").closest("tr").find('.estimate_remove_adddiscount').hide();

        $("#Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_igst_amount').val(0);
        $("#Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_cgst_amount').val(0);
        $("#Calculate_discounts .CGST_TR_section").closest("tr").find('.estimate_sgst_amount').val(0);

        $("#Calculate_discounts .CGST_TR_section").closest("tr").find('.main_amount').text("₹ 0000.00");
        $("#Calculate_discounts .SGST_Discount").closest("tr").find('.main_amount').text("₹ 0000.00");

        $("#items_selected_gst_type").val("");
        $("#items_selected_gst_type").val(a);

        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text(a);
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-menu li[data-val='"+a+"']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

        // $(this).closest("tr").find('.estimate_remove_adddiscount').show();
        
        var element=$("#Calculate_discounts .CGST_TR_section").closest("tr");
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

        if(a == 'CGST')
        {
            $("#participantTable .participantRow .CGST_TR_section").next().show();
            $("#participantTable .participantRow .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","inline-block");


        }
        else if(a == 'IGST')
        {
            $("#participantTable .participantRow .CGST_TR_section").next().hide();

        }
            $("#participantTable .participantRow .CGST_TR_section").find(".estimate_remove_adddiscount").css("display","inline-block");

        //var curr_tax = $(this).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        // var main_amount = 0;
        /*var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;

        var len = $("#participantTable .participantRow .main-group").length;
        var main_amount = 0;
        for(var s=0;s<len;s++)
        {
            var n = $(this).closest("#participantTable .participantRow").find(".main-group").eq(s);
            var curr_tax = n.next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
            var m = n.next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
            if(m == 'IGST')
            {
                $("#participantTable .participantRow .SGST_Discount").hide();

                main_amount = n.find(".main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().find(".calculated_discount").val();
                var disc_type = n.next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type")
                {
                    amt_after_discount = main_amount - calculated_disc;
                    // if(disc_type == 'Percentage'){
                        // calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    // }
                    // if(disc_type == 'Amount'){
                        calculated_tax_amt = (curr_tax * amt_after_discount)/100;
                    // }
                }
                else{
                    calculated_tax_amt = (curr_tax * main_amount)/100;
                }
                n.next().next().find(".main_amount").text("");
                if(curr_tax!=0){
                    n.next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                }
                else {
                    n.next().next().find(".main_amount").text("₹ 0000.00");
                }
                n.next().next().find(".item_cgst_amount").val(0);
                n.next().next().find(".item_sgst_amount").val(0);
                n.next().next().find(".item_igst_amount").val(calculated_tax_amt);
            }
            if(m == 'CGST'){
                $("#participantTable .participantRow .SGST_Discount").show();

                // 30 oct 2020
                $("#participantTable .participantRow .SGST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");


                main_amount = n.find(".main_amount").val();
                //console.log(s+" "+main_amount);
                calculated_disc = n.next().find(".calculated_discount").val();
                var split_tax = curr_tax / 2;
                var disc_type = n.next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").text();
                if(disc_type!="Select Type"){
                    amt_after_discount = main_amount - calculated_disc;
                    // if(disc_type == 'Percentage'){
                        // calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    // }
                    // if(disc_type == 'Amount'){
                        calculated_tax_amt = (split_tax * amt_after_discount)/100;
                    // }
                }
                else{
                    calculated_tax_amt = (split_tax * main_amount)/100;
                }

                if(curr_tax!=0){
                    n.next().next().find(".main_amount").text("");
                    n.next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                    n.next().next().next().find(".main_amount").text("");
                    n.next().next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
                }
                else {
                    n.next().next().find(".main_amount").text("");
                    n.next().next().find(".main_amount").text("₹ 0000.00");
                    n.next().next().next().find(".main_amount").text("");
                    n.next().next().next().find(".main_amount").text("₹ 0000.00");
                }
                n.next().next().find(".item_cgst_amount").val(calculated_tax_amt);
                n.next().next().find(".item_sgst_amount").val(calculated_tax_amt);
                n.next().next().find(".item_igst_amount").val(0);
            }
            n.next().next().find(".estimate_remove_adddiscount").show();
        }*/

        $("#estimate_items_gst_type_selected").val(1);
    }
    else{

        $("#estimate_items_gst_type_selected").val(0);

        $("#participantTable .CGST_TR_section").closest("tr").find('.item_igst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_cgst_amount').val(0);
        $("#participantTable .CGST_TR_section").closest("tr").find('.item_sgst_amount').val(0);

        // 30 oct 2020

        // $(this).closest("tr").find(".main_amount").text("");
        // $(this).closest("tr").find(".main_amount").text("₹ 0000.00"); 
        // $(this).closest("tr").next().find(".main_amount").text("");
        // $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");

        //$("#Calculate_IGSTandCGST_select").closest("tr").show();
        $("#Calculate_discounts .CGST_TR_section").closest("tr").show();
        $("#items_selected_gst_type").val("");
        
        //  30 oct 2020

        var element11 = $("#participantTable .participantRow .GST_section ").closest("tr");

        element11.find(".main_amount").text("");
        element11.find(".main_amount").text("₹ 0000.00"); 
        element11.next().find(".main_amount").text("");
        element11.next().find(".main_amount").text("₹ 0000.00");

        // reset gst section field

        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-btn").attr("aria-activedescendant",'-option-0');
        $("#participantTable .participantRow .GST_section ").find(".custom-a11yselect-text").text('Select Type');
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $("#participantTable .participantRow .GST_section").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        
        $("#participantTable .participantRow .CGST_TR_section").find(".estimate_remove_adddiscount").css("display","none");
        
        $("#participantTable .participantRow .CGST_TR_section").next().find(".estimate_remove_adddiscount").css("display","none");
        
        $("#participantTable .participantRow .CGST_TR_section").next().hide();
        
        // reset rate field

        var element12 = $(".participantRow .CGST_TR_section .rate_data");

        element12.find(".custom-a11yselect-btn").attr("aria-activedescendant",'-option-0');
        element12.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
        element12.find(".custom-a11yselect-btn .custom-a11yselect-text").text('0%');
        element12.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        element12.find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='0']").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");
    
        // reset rate field

        var element12 = $(".participantRow .CGST_TR_section .rate_data");

        element12.find(".custom-a11yselect-btn").attr("aria-activedescendant",'-option-0');
        element12.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
        element12.find(".custom-a11yselect-btn .custom-a11yselect-text").text('0%');
        element12.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        element12.find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='0']").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        // Make dropdown option selected when select any
        $("select[name='item_gst_discont[]']").each(function(){
            $('option:selected', $("select[name='item_gst_discont[]']").val(0)).attr('selected',true).siblings().removeAttr('selected');
        });

        reset_estimate_level_gst_details();
    }
    // Remove color when for any item both discount & gst is selected
    create_estimate_remove_panel_color();
    cal_estimate_level_amts();
    // estimate_level_discount_change();
    // estimate_level_gst_change();
});

// On change event of GST rate (item level)
$(document).on("change", "#participantTable .DiscountPer", function(){
    
    // item_gst_rate_change(this);

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type")
    {
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount = 0;
        var calculated_disc = 0;
        var calculated_tax_amt = 0;
        var amt_after_discount = 0;
        if(a == 'IGST')
        {
            main_amount = $(this).closest('tr').prev().prev().find(".main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".calculated_discount").val();
            
            var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
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
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".item_cgst_amount").val(0);
            $(this).closest("td").find(".item_sgst_amount").val(0);
            $(this).closest("td").find(".item_igst_amount").val(calculated_tax_amt);
        }
        if(a == 'CGST'){
            main_amount = $(this).closest('tr').prev().prev().find(".main_amount").val();
            calculated_disc = $(this).closest('tr').prev().find(".calculated_discount").val();
            
            var split_tax = curr_tax / 2;
            
            var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
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
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".item_igst_amount").val(0);
            $(this).closest("td").find(".item_cgst_amount").val(calculated_tax_amt);
            $(this).closest("td").find(".item_sgst_amount").val(calculated_tax_amt);
            $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }*/
    $("#estimate_summary_value").val(2);
    cal_estimate_level_amts();
    // estimate_level_discount_change();
    // estimate_level_gst_change();
});

// Remove button clicked in front of amount (item level)
$(document).on('click','#FinanceEstimateModal .estimate_remove',function(){

    var row_element = $(this).closest("tr");
    row_element.next().remove();
    row_element.next().remove();
    row_element.next().remove();
    row_element.remove();
    
    var len = $("#FinanceEstimateModal .participantRow .main-group").length;

    $("#total_items").val(len);

    for(var g=0;g<len;g++)
    {
        var s=g+1;
        $(".participantRow .main-group").eq(g).find(".sno").html(s);
    }
  
    // $(this).closest("tr").find("input").val("");

    // var len = $("#participantTable .participantRow .main-group").length;
    // for(k=0;k<len;k++)
    // {
    //     if($("#total_items").val()!=1){
    //     // if($("#total_items").val()>0){
    //         // var row_element = $(this).closest("tr").eq(k);
    //         // row_element.next().next().next().remove();
    //         // row_element.next().next().remove();
    //         // row_element.next().remove();
    //         // row_element.remove();
    //     }
    //     else {
    //         $("#FinanceEstimateModal .main-group .sub_checkbox").prop('checked',false);

    //         var element = $(this).closest("tr").eq(k).next();
    //         element.find(".rate").val("");
    //         var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    //         var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element,id,text_msg);

    //         element.next().find("input").val("");
    //         element.next().find(".main_amount .calculated_discount").val(0);
    //         element.next().find(".main_amount").text("₹ 0000.00");
    //         element.next().find(".estimate_remove_discount").hide();
    //         element.next().next().find(".estimate_remove_adddiscount").hide();
    //         element.next().next().next().find(".estimate_remove_adddiscount").hide();

    //         $(this).closest("tr").next().find("input").val("");
    //         $(this).closest("tr").next().find(".main_amount .calculated_discount").val(0);
    //         // $(this).closest("tr").next().find(".main_amount").text('₹ 0000.00');
    //         $(this).closest('tr').next().find(".main_amount").text("");
    //         $(this).closest('tr').next().find(".main_amount").append("₹ 0000.00 <input type='hidden' name='calculated_discount[]' class='calculated_discount' value='0'>");
    //         $(this).closest("tr").next().find(".estimate_remove_discount").hide();
    //         $(this).closest("tr").next().next().find(".estimate_remove_adddiscount").hide();
    //         $(this).closest("tr").next().next().next().find(".estimate_remove_adddiscount").hide();
    //         $(this).closest("tr").next().next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);

    //         // First GST rate field
    //         var element1=element.next().find(".rate_data");
    //         var cgst_rate_id=element1.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cgst_rate_text=element1.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element1,cgst_rate_id,cgst_rate_text);

    //         // for CGST field
    //         var element2=element.next().find(".GST_section");
    //         element.next().find(".main_amount").text("₹ 0000.00");
    //         var cur_id=element2.find(".custom-a11yselect-menu li:first").attr("id");
    //         var cur_text=element2.find(".custom-a11yselect-menu li:first button").text();
    //         ResetDiscount(element2,cur_id,cur_text);

    //         //for hide sgst row
    //         element.next().next().hide();
    //     }
    // }

    // if($("#total_items").val() > 1){
    //     $("#total_items").val(parseFloat($("#total_items").val()) - 1);
    // }
    // if(len > 1){
    //     len = len - 1;
    //     $("#total_items").val(len);

    //     for(var g=0;g<len;g++)
    //     {
    //         var s=g+1;
    //         $(".participantRow .main-group").eq(g).find(".sno").html(s);
    //     }
    // }
    // $("#items_selected_gst_type").val('');
    // $("#Calculate_discounts .discount_section").closest("tr").show();

    // var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    // var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    // var est_split_tax = est_selected_gst_per / 2;

    // var s = total_amount_for_estimate_level_discount();
    // if(s){
    //     calculate_estimate_level_discount(s);
    //     if(est_selected_gst_type != "Select Type")
    //     {   // If estimate level gst type is selected
    //         if(est_selected_gst_type == 'IGST'){
    //             var new_cal = (est_selected_gst_per * s)/100;
    //             // Values into the hidden fields of igst
    //             $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
    //         }
    //         if(est_selected_gst_type == 'CGST'){
    //             var new_cal = (est_split_tax * s)/100;
    //             // Values into the hidden fields of cgst & sgst
    //             $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
    //             $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
    //             $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
    //         }
    //         $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
    //     }   
    //     $("#total_estimate_value").val(0);
    //     $("#total_estimate_value").val(s);
    // }
    // else{
    //     var no=$("#estimateForm .participantRow .main-group").length;
    //     var estimate_element = $("#Calculate_discounts");
    //     if(no == 1){
    //         // Estimate level discount row reset
    //         $("#estimate_disc_amt").val("");
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
    //         $("#total_estimate_value, #estimate_subtotal_amount, #estimate_totaldiscount_amount, #estimate_totaltaxes_amount, #estimatetotal_amount").val(0);
    //         $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    //     else{
    //         var k = get_all_item_rows_main_total();
    //         calculate_estimate_level_discount(k);

    //         if(est_selected_gst_type != "Select Type")
    //         {   // If estimate level gst type is selected
    //             if(est_selected_gst_type == 'IGST'){
    //                 var new_cal = (est_selected_gst_per * k)/100;
    //                 // Values into the hidden fields of igst
    //                 $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
    //             }
    //             if(est_selected_gst_type == 'CGST'){
    //                 var new_cal = (est_split_tax * k)/100;
    //                 // Values into the hidden fields of cgst & sgst
    //                 $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
    //                 $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
    //                 $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
    //             }
    //             $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
    //         }
    //         $("#total_estimate_value").val(0);
    //         $("#total_estimate_value").val(k);
    //         $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    //     }
    // }

    

    var sub_checkbox_len=$(".participantRow .main-group .sub_checkbox:checked").length;

    if(sub_checkbox_len == 0)
    {
        $("#FinanceEstimateModal .header_delete").css("display","none");
    }
    $("#estimate_summary_value").val(2);
    cal_estimate_level_amts();

    var len1 = $("#participantTable .participantRow .main-group").length;

    if(len1 == 0)
    {
        $('.participantRow').append(estimate_items_add);
        $(".Estimate_Percentage").customA11ySelect();
        $(".Estimate_IGSTandCGST").customA11ySelect();
        $(".DiscountPer").customA11ySelect();
        $("#total_items").val(1);
        $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
        reset_estimate_level_discount_details();
        reset_estimate_level_gst_details();
    }

    // 4 oct 2020

    for_hiding_estimate_level_percentage();
    for_hiding_estimate_level_GST();
    create_estimate_remove_panel_color();

});


// Remove button clicked in front of SGST
$(document).on('click','.SGST_Discount .estimate_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").prev().find(".Estimate_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").prev().find(".DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(".participantRow").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(".participantRow").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(".participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var len = $("#participantTable .participantRow .main-group").length;
    for(k=0;k<len;k++)
    {
        var element = $(this).closest("#participantTable .participantRow").find(".SGST_Discount").eq(k);
        var current = element.prev().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
        if(current == 'CGST')
        {
            element.css("display","none");

            // my changes start 3 oct 2020
            element.prev().find(".estimate_remove_adddiscount").css("display","none");
            element.prev().find(".main_amount").text("");
            element.prev().find(".main_amount").text("₹ 0000.00");
            // my changes end

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

        element.find(".main_amount").text("");
        element.closest("tr").prev().find(".main_amount").text("₹ 0000.00");
        element.next().find(".main_amount").text("");
        element.next().find(".main_amount").text("₹ 0000.00");

        element.closest("tr").prev().find(".item_igst_amount").val(0);
        element.closest("tr").prev().find(".item_cgst_amount").val(0);
        element.closest("tr").prev().find(".item_sgst_amount").val(0);

        // my changes start 3 oct 2020
        element.prev().find(".main_amount").text("");
        element.prev().find(".main_amount").text("₹ 0000.00");
        // my changes end

        element.find(".estimate_remove_adddiscount").css("display","none");
    }
    $("#items_selected_gst_type").val("");
    // $("#item_igst_amount").val(0);
    // $("#item_cgst_amount").val(0);
    // $("#item_sgst_amount").val(0);

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

    $("#Calculate_discounts .CGST_TR_section").closest("tr").show();
    $("#estimate_items_gst_type_selected").val(0);
    create_estimate_remove_panel_color();
    $("#estimate_summary_value").val(2);
});

// Remove button clicked in front of discount (item level)
$(document).on('click','#participantTable .estimate_remove_discount',function(){
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

    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").first().attr('selected','selected');

    if(tax_type!="Select Type"){
        // $("#Calculate_discounts .discount_section").closest("tr").show();

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
        // $("#Calculate_discounts .discount_section").closest("tr").hide();
    }
    $("#estimate_disc_amt").val('');
    $("#estimate_calculated_disc_amt").val(0);
    /*var s = total_amount_for_estimate_level_discount();
    calculate_estimate_level_discount(s);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(s);*/
    $("#estimate_summary_value").val(2);
    cal_estimate_level_amts();

    $("#estimate_items_discount_selected").val(0);
    reset_estimate_level_discount_details();
    for_hiding_estimate_level_percentage();
    create_estimate_remove_panel_color();
    $("#Calculate_discounts .discount_section").closest("tr").find(".estimate_remove_discount").css("display","none");
});

function reset_estimate_level_discount_details()
{

    // cleared Estimate level discount dropdown
    $("#Calculate_discounts .discount_section ").find(".custom-a11yselect-text").text('');
    $("#Calculate_discounts .discount_section").find(".custom-a11yselect-text").text('Select Type');
   
    $("#Calculate_discounts .discount_section").find(".custom-a11yselect-btn").attr('aria-activedescendant','Estimate_Percentage_select-option-0');

    $("#Calculate_discounts .discount_section").find(".custom-a11yselect-menu li").removeClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#Calculate_discounts .discount_section").find(".custom-a11yselect-menu li[data-val='Select Type']").addClass("custom-a11yselect-focused custom-a11yselect-selected");

    $("#Calculate_discounts .discount_section").closest("tr").find(".estimate_remove_discount").css("display","none");

    $("#estimate_disc_amt").val('');

    $("#Calculate_discounts .discount_section").closest("tr").find(".main_amount").text('');
    
    $("#Calculate_discounts .discount_section").closest("tr").find(".main_amount").text("₹ 0000.00");

    $("#Calculate_discounts .discount_section .Estimate_Percentage option").removeAttr('selected');

    $("#Calculate_discounts .discount_section .Estimate_Percentage option[value='']").attr('selected','selected');


}


// Remove button clicked in front of CGST (item level)
$(document).on('click','#participantTable .CGST_TR_section .estimate_remove_adddiscount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".Estimate_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").find(".DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(".participantRow").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(".participantRow").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(".participantRow").find(".rate_data .DiscountPer option").removeAttr('selected');
    $(".participantRow").find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var len = $("#participantTable .participantRow .main-group").length;
    for(k=0;k<len;k++){
        var element = $(this).closest("#participantTable .participantRow").find(".CGST_TR_section").eq(k);
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

        // $(this).css("display","none");
    }
    $("#items_selected_gst_type").val("");

    // 3 oct 2020

    $("#participantTable .participantRow .main-group").next().next().find(".estimate_remove_adddiscount").css("display","none");

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

    $("#Calculate_discounts .CGST_TR_section").closest("tr").show();
    $("#estimate_items_gst_type_selected").val(0);
    create_estimate_remove_panel_color();
    $("#estimate_summary_value").val(2);
});

// Calculation on estimate form
$(document).on("keyup", "#estimateForm #participantTable input[name='item_qty[]']", function(e){
    
    item_qty_change(this);

    var qty_val = $(this).val();
    var amt = 0;

    // Estimate level GST
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    var rate_val = $(this).closest('.main-group').find("input[name='item_rate[]']").val();
    if(rate_val == ""){
        $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(qty_val);
        amt = qty_val;
    }
    if(rate_val != ""){
        if(qty_val == ""){
          $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(rate_val);
          amt = rate_val;
        }
        else
        {
          amt = qty_val * rate_val;
          $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(amt);
        }
        //$("#total_estimate_value").val(amt);
        // calculate_gst_amount_on_qty_rate_change($(this), amt);
    }

    // var t2 = total_amount_for_estimate_level_discount();
    // calculate_estimate_level_discount(t2);

    cal_estimate_level_amts();
    
    /*var t2 = $("#total_estimate_value").val();
    if(est_selected_gst_type != "Select Type")
    {
        if(est_selected_gst_type == 'IGST')
        {
          var new_cal = (est_selected_gst_per * t2)/100;
          // Values into the hidden fields of igst
          $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
          $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (est_split_tax * t2)/100;
            // Values into the hidden fields of cgst & sgst
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
    }*/
    // $("#total_estimate_value").val(t2);

    $(this).closest('.main-group').find("input[name='item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='item_main_amount[]']").closest("td").find(".err").remove("");
    
    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#estimateForm #participantTable input[name='item_rate[]']", function(){
    
    item_rate_change(this);
    var rate_val = $(this).val();
    var qty_val = $(this).closest('.main-group').find("input[name='item_qty[]']").val();
    var amt = 0;

    // Estimate level GST
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    if(qty_val == ""){
        $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(rate_val);
        amt = rate_val;
    }
    if(qty_val != ""){
        if(rate_val == ""){
            $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(qty_val);
            amt = qty_val;
        }
        else if(rate_val != "")
        {
            amt = qty_val * rate_val;
            $(this).closest('.main-group').find("input[name='item_main_amount[]']").val(amt);
        }
    }
    cal_estimate_level_amts();

    // calculate_gst_amount_on_qty_rate_change($(this), amt);
    // var t3 = total_amount_for_estimate_level_discount();
    // calculate_estimate_level_discount(t3);

    /*var t3 = $("#total_estimate_value").val();
    if(est_selected_gst_type != "Select Type")
    {
        if(est_selected_gst_type == 'IGST')
        {
          var new_cal = (est_selected_gst_per * t3)/100;
          // Values into the hidden fields of igst
          $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
          $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (est_split_tax * t3)/100;
            // Values into the hidden fields of cgst & sgst
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        // $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
    }*/

    // $("#total_estimate_value").val(t3);

    $(this).closest('.main-group').find("input[name='item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "#participantTable .main_amount", function(){

    var disc_rate_val = $(this).closest("tr").next().find(".rate").val();
    var disc_type_val = $(this).closest("tr").next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    
    if(!disc_rate_val && disc_type_val!="Select Type"){
        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
        $(this).closest('tr').next().find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
    }
    var amt = $(this).val();
    $("#total_estimate_value").val(parseFloat(amt));
    if(amt != ""){
        calculate_gst_amount_on_qty_rate_change($(this), amt);
    }
    var s = 'amount_change';
    var t3 = total_amount_for_estimate_level_discount(s, disc_rate_val);
    // alert(t3);
/*    calculate_estimate_level_discount(t3);
    // $("#total_estimate_value").val(t3);
    cal_estimate_level_amts();
*/

    check_qty_rate(this);
    cal_estimate_level_amts();

    $(this).closest('.main-group').find("input[name='item_main_amount[]']").removeAttr("style");
    $(this).closest('.main-group').find("input[name='item_main_amount[]']").closest("td").find(".err").remove("");

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

$(document).on("keyup", "input[name='item_discount_rate[]']", function(){
    // item_discount_rate_change(this);
    
    var disc_amt = 0;
    var disc_rate_val = $(this).val();
    var amt_val = $(this).closest('tr').prev().find("input[name='item_main_amount[]']").val();
    var drop_val = $(this).closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_gst_per / 2;

    // Estimate level GST
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    /*
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
                    if(selected_gst_type == 'IGST')
                    {
                      var new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      var new_cal = (split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $(this).closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      $(this).closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }

                    if(disc_rate_val!=0)
                    {                    
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else {
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                    }
                }
                if(disc_rate_val!=0)
                {
                    $(this).closest('tr').find(".main_amount").text("");
                    $(this).closest('tr').find(".main_amount").text("₹ "+disc_amt.toFixed(2));
                }
                else {
                    $(this).closest('tr').find(".main_amount").text("");
                    $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                }
                $(this).closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='"+disc_amt+"'>");
            }
            if(drop_val == "Amount")
            {
                disc_amt = parseInt(amt_val) - parseInt(disc_rate_val);

                if(selected_gst_type != "Select Type")
                {
                    if(selected_gst_type == 'IGST')
                    {
                      var new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      var new_cal = (split_tax * disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $(this).closest("tr").next().find(".item_cgst_amount").val(new_cal);
                      $(this).closest("tr").next().find(".item_sgst_amount").val(new_cal);
                    }

                    if(disc_rate_val!=0)
                    {
                        $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    else {
                        $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                        $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                    }
                }
                if(disc_rate_val!=0)
                {
                    $(this).closest('tr').find(".main_amount").text("");
                    $(this).closest('tr').find(".main_amount").text("₹ "+disc_rate_val+".00");
                }
                else {
                    $(this).closest('tr').find(".main_amount").text("");
                    $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                }
                $(this).closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='"+disc_rate_val+"'>");
            }
        }
        else
        {   
            if(selected_gst_type!="Select Type"){
                if(selected_gst_type == 'IGST'){
                  var new_cal = (selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                  var new_cal = (split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  $(this).closest("tr").next().find(".item_cgst_amount").val(new_cal);
                  $(this).closest("tr").next().find(".item_sgst_amount").val(new_cal);
                }

                if(disc_rate_val==""){
                    $(this).closest('tr').find(".main_amount").text("");  
                    $(this).closest('tr').find(".main_amount").text("₹ 0000.00");  
                }
                else if(disc_rate_val!=0){
                    $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else {
                    $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                }
            }
            if(est_selected_gst_type!="Select Type"){
                if(est_selected_gst_type == 'IGST'){
                  var new_cal = (est_selected_gst_per * amt_val)/100;
                  // Value into the hidden fields of igst
                  $(this).closest("tr").next().find(".item_igst_amount").val(new_cal);
                  $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                }
                if(est_selected_gst_type == 'CGST'){
                  var new_cal = (est_split_tax * amt_val)/100;
                  // Values into the hidden fields of cgst & sgst
                  $(this).closest("tr").next().find(".item_cgst_amount").val(new_cal);
                  $(this).closest("tr").next().find(".item_sgst_amount").val(new_cal);

                  $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                  $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                }
                if(disc_rate_val==""){
                    $(this).closest('tr').find(".main_amount").text("");  
                    $(this).closest('tr').find(".main_amount").text("₹ 0000.00");  
                }
                else if(disc_rate_val==""){
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
                }
                else {
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ 0000.00");
                    $("#Calculate_discounts").find("#edit_SGST_Calculate .main_amount").text("₹ 0000.00");
                }
            }
            else
            {   
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                $(this).closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
                $(this).closest("tr").next().find(".item_igst_amount, .item_cgst_amount, .item_sgst_amount").val(0);
            }
        }
    }
    */
    
    cal_estimate_level_amts();
    
    /*var t1 = $("#total_estimate_value").val();
    if(est_selected_gst_type != "Select Type")
    {
        if(est_selected_gst_type == 'IGST')
        {
          var new_cal = (est_selected_gst_per * t1)/100;
          // Values into the hidden fields of igst
          $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
        }
        if(est_selected_gst_type == 'CGST')
        {
          var new_cal = (est_split_tax * t1)/100;
          // Values into the hidden fields of cgst & sgst
          $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
          $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
        }
        // $("#edit_estimate_main_details").find("#edit_estimate_calculated_disc_amt").val(disc_amt);
        $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
    }*/

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

// Create estimate form validation
$(document).on("click", "#save_estimateBTN_new", function(event){
    // $('#estimateForm').submit(function(event)
    // {   
        event.preventDefault();
        event.stopImmediatePropagation();

        var flag = true;
        
        if($('#billfromname').length == 0)
        {
            var chk_fromaddr_element = $(".BillingFrom_address_and_gst").find(".BillingFrom_address_main");
            var chk_fromaddr_element_val = chk_fromaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_fromgst_element = $(".BillingFrom_address_and_gst").find(".BillingFrom_gst_main");
            var chk_fromgst_element_val = chk_fromgst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            // alert(chk_fromaddr_element_val);
            if(chk_fromaddr_element.is(":visible") && chk_fromaddr_element_val=="Select Billing Entity")
            {
                $(".BillingFrom_address_main").find(".err").remove();
                $("#estimateForm #Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $(".BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");
            }
            if(chk_fromgst_element.is(":visible") && chk_fromgst_element_val=="Select GSTIN")
            {
                $(".BillingFromGSTDetails_dropdown").find(".err").remove();
                $("#estimateForm #Address_Details").find(".BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $(".BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_fromaddr_element.is(":visible") && !chk_fromgst_element.is(":visible"))
            {
                $(".BillingFromCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else if($('#estimate_number').val() == "")
        {
            $("#estimate_number").closest("div").find(".err").remove();
            $("#estimate_number").css('border-color', '#ad4846');
            $("#estimate_number").closest("div").append("<span class='err text-danger'>Please enter estimate number</span>");
            flag = false;
        }
        else if($('input[name="estimate_date"]').val() == "")
        {
            $('input[name="estimate_date"]').closest("div").parent().find(".err").remove();
            $('input[name="estimate_date"]').css('border-color', '#ad4846');
            $('input[name="estimate_date"]').closest("div").parent().append("<span class='err text-danger'>Please enter estimate date</span>");
            flag = false;
        }
        else if($('#billtoname').length == 0)
        {
            var chk_toaddr_element = $(".BillingTo_address_and_gst").find(".BillingTo_address_main");
            var chk_toaddr_element_val = chk_toaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var chk_togst_element = $(".BillingTo_address_and_gst").find(".BillingTo_gst_main");
            var chk_togst_element_val = chk_togst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            
            if(chk_toaddr_element.is(":visible") && chk_toaddr_element_val=="Select Customer")
            {
                $(".BillingTo_address_main").find(".err").remove();
                $("#estimateForm #Address_Details_BillTo").find(".BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $(".BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");
            }
            if(chk_togst_element.is(":visible") && chk_togst_element_val=="Select GSTIN")
            {
                $(".BillingToGSTDetails_dropdown").find(".err").remove();
                $("#estimateForm #Address_Details_BillTo").find(".BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
                $(".BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
            }
            if(!chk_toaddr_element.is(":visible") && !chk_togst_element.is(":visible"))
            {
                $(".BillingToCard").css('border-color', '#ad4846');
            }
            flag = false;
        }
        else
        {
            var len = $("#estimate_main_details .main-group").length;
            $(".err").remove();
            for(var s=0;s<len;s++)
            {
                var current=$("#estimate_main_details .main-group").eq(s);
                if(current.find("input[name='item_descr[]']").val() == '')
                {
                    current.find("input[name='item_main_amount[]']").closest("td").find(".err").remove();
                    current.find(".item_descr").css('border-color', '#ad4846');
                    current.find(".item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                    $("#FinanceEstimateModal").animate({ 
                        scrollTop:  $("input[name='item_descr[]']").offset().top 
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
                if(current.find("input[name='item_main_amount[]']").val() == '')
                {
                    current.find("input[name='item_main_amount[]']").closest("td").find(".err").remove();
                    current.find("input[name='item_main_amount[]']").css('border-color', '#ad4846');
                    current.find("input[name='item_main_amount[]']").closest("td").append("<span class='err text-danger'>Please enter amount</span>");

                    $("#FinanceEstimateModal").animate({ 
                        scrollTop:  $("input[name='item_main_amount[]']").offset().top 
                    }, 100);
                    
                    flag = false;
                }
            }
        }

        if(flag == false){
          return false;
        }
        else{
            var estimate_summary_value = $("#estimate_summary_value").val();
            var flag1 = true;
            $("#estimate_summary_error").closest('.form-group').remove();
            var sectionOffset = $('#CalculateBtn').offset();
            if(estimate_summary_value == 0){
                $("<div class='form-group'><span id='estimate_summary_error' style='color:#ad4846;'> Please calculate estimate summary</span></div>").insertAfter("#CalculateBtn .form-group");
                
                $("#FinanceEstimateModal").animate({ 
                    scrollTop:  $("#CalculateBtn").offset().top 
                }, 100);
                
                flag1 = false;
            }
            else if(estimate_summary_value == 2){
                $("<div class='form-group'><span id='estimate_summary_error' style='color:#ad4846;'> Please recalculate estimate summary</span></div>").insertAfter("#CalculateBtn .form-group");
                
                $("#FinanceEstimateModal").animate({ 
                    scrollTop:  $("#CalculateBtn").offset().top 
                }, 100);

                flag1 = false;
            }

            if(flag1 == false){
                return false;
            }
            else{
                $("#save_estimateBTN_new").attr("disabled", "disabled");
                
                var formdata= $('#estimateForm');
                var newFileFlag = 0;
                form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#estimate_attachment')[0].files, function(i, file) {
                    form.append('attachment['+i+']', file);
                    newFileFlag = 1;
                });

                if(newFileFlag)
                {
                    $("#FinanceEstimateModal .email-blur-effect, #FinanceEstimateModal .email-loader").show();
                }

                $.ajax({
                    type    : "POST",
                    url     : "../../client/res/templates/financial_changes/save_estimate.php",
                    dataType  : "json",
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data)
                    {
                        if(data.status == "true")
                        {
                            if(newFileFlag)
                            {
                                $("#FinanceEstimateModal .email-blur-effect, #FinanceEstimateModal .email-loader").hide();
                            }
                            $.confirm({
                                title: 'Success!',
                                content: data.msg,
                                buttons: {
                                    Ok: function () {
                                        $('button[data-action="reset"]').trigger('click');
                                        //$(function (){
                                            //$('#estimate_main_details').modal('toggle');
                                            $('#FinanceEstimateModal').modal('hide');
                                        //});
                                        $('#estimateForm')[0].reset();
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
$(document).on('click','#Calculate_discounts .CGST_TR_section .estimate_remove_adddiscount',function(){
    
    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".Estimate_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").find(".DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

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

    element.find(".main_amount").text("");
    element.find(".main_amount").text("₹ 0000.00");
    element.next().find(".main_amount").text("");
    element.next().find(".main_amount").text("₹ 0000.00");
    element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    $(this).css("display","none");
});

// Calculations on click of delete icon in estimate level GST's row
$(document).on('click','#Calculate_discounts .SGST_Discount .estimate_remove_adddiscount',function(){
    
    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").prev().find(".Estimate_IGSTandCGST")).attr('selected',false).siblings().removeAttr('selected');
    // $('option:selected', $(this).closest("tr").prev().find(".DiscountPer")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").prev().find(".GST_section .Estimate_IGSTandCGST option").removeAttr('selected');
    $(this).closest("tr").prev().find(".GST_section .Estimate_IGSTandCGST option[value='']").attr('selected','selected');

    $(this).closest("tr").prev().find(".rate_data .DiscountPer option").removeAttr('selected');
    $(this).closest("tr").prev().find(".rate_data .DiscountPer option[value='0']").attr('selected','selected');

    var element=$(this).closest("tr");

    var current=element.prev().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    // 4 oct 2020
    element.prev().find(".estimate_remove_adddiscount").css("display","none");


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
function calculate_gst_amount_on_qty_rate_change(element, amt)
{   
    cal_estimate_level_amts();

    /*var disc_type = element.closest("tr").next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var drop_val = $(this).closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    var disc_rate = element.closest("tr").next().find(".rate").val();
    var selected_gst_type = element.closest('tr').next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = est_selected_gst_per / 2;

    var cal_disc_amt = 0;
    if(amt!="")
    {
        if(disc_rate!="")
        {
            if(disc_type == 'Percentage')
            {
                cal_disc_amt = (disc_rate/100) * amt;
                if(selected_gst_type != "Select Type")
                {
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
                element.closest("tr").next().find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+cal_disc_amt+"'>");

                if(est_selected_gst_type != "Select Type")
                {
                    var new_cal_amt = amt - cal_disc_amt;
                    if(est_selected_gst_type == 'IGST')
                    {
                      var new_cal = (est_selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                    }
                    if(est_selected_gst_type == 'CGST')
                    {
                      var new_cal = (est_split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                    }
                    
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            if(disc_type == 'Amount')
            {
                cal_disc_amt = parseInt(amt) - parseInt(disc_rate);
                if(selected_gst_type != "Select Type")
                {
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
                element.closest("tr").next().find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='"+disc_rate+"'>");

                if(est_selected_gst_type != "Select Type")
                {
                    if(est_selected_gst_type == 'IGST')
                    {
                      var new_cal = (est_selected_gst_per * cal_disc_amt)/100;
                      // Values into the hidden fields of igst
                      $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                    }
                    else if(est_selected_gst_type == 'CGST')
                    {
                      var new_cal = (est_split_tax * cal_disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                    }
                    else {
                        var new_val = 0;
                    }
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#Calculate_discounts").find("#SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
        }
        else{
            var a=$("#Calculate_discounts .Estimate_Percentage").closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
            var selected_gst_type = $("#Calculate_discounts .Estimate_Percentage").closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

            var selected_tax = $("#Calculate_discounts .Estimate_Percentage").closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
            var split_tax = selected_tax / 2;
            var total_val=$("#total_estimate_value").val();
            var cur_rate_val=$("#estimate_disc_amt").val();
            var calculated_val = 0;
            if(disc_type == 'Percentage')
            {
                cal_disc_amt = (disc_rate/100) * amt;
                if(selected_gst_type != "Select Type")
                {
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
                element.closest("tr").next().find(".main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='0'>");

                if(est_selected_gst_type != "Select Type")
                {
                    var new_cal_amt = amt - cal_disc_amt;
                    if(est_selected_gst_type == 'IGST')
                    {
                      var new_cal = (est_selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                    }
                    if(est_selected_gst_type == 'CGST')
                    {
                      var new_cal = (est_split_tax * new_cal_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                    }
                    
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#Calculate_discounts").find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
            if(disc_type == 'Amount')
            {
                cal_disc_amt = parseInt(amt) - parseInt(disc_rate);
                if(selected_gst_type != "Select Type")
                {
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * cal_disc_amt)/100;  
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * cal_disc_amt)/100;
                    }
                    element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").next().find(".main_amount").text("₹ 0000.00");
                element.closest("tr").next().find(".main_amount").append("<input type='hidden' name='calculated_discount[]' class='calculated_discount' value='0'>");

                if(est_selected_gst_type != "Select Type")
                {
                    if(est_selected_gst_type == 'IGST')
                    {
                      var new_cal = (est_selected_gst_per * cal_disc_amt)/100;
                      // Values into the hidden fields of igst
                      $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                    }
                    else if(est_selected_gst_type == 'CGST')
                    {
                      var new_cal = (est_split_tax * cal_disc_amt)/100;
                      // Values into the hidden fields of cgst & sgst
                      $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                    }
                    else {
                        var new_val = 0;
                    }
                    $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    $("#Calculate_discounts").find("#SGST_Calculate .main_amount").text("₹ "+new_cal.toFixed(2));
                }
            }
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
    }*/
}

// Change event of estimate level discount type i.e. Percentage or Amount
$(document).on("change", "#Calculate_discounts .Estimate_Percentage", function(){
    var a=$(this).closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    // Estimate level GST
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    // alert(selected_gst_type_estimates+" === "+selected_gst_per_estimates);
    var est_split_tax = est_selected_gst_per / 2;
    
    var total_val = $("#total_estimate_value").val();
    var cur_rate_val = $("#estimate_disc_amt").val();
    var new_cal = 0;

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
                    new_cal = (selected_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    new_cal = (split_tax * new_cal_amt)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                }
                if(selected_gst_type == 'Select Type'){
                    new_cal = calculated_val;
                }
                $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $(this).closest("tr").find("#estimate_calculated_disc_amt").val(calculated_val);
            $(this).closest("tr").find(".main_amount").text("");
            $(this).closest("tr").find(".main_amount").text("₹ "+calculated_val.toFixed(2));
        }
        if(a=="Amount")
        {
            calculated_val = total_val - cur_rate_val;
            if(selected_gst_type != "Select Type"){
                if(selected_gst_type == 'IGST'){
                    new_cal = (selected_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                }
                if(selected_gst_type == 'CGST'){
                    new_cal = (split_tax * calculated_val)/100;
                    $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                }
                if(selected_gst_type == 'Select Type'){
                    new_cal = calculated_val;
                }
                $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $(this).closest("tr").find("#estimate_calculated_disc_amt").val(cur_rate_val);
            $(this).closest("tr").find(".main_amount").text("");
            cur_rate_val = (cur_rate_val) ? cur_rate_val : '0000';
            $(this).closest("tr").find(".main_amount").text("₹ "+cur_rate_val+".00");
        }
        calculated_val = calculated_val.toFixed(2);
        $(this).closest("tr").find(".estimate_remove_discount").css("display","inline-block");
    }
    else{
        var new_cal = 0;
        var amt_val = $("#total_estimate_value").val();
        if(selected_gst_type!="Select Type"){
            if(selected_gst_type == 'IGST'){
                new_cal = (selected_gst_per * amt_val)/100;
                $(this).closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
            }
            if(selected_gst_type == 'CGST'){
                new_cal = (split_tax * amt_val)/100;
                $(this).closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
            }
            if(selected_gst_type == 'Select Type'){
                new_cal = total_val;
            }
            new_cal = new_cal.toFixed(2);
            $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal);
            $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal);

        }
        else{
            $(this).closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
        }
        $(this).closest("tr").find("#estimate_calculated_disc_amt").val(0);
        $(this).closest('tr').find(".main_amount .calculated_discount").val(0);
        $(this).closest('tr').find(".main_amount").text("");
        $(this).closest('tr').find(".main_amount").text("₹ 0000.00");
        $(this).closest("tr").find(".estimate_remove_discount").css("display","none");
        $(this).closest("tr").find(".rate").val("");          
    }*/

    cal_estimate_level_amts();

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

// Change event of estimate level type i.e CGST or IGST
$(document).on("change", "#Calculate_discounts .Estimate_IGSTandCGST", function(){
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

    var main_amount = $("#total_estimate_value").val();
    var calculated_disc = $("#estimate_calculated_disc_amt").val();
    var disc_type = $(this).closest("tr").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
    var curr_tax = $(this).closest("tr").find(".rate_data .custom-a11yselect-menu  .custom-a11yselect-selected").attr("data-val");
    var split_tax = curr_tax / 2;
    var calculated_tax_amt = 0;

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*if(a=="Select Type")
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
        // $("#Calculate_discounts .estimate_remove_discount").show();
        ResetDiscount(current2,sgst_rate_id,sgst_rate_text);

        if(disc_type!="Select Type"){
            if(disc_type == 'Percentage'){
                amt_after_discount = main_amount - calculated_disc;
                calculated_tax_amt = (curr_tax * amt_after_discount)/100;
            }
            if(disc_type == 'Amount'){
                main_amount = main_amount - calculated_disc;
                calculated_tax_amt = (curr_tax * main_amount)/100;
            }
        }
        else {
            calculated_tax_amt = (curr_tax * main_amount)/100;
        }
        $(this).closest("td").next().find(".main_amount").text("");
        $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
        $(this).closest("td").next().next().find(".main_amount").text("");
        $(this).closest("td").next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2)); 
        $(this).closest("td").next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
        $(this).closest("td").next().find(".estimate_igst_amount").val(calculated_tax_amt);
    }
    else if(a=='CGST')
    {
        $(this).closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().find(".estimate_remove_adddiscount").css("display","inline-block");
        $(this).closest("tr").next().show();

        if(disc_type!="Select Type"){
            if(disc_type == 'Percentage'){
                amt_after_discount = main_amount - calculated_disc;
                calculated_tax_amt = (split_tax * amt_after_discount)/100;
            }
            if(disc_type == 'Amount'){
                main_amount = main_amount - calculated_disc;
                calculated_tax_amt = (split_tax * main_amount)/100;
            }
        }
        else {
            calculated_tax_amt = (split_tax * main_amount)/100;
        }
        $(this).closest("td").next().find(".main_amount").text("");
        $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("td").next().next().find(".main_amount").text("");
        $(this).closest("td").next().next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        
        $(this).closest('td').next().find(".estimate_igst_amount").val(0);
        $(this).closest('td').next().find(".estimate_cgst_amount, .estimate_sgst_amount").val(calculated_tax_amt);
    }*/

    cal_estimate_level_amts();

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

// Change event of discount rate i.e 0%, 1% ..... 18% etc
$(document).on("change", "#Calculate_discounts .DiscountPer", function(){

    // Make dropdown option selected when slect any
    $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');

    /*var a = $(this).closest("td").prev().find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    if(a!="Select Type"){
        var curr_tax = $(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
        var main_amount = $("#total_estimate_value").val();
        var calculated_disc = $("#estimate_calculated_disc_amt").val();
        var disc_type = $(this).closest("td").prev().find(".discount_section .custom-a11yselect-menu  .custom-a11yselect-selected").text();
        
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
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".estimate_cgst_amount, .estimate_sgst_amount").val(0);
            $(this).closest("td").find(".estimate_igst_amount").val(calculated_tax_amt);
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
            $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
            $(this).closest("td").find(".estimate_igst_amount").val(0);
            $(this).closest("td").find(".estimate_cgst_amount, .estimate_sgst_amount").val(calculated_tax_amt);
            $(this).closest("tr").next().find(".main_amount").text("₹ "+calculated_tax_amt.toFixed(2));
        }
    }*/

    cal_estimate_level_amts();
    // estimate_level_discount_change();
    // estimate_level_gst_change();

    if($("#estimate_subtotal_amount").val()!=0){
        $("#estimate_summary_value").val(2);
    }
});

// Keyup Event for discount rate of estimate level (i.e input box)
$(document).on("keyup", "#estimate_disc_amt", function(){
    var a=$(this).closest('tr').find(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = $(this).closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = $(this).closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;
    var main_amount = $("#total_estimate_value").val();
    var calculated_disc = $("#estimate_calculated_disc_amt").val();
    var cur_rate_val = $(this).val();
    var cur_html=$(this);

    // if(a=="Percentage")
    // {
    //     var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    //     Percentage_validation_estimate(cur_html,cur_rate_val);
    // }
    // if(a=="Amount")
    // {
    //     var main_amt = $("#total_estimate_value").val();
    //     Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));
    // }


    if(main_amount != '')
    {
        // console.log("not Empty Amount ");

        if(a=="Percentage")
        {
            var current=cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            Percentage_validation_estimate(cur_html,cur_rate_val);
        }
        if(a=="Amount")
        {
            Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amount));
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
                        reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amount);
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
                Percentage_validation_estimate(cur_html,cur_rate_val);
                
                calculated_val = (cur_rate_val/100) * main_amount;
                if(selected_gst_type != "Select Type"){
                    var new_cal_amt = main_amount - calculated_val;
                    if(selected_gst_type == 'IGST'){
                        var new_cal = (selected_tax * new_cal_amt)/100;
                    }
                    if(selected_gst_type == 'CGST'){
                        var new_cal = (split_tax * new_cal_amt)/100;
                    }
                    $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".main_amount").text("₹ "+calculated_val.toFixed(2));
                $(this).closest("td").find("#estimate_calculated_disc_amt").val(calculated_val);
            }
            if(a=="Amount")
            {
                var main_amt = $("#total_estimate_value").val();
                Amount_validation_estimate(cur_html, cur_rate_val, parseFloat(main_amt));    

                calculated_val = main_amount - cur_rate_val;
                if(selected_gst_type != "Select Type"){
                  if(selected_gst_type == 'IGST'){
                    var new_cal = (selected_tax * calculated_val)/100;  
                  }
                  if(selected_gst_type == 'CGST'){
                    var new_cal = (split_tax * calculated_val)/100;
                  }
                  $(this).closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                  $(this).closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                $(this).closest("td").next().find(".main_amount").text("₹ "+cur_rate_val+'.00');
                $(this).closest("td").find("#estimate_calculated_disc_amt").val(cur_rate_val);
            }
            if(selected_gst_type=="Select Type")
            {
                calculated_val = calculated_val;
                $(this).closest("tr").find(".main_amount").text("");
                if(a == 'Percentage'){
                    $(this).closest("tr").find("#estimate_calculated_disc_amt").val(calculated_val);
                    calculated_val = calculated_val.toFixed(2);
                    $(this).closest("tr").find(".main_amount").text("₹ "+calculated_val);
                }
                if(a == 'Amount'){
                    $(this).closest("tr").find("#estimate_calculated_disc_amt").val(cur_rate_val);
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
                //$(this).closest("tr").find("#estimate_calculated_disc_amt").val(main_amount);
            }
            else{
                $(this).closest("td").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                $(this).closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
            }
            $(this).closest("tr").find("#estimate_calculated_disc_amt").val(main_amount);
        }
    }*/
    /*var t1 = total_amount_for_estimate_level_discount();
    calculate_estimate_level_discount(t1);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(t1);*/

    cal_estimate_level_amts();
});

// Click event of delete button icon in a row of label says - Discount (At estimate level)
$(document).on('click','#Calculate_discounts .estimate_remove_discount',function(){

    // Make dropdown option selected when slect any
    // $('option:selected', $(this).closest("tr").find(".Estimate_Percentage")).attr('selected',false).siblings().removeAttr('selected');

    $(this).closest("tr").find(".discount_section .Estimate_Percentage option").removeAttr('selected');
    $(this).closest("tr").find(".discount_section .Estimate_Percentage option[value='']").attr('selected','selected');

    var element=$(this).closest("tr");
    element.find(".rate").val("");
    var id=element.find(".custom-a11yselect-menu li:first").attr("id");
    var text_msg=element.find(".custom-a11yselect-menu li:first button").text();
    ResetDiscount(element,id,text_msg);
    $(this).css("display","none");
    element.find(".main_amount").text("₹ 0000.00");

    var main_amt = $("#total_estimate_value").val();
    var applied_tax = element.next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var split_tax = applied_tax / 2;
    var tax_type = element.next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");
    var new_cal_amt = 0;
    if(tax_type!="Select Type"){ //alert("applied_tax ="+applied_tax+" === tax_type ="+tax_type);
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
          element.find("#estimate_calculated_disc_amt").val(new_cal_amt);
        }
        else{
          element.find("#estimate_calculated_disc_amt").val(0);
        }
        element.next().next().find(".main_amount").text("₹ "+new_cal_amt.toFixed(2));
    }
    else{
        element.next().find(".main_amount").text("");
        element.next().find(".main_amount").text("₹ 0000.00");
        element.next().next().find(".main_amount").text("");
        element.next().next().find(".main_amount").text("₹ 0000.00");
        element.find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
        element.next().next().find("#estimate_calculated_disc_amt").val(0);
    }
    /*var s = total_amount_for_estimate_level_discount();
    calculate_estimate_level_discount(s);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(s);*/
    $("#estimate_summary_value").val(2);
    cal_estimate_level_amts();
});

// total amount calculation
function total_amount_for_estimate_level_discount(param='', disc_rate_val='')
{
    // var no=$("#estimateForm .participantRow .main-group").length;
    var no = $("#total_items").val();
    var total_amt = 0;
    var discount_amt = 0;
    for(var n=0;n<no;n++)
    {
        var current = $("#estimateForm #participantTable .participantRow .main-group").eq(n);
        var curr_amt = current.find(".main_amount").val();
        curr_amt = (curr_amt!=0) ? curr_amt : 0;
        var discount_amt = current.next().find(".calculated_discount").val();
        var curr_rate_val = current.find(".item_rate").val();
        var disc_type = current.next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');

        if(curr_rate_val)
        {
            if(curr_amt)
            {
                if(discount_amt)
                {
                    var disc_type = current.next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt = curr_amt - discount_amt;
                        total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                    }
                    if(disc_type == 'Amount'){
                        if(param == 'amount_change'){
                            discount_amt = curr_amt - disc_rate_val;
                        }
                        else if(!param){
                            discount_amt = (discount_amt!=0) ? (curr_amt - discount_amt) : curr_amt;
                        }
                        total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                    }
                    // total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                }
                else
                {
                    total_amt = parseFloat(total_amt) + parseFloat(curr_amt);
                }
            }
            else{
                total_amt = parseFloat(total_amt) + parseFloat(curr_amt);
            }
        }
        else{
            if(curr_amt!=0)
            {
                if(discount_amt)
                {
                    var disc_type = current.next().find('.discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
                    if(disc_type == 'Percentage'){
                        discount_amt = curr_amt - discount_amt;
                    }
                    if(disc_type == 'Amount'){
                        if(param == 'amount_change'){
                            discount_amt = curr_amt - disc_rate_val;
                        }
                        else if(!param){
                            discount_amt = (discount_amt!=0) ? (curr_amt - discount_amt) : curr_amt;
                        }
                    }
                    total_amt = parseFloat(total_amt) + parseFloat(discount_amt);
                }
                else
                {   
                    total_amt = parseFloat(total_amt) + parseFloat(curr_amt);
                }
            }
            else{
                total_amt = parseFloat(total_amt) + parseFloat(curr_amt); 
            }
        }
    }
    return total_amt;
}


// Function to get all all item rows main total
function get_all_item_rows_main_total()
{
    var no=$("#estimateForm .participantRow .main-group").length;
    var rows_total_amt = 0;
    var rows_disc_amt = 0;
    var inps  = $("input[name='calculated_discount[]']");
    var n = $("input[name='calculated_discount[]']").length;
    for(var s=0;s<no;s++)
    {
        var current = $("#estimateForm .participantRow .main-group .main_amount").eq(s).val();
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
    rows_total_amt = parseFloat(rows_total_amt) - parseFloat(rows_disc_amt);
    return rows_total_amt;
}

// Function calculate estimate level discount
function calculate_estimate_level_discount(total_val)
{
    var element = $("#Calculate_discounts .Estimate_Percentage");
    var cur_rate_val = element.closest("tr").find("#estimate_disc_amt").val();
    var a=element.closest(".discount_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = element.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_tax = element.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var split_tax = selected_tax / 2;

    if(a!="Select Type")
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
                    element.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").find(".main_amount").text("₹ "+calculated_val.toFixed(2));
                element.closest("tr").find("#estimate_calculated_disc_amt").val(calculated_val);
            }
            if(a=="Amount")
            {
                calculated_val = total_val - cur_rate_val;
                if(selected_gst_type != "Select Type"){
                    if(selected_gst_type == 'IGST'){
                      var new_cal = (selected_tax * calculated_val)/100;
                      element.closest("tr").next().find(".rate_data .estimate_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST'){
                      var new_cal = (split_tax * calculated_val)/100;
                      element.closest("tr").next().find(".rate_data .estimate_cgst_amount, .estimate_sgst_amount").val(new_cal);
                    }
                    element.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                    element.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                }
                element.closest("tr").find(".main_amount").text("₹ "+cur_rate_val+".00");
                element.closest("tr").find("#estimate_calculated_disc_amt").val(cur_rate_val);
            }

            if(a!="Percentage" || a!="Amount")
            {
                if(selected_gst_type != "Select Type")
                {
                    if(selected_gst_type == 'IGST')
                    {
                      var new_cal = (selected_tax * total_val)/100;
                      // Values into the hidden fields of igst
                      $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                      $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                    if(selected_gst_type == 'CGST')
                    {
                        var new_cal = (split_tax * total_val)/100;
                        // Values into the hidden fields of cgst & sgst
                        $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                        $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                        $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
                        $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
                    }
                }                
            }
        }
        else{
            $("#estimate_calculated_disc_amt").val(0);
            element.closest("tr").find(".main_amount").text("");
            element.closest("tr").find(".main_amount").text("₹ 0000.00");
            element.closest("tr").next().find(".main_amount").text("");
            element.closest("tr").next().find(".main_amount").text("₹ 0000.00");
            element.closest("tr").next().next().find(".main_amount").text("");
            element.closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
            element.closest("tr").next().find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
        }
    }
    else {
        $("#estimate_disc_amt").val('');
    } 
}

// Function fo calculations on percentage reset
function reset_percentage_validation_estimate(cur_html,cur_rate_val,main_amt=''){
    var disc_amt = 0;
    var new_cal = 0;
    var disc_rate_val = (cur_rate_val > 0 && cur_rate_val < 100) ? cur_rate_val : 0;
    if(main_amt==''){
        var amt_val = cur_html.closest('tr').prev().find("input[name='item_main_amount[]']").val();
    }
    else{    
        var amt_val = main_amt;
    }
    var drop_val = cur_html.closest('tr').find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_type = cur_html.closest('tr').next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var selected_gst_per = cur_html.closest('tr').next().find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
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
                      new_cal = (selected_gst_per * new_cal_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      new_cal = (split_tax * new_cal_amt)/100;
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
                      new_cal = (selected_gst_per * disc_amt)/100;
                      // Values into the hidden fields of igst
                      cur_html.closest("tr").next().find(".item_igst_amount").val(new_cal);
                    }
                    if(selected_gst_type == 'CGST')
                    {
                      new_cal = (split_tax * disc_amt)/100;
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
            if(selected_gst_type!="Select Type")
            {
                if(disc_rate_val==""){
                    cur_html.closest('tr').find(".main_amount").text("");  
                    cur_html.closest('tr').find(".main_amount").text("₹ 0000.00");  
                }
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
                // alert(new_cal);return false;

                cur_html.closest("tr").next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
                cur_html.closest("tr").next().next().find(".main_amount").text("₹ "+new_cal.toFixed(2));
            }
            else
            {   
                cur_html.closest("tr").next().find(".main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".main_amount").text("₹ 0000.00");
                cur_html.closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                cur_html.closest('tr').find(".main_amount").append("<input name='calculated_discount[]' type='hidden' class='calculated_discount' value='0'>");
            }
            $("#estimate_calculated_disc_amt").val(0);
        }
    }*/

    /*var t1 = total_amount_for_estimate_level_discount();
    calculate_estimate_level_discount(t1);
    $("#total_estimate_value").val(0);
    $("#total_estimate_value").val(t1);*/

    /*var t1 = $("#total_estimate_value").val();
    if($("#estimate_calculated_disc_amt").val()){
        t1 = parseFloat(t1) - parseFloat($("#estimate_calculated_disc_amt").val());
    }
    $("#total_estimate_value").val(t1);*/
    if($("#estimate_calculated_disc_amt").val()){
        $("#estimate_calculated_disc_amt").val(0);
    }

    cal_estimate_level_amts();
}

// Calculate overall estimate summary
function calculate_estimate_summary()
{
    var total_main_amount = 0;
    // var len = $("#estimateForm .participantRow .main-group").length;
    var len = $("#total_items").val();
    var disc_type = $('#participantTable .discount_section .custom-a11yselect-menu .custom-a11yselect-selected').attr('data-val');
    var main_amount = 0;
    var total_taxes = 0;
    var total_disc = 0;
    var total_calculated_disc = 0;
    var flag = true;
    for(s=0;s<len;s++)
    {
        var disc_amt = 0;
        var current=$("#estimateForm .participantRow .main-group").eq(s);
        var curr_amt=current.find(".main_amount").val();
        if(curr_amt)
        {
            var disc_type = current.next().find(".discount_section .Estimate_Percentage").val();
            
            if(disc_type == 'Percentage'){
                disc_amt = current.next().find(".main_amount .calculated_discount").val();
            }
            else if(disc_type == 'Amount'){
                disc_amt = current.next().find(".main_amount .calculated_discount").val();
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

            var current1=$("#estimateForm .participantRow .CGST_TR_section").eq(s);
            var curr_igst=current1.find(".item_igst_amount").val();
            var curr_cgst=current1.find(".item_cgst_amount").val();
            var curr_sgst=current1.find(".item_sgst_amount").val();
            total_taxes = parseFloat(total_taxes) + parseFloat(curr_igst) + parseFloat(curr_cgst) + parseFloat(curr_sgst);

            main_amount = parseFloat(main_amount) + parseFloat(curr_amt);
            
            total_calculated_disc = parseFloat(total_calculated_disc) + parseFloat(disc_amt);
        }
        /*else{
            //main_amount = parseFloat(main_amount) + parseFloat($("#estimateForm .participantRow .main-group").find(".main_amount").val());
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
            var estimate_disc = $("#estimateForm").find("#estimate_calculated_disc_amt").val();
        }*/

        if(total_calculated_disc!=0){
            var total_disc = parseFloat(total_calculated_disc);
        }
        else {
            var total_disc = 0;
        }
        var total_disc = parseFloat(main_amount) - parseFloat($("#total_estimate_value").val());
        var estimate_disc = $("#estimateForm").find("#estimate_calculated_disc_amt").val();
        var estimate_igst = $("#estimateForm #Calculate_discounts .CGST_TR_section").find(".estimate_igst_amount").val();
        var estimate_cgst = $("#estimateForm #Calculate_discounts .CGST_TR_section").find(".estimate_cgst_amount").val();
        var estimate_sgst = $("#estimateForm #Calculate_discounts .CGST_TR_section").find(".estimate_sgst_amount").val();

        total_disc = parseFloat(total_disc) + parseFloat(estimate_disc);
        // alert(main_amount+" === "+($("#total_estimate_value").val())+" === "+estimate_disc+" === "+total_disc);
        total_taxes = parseFloat(total_taxes) + parseFloat(estimate_igst) + parseFloat(estimate_cgst) + parseFloat(estimate_sgst);

        var element = $("#estimate_calculation #main_calculation");
        element.find(".estimate_subtotal").text("");
        if(main_amount!=0){
            element.find(".estimate_subtotal").text("₹ "+main_amount.toFixed(2));
        }
        else{
            element.find(".estimate_subtotal").text("₹ 0000.00");
        }
        element.find("#estimate_subtotal_amount").val(main_amount);
        element.find(".estimate_total_discount").text("");
        if(total_disc!=0){
            element.find(".estimate_total_discount").text("₹ "+total_disc.toFixed(2));
        }
        else {
            element.find(".estimate_total_discount").text("₹ 0000.00");
        }
        element.find("#estimate_totaldiscount_amount").val(total_disc);
        element.find(".estimate_total_taxes").text("");
        if(total_taxes!=0){
            element.find(".estimate_total_taxes").text("₹ "+total_taxes.toFixed(2));
        }
        else {
            element.find(".estimate_total_taxes").text("₹ 0000.00");
        }
        element.find("#estimate_totaltaxes_amount").val(total_taxes);

        var gross_total = parseFloat(main_amount) - parseFloat(total_disc) + parseFloat(total_taxes);
        element.find(".estimate_total_amount").text("");
        if(gross_total!=0){
            element.find(".estimate_total_amount").text("₹ "+gross_total.toFixed(2));
        }
        else {
            element.find(".estimate_total_amount").text("₹ 0000.00");
        }
        element.find("#estimatetotal_amount").val(gross_total);
        $("#estimate_calculation #CalculateBtn").find("#estimate_summary_value").val(1);
        $("#estimate_summary_error").closest('.form-group').remove();
    }
    else{
        var element = $("#estimate_calculation #main_calculation");
        element.find(".estimate_subtotal").text("");
        element.find(".estimate_subtotal").text("₹ 0000.00");
        element.find("#estimate_subtotal_amount").val(0);
        element.find(".estimate_total_discount").text("");
        element.find(".estimate_total_discount").text("₹ 0000.00");
        element.find("#estimate_totaldiscount_amount").val(0);
        element.find(".estimate_total_taxes").text("");
        element.find(".estimate_total_taxes").text("₹ 0000.00");
        element.find("#estimate_totaltaxes_amount").val(0);
        element.find(".estimate_total_amount").text("");
        element.find(".estimate_total_amount").text("₹ 0000.00");
        element.find("#estimatetotal_amount").val(0);
        element.find(".rate_data .estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount").val(0);
    }
}
        

 //File attchment

$(document).on("change",".estimate-custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#estimateForm");
    form_data = new FormData(form_data[0]);
    jQuery.each(jQuery('#estimate_attachment')[0].files, function(i, file) {
        form_data.append('attachment['+i+']', file);
    });
    form_data.append('methodName', 'estimate_create_file_upload');
    $.ajax({
        type : "POST",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : form_data,
        processData: false,
        contentType: false,
        success: function(data)
        {
            // $("#estimate_attachment").val('');
        }
    });
});

function estimate_getFilenames()
{
    var fileStatus = 0;
    $fileHtml="";
    var files = $('#estimate_attachment').prop("files");
    var names = $.map(files, function(val){ 
        // console.log(files);
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
            $fileHtml= $fileHtml+"<li class='wrongFileFormat'><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span style='color:#ad4846;'>File format not supported</span></div></li>";

            setTimeout(function () {
                $("li.wrongFileFormat").remove();
            }, 1000);
        }
        else{
            $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span class='material-icons-outlined estimate_unlinkFile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='estimate_unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
        }
    });
    $(".estimate_filesList").append($fileHtml);
}

function estimate_unLinkfile(event)
{
    $(event).closest("li").remove();
    var deleteFile = $(event).closest("span").attr("data-name");

    // ------------ Delete file name from hidden field value ----------
    var uploadedFiles = $("#selected_files").val();
    var fileArray = uploadedFiles.split(",");
    var newArray = [];
    for(var m =0; m < fileArray.length; m++)
    {
        newArray.push($.trim(fileArray[m]));
    }
    newArray = $.grep(newArray, function(value) {
      return value != deleteFile;
    });
    $("#selected_files").val(newArray);
    // ------------ Delete file name from hidden field value ----------
    
    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : { methodName: "estimate_delete_current_file", deleteFile: deleteFile},

        success: function(data)
        {
            $("#estimate_attachment").val('');
        }
    });
}

function unlink_allFiles(event)
{
    $("#estimateForm .estimate_filesList li").remove();
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

$(document).on("click", "#FinanceEstimateModal #estimate_main_details .close", function(){
    unlink_allFiles(this);
});

$(document).on("click","#create_estimate",function(){
    $.ajax({
    type : "GET",
    url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
    dataType : "json",
    data : { methodName: "estimate_deleteFolder"},

    success: function(data)
    {
    }
    });
});


$(document).on("click", "#previewEstimate", function(event){

    event.preventDefault();
    event.stopImmediatePropagation();

    var flag = true;

    if($('#billfromname').length == 0){
        var chk_fromaddr_element = $(".BillingFrom_address_and_gst").find(".BillingFrom_address_main");
        var chk_fromaddr_element_val = chk_fromaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        var chk_fromgst_element = $(".BillingFrom_address_and_gst").find(".BillingFrom_gst_main");
        var chk_fromgst_element_val = chk_fromgst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        
        if(chk_fromaddr_element.is(":visible") && chk_fromaddr_element_val=="Select Billing Entity")
        {
            $("#estimateForm #Address_Details").find(".BillingFrom_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
            $(".BillingFrom_address_main").append("<span class='err text-danger'>Please select billing entity</span>");
        }
        if(chk_fromgst_element.is(":visible") && chk_fromgst_element_val=="Select GSTIN")
        {
            $("#estimateForm #Address_Details").find(".BillingFrom_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
            $(".BillingFromGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
        }
        if(!chk_fromaddr_element.is(":visible") && !chk_fromgst_element.is(":visible"))
        {
            $(".BillingFromCard").css('border-color', '#ad4846');
        }
        flag = false;
    }
    else if($('#estimate_number').val() == "")
    {
        $('#estimate_number').closest("div").find(".err").remove();
        $('#estimate_number').css('border-color', '#ad4846');
        $('#estimate_number').closest("div").append("<span class='err text-danger'>Please enter estimate number</span>");
        flag = false;
    }
    else if($('input[name="estimate_date"]').val() == "")
    {
        $('input[name="estimate_date"]').closest("div").parent().find(".err").remove();
        $('input[name="estimate_date"]').css('border-color', '#ad4846');
        $('input[name="estimate_date"]').closest("div").parent().append("<span class='err text-danger'>Please enter estimate date</span>");
        flag = false;
    }
    else if($('#billtoname').length == 0)
    {
        var chk_toaddr_element = $(".BillingTo_address_and_gst").find(".BillingTo_address_main");
        var chk_toaddr_element_val = chk_toaddr_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        var chk_togst_element = $(".BillingTo_address_and_gst").find(".BillingTo_gst_main");
        var chk_togst_element_val = chk_togst_element.find(".custom-a11yselect-btn .custom-a11yselect-text").text();
        
        if(chk_toaddr_element.is(":visible") && chk_toaddr_element_val=="Select Customer")
        {
            $("#estimateForm #Address_Details_BillTo").find(".BillingTo_address_main .custom-a11yselect-btn").css('border-color', '#ad4846');
            $(".BillingTo_address_main").append("<span class='err text-danger'>Please select customer</span>");
        }
        if(chk_togst_element.is(":visible") && chk_togst_element_val=="Select GSTIN")
        {
            $("#estimateForm #Address_Details_BillTo").find(".BillingTo_gst_main .custom-a11yselect-btn").css('border-color', '#ad4846');
            $(".BillingToGSTDetails_dropdown").append("<span class='err text-danger'>Please select GSTIN</span>");
        }
        if(!chk_toaddr_element.is(":visible") && !chk_togst_element.is(":visible"))
        {
            $(".BillingToCard").css('border-color', '#ad4846');
        }
        flag = false;
    }
    else{
        var len = $("#estimate_main_details .main-group").length;
        $(".err").remove();
        for(var s=0;s<len;s++)
        {
            var current=$("#estimate_main_details .main-group").eq(s);
            if(current.find("input[name='item_descr[]']").val() == ''){
                current.find(".item_descr").css('border-color', '#ad4846');
                current.find(".item_descr").closest("td").append("<span class='err text-danger'>Please enter description</span>");

                $("#FinanceEstimateModal").animate({ 
                    scrollTop:  $("input[name='item_descr[]']").offset().top 
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
            if(current.find("input[name='item_main_amount[]']").val() == ''){
                current.find("input[name='item_main_amount[]']").css('border-color', '#ad4846');
                current.find("input[name='item_main_amount[]']").closest("td").append("<span class='err text-danger'>Please enter amount</span>");

                $("#FinanceEstimateModal").animate({ 
                    scrollTop:  $("input[name='item_main_amount[]']").offset().top 
                }, 100);
                
                flag = false;
            }
        }
    }

    if(flag == false)
    {
      return false;
    }
    else{
        var estimate_summary_value = $("#estimate_summary_value").val();
        var flag1 = true;
        $("#estimate_summary_error").closest('.form-group').remove();
        var sectionOffset = $('#CalculateBtn').offset();
        if(estimate_summary_value == 0){
            $("<div class='form-group'><span id='estimate_summary_error' style='color:#ad4846;'> Calculate estimate summary</span></div>").insertAfter("#CalculateBtn .form-group");
            
            $("#FinanceEstimateModal").animate({ 
                scrollTop:  $("#CalculateBtn").offset().top 
            }, 100);
            
            flag1 = false;
        }
        else if(estimate_summary_value == 2){
            $("<div class='form-group'><span id='estimate_summary_error' style='color:#ad4846;'> Please recalculate estimate summary</span></div>").insertAfter("#CalculateBtn .form-group");
            
            $("#FinanceEstimateModal").animate({ 
                scrollTop:  $("#CalculateBtn").offset().top 
            }, 100);

            flag1 = false;
        }

        if(flag1 == false){
            return false;
        }
        else{
            // $("#EstimatePrviewModel").find("form")[0].reset();
            var formdata= $('#estimateForm');
            var newFilePrevEstFlag = 0;
            form      = new FormData(formdata[0]);
            jQuery.each(jQuery('#estimate_attachment')[0].files, function(i, file) {
                form.append('estimate_attachment['+i+']', file);
                newFilePrevEstFlag = 1;
            });

            /*if(newFilePrevEstFlag)
            {
                $("#FinanceEstimateModal .email-blur-effect, #FinanceEstimateModal .email-loader").show();
            }*/

            $.ajax({
                type    : "POST",
                url     : "../../client/res/templates/financial_changes/previewEstimate.php",
                dataType  : "json",
                processData: false,
                contentType: false,
                data: form,
                success: function(data)
                {
                    if(data)
                    {
                        /*if(newFilePrevEstFlag)
                        {
                            $("#FinanceEstimateModal .email-blur-effect, #FinanceEstimateModal .email-loader").hide();
                        }*/
                        $("#EstimatePrviewModel").html(data).modal('show');
                    }
                }
            });
        }
    }
});

function resetHiddenFields()
{
    $(".estimate_igst_amount, .estimate_cgst_amount, .estimate_sgst_amount, #total_estimate_value, #estimate_summary_value, #estimate_items_discount_selected, #estimate_items_gst_type_selected, #estimate_subtotal_amount, #estimate_totaldiscount_amount, #estimate_totaldiscount_amount, #estimatetotal_amount, #estimate_calculated_disc_amt").val(0);
}

function check_qty_rate(elem){
    var item_rate = $(elem).closest(".main-group").find("input[name='item_rate[]']").val();
    var item_qty = $(elem).closest(".main-group").find("input[name='item_qty[]']").val();
    var item_main_amt = $(elem).closest(".main-group").find("input[name='item_main_amount[]']").val();

    var main_amt_cal = parseFloat(item_rate) * parseFloat(item_qty);

    if((item_main_amt!="" && main_amt_cal != item_main_amt) || main_amt_cal == ""){
        $(elem).closest(".main-group").find("input[name='item_rate[]']").val("");
        $(elem).closest(".main-group").find("input[name='item_qty[]']").val("");
    }
    else if(item_rate == "" || item_rate == "NaN" || item_rate == 0){
        // $(elem).closest(".main-group").find("input[name='item_rate[]']").val(1);
        $(elem).closest(".main-group").find("input[name='item_rate[]']").val('');
    }
}

function cal_estimate_level_amts()
{
    var len = $("#total_items").val();
    var final_total_amt = 0;
    var total_amt = 0;
    var total_disc = 0;

    var amt_after_disc = 0;
    var cal_disc_amt = 0;
    var cal_tax = 0;
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;
    var validation_cnt = 0;
    for(var t=0;t<len;t++)
    {
        var is_empty = $("#estimateForm #participantTable .main-group").find('.main_amount').eq(t).val();
        if(is_empty == '' || is_empty == 'NaN'){
            total_amt = parseFloat(total_amt) + 0;    
        }
        else {
            total_amt = parseFloat(total_amt) + parseFloat($("#estimateForm #participantTable .main-group").find('.main_amount').eq(t).val());
        }

        // Calculation discount for each item
        var items_main_amt = $("#estimateForm #participantTable .main-group").find('.main_amount').eq(t).val();

        var disc_type = $("#estimateForm #participantTable .main-group").next("tr").find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

        var disc_rate = $("#estimateForm #participantTable .main-group").closest("tr").next().find(".rate").eq(t).val();

        var gst_type = $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).text();

        var gst_rate = $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").eq(t).attr("data-val");

        // alert("items_main_amt: "+items_main_amt+" === disc_type: "+disc_type+" === disc_rate: "+disc_rate+" === gst_type: "+gst_type+" === gst_rate: "+gst_rate);

        // =========== Code for item level discount calculations starts ==========
        if(disc_type!="Select Type")
        {
            var cur_html = $("#estimateForm #participantTable .main-group");
            var cur_rate_html = $("#estimateForm #participantTable .main-group").closest("tr").next().find(".rate").eq(t);

            var current = cur_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
            if(disc_rate!="")
            {   
                $("#estimateForm").find("#estimate_calculated_disc_amt").val(disc_rate);   
                if(disc_type == "Percentage")
                {
                    /*if(disc_rate > 100)
                    {
                        Percentage_validation_estimate(cur_rate_html, disc_rate);
                    }*/
                    cal_disc_amt = (parseFloat(items_main_amt) * parseFloat(disc_rate))/100;

                    $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).text("₹ "+cal_disc_amt.toFixed(2));
                    $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+cal_disc_amt+'">');
                }
                if(disc_type == "Amount")
                {
                    // var main_amt = $("#estimateForm #participantTable .main-group").find('.main_amount').eq(t).val();
                    /*if(disc_rate > items_main_amt){
                        Amount_validation_estimate(cur_html, disc_rate, parseFloat(items_main_amt));
                    }*/

                    $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).text("₹ "+parseFloat(disc_rate).toFixed(2));
                    $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+disc_rate+'">');
                }
            }
            else if(disc_rate == ""){
                $("#estimateForm").find("#estimate_calculated_disc_amt").val(0);

                $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).text("₹ 0000.00");

                $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
            }
        }
        else{
            $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).text("₹ 0000.00");

            $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount .calculated_discount").eq(t).remove();

            $("#estimateForm #participantTable .main-group").closest("tr").next().find(".main_amount").eq(t).append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
        }
        // =========== Code for item level discount calculations ends ==========
        
        var disc_cal_val = $("#estimateForm #participantTable .main-group").next("tr").find(".calculated_discount").eq(t).val();
        
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
                $("#participantTable .participantRow .SGST_Discount").hide();

                cal_tax = (parseFloat(val_for_tax) * parseInt(gst_rate))/100;

                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_igst_amount").eq(t).val(cal_tax);
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_cgst_amount").eq(t).val(0);
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_sgst_amount").eq(t).val(0);

                $("#participantTable .participantRow .GST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");
            }
            if(gst_type == "CGST")
            {
                $("#participantTable .participantRow .SGST_Discount").show();

                var split_tax = parseInt(gst_rate) / 2;
                cal_tax = (parseFloat(val_for_tax) * parseFloat(split_tax))/100;

                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_igst_amount").eq(t).val(0);
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_cgst_amount").eq(t).val(cal_tax);
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_sgst_amount").eq(t).val(cal_tax);

                $("#participantTable .participantRow .SGST_Discount").closest("tr").find(".estimate_remove_adddiscount").css("display","inline-block");
            }
            if(cal_tax===0){
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ 0000.00");
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
            }
            else{
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ "+cal_tax.toFixed(2));
                $("#estimateForm #participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ "+cal_tax.toFixed(2));
            }
        }
        else {
            $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".rate_data .item_igst_amount,.item_cgst_amount,.item_sgst_amount").eq(t).val(0);

            $("#estimateForm #participantTable .main-group").closest("tr").next().next().next().find(".main_amount").eq(t).text("₹ 0000.00");
            $("#estimateForm #participantTable .main-group").closest("tr").next().next().find(".main_amount").eq(t).text("₹ 0000.00");
        }
        // =========== Code for item gst calculations ends ==========

        var disc_fld = $("#estimateForm #participantTable .main-group").next("tr").find(".main_amount .calculated_discount").eq(t).val();

        total_disc = parseFloat(total_disc) + parseFloat(disc_fld);
    }
    final_total_amt = parseFloat(total_amt) - parseFloat(total_disc);

    $("#total_estimate_value").val(final_total_amt);

    var t = $("#total_estimate_value").val();
    var hide_est_disc_or_not = $("#estimate_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type = $("#Calculate_discounts").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#estimate_disc_amt");
    $("#estimate_calculated_disc_amt").val(0);
    // If estimate level discount row visible
    if(hide_est_disc_or_not == 0)
    {
        if(est_selected_disc_type != "Select Type")
        {
            if(est_selected_disc_rate && est_selected_disc_rate!="NaN")
            {   
                if(est_selected_disc_type == 'Percentage')
                {   
                    var current = curr_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    // Percentage_validation_estimate(curr_html, est_selected_disc_rate);

                    var cal_estimate_disc = (parseFloat(t) * parseFloat(est_selected_disc_rate))/100;
                    $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+cal_estimate_disc.toFixed(2));
                    $("#estimate_calculated_disc_amt").val(cal_estimate_disc);
                }
                if(est_selected_disc_type == 'Amount')
                {   
                    // Amount_validation_estimate(curr_html, est_selected_disc_rate, parseFloat(t));

                    $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+est_selected_disc_rate.toFixed(2));
                    $("#estimate_calculated_disc_amt").val(est_selected_disc_rate);
                }
            }
            else {
                $("#estimate_calculated_disc_amt").val(t);
                $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
                $("#estimate_disc_amt").closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                $("#estimate_disc_amt").closest("tr").next().next().next().find(".main_amount").text("₹ 0000.00");
            }
            $("#Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        }
        else {
            $("#estimate_disc_amt").val('');
            $("#estimate_calculated_disc_amt").val(0);
            $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
            $("#Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);

            }
            if(est_selected_gst_type == 'CGST')
            {
                new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }

    // estimate_level_discount_change(final_total_amt);

    // If estimate level gst row visible
    var hide_est_gst_or_not = $("#estimate_items_gst_type_selected").val();
    if(hide_est_gst_or_not == 0)
    {   
        if(est_selected_gst_type != "Select Type")
        {
            // If estimate level gst type is selected
            if(est_selected_disc_type!="Select Type")
            {   
                if(est_selected_disc_type == "Percentage"){
                    if($("#estimate_calculated_disc_amt").val()!="")
                    {
                        if($("#estimate_disc_amt").val()!=""){
                            new_final_total_amt = parseFloat(t) - parseFloat($("#estimate_calculated_disc_amt").val());
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
                    new_final_total_amt = parseFloat(t) - parseFloat($("#estimate_calculated_disc_amt").val());
                }
            }
            else {
                new_final_total_amt = parseFloat(t);
            }

            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ 0000.00");
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
            }
        }
        else {
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }

    // estimate_level_gst_change(final_total_amt);
}

function item_rate_change(elem)
{   
    var item_qty = $(elem).closest(".main-group").find("input[name='item_qty[]']").val();
    var item_rate = $(elem).closest(".main-group").find("input[name='item_rate[]']").val();
    if(item_rate != ""){
        if(item_qty == "" || item_qty == "NaN" || item_qty == 0){
            $(elem).closest(".main-group").find("input[name='item_qty[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='item_qty[]']").val("");
    }*/
}

function item_qty_change(elem)
{   
    var item_qty = $(elem).closest(".main-group").find("input[name='item_qty[]']").val();
    var item_rate = $(elem).closest(".main-group").find("input[name='item_rate[]']").val();
    if(item_qty != ""){
        if(item_rate == "" || item_rate == "NaN" || item_rate == 0){
            $(elem).closest(".main-group").find("input[name='item_rate[]']").val(1);
        }
    }
    /*else{
        $(elem).closest(".main-group").find("input[name='item_rate[]']").val("");
    }*/
}

function item_discount_type_change(elem)
{
    var main_amount = $(elem).closest("tr").prev().find(".main_amount").val();
    var disc_type = $(elem).closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_rate = $(elem).closest("tr").find(".rate").val();
    var calculated_disc = 0;

    if(disc_type!="Select Type")
    {
        if(disc_rate!="")
        {
            if(disc_type == "Percentage")
            {
                calculated_disc = (parseFloat(main_amount) * parseFloat(disc_rate))/100;
                $(elem).closest("tr").find(".main_amount").text("₹ "+calculated_disc.toFixed(2));
                $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+calculated_disc+'">');
            }
            if(disc_type == "Amount")
            {   
                $(elem).closest("tr").find(".main_amount").text("₹ "+parseFloat(disc_rate).toFixed(2));
                calculated_disc = parseFloat(main_amount) - parseFloat(disc_rate);
                $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+disc_rate+'">');
            }
        }
        else {
            $(elem).closest("tr").find(".main_amount").text('₹ 0000.00');
            $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
        }
        $("#estimate_items_discount_selected").val(1);
    }
    else {
        $(elem).closest("tr").find(".main_amount").text('₹ 0000.00');
        $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');

        $("#estimate_items_discount_selected").val(0);
    }
}

function item_discount_rate_change(elem)
{
    var main_amount = $(elem).closest("tr").prev().find(".main_amount").val();
    var disc_type = $(elem).closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var disc_rate = $(elem).val();
    var calculated_disc = 0;
    if(disc_type!="Select Type")
    {
        if(disc_rate!="")
        {
            if(disc_type == "Percentage")
            {
                calculated_disc = (parseFloat(main_amount) * parseFloat(disc_rate))/100;
                $(elem).closest("tr").find(".main_amount").text("₹ "+calculated_disc.toFixed(2));
                $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+calculated_disc+'">');
            }
            if(disc_type == "Amount")
            {
                calculated_disc = parseFloat(disc_rate);
                $(elem).closest("tr").find(".main_amount").text("₹ "+parseFloat(disc_rate).toFixed(2));
                $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="'+disc_rate+'">');
            }
            $("#estimate_items_discount_selected").val(1);
        }
        else {
            $(elem).closest("tr").find(".main_amount").text('₹ 0000.00');
            $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
            $(elem).closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
            $(elem).closest("tr").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("tr").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");
        }
    }
    else {
        $(elem).closest("tr").find(".main_amount").text('₹ 0000.00');
        $(elem).closest("tr").find(".main_amount").append('<input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0">');
        $(elem).closest("tr").find(".main_amount .calculated_discount").val(0);
        $(elem).closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text("Select Type");
        $(elem).closest("tr").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("tr").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $("#estimate_items_discount_selected").val(0);

    }
}

function item_gst_type_change(elem)
{
    var main_amount = $(elem).closest("tr").prev().prev().find(".main_amount").val();

    var cal_disc_amt = $(elem).closest("tr").prev().find(".main_amount .calculated_discount").val();
    
    var disc_type = $(elem).closest("tr").prev().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected .custom-a11yselect-focused").text();

    var disc_rate = $(elem).closest("tr").prev().find(".rate").val();

    var gst_type = $(elem).closest(".GST_section").find(".custom-a11yselect-btn .custom-a11yselect-text").text();

    var gst_rate = $(elem).closest("tr").find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val"); 
    
    var gst_cal = 0;
    var splitted_tax = 0;
    if(main_amount!="")
    {
        if(gst_type!="Select Type")
        {
            var cal_gst = 0;
            gst_cal = parseFloat(main_amount) - parseFloat(cal_disc_amt);
            if(gst_type == 'IGST')
            {
                $("#participantTable .participantRow .SGST_Discount").hide();
                cal_gst = (parseFloat(gst_cal) * parseFloat(gst_rate))/100;
                $(elem).closest("td").next().find(".item_igst_amount").val(cal_gst);
                $(elem).closest("td").next().find(".item_cgst_amount").val(0);
                $(elem).closest("td").next().find(".item_sgst_amount").val(0);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
            if(gst_type == 'CGST'){
                $("#participantTable .participantRow .SGST_Discount").show();
                splitted_tax = gst_rate/2;
                cal_gst = (parseFloat(gst_cal) * parseFloat(splitted_tax))/100;
                $(elem).closest("td").next().find(".item_igst_amount").val(0);
                $(elem).closest("td").next().find(".item_cgst_amount").val(cal_gst);
                $(elem).closest("td").next().find(".item_sgst_amount").val(cal_gst);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
                    $(elem).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                    $(elem).closest("tr").next().find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
        } 
        else {
            $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
            $(elem).closest("td").next().find(".item_igst_amount").val(0);
            $(elem).closest("td").next().find(".item_cgst_amount").val(0);
            $(elem).closest("td").next().find(".item_sgst_amount").val(0);
        }
    }
    else {
        $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
        $(elem).closest("td").next().find(".item_igst_amount").val(0);
        $(elem).closest("td").next().find(".item_cgst_amount").val(0);
        $(elem).closest("td").next().find(".item_sgst_amount").val(0);
    } 
}

function item_gst_rate_change(elem)
{
    var main_amount = $(elem).closest("tr").prev().prev().find(".main_amount").val();

    var cal_disc_amt = $(elem).closest("tr").prev().find(".main_amount .calculated_discount").val();
    
    var disc_type = $(elem).closest("tr").prev().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-selected .custom-a11yselect-focused").text();

    var disc_rate = $(elem).closest("tr").prev().find(".rate").val();

    var gst_type = $(elem).closest("tr").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();

    var gst_rate = $(elem).closest("tr").find(".rate_data .custom-a11yselect-menu .custom-a11yselect-selected").attr("data-val");

    var gst_cal = 0;
    var splitted_tax = 0;
    if(main_amount!="")
    {
        if(gst_type!="Select Type")
        {
            var cal_gst = 0;
            gst_cal = parseFloat(main_amount) - parseFloat(cal_disc_amt);
            if(gst_type == 'IGST')
            {
                cal_gst = (parseFloat(gst_cal) * parseFloat(gst_rate))/100;
                $(elem).closest("td").find(".item_igst_amount").val(cal_gst);
                $(elem).closest("td").find(".item_cgst_amount").val(0);
                $(elem).closest("td").find(".item_sgst_amount").val(0);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
            if(gst_type == 'CGST'){
                splitted_tax = gst_rate/2;
                cal_gst = (parseFloat(gst_cal) * parseFloat(splitted_tax))/100;
                $(elem).closest("td").find(".item_igst_amount").val(0);
                $(elem).closest("td").find(".item_cgst_amount").val(cal_gst);
                $(elem).closest("td").find(".item_sgst_amount").val(cal_gst);
                if(gst_rate==0){
                    $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
                    $(elem).closest("tr").next().find(".main_amount").text("₹ 0000.00");
                }
                else {
                    $(elem).closest("tr").find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                    $(elem).closest("tr").next().find(".main_amount").text("₹ "+cal_gst.toFixed(2));    
                }
            }
        } 
        else {
            $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
            $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

            $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
            $(elem).closest("td").next().find(".item_igst_amount").val(0);
            $(elem).closest("td").next().find(".item_cgst_amount").val(0);
            $(elem).closest("td").next().find(".item_sgst_amount").val(0);
        }
    }
    else {
        $(elem).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("td").next().find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
        $(elem).closest("td").next().find(".custom-a11yselect-option:first").addClass("custom-a11yselect-selected custom-a11yselect-focused");

        $(elem).closest("tr").find(".main_amount").text("₹ 0000.00");
        $(elem).closest("td").next().find(".item_igst_amount").val(0);
        $(elem).closest("td").next().find(".item_cgst_amount").val(0);
        $(elem).closest("td").next().find(".item_sgst_amount").val(0);
    }
}

function estimate_level_discount_change(final_total_amt)
{
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;

    var t = $("#total_estimate_value").val();
    var hide_est_disc_or_not = $("#estimate_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type = $("#Calculate_discounts").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#estimate_disc_amt");
    $("#estimate_calculated_disc_amt").val(0);
    // If estimate level discount row visible
    if(hide_est_disc_or_not == 0)
    {
        if(est_selected_disc_type != "Select Type")
        {
            if(est_selected_disc_rate && est_selected_disc_rate!="NaN")
            {   
                if(est_selected_disc_type == 'Percentage')
                {   
                    var current = curr_html.closest("tr").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                    Percentage_validation_estimate(curr_html, est_selected_disc_rate);

                    var cal_estimate_disc = (parseFloat(t) * parseFloat(est_selected_disc_rate))/100;
                    $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+cal_estimate_disc.toFixed(2));
                    $("#estimate_calculated_disc_amt").val(cal_estimate_disc);
                }
                if(est_selected_disc_type == 'Amount')
                {   
                    Amount_validation_estimate(curr_html, est_selected_disc_rate, parseFloat(t));

                    $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ "+est_selected_disc_rate.toFixed(2));
                    $("#estimate_calculated_disc_amt").val(est_selected_disc_rate);
                }
            }
            else {
                $("#estimate_calculated_disc_amt").val(t);
                $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
                $("#estimate_disc_amt").closest("tr").next().next().find(".main_amount").text("₹ 0000.00");
                $("#estimate_disc_amt").closest("tr").next().next().next().find(".main_amount").text("₹ 0000.00");
            }
            $("#Calculate_discounts .Estimate_Percentage").closest("tr").find(".estimate_remove_discount").css("display","inline-block");
        }
        else {
            $("#estimate_disc_amt").closest("td").next().find(".main_amount").text("₹ 0000.00");
            $(this).closest("tr").find(".estimate_remove_discount").css("display","none");
        }
    }
    else {
        if(est_selected_gst_type != 'Select Type')
        {
            if(est_selected_gst_type == 'IGST')
            {   
                new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);

            }
            if(est_selected_gst_type == 'CGST')
            {
                new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
    }
}

function estimate_level_gst_change(final_total_amt)
{   
    var val_for_tax = 0;
    var new_final_total_amt = 0;
    var new_cal = 0;

    var t = $("#total_estimate_value").val();
    var hide_est_disc_or_not = $("#estimate_items_discount_selected").val();

    // Estimate level discount fields
    var est_selected_disc_type = $("#Calculate_discounts").find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_disc_rate = parseFloat($("#estimate_disc_amt").val());

    // Estimate level GST fields
    var est_selected_gst_type = $("#Calculate_discounts").find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
    var est_selected_gst_per = $("#Calculate_discounts").find('.rate_data .custom-a11yselect-menu .custom-a11yselect-selected').attr("data-val");
    var est_split_tax = parseFloat(est_selected_gst_per) / 2;

    var curr_html = $("#estimate_disc_amt");

    // If estimate level gst row visible
    var hide_est_gst_or_not = $("#estimate_items_gst_type_selected").val();
    if(hide_est_gst_or_not == 0)
    {   
        if(est_selected_gst_type != "Select Type")
        {      
            // If estimate level gst type is selected
            if(est_selected_disc_type!="")
            {   
                if(est_selected_disc_type == "Percentage"){
                    if($("#estimate_calculated_disc_amt").val()!="")
                    {
                        if($("#estimate_disc_amt").val()!=""){
                            new_final_total_amt = parseFloat(t) - parseFloat($("#estimate_calculated_disc_amt").val());
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
                    new_final_total_amt = parseFloat(t) - parseFloat($("#estimate_calculated_disc_amt").val());
                }
            }

            if(est_selected_gst_type == 'IGST')
            {   
                var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of igst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
            }
            if(est_selected_gst_type == 'CGST')
            {
                var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
                // Values into the hidden fields of cgst & sgst
                $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
                $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
                $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
            }
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        else{
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ 0000.00");
            $("#Calculate_discounts").find(".CGST_TR_section .main_amount").text("₹ 0000.00");
        }
    }
    else {
        if(est_selected_gst_type == 'IGST')
        {   
            var new_cal = (parseFloat(est_selected_gst_per) * parseFloat(new_final_total_amt))/100;
            // Values into the hidden fields of igst
            $("#Calculate_discounts").find(".estimate_igst_amount").val(new_cal);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
        }
        if(est_selected_gst_type == 'CGST')
        {
            var new_cal = (parseFloat(est_split_tax) * parseFloat(new_final_total_amt))/100;
            // Values into the hidden fields of cgst & sgst
            $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
            $("#Calculate_discounts").find(".estimate_cgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".estimate_sgst_amount").val(new_cal);
            $("#Calculate_discounts").find(".SGST_Discount .main_amount").text("₹ "+new_cal.toFixed(2));
        }
        $("#Calculate_discounts").find(".estimate_igst_amount").val(0);
        $("#Calculate_discounts").find(".estimate_cgst_amount").val(0);
        $("#Calculate_discounts").find(".estimate_sgst_amount").val(0);
    }
}