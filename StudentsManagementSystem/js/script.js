document.getElementById("s").addEventListener("keyup", function () {
  let search = this.value.trim();

  if (search === "") {
    location.reload();
    return;
  }

  fetch("searchStudentsByName.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "search=" + encodeURIComponent(search),
  })
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("students-table").innerHTML = `
            <tr>
                <th>id</th>
                <th>image</th>
                <th>name</th>
                <th>birthday</th>
                <th>section</th>
                <th>Actions</th>
            </tr>
            ${data}
        `;
    })
    .catch((error) => console.error("Error:", error));
});
