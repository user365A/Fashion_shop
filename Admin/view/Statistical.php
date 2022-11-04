 <meta charset="UTF-8">
 <!--Load the AJAX API-->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
   google.load('visualization', '1.0', {
     'packages': ['corechart']
   });
   google.setOnLoadCallback(drawVisualization);

   function drawVisualization() {
     //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
     var data = new google.visualization.DataTable();
     var rows = new Array();
     var tenhh = new Array();
     var soluongban = new Array();
     var datatenhh = 0;
     var soluong = 0;
     <?php $hh = new HangHoa();
      $result = $hh->getListHangHoa_thongke();
      while ($set = $result->fetch()) {
        $tenhh = $set['tenhh'];
        $slb = $set['soluongban'];
        echo "tenhh.push('" . $tenhh . "');";
        echo "soluongban.push('" . $slb . "');";
      }
      ?>
     for (var i = 0; i < tenhh.length; i++) {
       datatenhh = tenhh[i];
       soluong = parseInt(soluongban[i]);
       rows.push([datatenhh, soluong]);
     }
     data.addColumn('string', 'Hàng Hóa');
     data.addColumn('number', 'Số lượng bán');
     data.addRows(rows);
     var option = {
       title: 'Thống kê số lượng các mặt hàng được bán',
       'width': 600,
       'height': 400,
       'backgroundColor': '#ffffff'
     };
     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
     chart.draw(data, option);
   }
 </script>
 <div class="thongke">
   <div style=" width:100%;  float: left;" id="chart_div"></div>
   <!-- <div style=" width:50%;  float: right" id="chart_div1">dsfd</div> -->
 </div>