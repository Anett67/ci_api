$(function () {
  const getUsers = (email = "") => {
    let url = `http://localhost:8080/users/show?email=${email}`
    $.get(url, data => {
      const response = $.parseJSON(data)
      if (!response.error) {
        if (response.users.length) {
          $("#users").html("")
          $("#message").html("")
          response.users.map(user => {
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
          $("#message").html(`Pas d'utilisateur trouvé avec l'adresse mail '${email}'`)
        }
      } else {
        $("#message").html(`Veuillez renseigner un email valide`)
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
