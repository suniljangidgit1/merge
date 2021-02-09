<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
     <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
            text-align: left;
        }
        table
        {   
            border-collapse: collapse;
            padding-right: 30px;
            border: 1px solid #ccc;
            margin: 5px;
            
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }
        table th, table td
        {
           
            border: 1px solid #ccc;
        }
       
    </style>
</head>
<body>
   
   <div>
    <h3 style="background-color: #F7F7F7; ">ATTENDANCE SHEET</h3>
   </div>
   <div class="container">
     <table style="margin-bottom: 30px;"  cellspacing="0" cellpadding="3">
        
        <tr>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Name</th>
             <td style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Position</td>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Genrated On</th>
            <td style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Total Hours</td>
           
            
           
        </tr>
        <tr>
            <td><?php echo $summary["username"]; ?></td>
            <td><?php echo $summary["position"]; ?></td>
            <td><?php echo Date("d-m-Y"); ?></td>
            <td><?php echo $summary["totalHours"] ;?></td>
            
        </tr>
        <tr>
             <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Month</th>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Year</th>
            <td style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Total Present</td>
            <td style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Total Absent</td>
            
           
        </tr>
        <tr>
            <td><?php echo date("F", mktime(0, 0, 0, $summary["month"], 10)) ?></td>
            <td><?php echo $summary["year"]; ?></td>
            <td><?php echo $summary["totalRecords"]; ?></td>
            <td><?php echo $summary["leaves"]; ?></td>
           
        </tr>
       
    </table>
    </div>
    
    <div class="container">
         <table style="margin-bottom: 30px;"  cellspacing="0" cellpadding="3">
        <tr>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Date</th>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Day</th>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">In Time</th>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Out Time</th>
            <th style="background-color: #F7F7F7; color: #333;
            font-weight: bold;">Total Hours </th>
        </tr>
        <?php foreach($containt as $value) { ?>
        <tr>
        
            <td><?php echo $value["daily_sheet_date"] ?></td>
            <td><?php echo $value["day"] ?></td>
            <td><?php echo $value["intime"] ?></td>
            <td><?php echo $value["outtime"] ?></td>
            <td><?php echo $value["hours"] ?></td>
            
        </tr>
     
        <?php } ?>
    </table>
</div>
</body>
</html>