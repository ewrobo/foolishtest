<?php
$company_symbol = strtoupper( get_field('company_symbol', get_field('company_link')) );
fool_request_info($company_symbol);
$company_profile = $GLOBALS['fool_request_info'][0]->$company_symbol;
?>

<div class="company-profile">
    <img class="company-logo" src="<?php print $company_profile->image; ?>" alt="<?php print $company_profile->companyName; ?>" />
    <div class="profile-text">
        <h3><?php print $company_profile->companyName; ?></h3>
        <p><?php print $company_profile->exchange; ?></p>
        <p><?php print $company_profile->description; ?></p>
        <p><span>Industry:</span> <?php print $company_profile->industry; ?></p>
        <p><span>Sector:</span> <?php print $company_profile->sector; ?></p>
        <p><span>CEO:</span> <?php print $company_profile->CEO; ?></p>
        <p><a href="<?php print $company_profile->website; ?>"><?php print $company_profile->website; ?></a></p>
    </div>
</div>
