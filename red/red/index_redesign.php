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
        "backgroundColor": ["#2d5a27", "#4a7c59", "#7ba05b", "#a8c68f", "#d4e6c7", "#1e3a2e"]
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
        "backgroundColor": ["#2d5a27", "#4a7c59", "#7ba05b", "#a8c68f", "#d4e6c7"]
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
          "#2d5a27", "#4a7c59", "#7ba05b", "#a8c68f", "#d4e6c7", "#1e3a2e",
          "#5d8a4a", "#8fb36d", "#b5d097", "#c8e0b8", "#3e6b35", "#6f9c62", "#9cc085"
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
      --doh-primary: #2d5a27;
      --doh-secondary: #4a7c59;
      --doh-light: #7ba05b;
      --doh-lighter: #a8c68f;
      --doh-lightest: #d4e6c7;
      --doh-accent: #1e3a2e;
      --doh-bg: #f8faf6;
      --doh-card-bg: #ffffff;
      --doh-text-primary: #2d5a27;
      --doh-text-secondary: #4a7c59;
      --doh-border: #e8f2e5;
    }

    body {
      background: var(--doh-bg);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--doh-text-primary);
    }

    .navbar {
      background: var(--doh-primary) !important;
      box-shadow: 0 2px 10px rgba(45, 90, 39, 0.15);
      padding: 1rem 0;
    }

    .navbar-brand {
      font-weight: 600;
      font-size: 1.4rem;
      color: white !important;
    }

    .metric-card {
      border: 1px solid var(--doh-border);
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(45, 90, 39, 0.08);
      transition: all 0.3s ease;
      overflow: hidden;
      margin-bottom: 1.5rem;
      background: var(--doh-card-bg);
    }

    .metric-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(45, 90, 39, 0.12);
      border-color: var(--doh-light);
    }

    .metric-card.immunization {
      border-left: 4px solid var(--doh-primary);
    }

    .metric-card.immunization .card-body {
      background: linear-gradient(135deg, var(--doh-primary) 0%, var(--doh-secondary) 100%);
      color: white;
    }

    .metric-card.wash {
      border-left: 4px solid var(--doh-light);
    }

    .metric-card.wash .card-body {
      background: linear-gradient(135deg, var(--doh-light) 0%, var(--doh-lighter) 100%);
      color: white;
    }

    .metric-card.nutrition {
      border-left: 4px solid var(--doh-secondary);
    }

    .metric-card.nutrition .card-body {
      background: linear-gradient(135deg, var(--doh-secondary) 0%, var(--doh-light) 100%);
      color: white;
    }

    .metric-card .card-body {
      padding: 1.8rem;
    }

    .metric-number {
      font-size: 2.2rem;
      font-weight: 700;
      margin: 0.5rem 0;
    }

    .metric-label {
      font-size: 0.9rem;
      font-weight: 500;
      opacity: 0.95;
      margin-bottom: 0;
      line-height: 1.3;
    }

    .section-header {
      background: var(--doh-card-bg);
      color: var(--doh-text-primary);
      padding: 1.2rem 1.5rem;
      border-radius: 8px;
      margin: 2.5rem 0 1.5rem 0;
      box-shadow: 0 2px 8px rgba(45, 90, 39, 0.08);
      border-left: 5px solid var(--doh-primary);
    }

    .section-header h2 {
      margin: 0;
      font-weight: 600;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .chart-card {
      border: 1px solid var(--doh-border);
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(45, 90, 39, 0.08);
      transition: all 0.3s ease;
      overflow: hidden;
      background: var(--doh-card-bg);
    }

    .chart-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(45, 90, 39, 0.12);
    }

    .chart-card .card-header {
      background: var(--doh-lightest);
      border-bottom: 1px solid var(--doh-border);
      padding: 1.2rem;
      font-weight: 600;
      color: var(--doh-text-primary);
    }

    .chart-card .card-body {
      padding: 1.5rem;
    }

    .icon-lg {
      font-size: 1.3rem;
      color: var(--doh-secondary);
    }

    .stats-overview {
      background: var(--doh-card-bg);
      border-radius: 12px;
      padding: 1.5rem;
      margin: 1.5rem 0;
      box-shadow: 0 4px 12px rgba(45, 90, 39, 0.08);
      border: 1px solid var(--doh-border);
    }

    .highlight-cards .row {
      margin-top: 1rem;
    }

    .fade-in {
      animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container-fluid {
      padding: 0 2rem;
    }

    /* DOH Color Palette for Charts */
    .doh-colors {
      --chart-color-1: #2d5a27;
      --chart-color-2: #4a7c59;
      --chart-color-3: #7ba05b;
      --chart-color-4: #a8c68f;
      --chart-color-5: #d4e6c7;
      --chart-color-6: #1e3a2e;
      --chart-color-7: #5d8a4a;
      --chart-color-8: #8fb36d;
      --chart-color-9: #b5d097;
      --chart-color-10: #c8e0b8;
      --chart-color-11: #3e6b35;
      --chart-color-12: #6f9c62;
      --chart-color-13: #9cc085;
    }

    @media (max-width: 768px) {
      .metric-number {
        font-size: 1.8rem;
      }

      .section-header h2 {
        font-size: 1.3rem;
      }

      .container-fluid {
        padding: 0 1rem;
      }

      .metric-card {
        margin-bottom: 1rem;
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