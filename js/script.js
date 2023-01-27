console.log("will this be printed");

function addTask() {
    // e.preventDefault();
    // console.log(e);
    loadTasks();
  let task = $("#task").val();
  $.ajax({
    method: "POST",
    dataType:'json',
    url: "http://localhost:8888/Assignment6/api/create.php",
    data: {
        'task': task
      }
  })
  document.getElementById('task').value = "";

  loadTasks();
}

function loadTasks() {

  // ---------------------------------
  // $.ajax({
  //   method: "GET",
  //   dataType:'json',
  //   url: "http://localhost:8888/Assignment6/api/readapi.php",
  //   success: function (data) {
  //     $(#current_tasks)
  //   }
  // })

  // ---------------------------------
  $.get("call-api/get_tasks.php", function (data) {
    $("#current_tasks").html(data);
  });
}
// $("#current_tasks").load("call-api/get_tasks.php");
// fn to edit task

function editTask(task,id) {

  // let text;
  let updated_task = prompt("Please enter task:" + id, task);
  console.log(updated_task);
  // $.ajax({
  //     url: "call-api/edit_task.php?id=11",
  //     type: 'PUT',
  //     dataType: 'json',
  //     data:  JSON.stringify( {
  //       'task':updated_task,
  //       'id':id
  //     })
  //   }
  // );
  $.ajax({
    type: "PUT",
    contentType: "application/json; charset=utf-8",
    url: "http://localhost:8888/Assignment6/api/update.php?id=" + id,
    data: JSON.stringify({'id' : id, 'task' :updated_task}),
    cache: false
  });

  loadTasks();

}


// Fn to delete tasks
function deleteTask(id) {
  $.ajax({
    url: "http://localhost:8888/Assignment6/api/delete.php?id=" + id,
    type: 'DELETE'
});
loadTasks();
}
function done (id){
  console.log ("passedid"+id);
  console.log (document.getElementById('edit58'));
  
    if(document.getElementById('finished'+id).checked){ 
      
      document.getElementById('task_'+id).style.textDecoration='line-through';
      document.getElementById('edit'+id).setAttribute("disabled",true)
      document.getElementById('delete'+id).setAttribute("disabled",true)
      // document.getElementById('delete'+id).style.display = "none"; 

      }
    else {
      document.getElementById('task_'+id).style.textDecoration='none';
      document.getElementById('edit'+id).disabled = false;
      document.getElementById('delete'+id).disabled = false;
      
    }
}
$(document).ready(function () {
  loadTasks();
});
