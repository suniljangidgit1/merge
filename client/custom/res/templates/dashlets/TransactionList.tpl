<div class="list-container">
    <div class="list list-expanded">
        <ul class="list-group TransactionList wizard">
            <div class="v-line"></div>
            
            <div class="transactionAppend">
                <div class="list-container transactionNoData">No Data</div>
            </div>

            <!-- <div class="step">
                <span>21 Jun, 2020</span>
                <li data-id="" class="container list-group-item list-row">
                    <div class="row">
                        <div class="col-xs-12 pl0">
                            <div class="expanded-row expanded-header">
                                <span class="cell task_data col-xs-6" data-name="name"><a href="" class="link" data-id="" title="Bill Pay">Bill Pay</a>
                                </span>
                                <span class="cell task_data col-xs-5 pull-right"><span class="link ml5" data-id="">21 Jun, 2020&nbsp;<span>05:24 PM</span></span>
                                </span>
                            </div>
                            <div class="expanded-row expanded-cost">
                                <span class="cell task_data col-xs-10"><span>₹ 824.82</span>
                                </span>
                            </div>
                            <div class="expanded-row expanded-assign">
                                <a href="#"><span class="cell task_data col-xs-5 pull-right text-right text-uppercase mr5">
                                Pay
                                </span></a>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="step">
                <span>21 Jun, 2020</span>
                <li data-id="" class="container list-group-item list-row">
                    <div class="row">
                        <div class="col-xs-12 pl0">
                            <div class="expanded-row expanded-header">
                                <span class="cell task_data col-xs-6" data-name="name"><a href="" class="link" data-id="" title="Bill Paid">Bill Paid</a>
                                </span>
                                <span class="cell task_data col-xs-5 pull-right"><span class="link ml5" data-id="">21 Jun, 2020&nbsp;<span>05:24 PM</span></span>
                                </span>
                            </div>
                            <div class="expanded-row expanded-cost">
                                <span class="cell task_data col-xs-10"><span>₹ 824.82</span>
                                </span>
                            </div>
                            <div class="expanded-row expanded-assign">
                                <a href="#"><span class="cell task_data col-xs-5 pull-right text-right text-uppercase mr5">
                                View Receipt
                                </span></a>
                            </div>
                        </div>
                    </div>
                </li>
            </div> -->
            
        </ul>
    </div>
</div>



<script >
    
    var toPrintDiv = "";

    // GET USER DATA
    function getDomainTransactionData() {
        
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainTransactionData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                $(".TransactionList .transactionAppend ").html("");
                if( response.status == "true" ){
                    
                    $(".TransactionList .transactionAppend ").html(response.data );
                }else{
                    $(".TransactionList .transactionAppend ").html('<div class="list-container transactionNoData pd15">No Data</div>');
                }
            },
        });
    }   

    getDomainTransactionData();

    $(document).on( "click", ".viewPaymentReceipt", function() {

        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();
        var pid        = $(this).data("pid");

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainTransactionDetailsData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate, pid : pid },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                $("#transactionDetailsModal ").modal("show");
                $("#transactionDetailsModal .transactionDetailsModalBody ").html("");
                if( response.status == "true" ){
                    $("#transactionDetailsModal .transactionDetailsModalBody ").html(response.data );
                    toPrintDiv = response.data;
                }else{
                    $("#transactionDetailsModal .transactionDetailsModalBody ").html('<div class="list-container transactionDetailsModalNoData">No Data</div>');
                }
            },
        });

    });

    $(document).on( "click", ".printBtn", function() {

        var printDiv    = $("#transactionDetailsModal .transactionDetailsModalBody .printPaymentDetails").html();
        
        var extraHtml   = '<head> <title>Payment Receipt </title> </head>';
        var newWin      = window.open("");
        newWin.document.write('<html> '+extraHtml+' <body style="text-align:center;padding:20px;" > '+printDiv+' </body></html>');
        newWin.print();
        newWin.close();

    });
</script>