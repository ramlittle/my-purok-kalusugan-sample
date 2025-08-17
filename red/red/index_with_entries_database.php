<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PK-DOH Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.9.1/chart.min.js"></script>
    <style>
    .indicator-card {
      background: linear-gradient(45deg, #667eea, #764ba2);
      color: white;
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 20px;
      text-align: center;
    }

    .chart-container {
      height: 300px;
      margin: 20px 0;
    }

    .number-display {
      font-size: 2.5rem;
      font-weight: bold;
      margin: 10px 0;
    }
    </style>
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
      <div class="container">
        <span class="navbar-brand">PK-DOH Health Dashboard</span>
      </div>
    </nav>

    <div class="container mt-4">

      <!-- Number Indicators -->
      <div class="row">
        <div class="col-md-3">
          <div class="indicator-card">
            <h6>Total Children</h6>
            <div class="number-display" id="totalChildren">0</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="indicator-card">
            <h6>Immunized</h6>
            <div class="number-display" id="totalImmunized">0</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="indicator-card">
            <h6>WASH Access</h6>
            <div class="number-display" id="totalWASH">0</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="indicator-card">
            <h6>Nutrition Cases</h6>
            <div class="number-display" id="totalNutrition">0</div>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h6>Immunization</h6>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="immunizationChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h6>WASH</h6>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="washChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h6>Nutrition</h6>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="nutritionChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script>
    // JSON Data Structure
    const healthData = {
      "database": "pk_doh",
      "users": [{
          "id": "USR001",
          "name": "Dr. Maria Santos",
          "role": "Health Officer"
        },
        {
          "id": "USR002",
          "name": "Nurse John Cruz",
          "role": "Community Nurse"
        },
        {
          "id": "USR003",
          "name": "Dr. Ana Reyes",
          "role": "Nutrition Specialist"
        }
      ],
      "immunization": [{
          "id": "IMM001",
          "user_id": "USR001",
          "master_list_children": 125000,
          "missed_children": 4500,
          "bcg_immunized": 98000,
          "pentavalent_immunized": 110000,
          "opv_immunized": 115000,
          "mmr_immunized": 89000
        },
        {
          "id": "IMM002",
          "user_id": "USR002",
          "master_list_children": 89000,
          "missed_children": 3200,
          "bcg_immunized": 75600,
          "pentavalent_immunized": 82300,
          "opv_immunized": 84500,
          "mmr_immunized": 67800
        },
        {
          "id": "IMM003",
          "user_id": "USR001",
          "master_list_children": 145600,
          "missed_children": 6700,
          "bcg_immunized": 123400,
          "pentavalent_immunized": 134500,
          "opv_immunized": 139800,
          "mmr_immunized": 112300
        }
      ],
      "wash": [{
          "id": "WSH001",
          "user_id": "USR001",
          "community_activities": 25000,
          "basic_water_access": 234000,
          "managed_water_services": 189000,
          "water_sources_tested": 4500,
          "wash_logistics": 56700
        },
        {
          "id": "WSH002",
          "user_id": "USR002",
          "community_activities": 18000,
          "basic_water_access": 187600,
          "managed_water_services": 123400,
          "water_sources_tested": 3200,
          "wash_logistics": 42300
        },
        {
          "id": "WSH003",
          "user_id": "USR003",
          "community_activities": 32000,
          "basic_water_access": 298700,
          "managed_water_services": 245600,
          "water_sources_tested": 5600,
          "wash_logistics": 68900
        }
      ],
      "nutrition": [{
          "id": "NUT001",
          "user_id": "USR003",
          "underweight": 15600,
          "severely_underweight": 2300,
          "stunted": 18900,
          "severely_stunted": 3400,
          "wasted_mam": 6700,
          "severely_wasted_sam": 1200,
          "breastfeeding_counseled": 45000,
          "vitamin_a_given": 67000,
          "lns_sq_given": 23000,
          "mam_sam_monitored": 8900,
          "iron_folic_supplemented": 34000,
          "nutritionally_at_risk": 12000,
          "deworming_provided": 56000
        },
        {
          "id": "NUT002",
          "user_id": "USR001",
          "underweight": 12300,
          "severely_underweight": 1800,
          "stunted": 14500,
          "severely_stunted": 2800,
          "wasted_mam": 4500,
          "severely_wasted_sam": 800,
          "breastfeeding_counseled": 38000,
          "vitamin_a_given": 52000,
          "lns_sq_given": 18000,
          "mam_sam_monitored": 5300,
          "iron_folic_supplemented": 29000,
          "nutritionally_at_risk": 9500,
          "deworming_provided": 43000
        },
        {
          "id": "NUT003",
          "user_id": "USR002",
          "underweight": 20100,
          "severely_underweight": 2900,
          "stunted": 23400,
          "severely_stunted": 4100,
          "wasted_mam": 7800,
          "severely_wasted_sam": 1500,
          "breastfeeding_counseled": 56000,
          "vitamin_a_given": 78000,
          "lns_sq_given": 28000,
          "mam_sam_monitored": 9300,
          "iron_folic_supplemented": 41000,
          "nutritionally_at_risk": 15000,
          "deworming_provided": 67000
        }
      ]
    };

    // Calculate totals and update indicators
    function updateIndicators() {
      // Total Children
      const totalChildren = healthData.immunization.reduce((sum, item) => sum + item.master_list_children, 0);
      document.getElementById('totalChildren').textContent = (totalChildren / 1000).toFixed(0) + 'K';

      // Total Immunized (sum of all vaccines)
      const totalImmunized = healthData.immunization.reduce((sum, item) =>
        sum + item.bcg_immunized + item.pentavalent_immunized + item.opv_immunized + item.mmr_immunized, 0);
      document.getElementById('totalImmunized').textContent = (totalImmunized / 1000).toFixed(0) + 'K';

      // Total WASH Access
      const totalWASH = healthData.wash.reduce((sum, item) => sum + item.basic_water_access, 0);
      document.getElementById('totalWASH').textContent = (totalWASH / 1000).toFixed(0) + 'K';

      // Total Nutrition Cases
      const totalNutrition = healthData.nutrition.reduce((sum, item) =>
        sum + item.underweight + item.stunted + item.wasted_mam, 0);
      document.getElementById('totalNutrition').textContent = (totalNutrition / 1000).toFixed(0) + 'K';
    }

    // Initialize Charts
    function initCharts() {
      // Immunization Chart
      const immunizationTotals = healthData.immunization.reduce((acc, item) => ({
        bcg: acc.bcg + item.bcg_immunized,
        pentavalent: acc.pentavalent + item.pentavalent_immunized,
        opv: acc.opv + item.opv_immunized,
        mmr: acc.mmr + item.mmr_immunized
      }), {
        bcg: 0,
        pentavalent: 0,
        opv: 0,
        mmr: 0
      });

      new Chart(document.getElementById('immunizationChart'), {
        type: 'doughnut',
        data: {
          labels: ['BCG', 'Pentavalent', 'OPV', 'MMR'],
          datasets: [{
            data: Object.values(immunizationTotals),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      });

      // WASH Chart
      const washTotals = healthData.wash.reduce((acc, item) => ({
        activities: acc.activities + item.community_activities,
        access: acc.access + item.basic_water_access,
        services: acc.services + item.managed_water_services,
        tested: acc.tested + item.water_sources_tested,
        logistics: acc.logistics + item.wash_logistics
      }), {
        activities: 0,
        access: 0,
        services: 0,
        tested: 0,
        logistics: 0
      });

      new Chart(document.getElementById('washChart'), {
        type: 'bar',
        data: {
          labels: ['Activities', 'Access', 'Services', 'Tested', 'Logistics'],
          datasets: [{
            data: Object.values(washTotals),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return (value / 1000) + 'K';
                }
              }
            }
          }
        }
      });

      // Nutrition Chart  
      const nutritionTotals = healthData.nutrition.reduce((acc, item) => ({
        underweight: acc.underweight + item.underweight,
        sevUnderweight: acc.sevUnderweight + item.severely_underweight,
        stunted: acc.stunted + item.stunted,
        sevStunted: acc.sevStunted + item.severely_stunted,
        mam: acc.mam + item.wasted_mam,
        sam: acc.sam + item.severely_wasted_sam
      }), {
        underweight: 0,
        sevUnderweight: 0,
        stunted: 0,
        sevStunted: 0,
        mam: 0,
        sam: 0
      });

      new Chart(document.getElementById('nutritionChart'), {
        type: 'polarArea',
        data: {
          labels: ['Underweight', 'Sev. Underweight', 'Stunted', 'Sev. Stunted', 'MAM', 'SAM'],
          datasets: [{
            data: Object.values(nutritionTotals),
            backgroundColor: [
              '#FF6384', '#36A2EB', '#FFCE56',
              '#4BC0C0', '#9966FF', '#FF9F40'
            ]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      });
    }

    // Initialize dashboard
    document.addEventListener('DOMContentLoaded', function() {
      updateIndicators();
      initCharts();
    });

    // Simulate PHP backend with fetch (would be real API calls)
    function simulatePHPBackend() {
      console.log('PHP Backend Simulation:');
      console.log('Database: pk_doh');
      console.log('Tables: users, immunization, wash, nutrition');
      console.log('Data loaded from JSON structure');

      // This would be actual PHP API calls:
      /*
      fetch('/api/dashboard.php')
          .then(response => response.json())
          .then(data => {
              // Update charts and indicators with real data
              console.log('Data from PHP backend:', data);
          });
      */
    }

    // Export JSON data function
    function exportJSON() {
      const dataStr = JSON.stringify(healthData, null, 2);
      const dataUri = 'data:application/json;charset=utf-8,' + encodeURIComponent(dataStr);

      const exportFileDefaultName = 'pk_doh_data.json';
      const linkElement = document.createElement('a');
      linkElement.setAttribute('href', dataUri);
      linkElement.setAttribute('download', exportFileDefaultName);
      linkElement.click();
    }

    // Add export button
    document.querySelector('.navbar .container').insertAdjacentHTML('beforeend', `
    <button class="btn btn-outline-light btn-sm" onclick="exportJSON()">
        Export JSON
    </button>
`);

    simulatePHPBackend();
    </script>

    <!-- PHP Code Structure (commented for reference) -->
    <!--
<?php
// config/database.php
$host = 'localhost';
$dbname = 'pk_doh';
$username = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// api/dashboard.php
header('Content-Type: application/json');

// Get immunization data
$immunization = $pdo->query("SELECT * FROM immunization")->fetchAll(PDO::FETCH_ASSOC);

// Get wash data  
$wash = $pdo->query("SELECT * FROM wash")->fetchAll(PDO::FETCH_ASSOC);

// Get nutrition data
$nutrition = $pdo->query("SELECT * FROM nutrition")->fetchAll(PDO::FETCH_ASSOC);

// Get users
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

$response = [
  'users' => $users,
  'immunization' => $immunization,
  'wash' => $wash,
  'nutrition' => $nutrition
];

echo json_encode($response);
?>

-- SQL Schema
CREATE DATABASE pk_doh;
USE pk_doh;

CREATE TABLE users (
    id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE immunization (
    id VARCHAR(10) PRIMARY KEY,
    user_id VARCHAR(10),
    master_list_children INT(6),
    missed_children INT(6),
    bcg_immunized INT(6),
    pentavalent_immunized INT(6),
    opv_immunized INT(6),
    mmr_immunized INT(6),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE wash (
    id VARCHAR(10) PRIMARY KEY,
    user_id VARCHAR(10),
    community_activities INT(6),
    basic_water_access INT(6),
    managed_water_services INT(6),
    water_sources_tested INT(6),
    wash_logistics INT(6),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE nutrition (
    id VARCHAR(10) PRIMARY KEY,
    user_id VARCHAR(10),
    underweight INT(6),
    severely_underweight INT(6),
    stunted INT(6),
    severely_stunted INT(6),
    wasted_mam INT(6),
    severely_wasted_sam INT(6),
    breastfeeding_counseled INT(6) DEFAULT 0,
    vitamin_a_given INT(6) DEFAULT 0,
    lns_sq_given INT(6) DEFAULT 0,
    mam_sam_monitored INT(6) DEFAULT 0,
    iron_folic_supplemented INT(6) DEFAULT 0,
    nutritionally_at_risk INT(6) DEFAULT 0,
    deworming_provided INT(6) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
-->

  </body>

</html>