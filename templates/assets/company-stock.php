<?php
$company_symbol = strtoupper( get_field('company_symbol', get_field('company_link')) );
fool_request_info($company_symbol);
$company_profile = $GLOBALS['fool_request_info'][1];
?>

<div class="company-profile">
    <div class="profile-text">
        <p><span>Price:</span> <?php print $company_profile->price; ?></p>
        <p><span>Price Change:</span></p>
        <p><span>Price Change: %</span></p>
        <p><span>52 Week Range:</span></p>
        <p><span>Beta:</span></p>
        <p><span>Volume Average:</span></p>
        <p><span>Market Capitalisation:</span></p>
        <p><span>Last Dividend:</span></p>
    </div>
</div>
