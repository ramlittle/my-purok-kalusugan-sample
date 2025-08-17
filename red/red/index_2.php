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
  <title>PK-DOH Health Dashboard</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Custom CSS -->
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      --info-gradient: linear-gradient(135deg, #667db6 0%, #0082c8 100%);
      --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
      --dark-gradient: linear-gradient(135deg, #434343 0%, #000000 100%);
    }

    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background: var(--primary-gradient) !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 1rem 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .metric-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      overflow: hidden;
      margin-bottom: 2rem;
      position: relative;
    }

    .metric-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0.3) 100%);
    }

    .metric-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .metric-card.immunization {
      background: var(--primary-gradient);
    }

    .metric-card.wash {
      background: var(--success-gradient);
    }

    .metric-card.nutrition {
      background: var(--info-gradient);
    }

    .metric-card .card-body {
      padding: 2rem;
      position: relative;
    }

    .metric-number {
      font-size: 2.5rem;
      font-weight: 800;
      margin: 0.5rem 0;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .metric-label {
      font-size: 0.95rem;
      font-weight: 500;
      opacity: 0.95;
      margin-bottom: 0;
      line-height: 1.4;
    }

    .section-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 1.5rem;
      border-radius: 15px;
      margin: 3rem 0 2rem 0;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
    }

    .section-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 100%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transform: rotate(45deg);
      animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
      0% {
        transform: translateX(-100%) rotate(45deg);
      }

      100% {
        transform: translateX(100%) rotate(45deg);
      }
    }

    .section-header h2 {
      margin: 0;
      font-weight: 700;
      font-size: 1.8rem;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .chart-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      overflow: hidden;
      background: white;
    }

    .chart-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .chart-card .card-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-bottom: 3px solid #dee2e6;
      padding: 1.5rem;
      font-weight: 600;
      color: #495057;
    }

    .chart-card .card-body {
      padding: 2rem;
    }

    .icon-lg {
      font-size: 1.5rem;
      opacity: 0.8;
    }

    .stats-overview {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .highlight-cards .row {
      margin-top: 1rem;
    }

    .fade-in {
      animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container-fluid {
      padding: 0 2rem;
    }

    @media (max-width: 768px) {
      .metric-number {
        font-size: 2rem;
      }

      .section-header h2 {
        font-size: 1.5rem;
      }

      .container-fluid {
        padding: 0 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <span class="navbar-brand">
        <i class="bi bi-hospital me-2"></i>
        PK-DOH Health Dashboard
      </span>
    </div>
  </nav>

  <div class="container-fluid mt-4">

    <!-- Immunization Section -->
    <div class="section-header fade-in">
      <h2>
        <i class="bi bi-shield-check icon-lg"></i>
        Immunization Program
      </h2>
    </div>

    <!-- Immunization Metrics -->
    <div class="row">
      <?php foreach ($jsonData['immunization']['labels'] as $key => $label) { ?>
        <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: <?php echo $key * 0.1; ?>s">
          <div class="card metric-card immunization text-white">
            <div class="card-body text-center">
              <p class="metric-label"><?php echo $label; ?></p>
              <div class="metric-number">
                <?php echo number_format($jsonData['immunization']['datasets'][0]['data'][$key]); ?><?php echo $key === 0 ? '%' : ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- WASH Section -->
    <div class="section-header fade-in">
      <h2>
        <i class="bi bi-droplet icon-lg"></i>
        Water, Sanitation & Hygiene (WASH)
      </h2>
    </div>

    <!-- WASH Metrics -->
    <div class="row">
      <?php foreach ($jsonData['wash']['labels'] as $key => $label) { ?>
        <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: <?php echo $key * 0.1; ?>s">
          <div class="card metric-card wash text-white">
            <div class="card-body text-center">
              <p class="metric-label"><?php echo $label; ?></p>
              <div class="metric-number"><?php echo number_format($jsonData['wash']['datasets'][0]['data'][$key]); ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Nutrition Section -->
    <div class="section-header fade-in">
      <h2>
        <i class="bi bi-heart-pulse icon-lg"></i>
        Nutrition Program
      </h2>
    </div>

    <!-- Nutrition Metrics -->
    <div class="row">
      <?php foreach ($jsonData['nutrition']['labels'] as $key => $label) { ?>
        <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: <?php echo $key * 0.1; ?>s">
          <div class="card metric-card nutrition text-white">
            <div class="card-body text-center">
              <p class="metric-label"><?php echo $label; ?></p>
              <div class="metric-number">
                <?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][$key]); ?></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Key Highlights Section -->
    <div class="section-header fade-in">
      <h2>
        <i class="bi bi-graph-up-arrow icon-lg"></i>
        Key Performance Indicators
      </h2>
    </div>

    <div class="highlight-cards">
      <div class="row">
        <div class="col-md-4 fade-in">
          <div class="card metric-card immunization text-white">
            <div class="card-body text-center">
              <p class="metric-label">Immunization Coverage</p>
              <div class="metric-number">95%</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 fade-in" style="animation-delay: 0.1s">
          <div class="card metric-card wash text-white">
            <div class="card-body text-center">
              <p class="metric-label">Basic Water Access</p>
              <div class="metric-number"><?php echo number_format($jsonData['wash']['datasets'][0]['data'][1]); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 fade-in" style="animation-delay: 0.2s">
          <div class="card metric-card nutrition text-white">
            <div class="card-body text-center">
              <p class="metric-label">Children Receiving Vitamin A</p>
              <div class="metric-number">
                <?php echo number_format($jsonData['nutrition']['datasets'][0]['data'][7]); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="section-header fade-in">
      <h2>
        <i class="bi bi-pie-chart icon-lg"></i>
        Data Visualization
      </h2>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4 fade-in">
        <div class="card chart-card">
          <div class="card-header">
            <h5 class="mb-0">
              <i class="bi bi-shield-check me-2"></i>
              Immunization Distribution
            </h5>
          </div>
          <div class="card-body">
            <canvas id="immunizationChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mb-4 fade-in" style="animation-delay: 0.1s">
        <div class="card chart-card">
          <div class="card-header">
            <h5 class="mb-0">
              <i class="bi bi-droplet me-2"></i>
              WASH Activities
            </h5>
          </div>
          <div class="card-body">
            <canvas id="washChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mb-4 fade-in" style="animation-delay: 0.2s">
        <div class="card chart-card">
          <div class="card-header">
            <h5 class="mb-0">
              <i class="bi bi-heart-pulse me-2"></i>
              Nutrition Indicators
            </h5>
          </div>
          <div class="card-body">
            <canvas id="nutritionChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Charts Script -->
  <script>
    // Chart.js default configuration
    Chart.defaults.plugins.legend.display = true;
    Chart.defaults.plugins.legend.position = 'bottom';
    Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    Chart.defaults.plugins.tooltip.cornerRadius = 10;

    // Immunization Chart
    const immunizationCtx = document.getElementById('immunizationChart').getContext('2d');
    const immunizationChart = new Chart(immunizationCtx, {
      type: 'doughnut',
      data: {
        labels: <?php echo json_encode($jsonData['immunization']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['immunization']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['immunization']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['immunization']['datasets'][0]['backgroundColor']); ?>,
          borderWidth: 3,
          borderColor: '#fff',
          hoverBorderWidth: 5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 20,
              usePointStyle: true,
              font: {
                size: 12
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.toLocaleString();
              }
            }
          }
        },
        cutout: '60%'
      }
    });

    // WASH Chart
    const washCtx = document.getElementById('washChart').getContext('2d');
    const washChart = new Chart(washCtx, {
      type: 'doughnut',
      data: {
        labels: <?php echo json_encode($jsonData['wash']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['wash']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['wash']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['wash']['datasets'][0]['backgroundColor']); ?>,
          borderWidth: 3,
          borderColor: '#fff',
          hoverBorderWidth: 5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 20,
              usePointStyle: true,
              font: {
                size: 12
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.toLocaleString();
              }
            }
          }
        },
        cutout: '60%'
      }
    });

    // Nutrition Chart
    const nutritionCtx = document.getElementById('nutritionChart').getContext('2d');
    const nutritionChart = new Chart(nutritionCtx, {
      type: 'doughnut',
      data: {
        labels: <?php echo json_encode($jsonData['nutrition']['labels']); ?>,
        datasets: [{
          label: '<?php echo $jsonData['nutrition']['datasets'][0]['label']; ?>',
          data: <?php echo json_encode($jsonData['nutrition']['datasets'][0]['data']); ?>,
          backgroundColor: <?php echo json_encode($jsonData['nutrition']['datasets'][0]['backgroundColor']); ?>,
          borderWidth: 3,
          borderColor: '#fff',
          hoverBorderWidth: 5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 20,
              usePointStyle: true,
              font: {
                size: 12
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.toLocaleString();
              }
            }
          }
        },
        cutout: '60%'
      }
    });

    // Add animation on scroll
    function animateOnScroll() {
      const elements = document.querySelectorAll('.fade-in');
      elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < window.innerHeight - elementVisible) {
          element.style.opacity = '1';
          element.style.transform = 'translateY(0)';
        }
      });
    }

    // Initialize animations
    window.addEventListener('scroll', animateOnScroll);
    document.addEventListener('DOMContentLoaded', animateOnScroll);
  </script>
</body>

</html>