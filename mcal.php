<div style="padding:9px 0 0 0; margin-top:10px; width:97%">

<div class="Coll" style="width:420px; float:left; margin-right:55px;">

<h2 style="font-size:16px; padding:10px 0 5px 0;">Mortgage Summary</h2>
<div class="Box">

<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Total Payments</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Payments:</strong><br>The total amount paid over the course of the loan, including both interest and principal.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey" id="TotalPay">AED 1,934,176.73 </span></td>
  </tr>
  
  <tr>
    <td>Total Interest</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Interest:</strong><br>The total amount of interest paid over the course of the loan.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey" id="TotalInterest">AED 634,176.73 </span></td>
  </tr>
  
  <tr>
    <td>Years Until Paid Off</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Years Until Paid Off:</strong><br> If you elect to make extra payments, you may be able to pay off your loan early.<br><strong>Important:</strong> For variable rate mortgages, the monthly payment is adjusted whenever the rate changes! So, even if you make extra payments, you may not end up paying your loan off early.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey" id="TYears"><?php echo $_POST['year_term']; ?></span></td>
  </tr>
  
  <tr>
    <td>Last Payment Date</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey" id="lastpaydate">11/30/2020</span></td>
  </tr>
  
  <tr>
    <td><strong>Interest Savings</strong></td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Interest Savings</strong><br>The reduced interest associated with making extra payments or &quot;prepayments&quot;. When you make extra payments on the principal, then you pay less interest in the long run.<br>This calculation does NOT include any tax deductions.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixBlue">AED 0</span></td>
  </tr>
  
</table>
</div>

</div>



<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
	$interest=0;
include("admin/includes/functions.php");
session_start();
$fpdate=$_POST['fPayDate'];
$fpdate=date2mysql($fpdate);


 /* This give me the one day after the current day */ 
    
    /* --------------------------------------------------- *
     * Set Form DEFAULT values
     * --------------------------------------------------- */
    $default_sale_price              = "150000";
    $default_annual_interest_percent = 7.0;
    $default_year_term               = 30;
    $default_down_percent            = 10;
    $default_show_progress           = TRUE;
	$monthinterest					 = 0;
	$pripaid			             = 0;
	$balance						 = 0;
    /* --------------------------------------------------- */
    


    /* --------------------------------------------------- *
     * Initialize Variables
     * --------------------------------------------------- */
    $sale_price                      = 0;
    $annual_interest_percent         = 0;
    $year_term                       = 0;
    $down_percent                    = 0;
    $this_year_interest_paid         = 0;
    $this_year_principal_paid        = 0;
    $form_complete                   = false;
    $show_progress                   = false;
    $monthly_payment                 = false;
    $show_progress                   = false;
    $error                           = false;
    /* --------------------------------------------------- */


    /* --------------------------------------------------- *
     * Set the USER INPUT values
     * --------------------------------------------------- */

        $sale_price                      = $_POST['sale_price'];
		$sale_price=str_replace(" ","",$sale_price);
		$sale_price=str_replace("AED","",$sale_price);
		$sale_price=str_replace(" ","",$sale_price);
		$annual_interest_percent         = $_POST['annual_interest_percent'];
        $year_term                       = $_POST['year_term'];
        $down_percent                    = $_POST['down_percent'];
		$down_percent=str_replace(" ","",$down_percent);
		$down_percent=str_replace("AED","",$down_percent);
		$down_percent=str_replace(" ","",$down_percent);
        $show_progress                   = (isset($_POST['show_progress'])) ? $_POST['show_progress'] : false;
        $form_complete                   = $_POST['form_complete'];
		$first_paymentdt				 = $_POST['fPayDate'];
		

    /* --------------------------------------------------- */
    
    
    ?>
    <style type="text/css">
        <!--
            td {
                font-size : 11px; 
                font-family : tahoma, helvetica, arial, lucidia, sans-serif; 
                color : #000000; 
            }
        -->
    </style> 


    <?php    
    /* --------------------------------------------------- */
    // This function does the actual mortgage calculations
    // by plotting a PVIFA (Present Value Interest Factor of Annuity)
    // table...
    function get_interest_factor($year_term, $monthly_interest_rate) {
        global $base_rate;
        
        $factor      = 0;
        $base_rate   = 1 + $monthly_interest_rate;
        $denominator = $base_rate;
        for ($i=0; $i < ($year_term * 12); $i++) {
            $factor += (1 / $denominator);
            $denominator *= $base_rate;
        }
        return $factor;
    }        
    /* --------------------------------------------------- */

    // If the form is complete, we'll start the math
    if ($form_complete) {
        // We'll set all the numeric values to JUST
        // numbers - this will delete any dollars signs,
        // commas, spaces, and letters, without invalidating
        // the value of the number
        $sale_price              = ereg_replace( "[^0-9.]", "", $sale_price);
        $annual_interest_percent = eregi_replace("[^0-9.]", "", $annual_interest_percent);
        $year_term               = eregi_replace("[^0-9.]", "", $year_term);
        $down_percent            = eregi_replace("[^0-9.]", "", $down_percent);
        
        if (((float) $year_term <= 0) || ((float) $sale_price <= 0) || ((float) $annual_interest_percent <= 0)) {
            $error = "You must enter a <b>Sale Price of Home</b>, <b>Length of Motgage</b> <i>and</i> <b>Annual Interest Rate</b>";
        }
        
        if (!$error) {
            $month_term              = $year_term * 12;
            $down_payment            = $down_percent;
            $annual_interest_rate    = $annual_interest_percent / 100;
            $monthly_interest_rate   = $annual_interest_rate / 12;
            $financing_price         = $sale_price - $down_payment;
            $monthly_factor          = get_interest_factor($year_term, $monthly_interest_rate);
            $monthly_payment         = $financing_price / $monthly_factor;
        }
    } else {
        if (!$sale_price)              { $sale_price              = $default_sale_price;              }
        if (!$annual_interest_percent) { $annual_interest_percent = $default_annual_interest_percent; }
        if (!$year_term)               { $year_term               = $default_year_term;               }
        if (!$down_percent)            { $down_percent            = $default_down_percent;            }
        if (!$show_progress)           { $show_progress           = $default_show_progress;           }
    }
    
    if ($error) {
        print("<font color=\"red\">" . $error . "</font><br><br>\n");
        $form_complete   = false;
    }
?>


<?php
    // This prints the calculation progress and 
    // the instructions of HOW everything is figured
    // out
   // if ($form_complete && $show_progress) {
        $step = 1;
?>
  <div class="MortgageResult">
 
<h2 style="font-size:16px; padding:10px 0 5px 0;">Payment Schedule</h2>
<div class="Main">
<div class="Tab">
<table width="920" border="0" cellspacing="0" align="center" height="39">
  <tr>
    <td width="65"><span>No.</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('Payment Number',110)";
onMouseout="hideddrivetip()" /></td>
    <td width="125"><span>Payment Date</span></span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<srrong>Payment Date:</strong> This calculator assumes that the payments are made at the END of each period.',300)";
onMouseout="hideddrivetip()" /></td>
    <td width="125"><span>Interest Rate</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Current Annual Interest Rate:</strong><br>For a variable or adjustable-rate mortgages (ARM), this column indicates what the current annual interest rate is for each payment period.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="110"><span>Interest Due</span> </td>
    <td width="130"><span>Payment Due</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Payment:</strong><br> The required payment that includes both interest and principal.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="118"><span>Extra Payments</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Extra Payments (Prepayments)</strong><br>(Assumes no penalties for making prepayments on the principal) <br><br>  The amounts in the Extra Payments column are based on the inputs chosen in the Extra Payments section above. To manually enter extra payments, use the Additional Payment column.<br> <br> The complication of the formula in this column comes from having to prevent overpaying on the last few payments. For example, if you normally make a sizable annual extra payment, the formula must make sure that your last annual payment isnt more than the balance due. If it is, then the extra payment is adjusted to bring the balance exactly to zero.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="22">&nbsp;</td>
    <td width="103"><span>Principal Paid</span></td>
    <td width="72"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance</span></td>
    <td width="72"><span>&nbsp;&nbsp;Year</span></td>
  </tr>
</table>

</div>

<div class="Area">
<table width="930" border="0" cellspacing="0" align="left">
  
 
 
  


    
<?php
        // Set some base variables
        $principal     = $financing_price;
        $current_month = 1;
        $current_year  = 1;
        // This basically, re-figures out the monthly payment, again.
        $power = -($month_term);
        $denom = pow((1 + $monthly_interest_rate), $power);
        $monthly_payment = $principal * ($monthly_interest_rate / (1 - $denom));  
      
        ?>
		 <input type="hidden" name="EMIVal" value="<?php echo number_format($monthly_payment, "2", ".", ","); ?>" id="EMIVal" />
		<?php
     
            $newdate=$fpdate;    
        // Loop through and get the current month's payments for 
        // the length of the loan 
        while ($current_month <= $month_term) { 
		
            $interest_paid     = $principal * $monthly_interest_rate;
            $principal_paid    = $monthly_payment - round($interest_paid,2);
            $remaining_balance = $principal - $principal_paid;
            $this_year_interest_paid  = $this_year_interest_paid + round($interest_paid,2);
            $this_year_principal_paid = $this_year_principal_paid + $principal_paid;
			
			?>
			
			<tr align="center" bgcolor="#f2f2f2">
    <td width="45"><?php echo $current_month; ?></td>
    <td width="95"><?php echo date2php($newdate);?></td>
    <td width="100"><?php echo number_format($annual_interest_percent, "3", ".", ","); ?>%</td>
    <td width="80"><?php echo number_format($interest_paid, "2", ".", ","); ?></td>
    <td width="100"><?php echo number_format($dueamount, "2", ".", ","); ?></td>    
    <td width="65"><?php echo  number_format($down_percent, "2", ".", ","); ?></td>
    <td width="35">&nbsp;</td>
    <td width="65"><?php echo number_format($principal_paid, "2", ".", ","); ?></td>
    <td width="30"><?php echo number_format($remaining_balance, "2", ".", ","); ?></td>
	<?php 
	$interest+=$this_year_interest_paid;
	$interest=round($interest,2);
	$principle+=$this_year_principal_paid;
	$monthinterest=$monthinterest+$interest_paid;
	$pripaid=$pripaid+$principal_paid;
	$balance=$sale_price-$pripaid;
	?>
   <input type="hidden" id="intere<?php echo $current_month; ?>" value="<?php echo number_format($monthinterest, "2", ".", ",");?>">
   <input type="hidden" id="prici<?php echo $current_month; ?>" value="<?php echo number_format($pripaid, "2", ".", ",");?>">
   <input type="hidden" id="balance<?php echo $current_month; ?>" value="<?php echo number_format($balance, "2", ".", ",");?>">
    <input type="hidden" id="datebal<?php echo $current_month; ?>" value="<?php echo date2php($newdate);?>">
   
  <?php
/*
            
          
            print("\t\t<td align=\"right\">\$" . number_format($interest_paid, "2", ".", ",") . "</td>\n");			
            print("\t\t<td align=\"right\">\$" . number_format($principal_paid, "2", ".", ",") . "</td>\n");
			
			 print("\t\t<td align=\"right\">\$" . number_format($dueamount, "2", ".", ",") . "</td>\n");
            print("\t\t<td align=\"right\">\$" . number_format($remaining_balance, "2", ".", ",") . "</td>\n");
            print("\t</tr>\n");
					    
    
           
    */
	 ($current_month % 12) ? $show_legend = FALSE : $show_legend = TRUE;
	$dueamount=$interest_paid+$principal_paid;
	
	$newdate=addDays($newdate,30);
            if ($show_legend) {		
			$total_spent_this_year = $this_year_interest_paid + $this_year_principal_paid;           
               $total_spent_this_year=($dueamount*$month_term)-$total_spent_this_year;
				?>
				<td width="40" style="text-align:left"><?php echo $current_year; ?></td>
				 <input type="hidden" name="<?php echo "I".$current_year; ?>" id="<?php echo "I".$current_year; ?>" value="AED <?php echo number_format($interest, "2", ".", ","); ?>" />
				  <input type="hidden" name="<?php echo "P".$current_year; ?>" id="<?php echo "P".$current_year; ?>" value="AED <?php echo number_format($principle, "2", ".", ","); ?>" />
				   <input type="hidden" name="<?php echo "R".$current_year; ?>" id="<?php echo "R".$current_year; ?>" value="AED <?php echo number_format( $total_spent_this_year, "2", ".", ","); ?>" />
				 <input type="hidden" name="<?php echo "D".$current_year; ?>" id="<?php echo "D".$current_year; ?>" value="<?php echo date2php($newdate); ?>"  />
				<?php
				$current_year++;	
				
            }
			else
			{
			?>
			<td width="44">&nbsp;</td>
			<?php }?>
  </tr>
			<?php
    
            $principal = $remaining_balance;
            $current_month++;
        }
        //print("</table>\n");
    //}
	$total=$pripaid+$monthinterest;
	
?>



</table>
<div class="clear"></div>
</div>
<input type="hidden" name="EAmount" id="EAmount" value="AED <?php echo number_format($dueamount, "2", ".", ","); ?>" />
<input type="hidden" name="TAmount" id="TAmount" value="AED <?php echo number_format($total, "2", ".", ","); ?>" />
<input type="hidden" name="TIAmount" id="TIAmount" value="AED <?php echo number_format($this_year_interest_paid, "2", ".", ","); ?>" />
<input type="hidden" name="LastDate" id="LastDate" value="<?php echo date2php($newdate); ?>"  />


