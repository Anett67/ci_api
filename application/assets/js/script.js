$(function () {
  $.get("http://localhost:8080/users/show", data => {
    const users = $.parseJSON(data)
    users.map(user => {
      $("#users").append(`<tr>
            <td>${user.first_name}</td>
            <td>${user.email}</td>
            <td>${user.created_at}</td>
        </tr>`)
    })
  })
})
