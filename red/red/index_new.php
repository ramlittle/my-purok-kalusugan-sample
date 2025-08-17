<?php
$jsonData = json_decode('{
  "immunization": {
    "labels": [
      "95% of all identified (master list) children immunized",
      "Catch-up Immunization - No of missed children identified",
      "Catch-up Immunization - No of Children Immunized with BCG",
      "Catch-up Immunization - No of Children Immunized with Pentavalent",
      "Catch-up Immunization - No of Children Immunized with OPV",
      "Catch-up Immunization - No of Children Immunized with MMR"
    ],
    "datasets": [
      {
        "label": "Immunization Data",
        "data": [95, 4500, 98000, 110000, 115000, 89000],
        "backgroundColor": ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"]
      }
    ]
  },
  "wash": {
    "labels": [
      "Community Activities",
      "Basic Water Access",
      "Managed Water Services",
      "Water Sources Tested",
      "WASH Logistics"
    ],
    "datasets": [
      {
        "label": "WASH Data",
        "data": [25000, 234000, 189000, 4500, 56700],
        "backgroundColor": ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"]
      }
    ]
  },
  "nutrition": {
    "labels": [
      "Underweight",
      "Severely Underweight",
      "Stunted",
      "Severely Stunted",
      "Wasted (MAM)",
      "Severely Wasted (SAM)",
      "Breastfeeding",
      "Vitamin A Supplementation",
      "LNS-SQ",
      "MAM and SAM Monitoring",
      "Maternal Micronutrient Supplementation",
      "Nutritionally-at-risk pregnant women",
      "Deworming"
    ],
    "datasets": [
      {
        "label": "Nutrition Data",
        "data": [15600, 2300, 18900, 3400, 6700, 1200, 45000, 67000, 23000, 8900, 34000, 12000, 56000],
        "backgroundColor": [
          "#FF6384", "#36A2EB", "#FFCE56",
          "#4BC0C0", "#9966FF", "#FF9F40",
          "#C9E4CA", "#F7D2C4", "#7A288A",
          "#34A8FF", "#FFC107", "#8BC34A",
          "#3F51B5"
        ]
      }
    ]
  }
}', true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PK-DOH Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <nav class="navbar navbar-dark bg-primary">
    <div class="container">
      <span class="navbar-brand">PK-DOH Health Dashboard</span>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="container mt-4">
      <!-- Number Indicators -->
      <div class="row">
        <h4>Immunization</h4>
        <?php foreach ($jsonData['immunization']['labels'] as $key => $label) { ?>
          <div class="col-md-4">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <h6><?php echo $label; ?></h6>
                <h2><?php echo number_format($jsonData['immunization']['datasets'][0]['data'][$key]); ?></h2>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="row mt-4">
        <h4>WASH</h4>
        <?php foreach ($jsonData['wash']['labels'] as $key => $label) { ?>
          <div class="col-md-4">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h6><?php echo $label; ?></h6>
                <h2><?php echo number_format($jsonData['wash']['datasets'][0]['data'][$key]); ?></h2>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="row mt-4">
        <h4>Nutrition</h4>
        <?php foreach ($jsonData['nutrition']['labels'] as $key => $label) { ?>
          <div class="col-md-4">
            <div class="card bg-info text-white">
              <div class="card-body">
                <h6><?php echo $label; ?></h6>
                <h2><?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][$key]); ?></h2>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>



    <div class="container mt-4">
      <!-- Number Indicators -->
      <div class="row">
        <h4>Immunization</h4>
        <div class="col-md-4">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <h6>95% of all identified (master list) children immunized</h6>
              <h2><?php echo number_format(95); ?>%</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h6>Total Children Immunized with BCG</h6>
              <h2><?php echo number_format($jsonData['immunization']['datasets'][0]['data'][2]); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-info text-white">
            <div class="card-body">
              <h6>Catch-up Immunization - No of missed children identified</h6>
              <h2><?php echo number_format($jsonData['immunization']['datasets'][0]['data'][1]); ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <h4>WASH</h4>
        <div class="col-md-4">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <h6>Total WASH Community Activities</h6>
              <h2><?php echo number_format($jsonData['wash']['datasets'][0]['data'][0]); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h6>Total WASH Basic Water Access</h6>
              <h2><?php echo number_format($jsonData['wash']['datasets'][0]['data'][1]); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-info text-white">
            <div class="card-body">
              <h6>Total WASH Logistics</h6>
              <h2><?php echo number_format($jsonData['wash']['datasets'][0]['data'][4]); ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <h4>Nutrition</h4>
        <div class="col-md-4">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <h6>Total Underweight Children</h6>
              <h2><?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][0]); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h6>Total Severely Underweight Children</h6>
              <h2><?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][1]); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-info text-white">
            <div class="card-body">
              <h6>Total Stunted Children</h6>
              <h2><?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][2]); ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Charts -->
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h6>Immunization</h6>
          </div>
          <div class="card-body">
            <canvas id="immunizationChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h6>WASH</h6>
          </div>
          <div class="card-body">
            <canvas id="washChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h6>Nutrition</h6>
          </div>
          <div class="card-body">
            <canvas id="nutritionChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Immunization Chart
    const immunizationCtx = document.getElementById('immunizationChart').getContext('2d');
    const immunizationChart = new Chart(immunizationCtx, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($jsonData['immunization']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['immunization']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['immunization']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['immunization']['datasets'][0]['backgroundColor']); ?>
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });

    // WASH Chart
    const washCtx = document.getElementById('washChart').getContext('2d');
    const washChart = new Chart(washCtx, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($jsonData['wash']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['wash']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['wash']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['wash']['datasets'][0]['backgroundColor']); ?>
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });

    // Nutrition Chart
    const nutritionCtx = document.getElementById('nutritionChart').getContext('2d');
    const nutritionChart = new Chart(nutritionCtx, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($jsonData['nutrition']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['nutrition']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['nutrition']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['nutrition']['datasets'][0]['backgroundColor']); ?>
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script>
</body>

</html>