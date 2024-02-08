let chart = new ej.charts.Chart({
  title: "Data Jumlah Pemarkir 4 Hari Terakhir",
  tooltip: { enable: true },
  //Initializing Primary X Axis
  primaryXAxis: {
    valueType: "Category",
    title: "Hari",
  },
  //Initializing Primary Y Axis
  primaryYAxis: {
    title: "Jumlah Pemarkir",
  },

  //Initializing Chart Series
  series: [
    {
      type: "Column",
      dataSource: [
        { hari: "H+3", pemarkir: 0 },
        { hari: "H+2", pemarkir: 0 },
        { hari: "H+1", pemarkir: 0 },
        { hari: "Hari Ini", pemarkir: 2 },
      ],
      xName: "hari",
      yName: "pemarkir",
      marker: {
        visible: true,
        dataLabel: { visible: true },
      },
    },
  ],
});
chart.appendTo("#container");
