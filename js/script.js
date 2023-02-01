console.log("will this be printed");

function addTask(user_id) {
    // e.preventDefault();
    // console.log(e);
    loadTasks();
  let task = $("#task").val();
  $.ajax({
    method: "POST",
    dataType:'json',
    url: "http://localhost/Assignment6/api/create.php",
    data: {
        'task': task,
        'user_id':user_id
      }
  })
  document.getElementById('task').value = "";
  toastr.success(task,"Task added successfully");

  loadTasks();
}

function loadTasks(user_id = getCookie('user_id')) {

  
  $.get("call-api/get_tasks.php?user_id="+user_id, function (data) {
    $("#current_tasks").html(data);
    }) 
}
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
    url: "http://localhost/Assignment6/api/update.php?id=" + id,
    data: JSON.stringify({'id' : id, 'task' :updated_task}),
    cache: false
  });
  toastr.success(updated_task,"Task updated successfully");
  loadTasks();

}


// Fn to delete tasks
function deleteTask(id) {
  $.ajax({
    url: "http://localhost/Assignment6/api/delete.php?id=" + id,
    type: 'DELETE'
});
toastr.success(" ","Task Deleted");
loadTasks();
}


function done (id){
  console.log ("passedid"+id);
  console.log (document.getElementById('edit58'));
  
    if(document.getElementById('finished'+id).checked){ 
      document.getElementById('task_'+id).style.textDecoration='line-through';
      document.getElementById('edit'+id).setAttribute("disabled",true);
      // document.getElementById('delete'+id).setAttribute("disabled",true);
      // document.getElementById('delete'+id).style.display = "none"; 
      toastr.success("Task marked as DONE");
      $.get("http://localhost/Assignment6/api/readapi.php?id="+id);

      loadTasks()
    

      }
    else {
      document.getElementById('task_'+id).style.textDecoration='none';
      document.getElementById('edit'+id).disabled = false;
      document.getElementById('delete'+id).disabled = false;
      toastr.error("Task not DONE");
      $.get("http://localhost/Assignment6/api/readapi.php?id="+id);
      loadTasks();
    }
    
}
function getCookie(name) {
  // Split cookie string and get all individual name=value pairs in an array
  var cookieArr = document.cookie.split(";");
  
  // Loop through the array elements
  for(var i = 0; i < cookieArr.length; i++) {
      var cookiePair = cookieArr[i].split("=");
      
      /* Removing whitespace at the beginning of the cookie name
      and compare it with the given string */
      if(name == cookiePair[0].trim()) {
          // Decode the cookie value and return
          return decodeURIComponent(cookiePair[1]);
      }
  }
  
  // Return null if not found
  return null;
}

// Logout
function logout() {
  window.location.replace('./logout.php')
}
$(document).ready(function () {
  
          var x = document.cookie;
          // document.write(x['user_id']);
          user_id = getCookie('user_id');
    
  loadTasks(user_id);
});
