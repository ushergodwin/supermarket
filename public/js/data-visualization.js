jQuery(() => {

    if(document.getElementById('categoriesCanvas'))
    {
        plotGraph(
            {
                url: '/admin/dashboard/charts', 
                id: 'categoriesCanvas',
                label: 'TOP 10 MOST SEARCHED CATEGORIES',
                q: 'most_searched_categories'
        });

        plotGraph(
            {
                url: '/admin/dashboard/charts', 
                id: 'itemsCanvas',
                label: 'TOP 10 MOST SEARCHED ITEMS',
                q: 'most_searched_items'
        });

        // pie charts
        plotPieChart(
            {
                url: '/admin/dashboard/charts', 
                id: 'pieChartcategoriesCanvas',
                label: 'TOP 10 MOST SEARCHED CATEGORIES',
                q: 'most_searched_categories',
                type: 'doughnut'
        });
    
        plotPieChart(
            {
                url: '/admin/dashboard/charts', 
                id: 'pieChartitemsCanvas',
                label: 'TOP 10 MOST SEARCHED ITEMS',
                q: 'most_searched_items'
        });
    }

    if(document.getElementById('usersBarCanvas'))
    {
        //supermarkets/users/charts' bar graph
        plotGraph(
            {
                url: '/supermarkets/users/charts', 
                id: 'usersBarCanvas',
                label: 'USERS',
                q: 'users'
        });

        //supermarkets/users/charts' doughnut chart
        plotPieChart(
            {
                url: '/supermarkets/users/charts', 
                id: 'usersChartCanvas',
                label: 'USERS',
                q: 'users',
                type: 'doughnut'
        });

         //supermarkets/users/charts' bar graph
        plotGraph(
            {
                url: '/supermarkets/visitors/charts', 
                id: 'visitorsBarCanvas',
                label: 'CUSTOMERS',
                q: 'users'
        });

        //supermarkets/users/charts' doughnut chart
        plotPieChart(
            {
                url: '/supermarkets/visitors/charts', 
                id: 'visitorsChartCanvas',
                label: 'CUSTOMERS',
                q: 'users',
                type: 'doughnut'
        });
    }
})
function plotGraph(setting = {})
{
    $.ajax({
        url: window.location.origin + setting.url,
        type: 'GET',
        data: {q: setting.q},

        beforeSend: () => {
            $(".loading-chart").html("<span class='spinner-border spinner-border-sm'></span> loading...")
        },
        success: function (response)
        {
         
            var labels = [];
            var values = [];
            let data = JSON.parse(response)
            
            // console.log(response.length)
             for (let index = 0; index < data.length; index++) {
                 labels.push(data[index].key)
                 values.push(data[index].value)
             }
            // console.log(data);

            var chartdata = {
                labels: labels,
                datasets: [
                    {
                        label: setting.label,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 150, 62, 0.2)',
                            'rgba(87, 145, 110, 0.2)',
                            'rgba(120, 62, 176, 0.2)',
                            'rgba(190, 100, 84, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 150, 62, 1)',
                            'rgba(87, 145, 110, 1)',
                            'rgba(120, 62, 176, 1)',
                            'rgba(190, 100, 84, 1)'
                        ],
                        hoverBackgroundColor: '#800080',
                        hoverBorderColor: '#666666',
                        data: values
                    }
                ],
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var graphTarget = $("#"+setting.id);

            return new Chart(graphTarget, {
                type: setting.hasOwnProperty('type') ? setting.type : 'bar',
                data: chartdata
            });
        },
        complete: () => {

            $(".loading-chart").html("")
        }
    });
}


function plotPieChart(setting = {})
{
    $.ajax({
        url: window.location.origin + setting.url,
        type: 'GET',
        data: {q: setting.q},

        beforeSend: () => {
            $(".loading-chart").html("<span class='spinner-border spinner-border-sm'></span> loading...")
        },
        success: function (response)
        {
         
            var labels = [];
            var values = [];
            let data = JSON.parse(response)
            
            // console.log(response.length)
            total_values = 0

            for (let index = 0; index < data.length; index++) {
                 total_values += Number(data[index].value)
             }

            
            for (let index = 0; index < data.length; index++) {
                labels.push(data[index].key)
                percentage = (Number(data[index].value) / total_values * 100).toFixed(2)
                values.push(percentage)
            }
            // console.log(data);

            var chartdata = {
                animateRotate: true,
                labels: labels,
                datasets: [
                    {
                        label: setting.label,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 150, 62, 0.2)',
                            'rgba(87, 145, 110, 0.2)',
                            'rgba(120, 62, 176, 0.2)',
                            'rgba(190, 100, 84, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 150, 62, 1)',
                            'rgba(87, 145, 110, 1)',
                            'rgba(120, 62, 176, 1)',
                            'rgba(190, 100, 84, 1)'
                        ],
                        hoverBackgroundColor: '#800080',
                        hoverBorderColor: '#666666',
                        data: values
                    }
                ],
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                }
            };

            var graphTarget = $("#"+setting.id);

            return new Chart(graphTarget, {
                type: setting.hasOwnProperty('type') ? setting.type : 'pie',
                data: chartdata
            });
        },
        complete: () => {

            $(".loading-chart").html("")
        }
    });
}