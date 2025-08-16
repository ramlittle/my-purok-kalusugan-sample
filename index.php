<?php
//DATA here
$tubercolosis=[
    ["tubercolosis_id" => 1, 
        "no_of_acf_ecf_activities_conducted" => 2,
        "no_of_presumptive_tb_cases_assessed" => 3,
        "no_of_diagnosed_tb_cases_enrolled_to_care" => 2,
        "no_of_close_contacts_identified" => 1,
        "no_of_eligible_contacts_provided_with_tpt" => 1
    ],
    ["tubercolosis_id" => 2, 
        "no_of_acf_ecf_activities_conducted" => 3,
        "no_of_presumptive_tb_cases_assessed" => 5,
        "no_of_diagnosed_tb_cases_enrolled_to_care" => 1,
        "no_of_close_contacts_identified" => 0,
        "no_of_eligible_contacts_provided_with_tpt" => 5
    ],
    ["tubercolosis_id" => 3, 
        "no_of_acf_ecf_activities_conducted" => 1,
        "no_of_presumptive_tb_cases_assessed" => 1,
        "no_of_diagnosed_tb_cases_enrolled_to_care" => 1,
        "no_of_close_contacts_identified" => 1,
        "no_of_eligible_contacts_provided_with_tpt" => 1
    ],
];

$hiv=[
    ["hiv_id" => 1, 
        "no_of_individuals_reached" => 1,
        "no_of_individuals_screened" => 10,
        "no_of_individuals_referred_for_hiv_testing" => 2
    ],
    ["hiv_id" => 2, 
        "no_of_individuals_reached" => 7,
        "no_of_individuals_screened" => 5,
        "no_of_individuals_referred_for_hiv_testing" => 1,
    ],
    ["hiv_id" => 3, 
        "no_of_individuals_reached" => 1,
        "no_of_individuals_screened" => 1,
        "no_of_individuals_referred_for_hiv_testing" => 1,
    ],
];

//tb totals
$total_no_of_acf_ecf_activities_conducted=get_total($tubercolosis,'no_of_acf_ecf_activities_conducted');
$total_no_of_presumptive_tb_cases_assessed=get_total($tubercolosis,'no_of_presumptive_tb_cases_assessed');
$total_no_of_diagnosed_tb_cases_enrolled_to_care=get_total($tubercolosis,'no_of_diagnosed_tb_cases_enrolled_to_care');
$total_no_of_close_contacts_identified=get_total($tubercolosis,'no_of_close_contacts_identified');
$total_no_of_eligible_contacts_provided_with_tpt=get_total($tubercolosis,'no_of_eligible_contacts_provided_with_tpt');

//hiv totals
$total_no_of_individuals_reached=get_total($hiv,'no_of_individuals_reached');
$total_no_of_individuals_screened=get_total($hiv,'no_of_individuals_screened');
$total_no_of_individuals_referred_for_hiv_testing=get_total($hiv,'no_of_individuals_referred_for_hiv_testing');

//functions here
function get_total($table,$column){
    $total=0;
    for($i=0;$i<count($table);$i++){
        $total+=$table[$i][$column];
    }
    return $total;
}

function getCurrentMonthYear()
{
    $month_number = date('m');
    $year = date('Y');
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $month_number_int = intval($month_number) - 1;
    $month_in_words = "";
    for ($i = 0; $i < count($months); $i++) {
        if ($month_number_int == $i) {
            $month_in_words = $months[$i];
        }
    }
    return $month_in_words . " " . $year;
}

function showAppTitle()
{
    $title = "Purok Kalusugan";
    return $title;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo showAppTitle(); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-div{
            display:flex;
        }
        .main-div > div{
            width:50%;
        }
        @media (max-width: 576px) {
            .main-div{
                flex-direction:column;
            }
            .main-div > div{
                width:100%;
            }
            .main-div > div strong{
                font-size: x-small;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class='p-1 d-flex flex-column justify-content-center align-items-center'
        style='background-color: #245501;color:white;'>
        <h1><?php echo strtoupper(showAppTitle()) ?></h1>
        <small>as of <strong>
                <?php echo getCurrentMonthYear(); ?></strong>
        </small>
    </div>
    <div class="m-1">
        <div class="p-1 bg-white shadow rounded text-center">
            <h1 class="mb-3">Executive Dashboard</h1>
            <p class="text-muted">This is the Purok Kalusugan Dashboard that shows all numerical data for all indicators
                applicable for the Cordillera Administrative Region.</p>
            <div class='d-flex flex-wrap main-div'>
                <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>Catchment Overview</h2>
                    </div>
                    <div class='d-flex flex-wrap justify-content-evenly'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2>1</h2>
                            <strong>City/Municipality</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2>1</h2>
                            <strong>Barangay</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2>1</h2>
                            <strong>Purok</strong>
                        </div>
                    </div>
                </div>
                <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>Tubercolosis Screening</h2>
                    </div>
                    <div class='d-flex flex-wrap justify-content-evenly'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_acf_ecf_activities_conducted;?></h2>
                            <strong>No. of ACF/ECF Activities Conducted</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_presumptive_tb_cases_assessed;?></h2>
                            <strong>No. of Presumptive TB Cases Assessed</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_diagnosed_tb_cases_enrolled_to_care;?></h2>
                            <strong>No. of Diagnosed TB Cases enrolled to care</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_close_contacts_identified;?></h2>
                            <strong>No. of Close contacts identified</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_eligible_contacts_provided_with_tpt;?></h2>
                            <strong>No. of Eligible contacts provided with TPT</strong>
                        </div>
                    </div>
                </div>
                <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>HIV Screening</h2>
                    </div>
                    <div class='d-flex flex-wrap justify-content-evenly'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_individuals_reached;?></h2>
                            <strong>No. of Individuals reached</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_individuals_screened;?></h2>
                            <strong>No. of Individuals Screened</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_individuals_referred_for_hiv_testing;?></h2>
                            <strong>No. of Individuals referred for HIV testing</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>