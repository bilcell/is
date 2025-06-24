$(function(){
  function loadJobs(){
    $.get('ajax/fetch_jobs.php', function(data){
      $('#jobTable tbody').html(data);
    });
  }
  loadJobs();

  $('#jobForm').submit(function(e){
    e.preventDefault();
    $.post('ajax/add_job.php', $(this).serialize(), function(){
      $('#jobForm')[0].reset();
      loadJobs();
    });
  });
});
