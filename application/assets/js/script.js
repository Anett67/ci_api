$(function () {
  const getUsers = (email = "") => {
    let url = `http://localhost:8080/users/show?email=${email}`
    $.get(url, data => {
      const users = $.parseJSON(data)
      if (users.length) {
        $("#users").html("")
        $("#message").html("")
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
      } else {
        console.log($("#message"))
        $("#message").html(`Pas d'utilisateur trouvé avec l'adresse mail '${email}'`)
        setTimeout(() => {
          $("#message").html("")
        }, 5000)
      }
    })
  }

  getUsers()

  $("#email-form").submit(event => {
    event.preventDefault()
    const email = $("#user-email").val()
    getUsers(email)
  })
})
