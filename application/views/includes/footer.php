 <script>
  $(document).ready(function() {
    // Get the specific user from data when click on edit button.
    $('.edit').on('click', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      
      $.ajax({
               type: "POST",
               url: url,
               success: function(data)
               {
                  var data = JSON.parse(data);
                  $('#id').val(data.id);
                  $('#name').val(data.name);
                  $('#email').val(data.email);
                  $('#status').val(data.status);
                  $('#user-form').attr('action', '<?= base_url(); ?>Site_Home/edit');
               } 
             });
    });

    $('.delete').on('click', function() {
      if (confirm('Are you sure to delete this record?')) {
        window.location.href = $(this).attr('href');
      }
    })

  })
</script>
</body>
</html>