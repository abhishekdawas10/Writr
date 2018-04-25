// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['orgchart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // document.write("hi");  
    function drawChart() {
      var jsonData = $.ajax({
        url: "get_branch_json.php",
        dataType: "json",
        async: false
      }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      var options = {'allowHtml':true,
      'allowCollapse':true
    };

    function selectHandler(){
        // document.write("hellow");  
      var selection = chart.getSelection();
      var message = '';

      for (var i = 0; i < selection.length; i++) {
        var item = selection[i];
        if (item.row != null && item.column != null) {
          message += '{row:' + item.row + ',column:' + item.column + '}';
        } else if (item.row != null) {
          alert('hi');
          message += '{row:' + item.getValue() + '}';
        } else if (item.column != null) {
          message += '{column:' + item.column + '}';
        }
      }
      if (message == '') {
        message = 'nothing';
      }
      alert('You selected ' + message);
    }
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
      chart.draw(data,options);
      google.visualization.events.addListener(chart, 'select', selectHandler);


    }
