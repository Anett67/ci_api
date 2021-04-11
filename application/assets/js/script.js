$(function () {
  const displayUsers = (email = "") => {
    $.get(`http://localhost:8080/users/show/${email}`, data => {
      const users = $.parseJSON(data)

      users.map(user => {
        const date = new Date(user.created_at)
        $("#users").append(`
                <tr>
                    <td>${user.first_name}</td>
                    <td>${user.email}</td>
                    <td>${date.toLocaleDateString()}</td>
                </tr>
            `)
      })
    })
  }

  displayUsers()

  $("#email-form").submit(event => {
    event.preventDefault()
    const email = $("#user-email").val()
    displayUsers(email)
  })
})
