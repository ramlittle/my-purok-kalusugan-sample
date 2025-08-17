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
$maternal_health = [
    ["maternal_health_id" => 1,
        "no_of_pregnant_women_receiving_anc" => 2,
        "no_of_anc_visits" => 3,
        "no_of_births_attended_by_skilled_health_personnel" => 4,
        "no_of_maternal_deaths" => 1,
        "no_of_women_using_modern_contraceptive_methods" => 3
    ],
    ["maternal_health_id" => 2,
        "no_of_pregnant_women_receiving_anc" => 1,
        "no_of_anc_visits" => 1,
        "no_of_births_attended_by_skilled_health_personnel" => 1,
        "no_of_maternal_deaths" => 1,
        "no_of_women_using_modern_contraceptive_methods" => 1
    ],
    ["maternal_health_id" => 3,
        "no_of_pregnant_women_receiving_anc" => 2,
        "no_of_anc_visits" => 2,
        "no_of_births_attended_by_skilled_health_personnel" => 2,
        "no_of_maternal_deaths" => 2,
        "no_of_women_using_modern_contraceptive_methods" => 2
    ]
];

$road_safety =[
    ["road_safety_id" => 1,
        "no_of_road_traffic_crashes" => 2,
        "no_of_fatalities_due_to_road_traffic_crashes" => 3,
        "no_of_injuries_due_to_road_traffic_crashes" => 4,
        "no_of_motorcycle_riders_wearing_helmets" => 1,
        "no_of_vehicle_occupants_wearing_seatbelts" => 3,
        "no_of_people_educated_on_road_safety" => 5
    ],
    ["road_safety_id" => 2,
        "no_of_road_traffic_crashes" => 2,
        "no_of_fatalities_due_to_road_traffic_crashes" => 2,
        "no_of_injuries_due_to_road_traffic_crashes" => 2,
        "no_of_motorcycle_riders_wearing_helmets" => 2,
        "no_of_vehicle_occupants_wearing_seatbelts" => 2,
        "no_of_people_educated_on_road_safety" => 2
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
//maternal totals
$total_no_of_pregnant_women_receiving_anc=get_total($maternal_health,'no_of_pregnant_women_receiving_anc');
$total_no_of_anc_visits=get_total($maternal_health,'no_of_anc_visits');
$total_no_of_births_attended_by_skilled_health_personnel=get_total($maternal_health,'no_of_births_attended_by_skilled_health_personnel');
$total_no_of_maternal_deaths=get_total($maternal_health,'no_of_maternal_deaths');
$total_no_of_women_using_modern_contraceptive_methods=get_total($maternal_health,'no_of_women_using_modern_contraceptive_methods');
//road safety totals
$total_no_of_road_traffic_crashes=get_total($road_safety,'no_of_road_traffic_crashes');
$total_no_of_fatalities_due_to_road_traffic_crashes=get_total($road_safety,'no_of_fatalities_due_to_road_traffic_crashes');
$total_no_of_motorcycle_riders_wearing_helmets=get_total($road_safety,'no_of_motorcycle_riders_wearing_helmets');
$total_no_of_vehicle_occupants_wearing_seatbelts=get_total($road_safety,'no_of_vehicle_occupants_wearing_seatbelts');
$total_no_of_people_educated_on_road_safety=get_total($road_safety,'no_of_people_educated_on_road_safety');
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <!-- Existing TB and HIV sections -->
                <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>Tuberculosis Screening</h2>
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
                    <!-- TB Pie Chart -->
                    <div class="p-3">
                        <canvas id="tbPieChart"></canvas>
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
                    <!-- HIV Bar Chart -->
                    <div class="p-3">
                        <canvas id="hivBarChart"></canvas>
                    </div>
                </div>
                 <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>Maternal Health Screening</h2>
                    </div>
                    <div class='d-flex flex-wrap justify-content-evenly'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_pregnant_women_receiving_anc;?></h2>
                            <strong>No. of Pregnant women</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_anc_visits;?></h2>
                            <strong>No. of ANC visits</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_births_attended_by_skilled_health_personnel;?></h2>
                            <strong>No. of Births attended by Health Personnel</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_maternal_deaths;?></h2>
                            <strong>No. of Maternal Deaths</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_women_using_modern_contraceptive_methods;?></h2>
                            <strong>No. of Women using modern contraceptives</strong>
                        </div>
                    </div>
                    <!-- Maternal Health Pie Chart -->
                    <div class="p-3">
                        <canvas id="maternalHealthPieChart"></canvas>
                    </div>
                </div>
                <div class='border'>
                    <div style='background-color: #245501;color:white;'>
                        <h2>Road Safety Screening</h2>
                    </div>
                    <div class='d-flex flex-wrap justify-content-evenly'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_road_traffic_crashes;?></h2>
                            <strong>No. of Road traffic crashes</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_fatalities_due_to_road_traffic_crashes;?></h2>
                            <strong>No. of Fatalities due to road traffic crashes</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_motorcycle_riders_wearing_helmets;?></h2>
                            <strong>No. of Motorcycle riders wearing helments</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_vehicle_occupants_wearing_seatbelts;?></h2>
                            <strong>No. of Vehicle occupants wearing seatbelts</strong>
                        </div>
                        <div class='d-flex flex-column justify-content-center align-items-center w-25'>
                            <h2><?php echo $total_no_of_people_educated_on_road_safety;?></h2>
                            <strong>No. of People educated on road safety</strong>
                        </div>
                    </div>
                    <!-- Maternal Health Pie Chart -->
                    <div class="p-3">
                        <canvas id="roadSafetyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js Script -->
    <script>
        // TB Data
        const tbData = {
            labels: [
                "ACF/ECF Activities",
                "Presumptive Cases",
                "Diagnosed Cases",
                "Close Contacts",
                "Eligible Contacts w/ TPT"
            ],
            datasets: [{
                data: [
                    <?php echo $total_no_of_acf_ecf_activities_conducted; ?>,
                    <?php echo $total_no_of_presumptive_tb_cases_assessed; ?>,
                    <?php echo $total_no_of_diagnosed_tb_cases_enrolled_to_care; ?>,
                    <?php echo $total_no_of_close_contacts_identified; ?>,
                    <?php echo $total_no_of_eligible_contacts_provided_with_tpt; ?>
                ],
                backgroundColor: ["#1abc9c","#3498db","#9b59b6","#f39c12","#e74c3c"]
            }]
        };
        new Chart(document.getElementById("tbPieChart"), {
            type: "bar",
            data: tbData
        });

        // HIV Data
        const hivData = {
            labels: [
                "Individuals Reached",
                "Individuals Screened",
                "Referred for Testing"
            ],
            datasets: [{
                label: "HIV Screening",
                data: [
                    <?php echo $total_no_of_individuals_reached; ?>,
                    <?php echo $total_no_of_individuals_screened; ?>,
                    <?php echo $total_no_of_individuals_referred_for_hiv_testing; ?>
                ],
                backgroundColor: ["#2ecc71","#e67e22","#e74c3c"]
            }]
        };
        new Chart(document.getElementById("hivBarChart"), {
            type: "bar",
            data: hivData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

         // Maternal Data
        const maternalData = {
            labels: [
                "Women receving ANC",
                "ANC Visits",
                "Birth Skilled Personnel",
                "Maternal Deaths",
                "Women using modern Contraceptives"
            ],
            datasets: [{
                data: [
                    <?php echo $total_no_of_pregnant_women_receiving_anc; ?>,
                    <?php echo $total_no_of_anc_visits; ?>,
                    <?php echo $total_no_of_births_attended_by_skilled_health_personnel; ?>,
                    <?php echo $total_no_of_maternal_deaths; ?>,
                    <?php echo $total_no_of_women_using_modern_contraceptive_methods; ?>
                ],
                backgroundColor: ["#1abc9c","#3498db","#9b59b6","#f39c12","#e74c3c"]
            }]
        };
        new Chart(document.getElementById("maternalHealthPieChart"), {
            type: "bar",
            data: maternalData
        });
        // Road Safety Data
        const roadSafetyData = {
            labels: [
                "Road traffic crashes",
                "Fatalities due to road traffic crashes",
                "Motorcycle riders wearing helments",
                "Vehicle occupants wearing seatbelts",
                "Women using modern Contraceptives"
            ],
            datasets: [{
                data: [
                    <?php echo $total_no_of_pregnant_women_receiving_anc; ?>,
                    <?php echo $total_no_of_anc_visits; ?>,
                    <?php echo $total_no_of_births_attended_by_skilled_health_personnel; ?>,
                    <?php echo $total_no_of_maternal_deaths; ?>,
                    <?php echo $total_no_of_women_using_modern_contraceptive_methods; ?>
                ],
                backgroundColor: ["#1abc9c","#3498db","#9b59b6","#f39c12","#e74c3c"]
            }]
        };
        new Chart(document.getElementById("roadSafetyChart"), {
            type: "bar",
            data: roadSafetyData
        });
    </script>
</body>
</html>
