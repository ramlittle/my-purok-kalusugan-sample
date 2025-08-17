<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-lora: "Lora", sans-serif; 
            --font-barlow: "Barlow", sans-serif; 
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Dashboard - NCD</title>
</head>
<body>
    <div class="w-full h-screen flex flex-col justify-start items-start gap-6 p-4 overflow-y-scroll">

        <!-- HPN DM NCD -->
        <div class="w-full flex flex-col justify-start items-start gap-2 p-4">
            <span class="w-full text-5xl uppercase font-bold font-lora mb-4">Non Communicable Diseases (Hypertension and Diabetes Mellitus)</span>
            <div class="w-full grid grid-cols-3 gap-4">
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Risk-assessed adults (20-59 years) and elderly (60+ years) using the PhilPEN protocol.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Risk-assessed adults (20-59 years) and elderly (60+ years) who are binge drinkers, based on the PhilPEN protocol.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Risk-assessed adults (20-59 years) and elderly (60+ years) who are current tobacco users, based on the PhilPEN protocol.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Risk-assessed adults (20-59 years) and elderly (60+ years) who are overweight or obese, based on the PhilPEN protocol.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Identified hypertensive adults (20-59 years) and elderly (60+ years) who received antihypertensive medications.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-justify capitalize font-barlow font-medium text-lg ml-4 text-white">Identified adults (20-59 years) and elderly (60+ years) with Type 2 Diabetes Mellitus who received diabetes medications.</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
            </div>
        </div>

         <!-- Cancer -->
        <div class="w-full flex flex-col justify-start items-start gap-2">
            <span class="w-full text-5xl uppercase font-bold font-lora mb-4">Non Communicable Diseases(Cancer Prevention and Control)</span>
             <div class="w-full grid grid-cols-2 gap-4">

                <!-- cervical -->
                <div class="w-full flex flex-col justify-start items-start gap-2 p-2">
                    <span class="text-2xl font-semibold font-lora">Cervical Cancer Indicators</span>
                    <div class="w-full grid grid-cols-2 gap-4">
                        <div class="w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <span class="w-full text-start capitalize font-barlow font-medium text-lg text-white">No. of women aged 30-65 years old found suspicious for cervical cancer </span>
                            <span class="w-full text-[100px] text-start font-bold font-barlow text-emerald-900 text-white">1000</span>
                        </div>
                        <div class="w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <span class="w-full text-start capitalize font-barlow font-medium text-lg text-white">No. of women (30-65 years) found positive for precancerous cervical lesions.</span>
                            <span class="w-full text-[100px] text-start font-bold font-barlow text-emerald-900 text-white">1000</span>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[35%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">No. of women aged 30-65 years old who have been screened or assessed for cervical cancer.</span>
                                <span class="w-[65%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="cancerAssessedChart" class="w-full"></div>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[40%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">No. of women aged 30-65 years old found suspicious for cervical cancer and linked to care</span>
                                <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="cancerSuspiciousChart" class="w-full"></div>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[40%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">Women (30-65 years) found positive for precancerous cervical lesions who were linked to care.</span>
                                <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="cancerPositiveChart" class="w-full"></div>
                        </div>
                    </div>
                </div>
               
                <!-- Breast -->
                <div class="w-full flex flex-col justify-start items-start gap-2 p-2">
                    <span class="text-2xl font-semibold font-lora">Breast Cancer Indicators</span>
                    <div class="w-full grid grid-cols-2 gap-4">
                        <div class="w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <span class="w-full text-start capitalize font-barlow font-medium text-lg text-white px-2">High-risk women (30-69) with significant findings were linked to care.</span>
                            <span class="w-full text-[100px] text-start font-bold font-barlow text-emerald-900 text-white">1000</span>
                        </div>
                        <div class="w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <span class="w-full text-start capitalize font-barlow font-medium text-lg text-white">Asymptomatic women (50-69 years) with significant findings who were linked to care.</span>
                            <span class="w-full text-[100px] text-start font-bold font-barlow text-emerald-900 text-white">1000</span>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[35%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">High-risk asymptomatic or symptomatic women (30-69 years) who received Breast Cancer Early Detection Services.</span>
                                <span class="w-[65%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="breastCancerEarlyDetectionProvidedChart" class="w-full"></div>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[40%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">Asymptomatic women (50-69 years) screened for breast cancer.</span>
                                <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="breastCancerScreened50To69Chart" class="w-full"></div>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[40%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">High-risk asymptomatic or symptomatic women (30-69 years) with significant findings.</span>
                                <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="breastCancerHighRisk30To69SymptomaticChart" class="w-full"></div>
                        </div>
                        <div class="col-span-2 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                            <div class="w-full flex justify-start items-center gap-2">
                                <span class="w-[40%] text-start capitalize font-barlow font-medium text-lg text-white ml-4">Asymptomatic women (50-69 years) screened for breast cancer with significant findings.</span>
                                <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                            </div>
                            <div id="breastCancer50To69SymptomaticChart" class="w-full"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

       <!-- HPN DM NCD -->
        <div class="w-full flex flex-col justify-start items-start gap-2 p-4">
            <span class="w-full text-5xl uppercase font-bold font-lora mb-4">Mental Health Indicators</span>
            <div class="w-full grid grid-cols-4 gap-4">
                <div class="col-span-2 w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-center capitalize font-barlow font-medium text-lg ml-4 text-white">Number of mental health campaigns and Promotions conducted</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                </div>
                <div class="col-span-2 w-full h-[170px] flex justify-start items-center shadow-md shadow-gray-400 bg-[#344e41]">
                    <span class="w-[40%] text-center capitalize font-barlow font-medium text-lg ml-4 text-white">Number of mental health campaigns and Promotions To Conduct</span>
                    <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">5000</span>
                </div>
                <div class="col-span-4 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                    <div class="w-full flex justify-start items-center gap-2">
                        <span class="w-[40%] text-start capitalize font-barlow font-medium text-2xl text-white ml-4">Number of individuals screened for risks for mental health disorders using the WHO-SRQ</span>
                        <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4">
                        <div id="mentalHealthScreenedAgesChart" class="w-full flex justify-center items-center h-[300px]"></div>
                        <div id="mentalHealthScreenedSexChart" class="w-full flex justify-center items-center h-[300px]"></div>
                    </div>
                </div>
                <div class="col-span-4 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                    <div class="w-full flex justify-start items-center gap-2">
                        <span class="w-[40%] text-start capitalize font-barlow font-medium text-2xl text-white ml-4">Number of individuals with risks for mental health disorders referred for further assessment</span>
                        <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4">
                        <div id="mentalHealthWithRiskAgesChart" class="w-full flex justify-center items-center h-[300px]"></div>
                        <div id="mentalHealthWithRiskSexChart" class="w-full flex justify-center items-center h-[300px]"></div>
                    </div>
                </div>
                <div class="col-span-4 w-full flex flex-col justify-start items-center shadow-md shadow-gray-400 bg-[#344e41] p-2">
                    <div class="w-full flex justify-start items-center gap-2">
                        <span class="w-[40%] text-start capitalize font-barlow font-medium text-2xl text-white ml-4">Number of individuals without risks for mental health disorders provided with psychosocial processing, disaggregated by lifestage</span>
                        <span class="w-[60%] text-[100px] text-center font-bold font-barlow text-emerald-900 text-white">1000</span>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4">
                        <div id="mentalHealthWithoutRiskAgesChart" class="w-full flex justify-center items-center h-[300px]"></div>
                        <div id="mentalHealthWithoutRiskSexChart" class="w-full flex justify-center items-center h-[300px]"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
</body>
</html>


<style>

    @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap');
    .apexcharts-tooltip-series-group {
        color: #000000;
    }
    .apexcharts-tooltip-title {
        color: #000000;
    }
</style>


<script>
        var cancerAssessedChartoptions = {
            series: [{
                name: '',
                data: [400, 430, 448]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                },

            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Visual Inspection with Acetic Acid',
                    'Pap Smear',
                    'HPV-DNA Test'
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var cancerSuspiciousChartoptions = {
            series: [{
                name: '',
                data: [400, 430]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Reffered',
                    'Treated',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var cancerPositiveChartoptions = {
            series: [{
                name: '',
                data: [400, 430]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Reffered',
                    'Treated',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var breastCancerEarlyDetectionProvidedChartoptions = {
            series: [{
                name: '',
                data: [400, 430,450]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Clinical Breast Examination',
                    'Mammogram ',
                    'Ultrasound  ',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var breastCancerScreened50To69Chartoptions = {
            series: [{
                name: '',
                data: [400, 430,450]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Clinical Breast Examination',
                    'Mammogram ',
                    'Ultrasound  ',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var breastCancerHighRisk30To69SymptomaticChartoptions = {
            series: [{
                name: '',
                data: [400, 430,500]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Clinical Breast Examination',
                    'Mammogram ',
                    'Ultrasound  ',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };

        var breastCancer50To69SymptomaticChartoptions = {
            series: [{
                name: '',
                data: [400, 430,500]
            }],
            chart: {
                type: 'bar',
                height: 200,
                fontFamily: 'Lora',
                foreColor: 'white',
                padding: {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 20
                }

            },
            plotOptions: {
                bar: {
                   borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    barHeight: '50%',
                    colors: {
                        backgroundBarColors: ['white'], // Set a background color for the bars
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    colors: ['#FFFFf']
                }
            },
            xaxis: {
                categories: [
                    'Clinical Breast Examination',
                    'Mammogram ',
                    'Ultrasound  ',
                ],
            },
             tooltip: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Lora',
                    color: 'black'
                },
                marker: {
                    show: false // Hides the color dot
                },
            },
        };


        var mentalHealthScreenedAgesChartoptions = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Age Group', // Add this line to set the chart title
                align: 'center',
                style: {
                    fontSize: '20px', // Customize title font size
                    fontWeight: 'bold',
                }
            },
            labels: [
                '0-4  years old',
                '5-9 years old',
                '10-19 years old',
                '20-59 years old',
                '60 years old and above'
            ],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '14px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };

        var mentalHealthScreenedSexChartoptions = {
            series: [44, 55],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Sex',
                align: 'center',
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                }
            },
            labels: ['Male', 'Female'],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '20px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };

        var mentalHealthWithRiskAgesChartoptions = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Age Group', // Add this line to set the chart title
                align: 'center',
                style: {
                    fontSize: '20px', // Customize title font size
                    fontWeight: 'bold',
                }
            },
            labels: [
                '0-4  years old',
                '5-9 years old',
                '10-19 years old',
                '20-59 years old',
                '60 years old and above'
            ],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '14px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };

        var mentalHealthWithRiskSexChartoptions = {
            series: [44, 55],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Sex',
                align: 'center',
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                }
            },
            labels: ['Male', 'Female'],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '20px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };

         var mentalHealthWithoutRiskAgesChartoptions = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Age Group', // Add this line to set the chart title
                align: 'center',
                style: {
                    fontSize: '20px', // Customize title font size
                    fontWeight: 'bold',
                }
            },
            labels: [
                '0-4  years old',
                '5-9 years old',
                '10-19 years old',
                '20-59 years old',
                '60 years old and above'
            ],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '14px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };

        var mentalHealthWithoutRiskSexChartoptions = {
            series: [44, 55],
            chart: {
                width: 700,
                type: 'pie',
                foreColor: 'white',
                fontFamily: 'Lora',

            },
            title: {
                text: 'By Sex',
                align: 'center',
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                }
            },
            labels: ['Male', 'Female'],
            dataLabels: {
                style: {
                    fontSize: '16px',
                }
            },
            legend: {
                fontSize: '20px',
                position: 'bottom'
            },
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
            }]
        };
  

        var cancerAssessedChart = new ApexCharts(document.querySelector("#cancerAssessedChart"), cancerAssessedChartoptions);
        var cancerSuspiciousChart = new ApexCharts(document.querySelector("#cancerSuspiciousChart"), cancerSuspiciousChartoptions);
        var cancerPositiveChart = new ApexCharts(document.querySelector("#cancerPositiveChart"), cancerPositiveChartoptions);

        var breastCancerEarlyDetectionProvidedChart = new ApexCharts(document.querySelector("#breastCancerEarlyDetectionProvidedChart"), breastCancerEarlyDetectionProvidedChartoptions);
        var breastCancerScreened50To69Chart = new ApexCharts(document.querySelector("#breastCancerScreened50To69Chart"), breastCancerScreened50To69Chartoptions);
        var breastCancerHighRisk30To69SymptomaticChart = new ApexCharts(document.querySelector("#breastCancerHighRisk30To69SymptomaticChart"), breastCancerHighRisk30To69SymptomaticChartoptions);
        var breastCancer50To69SymptomaticChart = new ApexCharts(document.querySelector("#breastCancer50To69SymptomaticChart"), breastCancer50To69SymptomaticChartoptions);

        var mentalHealthScreenedAgesChart = new ApexCharts(document.querySelector("#mentalHealthScreenedAgesChart"), mentalHealthScreenedAgesChartoptions);
        var mentalHealthScreenedSexChart = new ApexCharts(document.querySelector("#mentalHealthScreenedSexChart"), mentalHealthScreenedSexChartoptions);
        var mentalHealthWithRiskAgesChart = new ApexCharts(document.querySelector("#mentalHealthWithRiskAgesChart"), mentalHealthWithRiskAgesChartoptions);
        var mentalHealthWithRiskSexChart = new ApexCharts(document.querySelector("#mentalHealthWithRiskSexChart"), mentalHealthWithRiskSexChartoptions);
        var mentalHealthWithoutRiskAgesChart = new ApexCharts(document.querySelector("#mentalHealthWithoutRiskAgesChart"), mentalHealthWithoutRiskAgesChartoptions);
        var mentalHealthWithoutRiskSexChart = new ApexCharts(document.querySelector("#mentalHealthWithoutRiskSexChart"), mentalHealthWithoutRiskSexChartoptions);


        cancerAssessedChart.render();
        cancerSuspiciousChart.render();
        cancerPositiveChart.render();

        breastCancerEarlyDetectionProvidedChart.render()
        breastCancerScreened50To69Chart.render()
        breastCancerHighRisk30To69SymptomaticChart.render()
        breastCancer50To69SymptomaticChart.render()

        mentalHealthScreenedAgesChart.render()
        mentalHealthScreenedSexChart.render()
        mentalHealthWithRiskAgesChart.render()
        mentalHealthWithRiskSexChart.render()
        mentalHealthWithoutRiskAgesChart.render()
        mentalHealthWithoutRiskSexChart.render()
        
</script>