$(document).ready(function() {
  $('.sortable').click(function() {
    var table = $(this).parents('table').eq(0);
    var tbody = table.find('tbody').eq(0);
    var rows = tbody.find('tr').toArray().sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc) {
      rows = rows.reverse();
    }
    for (var i = 0; i < rows.length; i++) {
      tbody.append(rows[i]);
    }
  });

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index);
      var valB = getCellValue(b, index);
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
    };
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).text();
  }
});
