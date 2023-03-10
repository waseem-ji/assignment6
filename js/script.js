console.log("will this be printed");
// const express = require("express");
// const app = express();
// const cors = require("cors");
// app.use(
//   cors({
//     origin:"http://localhost"
//   })
// );
Baselink = "http://assignment6.test/api/";

function addTask() {
  // e.preventDefault();
  // console.log(e);
  loadTasks();
  let task = $("#task").val();
  $.ajax({
    method: "POST",
    dataType: "json",
    url: Baselink +"create.php",
    data: {
      task: task,
    },
  });
  document.getElementById("task").value = "";
  toastr.success(task, "Task added successfully");

  loadTasks();
}

function loadTasks() {
  // $.ajax({
  //   url: "call-api/get_tasks.php",
  //   dataType: 'json',
  //   success: function (data) {
  //     // var jsonData = JSON.parse(data);
  //     var jsonData = data;
  //     for (var i = 0; i < jsonData.data.length; i++) {
  //       // var task = jsonData.data[i];
  //       // console.log(task.task);
  //       $('#task').html(task.task);
  //     }
  //   },

  // });
  $.get("call-api/get_tasks.php", function (data) {
    $("#current_tasks").html(data);
  });
}
// fn to edit task

function editTask(task, id) {
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
    url: Baselink+"update.php?id=" + id,
    data: JSON.stringify({ id: id, task: updated_task }),
    cache: false,
  });
  toastr.success(updated_task, "Task updated successfully");
  loadTasks();
}

// Fn to delete tasks
function deleteTask(id) {
  $.ajax({
    url: Baselink+"delete.php?id=" + id,
    type: "DELETE",
  });
  toastr.success(" ", "Task Deleted");
  loadTasks();
}
function done(id) {
 

  if (document.getElementById("finished" + id).checked) {
    document.getElementById("task_" + id).style.textDecoration = "line-through";
    document.getElementById("edit" + id).setAttribute("disabled", true);
    // document.getElementById('delete'+id).setAttribute("disabled",true);
    // document.getElementById('delete'+id).style.display = "none";
    toastr.success("Task marked as DONE");
    $.get(Baselink+"readapi.php?id=" + id);

    // loadTasks()
  } else {
    document.getElementById("task_" + id).style.textDecoration = "none";
    document.getElementById("edit" + id).disabled = false;
    document.getElementById("delete" + id).disabled = false;
    $.get(Baselink+"readapi.php?id=" + id);
    toastr.error("Task not DONE");
  }
}
$(document).ready(function () {
  loadTasks();
});
