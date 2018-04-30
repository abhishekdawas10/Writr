// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['orgchart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    document.write("hxi");  
    function drawChart() {

      var data = new google.visualization.DataTable();
        data.addColumn('string', 'project_id');
        data.addColumn('string', 'parent_id');
        data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        


      var rawData = $.ajax({
        url: "get_branch_json.php",
        dataType: "json",
        async: false
      }).responseText;
    // document.write(rawData);  

      // var formattedData = "{ \"cols\": [ {\"id\":\"\",\"label\":\"project_id\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"parent_id\",\"pattern\":\"\",\"type\":\"string\"} ], \"rows\": [ ";
      // echo "";
      var lines = rawData.split('<br>');
        // document.write(lines[0]);
      
      for(var i = 0;i < lines.length-1;i++){
        // if (lines[i] == ""){
              var values = lines[i].split('|');
        // document.write("test" + lines[i] + "hello");
        // document.write("<br>");

      data.addRows([[{v:values[0], f: values[0] + '<div style="color:red; font-style:italic">' + values[2] + '</div>'},values[1], 'The President']]);
          
        // }
        // document.write(lines[i]);
              
         // formattedData += "{\"c\":[{\"v\":\"" + values[0] + "\",\"f\":null},{\"v\":\"" + values[1] + "\",\"f\":null}]},";
        // document.write("lol");

          // do
      }

      


  // echo " ] }";
      // Create our data table out of JSON data loaded from server.
      // var data = new google.visualization.DataTable(jsonData);
      var options = {'allowHtml':true,
      'allowCollapse':true,
      // 'size':'small',
      // 'width':s400,
      'height':100
    };

    function selectHandler() {
      // window.location.href = "http://example.com/new_url";
  /*      var selection = chart.getSelection();
        var message = '';
        for (var i = 0; i < selection.length; i++) {
          var item = selection[i];
          if (item.row != null && item.column != null) {
            var str = data.getFormattedValue(item.row, item.column);
            message += '{row:' + item.row + ',column:' + item.column + '} = ' + str + '\n';
          } else if (item.row != null) {
            var str = data.getFormattedValue(item.row, 0);
            message += '{row:' + item.row + ', column:none}; value (col 0) = ' + str + '\n';
          } else if (item.column != null) {
            var str = data.getFormattedValue(0, item.column);
            message += '{row:none, column:' + item.column + '}; value (row 0) = ' + str + '\n';
          }
        }
        if (message == '') {
          message = 'nothing';
        }
        alert('You selected ' + message);*/
    }
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
      chart.draw(data,options);
      google.visualization.events.addListener(chart, 'select', selectHandler);


    }
