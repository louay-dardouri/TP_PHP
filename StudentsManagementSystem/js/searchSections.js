document.getElementById("s-section").addEventListener("keyup", function () {
  let search = this.value.trim();

  if (search === "") {
    location.reload();
    return;
  }

  fetch("searchSectionsByName.php", {
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
                <th>designation</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
            ${data}
        `;
    })
    .catch((error) => console.error("Error:", error));
});
