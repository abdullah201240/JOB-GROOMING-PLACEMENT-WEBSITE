<table id="myTable">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- Table rows will be dynamically populated -->
    <tr>
      <td>John Doe</td>
      <td>johndoe@example.com</td>
      <td><button onclick="deleteRow(this,1)">Delete</button></td>
    </tr>
    <tr>
      <td>Jane Smith</td>
      <td>janesmith@example.com</td>
      <td><button onclick="deleteRow(this,1)">Delete</button></td>
    </tr>
    <!-- Additional rows -->
  </tbody>
</table>
<script>
  function deleteRow(button,id) {
    alert(id);
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

</script>