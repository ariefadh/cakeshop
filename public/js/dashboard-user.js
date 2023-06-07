$(document).ready(function () {
  $("#tabelAkun").DataTable({
    scrollY: 200,
    scrollX: true,
    columnDefs: [{ orderable: false, targets: 7 }],
  });
});

$(document).ready(function () {
  $(".password-field").each(function () {
    var password = $(this).text();
    $(this).data("password", password);
    $(this).text("*".repeat(password.length));
  });

  $(".toggle-password").click(function () {
    var passwordField = $(this).closest("tr").find(".password-field");
    var password = passwordField.data("password"); // Retrieve the original password from data

    if (passwordField.text().includes("*")) {
      passwordField.text(password); // Show the plain text password
    } else {
      passwordField.text("*".repeat(password.length)); // Show asterisks
    }
  });
});

